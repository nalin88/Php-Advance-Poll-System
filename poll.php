<?php
include_once('assets/header.php');
?>
<!-- Poll form start -->
<section id="home" class="home-banner-01 gray-bg-g border-bottom">
      <div class="container">
        <div class="row full-screen align-items-center">
        <div class="col p-80px-tb  sm-p-60px-t m-50px-t">
        <?php if(isset($_GET['error']) && !empty($_GET['error'])){
            echo '<div class="alert alert-danger text-center" role="alert">'.$_GET['error'].'</div>';
        } ?>
        <h1 class="font-alt text-center">Create Your Poll 😊</h1>
        <br>
        <!-- Card start -->
        <div class="card border-primary">
        <div class="card-body">
        <!-- poll form -->
        <P class="text-dark">Complete the below field to create your poll</p>
        <form autocomplete="off" enctype="multipart/form-data" class="contactform" action="info.php" method="post">
  <div class="form-group">
    <!-- <p class="text-dark">Poll Question</p> -->
    <div class="row">
    <div class="col-9">
    <input class="validate form-control" required="" name="poll" placeholder="Poll Question (Eg. What's your fav colour?)">
    <span class="input-focus-effect"></span>
    </div>
  <div class="col">
  <div class="choose_file file btn btn-warning">
  <i class="fas fa-camera"></i>
  <input type="file" name="pollfile" id="pollfile"/>
  </div>  
  </div>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <textarea placeholder="Poll Description" name="message" class="form-control" required=""></textarea>
    <span class="input-focus-effect"></span>
  </div>
  <!-- poll option start -->




  <P class="text-dark">Add Poll Options 🤝</p>
  <div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">

  <div class="row">
  <div class="col-9">
    <input  class="validate form-control" autocomplete="nalinnishant" type='textbox' id='textbox1' name="options[]" placeholder="Poll Option 1">
    <span class="input-focus-effect"></span><br>
    </div>
  <div class="col">
  <div class="choose_file file btn btn-warning">
  <i class="fas fa-camera"></i>
<input type="file" name="opttionfile[]"/>
</div>  
  </div>
</div>

    </div>
</div>
<input type='button' value='Add Button +' class="btn btn-primary" id='addButton'>
<hr />
  <!-- poll option end -->
  <!-- extra option -->
  <div class="row">
  <div class="col-6">
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="private" value="accepted">
    <label class="form-check-label text-dark">Private (Only by direct link)</label>
  </div>
  </div>
  <div class="col-6">
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="ip" value="accepted" checked>
    <label class="form-check-label text-dark">Restrict Multiple Votes From One IP </label>
  </div>
  </div>
  </div>
  <!-- extra option end -->
  <button type="submit" value="Submit" class="btn btn-success btn-block">Create Poll</button>
</form>
<!-- poll form end -->
        </div>
        </div>
        <!-- card end -->
        </div>
        </div>
      </div>
</section>


<?php
include_once('assets/footer.php');
?>