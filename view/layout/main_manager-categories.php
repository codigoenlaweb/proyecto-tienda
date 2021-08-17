<?php
    use controller\controller_category;
    $cater= controller_category::showcategory();
?>
<?php if ($_SESSION['user_session']['role'] != 'admin') {
    header('location:index.php');
} ?>
<main class="main">
    <h2 class="main_h2">Gestion de categorias</h2>
    <table class="managercategories_table" >
        <tr>
            <th class="managercategories_th">ID</th>
            <th class="managercategories_th">NOMBRE</th>
            <th class="managercategories_th">ELIMINAR</th> 
        </tr>
        <?php while($categoria = mysqli_fetch_object($cater)): ?>
            <tr>
                <td class="managercategories_td"><?php echo $categoria->id ?></td>
                <td class="managercategories_td"><?php echo $categoria->category ?></td>
                <td class="managercategories_td"><a class="managercategories_a" href="backend/bakend_delete-category.php?id=<?= $categoria->id ?>">Eliminar</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2 class="main_h2">Crear categoria</h2>
    <div class="main_registration">
        <form class="registration_from" action="backend/bakend_create-category.php" method="post">
            <label class="registration_from-label" for="create-category">Nombre de categoria</label>
            <input class="registration_from-input" type="text" name="create-category" required>

            <input type="submit" value="Crear" class="button">
        </form>
    </div>
    <h2 class="main_h2">Editar categoria</h2>
    <div class="main_registration">
        <form class="registration_from" action="backend/bakend_update-category.php" method="post">
            <label class="registration_from-label" for="create-category">ID de categoria</label>
            <input class="registration_from-input" type="number" name="id-category" required>

            <label class="registration_from-label" for="create-category">Nuevo nombre de categoria</label>
            <input class="registration_from-input" type="text" name="name-category" required>

            <input type="submit" value="Editar" class="button">
        </form>
    </div>
</main>