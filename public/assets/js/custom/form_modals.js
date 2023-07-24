import * as consts from './const.js';




window.addEventListener('ddbb-error', function($event){
    consts.swalWithBootstrapButtons.fire({
      icon: 'error',
      title: 'Oops...',
      timer: 5000,
      text: "Hubo un error al procesar sus datos!",
      footer: "<code> " + $event.detail.code + " : " + $event.detail.message + "</code>"
  }).then(() => {
      window.location.href = $event.detail.redirect;
  })
});


window.addEventListener('pics-error', function($event){
    consts.swalWithBootstrapButtons.fire({
      icon: 'warning',
      title: 'Oops...',
      timer: 4000,
      text: "Hubo un error al procesar la imagen!",
      footer: "Luego, podrás actualizarla."
      // confirmButtonText: 'Continuar igualmente',
      // cancelButtonText: 'No, cancelar',
  // }).then((result) => {
      //     if (result.isConfirmed) {
      //         consts.swalWithBootstrapButtons.fire(
      //         'Deleted!',
      //         'Your file has been deleted.',
      //         'success'
      //         )
      //     } else if ( result.dismiss === Swal.DismissReason.cancel){
      //         window.location.href = "/crear-contactos";
      //     }
  }).then((result) => {
    //   window.dispatchEvent(new CustomEvent('show-created-warning', {text : '¡Contacto creado exitosamente!', redirect : '/contactos'}));
  })
});


// window.addEventListener('error-create-user-exist', function($event){
//     consts.swalWithBootstrapButtons.fire({
//         position: 'center' ,
//         title: '¡Ya existen usuarios con los emails!',
//         html: "Posteriormente puede crear un usuario y enlazarlo a este contacto de forma manualmente",
//         icon: 'warning',
//         timer: 10000
//     })
// });


window.addEventListener('show-created-form', function($event){
    consts.swalWithBootstrapButtons.fire({
      position: 'center' ,
      title: 'Creado',
      html: $event.detail.text,
      icon:  $event.detail.icon,
      // footer: "Algunos datos no han sido procesados del todo, luego podrás actualizarlos",
      timer: 5000
  }).then(() => {
      window.location.href = $event.detail.redirect;
  })
});

window.addEventListener('show-updated-form', function($event){
    consts.swalWithBootstrapButtons.fire({
      position: 'center' ,
      title: 'Actualizado',
      html: $event.detail.text,
      icon:  $event.detail.icon,
      timer: 5000
  }).then(() => {
      window.location.href = $event.detail.redirect;
  })
});



window.addEventListener('show-recovery-form', function(event){
    Toast.fire({
        title: '¡Recuperado!',
        text: $event.detail.text,
        icon: $event.detail.icon,
    });
});

window.addEventListener('show-recovery-error', function(event){
    Toast.fire({
        title: '¡Error!',
        text: $event.detail.text,
        icon: 'danger',
    });
});





window.addEventListener('show-delete', function(event){

});

