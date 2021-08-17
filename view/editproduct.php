<?php if (!isset($_SESSION)): session_start();endif ?>
<?php require_once '../config/autoload.php';?>
<?php
    use controller\controller_cleansession;
    use controller\controller_product;
    use controller\controller_category;
    $cater= controller_category::showcategory();
    $idpro= $_GET['id']
?>
<?php use controller\controller_user; ?>
<!DOCTYPE html>
<html lang="es">
<?php
    $product= mysqli_fetch_object(controller_product::oneproduct());
?>
<head>
    <script src="https://kit.fontawesome.com/9c8dc7caa2.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tu tienda web</title>
</head>
<h2 class="main_h2">Editar productos</h2>
    <div class="main_registration">
        <form class="registration_from" action="backend/bakend_update-product.php?id=<?= $idpro ?>" method="post" enctype="multipart/form-data">
            <label class="registration_from-label" for="name-p">Nombre del prducto</label>
            <input class="registration_from-input" type="text" name="name-p" value="<?= $product->nombre_producto ?>" required>

            <label class="registration_from-label" for="description-p">Descripcion del prducto</label>
            <textarea class="registration_from-input" name="description-p" required><?= $product->descripcion ?></textarea>

            <label class="registration_from-label" for="description-p">Categoria del prducto</label>
            <select name="category-p" class="registration_from-input">
                <?php while($categoria = mysqli_fetch_object($cater)): ?>
                    <option value="<?= $categoria->id ?>"
                    <?php if ($categoria->id == $product->id_categoria) {?> selected <?php } ?>
                    ><?= $categoria->category ?></option>
                <?php endwhile; ?>
            </select>

            <label class="registration_from-label" for="price-p">precio del prducto</label>
            <input class="registration_from-input" type="text" name="price-p" value="<?= $product->precio_unitario ?>" required>

            <label class="registration_from-label" for="stock-p">Stock</label>
            <input class="registration_from-input" type="number" name="stock-p" value="<?= $product->stock ?>" required>

            <label class="registration_from-label" for="oferta-p">Oferta</label>
            <input class="registration_from-input" type="number" name="oferta-p" value="<?= $product->oferta ?>">

            <label class="registration_from-label" for="image-p">imagen</label>
            <img class="img-nano" src="backend/uploads/images/<?= $product->imagen ?>" alt="">
            <input type="file" name="image-p" required>

            <input type="submit" value="editar" class="button">
        </form>
    </div>
</html>