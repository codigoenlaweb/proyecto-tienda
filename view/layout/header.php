<?php
use controller\controller_category;
$cater= controller_category::showcategory();
?>
<header class="header">
        <div class="header_intro">
            <img class="header_intro-img" src="../img/camiseta.png" alt="">
            <h1 class="header_intro-h1">TIENDA DE CAMISETAS</h1>
        </div>
        <nav class="header_nav">
            <ul class="nav_ul">
                <li class="nav_li"><a class="nav_a" href="index.php">Inicio</a></li>
                <?php while($categoria = mysqli_fetch_object($cater)): ?>
                    <li class="nav_li"><a class="nav_a" href="categoryviewproduct.php?id=<?= $categoria->id ?>"><?php echo $categoria->category ?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>
    </header>