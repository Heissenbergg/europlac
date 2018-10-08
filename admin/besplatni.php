<?php 
include 'functions.php';
if(!empty($_POST['obrisi'])){
    $db->deletePost($_POST['obrisi'], 'besplatni.php');
}
if(!empty($_POST['izdvoji'])){
    $db->izdvojiPost($_POST['izdvoji'], 'besplatni.php');
}


function calculate($time){
    $now = time();
    $time = $now - $time;
    $month = 2592000 - $time;
    $day = $month / 86400;
    return (int)$day;
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
                <td style="height:50px" class="oglasis oglasis2"><p>Slika :</p> </td>
                <td style="height:50px" class="oglasis oglasis2"><p>Naslov oglasa (Ime)</p></td>
                <td style="height:50px" class="oglasis oglasis2"><p>Lokacija : </p></td>
                <td style="height:50px" class="oglasis oglasis2"><p>Cijena : </p></td>
                <td style="height:50px" class="oglasis oglasis2"><p>Akcija : </p></td>
                <td style="height:50px" class="oglasis oglasis2"><p>Akcija : </p></td>
                
            </tr>
            <?php
                while($row = $moji ->fetch()){
                    if($row['izdvojeno'] == 1 and $row['admin'] == 0){ 
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
                            <td class="oglasis oglasis2"><p><?php echo $row['naziv']; ?>, <br>( <?php echo $ime.' - '; echo calculate($row['time']).' dana '. $mail.' '.$telefon; ?> )</p></td>
                            <td class="oglasis oglasis2"><p><?php echo $row['lokacija']; ?></p></td>
                            <td class="oglasis oglasis2"><p><?php echo $row['cijena'].'('.$row['valuta'].')'; ?></p></td>
                            <td class="oglasis">
                                <a href="edit.php?id=<?php echo $row['id']; ?>">
                                    <p><input id="uredi" value="Uredi"></p>
                                </a>
                            </td>
                            <td class="oglasis oglasis2"><p>
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