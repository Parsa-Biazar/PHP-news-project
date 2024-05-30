<?php
$q = "SELECT * FROM `posts` ORDER BY is_pinned DESC, date DESC";
$result = $connection -> query($q);

if($result){
    $first = $result-> fetch_assoc();
}
?>

<!--اولین پست-->

<div class="card mb-4">
    <a href="#!"><img src="<?= $admin_url . $first ['image'] ?>" alt="پیش نمایش"></a>
    <div class="card-body">
        <div class="small text-muted"><?= $first ['date'] ?></div>
        <h2 class="card-title"><?= $first ['title'] ?></h2>
        <p class="card-text"><?= mb_substr($first ['text_body'],0,60) ?></p>
        <a class="btn btn-primary" href="?page=post_view&id=<?= $first['id'] ?>">ادامه مطلب →</a>
    </div>
</div>
<!-- Nested row for non-featured blog posts-->
<div class="row">
    <?php
    if ($result){
        while($row = $result -> fetch_assoc()){

            ?>
            <div class="col-lg-6">

                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="<?= $admin_url . $row ['image'] ?>" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?= $row['date'] ?></div>
                        <h2 class="card-title h4"><?= $row  ['title'] ?></h2>
                        <p class="card-text"><?= mb_substr($row ['text_body'],0,60) ?></p>
                        <a class="btn btn-primary" href="?page=post_view&id=<?= $row['id'] ?>">ادامه مطلب →</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

<!-- Pagination-->
<nav aria-label="Pagination">
    <hr class="my-0" />
    <ul class="pagination justify-content-center my-4">
        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
        <li class="page-item"><a class="page-link" href="#!">2</a></li>
        <li class="page-item"><a class="page-link" href="#!">3</a></li>
        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
        <li class="page-item"><a class="page-link" href="#!">15</a></li>
        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
    </ul>
</nav
