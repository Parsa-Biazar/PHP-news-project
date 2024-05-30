<?php

$host = "localhost";
$db = "brand_new_server";
$user = "root";
$password = "";
$connection = new mysqli($host, $user, $password, $db);

if ($connection->errno) {
    echo 'ما وصل نیستیم .';
} else {
//   echo 'we connecected';
}

?>