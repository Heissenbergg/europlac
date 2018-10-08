<?php
include '../db.php';
$db = new DB();
$jstquery = $db->_pdo -> query('SELECT * FROM brojposjeta');
while($row = $jstquery ->fetch()){
    $brojPosjeta = $row['svi'];
}
$brojKorisnika = 0;
$korisnici = $db->_pdo -> query('SELECT * FROM users');
while($row = $korisnici ->fetch()){
    $brojKorisnika++;
}

$moji = $db->_pdo -> query('SELECT * FROM nekretnina');