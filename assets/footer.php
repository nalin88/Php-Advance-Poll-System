
  <!-- Footer Start -->
  <footer class="footer-light">
    <section class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-5 sm-m-15px-tb md-m-30px-b">
            <h4 class="font-alt">About Us</h4>
            <p class="footer-text">This site is anonymous opinion polls that help you and your participants to 
            easily choose the best option on any topic. They are very useful when only the majority opinion is 
            important and not the opinion of each individual participant.</p>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a class="google" href="#"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div> <!-- col -->

          <!-- <div class="col-6 col-md-4 col-lg-2 sm-m-15px-tb">
            <h4 class="font-alt">Product</h4>
            
            <ul class="fot-link">
              <li><a href="#">Features</a></li>
              <li><a href="#">Carrers</a></li>
              <li><a href="#">Awards</a></li>
              <li><a href="#">Users Program</a></li>
              <li><a href="#">Locations</a></li>
            </ul>
          </div> -->

          <div class="col-6 col-md-4 col-lg-2 sm-m-15px-tb">
            <h4 class="font-alt">Company</h4>
            <ul class="fot-link">
                <li><a href="index.php">Home</a></li>
                <li><a href="privacy.php">Privacy</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="poll.php">Create Poll</a></li>
                <!-- <li><a href="#">Contact</a></li> -->
              </ul>
          </div>

          <div class="col-md-4 col-lg-3 sm-m-15px-tb">
            <h4 class="font-alt">Get in touch</h4>
            <p>you can get in touch with us through social media platform.</p>
            <p><span>E-Mail:</span> info@example.com </p>
            <p><span>Phone:</span> (123) 123-456</p>
          </div> <!-- col -->

        </div>
        
        <div class="footer-copy">
          <div class="row">
            <div class="col-12">
              <p>All © Copyright Is Reserved Of This site . All Rights Reserved.</p>
            </div><!-- col -->
          </div> <!-- row -->
        </div> <!-- footer-copy -->

      </div> <!-- container -->   
    </section>
  </footer>
  <!-- / -->

  <!-- jQuery -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.0.min.js"></script>

  <!-- Plugins -->
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>

  <!-- custom -->
  <script src="assets/js/custom.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<div class="row"><div class="col-9"><input class="validate form-control" autocomplete="nalinnisahn" type="textbox" id="textbox1" name="options[]" placeholder="Poll Option ' + counter + '">' +
  '<span class="input-focus-effect"></span><br></div><div class="col"><div class="choose_file file btn btn-warning"><i class="fas fa-camera"></i><input type="file" name="opttionfile[]"/></div></div></div>');

	newTextBoxDiv.appendTo("#TextBoxesGroup");


	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

	counter--;

        $("#TextBoxDiv" + counter).remove();

     });

     $("#getButtonValue").click(function () {

	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
</script>
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  $("#btnAddProfile").prop('value', 'Copied!');
}
</script>
</body>
<!-- Body End -->

</html>