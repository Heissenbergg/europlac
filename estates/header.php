<div id="estateImage">
     <img src="images/empire.jpg"></img>
</div>
<div id="estateHeader">
    <div id="searchOptions">
        <div id="searchOptionsID" title="Pretraga po ID-u" onclick="setSearchProperty(1);">
            <p>ID</p>
        </div>
        <div id="searchOptionsSearch" title="Pretraga po nazivu" onclick="setSearchProperty(0);">
            <i class="fa fa-home"></i>
        </div>
        <div id="searchOptionsSubmit" title="Pretražite nekretnine" onclick="searchThoseEstates();">
            <p>Pretraga</p>
        </div>
        <div id="searchOptionsSrc" title="Pretraga po nazivu" >
            <i class="fa fa-search"></i>
        </div>
    </div>
    <div id="searchForms">
        <i class="fa fa-search"></i>
        <input type="text" id="mainSearch" placeholder="Stan u Cazinu.."/>
    </div>
    
    <div id="categories">
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Sve">Sve</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Apartman">Apartmani</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Kuca">Kuće</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Poslovni%20prostor">Poslovni prostori</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Stan">Stanovi</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Vikendica">Vikendice</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Vila">Vile</a>
        </div>
        <div class="singleCat">
            <a href="nekretnine.php?kategorija=Zemljiste">Zemljišta</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Get the input field
    var input = document.getElementById("mainSearch");
    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
      // Cancel the default action, if needed
      event.preventDefault();
      // Number 13 is the "Enter" key on the keyboard
      if (event.keyCode === 13) {
        searchThoseEstates();
      }
    });
</script>

<div id="estateLeftSquare">
    <img src="images/home.png"></img>
</div>
