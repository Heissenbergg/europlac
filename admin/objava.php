    <?php
    include '../db.php';
    include 'menu.php';

    if(!empty($_FILES['file'])){
        foreach($_FILES['file']['name'] as $key => $name){
            $id = explode('.', $name);
            $name = md5($name).'.'.$id[1];
            
            if($_FILES['file']['error'][$key] == 0 and move_uploaded_file($_FILES['file']['tmp_name'][$key], "slike/{$name}")){
                $uploaded[] = $name;
            }
        }
        if(!empty($_POST['ajax'])){
            die(json_encode($uploaded));
        }
    }

    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/objava.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var idNekretnine;
        var imeUplatnica;
        var adresaUplatnica;
        var telefonUplatnica;
        var voda = 0;
        var struja = 0;
        var garaza = 0;
        var klima = 0;
        var plin = 0;
        var internet = 0;
        var kanalizacija = 0;
        var parking = 0;
        var ostava = 0;
        var namjestaj = 0;
        var kablovska = 0;
        var videonadzor = 0;
        
        var sirina = 0;
        var visina = 0;
        
        
        function Unesi(){
            //document.getElementById('pricekajte').style.display = 'block';
            var svrha = $("#svrha").val();
            var naziv = $("#naziv").val();
            var lokacija = $("#lokacija").val();
            var nekretnina = $("#nekretnina").val();
            var povObjekta = $("#povObjekta").val();
            var povZemljista = $("#povZemljista").val();
            var stanje = $("#stanje").val();
            var brojSoba = $("#brojSoba").val();
            var brojKupatila = $("#brojKupatila").val();
            var cijena = $("#cijena").val();
            var valuta = $("#valuta").val();
            var opis = $("#opis").val();
            var drzava = $("#drzava").val();
            var video = $("#video").val();
            console.log(video);
            var paket = $("#paket").val();
            if(naziv == '' || naziv == 'Obavezno polje'){
                document.getElementById("naziv").value  = "Obavezno polje";
    			document.getElementById("naziv").style.color = 'red';
                alert("Niste popunili polje : naziv");
    			return false;
            }else if(lokacija == '' || lokacija == 'Obavezno polje'){
                document.getElementById("lokacija").value  = "Obavezno polje";
    			document.getElementById("lokacija").style.color = 'red';
                alert("Niste popunili polje : lokacija");
    			return false;
            }else if(povObjekta == '' || povObjekta == 'Obavezno polje'){
                document.getElementById("povObjekta").value  = "Obavezno polje";
    			document.getElementById("povObjekta").style.color = 'red';
                alert("Niste popunili polje : povšina objekta");
            }else if(povZemljista == '' || povZemljista == 'Obavezno polje'){
                document.getElementById("povZemljista").value  = "Obavezno polje";
    			document.getElementById("povZemljista").style.color = 'red';
                alert("Niste popunili polje : površina zemljišta");
            }else if(cijena == '' || cijena == 'Obavezno polje'){
                document.getElementById("cijena").value  = "Obavezno polje";
    			document.getElementById("cijena").style.color = 'red';
                alert("Niste popunili polje : cijena");
            }else if(opis == '' || opis == 'Obavezno polje'){
                document.getElementById("opis").value  = "Obavezno polje";
    			document.getElementById("opis").style.color = 'red';
                alert("Niste popunili polje : opis");
            }else{
                if(document.getElementById("voda").checked == true){
                    voda = 1;
                }if(document.getElementById("struja").checked == true){
                    struja = 1;
                }if(document.getElementById("garaza").checked == true){
                    garaza = 1;
                }if(document.getElementById("klima").checked == true){
                    klima = 1;
                }if(document.getElementById("plin").checked == true){
                    plin = 1;
                }if(document.getElementById("internet").checked == true){
                    internet = 1;
                }if(document.getElementById("kanalizacija").checked == true){
                    kanalizacija = 1;
                }
                if(document.getElementById("parking").checked == true){
                    parking = 1;
                }if(document.getElementById("ostava").checked == true){
                    ostava = 1;
                }if(document.getElementById("namjestaj").checked == true){
                    namjestaj = 1;
                }if(document.getElementById("kablovska").checked == true){
                    kablovska = 1;
                }if(document.getElementById("videonadzor").checked == true){
                    videonadzor = 1;
                }
                $.ajax({
    				type:'POST',
    				url:'unesiobjavu.php',
    				data:{svrha:svrha, naziv:naziv,paket:paket, lokacija:lokacija, drzava:drzava, nekretnina:nekretnina, povObjekta:povObjekta, povZemljista:povZemljista, stanje:stanje, brojSoba:brojSoba, brojKupatila:brojKupatila, cijena:cijena, valuta:valuta, voda:voda, struja:struja, garaza:garaza, klima:klima, plin:plin,internet:internet, kanalizacija:kanalizacija, parking:parking, ostava:ostava, namjestaj:namjestaj, kablovska:kablovska, videonadzor:videonadzor, opis:opis, sirina:sirina, visina:visina, video:video},
    				success:function(){
    					window.location = "uploadtry.php";
    				}
    			});
                return false;    
            } return false;
        }
        
    </script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		/*setInterval(function(){
    			$("#idNekretnine").load("includes/idNekretnine.php"); 
    			idNekretnine = document.getElementById("idNekretnine").innerHTML;
    			$("#imeUplatnica").load("includes/imeUplatnica.php");
    			$("#telefonUplatnica").load("includes/telefonUplatnica.php");
    			$("#adresaUplatnica").load("includes/adresaUplatnica.php");
    			imeUplatnica = document.getElementById("imeUplatnica").innerHTML;
    			telefonUplatnica = document.getElementById("telefonUplatnica").innerHTML;
    			adresaUplatnica = document.getElementById("adresaUplatnica").innerHTML;
    			console.log(idNekretnine);
    		},1000); */
    	});
    	function showMap(){
    	    document.getElementById("map_canvas").style.display = 'block';
    	    init();
    	}
    </script>
    <p id="idNekretnine"></p>
    <style type="text/css">
        #map_canvas{
            right:50px;
            width:100%;
            height:400px;
            z-index:1000000000000;
        }
        #sirina, #visina{
            display:none;
        }
    </style>
    <p id="sirina"></p>
    <p id="visina"></p>
    <script type="text/javascript">
        function init(){
            
    }
    </script>
    <?php  ?>
    <section style="position:absolute; left:380px; width:calc(100% - 380px); top: 80px;">
        <form id="nekaFormaKojaTrebaDanestane" onsubmit="return Unesi()" method="POST">
            <h4>Unos nekretnine</h4>
            <table>
                <tr>
                    <td class="firstColumn">Naziv :</td>
                    <td class="secondColumn">
                        <input type="text" id="naziv" name="naziv" placeholder="Stan u Sarajevu.." autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Svrha : </td>
                    <td class="secondColumn">
                        <select id="svrha" name="svrha">
                            <option value="Prodaja">Prodaja</option>
                            <option value="Najam">Najam</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Država :</td>
                    <td class="secondColumn">
                        <select name="drzava" id="drzava">
                            <option value="Bosna i Hercegovina">Bosna i Hercegovina</option>
                            <option value="Hrvatska">Hrvatska</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Grad :</td>
                    <td class="secondColumn">
                        <!--<input type="text" id="v" name="lokacija" placeholder="Grad.." autocomplete="off">-->
                         <select name="lokacija" id="lokacija">
                            <option value="Banovići">Banovići</option>
                            <option value="Banja Luka">Banja Luka</option>
                            <option value="Berkovići">Berkovići</option>
                            <option value="Bihać">Bihać</option>
                            <option value="Bileća">Bileća</option>
                            <option value="Bijeljina">Bijeljina</option>
                            <option value="Bosanska Dubica">Bosanska Dubica</option>
                            <option value="Bosanska Gradiška">Bosanska Gradiška</option>
                            <option value="Bosansko Grahovo">Bosansko Grahovo</option>
                            <option value="Bosanska Krupa">Bosanska Krupa</option>
                            <option value="Bosanska Kostajnica">Bosanska Kostajnica</option>
                            <option value="Bosanski Brod">Bosanski Brod</option>
                            <option value="Bosanski Novi">Bosanski Novi</option>
                            <option value="Bosanski Petrovac">Bosanski Petrovac</option>
                            <option value="Bosanski Šamac">Bosanski Šamac</option>
                            <option value="Bratunac">Bratunac</option>
                            <option value="Brčko">Brčko</option>
                            <option value="Breza">Breza</option>
                            <option value="Bugojno">Bugojno</option>
                            <option value="Busovača">Busovača</option>
                            <option value="Bužim">Bužim</option>
                            <option value="Cazin">Cazin</option>
                            <option value="Čajniče">Čajniče</option>
                            <option value="Čapljina">Čapljina</option>
                            <option value="Čelić">Čelić</option>
                            <option value="Čitluk">Čitluk</option>
                            <option value="Čelinac">Čelinac</option>
                            <option value="Doboj">Doboj</option>
                            <option value="Dobretići">Dobretići</option>
                            <option value="Domaljevac">Domaljevac</option>
                            <option value="Donji Vakuf">Donji Vakuf</option>
                            <option value="Drvar">Drvar</option>
                            <option value="Derventa">Derventa</option>
                            <option value="Foča">Foča</option>
                            <option value="Fojnica">Fojnica</option>
                            <option value="Gacko">Gacko</option>
                            <option value="Glamoč">Glamoč</option>
                            <option value="Gračanica">Gračanica</option>
                            <option value="Gradačac">Gradačac</option>
                            <option value="Grude">Grude</option>
                            <option value="Goražde">Goražde</option>
                            <option value="Gornji Vakuf">Gornji Vakuf</option>
                            <option value="Jablanica">Jablanica</option>
                            <option value="Jajce">Jajce</option>
                            <option value="Kakanj">Kakanj</option>
                            <option value="Kalesija">Kalesija</option>
                            <option value="Kalinovik">Kalinovik</option>
                            <option value="Kiseljak">Kiseljak</option>
                            <option value="Kladanj">Kladanj</option>
                            <option value="Ključ">Ključ</option>
                            <option value="Konjic">Konjic</option>
                            <option value="Kotor-Varoš">Kotor-Varoš</option>
                            <option value="Kreševo">Kreševo</option>
                            <option value="Kupres">Kupres</option>
                            <option value="Laktaši">Laktaši</option>
                            <option value="Livno">Livno</option>
                            <option value="Lukavac">Lukavac</option>
                            <option value="Lopare">Lopare</option>
                            <option value="Ljubinje">Ljubinje</option>
                            <option value="Ljubuški">Ljubuški</option>
                            <option value="Maglaj">Maglaj</option>
                            <option value="Milići">Milići</option>
                            <option value="Modriča">Modriča</option>
                            <option value="Mostar">Mostar</option>
                            <option value="Mrkonjić Grad">Mrkonjić Grad</option>
                            <option value="Neum">Neum</option>
                            <option value="Nevesinje">Nevesinje</option>
                            <option value="Novi Travnik">Novi Travnik</option>
                            <option value="Odžak">Odžak</option>
                            <option value="Olovo">Olovo</option>
                            <option value="Orašje">Orašje</option>
                            <option value="Pale">Pale</option>
                            <option value="Posušje">Posušje</option>
                            <option value="Prozor">Prozor</option>
                            <option value="Pale-Prača">Pale-Prača</option>
                            <option value="Prijedor">Prijedor</option>
                            <option value="Prnjavor">Prnjavor</option>
                            <option value="Ravno">Ravno</option>
                            <option value="Rogatica">Rogatica</option>
                            <option value="Rudo">Rudo</option>
                            <option value="Sanski Most">Sanski Most</option>
                            <option value="Sapna">Sapna</option>
                            <option value="Sarajevo">Sarajevo</option>
                            <option value="Skender Vakuf">Skender Vakuf</option>
                            <option value="Sokolac">Sokolac</option>
                            <option value="Srbac">Srbac</option>
                            <option value="Srebrenica">Srebrenica</option>
                            <option value="Srebrenik">Srebrenik</option>
                            <option value="Stanari">Stanari</option>
                            <option value="Stolac">Stolac</option>
                            <option value="Šipovo">Šipovo</option>
                            <option value="Široki Brijeg">Široki Brijeg</option>
                            <option value="Teočak">Teočak</option>
                            <option value="Teslić">Teslić</option>
                            <option value="Tešanj">Tešanj</option>
                            <option value="Tomislavgrad">Tomislavgrad</option>
                            <option value="Travnik">Travnik</option>
                            <option value="Trebinje">Trebinje</option>
                            <option value="Tuzla">Tuzla</option>
                            <option value="Usora">Usora</option>
                            <option value="Ustiprača">Ustiprača</option>
                            <option value="Vareš">Vareš</option>
                            <option value="Velika Kladuša">Velika Kladuša</option>
                            <option value="Visoko">Visoko</option>
                            <option value="Višegrad">Višegrad</option>
                            <option value="Vitez">Vitez</option>
                            <option value="Vogošća">Vogošća</option>
                            <option value="Zavidovići">Zavidovići</option>
                            <option value="Zenica">Zenica</option>
                            <option value="Zvornik">Zvornik</option>
                            <option value="Žepče">Žepče</option>
                            <option value="Živinice">Živinice</option>

                            <!-- HRVATSKA -->


                            <option value="Bakar">Bakar</option>
                            <option value="Beli Manastir">Beli Manastir</option>
                            <option value="Belišće">Belišće</option>
                            <option value="Benkovac">Benkovac</option>
                            <option value="Biograd na Moru">Biograd na Moru</option>
                            <option value="Bjelovar">Bjelovar</option>
                            <option value="Buje">Buje</option>
                            <option value="Buzet">Buzet</option>
                            <option value="Cres">Cres</option>
                            <option value="Crikvenica">Crikvenica</option>
                            <option value="Čabar">Čabar</option>
                            <option value="Čakovec">Čakovec</option>
                            <option value="Čazma">Čazma</option>
                            <option value="Daruvar">Daruvar</option>
                            <option value="Delnice">Delnice</option>
                            <option value="Donja Stubica">Donja Stubica</option>
                            <option value="Donji Miholjac">Donji Miholjac</option>
                            <option value="Drniš">Drniš</option>
                            <option value="Dubrovnik">Dubrovnik</option>
                            <option value="Duga Resa">Duga Resa</option>
                            <option value="Dugo Selo">Dugo Selo</option>
                            <option value="Đakovo">Đakovo</option>
                            <option value="Đurđevac">Đurđevac</option>
                            <option value="Garešnica">Garešnica</option>
                            <option value="Glina">Glina</option>
                            <option value="Gospić">Gospić</option>
                            <option value="Grubišno Polje">Grubišno Polje</option>
                            <option value="Hrvatska Kostajnica">Hrvatska Kostajnica</option>
                            <option value="Hvar">Hvar</option>
                            <option value="Ilok">Ilok</option>
                            <option value="Imotski">Imotski</option>
                            <option value="Ivanec">Ivanec</option>
                            <option value="Ivanić-Grad">Ivanić-Grad</option>
                            <option value="Jastrebarsko">Jastrebarsko</option>
                            <option value="Karlovac">Karlovac</option>
                            <option value="Kastav">Kastav</option>
                            <option value="Kaštela">Kaštela</option>
                            <option value="Klanjec">Klanjec</option>
                            <option value="Knin">Knin</option>
                            <option value="Komiža">Komiža</option>
                            <option value="Koprivnica">Koprivnica</option>
                            <option value="Korčula">Korčula</option>
                            <option value="Kraljevica">Kraljevica</option>
                            <option value="Krapina">Krapina</option>
                            <option value="Križevci">Križevci</option>
                            <option value="Krk">Krk</option>
                            <option value="Kutina">Kutina</option>
                            <option value="Kutjevo">Kutjevo</option>
                            <option value="Labin">Labin</option>
                            <option value="Lepoglava">Lepoglava</option>
                            <option value="Lipik">Lipik</option>
                            <option value="Ludbreg">Ludbreg</option>
                            <option value="Makarska">Makarska</option>
                            <option value="Mali Lošinj">Mali Lošinj</option>
                            <option value="Metković">Metković</option>
                            <option value="Mursko Središće">Mursko Središće</option>
                            <option value="Našice">Našice</option>
                            <option value="Nin">Nin</option>
                            <option value="Nova Gradiška">Nova Gradiška</option>
                            <option value="Novalja">Novalja</option>
                            <option value="Novi Marof">Novi Marof</option>
                            <option value="Novi Vinodolski">Novi Vinodolski</option>
                            <option value="Novigrad">Novigrad</option>
                            <option value="Novska">Novska</option>
                            <option value="Obrovac">Obrovac</option>
                            <option value="Ogulin">Ogulin</option>
                            <option value="Omiš">Omiš</option>
                            <option value="Opatija">Opatija</option>
                            <option value="Opuzen">Opuzen</option>
                            <option value="Orahovica">Orahovica</option>
                            <option value="Oroslavje">Oroslavje</option>
                            <option value="Osijek">Osijek</option>
                            <option value="Otočac">Otočac</option>
                            <option value="Otok">Otok</option>
                            <option value="Ozalj">Ozalj</option>
                            <option value="Pag">Pag</option>
                            <option value="Pakrac">Pakrac</option>
                            <option value="Pazin">Pazin</option>
                            <option value="Petrinja">Petrinja</option>
                            <option value="Pleternica">Pleternica</option>
                            <option value="Ploče">Ploče</option>
                            <option value="Popovača">Popovača</option>
                            <option value="Poreč">Poreč</option>
                            <option value="Požega">Požega</option>
                            <option value="Pregrada">Pregrada</option>
                            <option value="Prelog">Prelog</option>
                            <option value="Pula">Pula</option>
                            <option value="Rijeka">Rijeka</option>
                            <option value="Rovinj">Rovinj</option>
                            <option value="Samobor">Samobor</option>
                            <option value="Senj">Senj</option>
                            <option value="Sinj">Sinj</option>
                            <option value="Sisak">Sisak</option>
                            <option value="Skradin">Skradin</option>
                            <option value="Slatina">Slatina</option>
                            <option value="Slavonski Brod">Slavonski Brod</option>
                            <option value="Slunj">Slunj</option>
                            <option value="Solin">Solin</option>
                            <option value="Split">Split</option>
                            <option value="Stari Grad">Stari Grad</option>
                            <option value="Supetar">Supetar</option>
                            <option value="Sveta Nedelja">Sveta Nedelja</option>
                            <option value="Sveti Ivan Zelina">Sveti Ivan Zelina</option>
                            <option value="Šibenik">Šibenik</option>
                            <option value="Trilj">Trilj</option>
                            <option value="Trogir">Trogir</option>
                            <option value="Umag">Umag</option>
                            <option value="Valpovo">Valpovo</option>
                            <option value="Varaždin">Varaždin</option>
                            <option value="Varaždinske Toplice">Varaždinske Toplice</option>
                            <option value="Velika Gorica">Velika Gorica</option>
                            <option value="Vinkovci">Vinkovci</option>
                            <option value="Virovitica">Virovitica</option>
                            <option value="Vis">Vis</option>
                            <option value="Vodice">Vodice</option>
                            <option value="Vodnjan">Vodnjan</option>
                            <option value="Vrbovec">Vrbovec</option>
                            <option value="Vrbovsko">Vrbovsko</option>
                            <option value="Vrgorac">Vrgorac</option>
                            <option value="Vrlika">Vrlika</option>
                            <option value="Vukovar">Vukovar</option>
                            <option value="Zabok">Zabok</option>
                            <option value="Zadar">Zadar</option>
                            <option value="Zagreb">Zagreb</option>
                            <option value="Zaprešić">Zaprešić</option>
                            <option value="Zlatar">Zlatar</option>
                            <option value="Županja">Županja</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Vrsta nekretnine :</td>
                    <td class="secondColumn">
                        <select id="nekretnina" name="nekretnina">
                            <option value="Apartman">Apartman</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Kuca">Kuca</option>
                            <option value="Poslovni prostor">Poslovni prostor</option>
                            <option value="Restoran">Restoran</option>
                            <option value="Stan">Stan</option>
                            <option value="Vikendica">Vikendica</option>
                            <option value="Vila">Vila</option>
                            <option value="Zemljiste">Zemljište</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Površina objekta :</td>
                    <td class="secondColumn">
                        <input type="text" name="povObjekta" id="povObjekta" placeholder=""  autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Površina zemljišta :</td>
                    <td class="secondColumn">
                        <input type="text" name="povZemljista" id="povZemljista" placeholder="" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Stanje nekretnine :</td>
                    <td class="secondColumn">
                        <select name="stanje" id="stanje">
                            <option value="Useljivo">Useljivo</option>
                            <option value="U izgradnji">U izgradnji</option>
                            <option value="Novogradnja">Novogradnja</option>
                            <option value="Potrebno renoviranje">Potrebno renoviranje</option>
                            <option value="Poljoprivredna parcela">Poljoprivredna parcela</option>
                            <option value="Građavinska parcela">Građavinska parcela</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Broj soba :</td>
                    <td class="secondColumn">
                        <select name="brojSoba" id="brojSoba">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Broj kupatila :</td>
                    <td class="secondColumn">
                        <select name="brojKupatila" id="brojKupatila">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Cijena :</td>
                    <td class="secondColumn">
                        <input type="text" name="cijena" id="cijena" plAceholder="200 000 €"  autocomplete="off">
                        <select name="valuta" id="valuta" style="width:100px">
                            <option value="BAM">BAM</option>
                            <option value="€">€</option>
                            <option value="$">$</option>
                            <option value="HRK">HRK</option>
                            <option value="CHF">CHF</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Paket :</td>
                    <td class="secondColumn">
                        <select name="paket" id="paket">
                            <option value="0">Neobjavljeno</option>
                            <option value="1">Besplatni</option>
                            <!--<option value="2">Izdvojeno 30 dana</option>
                            <option value="3">Izdvojeno 90 dana</option>
                            <option value="4">Izdvojeno 180 dana</option> -->
                            <option value="5">Inostrane nekretnine</option>
                            <option value="6">BiH nekretnine</option>
                            <option value="7">Izdvojeno</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn">Video :</td>
                    <td class="secondColumn">
                        <input type="text" name="video" id="video" plAceholder=""  autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td class="firstColumn" style="vertical-align:top; padding-top:12px;">Dodatne informacije :</td>
                    <td class="secondColumn" colspan="6">
                        <div class="tableDivvv">
                            <input class="cheeeck" id="voda" type="checkbox" name="voda"> <span class="firstPaaaartt">Voda</span>
                            <input class="cheeeck cheeeck2" id="struja" type="checkbox" name="struja"> <span class="secondPaartt">Struja</span>
                        </div><br>
                        <div class="tableDivvv">
                            <input class="cheeeck" type="checkbox" id="garaza" name="garaza"> <span class="firstPaaaartt">Garaza</span>
                            <input class="cheeeck cheeeck2" type="checkbox" id="klima" name="klima"> <span class="secondPaartt">Klima</span>
                        </div><br>
                        <div class="tableDivvv">
                            <input class="cheeeck" type="checkbox" id="plin" name="plin"> <span class="firstPaaaartt">Plin</span>
                            <input class="cheeeck cheeeck2" type="checkbox" id="internet" name="internet"> <span class="secondPaartt">Internet</span>
                        </div><br>
                        <div class="tableDivvv">
                            <input class="cheeeck" type="checkbox" id="kanalizacija" name="kanalizacija"> <span class="firstPaaaartt">Kanalizacija</span>
                            <input class="cheeeck cheeeck2" type="checkbox" id="parking" name="parking"> <span class="secondPaartt">Parking</span>
                        </div><br>
                        <div class="tableDivvv">
                            <input class="cheeeck" type="checkbox" id="ostava" name="ostava"> <span class="firstPaaaartt">Ostava</span>
                            <input class="cheeeck cheeeck2" type="checkbox" id="namjestaj" name="namjestaj"> <span class="secondPaartt">Namjestaj</span>
                        </div><br>
                        <div class="tableDivvv">
                            <input class="cheeeck" type="checkbox" id="kablovska" name="kablovska"> <span class="firstPaaaartt">Kablovska</span>
                            <input class="cheeeck cheeeck2" type="checkbox" id="videonadzor" name="videonadzor"> <span class="secondPaartt">Video nadzor</span>
                        </div><br>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;" class="firstColumn">Opis :</td>
                    <td class="secondColumn" colspan="4">
                        <textarea style="width:600px; height:200px; resize:none;" id="opis"  autocomplete="off" placeholder="Detaljni opis"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;" class="firstColumn">Mapa :</td>
                    <td class="secondColumn" colspan="4">
                        <div id="map_canvas"></div>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:top;" class="firstColumn"></td>
                    <td class="secondColumn" colspan="">
                        <input id="" type="submit" value="Dalje">
                    </td>
                </tr>
            </table>
        </form>
    </section>


    <script type="text/javascript">
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 5,
            center: new google.maps.LatLng(44.976, 15.890),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        var myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(44.976, 15.890),
            draggable: true
        });
        
        google.maps.event.addListener(myMarker, 'dragend', function (evt) {
            visina = evt.latLng.lat().toFixed(3);
            sirina = evt.latLng.lng().toFixed(3);
            console.log(sirina);
            console.log(visina);
            /*
            document.getElementById('visina').innerHTML = evt.latLng.lat().toFixed(3);
            document.getElementById('sirina').innerHTML = evt.latLng.lng().toFixed(3);
            console.log('sirina' + evt.latLng.lng().toFixed(3)); */
            //document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
            //console.log('<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>');
        });
        
        google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
            //document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
        });
        
        map.setCenter(myMarker.position);
        myMarker.setMap(map);
    </script>