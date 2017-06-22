 $(document).ready(function () {
    // Get the modal
    var modal1Id = document.getElementsByClassName('modal')[0].id;
    
    var modal1 = document.getElementById(modal1Id);
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            $("#"+modal1Id).modal('hide');
        }
    }
});
