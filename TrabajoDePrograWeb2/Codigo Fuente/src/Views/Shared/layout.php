<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/lib/bootstrap/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/css/footer.css" ?>">
    <link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/lib/fontawesome/css/all.min.css" ?>">
    <link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/lib/alertifyjs/css/alertify.min.css" ?>">
    <link rel="stylesheet" href="<?php echo getBaseAddress() . "Webroot/lib/daterangepicker/daterangepicker.css" ?>">
</head>

<body>


<?php

if(isset($_SESSION["logueado"])){
    if(isset($_SESSION["admin"])){
        include_once ("navLogueadoAdmin.php") ;
    }else{
        include_once ("navLogueado.php") ;
    }

}else{
    include_once ("navNoLogueado.php");
}
?>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
    <script src="<?php echo getBaseAddress() . "Webroot/lib/jquery/jquery-3.4.0.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/bootstrap/js/bootstrap.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/fontawesome/js/all.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/moment/moment-with-locales.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/jQuery-Mask-Plugin/dist/jquery.mask.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/alertifyjs/alertify.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/popper/popper.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/tooltip/tooltip.min.js"; ?>"></script>
    <script src="<?php echo getBaseAddress() . "Webroot/lib/validate/validate.min.js"; ?>"></script>


    <main class="pt-4 mt-3" role="main">

        <div class="starter-template">

            <?php
            echo $content_for_layout;
            ?>

        </div>

    </main>
<!-- Footer -->
<div class="bg-primary font-small blue pt-4" id="footer">

    <!-- Copyright -->
    <div class="bg-secondary text-dark footer-copyright text-center py-3">© 2019 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/education/bootstrap/"> OnMarket.com</a>
    </div>
    <!-- Copyright -->

</div>


</body>


</html>