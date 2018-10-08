function setPage(){
	//var startSlide = setInterval(Slide, 3000);
	
	/*** SET SLIDER SEARCH ***/
	//marginLeftSearchOptions();
	
	setkeydown();
	document.getElementById("loadingBar").style.display = 'none';
}



function marginLeftSearchOptions(){
    var searchOptionsWrapper = document.getElementById("sliderSearchFooterForFun");
	var searchOptions = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterAllOptions");
	var searchOptionsForDisplay = searchOptionsWrapper.getElementsByClassName("sliderSearchFooterOption");
	var left = 0;
	
	
	for(var i=1; i<searchOptions.length; i++){
	    left += searchOptionsForDisplay[i-1].clientWidth;
	    searchOptions[i].style.left = left;
	}
}
