<?php
include 'includes/naslovna.php';
include '../db.php';
$six = new SixofThem();
$location = 'slikeNaslovne/';
$db = new DB();
if(!empty($_FILES['changeSlide']['name'])){
        $naslov = $_POST['naziv'];
        $link = $_POST['link'];
	$name = $_FILES['changeSlide']['name'];
	$temp_name = $_FILES['changeSlide']['tmp_name'];
	$extension = explode('.', $name);
	$extension = strtolower(end($extension));
	$file = md5_file($temp_name) . time() . '.' . $extension;
	move_uploaded_file($temp_name, $location.$file);
	$register = "INSERT INTO `baner`(`naslov`, `slika`, `link`) VALUES ('{$naslov}','{$file }', '{$link }')";
	$db->_pdo->query($register );
}
if(!empty($_POST['deletBaner'])){
$id = $_POST['deletBaner'];
$delete = "DELETE FROM `baner` WHERE id = $id";
$db->_pdo->query($delete );
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <?php include 'menu.php'; ?>
    <style type="text/css">
        section table{
            top:20px;
            width:90%;
            margin:0px;
            padding:0px;
        }
        section table tr td{
            width:32%;
            height:150px;
        }
        section table tr td img{
            height:100%;
            width:auto;
        }
    </style>
    <section>
        <table>
            <tr>
                <td>Slika : </td>
                <td>Naslov : </td>
                <td colspan="2">Akcija : </td>
            </tr>
            <?php $six->writeBanner(); ?>
            <tr>
               <td colspan="4" style="text-align:left">
                  <form method="POST" enctype="multipart/form-data">
		     <input type="hidden" name="changeSlideId" value="<?php echo $row['id']; ?>">
		  
		  <input style="" type="file" name="changeSlide" id="changeSlide">
		  <input type="text" placeholder="Naziv" name="naziv">
		  <input type="text" placeholder="link" name="link">
		  <input class="changePictureGaleri" type="submit" value="Unesite">
	  	  </form>
               </td>
            </tr>
        </table>
    </section>
</html>