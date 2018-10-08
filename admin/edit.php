<?php 
include '../db.php';
class singleOne{
    public $_pdo, $_query, $id,$userid, $naziv, $svrha, $lokacija, $nekretnina, $povObjekta,
            $povZemljista, $stanje, $brojSoba, $brojKupatila, $cijena, $valuta,
            $voda, $struja, $garaza, $klima, $plin, $internet, $kanalizacija,
            $parking, $ostava, $namjestaj, $kablovska, $videonadzor, $opis, $sirina, $visina, $pregledi, $video, $admin, $izdvojeno, $drzava ;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
            $this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo $exception;
        }
        $this->_query = $this->_pdo -> query('SELECT * FROM nekretnina');
        $this->_temporar_id = Input::get('id');
        while($row = $this->_query ->fetch() ){
            if($row['id'] == $this->_temporar_id){
                $this->id = $row['id'];
                $this->drzava = $row['drzava'];
                $this->userid = $row['userid'];
                $this->naziv = $row['naziv'];
                $this->svrha = $row['svrha'];
                $this->lokacija = $row['lokacija'];
                $this->nekretnina = $row['nekretnina'];
                $this->povObjekta = $row['povObjekta'];
                $this->povZemljista = $row['povZemljista'];
                $this->stanje = $row['stanje'];
                $this->brojSoba = $row['brojSoba'];
                $this->brojKupatila = $row['brojkupatila'];
                $this->cijena = $row['cijena'];
                $this->valuta = $row['valuta'];
                $this->opis = $row['opis'];
                $this->pregledi = $row['brojPregleda'];
                $this->admin = $row['admin'];
                $this->izdvojeno = $row['izdvojeno'];
                

                $this->voda = $row['voda'];
                $this->struja = $row['struja'];
                $this->garaza = $row['garaza'];
                $this->klima = $row['klima'];
                $this->plin = $row['plin'];
                $this->internet = $row['internet'];
                $this->kanalizacija = $row['kanalizacija'];
                $this->parking = $row['parking'];
                $this->ostava = $row['ostava'];
                $this->namjestaj = $row['namjestaj'];
                $this->kablovska = $row['kablovska'];
                $this->videonadzor = $row['videonadzor'];


                $this->sirina = $row['sirina'];
                $this->visina = $row['visina'];
                $this->video = $row['video'];
            } 
        }
    }
}

class UploadPhoto{
    private $_pdo;
    public function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=europlac_new','europlac_new','enciklopedija123');
            $this->_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo $exception;
        }
    }
    public function upload($ime){
        $id = Input::get('id');
        $upload = "INSERT INTO `slike`(`idpost`, `ime`) 
        VALUES ('{$id}','{$ime}')";
        $this->_pdo->query($upload);
    }
    public function writeFew(){
        $query = $this->_pdo -> query('SELECT * FROM slike');
        while($row = $query->fetch()){ 
            if(Input::get('id') == $row['idpost']){ ?>
            <li>
                <form method="post">
                    <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="x">
                </form>
                <img src="../slike/<?php echo $row['ime']; ?>"></img>
            </li>
        <?php  }
        }
    }
    
    public function update($naziv, $vrsta, $cijena, $opis, $izdvojeno, $valuta, $lokacija, $povObjekta, $povZemljista, $stanje, $brojSoba, $brojKupatila, $video, $struja, $voda, $klima, $garaza, $internet, $plin, $parking, $kanalizacija, $namjestaj, $ostava, $videonadzor, $kablovska, $drzava, $sirina, $visina){
        $id = Input::get('id');
        $update = "UPDATE `nekretnina` SET 
        `naziv` = '{$naziv}',
        `nekretnina` = '{$vrsta}',
        `cijena` = '{$cijena}',
        `opis` = '{$opis}',
        `izdvojeno` = '{$izdvojeno}',
        `valuta` = '{$valuta}',
        `lokacija` = '{$lokacija}',
        `povObjekta` = '{$povObjekta}',
        `povZemljista` = '{$povZemljista}',
        `stanje` = '{$stanje}',
        `brojSoba` = '{$brojSoba}',
        `brojkupatila` = '{$brojKupatila}',
        `video` = '{$video}',
        `struja` = '{$struja}',
        `voda` = '{$voda}',
        `klima` = '{$klima}',
        `garaza` = '{$garaza}',
        `internet` = '{$internet}',
        `plin` = '{$plin}',
        `parking` = '{$parking}',
        `kanalizacija` = '{$kanalizacija}',
        `namjestaj` = '{$namjestaj}',
        `ostava` = '{$ostava}',
        `videonadzor` = '{$videonadzor}',
        `kablovska` = '{$kablovska}',
        `drzava` = '{$drzava}',
        `sirina` = '{$sirina}',
        `visina` = '{$visina}'
         WHERE id = $id";
        $this->_pdo->query($update);
        Redirect::to('edit.php?id='.Input::get('id'));
    }
    
    public function photos(){
        while($row = $query->fetch()){ 
            if(Session::getid() == $row['idpost']){
            $array[] = $row['ime'];
           }
        } return $array;
    }
    
    public function delete($ime){
        $delete = "DELETE FROM `slike` WHERE id = $ime";
        $this->_pdo->query($delete);
    }
}

