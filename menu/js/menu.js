var mobileMenuOpen = 0;

function showMobileMenu(){
    if(!mobileMenuOpen){
        mobileMenuOpen++;
        document.getElementById("mobileMenuWrapper").style.left = '0px';
    }else{
        mobileMenuOpen = 0;
        document.getElementById("mobileMenuWrapper").style.left = '-260px';
    }
}


function gotohomepage(){
    window.location = '/';
}

function hideLoading(){
    document.getElementById("loadingBar").style.display = 'none';
}