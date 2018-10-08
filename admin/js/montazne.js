var photos = new Array();

function uploadAllPictures(){
	//showloading();
	var fileInput = document.getElementById("file");
	var data = new FormData();
	data.append('file', fileInput.files[0]);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	      	/*var nameOfImage = this.responseText;*/
	      	var imageName = "images/" + this.responseText; 	  
	      	//Ubaci ime slike u niz photos
	      	photos.push(this.responseText);
	      	//Kreira div-wrapper za sliku i ubacuje ga u div slikeeeeeeeeeee :D
	      	var div = document.createElement("div");
	      	div.className = "slikaWrapper";
	      	div.id = photos.length - 1;
	      	document.getElementById("slike").appendChild(div);
	      	//Kreira sliku i ubacuje je slike kreirani div
	      	var image = document.createElement("img");
	      	image.setAttribute("src", imageName);
	      	div.appendChild(image);
	      	//Kreiraj delete button
	      	var deleteButton = document.createElement("div");
	      	deleteButton.className = "delete";
	      	deleteButton.setAttribute("onclick", 'deleteImage('+(photos.length - 1)+')');
	      	//deleteButton.onclick = function() { deleteImage(); };
	      	deleteButton.innerHTML = "X";
	      	div.appendChild(deleteButton);
	      	//writeAll();
	      	//hideloading();
	    }
	};
	xml.open('POST', 'includes/allphoto.php');
	//xml.setRequestHeader('Cache-Control', 'no-cache');
	xml.send(data);
}

function setImages(){
	var allImages = document.getElementById("slike").getElementsByClassName("slikeSlika");
	for(var i=0; i<allImages.length;i++){
		photos.push(allImages[i].title);
	}
}

function writeAll(){
	console.log("Photos : ");
	for(var i=0;i<photos.length;i++) console.log(photos[i]);
}

function deleteImage(id){
	photos.splice(id, 1);
	document.getElementById(id).remove();
	//writeAll();
	//console.log("Broj slika = " + photos.length);
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}



function savePOST(idofpost = null){
	var naslov = document.getElementById("naslov").value;
	var povrsina = document.getElementById("povrsina").value;
	var brSoba = document.getElementById("brSoba").value;
	var brKupatila = document.getElementById("brKupatila").value;
	var tekst = document.getElementById("tekst").value;

	var xhttp = new XMLHttpRequest();
	
	xhttp.open("POST","includes/insert.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("naslov="+naslov+"&povrsina="+povrsina+"&brSoba="+brSoba+"&brKupatila="+brKupatila+"&tekst="+tekst+"&photos="+photos);

    xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	window.location = "svemontazne.php";
	    	console.log(this.responseText);
	    }
	};
}

function updatePost(){
	var naslov = document.getElementById("naslov").value;
	var povrsina = document.getElementById("povrsina").value;
	var brSoba = document.getElementById("brSoba").value;
	var brKupatila = document.getElementById("brKupatila").value;
	var tekst = document.getElementById("tekst").value;
	var id = parseInt(document.getElementById("idofpost").innerHTML);

	var xhttp = new XMLHttpRequest();
	
	xhttp.open("POST","includes/updateMontazne.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("naslov="+naslov+"&povrsina="+povrsina+"&id="+id+"&brSoba="+brSoba+"&brKupatila="+brKupatila+"&tekst="+tekst+"&photos="+photos);

    xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    	console.log(this.responseText);
	    }
	};
}

function hideloading(){
	document.getElementById("loadingBar").style.display = 'none';
}

function showloading(){
	document.getElementById("loadingBar").style.display = 'block';
}

