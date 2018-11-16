<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
    <div class="modal-content animate">
      <div class="bs-example">
        <div class="container">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#logins">Login</a></li>
            <li><a data-toggle="tab" href="#ragisters">Register</a></li>
          </ul>
        </div>
        <div class="row">
            <ul class="nav nav-tabs socialfb">
            <li"><a href="<?php echo $login_url;?>"><img src="fronts/images/facebook.png"></a></li>
            <li><a href="<?php echo @$link;?>"><img src="fronts/images/google.png"></a></li>
          </ul>
          </div>
      
        <div class="tab-content">
        <div id="logins" class="tab-pane fade in active">
          <div class="welcome">
          <h3>Login</h3>
          <p>Please enter your mobile and password</p>
        </div>
        <div class="image-container">
          <img src="<?php echo base_url();?>fronts/images/avatar-05.png">
        </div>
          <form class="title" action="<?php echo base_url('customer-login')?>" method="post">
          <label for="uname"><h3>Mobile</h3></label>
          <input class="input100" id="log_mobile" type="text" placeholder="Enter Mobile No" name="mobile" required maxlength="10">
          <br>

          <label for="psw"><h3>Password</h3></label>
          <input class="input100" type="password" placeholder="Enter Password" name="password" id="myInput" required>
          <span class="eye" data-symbol="f070" onclick="showPassword();"></span><br>
          <div class="forgot">
            <a href="#" data-toggle="modal" data-target="#myModal">Forgot password?</a>
          </div>
          <div class="buton">
          <button class="submit" type="submit">Login</button>
          <button class="cancel" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          </div>
          </form>
        </div>
          <div id="ragisters" class="tab-pane fade">
            <div class="welcome">
            <h3>Register</h3>
            <p>Please enter your mobile and email</p>
          </div>
          <div class="image-container">
            <img src="<?php echo base_url();?>fronts/images/avatar-05.png">
          </div>
          <form action="<?php echo base_url('register')?>" method="post">
            <label for="uname"><b>Mobile</b></label>
            <input type="text" placeholder="Enter Mobile" name="mobile" id="reg_mobile" required><br>

            <label for="psw"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" id="email" name="email" required><br>      
            <div class="buton">
            <button class="submit" type="submit">Register</button>
            <button class="cancel" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
  <!--Main Footer-->
  <footer class="main-footer"> 
    <!--Widgets Section-->
    <div class="widgets-section">
      <div class="auto-container">
        <div class="row clearfix"> 
          
          <!--Big Column-->
          <div class="big-column col-md-6 col-sm-12 col-xs-12">
            <div class="row clearfix"> 
              
              <!--Footer Column-->
              <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                <div class="footer-widget logo-widget">
                  <div class="footer-logo"><a href="index.php"><img src="<?php echo base_url();?>fronts/images/footer-logo.png" alt=""></a></div>
                  <div class="widget-content">
                    <div class="text">Loan Sahara, is a trade name of MK Financial Services Pvt. Ltd, is dedicatedly engaged to availing business and empowerment loans that are blessed with fast credit facilities.</div>
                  </div>
                </div>
              </div>
              
              <!--Footer Column-->
              <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                <div class="footer-widget links-widget">
                  <h2>Our Loan Services</h2>
                  <ul class="services-list">
                    <li><a href="business-loan.php">Business Loan</a></li>
                    <li><a href="shop-loan-gurgaon.php">Shop Loan</a></li>
                    <li><a href="factory-loan-gurgaon.php">Factory Loan</a></li>
                    <li><a href="hotel-loan-gurgaon.php">Hotel Loan</a></li>
                    <li><a href="others-loan.php">Other Loan</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Forget Password</h4>
                  </div>
                  <div class="modal-body">
                    <form id="form_forget" action="<?php echo base_url('forget-password'); ?>" method="POST" >
                      <form action="<?php echo base_url('forget-password')?>" method="post">
                          
                          <input type="text" placeholder="Enter Mobile" name="mobile" id="reg_mobile1" required><br>
                               
                          <div class="buton">
                          <button class="submit" type="submit">Submit</button>
                          </div>
                      </form>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
          <!--Big Column-->
          <div class="big-column col-md-6 col-sm-12 col-xs-12">
            <div class="row clearfix"> 
              
              <!--Footer Column / Tweet Widget-->
              <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                <div class="footer-widget tweets-widget">
                  <h2>Our Address</h2>
                  
                  <!--Address-->
                  <ul class="contact-info">
                    <li>
                      <div class="icon"><span class="flaticon-placeholder"></span></div>
                      <span class="title">Locate us on:</span><strong>Head Office</strong>: F-43, Palam Vihar Road, Gurgaon - 122001</li>
                    <li>
                      <div class="icon"><span class="flaticon-placeholder"></span></div>
                      <span class="title"></span><strong>Branch Office</strong>: T-6, 3rd floor, malik plaza, Near bank of baroda, KM chowk, sec-12 Dwarka. New delhi-75</li>
                    <li>
                      <div class="icon"><span class="flaticon-email"></span></div>
                      <span class="title">Send us on:</span><a href="mailto:contact@loansahara.com">contact@loansahara.com</a></li>
                    <li>
                      <div class="icon"><span class="flaticon-phone-call"></span></div>
                      <span class="title">Get us on:</span><a href="tel:+919310000440">+91 931 000 0440</a></li>
                  </ul>
                </div>
              </div>
              
              <!--Footer Column / Contact Widget-->
              <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                <div class="footer-widget contact-widget">
                  <h2>Send us a Message</h2>
                  <div class="widget-content">
                    <div class="footer-form">
                      <form method="post" action="http://loansahara.com/mail2.php" name="ppc" id="ppc_form">
                        <div class="form-group">
                          <input type="text" name="name" value="" placeholder="Name *" required>
                        </div>
                        <div class="form-group">
                          <input type="text" name="phone" placeholder="Phone No *" required>
                        </div>
                        
                        <div class="form-group" style="display:none;">
                        <input class="form-control" type="text" name="email" placeholder="Enter your email">
                        </div>
                        
                        <div class="form-group">
                          <textarea style="width: 91%" class="form-control"  id="message" name="message" rows="6" required placeholder="Your Message"></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="theme-btn btn-style-one" id="submit" name="submit" value="Submit Now">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Footer Bottom-->
    <div class="footer-bottom">
      <div class="auto-container">
        <div class="row clearfix"> 
          <!--Column-->
          <div class="column col-md-6 col-sm-12 col-xs-12">
            <div class="copyright">Copyrights &copy; 2017 Loan Sahara. All Rights Reserved</div>
          </div>
          <!--Nav Column-->
          <div class="nav-column col-md-6 col-sm-12 col-xs-12">
            <ul class="footer-nav">
              <li><a href="about.php">About us</a></li>
              <li><a href="contact.php">Contact us</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<!--End pagewrapper--> 

