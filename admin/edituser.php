<?php 
include 'functions.php';
/*if(isset($_POST['ime']) or isset($_POST['adresa']) or isset($_POST['telefon']) or isset($_POST['mail'])  or isset($_POST['sifra'])){
    $ime = $_POST['ime'];
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $mail = $_POST['mail'];
    $sifra = $_POST['sifra'];
    $register = "INSERT INTO `users`(`ime`, `adresa`, `telefon`, `mail`, `sifra`) 
        VALUES ('{$ime}','{$adresa}', '{$telefon}', '{$mail}', '{$sifra}')";
    $db->_pdo->query($register);
    Redirect::to('users.php'); 
}*/

if(!empty($_POST['obrisi'])){
    $db->deleteUser($_POST['obrisi'], 'users.php');
}
$id = $_GET['id'];
$users = $db->_pdo -> query('SELECT * FROM users');
while($row = $users->fetch()){
    if($row['id'] == $id){
    	$name = $row['ime'];
    	$adresa = $row['adresa'];
    	$telefon = $row['telefon'];
    	$mail = $row['mail'];
    	$primaMail = $row['prima'];
    }
}

if(isset($_POST['ime'])){
	$prima  = (Input::get('primaMail') === 'on') ? true : false;
    $ime = $_POST['ime'];
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $mail = $_POST['mail'];
	$update = "UPDATE `users` SET `ime` = '{$ime}', `adresa` = '{$adresa}', `telefon` = '{$telefon}', 
	          `mail` = '{$mail}', `prima` = '{$prima}'  WHERE id = $id ";
    $db->_pdo->query($update);
    Redirect::to('edituser.php?id='.$id);
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
        <h4 id="header"><?php echo $name; ?></h4>
        <form style="position:absolute; left:50px; top:150px;" method="post">
        	<input type="text" value="<?php echo $name; ?>" name="ime">
        	<input type="text" value="<?php echo $adresa; ?>" name="adresa">
        	<input type="text" value="<?php echo $telefon; ?>" name="telefon">
        	<input type="text" value="<?php echo $mail; ?>" name="mail">
        	<?php 
        		if($primaMail){ ?>
        			<input type="checkbox" name="primaMail" checked>
        		<?php }else {?>
        			<input type="checkbox" name="primaMail">
        		<?php }
        	?>
        	<input style="background:red; border:none; border-radius:5px; width:120px; height:30px; color:#fff;" type="submit" value="Spremi">
        </form>
    </section>
</html>