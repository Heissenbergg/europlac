<?php 
require_once 'class/newdb.php';

$grad = Input::get('grad');
Session::setCity($grad);

?>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $grad; ?></title>
	<!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="menu/css/menu.css">
    <link rel="stylesheet" type="text/css" href="map/css/map.css">
	<!-- SCRIPTS -->
	<script type="text/javascript" src="menu/js/menu.js"></script>
	<script type="text/javascript" src="map/js/map.js"></script>
	
	<script type="text/javascript" src="js/main.js"></script>

	<!-- USE FONTAWESOME -->
    <script src="https://use.fontawesome.com/85a780918f.js"></script>
</head>
<body onload="setCities();">	
	<?php require_once 'menu/menu.php'; ?>

	<?php require_once 'map/map.php'; ?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
</body>
</html>
