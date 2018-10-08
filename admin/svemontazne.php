<?php 
include '../db.php';
$db = new DB();
$itemQUery = $db->query("montazne");
if(!empty($_POST['delete'])){
    $id = $_POST['delete'];
    $db->action("DELETE FROM `montazne` WHERE id = $id");
    Redirect::to("svemontazne.php");
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
                    Pregled montažnih kuća
                </h4>
            </div>
            <?php 
            while($item = $itemQUery-> fetch()){ ?>
                <div class="montazna">
                    <?php 
                    $imgQuery = $db->query("photos_montazne");
                    while($img = $imgQuery -> fetch()){
                        if($img['idofpost'] == $item['id']){ ?>
                            <div class="montazneSlka">
                                <img src="images/<?php echo $img['name']; ?>">
                            </div>
                        <?php break; }
                    }
                    ?>
                    <div class="button button3">
                        <a target="_blank" href="../montazna_pregled.php?id=<?php echo $item['id']; ?>"><?php echo $item['naslov']; ?></a>
                    </div>
                    <div class="button">
                        <form method="post">
                            <input type="hidden" name="delete" value="<?php echo $item['id']; ?>">
                            <input type="submit" value="OBRIŠITE">
                        </form>
                    </div>
                    <div class="button button2">
                        <a href="uredimontaznu.php?id=<?php echo $item['id']; ?>">UREDITE</a>
                    </div>
                </div>
            <?php }
            ?>
        </section>
    </body>
</html>