<?php
require 'core/base.php';

$target_file = '';

if (isset($_POST['poll']) && !empty($_POST['poll'])) {
    $poll = $_POST['poll'];
    //poll image upload to server
    if(isset($_FILES["pollfile"]) && !empty($_FILES["pollfile"]["tmp_name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pollfile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pollfile"]["tmp_name"]);
    if($check !== false || $_FILES["fileToUpload"]["size"] < 100000) {
        move_uploaded_file($_FILES["pollfile"]["tmp_name"], $target_file);
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image or maybe your file size is too large";
    }
}
}else{
    header("Location: poll.php?error=Poll question field is empty");
    exit();
}

if(isset($_POST['ip']) && $_POST['ip']==='accepted'){
    $ip = 'yes';
}else{
    $ip = 'no';
}

if(isset($_POST['private']) && $_POST['private']==='accepted'){
    $private = 'yes';
}else{
    $private = 'no';
}

if (isset($_POST['message'])){
    $msg = $_POST['message'];
}
$options = $_POST['options'];
if(count(array_filter($options)) < 2 ){
    header("Location: poll.php?error=you must have to fill two options 😢");
    exit();
}
$vote = array(); 
for ($i = 0; $i < count(array_filter($options)); $i++)
{
    array_push($vote, 0);
}

//check option images if user uploaded
if(isset($_FILES['opttionfile'])){
    $optionimg = array();
    foreach($_FILES['opttionfile']['tmp_name'] as $key => $tmp_name)
    {
        $file_name = $key.$_FILES['opttionfile']['name'][$key];
        $opt_dir = "uploads/".time().$file_name;
        // $file_size =$_FILES['documents']['size'][$key];
        $file_tmp =$_FILES['opttionfile']['tmp_name'][$key];
        // $file_type=$_FILES['documents']['type'][$key];  
        move_uploaded_file($file_tmp,$opt_dir);
        array_push($optionimg, $opt_dir);
    }
}


// echo $ip;

// echo get_ip_address();

$database->insert("question", [ "poll" => $poll, "img" => $target_file, "description" => $msg, "options" => array_filter($options), "options_img" => $optionimg, "vote" => $vote, "time" => time() ]);
$poll_id = $database->id();

$database->insert("setting", [ "poll_id" => $poll_id, "ip" => $ip, "private" => $private ]);

if(!empty($poll_id)){
    header("Location: vote.php?id=$poll_id");
}
?>