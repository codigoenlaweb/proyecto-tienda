<?php
    use controller\controller_user;
    $user= new controller_user;
    use controller\controller_product;
    $viewproduct= controller_product::showproductcategory();
    use controller\controller_category;
    $category = mysqli_fetch_object(controller_category::showviewcategory());
?>

<main class="main">
    <h2 class="main_h2"><?php echo $category->category ?></h2>
    <section class="section">
        <?php while($products = mysqli_fetch_object($viewproduct)): ?>
            <?php $offer= ($products->precio_unitario - ($products->precio_unitario/100)*$products->oferta); ?>
            <article class="section_article">
                <img class="section_article-img" src="backend/uploads/images/<?= $products->imagen ?>" alt="">
                <h3 class="section_article-h3"><?php echo $products->nombre_producto?></h3>
                
                <?php if ($products->oferta != 0 || !empty($products->oferta)){?>
                    <p class="section_article-p"><?= 'US $'.round($offer, 2).' '.$products->oferta.'% Oferta' ?></p>
                <?php }else { ?>
                    <p class="section_article-p"><?= 'US $'.round($offer, 2) ?></p>
                <?php } ?>
                 
                <a href="viewproduct.php?id=<?= $products->id ?>" class="button2">Comprar</a>
            </article>
        <?php endwhile; ?>

    </section>
    
    
</main>