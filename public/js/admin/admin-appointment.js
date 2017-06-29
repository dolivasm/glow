 var BASEURL = "{{ url('/') }}";
 $(document).ready(function() {

     $('#calendar').fullCalendar({
         minTime: openTime,
         maxTime: closeTime,
         header: {
             left: 'prev,next today',
             center: 'title',
             right: 'month,agendaWeek,agendaDay,listMonth'
         },
         navLinks: true, // can click day/week names to navigate views
         editable: false,
         selectable: true,
         selectHelper: true,
         buttonIcons: true,
         locale: 'es',
         weekends: false,
         timeFormat: 'H(:mm)',
         select: function(start) {
             start = moment(start.format());
             var actualDate = getActualDate();
             if (typeof userId === 'undefined') {
                notifyWarning('Por favor,inicie sesión para agregar o actualizar citas');
             }else{
             if (validate_date(actualDate, start.format('DD-MM-YYYY'))) {
                 notifyWarning('No se puede reservar en días anteriores');
             } else {
                 $('#divForAddAppointment').html('Cargando contenido...');
                 $.get('addAppointment/' + start.format('YYYY-MM-DD'), function(response) {
                     $('#divForAddAppointment').html(response);
                     if (response.message == null) {
                         $('.selectpicker').selectpicker();
                         $('#addAppointmentModal').modal('show');
                     } else {
                         notifyWarning(response.message);
                     }

                     //Validation method with jquery validate
                     $('#date_start').val(start.format('YYYY-MM-DD'));
                     $("#addAppointmentForm").validate({
                         submitHandler: function(form) {
                             if ($("#addAppointmentForm #time_start").val() != 0) {
                                 postAppointment();
                             } else {
                                 notifyWarning('No hay citas para este servicio ');
                             }

                         }
                     });
                 }).fail(function(response) {
                     switch (response.status) {
                         case 401:
                             notifyWarning('Inicie sesión para agregar o actualizar citas');
                             break;
                         case 408:
                             notifyError('Lo sentimos, estamos teniendo problemas de conexión');
                             break;
                         default:
                             notifyError('Lo sentimos, ha ocurrido un error');
                     }
                 });
             }
         }
         },
         events: function(start, end, timezone, callback) {
             $.get('/appointmentList', function(response) {
                 response.push({
                     id:0,
                     "title": "Cerrado",
                     start: lunchStart,
                     end: lunchEnd,
                     color: '#BDAEC6',
                     down: [1, 2]
                 });
                 callback(response);
             }); //this should be a JSON request


         },

         eventClick: function(event, jsEvent, view) {
             if (event.id==0) {
                 notifyInformation("La hora de almuerzo es de "+$.fullCalendar.moment(event.start).format('H(:mm)')+" a "+$.fullCalendar.moment(event.end).format('H(:mm)'));
             }else{//modify event
             //User is not autenthicated
             if (typeof userId === 'undefined') {
                 notifyWarning('Por favor,inicie sesión para agregar o actualizar citas');
             } else { //The user are loggin

                 var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                     //Check if the user can edit
                     if (userRole == 1 || event.userId == userId) {
                         var time_start = $.fullCalendar.moment(event.start).format('H(:mm)');
                         var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD H(:mm)');
                         $.get('appointment/' + event.id + '/edit', function(response) {
                             if (response.warning == null) {
                                 
                                 $('#divForAEditAppointment').html(response);
                                 $('#editAppointmentModal #delete').attr('data', event.id);
                                 $('#editAppointmentModal #date_start').val(date_start);
                                 $("#formEditAppointment").validate({
                                     submitHandler: function(form) {
                                         if ($("#formEditAppointment #start").val() != 0) { 
                                             var tempStart = $("#formEditAppointment #tempStart").val();
                                             var newStart = $("#formEditAppointment #start").val();
                                             if (tempStart== newStart) {
                                                 updateAppointment();
                                             }else{
                                                 $('#tag_time').html(newStart); 
                                                $('#changeTimeAppoitmentModal').modal('show');                                                 
                                             }
                                             
                                             
                                         } else {
                                             notifyWarning('No hay citas para le servicio seleccionado');
                                         }
                                     }
                                 });
                                 $('.selectpicker').selectpicker();
                                 $('#editAppointmentModal').modal('show');
                             } else {
                                 notifyWarning(response.warning);
                             }
                         }).fail(function(response) {
                             switch (response.status) {
                                 case 401:
                                     notifyWarning('Inicie sesión para agregar o actualizar citas');
                                     break;
                                 case 408:
                                     notifyError('Lo sentimos, estamos teniendo problemas de conexión');
                                     break;
                                 default:
                                     notifyError('Lo sentimos, ha ocurrido un error');
                             }
                         });

                     } else {
                         notifyWarning('Solo puedes editar tus citas');
                     }
                 
             }//end modify event
             }//end else of check logging
         } //end else
     });

 });


 function postAppointment() {

     var token = $("#addAppointmentForm #token").val();
     var route = "appointment";

     var data = new FormData();
     data.append('userId', $("#addAppointmentForm #userId").val());
     data.append('serviceId', $("#addAppointmentForm #serviceId").val());
     data.append('date_start', $("#addAppointmentForm #date_start").val());
     data.append('time_start', $("#addAppointmentForm #time_start").val());

     $('#addAppointmentModal').modal('hide');
     $.ajax({
         url: route,
         headers: {
             'X-CSRF-TOKEN': token
         },
         cache: false,
         contentType: false,
         processData: false,
         type: 'POST',
         dataType: 'json',
         data: data,
         success: function(response) {
             $('#calendar').fullCalendar('refetchEvents');
             notifySuccess(response.message);


         },
         error: function(response) {
             if (response.status == 422) {
                 displayFieldErrors(response);
             } else {
                 notifyError(response.error);
             }
             $('#addAppointmentModal').modal('hide');
         }
     });
 }

 function updateAppointment() {

     var token = $("#formEditAppointment #token").val();
     var route = "appointment/" + $("#formEditAppointment #id").val();

    
    var userId = $("#formEditAppointment #userId").val();
     var serviceId = $("#formEditAppointment #serviceId").val();
     var date_start = $("#formEditAppointment #date_start").val();
     var start = $("#formEditAppointment #start").val();
     $('#editAppointmentModal').modal('hide');
     $('#changeTimeAppoitmentModal').modal('hide'); 

     $.ajax({
         url: route,
         headers: {
             'X-CSRF-TOKEN': token
         },
         type: 'PUT',
         dataType: 'json',
         data: {
             userId,
             serviceId,
             date_start,
             start
         },
         success: function(response) {
             toastr.clear();
             $('#calendar').fullCalendar('refetchEvents');
             notifySuccess(response.message);
         },
         error: function(response) {
             $('#editAppointmentModal').modal('show');
             if (response.status == 422) {
                 displayFieldErrors(response);
             } else {}
         }
     });
 }

 function changeService(sel) {
     var route = "serviceAvailable/" + sel.value + "/" + $("#addAppointmentForm #date_start").val();
     $("#addAppointmentForm #time_start").empty();
     appendOptionToAddTimeSelect(-1,'Cargando disponibilidad...');
     refreshSelects();
     $.get(route, function(res) {
      $("#addAppointmentForm #time_start").empty();
         if (res.length != 0) {
             $.each(res, function(key, item) {
                 appendOptionToAddTimeSelect(key,item);
             });
         } else {
             appendOptionToAddTimeSelect(0,'No hay citas disponibles');

         }
         refreshSelects();
     });
 }
  function refreshSelects(){
   $('.selectpicker').selectpicker('refresh');
  }
  function appendOptionToAddTimeSelect(value,option){
    $("#addAppointmentForm #time_start").append("<option value='" + value+ "'>" + option+ "</option>");
  }
