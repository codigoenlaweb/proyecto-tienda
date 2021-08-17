<?php
    use controller\controller_product;
    $viewproduct= mysqli_fetch_object(controller_product::oneproduct());
    $offer= $viewproduct->precio_unitario - ($viewproduct->precio_unitario/100)*$viewproduct->oferta;
?>

<main class="main">
    <h2 class="main_h2"><?= $viewproduct->nombre_producto ?></h2>
    <section class="viewproduct_section">
        <div class="viewproduct_sectiondiv1">
            <img class="viewproduct_img" src="backend/uploads/images/<?=$viewproduct->imagen ?>" alt="<?= $viewproduct->nombre_producto ?>">
        </div>

        <div class="viewproduct_sectiondiv2">
            <p class="viewproduct_description"><?= $viewproduct->descripcion ?></p>
            <p class="viewproduct_price"><?= 'US $'.$offer ?></p>
            <?php if ($viewproduct->oferta != 0 || !empty($viewproduct->oferta)):?>
                <p class="viewproduct_offer"><?= $viewproduct->oferta.'% Oferta' ?></p>
            <?php endif ?>
            <form action="backend/bakend_addcarrito.php?id=<?= $viewproduct->id ?>" method="post">
                <input class="viewproduct_cant" type="number" name="cant_product" value="1" min="1" max="<?= $viewproduct->stock ?>">
                <label class="viewproduct_label" for="cant_product">Unidades</label><br>
                <input type="submit" class="button button-black" value="Comprar">
            </form>
        </div>
    </section>
</main>