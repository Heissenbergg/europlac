<?php 
//<img src="http://europlac-nekretnine.com/admin/meh.png">
include 'functions.php';
require_once('mail/class.phpmailer.php');
$notification = new Notification();
$allOfUsers = $notification -> allusers();
$counter = $notification -> numberOfSentMails();
$naslov = 'Agencija EURO-PLAC PONUDA, Agency EUROPLAC OFFER, Agentur EUROPLAC ANGEBOT';
$i=0;
if(!empty($_POST['poruka'])){
    if(!empty($_POST['naslov'])){
        $naslov = $_POST['naslov'];
    }else $naslov = 'Agencija EURO-PLAC PONUDA, Agency EUROPLAC OFFER, Agentur EUROPLAC ANGEBOT';
    $porukaa = $_POST['poruka'];
    
    $towho = $db->_pdo -> query('SELECT * FROM users');
    while($row = $towho -> fetch()){
        if($row['prima']){
            if($i++ < $counter-1) continue;
            //$to = 'europlac-nekretnine@hotmail.c'
            //Headers
      
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= 'From: Real Estate Agency EURO-PLAC <europlac-nekretnine@hotmail.com>'."\r\n".
                'Reply-To: <europlac-nekretnine@hotmail.com>'."\r\n" .
                'X-Mailer: PHP/' . phpversion();            
            $message = '<html><body>';
            $message .= '<p>'.$porukaa.'</p> <br><br>';
            $message .= '<br> <h1 style="color:#00c0cd">';
            $message .='Albin Ćoralić </h1>';
            $message .= '<p style="color:#00c0cd">';
            $message .= 'EURO-PLAC Agencija <br>';
            $message .= 'Ćuprija bb, 77220 Cazin<br>';
            $message .= 'Bosna i Hercegovina<br>';
            $message .= 'E-mail: europlac-nekretnine@hotmail.com<br>';
            $message .= 'Mob: +387 61 786 860 WhatsApp & +387 60 3574 103 Viber<br>';
            $message .= 'Skype: Euro-Plac Nekretnine Real Estate Bosna i Hercegovina<br>';
            $message .= '<a style="color:#00c0cd" href="http://europlac-nekretnine.com/">Web stranica</a><br>';
            $message .= '<a style="color:#00c0cd" href="https://www.facebook.com/europlac.nekretnine/?fref=ts">Facebook stranica </a><br>';
            $message .= '<a style="color:#00c0cd" href="https://www.youtube.com/user/europlac1">Youtube kanal</a><br>';
            $message .= '</body></html>';        
            $to = $row['mail'];
            mail($to, $naslov, $message,$headers );
            $counter++;
            $notification -> updateMails($naslov, $porukaa, $counter);
            
            if(($counter % 500) == 0){
                $notification -> updateMails($naslov, $porukaa, $counter);
                break;
            }

            if($counter == $allOfUsers){
                $notification -> resetMails();
                $counter = $notification -> numberOfSentMails();
                $notification -> updateMails($naslov, $porukaa, $counter);
                break;
            }    
        }else $i++;
    } 

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script type="text/javascript" src="../js/jquery.js"></script>
    </head>
    <?php include 'menu.php'; ?>
    <section style="left: calc(350px + 2%); width: calc(98% - 350px);">
        <h4 id="header">Pošaljite mail</h4>
        <form id="forma" method="post" style="width: calc(100% - 100px);">
            <input style="height:40px;" type="text" id="naslovForme" value="<?php echo $naslov; ?>" name="naslov" placeholder="Naslov" autocomplete="off"/> <br><br>
            <textarea style="width:50%;" id="poruka" name="poruka" placeholder="Vaša poruka.."><?php echo $notification->message(); ?></textarea><br><br>
            <input style="width:25%; margin-left: 12.5%;" id="submitForma" type="submit" value="Pošaljite">
            <input id="conitnueSending" style="position: absolute; background: #00c0cd; font-size:15px; color:#fff; border: none; height:30px; right: 0px; width: 200px; top: 250px;" type="submit" value="Nastavi slanje">
        </form>


        <svg id="svg" width="300" height="300">
          <circle id="meh" r="80" cx="150" cy="150" fill="transparent" stroke-dasharray="550" ></circle>
          <circle id="bar" r="80" cx="150" cy="150" fill="transparent" stroke-dasharray="503" stroke-dashoffset="0" stroke-width="40"></circle>
        </svg>
        <div id="percents">
            <p style="font-weight: bold;"><?php echo (int)(($counter / $allOfUsers) * 100); ?>%</p>
        </div>

        <script type="text/javascript">
            var data = <?php echo json_encode($counter / $allOfUsers); ?>;
            data = data*100;
            console.log(data);
            var val = data;
            var $circle = $('#svg #bar');

            var r = $circle.attr('r');
            var c = Math.PI*(r*2);
           
            if (val < 0) { val = 0;}
            if (val > 100) { val = 100;}
            
            var pct = ((100-val)/100)*c;
            
            $circle.css({ strokeDashoffset: pct});
            
            $('#cont').attr('data-pct',val);
        </script>
        <style type="text/css">
            #conitnueSending:hover{cursor: pointer;}
            #svg{
                position: absolute;
                top: 50px;
                right: 0px;
            }
            #percents{
                position: absolute;
                width: 80px;
                height: 80px;
                right: 110px;
                top: 150px;
            }
            #percents p{
                font-size: 30px;
                color:#333;
                text-align: center;
            }
            #svg circle {
              stroke-dashoffset: 0;
              transition: stroke-dashoffset 1s linear;
              stroke: #666;
              stroke-width: 2.5em;
            }
            #svg #bar {
              stroke: #ef5350;
            }
            #svg #meh {
              stroke: #00c0cd;
            }
        </style>
    </section>
</html>