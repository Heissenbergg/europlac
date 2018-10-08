<?php
require_once '../class/db.php';
require_once '../class/bann.php';

$ban = new Ban();

$ban -> insertBan($_SERVER['HTTP_X_FORWARDED_FOR'], $_SERVER['REMOTE_ADDR']);
Redirect::to('/404.php');
