<?php 
include 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <style type="text/css">
        	table tr{
        		text-align: left;
        		border: none;
        	}
        	table tr td p{
        		text-align: left; margin:0px;
        	}
        </style>
    </head>
    <?php include 'menu.php'; ?>
    <section>
        <table style="margin-top:-50px;">
            <?php $db->IspisiUpite(); ?>
        </table>
    </section>
</html>