<?php
include '../db.php';
include 'includes/naslovna.php';
$six = new SixofThem();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <?php include 'menu.php'; ?>
    <style type="text/css">
        section table{
            top:20px;
            width:90%;
            margin:0px;
            padding:0px;
        }
        section table tr td{
            width:32%;
            height:150px;
        }
        section table tr td img{
            height:100%;
            width:auto;
        }
    </style>
    <section>
        <table>
            <tr>
                <td>Slika : </td>
                <td>Naslov : </td>
                <td>Akcija : </td>
            </tr>
            <?php $six->write(); ?>
        </table>
    </section>
</html>