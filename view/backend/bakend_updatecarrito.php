<?php

use controller\controller_carrito;
if (!isset($_SESSION)): session_start();endif ?>
<?php require_once '../../config/bakend_autoload.php' ?>
<?php
    controller_carrito::update();
    header('location:../carrito.php')


?>