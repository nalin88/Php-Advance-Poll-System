<?php
require '../core/base.php';
ob_start();
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: index.php?msg=You are not logged in!");
    exit();
}else{
    if(isset($_GET['id']) && !empty($_GET['id'])){
    $poll = $_GET['id'];
    // $database->delete("question", [cd
    //     "AND" => [
    //         "id" => $poll_id,
    //     ]
    // ]);
    $database->delete("question", [
        "id" => $poll
    ]);
    // print_r($database);
    header("Location: poll.php?msg=poll deleted successfull");
    exit();
    }else{
        header("Location: poll.php?msg=restricted access");
    exit();
    }
}