<?php
/*
Programmed By Nalin Nishant
Contact him on instagram - https://instagram.com/its._nalin_
*/
require  'repo/Medoo.php';
require  'function.php';

use Medoo\Medoo;

$database = new Medoo([
	// required - Edit this field with your site database details
	'database_type' => 'mysql',
	'database_name' => 'poll',
	'server' => 'localhost',
	'username' => 'root',
    'password' => '', 
]);

//Enter your desired admin login and password
$email = 'admin@email.com';
$pass = 'admin';

//Automattic creating table if it not exist in database
$database->create("question", [
    "id" => ["INT", "NOT NULL", "AUTO_INCREMENT", "PRIMARY KEY"],
    "poll" => ["VARCHAR(1000)", "NOT NULL"],
    "img" => ["VARCHAR(1000)"],
    "description" => ["VARCHAR(10000)"],
    "options" => ["VARCHAR(1000)", "NOT NULL"],
    "options_img" => ["VARCHAR(1000)"],
    "vote" => ["VARCHAR(1000)"],
    "time" => ["VARCHAR(1000)", "NOT NULL"],
]);

//create setting database to validate for each options
$database->create("setting", [
    "id" => ["INT", "NOT NULL", "AUTO_INCREMENT", "PRIMARY KEY"],
    "poll_id" => ["VARCHAR(1000)", "NOT NULL"],
    "ip" => ["VARCHAR(10000)"],
    "private" => ["VARCHAR(1000)", "NOT NULL"],
]);

//create to save all voters ip 
$database->create("vote_ip", [
    "id" => ["INT", "NOT NULL", "AUTO_INCREMENT", "PRIMARY KEY"],
    "poll_id" => ["VARCHAR(1000)", "NOT NULL"],
    "ip" => ["VARCHAR(10000)"],
]);

//prevent any type of bruteforce type of hacking
$key = "Ha4krNalin";
date_default_timezone_set("Asia/Calcutta");
?>
