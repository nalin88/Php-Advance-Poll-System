<?php
require '../core/base.php';
ob_start();
session_start();

session_unset();
session_destroy();
header("Location: index.php?msg=You are not logged in!");
exit();
?>