<?php

use controller\controller_carrito;
use model\model_carrito;
use controller\controller_product;
if (!isset($_SESSION)): session_start();endif ?>
<?php require_once '../../config/bakend_autoload.php' ?>
<?php
    controller_carrito::add();


?>