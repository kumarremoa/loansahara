 <?php $this->load->view('front/header');?>
<section class="page-title" style="background-image:url("<?php echo base_url('fronts/images/background/3.jpg');?>")">
  <div class="auto-container">
    <div class="title-box">
      <h2><?php echo $title;?></h2>
      <ul>
        <li><a href="#">Home</a></li>
        <li><?php echo $title;?></li>
      </ul>
    </div>
  </div>
</section>

<!-- START CONETENT-->
<section class="services-section">
	<div class="auto-container">
		<div class="row clearfix">

              <!--Cases Detail column-->
               <?php if($this->session->flashdata('message')){
                echo $this->session->flashdata('message');
               }?>
          <form id="regForm" action="<?php echo base_url('loan-apply-customer');?>" method="post">
              <h2 class="text-center" style="margin-bottom:20px;"> Compare, check your eligibility and apply online instantly.</h2>
              <!-- One "tab" for each step in the form: -->
              <div class="tab text-center">
                <p class="col-md-6 gender">
                  <img src="fronts/images/men.png" class="img1">
                  <input class="form-control male chk"  type="radio" id="img1" name="gender" oninput="this.className = 'form-control'" value="Male" required>
                </p>

                <p class="col-md-6 gender ">
                  <img src="fronts/images/women.png" class="img2" >
                  <input class="form-control male" type="radio"  id="img2" name="gender" oninput="this.className = 'form-control'" value="Female" required>
                </p>
             
            </div>
              <div class="tab text-center">
                 <p><input class="form-control4" name="name" placeholder="Full Name" oninput="this.className ='form-control4'"></p>

                <p><input class="form-control4" name="email" placeholder="E-mail..." oninput="this.className ='form-control4'"></p>

                <p><input class="form-control4" name="mobile"  placeholder="Phone..." oninput="this.className = 'form-control4'"></p>

                

                   <p><input class="form-control4" size="16" name="date" type="date" placeholder="Apply Date"  class="form_datetime"></p>
              </div>


              <div class="tab"><h4>Country, State, City:</h4>
                 <p><textarea class="form-control4"  placeholder="Address1" oninput="this.className ='form-control4'" name="address1"></textarea></p>

                  <p><textarea class="form-control4"  placeholder="Address2" oninput="this.className ='form-control4'"  name="address2"></textarea></p>
                <p><input class="form-control4" name="country" placeholder="Country" oninput="this.className = 'form-control4'"></p>
                <p><input class="form-control4" name="state" placeholder="State" oninput="this.className = 'form-control4'"></p>
                <p><input class="form-control4" name="city" placeholder="City" oninput="this.className = 'form-control4'"></p>

              </div>

              <div class="tab"><h4>Work And Load Amount Required</h4>
                <p><select class="form-control4"><option>Salried</option><option>Self-employed</option></select></p>
                <div data-role="fieldcontain"><h4>Salary:</h4>
                <input type="range" name="salary" id="slider" value="10000" min="10000" max="1000000"  />
                </div>
                <div data-role="fieldcontain"><h4>Required Loan Amount:</h4>
                <input type="range" class="range-field" name="amount" id="slider"  min="10000"  max="100000000"  />
                </div>
              </div>

              <div class="tab">
                <h4>Loan Type</h4>
                <p class="col-md-6"><img src="fronts/images/cl.png"><input class=" loan" type="radio" name="loan"  oninput="this.className = ''" value="car"></p>

                <p class="col-md-6"><img src="fronts/images/hl.png"><input class=" loan" type="radio" name="loan" oninput="this.className = ''" value="home"></p>
                <p class="col-md-6"><img src="fronts/images/pl.png"><input class="loan" type="radio" name="loan" oninput="this.className = ''" value="money"></p>

                <p class="col-md-6"><img src="fronts/images/other.png"><input class="loan" type="radio" name="loan" oninput="this.className = ''" value="other"></p>
              </div>
              <div class="tab">
                <h4>Aadhar And Pan Card</h4>
                <p><input class="form-control4" name="pancard" placeholder="Valid Pancard No" oninput="this.className = 'form-control4'"></p>
                <p><input class="form-control4" name="aadhar" placeholder="Valid Aadhar No" oninput="this.className = 'form-control4'"></p>
                <p>
                  <label>Term And Condition</label>
                  <input type="checkbox" class="form-control4" name="privacy" placeholder="" oninput="this.className = 'form-control4'"></p>
                <!-- <p class="col-md-6">
                  <input class="form-control loan" type="text" name="Cibil_record" oninput="this.className = ''">
                </p> -->
                <button type="Submit" name="submit" id="Submit">Submit</button>
              </div>

              <div style="overflow:auto;" class="row col-md-12">
                <div class="col-12 text-center">
                  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
              </div>

              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px; display:none;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
              </div>
          </form>
          <!-- /.MultiStep Form -->                              
        </div>
            
	</div>
</section>
<!-- END CONTENT-->

  <!--Info Section-->
  <section class="info-section">
    <div class="clearfix">
      <!--Info Column-->
      <div class="info-column">
        <div class="inner-box">
          <div class="info-box">
            <div class="inner"> <span class="icon flaticon-house"></span>
              <div class="title">Locate us on:</div>
              <h3>Gurgaon and Dwarka</h3>
            </div>
          </div>
        </div>
      </div>
      <!--Info Column-->
      <div class="info-column">
        <div class="inner-box">
          <div class="info-box">
            <div class="inner"> <span class="icon flaticon-phone-call"></span>
              <div class="title">Get us on:</div>
              <h3><a href="tel:+919310000440">+919310000440</a></h3>
            </div>
          </div>
        </div>
      </div>
      <!--Info Column-->
      <div class="info-column">
        <div class="inner-box">
          <div class="info-box">
            <div class="inner"> <span class="icon flaticon-email"></span>
              <div class="title">Send us on:</div>
              <h3><a href="mailto:contact@loansahara.com">contact@loansahara.com</a></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <?php $this->load->view('front/footer');?>

 <script type="text/javascript">
   $('from#frm_load').submit(function(e){
    e.preventDefault();
    var mobile = $('#mobile').val();
    $.ajax({
           type: "POST",
           url: 'order.php',
           data: {'mobile':mobile}, 
           success: function(res)
           {
            if(res=='success')
            {
              $('#empModal').modal('show');
             
            }else{
               alert('Mobile no is wrong');
            }
           }
         });
  });

 </script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Next";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>

<script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script>  




