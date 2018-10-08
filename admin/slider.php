<?php
include 'functions.php';
$slider = new DB();
$sliderQuery = $slider->_pdo -> query("SELECT * FROM slider");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/slider.css">
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id="allSliders">
            <?php 
                $counter = 1;
                while($row = $sliderQuery -> fetch()){ ?>
                    <div class="imagePart">
                        <div class="imagePartName">
                            <h4>Slajd broj <?php echo $counter++; ?></h4>
                        </div>
                        <div class="imageDeletePart">
                            <a href="deleteslide.php?id=<?php echo $row['id']; ?>">
                                OBRIŠITE
                            </a>
                        </div>
                        <div class="imagePartEdit">
                            <a href="editslider.php?id=<?php echo $row['id']; ?>">
                                UREDITE
                            </a>
                        </div>
                    </div>
                <?php }

            ?>
            <div class="imagePart" style="margin-top: 20px;">
                <div class="imagePartName" style="width: calc(100% - 180px);">
                    <h4>Unesite novu sliku</h4>
                </div>
                <div class="imagePartEdit" style="">
                    <a href="insertnewslider.php">
                        UNESITE
                    </a>
                </div>
            </div>
        </div>

        <!--
        <section>
            <table>
                <tr>
                    <td>Slika </td>
                    <td>Uredite</td>
                </tr>
                <?php 
                    while($row = $sliderQuery -> fetch()){ ?>
                        <tr>
                            <td>
                                <img style="width:230px; height: 150px;" src="slikeNaslovne/<?php echo $row['slika']; ?>">
                            </td>
                            <td>
                                <a style="padding: 10px 30px; background: #00c0cd; text-decoration: none;color:#fff; " href="editslider.php?id=<?php echo $row['id']; ?>"> UREDITE
                                </a>
                            </td>
                        </tr>
                    <?php }

                ?>
            </table>
        </section>-->
    </body>
</html>