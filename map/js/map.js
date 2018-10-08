var map = '', mapElement = '', mapOptions = '';

function mapa(x, y) {
    mapOptions = {
        zoom: 11,
        center: new google.maps.LatLng(x,y), // New York
        styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}]
    };

    mapElement = document.getElementById('map');

    map = new google.maps.Map(mapElement, mapOptions);
}

var allmarkers = new Array();
var icons = new Array("Apartman", "Kuca", "Poslovni prostor", "Stan", "Vikendica", "Vila", "Zemljiste");

function chooseMarker(category){
    
}

function setCities(){
    var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
			var arrayOfresult = JSON.parse(this.responseText);
			mapa(arrayOfresult['y'][0], arrayOfresult['x'][0]);
			//arrayOfresult['id'].length
			for(var i=0; i<arrayOfresult['id'].length; i++){
			    allmarkers.push(i);
			}
			for(var i=0; i<arrayOfresult['id'].length; i++){
			    var markerIcon = chooseMarker(arrayOfresult['kategorija'][i]);
			    allmarkers[i] = new google.maps.Marker({
                    position: new google.maps.LatLng(arrayOfresult['y'][i], arrayOfresult['x'][i]),
                    map: map,
                    title: arrayOfresult['naziv'][i],
                    markerID: arrayOfresult['id'][i],
                    x: arrayOfresult['x'][i],
                    y: arrayOfresult['y'][i],
                    icon: 'map/icons/' + arrayOfresult['kategorija'][i] + '.png'
                });
                
                allmarkers[i].addListener('click', function() {
                    showIt(this.markerID);
                    map.setZoom(14);
                    map.setCenter(this.position);
                });
			}
			
			document.getElementById("loadingBar").style.display = 'none';
			
	    }
	};
	
	xml.open('GET', 'map/http/cities.php');
	
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send();
}


function showIt(id){
    var xml = new XMLHttpRequest();
    console.log(id);
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
		    //console.log(this.responseText);
		    var estate = JSON.parse(this.responseText);
		    console.log(estate);
		    makeItVisible(estate);
	    }
	};
	
	xml.open('POST', 'map/http/estate.php');
	
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("id="+id);
}

function makeItVisible(estate){
    document.getElementById("estatePreviewHeaderValue").innerHTML = estate['naziv'][0];
    document.getElementById("objectLocation").innerHTML = estate['lokacija'][0] + ', <country>' + estate['drzava'][0] + '</country>';
    document.getElementById("objectPrice").innerHTML = estate['cijena'][0] + ' KM'
    document.getElementById("objectSurface").innerHTML = estate['povrsina'][0] + ' m<span> 2 </span>';
    
    document.getElementById("objectImage").setAttribute("src", 'slike/' + estate['slika'][0]);
    document.getElementById("objectLink").setAttribute("href", 'nekretnina.php?key=' + estate['id'][0]);
    
    
    document.getElementById("estatePreview").style.display = 'block';
}


function hidePreview(){
    document.getElementById("estatePreview").style.display = 'none';
}