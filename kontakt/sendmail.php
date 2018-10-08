<?php
require_once '../class/maill.php';
echo "weee";
$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$message = $_POST['message'];


$mailObj = new Mail();

$msg = 'Korisnik : '.$name.' vam je poslao poruku putem servisa "Kontaktirajte nas."<br><br>';
$msg .= 'Kontakt informacije : <br>';
$msg .= 'e-Mail : '.$mail.'<br>';
$msg .= 'telefon : '.$phone.'<br>';
$msg .= 'Kompanija : '.$company.'<br>';
$msg .= $message;

$mailObj->send('info@europlac-nekretnine.com', 'Upit sa stranice', $msg);