$photo = new UploadPhoto();
if(!empty($_FILES['file'])){ ?>
        <script type="text/javascript">
            document.getElementById('wait').style.display='block';
        </script>
    <?php foreach($_FILES['file']['name'] as $key => $name){
        $ext = explode('.', $name);
        $time = time();
        $name = md5($name).$time.'.'.$ext[1];
        
        if($_FILES['file']['error'][$key] == 0 and move_uploaded_file($_FILES['file']['tmp_name'][$key], "../slikebez/{$name}")){
            $uploaded[] = $name;
            
            $stamp = imagecreatefrompng('../images/meh.png');
            $im = imagecreatefromjpeg('../slikebez/'.$name);
            $save_watermark_photo_address = '../slike/'.$name;
            
            // Set the margins for the stamp and get the height/width of the stamp image
            
            $marge_right = 10;
            $marge_bottom = 10;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);
            $imgx = imagesx($im);
            $imgy = imagesy($im);
            $centerX=round($imgx/2) - 150;
            $centerY=round($imgy/2) - 90;
            
            
            imagecopy($im, $stamp, $centerX, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));
            imagejpeg($im, $save_watermark_photo_address, 80); 
            $photo -> upload($name);
     }
    } ?>
        <script type="text/javascript">
            document.getElementById('wait').style.display='none';
        </script>
    <?php
}
$singleOne = new singleOne();

