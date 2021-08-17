<main class="main">
    <h2 class="main_h2">Direccion del envio</h2>
    <div class="main_registration">
        <form class="registration_from" action="backend/bakend_confirmorder.php" method="post">
            <?php if (isset($_SESSION['alert_error']['error'])):?>
                <p class="alert_error alert_error__modifique"><?php echo $_SESSION['alert_error']['error'] ?></p>
            <?php endif ?>

            <label class="registration_from-label" for="city">Ciudad</label>
            <input class="registration_from-input" type="text" name="city">
            
            <label class="registration_from-label" for="address">Direccion</label>
            <input class="registration_from-input" type="text" name="address">

            
            <label class="registration_from-label" for="reference">Referencias</label>
            <input class="registration_from-input" type="text" name="reference">

            <input type="submit" value="Guardar" class="button">
        </form>
    </div>
</main>