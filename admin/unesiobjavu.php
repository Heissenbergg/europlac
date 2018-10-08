<?php
include '../db.php';
class Objava{
    private $_pdo,$_svrha,$_lokacija,$_nekretnina,$_povObjekta,$_povZemljista,$_stanje,$_brojSoba,$_brojKupatila,$_cijena,$_valuta;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
			$this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
			echo $exception;
		}
    }
    public function Unesi($svrha,$userid,$paket, $lokacija, $drzava, $nekretnina, $povObjekta, $povZemljista, $stanje, $brojSoba, $brojKupatila, $cijena, $valuta, $voda, $struja, $garaza, $klima, $plin, $internet, $kanalizacija, $parking, $ostava, $namjestaj, $kablovska, $videonadzor, $opis, $naziv, $sirina, $visina, $video){
        $admin = 1;
        $register = "INSERT INTO `nekretnina`(`admin`,`izdvojeno`,`svrha`,`userid`,`naziv`, `lokacija`, `drzava`, `nekretnina`, `povObjekta`, `povZemljista`, `stanje`, `brojSoba`, `brojKupatila`, `cijena`, `valuta`, `voda`, `struja`, `garaza`, `klima`, `plin`, `internet`, `kanalizacija`, `parking`, `ostava`, `namjestaj`,`kablovska`, `videonadzor`, `opis`, `sirina`, `visina`, `video`) 
		VALUES ('{$admin}','{$paket}','{$svrha}','{$userid}','{$naziv}','{$lokacija}','{$drzava}','{$nekretnina}','{$povObjekta}','{$povZemljista}','{$stanje}','{$brojSoba}','{$brojKupatila}','{$cijena}','{$valuta}','{$voda}','{$struja}','{$garaza}','{$klima}','{$plin}','{$internet}','{$kanalizacija}','{$parking}','{$ostava}','{$namjestaj}','{$kablovska}','{$videonadzor}','{$opis}','{$sirina}','{$visina}','{$video}')";
		$this->_pdo->query($register);
	    
	    
	    
	    if($nekretnina == "Apartman"){
	        $updateid = 1;
	    }else if($nekretnina == "Hotel"){
	        $updateid = 2;
	    }else if($nekretnina == "Kuca"){
	        $updateid = 3;
	    }else if($nekretnina == "Poslovni prostor"){
	        $updateid = 4;
	    }else if($nekretnina == "Restoran"){
	        $updateid = 5;
	    }else if($nekretnina == "Stan"){
	        $updateid = 6;
	    }else if($nekretnina == "Vikendica"){
	        $updateid = 7;
	    }else if($nekretnina == "Vila"){
	        $updateid = 8;
	    }else if($nekretnina == "Zemljiste"){
	        $updateid = 9;
	    }
	    $num = $this->_pdo -> query('SELECT * FROM num');
        while($row = $num->fetch()){
            if($row['id'] == $updateid){
                $number = $row['broj'];
                $number ++;
                break;
            }
        }
		$update = $this->_pdo->query("UPDATE `num` SET `broj`='{$number}' WHERE id = $updateid");
		
		
		
		$query = $this->_pdo -> query('SELECT * FROM nekretnina');
        while($row = $query->fetch()){
            $this->_id = $row['id'];
            Session::id($row['id']);
        }
    }

    public function video($video, $paket){
    	$register = "INSERT INTO `nekretnina` (`video`,`izdvojeno`) VALUES  ('{$video}','{$paket}')";
    	$this->_pdo->query($register);
    }
}
$try = new Objava();
$justUser = new User(Session::isitset());
$naziv = $_POST['naziv'];
$userid = $justUser->id();
$svrha = $_POST['svrha'];
$lokacija = $_POST['lokacija'];
$drzava = $_POST['drzava'];
$nekretnina = $_POST['nekretnina'];
$povObjekta = $_POST['povObjekta'];
$povZemljista  = $_POST['povZemljista'];
$stanje  = $_POST['stanje'];
$brojSoba = $_POST['brojSoba'];
$brojKupatila = $_POST['brojKupatila'];
$cijena  = $_POST['cijena'];
$valuta = $_POST['valuta'];
$voda = $_POST['voda'];
$struja  = $_POST['struja'];
$garaza  = $_POST['garaza'];
$klima  = $_POST['klima'];
$plin  = $_POST['plin'];
$internet  = $_POST['internet'];
$kanalizacija  = $_POST['kanalizacija'];
$parking  = $_POST['parking'];
$ostava = $_POST['namjestaj'];
$kablovska = $_POST['kablovska'];
$videonadzor  = $_POST['videonadzor'];
$opis = $_POST['opis'];
$sirina = $_POST['sirina'];
$visina = $_POST['visina'];
$video = '<iframe width="100%" height="100%" src="'.$_POST['video'].'" frameborder="0" allowfullscreen></iframe>';
$paket = $_POST['paket'];
//$try->video($video, $paket);
$try->Unesi($svrha,$userid, $paket, $lokacija, $drzava, $nekretnina, $povObjekta, $povZemljista, $stanje, $brojSoba, $brojKupatila, $cijena, $valuta, $voda, $struja, $garaza, $klima, $plin, $internet, $kanalizacija, $parking, $ostava, $namjestaj, $kablovska, $videonadzor, $opis, $naziv, $sirina, $visina, $video);

