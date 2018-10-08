<?php 
require 'class/newdb.php';

$input = Input::get('key');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>EURO-PLAC d.o.o</title>
    	<!-- GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
    	
    	<!-- CSS -->
    	<link rel="stylesheet" type="text/css" href="css/style.css">
    	<link rel="stylesheet" type="text/css" href="menu/css/menu.css">
    
        <link rel="stylesheet" href="usluge/css/usluge.css" type="text/css" />
    	<!-- SCRIPTS -->
    	<script type="text/javascript" src="menu/js/menu.js"></script>
    	
    	<script type="text/javascript" src="usluge/js/usluge.js"></script>
    
    	<!-- USE FONTAWESOME -->
        <script src="https://use.fontawesome.com/85a780918f.js"></script><script src="https://use.fontawesome.com/85a780918f.js"></script>
    </head>
    <body onload="hideLoading();">
        <div id="mobileIconUsluge" onclick="showMobileMenuUsluge()">
            <img src="../usluge/images/cityscape.png"></img>
        </div>
        
        <?php require_once('menu/menu.php'); ?>
        <div id="menu">
            <?php require_once('usluge/uslugeMenu.php'); ?>
        </div>
        
        <div id="body">
            <?php 
                if($input == 'naseUsluge'){
                    require_once 'usluge/cimesebavimo.php';
                }else if($input == 'gradjevinske'){
                    require_once 'usluge/gradjevinskedozvole.php';
                }else if($input == 'savjeti'){
                    require_once 'usluge/savjetipriprodaji.php';
                }else if($input == 'onama'){
                    require_once 'usluge/onama.php';
                }else if($input == 'servis'){
                    require_once 'usluge/servis.php';
                }
            ?>
        </div>
    </body>
</html>