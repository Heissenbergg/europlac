<?php 
require_once '../../class/newdb.php';

$city = mb_strtolower(Session::getCity());
$estates = array("id" => array(), "naziv" => array(), "kategorija" => array(), "x" => array(), "y" => array(), "marker" => array());

$db = new DB();
$dbQuery = $db->query("nekretnina");

while($estate = $dbQuery -> fetch()){
    if(mb_strtolower($estate['lokacija']) == $city){
        array_push($estates['id'], $estate['id']);
        array_push($estates['naziv'], $estate['naziv']);
        array_push($estates['kategorija'], $estate['nekretnina']);
        array_push($estates['x'], $estate['sirina']);
        array_push($estates['y'], $estate['visina']);
    }
}

echo json_encode($estates);




