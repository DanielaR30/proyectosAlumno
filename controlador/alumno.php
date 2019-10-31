  <?php
  require_once "../modelo/Alumno.php";

  $alumno = new Alumno();

  $idalumno=isset($_POST["idalumno"])? LimpiarCadena($_POST["idalumno"]):"";
  $iddistrito=isset($_POST["iddistrito"])? LimpiarCadena($_POST["iddistrito"]):"";
  $nombre=isset($_POST["nombre"])? LimpiarCadena($_POST["nombre"]):"";
  $apellido=isset($_POST["apellido"])? LimpiarCadena($_POST["apellido"]):"";

  switch($_GET["op"]){
      case 'guardar':
      $rspta=$alumno->insertar($iddistrito,$nombre,$apellido);
      echo  $rspta ? "Alumno Registrado" : "Alumno no se pudo registrar";

      break;

     
      

      case 'eliminar':
      $rspta=$alumno->eliminar($idalumno);
      echo  $rspta ? "Alumno Eliminado" : "Alumno no se pudo eliminar";
      break;

      case 'borrar': 
      $rspta=$alumno->borrar($idalumno);
      echo  $rspta ? "Alumno Eliminado" : "Alumno no se pudo eliminar";
      break;

      case 'listar':
        $rspta=$alumno->listar();
        $data= Array();
        while($reg=$rspta->fetch_object()){
          $data[]=array(
            "0"=>'<button class="btn btn-danger" onclick="eliminar('.$reg->idalumno.')" > <i  class="fa fa-trash"></i></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->apellido,
            "3"=> '<span class="label bg-green">'.$reg->nom_distrito.'</span>',
            "4"=> '<span class="label bg-blue">'.$reg->nom_provincia.'</span>',
            "5"=> '<span class="label bg-red">'.$reg->nom_departamento.'</span>',
          );
        }
        $results= array(
            "sEcho"=>1, 
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecord"=>count($data), 
            "aaData"=>$data);

            echo json_encode($results);

      break;

      case 'selectDepartamento':
      $rspta=$alumno->departamento();
      echo '<option value="" selected disabled> Seleccione departamento </option>';
      while($reg=$rspta->fetch_object()){
        echo '<option value='. $reg->iddepartamento .'>'. $reg->nom_departamento . '</option>';
      }

      break; 

      case 'selectProvincia':
      $iddepartamento=$_POST['iddepartamento'];
      $rspta=$alumno->provincia($iddepartamento);
      echo '<option value="" selected disabled>Seleccione Provincia </option>';
      while($reg=$rspta->fetch_object()){
        echo '<option value='.$reg->idprovincia.'>'.$reg->nom_provincia.'</option>';
      }

      break; 

      case 'selectDistrito':
      $idprovincia=$_POST['idprovincia'];
      $rspta=$alumno->distrito($idprovincia);
      echo '<option value="" selected disabled>Seleccione Distrito </option>';
      while($reg=$rspta->fetch_object()){
        echo '<option value='.$reg->iddistrito.'>'.$reg->nom_distrito.'</option>';
      }
      break; 



  }

  ?>