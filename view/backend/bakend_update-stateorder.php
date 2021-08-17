<?php require_once '../../config/bakend_autoload.php' ?>
<?php

use controller\controller_order;
use controller\controller_product;?>
<?php
    controller_order::update_stateorder();
    header('location:../manageorder.php')

?>