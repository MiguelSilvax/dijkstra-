<?php
class HomeModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getDatos( $usuario )
    {
        $sql = "SELECT Usuario , Password, DNIEmpleado FROM loginempleado WHERE Usuario = '$usuario'";
        return $this->select($sql);
    }

    public function datosPersonales( $dni )
    {
        $sql = "SELECT DNIEmpleado, CONCAT(Nombres ,' ',Apellidos) as Nombre ,Rol from empleado where DNIEmpleado = $dni";
        return $this->select($sql);
    }
}   
?>