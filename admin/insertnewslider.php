<?php
include 'functions.php';
$slider = new DB();

$slika = '';

$inserted = 0;

if(!empty($_FILES['file'])){
    foreach($_FILES['file']['name'] as $key => $name){
        $ext = explode('.', $name);
        $time = time();
        $name = md5($name).$time.'.'.$ext[1];
        
        if($_FILES['file']['error'][$key] == 0 and move_uploaded_file($_FILES['file']['tmp_name'][$key], "slikeNaslovne/{$name}")){
            $_SESSION['imageName'] = $name;

            //$uploaded[] = $name;
            //$slider -> updateSliderPhoto($id, $name);
        }
    }
}

$slika = $_SESSION['imageName'];

if(!empty($_POST['link'])){
    $link = $_POST['link'];
    $_SESSION['imageName'] = '';
    $inserted++;
    $slider->action("INSERT into `slider` (`slika`, `link`) VALUES ('{$slika}', '{$link}')");
    //$slider -> updateSliderLink($id, $_POST['link']);
}

if($inserted) Redirect::to('slider.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <section>
            <img style="width:90%; margin-left: 5%; margin-top: 50px; height: 50%;" src="slikeNaslovne/<?php echo $slika; ?>">
            <form action="" method="post" enctype="multipart/form-data" onsubmit="wait();" style="margin-left:5%; margin-top:50px;">
                <label for="file">Izaberite fotografije</label>
                <input type="file" id="file" name="file[]" multiple="multiple">
                <input id="submit" type="submit" value="Dodajte">
            </form>

            <form method="post" style="margin-left: 5%; margin-top: 50px;">
                <input style="width:300px;" type="text" name="link" value="">
                <input type="submit" value="Spremite link">
            </form>
        </section>
    </body>
</html>