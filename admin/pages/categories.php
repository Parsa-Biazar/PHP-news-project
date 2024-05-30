<?php

$query = "SELECT * FROM categories";
$result = $connection->query($query);

?>


<h1 class="mt-4">در صفحه دسته بندی ها هستید</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">دسته بندی ها</li>
</ol>

<a class="btn btn-success mb-5" href="<?=$admin_url?>?page=category_add">
    ثبت دسته بندی جدید
</a>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
            لیست دسته بندی های ثبت شده
    </div>
    <div class="card-body">
        <?php include "general/show_message.php" ?>
        <table id="datatablesSimple">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>رنگ</th>
                <th>ویرایش</th>
            </tr>
            </thead>
            <tbody>

            <?php
//            print_r($row);
            $id = 0 ;

            while ($row=$result->fetch_object()){
                $id++;
//print_r($row);
                ?>
                    <tr>

                        <td><?= $id ?></td>
                        <td><?= $row ->title ?></td>
                        <td><div class="show_color" style="background-color: <?= $row -> color ?> !important;"> -</div></td>
                        <td>
<!--                            --><?php //die(print_r($row)); ?>
                            <a href="?page=category_edit&id=<?= $row -> id ?>" class="btn btn-info">
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
                <h5 class="modal-title" id="exampleModalLabel">حذف دسته بندی</h5>
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
                    <form action="actions/category_action.php" method="post">
                        <input type="hidden" id="delete_item_id" name="delete_item_id" value="">
                        <input type="hidden" name="type" value="category_delete">
                        <button type="submit" class="btn btn-danger mx-1">حذف کن</button>
                    </form>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">انصراف</button>
                </div>
            </div>
        </div>
    </div>
</div>