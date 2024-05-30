<?php
session_start();
require "general/database.php";
require "general/public_values.php";
require "general/public_functions.php";
if (!(
        isset($_SESSION["user_id"])&&
        isset($_SESSION['role']) &&
        $_SESSION['role'] == 'admin'
))
{
    header("Location: ".$site_url."?page=login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/rtl.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custome_js.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<?php
include "include/top_nav.php";
?>
<div id="layoutSidenav">
    <?php
    include "include/sidebar.php"
    ?>
    <div id="layoutSidenav_content">



        <?php
//        include "pages/home.php"
        ?>
        <main>
            <div class="container-fluid px-4">
        <?php
        if (isset($_GET['page'])){
            switch ($_GET['page']){
                case "home":
                    include "pages/home.php"; break;
                case "posts":
                    include "pages/posts.php"; break;
                case "post_add":
                    include "pages/post_add.php"; break;
                case "post_edit":
                    include "pages/post_edit.php"; break;



                case "categories":
                    include "pages/categories.php"; break;
                case "category_add":
                    include "pages/category_add.php"; break;
                case "category_edit":
                    include "pages/category_edit.php"; break;






                case "logout":
                    include "pages/logout.php"; break;


                default: include "pages/error404.php"; break;
            }
        }else{
            include "pages/home.php";
        }

        ?>
            </div>
        </main>









        <?php
        include "include/footer.php"
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
