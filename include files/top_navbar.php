<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href=".">خانه</a></li>
                <li class="nav-item"><a class="nav-link" href="./?page=about">درباره ما</a></li>
                <li class="nav-item"><a class="nav-link" href="./?page=sign_in">ثبت نام</a></li>
<!--                <li class="nav-item"><a class="nav-link" href="./?page=login">ورود</a></li>-->
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
            </ul>
            <?php
            if (isset($_SESSION['user_id'])){
            ?>
            <span class="text-white">خوش آمدید <?= $_SESSION['full_name'] ?> عزیز </span>
                    <a class="btn btn-outline-danger" href="./logout.php">خروج</a>
            <?php
            }else{
                ?>
                <a class="btn btn-outline-secondary" href="./?page=login">ورود</a>
            <?php
            }
            ?>
        </div>
    </div>
</nav>