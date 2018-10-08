<div id="singleEstate">
    <div id="singleEstateImages">
        <div class="estateImage">
            <?php 
            
            for($i=0; $i<count($nekretnina->_slike); $i++){
                echo '<img class="mainImage" src="slike/'.$nekretnina->_slike[$i].'"></img>';;
            } 
            ?>
            <!--
            <img class="mainImage" src="estates/images/13.JPG"></img>
            <img class="mainImage" src="estates/images/14.JPG"></img> -->
        </div>
        <div class="imageArrowLeft" title="Prethodna slika" onclick="previousImage();">
            <img src="estates/images/back.png"></img>
        </div>
        <div class="imageArrowRight" title="Sljdeća slika" onclick="nextImage();">
            <img src="estates/images/next.png"></img>
        </div>
    </div>
    <p id="xCoordinate" style="display:none;"><?php echo $nekretnina->_xKoordinate; ?></p>
    <p id="yCoordinate" style="display:none;"><?php echo $nekretnina->_yKoordinata; ?></p>
    <div id="singleEstateMainDesc">
        <div class="singleEstateMainDescOption">
            <p><?php echo $nekretnina->_ime; ?></p>
        </div>
        <div class="singleEstateMainDescIcon" title="Printajte">
            <img src="images/printer.png"></img>
        </div>
        <div class="singleEstateMainDescIcon singleEstateMainDescIcon1" title="Pogledajte PDF">
            <img src="images/pdf.png"></img>
        </div>
        <div class="singleEstateMainDescIcon singleEstateMainDescIcon2" title="Pošaljite prijatelju">
            <img src="images/mail.png"></img>
        </div>
        
        <div id="singleEstateID">
            <p>ID : <?php echo $nekretnina->_id; ?></p>
        </div>
        <div id="singleEstatePrice">
            <p>Cijena : <?php echo $nekretnina->_cijena.' '.$nekretnina->_valuta; ?> </p>
        </div>
        
    </div>
    <div id="singleEstateAllOfThem">
        <div class="singleEstateAllOfThemOptions singleEstateAllOfThemOptions2">
            <h4>
                Detaljni opis
            </h4>
        </div>
        
        <div class="singleEstateAllOfThemHugeDesc">
            <p>
                <?php echo $nekretnina->_opis; ?>
            </p>
        </div>
        <div class="singleEstateAllOfThemOptions singleEstateAllOfThemOptions2">
            <h4>
                Osnovne informacije
            </h4>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Svrha</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_svrha; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Lokacija</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_lokacija; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Vrsta nekretnine</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_vrstaNekretnine; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Stanje</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_stanje; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Površina objekta</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_povrsinaObjekta; ?> m<span>2</span></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Površina zemljišta</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_povrsinaZemljista; ?> m<span>2</span></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Broj soba</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_brojSoba; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Broj kupatila</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_brojKupatila; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions singleEstateAllOfThemOptions2">
            <h4>
                Dodatne informacije
            </h4>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Voda</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_voda; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Struja</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_struja; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Garaža</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_garaza; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Klima</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_klima; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Plin</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_plin; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Internet</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_internet; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Kanalizacija</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_kanalizacija; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Parking</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_parking; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Ostava</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_ostava; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Namještaj</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_namjestaj; ?></p>
                </div>
            </div>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Kablovska</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p><?php echo $nekretnina->_kablovska; ?></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Video nadzor</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_videoNadzor; ?></p>
                </div>
            </div>
        </div>
        
        
        <div class="singleEstateAllOfThemOptions singleEstateAllOfThemOptions2">
            <h4>
                Ostale informacije
            </h4>
        </div>
        <div class="singleEstateAllOfThemOptions">
            <div class="singleEstateAllOfThemOptionsLeft">
                <div class="singleEstateAllOfThemOptionsLeftFirst">
                    <p>Objavljeno</p>
                </div>
                <div class="singleEstateAllOfThemOptionsLeftSecond">
                    <p></p>
                </div>
            </div>
            <div class="singleEstateAllOfThemOptionsRight">
                <div class="singleEstateAllOfThemOptionsRightFirst">
                    <p>Broj pregleda</p>
                </div>
                <div class="singleEstateAllOfThemOptionsRightSecond">
                    <p><?php echo $nekretnina->_brojPregleda; ?></p>
                </div>
            </div>
        </div>
        
        
        
        <div class="videoandMap" id="map">  
            
        </div>
        <div class="videoandMap">
            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="<?php echo $nekretnina->_video; ?>" frameborder="0" allowfullscreen>
        </div>
    </div>
    
    
    
</div>