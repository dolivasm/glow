$(document).ready(function(){
    $('#birthday').daterangepicker({
        autoUpdateInput: false,
                "locale": {
            "format": "YYYY/MM/DD",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        singleDatePicker: true,
        showDropdowns: true
    }, 
    
    function(start, end, label) {
        var years = moment().diff(start, 'years');
    });
    
    
    $('input[name="birthday"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD'));
    });
    
    ////////////////////////////////////////////////////////////////////////////////
    
    $('#birthday2').daterangepicker({
        autoUpdateInput: false,
                "locale": {
            "format": "YYYY/MM/DD",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        singleDatePicker: true,
        showDropdowns: true
    }, 
    
    function(start, end, label) {
        var years = moment().diff(start, 'years');
    });
    
    
    $('input[name="birthday2"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD'));
    });
});



/**
function formatDate(form){
    alert(form);
    $('#'+form+' '+'#birthday').daterangepicker({
        autoUpdateInput: false,
                "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Apply",
            "cancelLabel": "Cancel",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        singleDatePicker: true,
        showDropdowns: true
    }, 
    
    function(start, end, label) {
        var years = moment().diff(start, 'years');
    });
    
     $('input[name="birthday"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY/MM/DD'));
    });
}
*/