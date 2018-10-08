var weAreSerching = 0;


function setSearchProperty(val){
    var searchInput = document.getElementById("mainSearch");
    if(!val){
        weAreSerching = 0;
        searchInput.setAttribute("placeholder", 'Stan Cazin');
    }else{
        weAreSerching ++;
        searchInput.setAttribute("placeholder", '735');
    }
}


function searchThoseEstates(){
	var value = document.getElementById("mainSearch").value;
	if(!weAreSerching){
		window.location = 'nekretnine.php?kategorija=Sve&input='+value;
	}else{
		window.location = 'nekretnine.php?id='+value;
	}
}

function setSingleImages(){
    var images = document.getElementById("singleEstateImages").getElementsByClassName("mainImage");
    
    for(var i=0; i<images.length; i++){
        images[i].style.display = 'none';
    }
    images[0].style.display = 'block';
    
    document.getElementById("loadingBar").style.display = 'none';
    
    var x = parseFloat(document.getElementById("xCoordinate").innerHTML);
    var y = parseFloat(document.getElementById("yCoordinate").innerHTML);
    
    mapa(y,x);
}

var currentSlide = 0;

//Check this once again
function hideAllImages(){
	var sliderImages = document.getElementById("singleEstateImages").getElementsByClassName("mainImage");
	for(var i=0; i<sliderImages.length; i++){
		sliderImages[i].style.display = 'none';
	}
}

function nextImage(direction = null){
	hideAllImages();
	
	var sliderImages = document.getElementById("singleEstateImages").getElementsByClassName("mainImage");
	if(currentSlide < sliderImages.length - 1){
		currentSlide++;
		sliderImages[currentSlide].style.display = 'block';
	}else{
		sliderImages[sliderImages.length - 1].style.display = 'block';
	//	currentSlide = 0;
	//	sliderImages[currentSlide].style.display = 'block';
	}
}

function previousImage(){
	hideAllImages();
	
	var sliderImages = document.getElementById("singleEstateImages").getElementsByClassName("mainImage");
	if(currentSlide == 0){
		//currentSlide = sliderImages.length - 1;
		sliderImages[0].style.display = 'block';
	}else{
		currentSlide --;
		sliderImages[currentSlide].style.display = 'block';
	}
}


function mapa(y,x){
    var pozicija = {lat: y, lng: x};
    var myStyle = [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
                ];
    var map = new google.maps.Map(document.getElementById("map"), {
		zoom: 14,
		center: pozicija,
		styles: myStyle
	});
	
	var marker = new google.maps.Marker({
        position: new google.maps.LatLng(pozicija),
        map: map,
        title: 'EURO-PLAC d.o.o'
        //icon: 'map/icons/' + arrayOfresult['kategorija'][i] + '.png'
    });
	
	
}