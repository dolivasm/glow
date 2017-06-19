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
                locale:'es',
                weekends:false,
                timeFormat: 'H(:mm)',
                select: function(start){
                    start = moment(start.format());
                    $('#date_start').val(start.format('YYYY-MM-DD'));
                    $('#addAppointmentModal').modal('show');
                },
    events: function( start, end, timezone, callback ){
        $.get('/appointmentList', function(response) {
            response.push({"title":"Cerrado(Hora Almuerzo)",
                    start:'12:00',
                    end:'14:30',
                    down:[1,2]
            });
            callback(response);
        }); //this should be a JSON request
        
        
    },

                eventClick: function(event, jsEvent, view){
                    var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                    var time_start = $.fullCalendar.moment(event.start).format('H(:mm)');
                    var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD H(:mm)');
                    $('#modal-event #delete').attr('data-id', event.id);
                    $('#modal-event #_title').val(event.title);
                    $('#modal-event #_date_start').val(date_start);
                    $('#modal-event #_time_start').val(time_start);
                    $('#modal-event #_date_end').val(date_end);
                    $('#modal-event').modal('show');
                }//
    		});

    	});

        $('.colorpicker').colorpicker();

       /** $('#time_start').bootstrapMaterialDatePicker({
            date: false,
            shortTime: false,
            format: 'HH:mm:ss'
        }); */

        $('#date_end').bootstrapMaterialDatePicker({
            date: true,
            shortTime: false,
            format: 'YYYY-MM-DD HH:mm:ss'
        });

        $('#delete').on('click', function(){
            var x = $(this);
            var delete_url = '/appointment/'+x.attr('data-id');

            var token = $("#token").val();
             $.ajax({
             url: delete_url,
             headers: {
                'X-CSRF-TOKEN': token
                },
                type: 'DELETE',
                success: function(result){
                    $('#modal-event').modal('hide');
                    alert(result.message);
                    $('#calendar').fullCalendar( 'refetchEvents');
                },
                error: function(result){
                    $('#modal-event').modal('hide');
                    alert(result.message);
                }
            });
        });
