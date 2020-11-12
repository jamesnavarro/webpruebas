<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Methods: POST, GET,PUT,DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include('../configuracion/dbconf.php');

if($_SERVER['REQUEST_METHOD']=='GET'){
        
            $consulta = mysqli_query($con,"select * from pqrs where id_usuario=".$_GET['usuario']." ");
            $p= array();
            while($row = mysqli_fetch_array($consulta)){
                    $p[] = $row;
            }
            echo (json_encode($p));
}
if($_SERVER['REQUEST_METHOD']=='POST'){
            $input = json_decode(file_get_contents("php://input"));
            $tipo_pqr = $input->tipo;
            if($tipo_pqr=='Peticion'){
                $sumar_dia = 7;
            }
            if($tipo_pqr=='Quejas'){
                $sumar_dia = 3;
            }
            if($tipo_pqr=='Reclamo'){
                $sumar_dia = 2;
            }
             $fecha_vencimiento =  date("Y-m-d",strtotime(date("Y-m-d")."+ ".$sumar_dia." days")); 

            $validar_datos =mysqli_query($con,"INSERT INTO `pqrs` (`id_pqr`, `pqr_asunto`, `pqr_tipo`, `pqr_estado`, `pqr_registro`, `pqr_limite`, `id_usuario`) VALUES (NULL, '".$input->asunto."', '".$input->tipo."', 'Nuevo', '".date("Y-m-d")."', '$fecha_vencimiento', '".$input->usuario."')");
            if($validar_datos){
                $input -> id = $con->insert_id;
                echo (json_encode(array('result'=>$input)));
            }else{
                echo (json_encode(array('result'=>'error')));
            }
}
if($_SERVER['REQUEST_METHOD']=='PUT'){
        $id_pqr = $con->real_escape_string($_GET['id']);
        $input = json_decode(file_get_contents("php://input"));
        $estado_pqr=$input->estado;
        $resultado = mysqli_query($con,"update pqrs set pqr_estado='$estado_pqr' where id_pqr='$id_pqr' ");
        if($resultado){
             echo '1';
        }else{
             echo '0';
        }

}
if($_SERVER['REQUEST_METHOD']=='DELETE'){

        $id = $con->real_escape_string($_GET['id']);
        $input = json_decode(file_get_contents("php://input"));
        $resultado = mysqli_query($con,"delete from pqrs where id_pqr='$id' ");
         if($resultado){
           echo (json_encode(array('estado'=>'eliminado')));
         }else{
           echo (json_encode(array('estado'=>'error')));
         }
   
}
