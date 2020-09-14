<?php
require '../core/base.php';
ob_start();
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: index.php?msg=You are not logged in!");
    exit();
}else{
    $poll_id = $_POST['poll_id'];
    $vote = $_POST['vote'];
    $database->update("question", [ "vote" => $vote ], [ "id" => $poll_id ]);
    header("Location: poll.php?msg=vote updated successfull");
    exit();
}