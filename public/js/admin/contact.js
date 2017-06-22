
 $( '#contact-form' ).on( 'submit', function(e) {
        var button = document.getElementById("button");
        button.disabled = true;
        e.preventDefault();
        var contactName = $("#contact-form #contactName").val();
        var contactEmail = $("#contact-form #contactEmail").val();
        var contactSubject = $("#contact-form #contactSubject").val();
        var contactMessage = $("#contact-form #contactMessage").val();
        var route = 'sendContact';
        var token = $("#token").val();
      $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        dataType: 'json',
        data: {
          contactName, contactEmail, contactSubject, contactMessage
        },
        success: function(response) {
            toastr.clear()
            notifySuccess(response.message);
            var form = document.getElementById("contact-form");
            form.reset();
            document.getElementById("button").disabled = false;
        },
        error: function(response) {
          if (response.status == 422) {
            displayFieldErrors(response.error);
          }
        }
      });
    });