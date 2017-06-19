 $(document).ready(function () {
    // Get the modal
    var modal1Id = document.getElementsByClassName('modal')[0].id;
    var modal2Id = document.getElementsByClassName('modal')[1].id;
    var modal3Id = document.getElementsByClassName('modal')[2].id;
    
    var modal1 = document.getElementById(modal1Id);
    var modal2 = document.getElementById(modal2Id);
    var modal3 = document.getElementById(modal3Id);
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1 || event.target == modal2 ||event.target == modal3) {
            $("#"+modal1Id).modal('hide');
            $("#"+modal2Id).modal('hide');
            $("#"+modal3Id).modal('hide');
        }
    }
});
