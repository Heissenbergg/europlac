<?php
include '../db.php';
include 'includes/naslovna.php';
$six = new SixofThem();
$location = 'slikeNaslovne/';
$db = new DB();
$id = Input::get('id');
if(!empty($_FILES['changeSlide']['name'])){
	$name = $_FILES['changeSlide']['name'];
	$temp_name = $_FILES['changeSlide']['tmp_name'];
	$extension = explode('.', $name);
	$extension = strtolower(end($extension));
	$file = md5_file($temp_name) . time() . '.' . $extension;
	move_uploaded_file($temp_name, $location.$file);
	$update = "UPDATE `baner` SET `slika` = '{$file}' WHERE id = $id";
	$db->_pdo->query($update);
}
if(!empty($_POST['naslov'])){
    $six->updaterestbaner(Input::get('id'), $_POST['link'], $_POST['naslov']);
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
        form{
            position:absolute;
            left:30px;
            top:200px;
        }
        #slika{
            position:absolute;
            left:30px;
            top:20px;
            height:160px;
        }
        ul{
            position:absolute;
            left:30px;
            top:250px;
            margin:0px;
            padding:0px;
        }
        ul li{
            list-style:none;
            height:50px;
        }
        ul li input{
            position:absolute;
            left:300px;
        }
    </style>
    <section>
        <?php $six-> slikaBaner(Input::get('id')); ?>
        <form action="" method="post" enctype="multipart/form-data" >
            <label for="file">Izaberite fotografije</label>
            <input type="file" id="file" name="changeSlide" multiple="multiple">
            <input id="submit" type="submit" value="Dodajte">
        </form>
        <ul>
            <form method="post">
                <?php $six -> editBaner(Input::get('id')); ?>
                <li>
                    <input type="submit" value="Spremi">
                </li>
            </form>
        </ul>
    </section>
</html>