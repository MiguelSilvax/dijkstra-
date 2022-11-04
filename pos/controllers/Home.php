<?php
class Home extends Controller{

    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
        
    {
        $data['title'] = "Iniciar sesión";
        $this->views->getView('principal', 'login', $data);
    }

    //Validar formulario de login   
    public function validar()
    {
        if (isset($_POST['usuario']) && isset($_POST['clave'])) {
            if (empty($_POST['usuario'])) {
                $res = array('msg' => "El usuario está vacío" , 'type' => 'warning');
            }else if(empty($_POST['clave']) ){
                $res = array('msg' => "La contraseña está vacía", 'type' => 'warning');
            } else {
                $usuario = strClean($_POST['usuario']);
                $clave = strClean($_POST['clave']);
                $data = $this->model->getDatos($usuario);
                if (empty($data)) {
                    $res = array('msg' => 'Este usuario no existe', 'type' => 'warning');
                }else{
                    $this->dni = $data['DNIEmpleado'];
                    if (password_verify($clave, $data['Password'])) {
                        $_SESSION['nombre_usuario'] = $data['Usuario'];
                        $_SESSION['clave'] = $data['Password'];
                        $res = array('msg' =>'Datos correctos', 'type' => 'success');
                    }else{
                        $res = array('msg' =>'Contraseña incorrecta', 'type' => 'warning');
                    }
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