<?php

require '../../db.php';

$db = new DB();

$naslov = $_POST['naslov'];
$povrsina = $_POST['povrsina'];
$brSoba = $_POST['brSoba'];
$brKupatila = $_POST['brKupatila'];
$tekst = $_POST['tekst'];
$id = $_POST['id'];


$d = date("d");
$m = date("m");
$y = date("y");

$update = "UPDATE `montazne` SET 
          `naslov`='{$naslov}',
          `povrsina`='{$povrsina}',
          `brSoba`='{$brSoba}',
          `brKupatila`='{$brKupatila}',
          `tekst`='{$tekst}'
           WHERE id = $id";
$db -> action($update);

$delete = "DELETE FROM `photos_montazne` WHERE idofpost = $id";
$db -> action($delete);
/*

$query = $db->query("montazne");
$id = 0;
while($row = $query -> fetch()){
	$id = $row['id'];
}

echo $id;
*/

$photos = explode(",", $_POST['photos']);
foreach($photos as $photo){
	$db->action("INSERT INTO `photos_montazne` (`name`,`idofpost`) VALUES ('{$photo}', '{$id}' )" );
}

