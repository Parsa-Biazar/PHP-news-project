<div class="container">
    <h2>درباره ما !!!!!!!!!</h2>
</div>
<?php
$q = "SELECT * FROM `users` WHERE 1";
$result = $connection ->query($q);

?>
<!--<h1> --><?php //= sha1(md5(sha1(123456))) ?><!-- </h1>-->
<table class="table table-bordered">
    <tr>
        <th>id</th>
        <th>نام</th>
        <th>نام کاربری</th>
        <th>ایمیل</th>
        <th>استعداد</th>
    </tr>


    <?php
    if ($result){
        while ($row = $result -> fetch_assoc()){
//            print_r($row);
            ?>
            <tr>
                <td><?= $row  ['ID'] ?></td>
                <td><?= $row  ["full_name"] ?></td>
                <td><?= $row  ["user_name"] ?></td>
                <td><?= $row  ["email"] ?></td>
                <td><?= $row  ["taste"] ?></td>
            </tr>
            <?php
        }


    }
    ?>

</table>