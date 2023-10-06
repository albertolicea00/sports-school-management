import * as consts from "./const.js";

window.addEventListener("ddbb-error", function ($event) {
    consts.swalWithBootstrapButtons
        .fire({
            icon: "error",
            title: "Oops...",
            timer: 5000,
            text: "Hubo un error al procesar sus datos!",
            footer:
                "<code> " +
                ($event.detail.code != undefined ? $event.detail.code + ' : ' : '')
                + $event.detail.message +
                "</code>",
        })
        .then(() => {
            window.location.href = $event.detail.redirect;
        });
});

window.addEventListener("pics-error", function ($event) {
    consts.swalWithBootstrapButtons
        .fire({
            icon: "warning",
            title: "Oops...",
            timer: 4000,
            text: "Hubo un error al procesar la imagen!",
            footer: "Luego, podrás actualizarla.",
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
        })
        .then((result) => {
            //   window.dispatchEvent(new CustomEvent('show-created-warning', {text : '¡Contacto creado exitosamente!', redirect : '/contactos'}));
        });
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

window.addEventListener("show-created-form", function ($event) {
    consts.swalWithBootstrapButtons
        .fire({
            position: "center",
            title: "Creado",
            html: $event.detail.text,
            icon: $event.detail.icon,
            // footer: "Algunos datos no han sido procesados del todo, luego podrás actualizarlos",
            timer: 5000,
        })
        .then(() => {
            window.location.href = $event.detail.redirect;
        });
});

window.addEventListener("show-updated-form", function ($event) {
    consts.swalWithBootstrapButtons
        .fire({
            position: "center",
            title: "Actualizado",
            html: $event.detail.text,
            icon: $event.detail.icon,
            timer: 5000,
        })
        .then(() => {
            window.location.href = $event.detail.redirect;
        });
});

window.addEventListener("show-recovery-form", function (event) {
    consts.Toast.fire({
        title: "¡Recuperado!",
        text: $event.detail.text,
        icon: $event.detail.icon,
    });
});

window.addEventListener("show-recovery-error", function (event) {
    consts.Toast.fire({
        title: "¡Error!",
        text: $event.detail.text,
        icon: "error",
    });
});










window.addEventListener("show-updated-message", function (event) {
    consts.Toast.fire({
        title: "¡ACTUALIZADO!",
        html:  event.detail.object + ' <strong>' + event.detail.target + '</strong> actualizado exitosamente',
        icon: "success",
    });
});
window.addEventListener("show-created-message", function (event) {
    consts.Toast.fire({
        title: "¡CREADO!",
        html:  event.detail.object + ' <strong>' + event.detail.target + '</strong> creado exitosamente',
        icon: "success",
    });
});

window.addEventListener("show-deleted-message", function (event) {
    consts.Toast.fire({
        title: "¡ELIMINADO!",
        html:  event.detail.object + ' <strong>' + event.detail.target + '</strong> eliminado exitosamente',
        icon: "success",
    });
});
window.addEventListener("show-restored-message", function (event) {
    consts.Toast.fire({
        title: "¡RESTAURADO!",
        html:  event.detail.object + ' <strong>' + event.detail.target + '</strong> restaurado exitosamente',
        icon: "success",
    });
});

window.addEventListener("show-save-confirm", function (event) {
    consts.swalWithBootstrapButtons
        .fire({
            title: "Seguro que decea "  + event.detail.action + ` un <strong>` + event.detail.object +`</strong>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Continuar",
            // input: "text",
            // preConfirm: (inp_action_id) => {
            //     if (inp_action_id != event.detail.action_id) {
            //         Swal.showValidationMessage(
            //             "El ID de la ACCIÓN no coincide"
            //         );
            //     }
            // },
        })
        .then((result) => {
            if (result.isConfirmed) {
                Livewire.emit(event.detail.emit_action);
            }
        });
});

window.addEventListener("show-delete-confirm", function (event) {
    consts.swalWithBootstrapButtons
        .fire({
            title: "¿Estas completamente seguro?",
            html: `<div class='text-start'>Al eliminar el ` + event.detail.object +
                ` <strong>` + event.detail.target + `</strong> ` +
                `no habra vuelta atras <br/><br/>Por motivos de seguridad deberá replicar el id de la acción a continuación <br/><br/>` +
                `<strong>ID de la ACCIÓN : </strong>` + event.detail.action_id + `</div>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, elimínelo!",
            input: "text",
            preConfirm: (inp_action_id) => {
                if (inp_action_id != event.detail.action_id) {
                    Swal.showValidationMessage(
                        "El ID de la ACCIÓN no coincide"
                    );
                }
            },
        })
        .then((result) => {
            if (result.isConfirmed) {
                Livewire.emit(event.detail.emit_action);
            }
        });
});

window.addEventListener("show-update-confirm", function (event) {
    consts.swalWithBootstrapButtons
        .fire({
            title: "¿Estas completamente seguro?",
            html: `<div class='text-start'>Al eliminar el ` + event.detail.object +
                ` <strong>` + event.detail.target + `</strong> ` +
                `no habra vuelta atras`,
                //  <br/><br/>Por motivos de seguridad debera replicar el id de la acción a continuación <br/><br/>` +
                // `<strong>ID de la ACCIÓN : </strong>` + event.detail.action_id + `</div>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, eliminalo!",
            // input: "text",
            // preConfirm: (inp_action_id) => {
            //     if (inp_action_id != event.detail.action_id) {
            //         Swal.showValidationMessage(
            //             "El ID de la ACCIÓN no coincide"
            //         );
            //     }
            // },
        })
        .then((result) => {
            if (result.isConfirmed) {
                Livewire.emit(event.detail.emit_action);
            }
        });
});
