<?php
if (isset($_COOKIE['global_status'])){
    ?>
    <div class="alert alert-<?= $_COOKIE['global_status'] ?>" id="global-message">
        <?= $_COOKIE['global_message'] ?>
    </div>
    <?php
}