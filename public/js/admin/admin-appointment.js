 var BASEURL = "{{ url('/') }}";
 $(document).ready(function() {

     $('#calendar').fullCalendar({
         minTime: "09:00:00",
         maxTime: "19:00:00",
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
             var actualDate=getActualDate();
             if (validate_date(actualDate,start.format('DD-MM-YYYY'))) {
                 notifyInfo('No se puede reservar en días anteriores');
             }else{
             $('#divForAddAppointment').html('Cargando contenido...');
             $.get('addAppointment/' + start.format('YYYY-MM-DD'), function(response) {
                 $('#divForAddAppointment').html(response);
                 if (response.message==null) {
                     $('#addAppointmentModal').modal('show');
                 }else{
                     notifyInfo(response.message);
                 }
                 
                 //Validation method with jquery validate
                 $('#date_start').val(start.format('YYYY-MM-DD'));
                 $("#addAppointmentForm").validate({
                     submitHandler: function(form) {
                         if ($("#addAppointmentForm #time_start").val()!=0) {
                            postAppointment(); 
                         }else{
                             notifyInfo('No hay citas para este servicio ');
                         }
                         
                     }
                 });
             });
            } 
         },
         events: function(start, end, timezone, callback) {
             $.get('/appointmentList', function(response) {
                 response.push({
                     "title": "Cerrado",
                     start: '12:00',
                     end: '14:30',
                     color:'#BDAEC6',
                     down: [1, 2]
                 });
                 callback(response);
             }); //this should be a JSON request


         },

         eventClick: function(event, jsEvent, view) {
             var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
             var time_start = $.fullCalendar.moment(event.start).format('H(:mm)');
             var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD H(:mm)');
             $.get('appointment/' + event.id + '/edit', function(response) {
                    $('#divForAEditAppointment').html(response);
                    
                     $('#editAppointmentModal #delete').attr('data', event.id);
                     $('#editAppointmentModal #date_start').val(date_start);
                    $("#formEditAppointment").validate({
                        submitHandler: function(form) {
                            //Send Put of Appointment
                            updateAppointment();
                        }
                    });
                    $('#editAppointmentModal').modal('show');
                });
         } //
     });

 });


 function postAppointment() {
     
     var token = $("#addAppointmentForm #token").val();
     var route = "appointment";

     var data = new FormData();
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
             toastr.clear()
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
    var route = "appointment/"+$("#formEditAppointment #id").val();


     var serviceId=$("#formEditAppointment #serviceId").val();
     var date_start=$("#formEditAppointment #date_start").val();
     var start=$("#formEditAppointment #start").val();
    $('#editAppointmentModal').modal('hide');
  
  $.ajax({
    url: route,
    headers: {
      'X-CSRF-TOKEN': token
    },
    type: 'PUT',
    dataType: 'json',
    data: {
      serviceId,date_start,start
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
 
 function changeService(sel)
{
     var route = "serviceAvailable/"+sel.value+"/" +  $("#addAppointmentForm #date_start").val();
      $("#addAppointmentForm #time_start").empty();
      $.get(route, function(res) {
        if (res.length!=0) {
          $.each(res, function(key, item) {
                $("#addAppointmentForm #time_start").append("<option value='" + key + "'>" + item + "</option>");
         });
        }else {
            $("#addAppointmentForm #time_start").append("<option value='" + 0 + "'>" + 'No hay citas disponibles' + "</option>");
            
        }
      });
}
 function changeServiceEditing(sel)
{
     var route = "serviceAvailable/"+sel.value+"/" +  $("#formEditAppointment #date_start").val()+"/"+$("#formEditAppointment #id").val();
      $("#formEditAppointment #start").empty();
      $.get(route, function(res) {
        if (res.length!=0) {
          $.each(res, function(key, item) {
                $("#formEditAppointment #start").append("<option value='" + key + "'>" + item + "</option>");
         });
        }else {
            $("#formEditAppointment #start").append("<option value='" + 0 + "'>" + 'No hay citas disponibles' + "</option>");
            
        }
      });
}
function cancelAppointment(btn){
  var id=  $('#editAppointmentModal #delete').attr('data');
  $("#deleteAppoitmentForm #Id").val(id);
  $('#deleteAppoitmentModal').modal('show');
  
}
function acceptDeleteAppoitment(){
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
    function validate_date(actuaDate,selectDate)

        {
            valuesStart=actuaDate.split("-");
            valuesEnd=selectDate.split("-");
            var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);
            var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);
            return (dateStart>dateEnd);



        }