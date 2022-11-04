let tblUsuario = document.getElementById('tblUsuario');
const formulario = document.querySelector('#formRegistrar');
const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const dni = document.querySelector('#dni');
const mail = document.querySelector('#mail');
const usuario = document.querySelector('#user');
const clave = document.querySelector('#clave');

const rol = document.querySelector('#rol');
const alerta = document.querySelector('#alerta');
alerta.style.display = "block";


document.addEventListener("DOMContentLoaded", function () {
    //cargando datos con el plugin datatables
    $(tblUsuario).DataTable({
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            {
                'data': 'DNIEmpleado'
            },
            {
                'data': 'Usuario'
            },
            {
                'data': 'Nombres'
            },
            {
                'data': 'Apellidos'
            },
            {
                'data': 'Email'
            },
            {
                'data': 'estado'
            },
            {
                'data': 'rol'
            }
        ],
        language: {
            url: base_url + "assets/js/espanol.json"
        },

    });
    //Registrar Usuarios
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        if (nombre.value == '' || apellido.value == '' || dni.value == '' || mail.value == '' || usuario.value == '' || clave.value == '' ||  rol.value=='') {
            alerta.style.display = "block";
            alerta.textContent = "*Todos los campos deben completarse*";
        } else{
            alerta.textContent = "";
            const data = new FormData(this);
            const url = base_url + 'usuarios/registrar';
            //Haciendo una instancia del objeto xmlhttprequest
            const http = XMLHttpRequest();
            //Abrir una conexion - POST- GET
            http.open("POST", url, true);
            //Enviar datos
            http.send(data);
            //Verificar estados
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
        }
    });
});


