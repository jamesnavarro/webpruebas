<?php
include('../../configuracion/dbconf.php');
session_start();

switch ($_GET['sw']) {
        case 1:
            $nombre=$_GET['nombre'];
            $email=$_GET['email'];
            $password=md5($_GET['password']);

            $query = mysqli_query($con,"select count(id_user) from users where email='$email' ");
            $row = mysqli_fetch_array($query);
            
            if($row['count(id_user)']==0){
                $ver=mysqli_query($con,"INSERT INTO `users` (`id_user`, `email`, `password`, `nombre`, `estado`, `tipo`) VALUES (NULL, '$email', '$password', '$nombre', 'Activo', 'Usuario')");
                echo 'SE HA REGISTRADO EL USUARIO CON EXITO';
            }
            else{
                echo 'YA USTED ESTA REGISTRADO EN EL SISTEMA';
            }
            
            break;
            case 2:
                 $usuario= trim($_GET['email']);
                 $password=md5($_GET['clave']);
                 $query = mysqli_query($con,"SELECT * FROM users where email='$usuario' and password='$password' and estado='Activo' "); //consultA modificada por navabla
                 $fila = mysqli_fetch_array($query);
                 if($fila['id_user']!=''){
                    $_SESSION['id_user']=$fila['id_user'];
                    $_SESSION['email']=$fila['email']; 
                    $_SESSION['role']=$fila['tipo'];
                    $_SESSION['nombre']=$fila['nombre'];
                    $valor = '1';
                    $msg = '';
                 }else{
                     $msg= 'El email o contraseña son incorrecta';
                     $valor = '0';
                 }
                 $p = array();
                 $p[0] = $valor;
                 $p[1] = $msg;
                 echo json_encode($p);

            exit();
            break;
            }

