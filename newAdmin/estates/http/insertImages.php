<?php
require '../../../class/newdb.php';
//require '../../class/article.php';

//$photo = new ArticlePhotos();
//$article_id = $_SESSION['lastid'];

$images = array();

//Ukupan broj slika (niz)
$count = count($_FILES['file']['name']);
$db = new DB();
$adminID = 22;
$postID = Session::getImageHash();

//Iteriraj kroz niz i ispiši svaki od elemenata
for ($i = 0; $i < $count; $i++) {
    $ext = pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
    $name = md5($_FILES['file']['name'][$i].time()).'.'.$ext;
    //$photo->insert($article_id, $name);
    $db->action("INSERT into `slike` (`iduser`, `sortid`, `ime`) VALUES ('{$adminID}', '{$postID}', '{$name}')");
    move_uploaded_file($_FILES['file']['tmp_name'][$i], '../../../slikebez/'. $name);
    array_push($images, $name);
    
    
    $stamp = imagecreatefrompng('../../../images/meh.png');
    $im = imagecreatefromjpeg('../../../slikebez/'.$name);
    $save_watermark_photo_address = '../../../slike/'.$name;
    
    // Set the margins for the stamp and get the height/width of the stamp image
    
    $marge_right = 10;
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);
    $imgx = imagesx($im);
    $imgy = imagesy($im);
    $centerX=round($imgx/2) - 150;
    $centerY=round($imgy/2) - 90;
    
    
    imagecopy($im, $stamp, $centerX, $centerY, 0, 0, imagesx($stamp), imagesy($stamp));
    imagejpeg($im, $save_watermark_photo_address, 80); 
    
}

echo json_encode($images);