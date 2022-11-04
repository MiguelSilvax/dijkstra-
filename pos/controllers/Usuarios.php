<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = "Usuarios";
        $data['script'] = 'usuarios.js';
        $this->views->getView("usuarios", "index", $data);
    }
    

    #Listar en la tabla de usuarios
    public function listar()
    {
        $data = $this->model->getUsuarios( 1 );    
        for ($i=0; $i < count($data) ; $i++) {
            
            if ($data[$i]['rol'] == 1) {
                $data[$i]['rol'] = '<span class="badge bg-success">SUPER-ADMINISTRADOR</span>';
            }else{
                $data[$i]['rol'] = '<span class="badge bg-info">VENDEDOR</span>';

            }
            $data[$i]['acciones']='';
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        if (isset($_POST)) {
            
            if (empty($_POST['nombre'])) {
                $res = array('msg' => 'El nombre es requerido','type' =>'warning');
            } else if(empty($_POST['apellido'])) {
                $res = array('msg' => 'El apellido es requerido', 'type' => 'warning');
            } else if (empty($_POST['dni'])){
                $res = array('msg' => 'El DNI es requerido', 'type' => 'warning');
            } else if (empty($_POST['user'])) {
                $res = array('msg' => 'El usuario es requerido', 'type' => 'warning');
            } else if (empty($_POST['clave'])) {
                $res = array('msg' => 'La clave es requerida', 'type' => 'warning');
            } else if (empty($_POST['rol'])) {
                $res = array('msg' => 'La rol es requerido', 'type' => 'warning');
            } else if (empty($_POST['mail'])) {
                $res = array('msg' => 'El correo es requerido', 'type' => 'warning');
            }else{
                //$res = array('msg' => 'Datos correctos', 'type' => 'success');
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $user = $_POST['user'];
                $clave = $_POST['clave'];
                $rol = $_POST['rol'];
                $mail = $_POST['mail'];

                $data = $this->model->insertarDatos($user, $nombre , $apellido ,$dni , $mail , $clave ,$rol );

                if ($data == 'ok') {
                  $res = array('msg' => 'Usuario registrado' , 'type' => 'success');
                }else{
                    $res = array('msg' => 'Error al registrar', 'type' => 'error');
                }

            }
            
        }else{
                $res = array('msg' => 'Error desconocido', 'type' => 'error');
                
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}

?>
