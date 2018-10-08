<?php
include 'functions.php';
$slider = new DB();

$id = Input::get('id');

$slider->action("DELETE FROM `slider` WHERE id = $id");

Redirect::to('slider.php');
?>