<?php
function showIsPinned ($number){
    return($number==0)?
        "<span class='text-danger'> <i class='fa fa-toggle-on'></i> </span>"
        :
        "<span class='text-success'> <i class='fa fa-toggle-off'></i> </span>"
        ;
}
function showIsDeleted ($number){
    return($number==0)?
        "<span class='text-success'> <i class='fa fa-check'></i> </span>"
        :
        "<span class='text-danger'> <i class='fa fa-remove'></i></span>"
        ;
}
function makeValidation($parameters){
    $has_error = false;
    $error_message = '';

//    print_r($parameters);
    foreach ($parameters as $key => $item) {
        if (is_array($item)){
            if ($item['image']['error']){
                $has_error = true;
                $error_message .= "<li>".makeErrorString($key)."</li>";
            }
        }else{
        if (!strlen($item)>0){
            $has_error = true;
            $error_message .= "<li>".makeErrorString($key)."</li>";
        }}
    }

    return [
        'has_error' => $has_error,
        'messages' => $error_message,
    ];

}
//function makeErrorString($item){
//    switch ($item){
//        case 'title': $text = 'لطفا عنوان را وارد نمایید';break;
//        case 'post_body': $text = 'لطفا متن پست را وارد نمایید';break;
//        case 'date': $text = 'لطفا تاریخ را وارد نمایید';break;
//        case 'author': $text = 'لطفا نویسنده را وارد نمایید';break;
//        case 'category': $text = 'لطفا موضوع را وارد نمایید';break;
//        default: $text = 'نامشخص'
//}
//    return $text;
//}

function makeErrorString($item){
    switch ($item){
        case 'title': $text = 'عنوان را وارد کنید'; break;
        case 'user_name': $text = 'نام کاربری را وارد کنید'; break;
        case 'password': $text = 'پسورد را وارد کنید'; break;
        case 'post_body': $text = 'متن پست را وارد کنید'; break;
        case 'date': $text = 'تاریخ را وارد کنید'; break;
        case 'author': $text = 'نویسنده را وارد کنید'; break;
        case 'category': $text = 'دسته بندی را وارد کنید'; break;
        case 'image': $text = 'تصویر را ارسال کنید'; break;
        case 'comment': $text = 'متن نظر خود را وارد کنید'; break;
        default: $text = 'نامشخص';
    }
    return $text;
}

function uploadFile($image) {
    $target = 'upload/';
    $file_name = $image['image']['name'];
    $f = explode('.',$file_name);
    $f['0'] = 'post-'.date('YmdHis');
    $file_name=implode('.',$f);
    $final_target = $target.$file_name;
    move_uploaded_file($image['image']['tmp_name'],'../'.$final_target);
    return $final_target;
}


