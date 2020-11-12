$(function(){
     $('#email').change(function(){
        $("#v2").html('');
      }); 
      $('#password').change(function(){
        $("#v3").html('');
      }); 
      $('#nombre').change(function(){
        $("#v1").html('');
      }); 
       $('#inputEmail').change(function(){
        $("#msj1").html('');
      }); 
      $('#inputPassword').change(function(){
        $("#msj2").html('');
      }); 
      
 });
function create_user(){
 
        var email = $("#email").val();
        var password = $("#password").val();
        var nombre = $("#nombre").val();

        if (nombre===''){
            $("#v1").html('<font color="red">debes de digitar el password</font>');  
            $("#nombre").focus();
            return false;
         }
        if (email===''){
            $("#v2").html('<font color="red">debes de digitar el email</font>'); 
            $("#email").focus();
            return false;
         }
         if (password===''){
            $("#v3").html('<font color="red">debes de digitar el password</font>'); 
            $("#pwd").focus();
            return false;
         }
         
    $.ajax({
            type: 'GET',
            data: 'email='+email+'&nombre='+nombre+'&password='+password+'&sw=1',
            url: 'vistas/user/modelo.php', 
            success: function(datos){
               alert(datos);
               location.href='index.php';
               
            }
           });
}
function validate_user(){
        var email = $("#inputEmail").val();
        var clave = $("#inputPassword").val();

        if (email===''){
             $("#msj1").html('<font color="red">debes de digitar el password</font>'); 
            $("#inputEmail").focus();
            return false;
         }
         if (clave===''){
            $("#msj2").html('<font color="red">debes de digitar el password</font>'); 
            $("#pas").focus();
            return false;
         }
    $.ajax({
            type: 'GET',
            data: 'email='+email+'&clave='+clave+'&sw=2',
            url: 'vistas/user/modelo.php', 
            success: function(datos){
                var p = eval(datos);
                if(p[0]==1){
                    location.href='vistas/index.php';
                }else{
                    alert(p[1]);
                }        
            }
           });
}
function list_pqr(page){
      $.ajax({
                type: 'GET',
                url: '../vistas/pqr/index.php',
                success: function(t) {
                    $("#titulo").html('Listado de PQR');
                    $("#principal").html(t);
                }
});
 }
function form_pqr(id,est){
      $.ajax({
                type: 'GET',
                data:'estado='+est+'&id='+id,
                url: '../vistas/pqr/form.php',
                success: function(t) {
                    $("#titulo").html('REGISTRO DE NUEVO PQR');
                    $("#principal").html(t);
                }
});
 }
 function registrar_pqr(){
        var use = $("#p_usuario").val();
        var tip = $("#p_tipo").val();
        var asu = $("#p_asunto").val();
        var est = $("#p_estado").val();
        var id = $("#p_id").val();
        if (use===''){
             $("#msj1").html('<font color="red">debes de seleccionar el usuario</font>'); 
            $("#p_usuario").focus();
            return false;
         }else{
             $("#msj1").html(''); 
         }
         if (tip===''){
            $("#msj2").html('<font color="red">debes de seleccionar el tipo de pqr!</font>'); 
            $("#p_tipo").focus();
            return false;
         }else{
             $("#msj2").html(''); 
         }
         if (asu ===''){
            $("#msj3").html('<font color="red">debes de describir el asunto</font>'); 
            $("#p_asunto").focus();
            return false;
         }else{
             $("#msj3").html(''); 
         }
 
    $.ajax({
            type: 'GET',
            data: 'use='+use+'&tip='+tip+'&asu='+asu+'&est='+est+'&id='+id+'&sw=1',
            url: '../vistas/pqr/modelo.php', 
            success: function(datos){
                alert(datos);
                list_pqr();
            }
           });
}

function views_table_pqr(page){
    var rad = $("#bus_rad").val();
    var usu = $("#bus_usuario").val();
    var tip = $("#bus_tipo").val();
    var asu = $("#bus_asunto").val();
    var lim = $("#bus_limite").val();
    var est = $("#bus_estado").val();
      $.ajax({
                type: 'GET',
                data: 'rad='+rad+'&usu='+usu+'&tip='+tip+'&asu='+asu+'&lim='+lim+'&est='+est+'&page='+page+'&sw=2',
                url: '../vistas/pqr/modelo.php',
                success: function(t) {
                    $("#views_table").html(t);
                }
});
 }
 function exportar_excel_pqr(){
    var rad = $("#bus_rad").val();
    var usu = $("#bus_usuario").val();
    var tip = $("#bus_tipo").val();
    var asu = $("#bus_asunto").val();
    var lim = $("#bus_limite").val();
    var est = $("#bus_estado").val();
     location.href='../vistas/pqr/excel.php?rad='+rad+'&usu='+usu+'&tip='+tip+'&asu='+asu+'&lim='+lim+'&est='+est;
 }
 function delete_pqr(id){
     var x = confirm("Estas seguro de borrar este PQR ?");
     if(x)
      $.ajax({
                type: 'GET',
                data: 'id='+id+'&sw=4',
                url: '../vistas/pqr/modelo.php',
                success: function(t) {
                    alert(t);
                    list_pqr(1);
                }
});
 }
 function show_pqr(id,est){

      $.ajax({
                type: 'GET',
                data:'estado='+est+'&id='+id+'&sw=3',
                url: '../vistas/pqr/modelo.php',
                success: function(t) {
                    var col = eval(t);
                     $("#p_id").val(col[0]);
                     $("#p_usuario").val(col[1]);
                     $("#p_tipo").val(col[2]);
                     $("#p_asunto").val(col[3]);
                     $("#p_estado").val(col[4]);
                }
});
 }
  function update_pqr(id,est){

      $.ajax({
                type: 'GET',
                data:'estado='+est+'&id='+id+'&sw=5',
                url: '../vistas/pqr/modelo.php',
                success: function(t) {
                    alert(t);
                }
});
 }