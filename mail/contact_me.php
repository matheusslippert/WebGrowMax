<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	    ||
   empty($_POST['telefone'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	    echo "No arguments Provided!";
	    return false;
   }

	require('phpmailer/5.2.10/PHPMailerAutoload.php');
    require('phpmailer/5.2.10/class.phpmailer.php');
    
    $name = $_POST['name'];
    $email_address = $_POST['email'];
    $message = $_POST['message'];

    $m = new PHPMailer();
    $m->IsSMTP();
    $m->SMTPDebug  	= true;					// enables SMTP debug information (for testing) [default: 2]
    $m->SMTPAuth   	= true;						// enable SMTP authentication
    $m->Host       	= 'smtp.gmail.com'; 	// sets the SMTP server
    $m->Port       	= 587;		// set the SMTP port for the GMAIL server
    $m->Username   	= 'paulo.krj@gmail.com';		// SMTP account username
    $m->Password   	= 'tecno123';		// SMTP account password
    $m->SingleTo   	= true;
    $m->CharSet    	= "UTF-8";
    $m->Subject 	= 'Nilza Salgados';
    $m->AltBody 	= 'To view the message, please use an HTML compatible email viewer!';

    $m->AddAddress('paulo.krj@gmail.com', 'Nilza Salgados');
    $m->SetFrom('paulo.krj@gmail.com', isset($name) ? $name : $email_address);
    $m->MsgHTML("
        Nome: {$name} <br><br>
        Telefone: {$telefone} <br><br>
        Email: {$email_address} <br><br>
        Mensagem:  {$message} <br><br>
        ---------------------------------------------------<br>
        
    ");
$m->Send();
    // if($m->Send()) {
    //     if($is_ajax === false) {
    //         return true;
    //     } else {
    //         return true;
    //     }
    // } else {
    //     die($m->ErrorInfo); 
    //     if($is_ajax === false) {
    //         return false;
    //     } else {
    //         return false;
    //     }
    // }

?>