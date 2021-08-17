<?php
    use controller\controller_product;
    $viewproduct= controller_product::showproduct();
    use controller\controller_category;
    $cater= controller_category::showcategory();
?>
<?php if ($_SESSION['user_session']['role'] != 'admin') {
    header('location:index.php');
} ?>
<main class="main">
    <h2 class="main_h2">Gestion de productos</h2>
    <table class="managercategories_table" >
        <tr>
            <th class="managercategories_th">ID</th>
            <th class="managercategories_th">NOMBRE</th>
            <th class="managercategories_th">CATEGORIA</th>
            <th class="managercategories_th">PRECIO</th>
            <th class="managercategories_th">OFERTA</th>
            <th class="managercategories_th">STOCK</th>
            <th class="managercategories_th">ACCION</th>

        </tr>
        <?php while($products = mysqli_fetch_object($viewproduct)): ?>
            <tr>
                <td class="managercategories_td"><?php echo $products->id ?></td>
                <td class="managercategories_td"><?php echo $products->nombre_producto?></td>
                <td class="managercategories_td"><?php echo $products->category ?></td>
                <td class="managercategories_td"><?php echo $products->precio_unitario.' $'?></td>
                <td class="managercategories_td"><?php echo $products->oferta.' %'?></td>
                <td class="managercategories_td"><?php echo $products->stock?></td>
                <td class="managercategories_td">
                    <a class="managercategories_a" href="backend/bakend_delete-product.php?id=<?= $products->id ?>">Eliminar</a><br>
                    <a class="managercategories_a" href="editproduct.php?id=<?= $products->id ?>">Editar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2 class="main_h2">Crear productos</h2>
    <div class="main_registration">
        <form class="registration_from" action="backend/bakend_create-product.php" method="post" enctype="multipart/form-data">
            <label class="registration_from-label" for="name-p">Nombre del prducto</label>
            <input class="registration_from-input" type="text" name="name-p" required>

            <label class="registration_from-label" for="description-p">Descripcion del prducto</label>
            <textarea class="registration_from-input" name="description-p" required></textarea>

            <label class="registration_from-label" for="description-p">Categoria del prducto</label>
            <select name="category-p" class="registration_from-input">
                <?php while($categoria = mysqli_fetch_object($cater)): ?>
                    <option value="<?= $categoria->id ?>">
                        <?= $categoria->category ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label class="registration_from-label" for="price-p">precio del prducto</label>
            <input class="registration_from-input" type="text" name="price-p" required>

            <label class="registration_from-label" for="stock-p">Stock</label>
            <input class="registration_from-input" type="number" name="stock-p" required>

            <label class="registration_from-label" for="oferta-p">Oferta</label>
            <input class="registration_from-input" type="number" name="oferta-p">

            <label class="registration_from-label" for="image-p">imagen</label>
            <input type="file" name="image-p" required>

            <input type="submit" value="Crear" class="button">
        </form>
    </div>
</main>