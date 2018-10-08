var marker;
var currentLatitude, currentLongitude;

function initMap(){
var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {lat: 44.967, lng: 15.904}
});

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: {lat: 44.967, lng: 15.904}
    });
    marker.addListener('dragend', function() {
        var latLng = this.position; 
        currentLatitude = latLng.lat();
        currentLongitude = latLng.lng();
        //console.log('lat ' + currentLatitude + ', long + ' + currentLongitude);
    });
}


var allImages = new Array();


function uploadAllPictures(){
	var data = new FormData();
	//files.length i file[] idu za mulitple files upload
	var ins = document.getElementById('file').files.length;
	for (var x = 0; x < ins; x++) {
	    data.append("file[]", document.getElementById('file').files[x]);
	}
    
    var allImagesWrapper = document.getElementById("allImagess");

	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	var arrayOfresult = JSON.parse(this.responseText);
	      	//allImages.push(arrayOfresult);
	      	for(var i=0; i<arrayOfresult.length; i++){
	      	    allImages.push(arrayOfresult[i]);
	      	    //console.log('recieved : ' + arrayOfresult[i]);
	      	}
	      	allImagesWrapper.innerHTML = '';
	      	for(var i=0; i<allImages.length; i++){
	      	    var imageW = document.createElement('div');
	      	    imageW.className = 'image';
	      	    allImagesWrapper.appendChild(imageW);
	      	    var image = document.createElement('img');
	      	    image.setAttribute('src', '../slike/' + allImages[i]);
	      	    imageW.appendChild(image);
	      	}
	      	//console.log(allImages);
	      	//document.getElementById("allImages").innerHTML = this.responseText;
	    }
	};
	xml.open('POST', 'estates/http/insertImages.php');
	//xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.send(data);
}


function saveEstate(){
    
    
    var naziv = document.getElementById("naziv").value;
    if(naziv === ''){
        alert("Prazno polje naziv !!");
        console.log("Naziv " + naziv);
        return;
    }
    console.log("Naziv " + naziv);
    var svrha = document.getElementById("svrha").value;
    var drzava = document.getElementById("drzava").value;
    var grad = document.getElementById("grad").value;
    var vrsta = document.getElementById("vrsta").value;
    var povrsinaObjekta = document.getElementById("povrsinaObjekta").value;
    var povrsinaZemljista = document.getElementById("povrsinaZemljista").value;
    var stanje = document.getElementById("stanje").value;
    var brojSoba = document.getElementById("brojSoba").value;
    var brojKupatila = document.getElementById("brojKupatila").value;
    var cijena = document.getElementById("cijena").value;
    var valuta = document.getElementById("valuta").value;
    var paket = document.getElementById("paket").value;
    var video = document.getElementById("video").value;
    var struja = document.getElementById("struja").value;
    var voda = document.getElementById("voda").value;
    var garaza = document.getElementById("garaza").value;
    var klima = document.getElementById("klima").value;
    var plin = document.getElementById("plin").value;
    var internet = document.getElementById("internet").value;
    var kanalizacija = document.getElementById("kanalizacija").value;
    var parking = document.getElementById("parking").value;
    var ostava = document.getElementById("ostava").value;
    var namjestaj = document.getElementById("namjestaj").value;
    var kablovska = document.getElementById("kablovska").value;
    var videoNadzor = document.getElementById("videoNadzor").value;
    var opis = document.getElementById("opis").value;
    
    
    var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	console.log(this.responseText);
	      	alert("Uspješno ste unijeli nekretninu");
	      	//window.location = '/newAdmin/newestate.php';
	    }
	};
	xml.open('POST', 'estates/http/insertEstate.php');
	xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("naziv="+naziv+"&svrha="+svrha+"&drzava="+drzava+"&grad="+grad+"&vrsta="+vrsta+"&povrsinaObjekta="+povrsinaObjekta+"&povrsinaZemljista="+povrsinaZemljista+"&stanje="+stanje+"&brojSoba="+brojSoba+"&brojKupatila="+brojKupatila+"&cijena="+cijena+"&valuta="+valuta+"&paket="+paket+"&video="+video+"&struja="+struja+"&voda="+voda+"&garaza="+garaza+"&klima="+klima+"&plin="+plin+"&internet="+internet+"&kanalizacija="+kanalizacija+"&parking="+parking+"&ostava="+ostava+"&namjestaj="+namjestaj+"&kablovska="+kablovska+"&videoNadzor="+videoNadzor+"&opis="+opis+"&sirina="+currentLatitude+"&visina="+currentLongitude);    
}
