import { swalWithBootstrapButtons } from './const.js';


window.addEventListener('show-in-progress', function($event){
    swalWithBootstrapButtons.fire({
      position: 'center' ,
      title: '<p class="h3"><i class="fas fa-tools"></i> &nbsp; En construcción</p>',
      html: 'vuelva pronto para ver esta acción en funcionamiento',
      icon: 'warning',
      timer: 5000,
  })
});

window.addEventListener('cocking-time', function($event){
    let timerInterval
    Swal.fire({
        // imageUrl: '../assets/img/logos/notification_plane_30.gif',
        // imageWidth: 400,
        // imageHeight: 200,
        //   title: 'Lo estamos cocinando',
        //   html: 'Esto tomará unos segundos <img class="w-25 m-auto mt-4 mb-2" src="../assets/img/logos/loading.gif">',
        //   title: 'Lo estamos cocinando',
        html: 'Cargando ...',
        timer: $event.detail.time,
        timerProgressBar: true,
        allowOutsideClick: false,
        backdropOpacity: 0.2,
        showConfirmButton: false,
        showCancelButton: false,
        // allowEscapeKey: false,
        didOpen: () => {
            console.log();
            // Swal.showLoading()
            // const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                // b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    })
});
