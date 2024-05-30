<h1>ثبت نام کنید!</h1>

<?php
//include "include files/content include files/sidebar.php"
?>

<!--besmellahe rahman e rahim !-->


<?php
$full_name= '';
$user_name= '';
$email= '';
$password = '';
$has_error = false;
$messages = '';
$taste = '';
if ((count($_POST))){
    if (!(strlen($_POST['full_name'])) > 0) {
        $has_error = true;
        $messages .= '<li>لطفا نام خود را وارد کنید</li>';
        }else{
        $full_name = ($_POST['full_name']);
        }
    if (!(strlen($_POST['user_name'])) > 0) {
        $has_error = true;
        $messages .= '<li>لطفا نام کاربری خود را وارد کنید</li>';
        }else{
        $user_name = ($_POST['user_name']);
    }if (!(strlen($_POST['password'])) > 0) {
        $has_error = true;
        $messages .= '<li>لطفا رمز عبور خود را وارد کنید</li>';}
        else {
        $password = ($_POST['password']);
        }
    if (!(strlen($_POST['email'])) > 0) {
        $has_error = true;
        $messages .= '<li>لطفا ایمیل خود را وارد کنید</li>';
        }else{
        $email = ($_POST['email']);
}
    if (isset($_POST['taste'])) {
//        $has_error = true;
//        $messages .= 'لطفا یکی یا چند مورد را به دلخواه انتخاب کنید';
        $taste = implode(",", $_POST['taste']);
    }
//    die(print_r($_POST));




//    if (!(count($_POST['taste']))>0) {
//        $has_error = true;
//        $messages .= 'لطفا یکی یا چند مورد را به دلخواه انتخاب کنید';
//        }else {
//        $taste = implode(",", $_POST['taste']);
//    }
if ($has_error){

    ?>
<div class="alert alert-danger">
    <ul>
        <?= $messages ?>
    </ul>
</div>
<?php }else {
   ?>
<div class="alert alert-success">
    <p>    اطلاعات شما دریافت شد!
    </p>
</div>

<?php
    $password=$connection->real_escape_string($password);
    $password=(sha1(md5(sha1($password))));
    $h = "INSERT INTO `users`(`id`, `full_name`, `user_name`, `password`, `email`, `taste`) VALUES ('','$full_name','$user_name','$password','$email','$taste')";
    $connection->query($h);
    $full_name= '';
    $user_name= '';
    $email= '';
    $password = '';
}}
//print_r($_POST);



?>

    <form method="post" class="form form-control">
        <div class="form-check-label d-flex justify-content-evenly"><label>
            نام :<input class="form input-group form-control" type="text" name="full_name" value="<?= $full_name ?>"  placeholder="نام">
        </label>

        <label>
            نام کاربری :<input class="form input-group form-control" type="text" name="user_name" value="<?= $user_name ?>" placeholder="نام کاربری">
        </label>
        <label>
            رمز عبور :<input class="form input-group form-control" type="password" name="password" placeholder="رمز عبور">
        </label>

        <label>
            ایمیل :<input class="form input-group form-control" type="email" name="email" value="<?= $email ?>" placeholder="ایمیل">
        </label>
        </div>


        <strong class="d-block">به دلخواه انتخاب کنید.</strong>
        <input class="form-check-input user-select-none" type="checkbox" id="taste1" name="taste[]" value="چوب">
        <label for="taste1">چوب</label><br>
        <input class="form-check-input user-select-none" type="checkbox" id="taste2" name="taste[]" value="کناف کاری">
        <label for="taste2">کناف کاری</label><br>
        <input class="form-check-input user-select-none" type="checkbox" id="taste3" name="taste[]" value="کارواش">
        <label for="taste3">کارواش</label><br>
        <input class="form-check-input user-select-none" type="checkbox" id="taste4" name="taste[]" value="صلواتی">
        <label for="taste4">صلواتی</label><br>
        <input class="form-check-input user-select-none" type="checkbox" id="taste5" name="taste[]" value="حلوا">
        <label for="taste5">حلوا</label><br>

        <button class="btn btn-success">ارسال</button>
    </form>

<?php
//die(print_r($taste));


//$q = "INSERT INTO `users`(`id`, `full_name`, `last_name`, `password`, `email`, `taste`) VALUES ('null','$full_name','$last_name','$password','$email','$taste')";
//$b = "INSERT INTO `users`(`id`, `full_name`, `last_name`, `password`, `email`, `taste`) VALUES ('null','$full_name','$last_name','$password','$email','$taste')";



?>