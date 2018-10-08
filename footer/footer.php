<footer id="fooooter"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4130037498110617",
    enable_page_level_ads: true
  });
</script>
    <div id="firstFooterPart">
        <table align="center">
            <tr>
                <td><h4>INFO</h4></td>
                <td><h4>POPULARNO</h4></td>
                <td><h4>POSLOVNE AKTIVNOSTI</h4></td>
            </tr>
            <tr>
                <td><a href="kontakt.php">Kontaktirajte nas</a></td>
                <td>
                    <a href="nekretnina.php?key=<?php echo $topRated->topRated['id'][0]; ?>">
                        <?php echo $topRated->topRated['name'][0]; ?>
                    </a>
                </td>
                <td><a href="#">1.Agencija za poslovanje nekretninama</a></td>
            </tr>
            <tr>
                <td><a href="../usluge.php?key=naseUsluge">Naše usluge</a><!--<a href="">Uslovi korištenja</a>--></td>
                <td>
                    <a href="nekretnina.php?key=<?php echo $topRated->topRated['id'][1]; ?>">
                        <?php echo $topRated->topRated['name'][1]; ?>
                    </a>
                </td>
                <td><a href="#">2. Servis kućanskih aparata</a></td>
            </tr>
            <tr>
                <td><a href="../usluge.php?key=onama">Ko smo mi ?</a></td>
                <td>
                    <a href="nekretnina.php?key=<?php echo $topRated->topRated['id'][2]; ?>">
                        <?php echo $topRated->topRated['name'][2]; ?>
                    </a>
                </td>
                <td><a href="#">3. Prodavnica kućanskih potrepština</a></td>
            </tr>
            <tr>
                <td><a href="#">Servis</a></td>
                <td>
                    <a href="nekretnina.php?key=<?php echo $topRated->topRated['id'][3]; ?>">
                        <?php echo $topRated->topRated['name'][3]; ?>
                    </a>
                </td>
                <td><a href="#"><span style="">4. Kreditiranje prilikom kupovine</span></a></td>
            </tr>
        </table>
    </div>
    <div id="secondFooterPart">
        <h4>OSTANIMO U KONTAKTU</h4><br>
        <p>Prijavite se i dobijajte svježe informacije, obavijesti o nekretninama, i najnovije vijesti iz kupoprodajnog svijeta.</p>
        <form method="post">
            <input id="footerInput" type="text" name="newsletter" placeholder="e-Mail">
            <input id="footerSubmit" type="submit" name="" value="Prijavite se"/>
        </form>
        <div id="secondFooterPartSocial">
            <a target="_blank" href="https://www.facebook.com/europlac.nekretnine/" title="Facebook stranica">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a target="_blank" href="https://www.youtube.com/user/europlac1" title="Youtube kanal">
                <i class="fa fa-youtube-square"></i>
            </a>
            <a href="" title="Uskoro">
                <i class="fa fa-google-plus-square"></i>
            </a>
            <a href="" title="Uskoro">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
    </div>
    <div id="thirdFooterPart"><br>
        <div id="thirdFooterPartOptions">
            <div class="thirdFooterPartOptionsOption thirdFooterPartOptionsOption2">
                <i class="fa fa-location-arrow"></i>
                <p>EURO-PLAC d.o.o</p>
            </div>
            <div class="thirdFooterPartOptionsOption">
                <i class="fa fa-location-arrow"></i>
                <p>Lojićka bb, 77220 Cazin </p>
            </div>
            <div class="thirdFooterPartOptionsOption">
                <i class="fa fa-phone"></i>
                <p>+38761/786-860 </p>
            </div>
            <div class="thirdFooterPartOptionsOption">
                <i class="fa fa-phone"></i>
                <p>+38760/35-74-103 </p>
            </div>
        </div>
        <div id="thirdFooterPartOptionsCopy">
            <p>
                <made>Made by : Aladin Kapić</made>
                <span>
                    COPYRIGHT © EURO-PLAC <year> 2007 - <?php echo date('Y'); ?> </year>
                </span>
            </p>
        </div>
    </div>
</footer>