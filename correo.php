<?php
if(isset($_POST['enviar'])){

    $name=$_POST['nombre'];

    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];

$asunto=$name." ".$apellido;

$header="From: noreply@example.com"."\r\n";
$header.="Reply-To: noreply@example.com"."\r\n";
$header.="X-Mailer: PHP/".phpversion();
    $email= @mail($correo,$asunto,$telefono,$header);
    if($email){
        echo "ENVIADO CON EXITO"
    }



}

?>