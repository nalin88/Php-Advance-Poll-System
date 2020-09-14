<?php
require 'core/base.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $poll_id = $_GET['id'];
}else{
    header("Location: poll.php?error=Poll Not Exists. You have to create one");
    exit();
}

$info = $database->get("question", [ "poll", "img", "description", "options", "options_img", "vote", "time"], [ "id" => $poll_id ]);
$opt_img = unserialize($info['options_img']);
if(empty($info)){
   header("Location: poll.php?error=Poll Not Exists. You have to create one");
    exit();
}
include_once('assets/header.php');
?>
  <!-- Main Start -->
  <main>

    <!-- Home Banner Start -->
   <section id="home" class="home-banner-01 gray-bg-g border-bottom">
      <div class="container">
        <div class="row full-screen align-items-center">
          <div class="col col-md-12 col-lg-6 col-xl-6 p-80px-tb md-p-30px-b sm-p-60px-t m-50px-t">
            <div class="home-text-center p-50px-r md-p-0px-r">
            <h1 class="font-alt text-center">Vote For This Poll 😊</h1><br>
              <div class="card border-primary">
        <div class="card-body">
        <h3 class="font-alt text-center text-dark"><?php echo $info['poll']; ?></h3>
        <p class="text-center"><?php echo to_time_ago($info['time']); ?> <i class="fas fa-stopwatch"></i></p>
        <?php if(strlen($info['img']) > 10){
        echo '<img src="'.$info['img'].'" width="40%" class="rounded img-thumbnail mx-auto d-block" alt="'.$info['poll'].'">'; }
        ?>
        <?php if(!empty($info['description'])){
            echo '<p class="text-center text-dark">Description - '.$info['description'].'</p>';
        } ?>
        <form class="contactform" action="send.php" method="post">
        <input type="hidden" name="poll_id" value="<?php echo $poll_id; ?>">
        <div class="row">
        <?php
        $start = 0;
         foreach(unserialize($info['options']) as $option){
            echo '<div class="col-6"><div class="form-check text-left">
            <input class="form-check-input" type="radio" name="vote_option" id="'.$option.'" value="'.$option.'" checked="">
            <label class="form-check-label text-dark" for="'.$option.'">
            '.$option.'
            </label>
            </div>';
          if(strlen($opt_img[$start]) > 25){
            echo '<img src="'.$opt_img[$start].'" width="30%"  for="'.$option.'" class="rounded img-thumbnail d-block" alt="'.$info['poll'].'">'; }
            echo '</div>';
          ++$start;
        }
         ?>
        </div><br>
        <div class="row">
        <div class="col"><button type="submit" value="submit" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;Vote <i class="fas fa-hand-point-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;</button></div>
  </form>
  <div class="col"><a href="result.php?id=<?php echo $poll_id; ?>" type="button" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;View Results <i class="fas fa-poll-h"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
  </div>
        
        </div>
        </div>


            </div> <!-- home-text-center -->
          </div> <div class="col-md-12 col-lg-6 col-xl-6 home-right m-50px-t md-m-0px-t">
            <div class="home-right-inner">
              <div class="card border-danger">
              <div class="card-body">
              <p class="h4 text-center text-dark">Share This Poll <i class="fas fa-poll-h"></i></p>
              <div class="card border-primary">
        <div class="card-body">
        <div id="p1"><?php echo full_url( $_SERVER ); ?></div>
        </div>
        </div>
        <center><input onclick="copyToClipboard('#p1')" type="button" id='btnAddProfile' value="Copy To Clipboard 📄" class="btn btn-warning">
        <div><hr />
    <a class="btn btn-sm btn-social btn-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo full_url( $_SERVER ); ?>" target="_blank" title="Share this post on Facebook">
        <i class="fab fa-facebook-square"></i> Share
    </a>
      <a class="btn btn-sm btn-social btn-tw" href="https://twitter.com/intent/tweet?text=Live_Poll&amp;url=<?php echo full_url( $_SERVER ); ?>" target="_blank" title="Share this post on Twitter">
        <i class="fab fa-twitter"></i> Tweet
    </a>
    </a>
      <a class="btn btn-sm btn-social btn-wp" href="https://api.whatsapp.com/send?text=<?php echo full_url( $_SERVER ); ?>" target="_blank" title="Share this post on Whatsapp">
        <i class="fab fa-whatsapp"></i> WhatsApp
    </a>
    <a class="btn btn-sm btn-social btn-in" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo full_url( $_SERVER ); ?>&amp;title=LIVE_POLL" target="_blank" title="Share this post on LinkedIn">
      <i class="fab fa-linkedin-in" data-fa-transform="grow-2"></i>
    </a>
    <a class="btn btn-sm btn-social btn-rd" href="https://www.reddit.com/submit?url=<?php echo full_url( $_SERVER ); ?>" target="_blank" title="Share this post on Reddit">
      <i class="fab fa-reddit-alien" data-fa-transform="grow-4"></i>
    </a>
  </div></center>
        <!-- <i class="fas fa-copy"></i> -->
              </div>
              </div>
            </div>
          </div><!-- col -->
        </div>
      </div><!-- container -->
    </section>
    <!-- / -->

<?php
include_once('assets/footer.php');
?>