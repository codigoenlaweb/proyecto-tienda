<?php
    session_start();
    unset($_SESSION['shopping']);
    header('location:../carrito.php');

?>