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


             
         },
         events: function(start, end, timezone, callback) {
             $.get('/appointmentList', function(response) {
                 response.push({
                     "title": "Cerrado",
                     start: '12:00',
                     end: '14:30',
                     color:'#b44ab4',
                     down: [1, 2]
                 });
                 callback(response);
             }); //this should be a JSON request


         },

         eventClick: function(event, jsEvent, view) {
             var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
             var time_start = $.fullCalendar.moment(event.start).format('H(:mm)');
             var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD H(:mm)');
             $('#modal-event #delete').attr('data-id', event.id);
             $('#modal-event #_title').val(event.title);
             $('#modal-event #_date_start').val(date_start);
             $('#modal-event #_time_start').val(time_start);
             $('#modal-event #_date_end').val(date_end);
             $('#modal-event').modal('show');
         } //
     });

 });

 $('.colorpicker').colorpicker();

 $('#date_end').bootstrapMaterialDatePicker({
     date: true,
     shortTime: false,
     format: 'YYYY-MM-DD HH:mm:ss'
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

 $('#delete').on('click', function() {
     var x = $(this);
     var delete_url = '/appointment/' + x.attr('data-id');
     var token = $("#token").val();
     $.ajax({
         url: delete_url,
         headers: {
             'X-CSRF-TOKEN': token
         },
         type: 'DELETE',
         success: function(response) {
             $('#modal-event').modal('hide');
             notifySuccess(response.message);
             $('#calendar').fullCalendar('refetchEvents');
         },
         error: function(response) {
             $('#modal-event').modal('hide');
             notifySuccess(response.message);
         }
     });
 });