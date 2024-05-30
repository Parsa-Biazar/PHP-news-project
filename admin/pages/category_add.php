<?php

//$query = "SELECT * FROM posts ";
//$result = $connection->query($query);
$title = isset($_COOKIE['form_title'])?$_COOKIE['form_title']:'';
$color = isset($_COOKIE['form_color'])?$_COOKIE['form_color']:'';
$checked = '';
$has_error = false;
$message = '';
$status = 'success';
$validation_result = '';
//die(print_r($_POST));

?>


<h1 class="mt-4">در صفحه افزودن دسته بندی هستید</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">دسته بندی</li>
</ol>

<a class="btn btn-warning mb-5" href="<?=$admin_url?>?page=categories">
    بازگشت به لیست دسته بندی
</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        لیست ثبت دسته بندی
    </div>
    <div class="card-body">

        <?php
        include "general/show_message.php"
        ?>

        <form method="post" action="actions/category_action.php"  >


            <input type="hidden" name="type" value="category_add">

            <div class="form-floating mb-3">
                <input class="form-control" name="title" id="title" type="text" placeholder="عنوان دسته بندی" value="<?= $title ?>" />
                <label for="title">عنوان دسته بندی</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="color" id="color" type="color" placeholder="تاریخ دسته بندی" value="<?= $color  ?>" />
                <label for="color">تاریخ دسته بندی</label>
            </div>

            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button class="btn btn-primary btn-block">ثبت دسته بندی</button>
                </div>
            </div>
        </form>
    </div>
</div>