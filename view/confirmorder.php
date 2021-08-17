<?php require_once '../config/autoload.php' ?>
<?php use controller\user; ?>
<?php use controller\controller_cleansession; ?>
<?php if (!isset($_SESSION)): session_start();endif ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://kit.fontawesome.com/9c8dc7caa2.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tu tienda web</title>
</head>
<body class="body_registration">
    <!--start header-->
    <?php require_once 'layout/header.php'; ?>
    <!--end header-->

    <!--start main content-->
    <?php require_once 'layout/main_confirmorder.php'; ?>
    <!--end main content-->

    <!--start footer-->
    <?php require_once 'layout/footer.php'; ?>
    <!--end footer-->
    <?php controller_cleansession::clean_session(); ?>
</body>

</html>