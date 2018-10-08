<?php
if(!empty($_FILES['file'])){
    $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    echo $name = md5($_FILES['file']['name'].time()).'.'.$ext;
    move_uploaded_file($_FILES['file']['tmp_name'], '../images/'. $name);
    //$user -> updateImage($name, $user->id());
    //print_r($uploaded);
}