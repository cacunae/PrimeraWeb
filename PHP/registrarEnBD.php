<?php

include 'enviar.php';

$nombre = $_POST["nombres"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$comentario = $_POST["comentario"];

//INSERT

$insertar = "INSERT INTO datos_form(nombre, telefono, correo, comentario) VALUES('$nombre', '$telefono', '$correo', '$comentario')";


$verificar_usuario = mysqli_query($conexion, "SELECT * FROM datos_form WHERE correo = '$correo'");
if(mysqli_num_rows($verificar_usuario) > 0){
    
    echo '<script>
            alert("Este usuario ya existe");
            window.history.go(-1);
            </script>';
    exit; 
    
}


$resultado = mysqli_query($conexion, $insertar);

if(!$resultado){
    echo '
            <script>alert("ha ocurrido un problema al ingresar el usuario")
            window.history.go(-1);
            </script>
         ';
}
else{
    echo '<script>
            alert("El usuario ha sido registrado");
            window.history.go(-1);
          </script>';
    
}

mysqli_close($conexion);

?>
