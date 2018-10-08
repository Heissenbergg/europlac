<div id="topMenuWrapper">
	<div class="menuPart" id="homepage">
		<a href="index.php"> Naslovna </a>
	</div>
	<div class="menuPart" id="estate">
		<a href="nekretnine.php"> Nekretnine </a>
	</div>
	<div class="menuPart" id="service">
		<a href="usluge.php?key=servis"> Servis	 </a>
	</div>
	<div class="menuPart" id="logo">
		<div class="logoBottompart">
			<div class="logoBottomShadow"></div>
			<div class="logoLeftArrow"></div>
			<div class="logoRightArrow"></div>
			<div class="logoBottomLine"></div>
		</div>				
		<img src="menu/images/logo.png" onclick="gotohomepage();">
	</div>
	<div class="menuPart" id="search">
		<a href="usluge.php?key=naseUsluge"> Usluge </a>
	</div>
	<div class="menuPart" id="allservices">
		<a href="kontakt.php"> Kontakt </a>
	</div>
	<div class="menuPart" id="contact">
		<a href="login.php"> Prijavite se </a>
	</div>
	
	<div id="mobileIcon" onclick="showMobileMenu();">
		<img src="images/menu-options.png"></img>
	</div>
	<!--
	<div id="mobileSearchIcon" onclick="showMobileSearch();">
		<img src="images/searchnew.png"></img>
	</div> -->
</div>

<div id="mobileMenuWrapper">
	<div class="mobileMenuLink mobileMenuHeader">
		<h4>MENU</h4>
	</div>
	
	<div class="mobileMenuLink">
		<div class="mobileMenuLinkIcon">
			<img src="images/menu-options.png"></img>
		</div>
		<a href="index.php">NASLOVNA</a>
	</div>
	<div class="mobileMenuLink">
		<div class="mobileMenuLinkIcon">
			<img src="images/menu-options.png"></img>
		</div>
		<a href="nekretnine.php">NEKRETNINE</a>
	</div>
	<div class="mobileMenuLink">
		<div class="mobileMenuLinkIcon">
			<img src="images/menu-options.png"></img>
		</div>
		<a href="usluge.php?key=servis">SERVIS</a>
	</div>
	<div class="mobileMenuLink">
		<div class="mobileMenuLinkIcon">
			<img src="images/menu-options.png"></img>
		</div>
		<a href="usluge.php?key=naseUsluge">USLUGE</a>
	</div>
	<div class="mobileMenuLink">
		<div class="mobileMenuLinkIcon">
			<img src="images/menu-options.png"></img>
		</div>
		<a href="kontakt.php">KONTAKT</a>
	</div>
	<div class="mobileMenuLink">
		<div class="mobileMenuLinkIcon">
			<img src="images/menu-options.png"></img>
		</div>
		<a href="login.php">PRIJAVITE SE</a>
	</div>
</div>

<div id="loadingBar">
	<div id="loadingBarGif">
		<img src="menu/images/loading.gif"></img>
		<img id="logoLoading" src="menu/images/logo.png"></img>
	</div>
</div>