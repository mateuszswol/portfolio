<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');

$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6Ler1RkaAAAAAOsh12ClMhS_zjr2Xd_B-XSiBlOG';
$recaptcha_response = $_POST['g-recaptcha-response'];

$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
$recaptcha = json_decode($recaptcha);

// verify the response
if($recaptcha->score >= 0.5) {
  if($_POST){
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->From = "noreply@mateuszswol.pl";
    $mail->FromName = "Formularz kontaktowy";
    $mail->AddReplyTo('noreply@mateuszswol.pl', 'Formularz kontaktowy');
    $mail->Host = "ssd13.cyber-folks.com";
    $mail->SMTPAuth = true;
    $mail->Username = "noreply@mateuszswol.pl";
    $mail->Password = 'H1<@b412F@,@L2f';
    $mail->Port = 587;
    $mail->Subject = "Wiadomość z formularza kontaktowego";
    $mail->Body = 'Imię i nazwisko: '.$_POST['name'].'
    Adres e-mail: '.$_POST['email'].'
    Tytuł wiadomości: '.$_POST['subject'].'
    Wiadomość: '.$_POST['message'];
    $mail->AddAddress('biuro@mateuszswol.pl',"Mateusz");
    if($mail->Send()){
      echo 'Wiadomość wysłana poprawnie!';
    }
    else{
      echo 'Coś poszło nie tak.. Skontaktuj się z nami w inny sposób.';
    }
  }
} else {
    header("Location: ".$cur_url."?sent=fail2");
}


?>
