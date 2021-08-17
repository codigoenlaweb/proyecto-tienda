<?php
    use controller\controller_carrito;
    use controller\controller_order;

    $order = mysqli_fetch_object(controller_order::showdetailorder());
    $iline_order = controller_order::showdetail_inlineorder();
?>

<main class="main">
    <section class="maincarrito_section">
        <h2 class="main_h2">Detalle del pedido numero(<?= $_GET['id'] ?>)</h2>
        <article class="bt">
            <h4>DIRECCION DEL ENVIO</h4>
            <p>
                Ciudad: <?= $order->ciudad.'.' ?>
            </p>
            <p>
                Direccion: <?= $order->direccion.'.' ?>
            </p>
            <h4>DATOS DEL PEDIDO</h4>
            <p>
                Total a pagar: <?= $order->precio_total.'.' ?>
            </p>
            <p>
                Fecha: <?= $order->fecha.'.' ?>
            </p>
        </article>
        <?php while ($iline_orders = mysqli_fetch_object($iline_order)): ?>
            <article class="maincarrito_article">
                <div class="maincarrito_div1">
                    <img class="shopping_img" src="backend/uploads/images/<?= $iline_orders->imagen?>" alt="">
                </div>

                <div class="maincarrito_div2">
                    <p class="maincarrito_name"><?= $iline_orders->nombre_producto ?></p>
                    <p class="maincarrito_price"><?= 'US $'.$iline_orders->precio_liena_pedido ?></p>
                    <p class="maincarrito_cant"><?= $iline_orders->unidad?></p>
                </div>
            </article>

        <?php endwhile ?>
        
        <?php if (isset($_SESSION['user_session']) && $_SESSION['user_session'] ['role'] == 'admin'):?>
            <a class="button button-black main_buy-a" href="backend/bakend_update-stateorder.php?id=<?= $_GET['id'] ?>">Enviado</a>
        <?php endif ?>
    </section>
        
</main>