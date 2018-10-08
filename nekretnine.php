<?php 
require_once 'class/newdb.php';
require_once 'class/estates.php';


require_once 'estates/filter.php';

$numberOfPages =  numberOfPages($_SESSION['category']);



?>

<html>
<head>
	<meta charset="utf-8">
	<title>Pregled nekretnina</title>
	
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="menu/css/menu.css">

    <link rel="stylesheet" type="text/css" href="estates/css/estates.css">
	<!-- footer css -->
	<link rel="stylesheet" type="text/css" href="footer/css/footer.css">

	<!-- SCRIPTS -->
	<script type="text/javascript" src="menu/js/menu.js"></script>
	
    <script type="text/javascript" src="estates/js/estates.js"></script>

	<!-- USE FONTAWESOME -->
    <script src="https://use.fontawesome.com/85a780918f.js"></script>
    <script src="https://use.fontawesome.com/85a780918f.js"></script>

</head>
<body onload="hideLoading();">	
	<?php require_once 'menu/menu.php'; ?>
	<?php require_once 'estates/header.php'; ?>
	<?php require_once 'estates/body.php'; ?>
</body>
</html>
