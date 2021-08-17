<?php

use controller\controller_carrito;
use controller\controller_user; ?>

<aside class="aside">
<?php if (!isset($_SESSION['user_session']) or empty($_SESSION['user_session'])) { ?>
    <?php if (isset($_SESSION['alert_ok']) and !empty($_SESSION['alert_ok'])): ?>
    <p class="alert_error alert_ok alert_error__modifique alert_error__modifique2 mt" ><?php echo $_SESSION['alert_ok'] ?></p>
    <?php endif ?>

    <?php if (isset($_SESSION['alert_error']['empty']) and !empty($_SESSION['alert_error']['empty'])): ?>
        <p class="alert_error alert_error__modifique2 mt"><?php echo $_SESSION['alert_error']['empty'] ?></p>
    <?php endif ?>

    <h4 class="aside_h4">Entrar a la web</h4>
    <form class="aside_form" action="backend/loging.php" method="post">
        <label class="aside_form-label" for="name">Usuario</label>
        <input class="aside_form-input" type="text" name="name">
        <?php if (isset($_SESSION['alert_error']['name_confirm']) and !empty($_SESSION['alert_error']['name_confirm'])): ?>
            <p class="alert_error alert_error__modifique2"><?php echo $_SESSION['alert_error']['name_confirm'] ?></p>
        <?php endif ?>
        <label class="aside_form-label" for="password">Contraseña</label>
        <input class="aside_form-input" type="password" name="password">
        <?php if (isset($_SESSION['alert_error']['password_confirm']) and !empty($_SESSION['alert_error']['password_confirm'])): ?>
            <p class="alert_error alert_error__modifique2"><?php echo $_SESSION['alert_error']['password_confirm'] ?></p>
        <?php endif ?>
        <input class="button" type="submit" value="Entrar">
    </form>
    <ul class="aside_ul">
        <li class="aside_ul-li"><a class="aside_ul-a" href="registration.php"><i class="fas fa-user"></i> Registrarse</a></li>
    </ul>
    <?php }else {?>
        <?php $user_session= new controller_user; ?>
        <h4 class="aside_h4">Bienvenido <?php echo $_SESSION['user_session']['name']; ?></h4>
        <ul class="aside_ul">
            <li class="aside_ul-li"><a class="aside_ul-a" href="carrito.php"><i class="fas fa-shopping-cart"></i> Carro de compra<?= controller_carrito::count_product(); ?></a></li>
            <li class="aside_ul-li"><a class="aside_ul-a" href="myproduct.php"><i class="fas fa-shopping-bag"></i> Mis pedidos</a></li>
            <?php if ($_SESSION['user_session']['role'] == 'admin') {?>
                <li class="aside_ul-li"><a class="aside_ul-a" href="manageorder.php"><i class="fas fa-key"></i> Gestionar pedidos</a></li>
                <li class="aside_ul-li"><a class="aside_ul-a" href="managecategories.php"><i class="fas fa-key"></i> Gestionar categorias</a></li>
                <li class="aside_ul-li"><a class="aside_ul-a" href="manageproduct.php"><i class="fas fa-key"></i> Gestionar productos</a></li>
            <?php } ?>
            <li class="aside_ul-li"><a class="aside_ul-a" href="backend/bakend_closedsession.php"><i class="fas fa-user"></i> Cerrar session</a></li>
        </ul>
    <?php } ?>
    
</aside>