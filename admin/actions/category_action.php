<?php
require "../general/public_values.php";
require "../general/public_functions.php";
require "../general/database.php";

if (count($_POST)>0) {

///////////////////////////////////////////////////////////////////////////////////    post_add
    if (($_POST['type']) == 'category_add') {


        $title = $_POST['title'];
        $color = $_POST['color'];

        $validation_result = makeValidation([
            'title' => $title,
        ]);
        $status = 'success';
        $message = '';
        if (!($validation_result['messages'])) {
            $q = "INSERT INTO `categories`(`title`, `color`) VALUES ('$title','$color')";
            $result_q = $connection->query($q);
            if ($result_q) {
                $message = 'با موفقیت ثبت شد.';
            } else {
                $status = 'danger';
                $message = 'خطایی به وجود آمد';
            }
        } else {
            /// khataye etebar sanji
            $status = 'danger';
            $message = $validation_result['messages'];
            setcookie('form_title', $title, time() + (5), "/");
            setcookie('form_color', $color, time() + (5), "/");
        }

        setcookie('global_message', $message, time() + (5), "/");
        setcookie('global_status', $status, time() + (5), "/");

        header("Location: " . $admin_url . "?page=category_add");
    } //    POST EDIT   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    elseif (($_POST['type']) == 'category_edit') {
//        die(print_r($_POST));
        $category_id = $_POST['category_id'];
        $title = $_POST['title'];
        $color = $_POST['color'];

        $validation_result = makeValidation([
            'title' => $title,
        ]);

        $status = 'success';
        $message = '';
        if (!($validation_result['messages'])) {

            $q = "UPDATE `categories` SET `title`='$title',`color`='$color' WHERE `id`='$category_id'";
            $result_q = $connection->query($q);
//        die($q);
            if ($result_q) {
                $message = 'با موفقیت بروز شد.';
            } else {
//        $has_error= true;
                $status = 'danger';
                $message = 'خطایی به وجود آمد';
            }}
        else{
//        etebar sanji
                $status = 'danger';
                $message = $validation_result['messages'];
                setcookie('form_title', $title, time() + (5), "/");
                setcookie('form_color', $color, time() + (5), "/");
            }
                setcookie('global_message', $message, time() + (5), "/");
                setcookie('global_status', $status, time() + (5), "/");
                header("Location: " . $admin_url . "?page=category_edit&id=$category_id");
    }elseif ($_POST['type'] == 'category_delete') {
//        die(print_r($_POST));
        $category_id = $_POST['delete_item_id'];

        $status = 'success';
        $message = '';

        $query = "DELETE from `categories` WHERE `id` = '$category_id'";

        //        die(print_r($category_id));
        $query_result = $connection->query($query);
        if ($query_result) {
            $message = 'با موفقیت حذف شد';
        } else {
            $status = 'danger';
            $message = 'خطایی به وجود آمد';
        }

        setcookie('global_message', $message, time() + (5), "/");
        setcookie('global_status', $status, time() + (5), "/");

        header("Location: " . $admin_url . "?page=categories");

    }
}