if(!empty($_POST['delete'])){
    $photo -> delete($_POST['delete']);   
}
if(!empty($_POST['naziv'])){
    //die($_POST['location']);
    $struja  = (Input::get('struja') === 'on') ? true : false;
    $voda  = (Input::get('voda') === 'on') ? true : false;
    $klima  = (Input::get('klima') === 'on') ? true : false;
    $garaza  = (Input::get('garaza') === 'on') ? true : false;
    $internet  = (Input::get('internet') === 'on') ? true : false;
    $plin  = (Input::get('plin') === 'on') ? true : false;
    $parking  = (Input::get('parking') === 'on') ? true : false;
    $kanalizacija  = (Input::get('kanalizacija') === 'on') ? true : false;
    $namjestaj  = (Input::get('namjestaj') === 'on') ? true : false;
    $ostava  = (Input::get('ostava') === 'on') ? true : false;
    $videonadzor  = (Input::get('videonadzor') === 'on') ? true : false;
    $kablovska  = (Input::get('kablovska') === 'on') ? true : false;
    

    $photo -> update($_POST['naziv'], $_POST['vrsta'], $_POST['cijena'], $_POST['opis'], $_POST['paket'], $_POST['valuta'] , $_POST['location'], $_POST['povObjekta'], $_POST['povZemljista'], $_POST['stanje'], $_POST['brojSoba'], $_POST['brojKupatila'], $_POST['video'], $struja, $voda, $klima, $garaza, $internet, $plin, $parking, $kanalizacija, $namjestaj, $ostava, $videonadzor, $kablovska, $_POST['drzava'], $_POST['sirina'], $_POST['visina']);
}
if($singleOne -> izdvojeno == 1){
    $paket = "Besplatni";
}else if($singleOne -> izdvojeno == 2){
    $paket = "Izdvojeno 30 dana";
}else if($singleOne -> izdvojeno == 3){
    $paket = "Izdvojeno 90 dana";
}else if($singleOne -> izdvojeno == 4){
    $paket = "Izdvojeno 180 dana";
}else if($singleOne -> izdvojeno == 5){
    $paket = "Inostrane nekretnine";
}else if($singleOne -> izdvojeno == 6){
    $paket = "BiH nekretnine";
}else if($singleOne -> izdvojeno == 7){
    $paket = "Izdvojeno";
}else if($singleOne -> izdvojeno == 0){
    $paket = "Neobjavljeno";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    </head>
    <?php include 'menu.php'; ?>
    <section>
        <div id="slikeee">
            <ul>
                <?php $photo -> writeFew(); ?>
            </ul>
        </div>
        <div id="uploadpicturesform">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="wait();">
                <label for="file">Izaberite fotografije</label>
                <input type="file" id="file" name="file[]" multiple="multiple">
                <input id="submit" type="submit" value="Dodajte">
            </form>
        </div>
        <form method="post">
            <table id="editList">
                <tr>
                    <td class="firstPart">Naziv oglasa : </td>
                    <td class="secondpart"><input type="text" name="naziv" value="<?php echo $singleOne -> naziv; ?>"/></td>
                </tr>
                <tr>
                    <td class="firstPart">Vrsta artikla : </td>
                    <td class="secondpart">
                        <select style="margin-left:5%;" id="vrsta" name="vrsta">
                            <option value="<?php echo $singleOne -> nekretnina; ?>"><?php echo $singleOne -> nekretnina; ?></option>
                            <option value="Apartman">Apartmani</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Kuce">Kuce</option>
                            <option value="Poslovni prostor">Posl. prostor</option>
                            <option value="Restoran">Restoran</option>
                            <option value="Stan">Stanovi</option>
                            <option value="Vikendica">Vikendice</option>
                            <option value="Vila">Vile</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Država : </td>
                    <td class="secondpart">
                        <select name="drzava" id="drzava">
                            <option value="<?php echo $singleOne -> drzava; ?>"><?php echo $singleOne -> drzava; ?></option>
                            <option value="Bosna i Hercegovina">Bosna i Hercegovina</option>
                            <option value="Hrvatska">Hrvatska</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Lokacija : </td>
                    <td class="secondpart">
                        <select name="location" id="">
                            <option value="<?php echo $singleOne -> lokacija; ?>">
                                <?php echo $singleOne -> lokacija; ?>
                            </option>
                            <option value="Banovići">Banovići</option>
                            <option value="Banja Luka">Banja Luka</option>
                            <option value="Berkovići">Berkovići</option>
                            <option value="Bihać">Bihać</option>
                            <option value="Bileća">Bileća</option>
                            <option value="Bijeljina">Bijeljina</option>
                            <option value="Bosanska Dubica">Bosanska Dubica</option>
                            <option value="Bosanska Gradiška">Bosanska Gradiška</option>
                            <option value="Bosansko Grahovo">Bosansko Grahovo</option>
                            <option value="Bosanska Krupa">Bosanska Krupa</option>
                            <option value="Bosanska Kostajnica">Bosanska Kostajnica</option>
                            <option value="Bosanski Brod">Bosanski Brod</option>
                            <option value="Bosanski Novi">Bosanski Novi</option>
                            <option value="Bosanski Petrovac">Bosanski Petrovac</option>
                            <option value="Bosanski Šamac">Bosanski Šamac</option>
                            <option value="Bratunac">Bratunac</option>
                            <option value="Brčko">Brčko</option>
                            <option value="Breza">Breza</option>
                            <option value="Bugojno">Bugojno</option>
                            <option value="Busovača">Busovača</option>
                            <option value="Bužim">Bužim</option>
                            <option value="Cazin">Cazin</option>
                            <option value="Čajniče">Čajniče</option>
                            <option value="Čapljina">Čapljina</option>
                            <option value="Čelić">Čelić</option>
                            <option value="Čitluk">Čitluk</option>
                            <option value="Čelinac">Čelinac</option>
                            <option value="Doboj">Doboj</option>
                            <option value="Dobretići">Dobretići</option>
                            <option value="Domaljevac">Domaljevac</option>
                            <option value="Donji Vakuf">Donji Vakuf</option>
                            <option value="Drvar">Drvar</option>
                            <option value="Derventa">Derventa</option>
                            <option value="Foča">Foča</option>
                            <option value="Fojnica">Fojnica</option>
                            <option value="Gacko">Gacko</option>
                            <option value="Glamoč">Glamoč</option>
                            <option value="Gračanica">Gračanica</option>
                            <option value="Gradačac">Gradačac</option>
                            <option value="Grude">Grude</option>
                            <option value="Goražde">Goražde</option>
                            <option value="Gornji Vakuf">Gornji Vakuf</option>
                            <option value="Jablanica">Jablanica</option>
                            <option value="Jajce">Jajce</option>
                            <option value="Kakanj">Kakanj</option>
                            <option value="Kalesija">Kalesija</option>
                            <option value="Kalinovik">Kalinovik</option>
                            <option value="Kiseljak">Kiseljak</option>
                            <option value="Kladanj">Kladanj</option>
                            <option value="Ključ">Ključ</option>
                            <option value="Konjic">Konjic</option>
                            <option value="Kotor-Varoš">Kotor-Varoš</option>
                            <option value="Kreševo">Kreševo</option>
                            <option value="Kupres">Kupres</option>
                            <option value="Laktaši">Laktaši</option>
                            <option value="Livno">Livno</option>
                            <option value="Lukavac">Lukavac</option>
                            <option value="Lopare">Lopare</option>
                            <option value="Ljubinje">Ljubinje</option>
                            <option value="Ljubuški">Ljubuški</option>
                            <option value="Maglaj">Maglaj</option>
                            <option value="Milići">Milići</option>
                            <option value="Modriča">Modriča</option>
                            <option value="Mostar">Mostar</option>
                            <option value="Mrkonjić Grad">Mrkonjić Grad</option>
                            <option value="Neum">Neum</option>
                            <option value="Nevesinje">Nevesinje</option>
                            <option value="Novi Travnik">Novi Travnik</option>
                            <option value="Odžak">Odžak</option>
                            <option value="Olovo">Olovo</option>
                            <option value="Orašje">Orašje</option>
                            <option value="Pale">Pale</option>
                            <option value="Posušje">Posušje</option>
                            <option value="Prozor">Prozor</option>
                            <option value="Pale-Prača">Pale-Prača</option>
                            <option value="Prijedor">Prijedor</option>
                            <option value="Prnjavor">Prnjavor</option>
                            <option value="Ravno">Ravno</option>
                            <option value="Rogatica">Rogatica</option>
                            <option value="Rudo">Rudo</option>
                            <option value="Sanski Most">Sanski Most</option>
                            <option value="Sapna">Sapna</option>
                            <option value="Sarajevo">Sarajevo</option>
                            <option value="Skender Vakuf">Skender Vakuf</option>
                            <option value="Sokolac">Sokolac</option>
                            <option value="Srbac">Srbac</option>
                            <option value="Srebrenica">Srebrenica</option>
                            <option value="Srebrenik">Srebrenik</option>
                            <option value="Stanari">Stanari</option>
                            <option value="Stolac">Stolac</option>
                            <option value="Šipovo">Šipovo</option>
                            <option value="Široki Brijeg">Široki Brijeg</option>
                            <option value="Teočak">Teočak</option>
                            <option value="Teslić">Teslić</option>
                            <option value="Tešanj">Tešanj</option>
                            <option value="Tomislavgrad">Tomislavgrad</option>
                            <option value="Travnik">Travnik</option>
                            <option value="Trebinje">Trebinje</option>
                            <option value="Tuzla">Tuzla</option>
                            <option value="Usora">Usora</option>
                            <option value="Ustiprača">Ustiprača</option>
                            <option value="Vareš">Vareš</option>
                            <option value="Velika Kladuša">Velika Kladuša</option>
                            <option value="Visoko">Visoko</option>
                            <option value="Višegrad">Višegrad</option>
                            <option value="Vitez">Vitez</option>
                            <option value="Vogošća">Vogošća</option>
                            <option value="Zavidovići">Zavidovići</option>
                            <option value="Zenica">Zenica</option>
                            <option value="Zvornik">Zvornik</option>
                            <option value="Žepče">Žepče</option>
                            <option value="Živinice">Živinice</option>

                            <!-- HRVATSKA -->


                            <option value="Bakar">Bakar</option>
                            <option value="Beli Manastir">Beli Manastir</option>
                            <option value="Belišće">Belišće</option>
                            <option value="Benkovac">Benkovac</option>
                            <option value="Biograd na Moru">Biograd na Moru</option>
                            <option value="Bjelovar">Bjelovar</option>
                            <option value="Buje">Buje</option>
                            <option value="Buzet">Buzet</option>
                            <option value="Cres">Cres</option>
                            <option value="Crikvenica">Crikvenica</option>
                            <option value="Čabar">Čabar</option>
                            <option value="Čakovec">Čakovec</option>
                            <option value="Čazma">Čazma</option>
                            <option value="Daruvar">Daruvar</option>
                            <option value="Delnice">Delnice</option>
                            <option value="Donja Stubica">Donja Stubica</option>
                            <option value="Donji Miholjac">Donji Miholjac</option>
                            <option value="Drniš">Drniš</option>
                            <option value="Dubrovnik">Dubrovnik</option>
                            <option value="Duga Resa">Duga Resa</option>
                            <option value="Dugo Selo">Dugo Selo</option>
                            <option value="Đakovo">Đakovo</option>
                            <option value="Đurđevac">Đurđevac</option>
                            <option value="Garešnica">Garešnica</option>
                            <option value="Glina">Glina</option>
                            <option value="Gospić">Gospić</option>
                            <option value="Grubišno Polje">Grubišno Polje</option>
                            <option value="Hrvatska Kostajnica">Hrvatska Kostajnica</option>
                            <option value="Hvar">Hvar</option>
                            <option value="Ilok">Ilok</option>
                            <option value="Imotski">Imotski</option>
                            <option value="Ivanec">Ivanec</option>
                            <option value="Ivanić-Grad">Ivanić-Grad</option>
                            <option value="Jastrebarsko">Jastrebarsko</option>
                            <option value="Karlovac">Karlovac</option>
                            <option value="Kastav">Kastav</option>
                            <option value="Kaštela">Kaštela</option>
                            <option value="Klanjec">Klanjec</option>
                            <option value="Knin">Knin</option>
                            <option value="Komiža">Komiža</option>
                            <option value="Koprivnica">Koprivnica</option>
                            <option value="Korčula">Korčula</option>
                            <option value="Kraljevica">Kraljevica</option>
                            <option value="Krapina">Krapina</option>
                            <option value="Križevci">Križevci</option>
                            <option value="Krk">Krk</option>
                            <option value="Kutina">Kutina</option>
                            <option value="Kutjevo">Kutjevo</option>
                            <option value="Labin">Labin</option>
                            <option value="Lepoglava">Lepoglava</option>
                            <option value="Lipik">Lipik</option>
                            <option value="Ludbreg">Ludbreg</option>
                            <option value="Makarska">Makarska</option>
                            <option value="Mali Lošinj">Mali Lošinj</option>
                            <option value="Metković">Metković</option>
                            <option value="Mursko Središće">Mursko Središće</option>
                            <option value="Našice">Našice</option>
                            <option value="Nin">Nin</option>
                            <option value="Nova Gradiška">Nova Gradiška</option>
                            <option value="Novalja">Novalja</option>
                            <option value="Novi Marof">Novi Marof</option>
                            <option value="Novi Vinodolski">Novi Vinodolski</option>
                            <option value="Novigrad">Novigrad</option>
                            <option value="Novska">Novska</option>
                            <option value="Obrovac">Obrovac</option>
                            <option value="Ogulin">Ogulin</option>
                            <option value="Omiš">Omiš</option>
                            <option value="Opatija">Opatija</option>
                            <option value="Opuzen">Opuzen</option>
                            <option value="Orahovica">Orahovica</option>
                            <option value="Oroslavje">Oroslavje</option>
                            <option value="Osijek">Osijek</option>
                            <option value="Otočac">Otočac</option>
                            <option value="Otok">Otok</option>
                            <option value="Ozalj">Ozalj</option>
                            <option value="Pag">Pag</option>
                            <option value="Pakrac">Pakrac</option>
                            <option value="Pazin">Pazin</option>
                            <option value="Petrinja">Petrinja</option>
                            <option value="Pleternica">Pleternica</option>
                            <option value="Ploče">Ploče</option>
                            <option value="Popovača">Popovača</option>
                            <option value="Poreč">Poreč</option>
                            <option value="Požega">Požega</option>
                            <option value="Pregrada">Pregrada</option>
                            <option value="Prelog">Prelog</option>
                            <option value="Pula">Pula</option>
                            <option value="Rijeka">Rijeka</option>
                            <option value="Rovinj">Rovinj</option>
                            <option value="Samobor">Samobor</option>
                            <option value="Senj">Senj</option>
                            <option value="Sinj">Sinj</option>
                            <option value="Sisak">Sisak</option>
                            <option value="Skradin">Skradin</option>
                            <option value="Slatina">Slatina</option>
                            <option value="Slavonski Brod">Slavonski Brod</option>
                            <option value="Slunj">Slunj</option>
                            <option value="Solin">Solin</option>
                            <option value="Split">Split</option>
                            <option value="Stari Grad">Stari Grad</option>
                            <option value="Supetar">Supetar</option>
                            <option value="Sveta Nedelja">Sveta Nedelja</option>
                            <option value="Sveti Ivan Zelina">Sveti Ivan Zelina</option>
                            <option value="Šibenik">Šibenik</option>
                            <option value="Trilj">Trilj</option>
                            <option value="Trogir">Trogir</option>
                            <option value="Umag">Umag</option>
                            <option value="Valpovo">Valpovo</option>
                            <option value="Varaždin">Varaždin</option>
                            <option value="Varaždinske Toplice">Varaždinske Toplice</option>
                            <option value="Velika Gorica">Velika Gorica</option>
                            <option value="Vinkovci">Vinkovci</option>
                            <option value="Virovitica">Virovitica</option>
                            <option value="Vis">Vis</option>
                            <option value="Vodice">Vodice</option>
                            <option value="Vodnjan">Vodnjan</option>
                            <option value="Vrbovec">Vrbovec</option>
                            <option value="Vrbovsko">Vrbovsko</option>
                            <option value="Vrgorac">Vrgorac</option>
                            <option value="Vrlika">Vrlika</option>
                            <option value="Vukovar">Vukovar</option>
                            <option value="Zabok">Zabok</option>
                            <option value="Zadar">Zadar</option>
                            <option value="Zagreb">Zagreb</option>
                            <option value="Zaprešić">Zaprešić</option>
                            <option value="Zlatar">Zlatar</option>
                            <option value="Županja">Županja</option>

                        </select>
                        
                        <input type="text" name="lokacija" value=""/>
                    </td>
                </tr>
                
                <tr>
                    <td class="firstPart">Površina objekta : </td>
                    <td class="secondpart"><input type="text" name="povObjekta" value="<?php echo $singleOne -> povObjekta; ?>"/></td>
                </tr>
                <tr>
                    <td class="firstPart">Površina zemljišta : </td>
                    <td class="secondpart"><input type="text" name="povZemljista" value="<?php echo $singleOne -> povZemljista; ?>"/></td>
                </tr>
                <tr>
                    <td class="firstPart">Stanje : </td>
                    <td class="secondpart">
                        <select style="margin-left:5%;" id="stanje" name="stanje">
                            <option value="<?php echo $singleOne -> stanje; ?>"><?php echo $singleOne -> stanje; ?></option>
                            <option value="Useljivo">Useljivo</option>
                            <option value="U izgradnji">U izgradnji</option>
                            <option value="Novogradnja">Novogradnja</option>
                            <option value="Potrebno renoviranje">Potrebno renoviranje</option>
                            <option value="Poljoprivredna parcela">Poljoprivredna parcela</option>
                            <option value="Građavinska parcela">Građavinska parcela</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Broj soba : </td>
                    <td class="secondpart">
                        <select style="margin-left:5%;" id="brojSoba" name="brojSoba">
                            <option value="<?php echo $singleOne -> brojSoba; ?>"><?php echo $singleOne -> brojSoba; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Broj kupatila : </td>
                    <td class="secondpart">
                        <select style="margin-left:5%;" id="brojKupatila" name="brojKupatila">
                            <option value="<?php echo $singleOne -> brojKupatila; ?>"><?php echo $singleOne -> brojKupatila; ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Video : </td>
                    <td class="secondpart"><input type="text" name="video" value="<?php echo $singleOne -> video; ?>"/></td>
                </tr>
                <tr>
                    <td class="firstPart">Paket : </td>
                    <td class="secondpart">
                        <select style="margin-left:5%;" id="paket" name="paket" id="paket">
                            <option value="<?php echo $singleOne -> izdvojeno; ?>"><?php echo $paket ?></option>
                            <option value="0">Neobjavljeno</option>
                            <option value="1">Besplatni</option>
                            <!--<option value="2">Izdvojeno 30 dana</option>
                            <option value="3">Izdvojeno 90 dana</option>
                            <option value="4">Izdvojeno 180 dana</option> -->
                            <option value="5">Inostrane nekretnine</option>
                            <option value="6">BiH nekretnine</option>
                            <option value="7">Izdvojeno</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Cijena : </td>
                    <td class="secondpart"><input style="width:300px" type="text" name="cijena" value="<?php echo $singleOne -> cijena; ?>"/> 
                        <select name="valuta" id="valuta" style="width:100px">
                           <option value="<?php echo $singleOne -> valuta ; ?>"><?php echo $singleOne -> valuta ; ?></option>
                        <option value="BAM">BAM</option>
                        <option value="€">€</option>
                        <option value="$">$</option>
                        <option value="HRK">HRK</option>
                        <option value="CHF">CHF</option>
                       </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Struja : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->struja){ ?>
                                <input type="checkbox" name="struja" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="struja">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Voda : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->voda){ ?>
                                <input type="checkbox" name="voda" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="voda">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Klima : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->klima){ ?>
                                <input type="checkbox" name="klima" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="klima">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Garaza : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->garaza){ ?>
                                <input type="checkbox" name="garaza" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="garaza">
                            <?php }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td class="firstPart">Internet : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->internet){ ?>
                                <input type="checkbox" name="internet" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="struja">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Plin : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->plin){ ?>
                                <input type="checkbox" name="plin" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="plin">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Parking : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->parking){ ?>
                                <input type="checkbox" name="parking" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="parking">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Kanalizacija : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->kanalizacija){ ?>
                                <input type="checkbox" name="kanalizacija" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="kanalizacija">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Namjestaj : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->namjestaj){ ?>
                                <input type="checkbox" name="namjestaj" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="namjestaj">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Ostava : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->ostava){ ?>
                                <input type="checkbox" name="ostava" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="ostava">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Video nadzor : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->videonadzor){ ?>
                                <input type="checkbox" name="videonadzor" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="videonadzor">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Kablovska : </td>
                    <td class="secondpart">
                        <?php 
                            if($singleOne->kablovska){ ?>
                                <input type="checkbox" name="kablovska" checked>
                            <?php }else{ ?>
                                <input type="checkbox" name="kablovska">
                            <?php }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="firstPart">Koordinate : </td>
                    <td class="secondpart">
                        <input type="text" id="sirina" name="sirina" value="<?php echo $singleOne->sirina; ?>">
                        <input type="text" id="visina" name="visina" value="<?php echo $singleOne->visina; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="firstPart" style="vertical-align:top;">Opis : </td>
                    <td class="secondpart">
                        <textarea name="opis" style="width:90%; margin-left:5%; min-height:300px;"><?php echo $singleOne -> opis; ?> </textarea>
                        <!--<input style="height:auto;" type="text" name="opis" value="<?php echo $singleOne -> opis; ?>"/>-->
                    </td>
                </tr>
                <tr>
                    <td class="firstPart" style="vertical-align:middle; height:400px;">Mapa : </td>
                    <td class="secondpart" style="height:400px;">
                        
                        <div id="map_canvas" style="width:100%; margin-top:20px; height:90%;"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:left; border:none;">
                        <input style="width:300px; border:none; border-radius:20px; height:40px; background:#2ff9b7; color:#fff;" type="submit" value="Spremi">
                    </td>
                </tr>
            </table>
        </form>
    </section>
<script type="text/javascript">
    var meh = document.getElementById("sirina").value;
    var meh1 = document.getElementById("visina").value;
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 5,
        center: new google.maps.LatLng(meh1, meh),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng(meh1, meh),
        draggable: true
    });
    
    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
        visina = evt.latLng.lat().toFixed(3);
        sirina = evt.latLng.lng().toFixed(3);
        console.log(sirina);
        console.log(visina);
        document.getElementById("sirina").value = sirina;
        document.getElementById("visina").value = visina;
        /*
        document.getElementById('visina').innerHTML = evt.latLng.lat().toFixed(3);
        document.getElementById('sirina').innerHTML = evt.latLng.lng().toFixed(3);
        console.log('sirina' + evt.latLng.lng().toFixed(3)); */
        //document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
        //console.log('<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>');
    });
    
    google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
        //document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
    });
    
    map.setCenter(myMarker.position);
    myMarker.setMap(map);
</script>
</html>
