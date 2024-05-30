<?php
require "../general/public_values.php";
require "../general/public_functions.php";
require "../general/database.php";

if (count($_POST)>0) {

    if (($_POST['type']) == 'post_add' ){



        $title = $_POST['title'];
        $post_body = $_POST['post_body'];
        $date = $_POST['date'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $pinned = isset($_POST['pinned']) ? 1 : 0;
//    die(uploadFile($_FILES));

//print_r($_POST);
        $validation_result = makeValidation([
            'title' => $title,
            'post_body' => $post_body,
            'date' => $date,
            'author' => $author,
            'category' => $category,
            'image' => $_FILES,
        ]);

        $status = 'success';
        $message = '';
//    print_r($result)
        if (!($validation_result['messages'])) {
            $image = uploadFile($_FILES);
            $q = "INSERT INTO `posts`(`title`, `text_body`, `date`, `author`, `category`, `is_pinned`, `image`) VALUES ('$title','$post_body','$date','$author','$category',$pinned,'$image')";
//        die(print_r($q));
            $result_q = $connection->query($q);
//        die(print_r($result_q));
            if ($result_q) {
                $message = 'با موفقیت ثبت شد.';
            } else {
//        $has_error= true;
                $status = 'danger';
                $message = 'خطایی به وجود آمد';
            }
        } else {
            /// khataye etebar sanji
//    $has_error= true;
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

        header("Location: " . $admin_url . "?page=post_add");
//die($message);
    }

//    POST EDIT   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    elseif (($_POST['type'])== 'post_edit'){
        $post_id = $_POST['post_id'];
        $title = $_POST['title'];
        $post_body = $_POST['post_body'];
        $date = $_POST['date'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $pinned = isset($_POST['pinned']) ? 1 : 0;
//    die(uploadFile($_FILES));

//print_r($_POST);
        $validation_result = makeValidation([
            'title' => $title,
            'post_body' => $post_body,
            'date' => $date,
            'author' => $author,
            'category' => $category,
//            'image' => $_FILES,  ******************
        ]);

        $status = 'success';
        $message = '';
//    print_r($result)
        if (!($validation_result['messages'])) {
            if ($_FILES['image']['error']){
                $q = "UPDATE `posts` SET `title`='$title', `text_body`='$post_body', `date`='$date', `author`='$author', `category`='$category', `is_pinned`=$pinned WHERE ID=$post_id";
            }else{
                $image = uploadFile($_FILES);
                $q = "UPDATE `posts` SET `title`='$title', `text_body`='$post_body', `date`='$date', `author`='$author', `category`='$category', `is_pinned`=$pinned, `image`='$image' WHERE ID=$post_id";

            }
//        die(print_r($q));
            $result_q = $connection->query($q);
//        die(print_r($result_q));
            if ($result_q) {
                $message = 'با موفقیت بروز شد.';
            } else {
//        $has_error= true;
                $status = 'danger';
                $message = 'خطایی به وجود آمد';
            }
        } else {
            /// khataye etebar sanji
//    $has_error= true;
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

        header("Location: " . $admin_url . "?page=post_edit&id=$post_id");
//die($message);
    }elseif ($_POST['type'] == 'post_delete'){
//die(print_r($_POST));
        $post_id = $_POST['delete_item_id'];
//die(print_r($_POST));
        $status = 'success';
        $message = '';

        $query = "DELETE from `posts` WHERE `id` = '$post_id'";

//        die(print_r($post_id));
//        die($query);
        $query_result = $connection->query($query);
        if ($query_result){
            $message = 'با موفقیت حذف شد';
        } else {
            $status = 'danger';
            $message = 'خطایی به وجود آمد';
        }

        setcookie('global_message',$message,time()+(5), "/");
        setcookie('global_status',$status,time()+(5), "/");

        header("Location: ".$admin_url."?page=posts");

    }

}