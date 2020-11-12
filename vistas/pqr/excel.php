<?php
header('Content-type: application/vnd.ms-excel;charset=utf-8');
header("Content-Disposition: attachment; filename=listado_pqr".date("YmdHis").".xls");
header("Pragma: no-cache");
header("Expires: 0");
include('../../configuracion/dbconf.php');
?>
 <table class="table table-bordered">
    <thead>
      <tr bgcolor="#67B3FF">
        <th>RADICADO</th>
        <th>NOMBRE DEL USUARIO</th>
        <th>TIPO DE PQR</th>
        <th>ASUNTO</th>
        <th>FECHA VENCIMIENTO</th>
        <th>ESTADO</th>
      </tr>
    </thead>
    <tbody>
        <?php
    
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
                    $buscar = $col1.$col2.$col3.$col4.$col5.$col6;

            $query_pqr = mysqli_query($con,"SELECT * FROM pqrs a, users b where a.id_usuario=b.id_user $buscar "  );

	while($row=mysqli_fetch_array($query_pqr))
	{  
               
                
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
                . '<td style="color:'.$estado_color.'">'.$row['pqr_estado'].'</td>';
          }
        
        ?>
      
    </tbody>
  </table>


