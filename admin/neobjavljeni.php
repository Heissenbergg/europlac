<?php 
include 'functions.php';
if(!empty($_POST['obrisi'])){
    $db->deletePost($_POST['obrisi'], 'moji.php');
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
                    if($row['izdvojeno'] == 0){ 
                    	$userID = $row['userid'];
                        $users = $db->_pdo -> query('SELECT * FROM users');
                        while($col = $users -> fetch()){
                            if($col['id'] == $userID){
                                $ime = $col['ime'];
                                $mail = $col['mail'];
                                $telefon = $col['telefon'];
                                break;
                            }
                            $eee = $col['id'];
                        }
                    	?>
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
                            <td class="oglasis"><p><?php echo $row['naziv']; ?>,<br>( <?php echo $ime.' - '; echo ' '.$mail.' '.$telefon; ?> )</p></td>
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