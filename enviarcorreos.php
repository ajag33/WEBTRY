<meta charset='utf-8'>
<?php

setlocale(LC_TIME, 'es_ES.UTF-8');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";
//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    if(isset($_POST['enviar'])){
        date_default_timezone_set('America/Lima');
        
        $hoy = date("F j, Y, g:i a"); 
        $name=$_POST['nombre'];
         $apellido=$_POST['apellido'];
        $correo=$_POST['correo'];
        $telefono=$_POST['telefono'];
        $asunto="Nombre Completo ".$name." ".$apellido."</br>"." Correo ".$correo."</br>"." Telefono ".$telefono."</br>"." Fecha Registro ".$hoy;
    
        //server 

         //Server settings
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'j.balcazar.f@gmail.com';                     //SMTP username
    $mail->Password   = 'DELVX952213@.18';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`  ENCRYPTION_SMTPS

    //Recipients
    $mail->setFrom('canaldedenuncias@toshiko.com.pe', 'Canal de Denuncia Grupo Toshiko');
    $mail->addAddress('fgutierrez@toshiko.com.pe', 'Jose User');     //Add a recipient
    $mail->addAddress('canaldedenuncias@toshiko.com.pe');      //Name is optional
    $mail->addAddress('administracion@toshiko.com.pe');
    $mail->addAddress($correo); 
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject =$name;
    $mail->Body    = "<html><body><p>Registro de Denuncia.</p><p><p>Datos Persolanes</p>".$asunto;
    $mail->AltBody = 'TEXTO non-HTML mail clients';

    $mail->send();
    
     echo "<script>location.href='http://www.toshiko.com.pe/formulario_plan_den.html';</script>";
die();
    }

    
     else{
         echo "<script>location.href='http://www.toshiko.com.pe/formulario_plan_den.html';</script>";
die();
     }
     
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
