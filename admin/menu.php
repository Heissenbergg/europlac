<?php
$user = new User(Session::isitset());
//header('Content-Type: text/html; charset=UTF-8');
//if(!$user->admin()) Redirect::to('http://europlac-nekretnine.com/forbid.php');
$notif = new Notification();
function vrijeme($time){
    $current = time();
    if(($current - $time) < 60) return "Prije nekoliko sekundi.";
    else if(($current - $time) < 3600) return "Prije nekoliko minuta.";
    else if(($current - $time) < 8640) return "Prije nekoliko sati.";
    else return "Prije nekoliko dana";
}
?>
<script type="text/javascript" src="../js/jquery.js"></script>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    
</head>
<script type="text/javascript">
    var x = -350;
    var i = 0;
    var time;
    // request permission on page load
    document.addEventListener('DOMContentLoaded', function () {
        if (Notification.permission !== "granted")
            Notification.requestPermission();
    });


    $(document).ready(function(){
        var value = $("#notificationNumber span").text();
        if(value == 0){
            document.getElementById('notificationNumber').style.display = 'none';
        }else document.getElementById('notificationNumber').style.display = 'block';

        setInterval(function(){
            var d = new Date();
            var currentTime = d.getTime() / 1000;
            var timeToSend = 3600 - (currentTime - time);
            var hour = parseInt(timeToSend / 3600);
            var minutes = parseInt((timeToSend /60) % 60);
            var seconds = parseInt(timeToSend % 60);

            if(timeToSend >= 0){
                document.getElementById("clock").innerHTML = hour + 'h '+minutes + 'min '+seconds + 'sec';
            }else{
                hour = 0; minutes = 0; seconds = 0;
                document.getElementById("clock").innerHTML = hour + 'h '+minutes + 'min '+seconds + 'sec';
            }

            $("#value").load("numOf.php");
            value = $("#notificationNumber span").text();
            if(value == 0){
                document.getElementById('notificationNumber').style.display = 'none';
            }else document.getElementById('notificationNumber').style.display = 'block';

            $("#upit").load("brojUpita.php");
            if($('#upit').html() != 0){
                $("#justLoad").load("deleteUpite.php");
                $("#upit").load("brojUpita.php");
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notification = new Notification('Imate nove notifikacije', {
                        icon: '../icon/lastlogo.png',
                        body: $('#upit').html() + " Vam je poslao upit !",
                    });
                    //notification.onclick = function () {
                      //window.open("http://stackoverflow.com/a/13328397/1269037");      
                    //};
                }             
            }
            $("#reggaj").load("brojUsera.php");
            if($('#reggaj').html() != 0){
                $("#justLoad").load("deleteUsere.php");
                $("#reggaj").load("brojUsera.php");
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notification = new Notification('Imate nove notifikacije', {
                        icon: '../icon/lastlogo.png',
                        body: $('#reggaj').html() + " se upravo pridružio mreži.",
                    });
                    //notification.onclick = function () {
                      //window.open("http://stackoverflow.com/a/13328397/1269037");      
                    //};
                }             
            }   


            $("#unosnaObjava").load("brojObjava.php");
            if($('#unosnaObjava').html() != 0){
                $("#justLoad").load("deleteObjavaa.php");
                $("#unosnaObjava").load("brojObjava.php");
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notification = new Notification('Imate nove notifikacije', {
                        icon: '../icon/lastlogo.png',
                        body: $('#unosnaObjava').html() + "je upravio objavio novu nekretninu.",
                    });
                    //notification.onclick = function () {
                      //window.open("http://stackoverflow.com/a/13328397/1269037");      
                    //};
                }             
            }            


        },1000);

    });
    


    function resetiraj(){
        $("#justLoad").load("deleteNotifications.php");
        if(i == 0){
            var interval = setInterval(function(){
                x+=2;
                document.getElementById("notificationArea").style.marginRight = x + "px";
                if(x >= 0) clearInterval(interval);
            }, 1);
            i=1;
        }else{
            var interval = setInterval(function(){
                x-=2;
                document.getElementById("notificationArea").style.marginRight = x + "px";
                if(x <= -350) clearInterval(interval);
            }, 1);
            i=0;
        }
    }

</script>
<div id="justLoad"></div>
<p id="upit" style="display: none;"></p>
<p id="reggaj" style="display: none;"></p>
<p id="unosnaObjava" style="display: none;"></p>
<p id="timeHidden" style="display: none;"><?php echo $notif -> time(); ?></p>
<script type="text/javascript">time = document.getElementById("timeHidden").innerHTML;</script>
<div id="leftMenu">
    <ul>
        <li style="height:80px;"><h4>Menu </h4></li>
        <li><a href="index.php">Informacije</a></li>
        <li><a href="/newAdmin/newestate.php">Unesi novi oglas</a></li>
        <li><a href="users.php">Svi korisnici</a></li>
        <!--<li><a href="mails.php">Slanje maila</a></li>-->
        <li><a href="moji.php">Moji oglasi</a></li>
        <li><a href="besplatni.php">Besplatni oglasi</a></li>
        <li><a href="izdvojeni.php">Izdvojeni oglasi</a></li>
        <li><a href="neobjavljeni.php">Neobjavljeni oglasi</a></li>
        <li><a href="upit.php">Primljeni upiti</a></li>
        <li><a href="naslovna.php">Oglasi na naslovnoj</a></li>
        <li><a href="baneri.php">Baneri</a></li>
        <li><a href="slider.php">Slider</a></li>
        <li><a href="montazne.php">Dodaj montažnu</a></li>
        <li><a href="svemontazne.php">Sve montažne</a></li>
        <li><a href="svikomentari.php">Svi komentari</a></li>
        <li><a href="youtubelinks.php">Youtube klipovi</a></li>
        <li><a target="_blank" href="../">Naslovna</a></li>
    </ul>
</div>
    
<div id="topNav">
    <div class="navItems">
        <a href="../logout.php"><p style="margin-top:12px">Odjavite se</p></a>
        <div id="notificationNumber">
            <span id="value" style="color:#fff; margin:0px; padding:0px;">0</span>
        </div>
        <img onclick="resetiraj();" id="bellIcon" src="icon/bell-32.png"> 

        <p id="clock" title="Vrijeme do novog slanja"><p>
    </div>
</div>

<div id="notificationArea">
    <ul>
    <?php
    $db = new DB();
    $jstquery = $db->_pdo -> query('SELECT * FROM notifikacije ORDER BY id DESC');
    while($row = $jstquery ->fetch()){ ?>
        <li>
            <p class="nameOfUser">
                <span><?php echo $row['user']; ?> </span> 
                <?php echo $row['action']; ?>
                <?php 
                    if(strlen($row['link'])>1){
                        echo '<a target="_blank" href="http://europlac-nekretnine.com/singlepost.php?id='.$row['link'].'">Pogledajte ovdje </a>';
                    }
                ?>
            </p>
            <p>
                <?php echo vrijeme($row['date']); ?>
            </p>
        </li>
    <?php } ?>
        
    </ul>
</div>