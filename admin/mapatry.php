
application/x-httpd-php objava.php 
PHP script text
<?php

include '../db.php';


if(!empty($_FILES['file'])){
    foreach($_FILES['file']['name'] as $key => $name){
        $id = explode('.', $name);
        $name = md5($name).'.'.$id[1];
        
        if($_FILES['file']['error'][$key] == 0 and move_uploaded_file($_FILES['file']['tmp_name'][$key], "slike/{$name}")){
            $uploaded[] = $name;
        }
    }
    if(!empty($_POST['ajax'])){
        die(json_encode($uploaded));
    }
}

?>

<meta charset="UTF-8">
<link rel="stylesheet" href="../css/objava.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var idNekretnine;
    var imeUplatnica;
    var adresaUplatnica;
    var telefonUplatnica;
    var voda = 0;
    var struja = 0;
    var garaza = 0;
    var klima = 0;
    var plin = 0;
    var internet = 0;
    var kanalizacija = 0;
    var parking = 0;
    var ostava = 0;
    var namjestaj = 0;
    var kablovska = 0;
    var videonadzor = 0;
    
    var sirina = 0;
    var visina = 0;
    
    
    function Unesi(){
        //document.getElementById('pricekajte').style.display = 'block';
        var svrha = $("#svrha").val();
        var naziv = $("#naziv").val();
        var lokacija = $("#lokacija").val();
        var nekretnina = $("#nekretnina").val();
        var povObjekta = $("#povObjekta").val();
        var povZemljista = $("#povZemljista").val();
        var stanje = $("#stanje").val();
        var brojSoba = $("#brojSoba").val();
        var brojKupatila = $("#brojKupatila").val();
        var cijena = $("#cijena").val();
        var valuta = $("#valuta").val();
        var opis = $("#opis").val();
        var drzava = $("#drzava").val();
        var video = $("#video").val();
        console.log(video);
        var paket = $("#paket").val();
        if(naziv == ''){
            document.getElementById("naziv").value  = "Obavezno polje";
			document.getElementById("naziv").style.color = 'red';
			return false;
        }else if(lokacija == ''){
            document.getElementById("lokacija").value  = "Obavezno polje";
			document.getElementById("lokacija").style.color = 'red';
			return false;
        }else if(povObjekta == ''){
            document.getElementById("povObjekta").value  = "Obavezno polje";
			document.getElementById("povObjekta").style.color = 'red';
        }else if(povZemljista == ''){
            document.getElementById("povZemljista").value  = "Obavezno polje";
			document.getElementById("povZemljista").style.color = 'red';
        }else if(cijena == ''){
            document.getElementById("cijena").value  = "Obavezno polje";
			document.getElementById("cijena").style.color = 'red';
        }else if(opis == ''){
            document.getElementById("opis").value  = "Obavezno polje";
			document.getElementById("opis").style.color = 'red';
        }else{
            if(document.getElementById("voda").checked == true){
                voda = 1;
            }if(document.getElementById("struja").checked == true){
                struja = 1;
            }if(document.getElementById("garaza").checked == true){
                garaza = 1;
            }if(document.getElementById("klima").checked == true){
                klima = 1;
            }if(document.getElementById("plin").checked == true){
                plin = 1;
            }if(document.getElementById("internet").checked == true){
                internet = 1;
            }if(document.getElementById("kanalizacija").checked == true){
                kanalizacija = 1;
            }
            if(document.getElementById("parking").checked == true){
                parking = 1;
            }if(document.getElementById("ostava").checked == true){
                ostava = 1;
            }if(document.getElementById("namjestaj").checked == true){
                namjestaj = 1;
            }if(document.getElementById("kablovska").checked == true){
                kablovska = 1;
            }if(document.getElementById("videonadzor").checked == true){
                videonadzor = 1;
            }
            $.ajax({
				type:'POST',
				url:'unesiobjavu.php',
				data:{svrha:svrha, naziv:naziv,paket:paket, lokacija:lokacija, drzava:drzava, nekretnina:nekretnina, povObjekta:povObjekta, povZemljista:povZemljista, stanje:stanje, brojSoba:brojSoba, brojKupatila:brojKupatila, cijena:cijena, valuta:valuta, voda:voda, struja:struja, garaza:garaza, klima:klima, plin:plin,internet:internet, kanalizacija:kanalizacija, parking:parking, ostava:ostava, namjestaj:namjestaj, kablovska:kablovska, videonadzor:videonadzor, opis:opis, sirina:sirina, visina:visina, video:video},
				success:function(){
					window.location = "uploadtry.php";
				}
			});
            return false;    
        } return false;
    }
    
</script>
<script type="text/javascript">
	$(document).ready(function(){
		/*setInterval(function(){
			$("#idNekretnine").load("includes/idNekretnine.php"); 
			idNekretnine = document.getElementById("idNekretnine").innerHTML;
			$("#imeUplatnica").load("includes/imeUplatnica.php");
			$("#telefonUplatnica").load("includes/telefonUplatnica.php");
			$("#adresaUplatnica").load("includes/adresaUplatnica.php");
			imeUplatnica = document.getElementById("imeUplatnica").innerHTML;
			telefonUplatnica = document.getElementById("telefonUplatnica").innerHTML;
			adresaUplatnica = document.getElementById("adresaUplatnica").innerHTML;
			console.log(idNekretnine);
		},1000); */
	});
	function showMap(){
	    document.getElementById("map_canvas").style.display = 'block';
	    init();
	}
</script>
<p id="idNekretnine"></p>
<style type="text/css">
    #map_canvas{
        right:50px;
        width:100%;
        height:400px;
        z-index:1000000000000;
    }
    #sirina, #visina{
        display:none;
    }
</style>
<p id="sirina"></p>
<p id="visina"></p>
<script type="text/javascript">
    function init(){
        
}
</script>
<?php include 'menu.php'; ?>
<section style="position:absolute; left:380px; width:calc(100% - 380px); top: 80px;">
 <input type="text" id="meh" name="meh">
<div id="map_canvas" style="position:absolute; left:0px; top:100px; width:800px;"></div>
 </section>


<script type="text/javascript">
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 5,
        center: new google.maps.LatLng(44.976, 15.890),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng(44.976, 15.890),
        draggable: true
    });
    
    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
        visina = evt.latLng.lat().toFixed(3);
        sirina = evt.latLng.lng().toFixed(3);
        console.log(sirina);
        console.log(visina);
        document.getElementById("meh").value = sirina;
        /*
        document.getElementById('visina').innerHTML = evt.latLng.lat().toFixed(3);
        document.getElementById('sirina').innerHTML = evt.latLng.lng().toFixed(3);
        console.log('sirina' + evt.latLng.lng().toFixed(3)); */
        //document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
        //console.log('<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>');
    });
    
    google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
        //document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
    });
    
    map.setCenter(myMarker.position);
    myMarker.setMap(map);
</script>