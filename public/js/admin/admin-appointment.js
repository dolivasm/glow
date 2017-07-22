 var BASEURL = "{{ url('/') }}";
 $(document).ready(function() {

     $('#calendar').fullCalendar({
         minTime: '07:00:00',
         maxTime: '22:00:00',
         header: {
             left: 'prev,next today',
             center: 'title',
             right: 'month,agendaWeek,agendaDay,listMonth'
         },
         navLinks: true, // can click day/week names to navigate views
         editable: false,
         slotEventOverlap:false,
         selectable: true,
         selectHelper: true,
         buttonIcons: true,
         locale: 'es',
         hiddenDays: [ 0 ],
         timeFormat: 'HH:mm',
         select: function(start,end) {
             
            var date_start = $.fullCalendar.moment(start).format('YYYY-MM-DD HH:mm:ss');
            var date_end = $.fullCalendar.moment(end).format('YYYY-MM-DD HH:mm:ss');
            
            //checkOverlap(date_start,date_end);
            
             start = moment(start.format());
             var actualDate = getActualDate();
             if (typeof userId === 'undefined') {
                notifyWarning('Por favor,inicie sesión para agregar o actualizar citas');
             }else{
             if (validate_date(actualDate, start.format('DD-MM-YYYY'))) {
                 notifyWarning('No se puede reservar en días anteriores');
             } else {
                    if (userRole==1) {
                        $('#adminOptions #start').val(date_start);
                        $('#adminOptions #end').val(date_end);
                       $('#optionsAppoitmentModal').modal('show');
                    }else{
                        doReservation(date_start);
                    }
                        
             }
         }
         },
         events: function(start, end, timezone, callback) {
             $.get('/appointmentList', function(response) {
                 response.push({
                     dow: [1,2,3, 4, 5 ],
                     id:0,
                     "title": "Cerrado",
                     start: lunchStart,
                     end: lunchEnd,
                     color: '#657963'
                 });
                 callback(response);
             }); //this should be a JSON request


         },

         eventClick: function(event, jsEvent, view) {
             if (event.serviceId==null) {
                 if (event.id==0) {
                 notifyInformation("La hora de almuerzo es de "+$.fullCalendar.moment(event.start).format('HH:mm')+" a "+$.fullCalendar.moment(event.end).format('HH:mm'));    
                 }else{
                     showBlockedHoursModal(event);
                 }
                 
             }else{//modify event
             //User is not autenthicated
             if (typeof userId === 'undefined') {
                 notifyWarning('Por favor,inicie sesión para agregar o actualizar citas');
             } else { //The user are loggin

                 var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                     //Check if the user can edit
                     if (userRole == 1 || event.userId == userId) {
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
 function showBlockedHoursModal(event){
        $.get('editRestriction/' + event.id , function(response) {
            $('#divDetailsBlockHour').html(response);
            $("#editblockHoursForm #Id").val(event.id);
                $('#editblockHoursForm').validate(  {
                        submitHandler: function(form) {
                            putHourRestriction();

                         }
                   });
                   $('#detailsBlockHourModal').modal('show');
            });

               
 }
 function  putHourRestriction(){

     var token = $("#editblockHoursForm #token").val();
     var route = "editRestrictionHour";

     var data = new FormData();
     data.append('id', $("#editblockHoursForm #Id").val());
     data.append('userId', userId);
     data.append('title', $("#editblockHoursForm #title").val());
     data.append('date_start', $("#editblockHoursForm #start").val());
     data.append('date_end', $("#editblockHoursForm #end").val());

     $('#detailsBlockHourModal').modal('hide');
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
             $('#detailsBlockHourModal').modal('show');
         }
     });
 
 }
 
 function doReservation(startTime=null){
        $('#optionsAppoitmentModal').modal('hide');
        var start;
        if (startTime==null) 
          start=$('#adminOptions #start').val(); 
            else
            start= startTime
                 $('#divForAddAppointment').html('Cargando contenido...');
                 $.get('addAppointment/' + start, function(response) {
                     if (response.warning==null) {
                         
                     
                     $('#divForAddAppointment').html(response);
                     if (response.message == null) {
                         $('.selectpicker').selectpicker();
                         $('#addAppointmentModal').modal('show');
                     } else {
                         notifyWarning(response.message);
                     }

                     //Validation method with jquery validate
                     $('#date_start').val(start.substring(0,10));
                     $("#addAppointmentForm").validate({
                         submitHandler: function(form) {
                             if ($("#addAppointmentForm #time_start").val() != 0) {
                                 postAppointment();
                             } else {
                                 notifyWarning('No hay citas para este servicio ');
                             }

                         }
                     });
                    }else {
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
     
 }
 function blockHours(){
     $('#optionsAppoitmentModal').modal('hide');
     var start=$('#adminOptions #start').val();
     var end=$('#adminOptions #end').val();
     checkOverlap(start,end);

    
}
 function checkOverlap(start,end) {  
            $.get('checkTime/' + start + '/'+end, function(response) {
                if ( response.available==true){
                $.get('addRestrictionHour', function(response) {
                    $('#divForblockHours').html(response);
                     $("#blockHoursForm #date_start").val(start);
                     $("#blockHoursForm #date_end").val(end);

                   $('#blockHoursForm').validate(  {
                        submitHandler: function(form) {
                            postHourRestriction();

                         }
                   });
                   $('#blockHoursModal').modal('show');
                });
                
            }else {
                        notifyWarning(response.message);
            }
                    });  
            
  }
   function postHourRestriction() {

     var token = $("#blockHoursForm #token").val();
     var route = "saveRestrictionHour";

     var data = new FormData();
     data.append('userId', userId);
     data.append('title', $("#blockHoursForm #title").val());
     data.append('date_start', $("#blockHoursForm #date_start").val());
     data.append('date_end', $("#blockHoursForm #date_end").val());

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
              if (response.error==null) {
                notifySuccess(response.message);
                 $('#blockHoursModal').modal('hide');
                  
              }else{
                  if (response.error=="reservado") {
                     notifyError("Lo sentimos, la hora seleccionada ya ha sido reservada. Por favor, seleccioné un nuevo rango");
                      $('#blockHoursModal').modal('hide');
                 }
              }

         },
         error: function(response) {
             if (response.status == 422) {
                 displayFieldErrors(response);
             } else {
                 notifyError(response.error);
             }
         }
     });
 }

 function postAppointment() {
     document.getElementById("addAppointmentSubmit").disabled = true;

     var token = $("#addAppointmentForm #token").val();
     var route = "appointment";

     var data = new FormData();
     data.append('userId', $("#addAppointmentForm #userId").val());
     data.append('serviceId', $("#addAppointmentForm #serviceId").val());
     data.append('date_start', $("#addAppointmentForm #date_start").val());
     data.append('time_start', $("#addAppointmentForm #time_start").val());
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
             if (response.error==null) {
                 
                notifySuccess(response.message);
                   $('#addAppointmentModal').modal('hide'); 
             }else{
                 if (response.error=="reservado") {
                    changeService($("#addAppointmentForm #serviceId"));
                     notifyError("Lo sentimos, la hora seleccionada ya ha sido reservada. Por favor, seleccioné una nueva");
                 }
             }
            


         },
         error: function(response) {
             document.getElementById("addAppointmentSubmit").disabled = false;
             if (response.status == 422) {
                 displayFieldErrors(response);
             } else {
                 notifyError(response.error);
             }
         }
     });
 }

 function updateAppointment() {
    document.getElementById("editAppointmentSubmit").disabled = true;
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
             $('#calendar').fullCalendar('refetchEvents');
             notifySuccess(response.message);
         },
         error: function(response) {
             document.getElementById("editAppointmentSubmit").disabled = false;
             $('#editAppointmentModal').modal('show');
             if (response.status == 422) {
                 displayFieldErrors(response);
             } else {}
         }
     });
 }

 function changeService(sel) {
     var route = "serviceAvailable/" + sel.val() + "/" + $("#addAppointmentForm #date_start").val();
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
 function   deleteBlockHour(btn){
     var id = $('#editblockHoursForm #Id').val();
     $("#deleteRestriction #Id").val(id);
     $('#deleteBlockHourModal').modal('show');
 }
  function acceptDeleteBlockHour() {
     $('#deleteBlockHourModal').modal('hide');
     var delete_url = 'deleteRestriction/' +$("#deleteRestriction #Id").val();
     var token = $("#token").val();
     $('#detailsBlockHourModal').modal('hide');
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
             $('#detailsBlockHourModal').modal('show');
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
  function updateSchedule(route){
   
     $.get(route, function(response) {
        $('#divForEditSchedule').html(response);
        $("#formUpdateSchedule").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putScheduleData();
            }
        });
         var tempOpenStart;
        $('#openStart').clockpicker({ autoclose: true,
          beforeDone:function(){
            tempOpenStart=$('#openStart').val();
          },
           
          afterDone:function(){
           

              if((new Date(2000, 1, 1, parseInt($('#openStart').val().split(':')[0]), parseInt($('#openStart').val().split(':')[1]), 0, 0)) >=
           				(new Date(2000, 1, 1, parseInt($('#openEnd').val().split(':')[0]), parseInt($('#openEnd').val().split(':')[1]), 0, 0))
           			){
           			 $('#openStart').val(tempOpenStart);
       			       notifyWarning("La hora de abrir el local no puede ser mayor o igual a la de cerrar");
       		     	}
             
          }});
        var tempOpenEnd;
        $('#openEnd').clockpicker(
          { autoclose: true,
          beforeDone:function(){
            tempOpenEnd=$('#openEnd').val();
          },
           
          afterDone:function(){
           

              if((new Date(2000, 1, 1, parseInt($('#openStart').val().split(':')[0]), parseInt($('#openStart').val().split(':')[1]), 0, 0)) >=
           				(new Date(2000, 1, 1, parseInt($('#openEnd').val().split(':')[0]), parseInt($('#openEnd').val().split(':')[1]), 0, 0))
           			){
           			 $('#openEnd').val(tempOpenEnd);
       			       notifyWarning("La hora de cierre de local no puede ser menor o igual a la de abrir");
       		     	}
             
          }});
        $('#lunchStart').clockpicker({ autoclose: true,
          beforeDone:function(){
            tempOpenStart=$('#lunchStart').val();
          },
           
          afterDone:function(){
              if((new Date(2000, 1, 1, parseInt($('#lunchStart').val().split(':')[0]), parseInt($('#lunchStart').val().split(':')[1]), 0, 0)) >=
           				(new Date(2000, 1, 1, parseInt($('#lunchEnd').val().split(':')[0]), parseInt($('#lunchEnd').val().split(':')[1]), 0, 0))
           			){
           			 $('#lunchStart').val(tempOpenStart);
       			       notifyWarning("La hora de inicio de almuerzo no puede ser mayor o igual a la de fin!");
       		     	}
             
          }});
        $('#lunchEnd').clockpicker({ autoclose: true,
          beforeDone:function(){
            tempOpenEnd=$('#lunchEnd').val();
          },
           
          afterDone:function(){
              if((new Date(2000, 1, 1, parseInt($('#lunchStart').val().split(':')[0]), parseInt($('#lunchStart').val().split(':')[1]), 0, 0)) >=
           				(new Date(2000, 1, 1, parseInt($('#lunchEnd').val().split(':')[0]), parseInt($('#lunchEnd').val().split(':')[1]), 0, 0))
           			){
           			 $('#lunchEnd').val(tempOpenEnd);
       			       notifyWarning("La hora de fin de almuerzo no puede ser menor o igual a la de inicio!");
       		     	}
             
          }});
          
        //Saturday Options
        $('#saturdayStart').clockpicker({ autoclose: true,
          beforeDone:function(){
            tempOpenStart=$('#saturdayStart').val();
          },
           
          afterDone:function(){
           

              if((new Date(2000, 1, 1, parseInt($('#saturdayStart').val().split(':')[0]), parseInt($('#saturdayStart').val().split(':')[1]), 0, 0)) >=
           				(new Date(2000, 1, 1, parseInt($('#saturdayEnd').val().split(':')[0]), parseInt($('#saturdayEnd').val().split(':')[1]), 0, 0))
           			){
           			 $('#saturdayStart').val(tempOpenStart);
       			       notifyWarning("La hora de abrir el local no puede ser mayor o igual a la de cerrar");
       		     	}
             
          }});
        var tempOpenEnd;
        $('#saturdayEnd').clockpicker(
          { autoclose: true,
          beforeDone:function(){
            tempOpenEnd=$('#saturdayEnd').val();
          },
           
          afterDone:function(){
           

              if((new Date(2000, 1, 1, parseInt($('#saturdayStart').val().split(':')[0]), parseInt($('#saturdayStart').val().split(':')[1]), 0, 0)) >=
           				(new Date(2000, 1, 1, parseInt($('#saturdayEnd').val().split(':')[0]), parseInt($('#saturdayEnd').val().split(':')[1]), 0, 0))
           			){
           			 $('#saturdayEnd').val(tempOpenEnd);
       			       notifyWarning("La hora de cierre de local no puede ser menor o igual a la de abrir");
       		     	}
             
          }});
          
        $('#updateScheduleModal').modal('show');
     });
     
      
     
    
  
 }
 function putScheduleData(){
     document.getElementById("updateSubmitSchedule").disabled = true;
     var token = $("#formUpdateSchedule #token").val();
     var route = "schedule/" + 1;
    
    var openStart = $('#openStart').val();
     var openEnd = $('#openEnd').val();
     var saturdayStart = $('#saturdayStart').val();
     var saturdayEnd = $('#saturdayEnd').val();
     var lunchStart =$('#lunchStart').val();
     var lunchEnd = $('#lunchEnd').val();
     

     $.ajax({
         url: route,
         headers: {
             'X-CSRF-TOKEN': token
         },
         type: 'PUT',
         dataType: 'json',
         data: {
             openStart,
             openEnd,
             lunchStart,
             lunchEnd,
             saturdayStart,
             saturdayEnd
         },
         success: function(response) {
             $('#updateScheduleModal').modal('hide');
             notifySuccess(response.message);
             location.reload(); 
         },
         error: function(response) {
          document.getElementById("updateSubmitSchedule").disabled = false;
             if (response.status == 422) {
                 displayFieldErrors(response);
             } else {}
         }
     });
 
 }
 
 function showHowToModal() {
  /*$.get('users/' +id+ '', function(response) {
        $('#idUserToDelete').val(id);
        $('#nameUserToDelete').text(name);
        $('#firstNameUserToDelete').text(fisrtName);
     });*/
    $('#howtomodal').modal('show');
 }