/*var currentImage = 0;
function slideImage(){
	var windowsW = window.innerWidth;
    var slider = document.getElementById("homepageSlider");
    var sliderImages = slider.getElementsByClassName("sliderImage");
    
    sliderImages[currentImage++].style.left = (windowsW * (-1)) + 'px';
}
*/


var currentSlide = 0;

//Check this once again
function hideSlides(){
	var sliderImages = document.getElementById("homepageSlider").getElementsByClassName("sliderImage");
	for(var i=0; i<sliderImages.length; i++){
		sliderImages[i].style.opacity = 0;
	}
}

function Slide(direction = null){
	hideSlides();
	
	var sliderImages = document.getElementById("homepageSlider").getElementsByClassName("sliderImage");
	if(currentSlide < sliderImages.length - 1){
		currentSlide++;
		sliderImages[currentSlide].style.opacity = 1;
	}else{
		currentSlide = 0;
		sliderImages[currentSlide].style.opacity = 1;
	}
}

function previousOne(){
	hideSlides();
	
	var sliderImages = document.getElementById("homepageSlider").getElementsByClassName("sliderImage");
	if(currentSlide == 0){
		currentSlide = sliderImages.length - 1;
		sliderImages[currentSlide].style.opacity = 1;
	}else{
		currentSlide --;
		sliderImages[currentSlide].style.opacity = 1;
	}
}



function fadeOut(elemm){
	
}


/**** slider search ****/

var whatsearching = 0;

var thisOpened = -1;

function openSearchProperties(index){
	marginLeftSearchOptions();
	
	var searchOptionsWrapper = document.getElementById("sliderSearchFooterForFun");
	var searchOptions = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterAllOptions");
	var searchOptionsForDisplay = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterOption");
	
	if(thisOpened == index){
		thisOpened = -1;
		hideAllSearchProperties();
		return;
	}
	
	for(var i=0; i<searchOptions.length; i++){
		if(index == i) {
			searchOptions[i].style.display = 'block';
			thisOpened = index;
		}else{
			searchOptions[i].style.display = 'none';
		}
	}
}


function hideAllSearchProperties(){
	var searchOptionsWrapper = document.getElementById("sliderSearchFooterForFun");
	var searchOptions = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterAllOptions");
	
	
	for(var i=0; i<searchOptions.length; i++){
		searchOptions[i].style.display = 'none';
	}
}


function setSearchProperties(index, object){
	var searchOptionsWrapper = document.getElementById("sliderSearchFooterForFun");
	var searchOptions = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterAllOptions");
	var searchOptionValue = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterOptionValue");
	
	for(var i=0; i<searchOptions.length; i++){
		if(index == i){
			searchOptionValue[i].innerHTML = object.children[0].innerHTML;
			hideAllSearchProperties();
			return;
		}
	}
}



function searchIT(){
	var searchOptionsWrapper = document.getElementById("sliderSearchFooterForFun");
	/*
	var searchOptionValue = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterOptionValue");
	
	for(var i=0; i<searchOptionValue.length; i++){
		//
	}
	*/
	var userInput = document.getElementById("sliderSearchInput").value;
	
	//var category = searchOptionValue[0].innerHTML;
	//var priceMin = searchOptionValue[1].children[0].innerHTML;
	//var priceMax = searchOptionValue[2].children[0].innerHTML;
	
	if(whatsearching == 0){
		//Pretraga po nazivu
		window.location = 'nekretnine.php?kategorija='+'Sve'+'&input='+userInput;
	}else{
		window.location = 'mapa.php?grad='+userInput;
	}
}


function setkeydown(){
	var input = document.getElementById("sliderSearchInput");
    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
      // Cancel the default action, if needed
      event.preventDefault();
      // Number 13 is the "Enter" key on the keyboard
      if (event.keyCode === 13) {
    	searchIT();
      }
      offerSeach();
    });
}

function offerSeach(){
	value = document.getElementById("sliderSearchInput").value;
	console.log("Value : " + value);
	var searchArea = document.getElementById("searchedItemsWrapper");
	if(value == ''){
		searchArea.innerHTML = '';
		searchArea.style.display = 'none';
		return;
	}
	
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
			searchArea.style.display = 'block';
	    	searchArea.innerHTML = '';
	    	searchArea.innerHTML = this.responseText;
	    }
	};
	
	if(whatsearching == 0){
		//Pretraga po nazivu
		xml.open('POST', 'homepage/http/input.php');
	}else{
		xml.open('POST', 'homepage/http/city.php');
	}
	
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("value="+value);
}

function setSearchProperty(value){
	document.getElementById("sliderSearchInput").value = value;
	offerSeach();
}

function whatToSearch(what){
	var displayValue = document.getElementById("sliderSearchHeaderDisplayValue");
	var searchInput = document.getElementById("sliderSearchInput");
	//var searchOptions = document.getElementById("sliderSearchFooterForFun");
	
	if(what != 0){
		whatsearching++;
		displayValue.innerHTML = 'Pregled nekretnina po gradovima';
		searchInput.setAttribute('placeholder', 'Cazin');
		//searchOptions.style.display = 'none';
	}else{
		whatsearching = 0;
		displayValue.innerHTML = 'Pretražite nekretnine po nazivu';
		searchInput.setAttribute('placeholder', 'Stan Cazin');
		//searchOptions.style.display = 'block';
	}
}