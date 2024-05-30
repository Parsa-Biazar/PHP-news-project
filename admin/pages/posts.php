<?php

$query = "select p.id, p.title, p.date, p.author, p.text_body, p.is_deleted, p.image, p.is_pinned, c.title as 'category_title' from posts as p join categories as c on p.category_id = c.id";
$result = $connection->query($query);

?>


<h1 class="mt-4">در صفحه اخبار هستید</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">اخبار</li>
</ol>

<a class="btn btn-success mb-5" href="<?=$admin_url?>?page=post_add">
    ثبت خبر جدید
</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
            لیست اخبار ثبت شده
    </div>
    <div class="card-body">
        <?php include "general/show_message.php" ?>


<!--        <div class="alert alert-danger" id="delete-confirm" style="display: none">-->
<!--            <div class="d-flex justify-content-between">-->
<!--                <div>-->
<!--                    <span>آیا از حذف </span>-->
<!--                    <mark id="delete-title"></mark>-->
<!--                    <span>مطمئن هستید؟</span>-->
<!--                </div>-->
<!--                <div class="d-flex">-->
<!--                    <form action="../actions/post_actions.php" method="post">-->
<!--                        <input type="hidden" id="delete_post_id" name="delete_post_id" value="">-->
<!--                        <input type="hidden" name="type" value="post_delete">-->
<!--                        <button class="btn btn-danger mx-1">بله</button>-->
<!--                    </form>-->
<!--                    <button class="btn btn-warning" id="close-alert" >خیر</button>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->



        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>متن خبر</th>
                <th>تاریخ ثبت</th>
                <th>تصویر</th>
                <th>نویسنده</th>
                <th>دسته بندی</th>
                <th>وضعیت</th>
                <th>پین شده</th>
                <th>ویرایش</th>
            </tr>
            </thead>
            <tbody>

            <?php
//            print_r($row);
            $id = 0 ;

            while ($row=$result->fetch_object()){
                $id++;

                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $row ->title ?></td>
                        <td><?= $row -> text_body ?></td>
                        <td><?= $row -> date ?></td>
                        <td><img src="<?= $admin_url . $row -> image ?>" alt="پیش نمایش"></td>
                        <td><?= $row -> author ?></td>
                        <td><?= $row -> category_title ?></td>
                        <td><?= showIsDeleted($row -> is_deleted) ?></td>
                        <td><?= showIsPinned($row -> is_pinned) ?></td>
                        <td>
<!--                            --><?php //die(print_r($row)); ?>
                            <a href="?page=post_edit&id=<?= $row -> id ?>" class="btn btn-info">
                                <i class="fa fa-edit text-white"></i>
                            </a>
                            <?php
//                            die(print_r($row));
                            ?>
                            <button class="btn btn-danger delete-item" data-toggle="modal" data-target="#deleteModal" code="<?= $row->id ?>" text="<?= $row->title ?>">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>



                <?php


            }
            ?>


            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف خبر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <span>آیا از حذف </span>
                    <mark id="delete-title"></mark>
                    <span>مطمئن هستید؟</span>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex">
                    <form action="actions/post_actions.php" method="post">
                        <input type="hidden" id="delete_item_id" name="delete_item_id" value="">
                        <input type="hidden" name="type" value="post_delete">
                        <button type="submit" class="btn btn-danger mx-1">حذف کن</button>
                    </form>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">انصراف</button>
                </div>
            </div>
        </div>
    </div>
</div>