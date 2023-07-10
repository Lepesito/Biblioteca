    $('#registrar').click(function(event) {
    var nombre = $('#nombre').val();
    var correo = $('#correo').val();
    var password = $('#password').val();
    var expresionCorreo = /\w+@\w+\.+[a-z]/;
  
    if(nombre === '' || correo === '' || password === '') {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Todos los campos son obligatorios',
        showConfirmButton: false,
        backdrop: `
        rgba(118, 215, 196,1)
      `,
        timer: 1000,
      });
      return false;
    } else if(nombre.length < 4 || nombre.length > 20) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'El nombre debe tener entre 4 y 20 caracteres',
        showConfirmButton: false,
        backdrop: `
        rgba(118, 215, 196,1)
      `,
        timer: 1000
      });
      return false;
    } else if(!expresionCorreo.test(correo)) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'El correo no es válido',
        showConfirmButton: false,
        backdrop: `
        rgba(118, 215, 196,1)
      `,
        timer: 1000
      });
      return false;
    } else if(password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password)) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número',
        showConfirmButton: false,
        backdrop: `
        rgba(118, 215, 196,1)
      `,
        timer: 1000
      });
      return false;
    } else {
  
    }
  });
  

  $('#confirmar').click(function(event) {
    var password = $('#password').val();

  
    if(password === '') {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Todos los campos son obligatorios',
        showConfirmButton: false,
        backdrop: `
        rgba(118, 215, 196,1)
      `,
        timer: 1000,
      });
      return false;
    } else if(password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[0-9]/.test(password)) {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número',
        showConfirmButton: false,
        backdrop: `
        rgba(118, 215, 196,1)
      `,
        timer: 1000
      });
      return false;
    } else {
  
    }
  });