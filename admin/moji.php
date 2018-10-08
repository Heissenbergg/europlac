<?php 
include 'functions.php';
if(!empty($_POST['obrisi'])){
    $db->deletePost($_POST['obrisi'], 'moji.php');
}
$inputfield = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <?php include 'menu.php'; ?>
    <section>
        <form method="POST" style="position:absolute; left:50px; top:80px;">
            <input 
                style="width:300px; height:35px;"
                type="text" 
                name="nazivOglasa" 
                placeholder="Stan u Cazinu">
            <input style="width:100px; height:40px; border:none; background: #79b8f6; color:#fff; " type="submit" value="Pretraga">
        </form>
        <form method="POST" style="position:absolute; left:50px; top:130px;">
            <input 
                style="width:300px; height:35px;"
                type="text" 
                name="location" 
                placeholder="Ime grada (Cazin)">
            <input style="width:100px; height:40px; border:none; background: #79b8f6; color:#fff; " type="submit" value="Pretraga">
        </form>
        <form method="POST" style="position:absolute; left:50px; top:180px;">
            <input 
                style="width:300px; height:35px;"
                type="text" 
                name="nekretnina" 
                placeholder="Vrsta nekretnine (Stan)">
            <input style="width:100px; height:40px; border:none; background: #79b8f6; color:#fff; " type="submit" value="Pretraga">
        </form>
        <form method="POST" style="position:absolute; left:50px; top:230px;">
            <input 
                style="width:300px; height:35px;"
                type="text" 
                name="id" 
                placeholder="ID">
            <input style="width:100px; height:40px; border:none; background: #79b8f6; color:#fff; " type="submit" value="Pretraga">
        </form>

        <table style="margin-top:200px;">
            <tr>
                <td style="height:50px" class="oglasis"><p>Slika :</p> </td>
                <td style="height:50px" class="oglasis"><p>Naslov oglasa (ID)</p></td>
                <td style="height:50px" class="oglasis"><p>Lokacija : </p></td>
                <td style="height:50px" class="oglasis"><p>Cijena : </p></td>
                <td style="height:50px" class="oglasis"><p>Akcija : </p></td>
                <td style="height:50px" class="oglasis"><p>Akcija : </p></td>
            </tr>
            <?php
                if(!empty($_POST['nazivOglasa'])){
                    $item = $_POST['nazivOglasa'];
                    $inputfield = $item;
                    $item = mb_strtoupper($item, 'UTF-8');
                    while($row = $moji ->fetch()){
                        if($row['admin'] == 1){
                            $ime = mb_strtoupper($row['naziv'], 'UTF-8');
                            $lokacija = mb_strtoupper($row['lokacija'], 'UTF-8');
                            $drzava = mb_strtoupper($row['drzava'], 'UTF-8');
                            $nekretnina = mb_strtoupper($row['nekretnina'], 'UTF-8');
                            if(strstr($ime, $item) || strstr($lokacija, $item) || strstr($drzava, $item) || strstr($nekretnina, $item)){ ?>
                                <tr>
                                    <?php 
                                        $noviquery = $db->_pdo -> query('SELECT * FROM slike');
                                        while($col = $noviquery -> fetch()){
                                            if($col['idpost'] == $row['id']){
                                                //echo '<img class="smalImagesOfPosts" src = "slike/'.$col['ime'].'"></img>';
                                                echo '<td class="oglasis"><img src="../slike/'.$col['ime'].'"></img></td>';
                                                break;
                                            }
                                        }  
                                    ?>
                                    <td class="oglasis"><p><?php echo $row['naziv']; ?>,<br>( <?php echo $row['id']; ?> )</p></td>
                                    <td class="oglasis"><p><?php echo $row['lokacija']; ?></p></td>
                                    <td class="oglasis"><p><?php echo $row['cijena'].'('.$row['valuta'].')'; ?></p></td>
                                    <td class="oglasis">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>">
                                            <p><input id="uredi" value="Uredi"></p>
                                        </a>
                                    </td>
                                    <td class="oglasis"><p>
                                        <form method="post">
                                            <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                            <input id="obrisi" type="submit" value="Obriši">
                                        </form>
                                    </p></td>
                                </tr>
                            <?php } 
                        }
                    }
                }
                else if($_POST['location']){
                    $item = $_POST['location'];
                    $inputfield = $item;
                    $item = mb_strtoupper($item, 'UTF-8');
                    while($row = $moji ->fetch()){
                        if($row['admin'] == 1){
                            $ime = mb_strtoupper($row['lokacija'], 'UTF-8');
                            if(strstr($ime, $item)){ ?>
                                <tr>
                                    <?php 
                                        $noviquery = $db->_pdo -> query('SELECT * FROM slike');
                                        while($col = $noviquery -> fetch()){
                                            if($col['idpost'] == $row['id']){
                                                //echo '<img class="smalImagesOfPosts" src = "slike/'.$col['ime'].'"></img>';
                                                echo '<td class="oglasis"><img src="../slike/'.$col['ime'].'"></img></td>';
                                                break;
                                            }
                                        }  
                                    ?>
                                    <td class="oglasis"><p><?php echo $row['naziv']; ?>,<br>( <?php echo $row['id']; ?> )</p></td>
                                    <td class="oglasis"><p><?php echo $row['lokacija']; ?></p></td>
                                    <td class="oglasis"><p><?php echo $row['cijena'].'('.$row['valuta'].')'; ?></p></td>
                                    <td class="oglasis">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>">
                                            <p><input id="uredi" value="Uredi"></p>
                                        </a>
                                    </td>
                                    <td class="oglasis"><p>
                                        <form method="post">
                                            <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                            <input id="obrisi" type="submit" value="Obriši">
                                        </form>
                                    </p></td>
                                </tr>
                            <?php } 
                        }
                    }
                }
                else if(!empty($_POST['nekretnina'])){
                    $item = $_POST['nekretnina'];
                    $inputfield = $item;
                    $item = mb_strtoupper($item, 'UTF-8');
                    while($row = $moji ->fetch()){
                        if($row['admin'] == 1){
                            $ime = mb_strtoupper($row['nekretnina'], 'UTF-8');
                            if(strstr($ime, $item)){ ?>
                                <tr>
                                    <?php 
                                        $noviquery = $db->_pdo -> query('SELECT * FROM slike');
                                        while($col = $noviquery -> fetch()){
                                            if($col['idpost'] == $row['id']){
                                                //echo '<img class="smalImagesOfPosts" src = "slike/'.$col['ime'].'"></img>';
                                                echo '<td class="oglasis"><img src="../slike/'.$col['ime'].'"></img></td>';
                                                break;
                                            }
                                        }  
                                    ?>
                                    <td class="oglasis"><p><?php echo $row['naziv']; ?>,<br>( <?php echo $row['id']; ?> )</p></td>
                                    <td class="oglasis"><p><?php echo $row['lokacija']; ?></p></td>
                                    <td class="oglasis"><p><?php echo $row['cijena'].'('.$row['valuta'].')'; ?></p></td>
                                    <td class="oglasis">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>">
                                            <p><input id="uredi" value="Uredi"></p>
                                        </a>
                                    </td>
                                    <td class="oglasis"><p>
                                        <form method="post">
                                            <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                            <input id="obrisi" type="submit" value="Obriši">
                                        </form>
                                    </p></td>
                                </tr>
                            <?php } 
                        }
                    }
                }
                else if(!empty($_POST['id'])){
                    $item = $_POST['id'];
                    $inputfield = $item;
                    $item = mb_strtoupper($item, 'UTF-8');
                    while($row = $moji ->fetch()){
                        if(1){
                            $ime = mb_strtoupper($row['id'], 'UTF-8');
                            if($item == $row['id']){ ?>
                                <tr>
                                    <?php 
                                        $noviquery = $db->_pdo -> query('SELECT * FROM slike');
                                        while($col = $noviquery -> fetch()){
                                            if($col['idpost'] == $row['id']){
                                                //echo '<img class="smalImagesOfPosts" src = "slike/'.$col['ime'].'"></img>';
                                                echo '<td class="oglasis"><img src="../slike/'.$col['ime'].'"></img></td>';
                                                break;
                                            }
                                        }  
                                    ?>
                                    <td class="oglasis"><p><?php echo $row['naziv']; ?>,<br>( <?php echo $row['id']; ?> )</p></td>
                                    <td class="oglasis"><p><?php echo $row['lokacija']; ?></p></td>
                                    <td class="oglasis"><p><?php echo $row['cijena'].'('.$row['valuta'].')'; ?></p></td>
                                    <td class="oglasis">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>">
                                            <p><input id="uredi" value="Uredi"></p>
                                        </a>
                                    </td>
                                    <td class="oglasis"><p>
                                        <form method="post">
                                            <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                            <input id="obrisi" type="submit" value="Obriši">
                                        </form>
                                    </p></td>
                                </tr>
                            <?php } 
                        }
                    }
                }

                else {

                while($row = $moji ->fetch()){
                    if($row['admin'] == 1){ ?>
                        <tr>
                            <?php 
                                $noviquery = $db->_pdo -> query('SELECT * FROM slike');
                                while($col = $noviquery -> fetch()){
                                    if($col['idpost'] == $row['id']){
                                        //echo '<img class="smalImagesOfPosts" src = "slike/'.$col['ime'].'"></img>';
                                        echo '<td class="oglasis"><img src="../slike/'.$col['ime'].'"></img></td>';
                                        break;
                                    }
                                }  
                            ?>
                            <td class="oglasis"><p><?php echo $row['naziv']; ?>,<br>( <?php echo $row['id']; ?> )</p></td>
                            <td class="oglasis"><p><?php echo $row['lokacija']; ?></p></td>
                            <td class="oglasis"><p><?php echo $row['cijena'].'('.$row['valuta'].')'; ?></p></td>
                            <td class="oglasis">
                                <a href="edit.php?id=<?php echo $row['id']; ?>">
                                    <p><input id="uredi" value="Uredi"></p>
                                </a>
                            </td>
                            <td class="oglasis"><p>
                                <form method="post">
                                    <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                    <input id="obrisi" type="submit" value="Obriši">
                                </form>
                            </p></td>
                        </tr>
                    <?php }
                } }
            ?>
        </table>
    </section>
</html>