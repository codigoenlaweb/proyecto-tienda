<main class="main">
    <h2 class="main_h2">Registro</h2>
    <div class="main_registration">
        <form class="registration_from" action="backend/registration.php" method="post">
            <?php if (isset($_SESSION['alert_error']['error'])):?>
                <p class="alert_error alert_error__modifique"><?php echo $_SESSION['alert_error']['error'] ?></p>
            <?php endif ?>
            <label class="registration_from-label" for="user">Nombre de usuario</label>
            <input class="registration_from-input" type="text" name="name">
            <?php if (isset($_SESSION['alert_error']['name'])):?>
                <p class="alert_error"><?php echo $_SESSION['alert_error']['name'] ?></p>
            <?php endif ?>
            
            <label class="registration_from-label" for="email">Correo electronico</label>
            <input class="registration_from-input" type="email" name="email">
            <?php if (isset($_SESSION['alert_error']['email'])):?>
                <p class="alert_error"><?php echo $_SESSION['alert_error']['email'] ?></p>
            <?php endif ?>
            
            <label class="registration_from-label" for="password">Contraseña</label>
            <input class="registration_from-input" type="password" name="password">
            <?php if (isset($_SESSION['alert_error']['password'])):?>
                <p class="alert_error"><?php echo $_SESSION['alert_error']['password'] ?></p>
            <?php endif ?>

            <input type="submit" value="Registrarse" class="button">
        </form>
    </div>
</main>