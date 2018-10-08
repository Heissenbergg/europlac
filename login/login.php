<?php
require_once '../db.php';

$mail =  $_POST['mail'];
$psw = $_POST['psw'];


$db = new DB();
$dbQuery = $db->query("users");

while($user = $dbQuery -> fetch()){
    if($user['mail'] == $mail){
        if($user['sifra'] == $psw){
            Session::set($user['ime'], $user['mail']);
            if($user['admin'] == 1){
                echo 1;
                break;
            }
        }else echo 0;
    }
}