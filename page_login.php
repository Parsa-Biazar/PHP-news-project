<?php
require "admin/general/public_values.php";
require "admin/general/public_functions.php";
require "admin/general/database.php";
include "admin/general/show_message.php";
$user_name = isset($_COOKIE['user_name'])?$_COOKIE['user_name']:'';
?>
<h1>ورود !</h1>
<form method="post" ACTION="admin/actions/login_actions.php" class="form form-control">
        <div class="form-check-label d-flex justify-content-evenly">
        <label class="">
            نام کاربری :<input class="form-control" type="text" name="user_name" value="<?=$user_name?>" placeholder="نام کاربری">
        </label>
        <label class="">
            رمز عبور :<input class="form-control" type="password" name="password" placeholder="رمز عبور">
        </label>

        </div>

        <button class="btn btn-success mt-3">ورود</button>
    </form>
