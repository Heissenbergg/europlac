<?php 
include '../db.php';
$db = new DB();
$itemQUery = $db->query("feedback");


if(!empty($_POST['idofItem'])){
    $id = $_POST['idofItem'];
    if(isset($_POST['allow'])){
        $is = 1;
        $update = "UPDATE `feedback` SET `visible` = '{$is}' WHERE id = $id";
    }else{
        
        $is = 0;
        $update = "UPDATE `feedback` SET `visible` = '{$is}' WHERE id = $id";
    }
    $db->action($update);
    Redirect::to('svikomentari.php');
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/montazne.css">
        <script type="text/javascript" src="js/montazne.js"></script>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <section>
            <div id="montazneHeader">
                <h4>
                    Pregled komentara
                </h4>
            </div>
            <div class="montazna">
                <?php 
                while($item = $itemQUery -> fetch()){ ?>
                    <form method="post">
                        <div class="detailss">
                            <div class="detail">
                                <p><?php echo $item['idofuser']; ?> <?php echo $item['name']; ?></p>
                            </div>
                            <div class="detail">
                                <p>
                                    Ocjena : <?php echo $item['rate']; ?>
                                </p>
                            </div>
                            <div class="detail">
                                <p><?php echo $item['feedback']; ?></p>
                            </div>                
                            <div class="detail">
                                <input type="hidden" name="idofItem" value="<?php echo $item['id']; ?>">
                                <?php 
                                if($item['visible']){ ?>
                                    <input type="checkbox" name="allow" checked>
                                <?php }else{ ?>
                                    <input type="checkbox" name="allow">
                                <?php }
                                ?>
                                
                            </div>
                            <div class="detail">
                                <input type="submit" value="Spremi">
                            </div>
                        </div>
                    </form>
                <?php }
                ?>
            </div>
        </section>
    </body>
</html>