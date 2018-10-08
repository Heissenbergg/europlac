<?php 
include 'functions.php';
if(!empty($_POST['obrisi'])){
    $db->deletePost($_POST['obrisi'], 'izdvojeni.php');
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
        <table>
            <tr>
                <td style="height:50px" class="oglasis"><p>Slika :</p> </td>
                <td style="height:50px" class="oglasis"><p>Naslov oglasa (ID)</p></td>
                <td style="height:50px" class="oglasis"><p>Lokacija : </p></td>
                <td style="height:50px" class="oglasis"><p>Cijena : </p></td>
                <td style="height:50px" class="oglasis"><p>Akcija : </p></td>
                <td style="height:50px" class="oglasis"><p>Akcija : </p></td>
            </tr>
            <?php
                while($row = $moji ->fetch()){
                    if($row['izdvojeno'] == 2 || $row['izdvojeno'] == 3 || $row['izdvojeno'] == 4 || $row['izdvojeno'] == 5 || $row['izdvojeno'] == 6 || $row['izdvojeno'] == 7){ ?>
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
            ?>
        </table>
    </section>
</html>