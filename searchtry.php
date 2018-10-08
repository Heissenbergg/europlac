<?php
require_once 'class/newdb.php';
require_once 'class/estates.php';

//POVOLJNO USELJIVA KUĆA SA GARAŽOM CAZIN
$string = "POVOLJNO USELJIVA KUĆA SA GARAŽOM CAZIN";
$input = "Kuća Cazin";

$estate = new Nekretnine();

echo $estate -> doWeMatch('stan', 'MODERNO NAMJEŠTEN STAN B.KRUPA');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
</html>