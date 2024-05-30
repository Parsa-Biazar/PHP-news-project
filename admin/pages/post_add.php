<?php

//$query = "SELECT * FROM posts ";
//$result = $connection->query($query);
$title = isset($_COOKIE['form_title'])?$_COOKIE['form_title']:'';
$post_body = isset($_COOKIE['form_body'])?$_COOKIE['form_body']:'';
$date = isset($_COOKIE['form_date'])?$_COOKIE['form_date']:'';
$author = isset($_COOKIE['form_author'])?$_COOKIE['form_author']:'';
$category = isset($_COOKIE['form_category'])?$_COOKIE['form_category']:'';
$pinned = isset($_COOKIE['form_pinned'])?$_COOKIE['form_pinned']:0;
$checked = '';
$has_error = false;
$message = '';
$status = 'success';
$validation_result = '';
//die(print_r($_POST));

?>


<h1 class="mt-4">در صفحه افزودن خبر هستید</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">اخبار</li>
</ol>

<a class="btn btn-warning mb-5" href="<?=$admin_url?>?page=posts">
    بازگشت به لیست اخبار
</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        لیست ثبت خبر
    </div>
    <div class="card-body">

        <?php
        include "general/show_message.php"
        ?>

        <form method="post" action="actions/post_actions.php" enctype="multipart/form-data" >


            <input type="hidden" name="type" value="post_add">

            <div class="form-floating mb-3">
                <input class="form-control" name="title" id="title" type="text" placeholder="عنوان خبر" value="<?= $title ?>" />
                <label for="title">عنوان خبر</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="post_body" id="post_body" type="text" placeholder="متن خبر"  ><?=$post_body?></textarea>
                <label for="post_body">متن خبر</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" name="date" id="date" type="date" placeholder="تاریخ خبر" value="<?= $date  ?>" />
                <label for="date">تاریخ خبر</label>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" name="author" id="author" type="text" placeholder="نویسنده" value="<?= $author  ?>" />
                        <label for="author">نویسنده</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="category" id="category" type="text" placeholder="دسته بندی" value="<?= $category  ?>" />
                        <label for="category">دسته بندی</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3 mb-md-0">
                        <?php
                        if ($pinned==1){
                            $checked = 'checked';
                        }
                        ?>
                        <input class="form-check-input" name="pinned" id="pinned" <?= $checked ?> type="checkbox" value="1" />
                        <label class="form-check-label" for="pinned">پین شود</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" name="image" id="image" type="file" placeholder="تصویر" />
                        <label for="image">تصویر</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button class="btn btn-primary btn-block">ثبت خبر</button>
                </div>
            </div>
        </form>
    </div>
</div>