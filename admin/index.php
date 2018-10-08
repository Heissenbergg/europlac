<?php
include 'functions.php';
$hide = $db->_pdo -> query('SELECT * FROM nekretnina');
$time = time();
while($row = $hide ->fetch()){
    if(($time - $row['time']) > 2592000 && $row['time'] != 0){
        $broj = 1;
        $ajdi = $row['id'];
        $update = "UPDATE `nekretnina` SET `neobjavljeno` = '{$broj}' WHERE id = $ajdi ";
        $db->_pdo->query($update);
    }
    $nekretnine = $db->_pdo->query('SELECT * FROM nekretnina');
    while($col = $nekretnine ->fetch()){
        if($co['id'] == $row['id']){
            $vrsta  = $row['nekretnina'];
        }
    }
    $num = $db->_pdo->query('SELECT * FROM num');
    while($col = $num ->fetch()){
        if($col['ime'] == $vrsta){
            $broj = $col['broj'];
            $broj--;
            $ajdi = $col['id'];
            $update = "UPDATE `num` SET `broj` = '{$broj}' WHERE id = $ajdi ";
            $this->_pdo->query($update);
            break;
        }
    }
}
//$visitors = "UPDATE `brojposjeta` SET `svi` = '{$brojPosjeta}' WHERE id = 1";
//$db->_pdo->query($visitors);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <section>
            <div id="firstCircle" title="Ukupan broj posjeta">
                <h4><?php echo $brojPosjeta; ?></h4>
            </div>
            <div id="secondCircle" title="Broj različitih usera koji su posjetili stranicu">
                <h4>123</h4>
            </div>
            <div id="thirdCircle" title="Broj registrovanih korisnika">
                <h4><?php echo $brojKorisnika; ?></h4>
            </div>
        </section>
    </body>
</html>