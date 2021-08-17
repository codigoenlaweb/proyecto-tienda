<?php
    use controller\controller_carrito;
    use controller\controller_product;

$all= 0;
    $_SESSION['priceall'] = $all;
?>


<main class="main maincarrito_relative">
    <section class="maincarrito_section">
        <h2 class="main_h2">Carrito de compras</h2>
        <?php if (isset($_SESSION['shopping']) && !empty($_SESSION['shopping'])):?>
            <?PHP foreach ($_SESSION['shopping'] as $indice => $elemento):?> 
                <?php $viewproduct= mysqli_fetch_object(controller_product::oneproductcarr($_SESSION['shopping'] [$indice] ['id_product'])); ?>
                <?php $buyall= $_SESSION['shopping'] [$indice] ['cant'] * $_SESSION['shopping'] [$indice] ['price'] ?>
                <?php $all += $buyall; ?>

                <article class="maincarrito_article">
                    <div class="maincarrito_div1">
                        <img class="shopping_img" src="backend/uploads/images/<?= $_SESSION['shopping'] [$indice] ['img']?>" alt="">
                    </div>

                    <div class="maincarrito_div2">
                        <p class="maincarrito_name"><?= $_SESSION['shopping'] [$indice] ['product'] ?></p>
                        <p class="maincarrito_price"><?= 'US $'.round($buyall, 2) ?></p>
                        <p class="maincarrito_name"><a class="maincarrito_empty" href="backend/backend_deleteproductcarrito.php?id=<?= $indice ?>">Eliminar</a></p>
                        <p>
                            <form class="maincarrito_cant" action="backend/bakend_updatecarrito.php?id=<?= $_SESSION['shopping'] [$indice] ['id_product'] ?>" method="post">
                                <input class="maincarrito_form-number" type="number" name="cant_product" value="<?= $_SESSION['shopping'] [$indice] ['cant'] ?>" min="1" max="<?= $viewproduct->stock ?>">
                                <label class="viewproduct_label" for="cant_product">Unidades</label><br>
                                <input type="submit" class="maincarrito_form-button" value="Cambiar">
                            </form>
                        </p>
                    </div>
                </article>
            <?PHP endforeach ?>
            <?php $_SESSION['priceall'] = $all;?>
            <a class="button button-black main_buy-a button-empty" href="backend/bakend_emptycarrito.php">VACIAR CARRITO</a>
        <?php endif?>
    </section>

    <div class="main_buy">
        <p class="main_buy-all">Total: USD $<?php if ($_SESSION['priceall'] != 0 && isset($_SESSION['priceall'])) { echo round($_SESSION['priceall'], 2); }else {echo '0'; }?></p>
        <a class="button button-black main_buy-a" href="confirmorder.php">GUARDAR PEDIDO <?= controller_carrito::count_product()?></a>
        <p class="">En el proximo paso, pondras tu direccion y podras guardar tu pedido</p>
    </div>
</main>
