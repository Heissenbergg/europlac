<?php
require_once '../../class/newdb.php';

$id = $_POST['id'];
$estates = array("id" => array(), "naziv" => array(), "lokacija" => array(), "drzava" => array(), "cijena" => array(), "povrsina" => array(), "slika" => array());

$db = new DB();
$dbQuery = $db->query("nekretnina");

while($est = $dbQuery -> fetch()){
    if($est['id'] == $id){
        array_push($estates['id'], $est['id']);
        array_push($estates['naziv'], $est['naziv']);
        array_push($estates['lokacija'], $est['lokacija']);
        array_push($estates['drzava'], $est['drzava']);
        array_push($estates['cijena'], $est['cijena']);
        array_push($estates['povrsina'], $est['povObjekta']);
        $imageQuery = $db->query("slike");
        while($img = $imageQuery -> fetch()){
            if($img['idpost'] == $id){
                array_push($estates['slika'], $img['ime']);
                break;
            }
        } 
        break;
    }
}

echo json_encode($estates);




