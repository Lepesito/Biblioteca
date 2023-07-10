$('#enviar').click(function (event) {
    var titulo, descripcion, precio, gratis, idAutores;
    titulo = $('#titulo').val();
    descripcion = $('#descripcion').val();
    precio = $('#precio').val();
    gratis = $('#gratis').val();
    idAutores = $('#idAutores').val();

    if (titulo.length == 0 || descripcion.length == 0 || precio.length == 0 || gratis.length == 0 || idAutores.length == 0) {
        swal("Error...", "No deben haber campos vacíos!", "error");
        return false;
    } else if (titulo.length > 45) {
        swal("Error...", "El título no debe exceder los 45 caracteres", "error");
        return false;
    } else if (descripcion.length > 255) {
        swal("Error...", "La descripción no debe exceder los 255 caracteres", "error");
        return false;
    } else if (precio < 0) {
        swal("Error...", "El precio no puede ser menor que cero", "error");
        return false;
    } else {
        // Realizar cualquier otra acción necesaria después de la validación
        document.getElementById("form").submit();
    }
});
