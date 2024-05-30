<?php
session_start();
require "admin/general/public_values.php";
require "admin/general/public_functions.php";
require "admin/general/database.php";

if (count($_POST)>0){
//    die('test');
        $comment = $_POST['comment'];
        $date = date('y-m-d h:i:s');
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];

        $validation_result = makeValidation([
            'comment' => $comment,
        ]);

        $status = 'success';
        $message = '';
        if (!($validation_result['messages'])) {
            $q = "INSERT INTO `comments`(`comment`, `date`, `user_id`, `post_id`, `accepted`) VALUES ('$comment','$date','$user_id','$post_id','$accepted')";
            $result_q = $connection->query($q);
//        die(print_r($result_q));
            if ($result_q) {
                $message = 'نظر شما ثبت شد در صورت تایید ادمین به نمایش در خواهد آمد.';
            } else {
                $status = 'danger';
                $message = 'خطایی به وجود آمد';
            }
        } else {
            $status = 'danger';
            $message = $validation_result['messages'];
            setcookie('form_title', $title, time() + (5), "/");
            setcookie('form_body', $post_body, time() + (5), "/");
            setcookie('form_date', $date, time() + (5), "/");
            setcookie('form_author', $author, time() + (5), "/");
            setcookie('form_category', $category, time() + (5), "/");
            setcookie('form_pinned', $pinned, time() + (5), "/");

        }

        setcookie('global_message', $message, time() + (5), "/");
        setcookie('global_status', $status, time() + (5), "/");

        header("Location: " . $site_url . "?page=post_view&id=".$post_id);
        }