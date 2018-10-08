<?php

require '../../db.php';

$db = new DB();

$naslov = $_POST['naslov'];
$povrsina = $_POST['povrsina'];
$brSoba = $_POST['brSoba'];
$brKupatila = $_POST['brKupatila'];
$tekst = $_POST['tekst'];

$d = date("d");
$m = date("m");
$y = date("y");

$insert = "INSERT INTO `montazne` (`naslov`,`povrsina`,`brSoba`,`brKupatila`,`tekst`) 
		   VALUES ('{$naslov}', '{$povrsina}', '{$brSoba}', '{$brKupatila}', '{$tekst}')";
$db->action($insert); 

$query = $db->query("montazne");
$id = 0;
while($row = $query -> fetch()){
	$id = $row['id'];
}

echo $id;

$photos = explode(",", $_POST['photos']);
foreach($photos as $photo){
	$db->action("INSERT INTO `photos_montazne` (`name`,`idofpost`) VALUES ('{$photo}', '{$id}' )" );
}

