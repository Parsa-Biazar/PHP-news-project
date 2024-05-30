<?php
session_start();
require "include files/database.php";
require "admin/general/public_values.php"
?>
<!DOCTYPE html>
<html lang="fa-ir">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="css/costume.css">
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php
        include "include files/top_navbar.php"
        ?>
        <!-- Page header with logo and tagline-->
        <?php
        include "include files/header.php"
        ?>
        <!-- Page content-->
        <?php
        include "include files/content.php"
        ?>
        <!-- Footer-->
        <?php
        include "include files/footer.php"
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>