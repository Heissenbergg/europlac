function login(){
    var mail = document.getElementById("mainWrapperLoginWrapperLoginInputEmailInput").value;
    var password = document.getElementById("mainWrapperLoginWrapperLoginInputPasswordInput").value;
    
    var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
			if(this.responseText == 1){
			    window.location = 'admin/index.php';
			}else alert("Pogrešni pristupni podaci !");
	    }
	};
	
	xml.open('POST', 'login/login.php');
	
	xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xml.send("mail="+mail+"&psw="+password);
}