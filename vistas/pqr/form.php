<?php
include('../../configuracion/dbconf.php');
session_start();
?>
<?php if($_GET['id']!=0){ ?>

<div class="form-group">
              <label for="usuario">Radicado </label>
              <input type="text" disabled id="p_id"  class="form-control" value="">
              <span id="msj1"></span>
            </div> 
    <?php }else{ ?>
          <input id="p_id" type="hidden" class="form-control" value="">
    <?php } ?>
<div class="form-group">
              <label for="usuario">Usuarios </label>
              <select id="p_usuario" class="form-control">
                  <option value="">Seleccione el usuario</option>
                <?php
                $query = mysqli_query($con,"select * from users where estado='Activo' ");
                while ($row = mysqli_fetch_array($query)) {
                    echo '<option value="'.$row['id_user'].'">'.$row['nombre'].'</option>';
                }
                
                ?>
              </select>
              <span id="msj1"></span>
            </div>   
            <div class="form-group">
              <label for="tipo">Tipo:</label>
              <select id="p_tipo" class="form-control">
                <option value="">Seleccione</option>
                <option value='Peticion'>Peticion</option>
                <option value="Queja">Queja</option>
                <option value="Reclamo">Reclamo</option>
              </select>
              <span id="msj2"></span>
            </div>
            <div class="form-group">
              <label for="femail">Asunto PQR </label>
              <textarea class="form-control" id="p_asunto" rows="4" placeholder="Describa el pqr..." ></textarea>
              <span id="msj3"></span>
            </div>
            <div class="form-group">
              <label for="estado">Estado</label>
              <select id="p_estado" class="form-control" disabled>
                
                <option value="Nuevo">Nuevo</option>
                <option value="En ejecucion">En ejecucion</option>
                <option value="Cerrado">Cerrado</option>
              </select>
              <span id="msj2"></span>
            </div>
            
           

     <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="registrar_pqr()">Registrar PQR</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="list_pqr()">Cancelar</button>
      </div>
<script> 
    <?php if($_GET['id']!=0){ ?>
    $(document).ready(function() {
        show_pqr(<?php echo $_GET['id']; ?>,'<?php echo $_GET['estado']; ?>');
    });
    <?php } ?>
</script>  