<!--Scroll to top-->

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-long-arrow-up"></span></div>
<script src="<?php echo base_url();?>fronts/js/jquery.js"></script> 
<script src="<?php echo base_url();?>fronts/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>fronts/js/revolution.min.js"></script> 
<script src="<?php echo base_url();?>fronts/js/jquery.fancybox.pack.js"></script> 
<script src="<?php echo base_url();?>fronts/js/jquery.fancybox-media.js"></script> 
<script src="<?php echo base_url();?>fronts/js/owl.js"></script> 
<script src="<?php echo base_url();?>fronts/js/appear.js"></script> 
<script src="<?php echo base_url();?>fronts/js/wow.js"></script> 
<script src="<?php echo base_url();?>fronts/js/jquery-ui.js"></script> 
<script src="<?php echo base_url();?>fronts/js/script.js"></script> 
<!--Graph Script--> 
<script src="<?php echo base_url();?>fronts/js/chart.js"></script> 
<script src="<?php echo base_url();?>fronts/js/graph.js"></script> 

<!--Color Switcher--> 
<script src="<?php echo base_url();?>fronts/js/color-settings.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
function showPassword() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<script>
/*  $.validator.setDefaults({
    submitHandler: function() {
      alert("submitted!");
    }
  })*/

  $(document).ready(function() {
    $("#signupForm").validate({
      rules: {
        firstname: "required",
        email: {
          required: true,
          email: true
        },
        cus_mobile:"required",
        emp_type:"required",
        salary: "required",
        amount:"required",
        loan_type:"required",
        pincode:"required"
      
        
      },
      messages: {
        firstname: "Please enter your firstname",
        cus_mobile: "Please enter mobile No 10 digit",
        emp_type: "Please select employee type",
        salary: "Please Select annual salary",
        amount:"Please enter valid loan amount",
        loan_type:"Please select loan type",
        pincode:"Please enter valid pincode",
        email: "Please enter a valid email address"
        

      }
    });


   
  });
  $(document).ready(function () {
  //called when key is pressed in textbox
  $("#cus_mobile,#reg_mobile,reg_mobile1,#log_mobile,.pincode").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
 /* $(document).ready (function(){
    $("#success-alert").hide();
 });*/



</script>
</body>
</html>