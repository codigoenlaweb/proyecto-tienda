<?php require_once '../../config/bakend_autoload.php' ?>
<?php use controller\controller_product;?>
<?php
    controller_product::updateproduct($_GET['id']);

?>