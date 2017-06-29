//This Functios is to Open a Add News Modal
function btn_addNews() {
    $.get('news/create', function(response) {
        $('#divForAddNews').html(response);
        //Validation method with jquery validate
        $("#addNewsForm").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                postNews();
            }
        });


    });

    $('#addNewsModal').modal('show');
}

function editNews(id) {
    $.get('news/' + id + '/edit', function(response) {
        $('#divForEditNews').html(response);
        $("#formEditNews").validate({
            submitHandler: function(form) {
                //This methos is callback  when the form is valid
                putNews();
            }
        });
    });
    $('#editNewsModal').modal('show');
}

function deleteNews(id) {
    $('#deleteNewsModal').modal('show');
    $('#idNewsDelete').val(id);
}
//This method insert a new news.
function postNews() {
    document.getElementById("addNewsSubmit").disabled = true;
    var token = $("#token").val();
    var route = "/news";
    var formulario = $('#addNewsForm');
    var datos = formulario.serialize();
    var archivos = new FormData();

    archivos.append('title', $("#addNewsForm #title").val());
    archivos.append('description', $("#addNewsForm #description").val());

    for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {

        archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
    }
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
        data: archivos,
        success: function(response) {
            $("#addNewsModal").modal('hide');
            toastr.clear()
            notifySuccess(response.message);
            //Reload the news
            loadNews();

        },
        error: function(response) {
                document.getElementById("addNewsSubmit").disabled = false;
            if (response.status == 422) {
                displayFieldErrors(response);
            } else {
                notifyError(response.error);
            }
        }
    });
}
//This method update the news selected to edit
function putNews() {
    document.getElementById("editNewsSubmit").disabled = true;
    var value = $("#formEditNews #id").val();
    var token = $("#formEditNews #token").val();
    var route = "/update-news";
    var formulario = $('#formEditNews');
    var datos = formulario.serialize();
    var archivos = new FormData();

    archivos.append('id', value);
    archivos.append('title', $("#formEditNews #title").val());
    archivos.append('description', $("#formEditNews #description").val());

    for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {

        archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
    }
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
        data: archivos,
        success: function(response) {
            $("#editNewsModal").modal('hide');
            toastr.clear()
            notifySuccess(response.message);
            //Reload the news
            loadNews();

        },
        error: function(response) {
            document.getElementById("editNewsSubmit").disabled = false;
            if (response.status == 422) {
                displayFieldErrors(response);
            } else {
                notifyError(response.error);
            }
        }
    });

}

function acceptDeleteNews() {
    var route = "news/" + $('#idNewsDelete').val() + "";
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function(response) {
            notifySuccess(response.message);
            loadNews();
            $("#deleteNewsModal").modal('hide');
        },
        error: function(response) {
            notifyError(response.error);
        }
    });
}
    
