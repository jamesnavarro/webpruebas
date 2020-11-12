<?php
include('../../configuracion/dbconf.php');
session_start();

switch ($_GET['sw']) {
        case 1:
            $use=$_GET['use'];
            $tip=$_GET['tip'];
            $asu=$_GET['asu'];
            
             $id=$_GET['id'];
             $est=$_GET['est'];
              
            if($tip=='Queja'){
                $sumar_dia = 3;
            }
            if($tip=='Peticion'){
                $sumar_dia = 7;
            }
            if($tip=='Reclamo'){
                $sumar_dia = 2;
            }
            if($id==''){
                    $fecha_vencimiento =  date("Y-m-d",strtotime(date("Y-m-d")."+ ".$sumar_dia." days")); 
                    $validar_datos =mysqli_query($con,"INSERT INTO `pqrs` (`id_pqr`, `pqr_asunto`, `pqr_tipo`, `pqr_estado`, `pqr_registro`, `pqr_limite`, `id_usuario`) VALUES (NULL, '$asu', '$tip', 'Nuevo', '".date("Y-m-d")."', '$fecha_vencimiento', '$use')");
                    if($validar_datos){
                        echo 'LA PQR SE HA REGISTRADO.';
                    }else{
                        echo 'ERROR AL GUARDAR PQR'.mysqli_error($con);
                    }
            }else{
                    $resultado = mysqli_query($con,"update pqrs set pqr_estado='$est', pqr_asunto='$asu' where id_pqr='$id' ");
                    if($resultado){
                        echo 'LA PQR HA CAMBIADO DE ESTADO A '.$est.' ';
                    }else{
                        echo 'ERROR AL CAMBIAR EL ESTADO';
                    }
                
            }
            
            break;
            case 2:
            
                   $page= $_GET['page'];
                    $rad= $_GET['rad'];
                    $usu= $_GET['usu'];
                    $tip= $_GET['tip'];
                    $asu= $_GET['asu'];
                    $lim= $_GET['lim'];
                    $est= $_GET['est'];
                    if($rad==''){
                        $col1 = '';
                    }else{
                        $col1 = " and a.id_pqr= '$rad' ";
                    }
                    if($usu==''){
                        $col2 = '';
                    }else{
                        $col2 = " and b.nombre like '".$usu."%' ";
                    }
                    if($asu==''){
                        $col3 = '';
                    }else{
                        $col3 = " and a.pqr_asunto like '".$asu."%' ";
                    }
                    if($lim==''){
                        $col4 = '';
                    }else{
                        $col4 = " and a.pqr_limite= '$lim' ";
                    }
                    if($est==''){
                        $col5 = '';
                    }else{
                        $col5 = " and a.pqr_estado= '$est' ";
                    }
                    if($tip==''){
                        $col6 = '';
                    }else{
                        $col6 = " and a.id_pqr= '$rad' ";
                    }
                    if($_SESSION['role']=='Administrador'){
                         $col7 = '';
                    }else{
                         $col7 = " and b.id_user = '".$_SESSION['id_user']."' ";
                    }
                    
                    $buscar = $col1.$col2.$col3.$col4.$col5.$col6.$col7;
                  
                   
 
            $request = mysqli_query($con,"SELECT count(*) FROM pqrs a, users b where a.id_usuario=b.id_user $buscar ");

            if($request){
                    $request = mysqli_fetch_row($request);
                    $cantidad_items = $request[0];
            }else{
                    $cantidad_items = 0;
            }
            $rows_by_page = 5;
            $last_page = ceil($cantidad_items/$rows_by_page);

            $limit = 'LIMIT ' .($page - 1) * $rows_by_page .',' .$rows_by_page; 
            $query_pqr = mysqli_query($con,"SELECT * FROM pqrs a, users b where a.id_usuario=b.id_user $buscar " .$limit );

	while($row=mysqli_fetch_array($query_pqr))
	{  
               
                
                    if($_SESSION['role']=='Administrador'){
                         
                         if($row['pqr_estado']=='Cerrado'){
                            $disabled = 'disabled';
                        }else{
                            $disabled = '';
                        }
                    }else{
                         $disabled = 'disabled';
                    }
                
                if($row['pqr_limite']==date("Y-m-d")){
                    $estado_color = 'green';
                }
                if($row['pqr_limite']>date("Y-m-d")){
                    $estado_color = 'blue';
                }
                if($row['pqr_limite']<date("Y-m-d")){
                    $estado_color = 'red';
                }
                 $estado_pqr = "'".$row['pqr_estado']."'";
                echo '<tr>'
                . '<td>'.$row['id_pqr'].'</td>'
                . '<td>'.$row['nombre'].'</td>'
                . '<td>'.$row['pqr_tipo'].'</td>'
                . '<td>'.$row['pqr_asunto'].'</td>'
                . '<td>'.$row['pqr_limite'].'</td>'
                . '<td style="color:'.$estado_color.'">'.$row['pqr_estado'].'</td>'
                . '<td><button onclick="form_pqr('.$row['id_pqr'].','.$estado_pqr.')" '.$disabled.' class="btn btn-primary">Editar</button></td>'
                . '<td><button onclick="delete_pqr('.$row['id_pqr'].')" '.$disabled.' class="btn btn-danger">Borrar</button></td>';
  }
   echo '<tr><td colspan="9">';
                if($page>1){?>
                        <img src="imagenes/a1.png"  onclick="mostrar(1)" style="cursor: pointer;">
                        <img src="imagenes/a11.png"  onclick="mostrar(<?php echo $page - 1;?>)" style="cursor: pointer;">
                <?php
              }else{
                        ?><img src="imagenes/a1.png"> <img src="imagenes/a11.png"><?php
                }
                ?>
                        (<b>Pagina</b> <input type="text" id="page" value="<?php echo $page;?>" style="width: 30px; height: 20px" disabled><b>de</b><?php echo $last_page;?>)
                <?php
                if($page<$last_page){?>
                        <img src="imagenes/p1.png"  onclick="mostrar(<?php echo $page + 1;?>)" style="cursor: pointer;">
                        <img src="imagenes/p11.png" onclick="mostrar(<?php echo $last_page;?>)" style="cursor: pointer;">
                <?php
                }else{
                        ?><img src="imagenes/p1.png"> <img src="imagenes/p11.png"> <?php
                }
                
                echo 'Cantidad de pqr generadas '.$cantidad_items; 
               echo '</td></tr>';
            
            
            break;
        case 3:
            $id=$_GET['id'];
            $estado=$_GET['estado'];
            $resultado = mysqli_query($con,"select * from pqrs where id_pqr='$id' ");
            $fila = mysqli_fetch_array($resultado);
            if($fila['pqr_estado']=='Nuevo'){
                $nuevo_estado = 'En ejecucion';
            }elseif ($fila['pqr_estado']=='En ejecucion') {
                $nuevo_estado = 'Cerrado';
             }
            $p = array();
            $p[0] = $fila['id_pqr'];
            $p[1] = $fila['id_usuario'];
            $p[2] = $fila['pqr_tipo'];
            $p[3] = $fila['pqr_asunto'];
            $p[4] = $nuevo_estado;
            echo json_encode($p);
            
            break;
            case 4:
                $id=$_GET['id'];
               $resultado = mysqli_query($con,"delete from pqrs where id_pqr='$id' ");
               if($resultado){
                   echo 'SE ELIMINO CON EXITO EL ITEMS';
               }else{
                   echo 'ERROR AL ELIMINAR EL ITEMS';
               }
            
            break;
           

            }

