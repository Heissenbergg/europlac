var mobileMenuUslugeOpen = 0;

function showMobileMenuUsluge(){
    if(!mobileMenuUslugeOpen){
        mobileMenuUslugeOpen++;
        document.getElementById("menu").style.left = "calc(100% - 300px)";
    }else{
        mobileMenuUslugeOpen = 0;
        document.getElementById("menu").style.left = "calc(100% + 300px)";
    }
}



function openNaseUsluge(){
    document.getElementsByClassName("onama")[0].style.display = "none";
    document.getElementsByClassName("savjetiPriProdaji")[0].style.display = "none";
    document.getElementsByClassName("gradjevinskeDozvole")[0].style.display = "none";
    document.getElementsByClassName("cimeSeBavimo")[0].style.display = "block";
}

function openGradjevinske(){
    document.getElementsByClassName("cimeSeBavimo")[0].style.display = "none";
    document.getElementsByClassName("savjetiPriProdaji")[0].style.display = "none";
    document.getElementsByClassName("onama")[0].style.display = "none";
    document.getElementsByClassName("gradjevinskeDozvole")[0].style.display = "block";
}

function openOnama(){
    document.getElementsByClassName("cimeSeBavimo")[0].style.display = "none";
    document.getElementsByClassName("gradjevinskeDozvole")[0].style.display = "none";
    document.getElementsByClassName("savjetiPriProdaji")[0].style.display = "none";
    document.getElementsByClassName("onama")[0].style.display = "block";
}

function openSavjeti(){
    document.getElementsByClassName("gradjevinskeDozvole")[0].style.display = "none";
    document.getElementsByClassName("onama")[0].style.display = "none";
    document.getElementsByClassName("cimeSeBavimo")[0].style.display = "none";
    document.getElementsByClassName("savjetiPriProdaji")[0].style.display = "block";
}