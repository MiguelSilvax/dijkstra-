const formulario = document.querySelector('#formulario');
const correo = document.querySelector('#usuario');
const clave = document.querySelector('#clave');
const errorUsuario = document.querySelector('#errorUsuario');
const errorClave = document.querySelector('#errorClave');
errorUsuario.style.display = "none";
errorClave.style.display = "none";

document.addEventListener('DOMContentLoaded', function(){
    formulario.addEventListener('submit',function ( e ) {
        e.preventDefault();
        
        errorUsuario.textContent="";
        errorClave.textContent="";
        if (correo.value == "") {
            errorClave.style.display = "none";
            errorUsuario.style.display = "block";
            errorUsuario.textContent="El usuario está vacío";
        } else if(clave.value == ""){
            errorUsuario.style.display = "none";
            errorClave.style.display = "block";
            errorClave.textContent ="La contraseña está vacía";
        }else{
            errorUsuario.style.display = "none";
            errorClave.style.display = "none";

            //CREAR FORM DATA
            const data =  new FormData(this);
            const url = base_url + 'home/validar';
            //Haciendo una instancia del objeto xmlhttprequest
            const http = XMLHttpRequest();
            //Abrir una conexion - POST- GET
            http.open("POST",url,true);
            //Enviar datos
            http.send( data );
            //Verificar estados
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    Swal.fire(
                    'Mensaje',
                    res.msg,
                    res.type
                    )
                    if (res.type == "success") {
                        setTimeout(() => {
                            let timerInterval
                        Swal.fire({
                        title: res.msg,
                        html: 'Será redireccionado en <b></b> milisegundos.',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location = base_url + "admin";
                        }
                        })
                        }, 2000);                        
                    }
                   
                }
            };

        }
    });
});
