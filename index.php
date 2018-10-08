<?php 
require_once 'class/newdb.php';
require_once 'class/estates.php';

$sixOfThem = new Homepageestates();
$topRated = new Homepageestates();
$topRated -> topRated();

?>
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

	<link rel="stylesheet" type="text/css" href="homepage/css/homepage.css">
	<link rel="stylesheet" type="text/css" href="homepage/css/slider.css">
	<link rel="stylesheet" type="text/css" href="homepage/css/circles.css">
	<link rel="stylesheet" type="text/css" href="homepage/css/ratedproducs.css">

	<!-- footer css -->
	<link rel="stylesheet" type="text/css" href="footer/css/footer.css">

	<!-- SCRIPTS -->
	<script type="text/javascript" src="menu/js/menu.js"></script>
	
	<script type="text/javascript" src="homepage/js/slider.js"></script>
	<script type="text/javascript" src="homepage/js/homepage.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<!-- USE FONTAWESOME -->
    
</head>
<body onload="setPage();">	
	<?php require_once 'menu/menu.php'; ?>

	<?php require_once 'homepage/backgimage.php'; ?>
	<?php require_once 'homepage/slider.php'; ?>
	<?php require_once 'homepage/circles.php'; ?>
	<?php require_once 'homepage/ratedproducs.php'; ?>

	<?php require_once 'footer/footer.php'; ?>

</body>
</html>
