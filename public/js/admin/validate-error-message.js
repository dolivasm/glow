 jQuery.extend(jQuery.validator.messages, {
    required: "Este campo es requerido",
    remote: "votre message",
    email: "Correo invalido",
    url: "votre message",
    date: "Formato de fecha invalido",
    dateISO: "votre message",
    number: "Numero invalido",
    digits: "El valor ingrsado debe ser numerico",
    creditcard: "votre message",
    equalTo: "votre message",
    accept: "votre message",
    maxlength: jQuery.validator.format("Este campo debe contener como máximo {0} caractéres."),
    minlength: jQuery.validator.format("Este campo debe contener como minimo {0} caractéres."),
    rangelength: jQuery.validator.format("El valor debe teter entre {0} y {1} caractéres."),
    range: jQuery.validator.format("El valor debe de estar en el rango de {0} y {1}."),
    max: jQuery.validator.format("El valor ingresado debe ser menor o igual a {0}."),
    min: jQuery.validator.format("El valro ingresado debe de ser mayor o igual a {0}.")
  });