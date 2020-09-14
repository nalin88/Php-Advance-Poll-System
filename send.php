<?php
require 'core/base.php';

$vote_option = $_POST['vote_option'];
$poll_id = $_POST['poll_id'];


if(isset($vote_option) && isset($poll_id) && !empty($vote_option) && !empty($poll_id)){
    $datas = $database->select("vote_ip", [ "ip" ], [ "poll_id" => $poll_id ]);
    foreach($datas as $data){
       if($data['ip'] == get_ip_address()){
           header("Location: poll.php?error=You can't vote multiple times 😢");
           exit();
        }
    }
    //query info from database
    $info = $database->get("question", [ "poll", "description", "options", "vote", "time"], [ "id" => $poll_id ]);
    $vote = unserialize($info['vote']);
}else{
    header("Location: poll.php?error=Something went wrong. Inform Our Developer 😢");
    exit();
}

if(empty($info)){
    header("Location: poll.php?error=Poll Not Exists. You have to create one");
    exit();
}else{
    $options = unserialize($info['options']);
    for($i = 0; $i < sizeof($options); $i++){
        if($options[$i] == $vote_option){
            $vote[$i] = $vote[$i] + 1;
        break;
        }
    }
    $database->update("question", [ "vote" => $vote ], [ "id" => $poll_id ]);
    $database->insert("vote_ip", [ "poll_id" => $poll_id, "ip" => get_ip_address() ]);
    
if(!empty($poll_id)){
    header("Location: result.php?id=$poll_id");
}
}
?>
 