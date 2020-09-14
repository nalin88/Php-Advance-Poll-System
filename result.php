<?php
require 'core/base.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
  $poll_id = $_GET['id'];
  // echo $poll_id;
}else{
  header("Location: poll.php?error=Poll Not Exists. You have to create one");
  exit();
}

$info = $database->get("question", [ "poll", "description", "options", "vote", "time"], [ "id" => $poll_id ]);
if(empty($info)){
  header("Location: poll.php?error=Poll Not Exists. You have to create one");
  exit();
}else{
  $vote = unserialize($info['vote']);
  $options = unserialize($info['options']);
}
// print_r($vote);
// print_r($options);
// $encrypted = @bin2hex(openssl_encrypt($poll_id,'AES-128-CBC', $key));
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
        <h1 class="font-alt text-center">Pie Result Graph 😊</h1><br>
          <div class="card border-primary">
    <div class="card-body">
    <!-- <h3 class="font-alt text-center text-dark"><?php echo $info['poll']; ?></h3> -->
   
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php for($i = 0; $i < sizeof($options); $i++){
              echo "['$options[$i]',     $vote[$i]],";
          } ?>
        ]);

        var options = {
          title: '<?php echo $info['poll']; ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart" style="width: 460px; height: 300px;"></div>
 
    <div class="row">
<div class="col"><a href="<?php echo full_url( $_SERVER ); ?>" class="btn btn-danger">&nbsp;&nbsp;&nbsp;&nbsp;Refresh <i class="fas fa-sync-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
</form>
<div class="col"><a href="vote.php?id=<?php echo $poll_id; ?>" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;Vote <i class="fas fa-poll-h"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
</div>
    
    </div>
    </div>


        </div> <!-- home-text-center -->
      </div> <div class="col-md-12 col-lg-6 col-xl-6 home-right m-50px-t md-m-0px-t">
        <div class="home-right-inner">
        <h1 class="font-alt text-center">Bar Result Chart<i class="fas fa-poll-h"></i></h1><br>
          <div class="card border-danger">
          <div class="card-body">
          <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Vote Percentage'],
          <?php for($i = 0; $i < sizeof($options); $i++){
              echo "['$options[$i]',     $vote[$i]],";
          } ?>
         
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 350,
          legend: { position: 'none' },
          chart: { title: 'Bar Chart Of Total Vote',
                   subtitle: '<?php echo $info['poll']; ?>' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
    <div id="top_x_div" style="width: 460px; height: 300px;"></div>


    <!-- <i class="fas fa-copy"></i> -->
          </div>
          </div>
        </div>
      </div><!-- col -->
    </div>


    <div class="card border-warning">
              <div class="card-body">
              <h4 class=" text-center text-dark">Share This Poll Result <i class="fas fa-poll-h"></i></h4>
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
              </div><br>
  </div><!-- container -->
</section>
<!-- / -->

<?php
include_once('assets/footer.php');
?>