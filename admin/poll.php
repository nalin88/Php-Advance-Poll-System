<?php
require '../core/base.php';
ob_start();
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: index.php?msg=You are not logged in!");
    exit();
}

$msg = '';
if(isset($_GET['msg']) && !empty($_GET['msg'])){
  $msg= $_GET['msg'];
}

$datas = $database->select("question", ["id", "poll", "vote"]);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body><br>
  <div class="container is-fluid">
  <?php if(!empty($msg)){
          echo '<br><div class="notification is-danger">
          '.$msg.'
        </div>';
      } ?>
<?php
$start = 0;
 foreach($datas as $data){
    echo '<div class="box notification is-warning"><p>
    <strong>'.$data['poll'].'</strong>
    </p><p><small>This Vote Number</small></p><br>
    <div class="field-body">
    <form class="contactform" action="update.php" method="post">';
    $vote = unserialize($datas[$start]['vote']);
    foreach($vote as $vot){
        echo '
        <div class="field">
        <p class="control is-expanded has-icons-left">
        <input type="hidden" name="poll_id" value="'.$data['id'].'">
          <input class="input" type="text" value="'.$vot.'" name="vote[]" placeholder="'.$vot.'">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </p>
      </div>';
    }

  echo '<div class="col"><button type="submit" value="submit" class="button is-success is-rounded">&nbsp;&nbsp;&nbsp;&nbsp;Update Vote &nbsp;&nbsp;<i class="fas fa-hand-point-right"></i>&nbsp;&nbsp;</button></div>
  </form></div><br>
    <a href="delete.php?id='.$data['id'].'" class="button is-danger is-rounded">Delete &nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
    </div>';
    ++$start;
} ?>
  </div>
  </body