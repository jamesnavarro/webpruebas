<?php
include('../../configuracion/dbconf.php');
session_start();
?>

<button type="button" class="btn btn-info" onclick="form_pqr(0,'Nuevo')">Nuevo PRQ</button>   
<button type="button" class="btn btn-primary" onclick="exportar_excel_pqr()">Exportar Excel</button>   
  <table class="table table-bordered">
    <thead>
      <tr bgcolor="#67B3FF">
        <th>RADICADO</th>
        <th>NOMBRE DEL USUARIO</th>
        <th>TIPO DE PQR</th>
        <th>ASUNTO</th>
        <th>FECHA VENCIMIENTO</th>
        <th>ESTADO</th>
        <th>EDITAR</th>
        <th>BORRAR</th>
      </tr>
      <tr>
          <td><input type="text" id="bus_rad" class="form-control" onchange="views_table_pqr(1)"></td>
        <td><input type="text" id="bus_usuario" class="form-control" onchange="views_table_pqr(1)"></td>
        <td><select id="bus_tipo" class="form-control" onchange="views_table_pqr(1)">
                <option value="">Todas</option>
                <option value='Peticion'>Peticion</option>
                <option value="Queja">Queja</option>
                <option value="Reclamo">Reclamo</option>
              </select></td>
        <td><input type="text" id="bus_asunto" class="form-control" onchange="views_table_pqr(1)"></td>
        <td><input type="date" id="bus_limite" class="form-control" onchange="views_table_pqr(1)"></td>
        <td><select id="bus_estado" class="form-control" onchange="views_table_pqr(1)">
                <option value="">Todos</option>
                <option value="Nuevo">Nuevo</option>
                <option value="En ejecucion">En ejecución</option>
                <option value="Cerrado">Cerrado</option>
            </select></td>
            <td></td>
            <td></td>
      </tr>
    </thead>
    <tbody id="views_table">
      
    </tbody>
  </table>
<script> 
    $(document).ready(function() {
        views_table_pqr(1);
    });
</script>     
  
     

      







