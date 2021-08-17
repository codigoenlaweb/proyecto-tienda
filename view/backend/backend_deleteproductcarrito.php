<?php

use controller\controller_carrito;
if (!isset($_SESSION)): session_start();endif ?>
<?php require_once '../../config/bakend_autoload.php' ?>
<?php
    unset($_SESSION['shopping'][$_GET['id']]);
    header('location:../carrito.php')

?>