<?php 
include '../db.php';
$db = new DB();
$itemQUery = $db->query("montazne");
$imageQuery = $db->query("photos_montazne");
$idofpost = Input::get('id');
while($item = $itemQUery -> fetch()){
    if($item['id'] == $idofpost){
        $naslov = $item['naslov'];
        $kvadratura = $item['povrsina'];
        $brojSoba = $item['brSoba'];
        $brojKupatila = $item['brKupatila'];
        $opis = $item['tekst'];
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/montazne.css">
        <script type="text/javascript" src="js/montazne.js"></script>
    </head>
    <body onload="setImages()">
        <?php include 'menu.php'; ?>
        <p id="idofpost" style="display: none;"><?php echo $idofpost; ?></p>
        <section>
            <div id="montazneHeader">
            	<h4>
            		<?php echo $naslov; ?>
            	</h4>
            </div>
            <div id="montazneInputs">
            	 <input type="text" id="naslov" name="" placeholder="Naslov.." value="<?php echo $naslov; ?>"><br>
            	 <input type="text" id="povrsina" name="" placeholder="Kvadratura.." value="<?php echo $kvadratura; ?>"><br>
            	 <input type="text" id="brSoba" name="" placeholder="Broj soba.." value="<?php echo $brojSoba; ?>"><br>
            	 <input type="text" id="brKupatila" name="" placeholder="Broj kupatila.." value="<?php echo $brojKupatila; ?>"><br>
            	 <textarea id="tekst" placeholder="Opis.."><?php echo $opis; ?></textarea>
            </div>
            <div id="slike">
            	<div id="insertImage">
					<form enctype="multipart/form-data">
						<input type="file" class="hiddenElements" id="file" name="file" onchange="uploadAllPictures();">
					</form>
				</div>
            	<?php 
                $j = 0;
                while($img = $imageQuery -> fetch()){
                    if($img['idofpost'] == $idofpost){ ?>
                        <div class="slikaWrapper" id="<?php echo $j; ?>" >
                            <img 
                                class="slikeSlika" 
                                title="<?php echo $img['name']; ?>" 
                                src="images/<?php echo $img['name']; ?>" 
                            >
                            <div class="delete" onclick="deleteImage(<?php echo $j++; ?>)">
                                X
                            </div>
                        </div>
                    <?php }
                }
                ?>
            	
            </div>
            <div id="spremi" onclick="updatePost();">
            	SPREMITE
            </div>
        </section>
    </body>
</html>