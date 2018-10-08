<?php 
include '../db.php';
class singleOne{
    public $_pdo, $_query, $id,$userid, $naziv, $svrha, $lokacija, $nekretnina, $povObjekta,
            $povZemljista, $stanje, $brojSoba, $brojKupatila, $cijena, $valuta,
            $voda, $struja, $garaza, $klima, $plin, $internet, $kanalizacija,
            $parking, $ostava, $namjestaj, $kablovska, $videonadzor, $opis, $sirina, $visina, $pregledi, $video, $admin, $izdvojeno ;
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
    
    public function update($naziv){
        $id = Input::get('id');
        $update = "UPDATE `nekretnina` SET 
        `naziv` = '{$naziv}'
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
            
            $stamp = imagecreatefrompng('../icon/meh.png');
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
    //$photo -> update($_POST['naziv'], $_POST['vrsta'], $_POST['cijena'], $_POST['opis'], $_POST['paket'], $_POST['valuta'] );
    $naziv = $_POST['naziv'];
    $lokacija = $_POST['lokacija'];
    $vrsta = $_POST['vrsta'];
    $povObjekta = $_POST['povObjekta'];
    $povZemljista = $_POST['povZemljista'];
    $stanje = $_POST['stanje'];
    $brojSoba = $_POST['brojSoba'];
    $brojKupatila = $_POST['brojKupatila'];
    $video = $_POST['video'];
    $paket = $_POST['paket'];
    $cijena = $_POST['cijena'];
    $valuta = $_POST['valuta'];
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
    $opis = $_POST['opis'];
    $photo->update($naziv);
    //$photo->update($naziv, $lokacija, $vrsta, $povObjekta, $povZemljista, $stanje, $brojSoba, $brojKupatila, $video, $paket, $cijena,$valuta, $struja, $voda, $klima, $garaza, $internet, $plin, $parking, $kanalizacija, $namjestaj, $ostava, $videonadzor, $kablovska, $opis);

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
    $paket = "Standard";
}else if($singleOne -> izdvojeno == 6){
    $paket = "Premium";
}else if($singleOne -> izdvojeno == 7){
    $paket = "Exclusive";
}else if($singleOne -> izdvojeno == 0){
    $paket = "Neobjavljeno";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
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
                    <td class="firstPart">Lokacija : </td>
                    <td class="secondpart"><input type="text" name="lokacija" value="<?php echo $singleOne -> lokacija; ?>"/></td>
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
                            <option value="2">Izdvojeno 30 dana</option>
                            <option value="3">Izdvojeno 90 dana</option>
                            <option value="4">Izdvojeno 180 dana</option>
                            <option value="5">Standard</option>
                            <option value="6">Premium</option>
                            <option value="7">Exclusive</option>
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
                    			<input type="checkbox" name="Parking">
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
                    <td class="firstPart" style="vertical-align:top;">Opis : </td>
                    <td class="secondpart">
                        <textarea name="opis" style="width:90%; margin-left:5%; min-height:300px;"><?php echo $singleOne -> opis; ?> </textarea>
                        <!--<input style="height:auto;" type="text" name="opis" value="<?php echo $singleOne -> opis; ?>"/>-->
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
</html>