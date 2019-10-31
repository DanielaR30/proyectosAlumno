<?php 
// incluir la conexion ala base datos 
require "../conexionDB/Conexion.php";

Class Alumno
{
    // implementamos nuestro constructor
    public function __construct()
    {

    }
    // emplementamos un metodo para el insert de registro
    public function insertar($iddistrito,$nombre,$apellido)
    {
        $sql="INSERT INTO alumno (iddistrito,nombre,apellido) VALUES ('$iddistrito','$nombre','$apellido')";
        return ejecutarConsulta($sql);
    }

    public function eliminar($idalumno)
    {
        $sql="DELETE FROM alumno WHERE idalumno='$idalumno'";
        return ejecutarConsulta($sql);
    }

    
    public function borrar()
    {
        $sql="DELETE FROM alumno";
        return ejecutarConsulta($sql);
    }

    public function listar(){
        $sql= "SELECT a.idalumno, a.nombre, a.apellido,di.nom_distrito,p.nom_provincia, d.nom_departamento FROM alumno as a 
        INNER JOIN distrito as di on di.iddistrito=a.iddistrito 
        INNER JOIN provincia as p on p.idprovincia=di.idprovincia 
        INNER JOIN departamento as d on d.iddepartamento= p.iddepartamento";
        return ejecutarConsulta($sql);
    }


    public function departamento(){
        $sql= "SELECT * FROM departamento";
        return ejecutarConsulta($sql);
    }

    public function provincia($iddepartamento){
        $sql= "SELECT * FROM provincia where iddepartamento='$iddepartamento' ";
        return ejecutarConsulta($sql);
    }
    
    public function distrito($idprovincia){
        $sql= "SELECT * FROM distrito where idprovincia='$idprovincia'";
        return ejecutarConsulta($sql);
    }



}




?>