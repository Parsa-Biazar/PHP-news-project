<?php
require "../general/public_values.php";
require "../general/public_functions.php";
require "../general/database.php";
session_start();
$error_message='';
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$message='';
$validation_result = makeValidation([
    'user_name' => $user_name,
    'password' => $password,
]);

if ($validation_result['has_error']){
//     <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    نام کاربری و رمز نداده / امنیت درجه اول
    $status = 'danger';
//    die(print_r($validation_result));
    $message=$validation_result['messages'];

    setcookie('user_name', $user_name, time() + (5), "/");
    setcookie('global_message', $message, time() + (5), "/");
    setcookie('global_status', $status, time() + (5), "/");
//    die(print_r($validation_result));

    header("Location: " . $site_url . "?page=login");

}else{
    // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    نام کاربری و رمز داده حالا میریم چک کنیم تو سرور این **ایدی** هست یا نه / امنیت درجه دوم

    $q = "SELECT * from users WHERE user_name = '$user_name'";
    $result = $connection ->query ($q);
    $r = $result ->fetch_assoc();
    if ($r){
        // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    این **ایدی** وجود داشته حالا میریم ببینیم پسورد درسته ؟ / امنیت درجه سوم
        $password=$connection->real_escape_string($password);
        $password = sha1(md5(sha1($password)));
        $q = "SELECT * from users WHERE user_name = '$user_name' and password = '$password'";
        $result = $connection ->query ($q);
        $r = $result ->fetch_assoc();
        $_SESSION["user_id"]= $r['ID'];
        $_SESSION["full_name"]= $r['full_name'];
        if ($r['is_admin']==1){
            // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    این **ایدی** و **پسورد** درسته  / امنیت درجه چهارم/ ادمین هم هست


            $_SESSION["role"]= 'admin';

            header("Location: ".$admin_url);

        }elseif ($r['is_admin']==0){
            // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    این **ایدی** و **پسورد** درسته  / امنیت درجه چهارم/ ادمین نیست!!عضو عادی است 3>

            $_SESSION["role"]= 'user';

            header("Location: ".$site_url);
        }
        else {
            // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    این **ایدی** وجود داشته ولی **پسورد** اشتباهه / امنیت درجه چهارم


            $status = 'danger';
            $message = 'پسورد وارد شده صحیح نمیباشد';

            setcookie('user_name', $user_name, time() + (5), "/");
            setcookie('global_message', $message, time() + (5), "/");
            setcookie('global_status', $status, time() + (5), "/");

            header("Location: " . $site_url . "?page=login");
        }
    }else{
        // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<    نام کاربری یا این ایدی یا اشتباه وارد شده یا وجود نداره / امنیت درجه دوم

        $status = 'danger';
        $message ='کاربری با این نام کاربری ثبت نشده است';

        setcookie('user_name', $user_name, time() + (5), "/");
        setcookie('global_message', $message, time() + (5), "/");
        setcookie('global_status', $status, time() + (5), "/");

        header("Location: " . $site_url . "?page=login");

    }
}