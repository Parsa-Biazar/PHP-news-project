<?php
session_start();
require "admin/general/public_values.php";
session_unset();
session_destroy();
header("Location: ".$site_url."?page=login");
