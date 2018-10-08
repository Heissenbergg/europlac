<?php 
require_once 'class/newdb.php';
require_once 'class/estates.php';
$db = new DB();

$nekretnina = new Nekretnina(Input::get('key'));
$nekretnina -> update_views(Input::get('key'));

?>
<html>
<head>
	<meta charset="utf-8">
	<meta property="og:url" content="http://www.europlac-nekretnine.com/index.php/" />
    <meta property="og:image" content="http://www.europlac-nekretnine.com/index.php/img/1.jpg" />
    <meta property="og:title" content="Dobrodošli na Europlac-nekretnine.com" />
    <meta property="og:description" content="Istražite potpuno novi svijet kupoprodaje." />
	<title><?php echo $nekretnina->_ime; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="menu/css/menu.css">

    <link rel="stylesheet" type="text/css" href="estates/css/estates.css">
    <link rel="stylesheet" type="text/css" href="estates/css/singleEstate.css">
	<!-- footer css -->
	<link rel="stylesheet" type="text/css" href="footer/css/footer.css">

	<!-- SCRIPTS -->
    <script type="text/javascript" src="estates/js/estates.js"></script>

	<!-- USE FONTAWESOME -->
    <script src="https://use.fontawesome.com/85a780918f.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA&callback=mapa"></script>

</head>
<body onload="setSingleImages();">	
	<?php require_once 'menu/menu.php'; ?>
	<?php require_once 'estates/header.php'; ?>
	<?php require_once 'estates/singleBody.php'; ?>
</body>
</html>