function appendOptionToEditTimeSelect(value,option){
    $("#formEditAppointment #start").append("<option value='" + value+ "'>" + option+ "</option>");
  }
 function changeServiceEditing(sel) {
     var route = "serviceAvailable/" + sel.value + "/" + $("#formEditAppointment #date_start").val() + "/" + $("#formEditAppointment #id").val();
     $("#formEditAppointment #start").empty();
     appendOptionToEditTimeSelect(-1,'Cargando disponibilidad...');
     refreshSelects();
     $.get(route, function(res) {
      $("#formEditAppointment #start").empty();
         if (res.length != 0) {
             $.each(res, function(key, item) {
                 appendOptionToEditTimeSelect(key,item);
             });
         } else {
          appendOptionToEditTimeSelect(0,'No hay citas disponibles');

         }
         refreshSelects();
     });
 }

 function cancelAppointment(btn) {
     var id = $('#editAppointmentModal #delete').attr('data');
     $("#deleteAppoitmentForm #Id").val(id);
     $('#deleteAppoitmentModal').modal('show');

 }

 function acceptDeleteAppoitment() {
     $('#deleteAppoitmentModal').modal('hide');
     var delete_url = '/appointment/' + $('#editAppointmentModal #delete').attr('data');
     var token = $("#token").val();
     $('#editAppointmentModal').modal('hide');
     $.ajax({
         url: delete_url,
         headers: {
             'X-CSRF-TOKEN': token
         },
         type: 'DELETE',
         success: function(response) {
             $('#calendar').fullCalendar('refetchEvents');
             notifySuccess(response.message);

         },
         error: function(response) {
             $('#editAppointmentModal').modal('show');
             notifyError(response.message);
         }
     });
 }

 function validate_date(actuaDate, selectDate)

 {
     valuesStart = actuaDate.split("-");
     valuesEnd = selectDate.split("-");
     var dateStart = new Date(valuesStart[2], (valuesStart[1] - 1), valuesStart[0]);
     var dateEnd = new Date(valuesEnd[2], (valuesEnd[1] - 1), valuesEnd[0]);
     return (dateStart > dateEnd);

 }