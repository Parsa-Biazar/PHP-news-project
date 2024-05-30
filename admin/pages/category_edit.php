<?php
$id = $_GET['id'];
$q = "SELECT * FROM `categories` where id='$id'";
$result = $connection -> query($q);

//$title = '';
//$color = '';
$category='';
$has_error = false;
$message = '';
$status = 'success';
$validation_result = '';
$title='';
$color='';
if($result){
    $category = $result-> fetch_assoc();
    $title = $category['title'];
    $color = $category['color'];
}


?>


<h1 class="mt-4">در صفحه ویرایش دسته بندی هستید</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">دسته بندی</li>
</ol>

<a class="btn btn-warning mb-5" href="<?=$admin_url?>?page=categories">
    بازگشت به لیست دسته بندی
</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        لیست ویرایش دسته بندی
    </div>
    <div class="card-body">

        <?php include_once "general/show_message.php";?>


        <form method="post" action="actions/category_action.php" enctype="multipart/form-data" >

            <input type="hidden" name="type" value="category_edit">
            <input type="hidden" name="category_id" value="<?= $id ?>">


            <div class="form-floating mb-3">
                <input class="form-control" name="title" id="title" type="text" placeholder="عنوان دسته بندی" value="<?= $title ?>" />
                <label for="title">عنوان دسته بندی</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" name="color" id="color" type="color" placeholder="رنگ دسته بندی" value="<?= $color  ?>" />
                <label for="color">رنگ دسته بندی</label>
            </div>

            <div class="mt-4 mb-0">
                <div class="d-grid">
                    <button class="btn btn-primary btn-block">ثبت تغییرات</button>
                </div>
            </div>
        </form>
    </div>
</div>