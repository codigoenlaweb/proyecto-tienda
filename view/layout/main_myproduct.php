<?php
    use controller\controller_carrito;
    use controller\controller_order;

    $order = controller_order::showorder();
?>

<main class="main">
        <h2 class="main_h2">Mis pedidos</h2>
        <article class="myorder_titlle">
            <ul class="myorder-ul">
                <li class="myorder-li">
                    <p>PEDIDO</p>
                </li>
                <li class="myorder-li">
                    <p>PRECIO</p>
                </li>
                <li class="myorder-li">
                    <p>FECHA</p>
                </li>
            </ul>
        </article>
        <?php while($orders = mysqli_fetch_object($order)): ?>
            <a href="detail_order.php?id=<?= $orders->id ?>" class="myorder-a">
                <article class="myorder">
                    <ul class="myorder-ul">
                        <li class="myorder-li">
                            <p><?= $orders->id; ?></p>
                        </li>
                        <li class="myorder-li">
                            <?='USD '.$orders->precio_total.'$'; ?>
                        </li>
                        <li class="myorder-li">
                            <?= $orders->fecha; ?>
                        </li>
                    </ul>
                </article>
            </a>
        <?php endwhile; ?>
</main>
