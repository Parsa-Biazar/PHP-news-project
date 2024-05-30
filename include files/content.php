<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
        <?php
        if (isset($_GET['page'])){
            switch ($_GET['page']){
                case "home":
                    include "page_home.php"; break;
                case "about":
                    include "page_about.php"; break;
                case "sign_in":
                    include "page_sign_in.php";break;
                    case "login":
                    include "page_login.php";break;
                    case "post_view":
                    include "post_view.php";break;

                default: include "error_404.php"; break;
            }
        }else{
            include "page_home.php";
        }

        ?>
        </div>
        <!-- Side widgets-->
        <?php
//        include "include files/content include files/main-content.php";
        include "include files/content include files/sidebar.php";
        ?>
    </div>
</div>




