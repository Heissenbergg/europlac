<?php 
include '../db.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/montazne.css">
        <script type="text/javascript" src="js/montazne.js"></script>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <section>
            <div id="montazneHeader">
            	<h4>
            		Dodajte novu montažnu kuću
            	</h4>
            </div>
            <div id="montazneInputs">
            	 <input type="text" id="naslov" name="" placeholder="Naslov.."><br>
            	 <input type="text" id="povrsina" name="" placeholder="Kvadratura.."><br>
            	 <input type="text" id="brSoba" name="" placeholder="Broj soba.."><br>
            	 <input type="text" id="brKupatila" name="" placeholder="Broj kupatila.."><br>
            	 <textarea id="tekst" placeholder="Opis.."></textarea>
            </div>
            <div id="slike">
            	<div id="insertImage">
					<form enctype="multipart/form-data">
						<input type="file" class="hiddenElements" id="file" name="file" onchange="uploadAllPictures();">
					</form>
				</div>
            	<!--<div class="slikaWrapper">
            		<div class="delete">
            			X
            		</div>
            	</div>
            	-->
            </div>
            <div id="spremi" onclick="savePOST();">
            	SPREMITE
            </div>
        </section>
    </body>
</html>