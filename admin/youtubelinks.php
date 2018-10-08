<?php 
include '../db.php';
$db = new DB();

$linksQuery = $db->query("youtubelinks");

if(!empty($_POST['linkname'])){
    $name = $_POST['linkname'];
    $link = $_POST['linklink'];

    $insert = "INSERT INTO `youtubelinks` (`name`,`link`) 
           VALUES ('{$name}', '{$link}')";
    $db->action($insert); 
    Redirect::to('youtubelinks.php');
}

if(!empty($_POST['delete'])){
    $id = $_POST['delete'];
    $db->action("DELETE FROM `youtubelinks` WHERE id = $id");
    Redirect::to('youtubelinks.php');
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/montazne.css">
        <link rel="stylesheet" type="text/css" href="css/klipovi.css">
        <script type="text/javascript" src="js/montazne.js"></script>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <section>
            <div id="montazneHeader">
                <h4>
                    Svi klipovi
                </h4>
            </div>
            <div class="clip">
                <div class="nameofcip">
                    <h4>Naziv klipa</h4>
                </div>
                <div class="editClip">
                    <form method="post">
                        <input type="text" name="" value="Akcija" readonly>
                    </form>
                </div>
            </div>
            <?php 
            while($link = $linksQuery -> fetch()){ ?>
                <div class="clip">
                    <div class="nameofcip">
                        <h4><?php echo $link['name']; ?></h4>
                    </div>
                    <div class="editClip">
                        <form method="post">
                            <input type="hidden" name="delete" value="<?php echo $link['id']; ?>">
                            <input type="submit" name="" value="Obrišite" readonly>
                        </form>
                    </div>
                </div>
            <?php }
            ?>

            <div class="clip" style="margin-top: 30px;">
                <form method="post">
                    <div class="nameofcip">
                        <input type="text" name="linkname" placeholder="Naziv klipa..">
                    </div>
                    <div class="linkofclip">
                        <input type="text" name="linklink" placeholder="Link..">
                    </div>
                    <div class="editClip">
                        <input type="submit" name="" value="Spremite" readonly>
                    </div>
                </form>
            </div>
            
        </section>
    </body>
</html>