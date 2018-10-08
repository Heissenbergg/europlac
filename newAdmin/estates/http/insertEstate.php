<?php
require '../../../class/newdb.php';

$naziv = $_POST['naziv'];
$svrha = $_POST['svrha'];
$drzava = $_POST['drzava'];
$grad = $_POST['grad'];
$vrsta = $_POST['vrsta'];
$povrsinaObjekta = $_POST['povrsinaObjekta'];
$povrsinaZemljista = $_POST['povrsinaZemljista'];
$stanje = $_POST['stanje'];
$brojSoba = $_POST['brojSoba'];
$brojKupatila = $_POST['brojKupatila'];
$cijena = $_POST['cijena'];
$valuta = $_POST['valuta'];
$paket = $_POST['paket'];
$video = $_POST['video'];
$struja = $_POST['struja'];
$voda = $_POST['voda'];
$garaza = $_POST['garaza'];
$klima = $_POST['klima'];
$plin = $_POST['plin'];
$internet = $_POST['internet'];
$kanalizacija = $_POST['kanalizacija'];
$parking = $_POST['parking'];
$ostava = $_POST['ostava'];
$namjestaj = $_POST['namjestaj'];
$kablovska = $_POST['kablovska'];
$videoNadzor = $_POST['videoNadzor'];
$opis = $_POST['opis'];

$sirina = $_POST['sirina'];
$visina = $_POST['visina'];

$time = time();
$admin = 1;
$userID = 22;

$db = new DB();

$insert = "INSERT into `nekretnina` (
                    `admin`,
                    `izdvojeno`,
                    `time`,
                    `userid`,
                    `naziv`,
                    `svrha`,
                    `lokacija`,
                    `drzava`,
                    `nekretnina`,
                    `povObjekta`,
                    `povZemljista`,
                    `stanje`,
                    `brojSoba`,
                    `brojkupatila`,
                    `cijena`,
                    `valuta`,
                    `voda`,
                    `struja`,
                    `garaza`,
                    `klima`,
                    `plin`,
                    `internet`,
                    `kanalizacija`,
                    `parking`,
                    `ostava`,
                    `namjestaj`,
                    `kablovska`,
                    `videonadzor`,
                    `opis`,
                    `sirina`,
                    `visina`,
                    `video`
                ) 
				    VALUES 
				(
				    '{$admin}',
				    '{$paket}', 
				    '{$time}', 
				    '{$userID}', 
				    '{$naziv}', 
				    '{$svrha}',
				    '{$grad}',
				    '{$drzava}',
				    '{$vrsta}',
				    '{$povrsinaObjekta}',
				    '{$povrsinaZemljista}',
				    '{$stanje}',
				    '{$brojSoba}',
				    '{$brojKupatila}',
				    '{$cijena}',
				    '{$valuta}',
				    '{$voda}',
				    '{$struja}',
				    '{$garaza}',
				    '{$klima}',
				    '{$plin}',
				    '{$internet}',
				    '{$kanalizacija}',
				    '{$parking}',
				    '{$ostava}',
				    '{$namjestaj}',
				    '{$kablovska}',
				    '{$videoNadzor}',
				    '{$opis}',
				    '{$visina}',
				    '{$sirina}',
				    '{$video}'
				)";


$db->action($insert);


$lastID = $db->getId();
$postID = Session::getImageHash();

$db->action("UPDATE `slike` SET `idpost`='{$lastID}' WHERE sortid = $postID");
echo $lastID;				    
				    
				    
				    
				    
				    
				    
				    
				    