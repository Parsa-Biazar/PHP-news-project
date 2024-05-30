<?php
$id = $_GET['id'];
$q = "SELECT * FROM `posts` WHERE `id` = '$id'";
$result = $connection -> query($q);

if($result){
    $first = $result-> fetch_assoc();
}
?>

<!--اولین پست-->

    <div class="card mb-4">
        <a href="#!"><img src="<?= $admin_url . $first ['image'] ?>" alt="پیش نمایش"></a>
        <div class="card-body">
            <div class="small text-muted"><?= $first ['date'] ?></div>
            <h2 class="card-title"><?= $first ['title'] ?></h2>
            <p class="card-text"><?= $first ['text_body'] ?></p>
<!--            <a class="btn btn-primary" href="?page=post_view">ادامه مطلب →</a>-->
        </div>
    </div>
<div class="card mb-4 p-1">

    <?php
    include "admin/general/show_message.php";
    if (isset($_SESSION['user_id'])&& $_SESSION['role']== 'user' ){
    ?>
    <form action="comment_action.php" method="post">
        <input type="hidden" name="post_id" value="<?= $id ?>">
        <textarea class="form-control " name="comment" id="comment" cols="30" rows="5" placeholder="متن نظر خود را بنویسید"></textarea>
        <div style="text-align: left" class="p-2"><button class="btn btn-success">ارسال متن</button></div>
    </form>
    <?php
    }else{
    ?>
    <div class="alert alert-warning ">
        <p>برای کامنت گزاشتن به عنوان کاربر سایت <a class="link table-hover" href="?page=login">وارد شوید.</a></p>
    </div>
    <?php
    }
    ?>
<?php
    $q = "SELECT * FROM `comments` WHERE `post_id` = '$id' and `accepted` = 1";
    $result = $connection -> query($q);
    if ($result){
        while($row = $result->fetch_assoc()){
            ?>
            <div style="border: 1px solid darkgreen;
    border-radius: 5px;"
                 class="col-12 text-black comment-box p-2 mb-1">
                <?= $row['comment'] ?>
            </div>
            <?php
        }
    }
    ?>
</div>

