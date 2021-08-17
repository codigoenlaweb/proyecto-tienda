<?php
    if (!isset($_SESSION)){ session_start();}
    require_once '../../config/bakend_autoload.php';
    use controller\controller_order;
    use model\model_order;

    controller_order::order();

    $estate = mysqli_fetch_object(model_order::show_estado());
?>
    <?php if ($estate->estado == 'confirm') {?>
        <p class="maincarrito_name">
            su pedido ha sido guardado exitosamente gracias por probar esta aplicacion web de practica, puede ver su pedido ya guardado en "mis pedidos"
        </p>
        <?php
            unset($_SESSION['shopping']);
            unset($_SESSION['priceall']);
            header('refresh: 10, ../index.php ');
        ?>
        
    <?php }else {?>
        echo 'todo mal';
    <?php }?>

    