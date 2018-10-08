<?php

require_once('mail/class.phpmailer.php');
try{

$email = new PHPMailer(true);
$email->CharSet = 'UTF-8';
$email->SetFrom('europlac-nekretnine@hotmail.com', 'Albin Ćoralić');
$email->FromName  = 'Real Estate Agency EURO-PLAC';
//$email->From = 'from_email@domain.com';
$email->Sender = 'europlac-nekretnine@hotmail.com';
$email->AddReplyTo( 'europlac-nekretnine@hotmail.com', 'Albin Ćoralić' );
$email->Subject   = 'Naslov poruke';
$email->IsHTML(true);
$email->Body      = 'Ovo je moja poruka. ne bi vjerovali :D <br><br> Web : www.europlac-nekretnine.com <br> Email : europlac-nekretnine@hotmail.com, europlac.nekretnine@yahoo.com <br> Tel : +387 61 786 860 WhatsApp & +387 60 3574 103 Viber
<br> Facebook : <a href="https://www.facebook.com/europlac.nekretnine/?fref=ts">EURO-PLAC nekretnine<br> Skype : europlac-nekretnine.com<br> <img src="http://europlac-nekretnine.com/admin/meh.png">';
$email->AddAddress( 'kaapiic@hotmail.com' );

$file_to_attach = 'slikeNaslovne/';

$email->AddEmbeddedImage("meh.png", "my-attach", "meh.png");
$email->Send();}
catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
}

?>

<!--<img src="slikeNaslovne/12c8530d3cd2d54c3f0ae9c518b0304a1474967861.jpg" alt="my photo" />-->