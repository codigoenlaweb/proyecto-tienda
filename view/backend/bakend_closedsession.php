<?php if (!isset($_SESSION)): session_start();endif ?>
<?php require_once '../../config/bakend_autoload.php' ?>
<?php use controller\controller_cleansession; ?>
<?php

    controller_cleansession::clean_sessionloging();
    header('location:../index.php');


?>