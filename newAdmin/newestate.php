<?php 
require_once '../class/newdb.php';
Session::setImageHash();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="menu/css/menu.css" type="text/css" />
        <link rel="stylesheet" href="../css/style.css" type="text/css" />
        <link rel="stylesheet" href="estates/css/newestate.css" type="text/css" />
        
        <!-- scripts -->
        <!-- USE FONTAWESOME -->
        <script src="https://use.fontawesome.com/85a780918f.js"></script>
        
        <!-- <script type="text/javascript" src="estates/js/newestate.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA&callback=mapa"></script>-->
    </head>
    <body>
        <?php require_once 'menu/menu.php'; ?>
        <div class="rightSide">
            <div class="rightSideHeader">
                <h4>UNOS NEKRETNINE</h4>
            </div>
            
            <div class="rightSideOption rightSideOptionImages" id="allImagess">
                <!--<div class="image">
                    <img src="../slike/image.JPG"></img>
                </div> -->
            </div>
            <div class="rightSideOption">
                <div class="rightSideOptionName rightSideOptionNameChoose">
                    <form enctype="multipart/form-data">
		                <label for="file">
		                    <p>Odaberite slike</p>
		               		<i class="fa fa-picture-o" aria-hidden="true" title="Izaberite sliku"></i>
		                </label>
		                <input type="file" onchange="uploadAllPictures();" id="file" name="file[]" multiple="multiple"  style="display: none;">
		            </form>
                    <p>Odaberite slike</p>
                </div>
            </div>
            <div class="rightSideOption"></div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Naziv nekretnine</p>
                </div>
                <div class="rightSideOptionValue">
                    <input type="text" id="naziv" placeholder="Naziv nekretnine"/>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Svrha</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="svrha">
                        <option value="Prodaja">Prodaja</option>
                        <option value="Najam">Najam</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Država</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="drzava">
                        <option value="Bosna i Hercegovina">Bosna i Hercegovina</option>
                        <option value="Hrvatska">Hrvatska</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Grad</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="grad">
                        <!-- will be changed -->
                        <?php require_once 'estates/cities.php'; ?>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Vrsta nekretnine</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="vrsta">
                        <option value="Apartman">Apartman</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Kuca">Kuca</option>
                        <option value="Poslovni prostor">Poslovni prostor</option>
                        <option value="Restoran">Restoran</option>
                        <option value="Stan">Stan</option>
                        <option value="Vikendica">Vikendica</option>
                        <option value="Vila">Vila</option>
                        <option value="Zemljiste">Zemljiste</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Površina objekta</p>
                </div>
                <div class="rightSideOptionValue">
                    <input type="text" id="povrsinaObjekta" placeholder="Površina objekta"/>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Površina zemljišta</p>
                </div>
                <div class="rightSideOptionValue">
                    <input type="text" id="povrsinaZemljista" placeholder="Površina zemljišta"/>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Stanje nekretnine</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="stanje">
                        <option value="Useljivo">Useljivo</option>
                        <option value="U izgradnji">U izgradnji</option>
                        <option value="Novogradnja">Novogradnja</option>
                        <option value="Potrebno renoviranje">Potrebno renoviranje</option>
                        <option value="Poljoprivredna parcela">Poljoprivredna parcela</option>
                        <option value="Građavinska parcela">Građavinska parcela</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Broj soba</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="brojSoba">
                        <option value="0">0</option>
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
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Broj kupatila</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="brojKupatila">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Cijena</p>
                </div>
                <div class="rightSideOptionValue">
                    <input type="text" id="cijena" placeholder="Cijena"/>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Valuta</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="valuta">
                        <option value="BAM">BAM</option>
                        <option value="€">€</option>
                        <option value="$">$</option>
                        <option value="HRK">HRK</option>
                        <option value="CHF">CHF</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Paket</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="paket">
                        <option value="5">Inostrane nekretnine</option>
                        <option value="6">BiH nekretnine</option>
                        <option value="7">Izdvojeno</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Video</p>
                </div>
                <div class="rightSideOptionValue">
                    <input type="text" id="video" placeholder="Video"/>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Struja</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="struja">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Voda</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="voda">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Garaža</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="garaza">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Klima</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="klima">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Plin</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="plin">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Internet</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="internet">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Kanalizacija</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="kanalizacija">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Parking</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="parking">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Ostava</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="ostava">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Namještaj</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="namjestaj">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Kablovska</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="kablovska">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption">
                <div class="rightSideOptionName">
                    <p>Video nadzor</p>
                </div>
                <div class="rightSideOptionValue">
                    <select id="videoNadzor">
                        <option value="1">DA</option>
                        <option value="0">NE</option>
                    </select>
                </div>
            </div>
            
            <div class="rightSideOption rightSideOptionDesc">
                <div class="rightSideOptionName">
                    <p>Opis</p>
                </div>
                <div class="rightSideOptionValue">
                    <textarea id="opis" placeholder="Opis"></textarea>
                </div>
            </div>
            
            
            <div class="rightSideOption rightSideOptionMAP" id="map"></div>
            
            <div class="rightSideOption rightSideOptionButton">
                <p onclick="saveEstate();">SPREMITE</p>
            </div>
            
        </div>
        
        
        <script type="text/javascript" src="estates/js/newestate.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA&callback=initMap"></script>
        
    </body>
</html>