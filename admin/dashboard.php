<?php
require '../core/base.php';
ob_start();
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: index.php?msg=You are not logged in!");
    exit();
}

$count = count($database->select("question", [ "poll" ]));
$voted = $database->select("question", [ "vote" ]);
$vote_count = 0;
for($i = 0; $i < count($voted); $i++){
    $temp = unserialize($voted[$i]['vote']);
    $vote_count = $vote_count + array_sum($temp);
}
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
  <body>
  <section class="hero section is-hero is-bold is-primary is-small">
                    <div class="hero-body">
                        <div class="container">
                        <div class="columns is-vcentered">
                <div class="column is-6 is-5-fullhd is-offset-1-fullhd">
                    <div class="section-header">
                        <h1 class="title is-4 is-spaced">
                                Hello, Admin. 🥰
                            </h1>
                            <h2 class="subtitle">
                            Congratulations on being admin of This Poll Website!
                             The entire users welcomes you and we hope to have a long and successful journey together.
                            </h2>
                            </div>
                            </div>
                            <div class="column is-6">
                        <figure class="image is-3by1">
                                <img src="../assets/img/welcome.gif" alt="watch tutorial on youtube">
                              </figure>
                        <!-- <p> <small>Don't Know How To Use ? Watch This Video Now...!</small> </p> -->
                    </div>
                            </div>
                        </div>
                    </div>
                </section><br>
                

                <div class="container is-fluid">
                <div class="box">
                <center>
                <a href="poll.php" class="button is-success is-rounded">All Polls &nbsp;&nbsp;<i class="fas fa-poll"></i></a>
                <a href="logout.php" class="button is-danger is-rounded">Logout &nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i></a>
                </center>
                </div>
                <br>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box notification is-warning">
                                <p class="title"><?php echo $count; ?></p>
                                <p class="subtitle">Poll Created</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box notification is-danger">
                                <p class="title"><?php echo $vote_count; ?></p>
                                <p class="subtitle">Total Vote Count</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box notification is-info">
                                <p class="title"><?php echo get_ip_address(); ?></p>
                                <p class="subtitle">Your IP</p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box notification is-success">
                                <p class="title"><?php echo $date = date('h:i a', time()); ?></p>
                                <p class="subtitle">Time</p>
                            </article>
                        </div>
                    </div>
                </section>
                </div>


  </body>
</html>
