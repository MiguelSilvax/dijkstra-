<?php
class UsuariosModel extends Query{
    private $nombre, $user, $apellido, $clave, $dni, $mail , $rol;
    public function __construct() {
        parent::__construct();
    }
    public function getDatos( $usuario )
    {
        $sql = "SELECT Usuario , Password FROM loginempleado WHERE Usuario = '$usuario'";
        return $this->select($sql);
    }

    public function getUsuarios( $estado )
    {
        $sql = "SELECT e.DNIEmpleado,l.Usuario,e.Nombres,e.Apellidos,e.Email,l.estado,e.rol FROM empleado e inner join loginempleado l on(e.DNIEmpleado = l.DNIEmpleado) where l.estado = $estado";
        $data = $this->selectAll($sql);
        
        return $data;
    }

    public function insertarDatos( $user,  $nom,  $apellido,  $dni,  $mail,  $clave ,  $rol)
    {
        $this->user = $user;
        $this->nombre = $nom;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->mail = $mail;
        $this->clave = $clave;
        $sql = "CALL ADD_EMPLEADO(?,?,?,?,?,?,?)";
        $lista = array($this->dni, $this->nombre, $this->apellido, $this->mail, $this->user, $this->clave,$this->rol = $rol);
        $data = $this->save($sql , $lista);
        if ($data == 1) {
            $res = 'ok';
        }else{
            $res = 'error';
        }
        return $res; 
    }
}
