<?php
include '../db.php';
include 'includes/naslovna.php';
$six = new SixofThem();
if(!empty($_FILES['file'])){
    foreach($_FILES['file']['name'] as $key => $name){
        $ext = explode('.', $name);
        $time = time();
        $name = md5($name).$time.'.'.$ext[1];
        
        if($_FILES['file']['error'][$key] == 0 and move_uploaded_file($_FILES['file']['tmp_name'][$key], "slikeNaslovne/{$name}")){
            $uploaded[] = $name;
            $six -> updatePic(Input::get('id'), $name);
            //echo '<img src="slike/'.$name.'"></img>';
        }
    }
}
if(!empty($_POST['naslov'])){
    $six->updaterest(Input::get('id'), $_POST['lokacija'], $_POST['link'], $_POST['naslov'], $_POST['povrsina'], $_POST['cijena']);
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
        <?php $six-> slika(Input::get('id')); ?>
        <form action="" method="post" enctype="multipart/form-data" onsubmit="wait();">
            <label for="file">Izaberite fotografije</label>
            <input type="file" id="file" name="file[]" multiple="multiple">
            <input id="submit" type="submit" value="Dodajte">
        </form>
        <ul>
            <form method="post">
                <?php $six -> edithome(Input::get('id')); ?>
                <li>
                    <input type="submit" value="Spremi">
                </li>
            </form>
        </ul>
    </section>
</html>