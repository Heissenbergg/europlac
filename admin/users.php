<?php 
include 'functions.php';
if(isset($_POST['ime']) or isset($_POST['adresa']) or isset($_POST['telefon']) or isset($_POST['mail'])  or isset($_POST['sifra'])){
    $ime = $_POST['ime'];
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $mail = $_POST['mail'];
    $sifra = $_POST['sifra'];
    $register = "INSERT INTO `users`(`ime`, `adresa`, `telefon`, `mail`, `sifra`) 
        VALUES ('{$ime}','{$adresa}', '{$telefon}', '{$mail}', '{$sifra}')";
    $db->_pdo->query($register);
    Redirect::to('users.php'); 
}

if(!empty($_POST['obrisi'])){
    $db->deleteUser($_POST['obrisi'], 'users.php');
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
        <h4 id="header">Svi korisnici</h4>
        <form method="POST" action="" style="position:absolute; left:50px; top: 160px;">
            <input id="sifra" type="password" name="sifra" placeholder="Šifra">
            <input id="ime" type="text" name="ime" placeholder="Ime i prezime"/>
            <input id="adresa" type="text" name="adresa" placeholder="Adresa"/>
            <input id="telefon" type="text" name="telefon" placeholder="Telefon"/>
            <input id="mail" type="text" name="mail" placeholder="e-Mail"/>

            <input id="button" type="submit" value="Spremi">
        </form>
        <form method="post" style="position:absolute; left:50px; top: 220px;">
            <input type="text" name="searchUser" placeholder="Ime i prezime">
            <input type="submit" name="submitSearch" value="Pretraga">
        </form>
        <table style="margin-top:200px;">
            <?php
                $users = $db->_pdo -> query('SELECT * FROM users');
                if(!empty($_POST['searchUser'])){ 
                    $item = $_POST['searchUser'];
                    $item = mb_strtoupper($item, 'UTF-8');
                    while($row = $users ->fetch()){
                        $ime = mb_strtoupper($row['ime'], 'UTF-8');
                        $mail = mb_strtoupper($row['mail'], 'UTF-8');
                        if(strstr($ime,$item) or strstr($mail, $item)){ ?>
                            <tr>
                                <td><?php echo $row['ime']; ?> </td>
                                <td><?php echo $row['adresa']; ?></td>
                                <td><?php echo $row['telefon']; ?></td>
                                <td><?php echo $row['mail']; ?></td>
                                <td>
                                   <form method="post">
                                     <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                     <input type="submit" value="Obrisi">
                                   </form>
                                </td>
                                <td>
                                    <div style="background:green; width:200px; height:30px;">
                                        <a style="color:#fff; text-decoration:none; font-size:20px;" href="edituser.php?id=<?php echo $row['id']; ?>">Uredi</a>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } 
                } else{
                    while($row = $users ->fetch()){ ?>
                         <tr>
                            <td><?php echo $row['ime']; ?> </td>
                            <td><?php echo $row['adresa']; ?></td>
                            <td><?php echo $row['telefon']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td>
                               <form method="post">
                                 <input type="hidden" name="obrisi" value="<?php echo $row['id']; ?>">
                                 <input type="submit" value="Obrisi">
                               </form>
                            </td>
                            <td>
                                 <div style="background:green; width:200px; height:30px;">
                                     <a style="color:#fff; text-decoration:none; font-size:20px;" href="edituser.php?id=<?php echo $row['id']; ?>">Uredi</a>
                                 </div>
                            </td>
                        </tr>      
                    <?php } 
                }
                
            ?>
        </table>
    </section>
</html>