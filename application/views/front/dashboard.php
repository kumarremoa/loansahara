<?php $this->load->view('front/top');?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style type="text/css" media="screen">
ul {
list-style-type: none;
}

li {
display: inline-block;
}

input[type="checkbox"][id^="cb"] {
display: none;
}



label img {
height: 100px;
width: 100px;
transition-duration: 0.2s;
transform-origin: 50% 50%;
}

:checked + label {
border-color: #ddd;
}

:checked + label:before {
content: "✓";
background-color: grey;
transform: scale(1);
}

:checked + label img {
transform: scale(0.9);
box-shadow: 0 0 5px #333;
z-index: -1;
}
#example_filter{ margin-right: 50px !important; }
</style>

<div class="sidebar-page-container blog-page">
<div class="auto-container">
<div class="row clearfix">
<!--Content Side-->
<div class="content-side pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!--Services Single-->
<div class="services-single">
<div class="sec-title margin-bottom">
<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); } ?>
<h3>Hi <?php echo $this->session->userdata('mobile');?>, Welcome Back</h3></div>
</div>
</div>
<div class="inner-box">
<!--Cases Images-->
<div class="cases-images">
<div class="row clearfix">
<!--start Column-->
<div class="column pull-left col-md-3 col-sm-3 col-xs-12">
        <aside class="sidebar">
        <!-- Sidebar Category -->
        <div class="sidebar-widget sidebar-category1">
        <ul class="nav list">
          <li class="active"><a href="#dashboard" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/icon.png">  Dashboard</a>
        </li>
        <li><a href="#profile" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/user.png"> Profile</a>
        </li>
<!--         <li><a href="#apply" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/businessman.png"> Apply Loan</a>
        </li> -->
        <li><a href="#civil" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/success.png"> CIBIL Check</a>
        </li>
        <!-- <li><a href="#forget" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/error.png"> Forget Password</a></li>
        <li><a href="#change" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/shuffle.png"> Change Password</a></li> -->
        <li><a href="#support" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/bill.png"> Support Ticketing</a>
        </li>
        <li><a href="#previous" data-toggle="tab"><img src="<?php echo base_url();?>fronts/images/debt.png"> Previous Loan List</a>
        </li>
        </ul>
        <aside>
          <div class="profile-completion js-profile-completion">
            <div class="cd-sec-right-title font-lg">Your Profile Status</div>
            <div class="profile-content">
            <div class="progress">
            <div class="progress-bar js-progress-bar" role="progressbar" aria-valuenow="15.384615384615385" aria-valuemin="0" aria-valuemax="100" style="width:15%">15%</div>
            </div>
            <div class="procom js-procom">Complete your profile for maximum flavour!</div>
            </div>
          </div>
<!--           <div class="social-profile js-social-profile">
          <div class="cd-sec-right-title font-lg">Social Profile</div>
          <div class="social-content sign-in-box">
          <div class="fb">
          <img src="fronts/images/fb.png">Connect Facebook</div>
          <div class="gm">
          <img src="fronts/images/gm.png">Connect G+</div>
          </div>
          </div> -->
          <div class="need-help">
          <div class="cd-sec-right-title font-lg">Need help?</div>
          <div class="need-content">
          <ul>
          <li><span class="sprite-cd bbicon-call"></span>Call on : +919310000440</li>
          <li><span class="sprite-cd bbicons-email"></span>Email : support@loansahara.com</li>
          </ul>
          </div>
          </div>
          </aside>
</div>
<!-- Sidebar Brouchers -->
</div>
<!--end Column-->
<!--Cases Detail column-->
<div class="cases-detail-column col-md-9 col-sm-12 col-xs-12">
<div class="text">
<div class="tab-content">
  <div class="tab-pane active" id="dashboard">
<div class="col-lg-12">
<!-- aCCORDIAN 1-->
<div class="panel panel-default">
<div  class="panel-heading">
<h4 class="panel-title">
<img src="fronts/images/progress.png">  <a>Progress Report</a>
</h4>
</div>
<div class="panel-body">
  <div class="progress">
   <div class="progress-bar progress-bar-success" role="progressbar" style="width:40%">
    Profile Updation
   </div>
   <div class="progress-bar progress-bar-info" role="progressbar" style="width:10%">
    Cibil Check
   </div>
   <div class="progress-bar progress-bar-danger" role="progressbar" style="width:30%">
    KYC Check
   </div>
  </div>
  <div class="">
       <label>Form Apply Check:</label>
       <label>Profile Updation</label>
       <img src="fronts/images/tick.png">
       <label>Digital KYC</label>
       <img src="fronts/images/tick (1).png">
       <label>Cibil Check</label>
       <img src="fronts/images/tick (2).png">
       <label>Approved</label>  
       <img src="fronts/images/tick (3).png">
   </div>
      <!--  <div class="progress">
           <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
               <span class="sr-only">20% Complete (info)</span>
           </div>
           <span class="progress-type">Employement Information</span>
       </div> -->
       <!-- <div class="progress">
           <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
               <span class="sr-only">60% Complete (warning)</span>
           </div>
           <span class="progress-type">Digital KYC</span>
       </div>  -->
</div>
</div>
</div>
</div>
<div class="tab-pane " id="profile">
<!--   aCCORDIAN 1-->
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="panel-heading">
<h4 class="panel-title">
<img src=<?php echo base_url();?>fronts/images/man.png>  <a>About You</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse">
<div class="panel-body">
<?php foreach ($profile as $user) { ?>
<form class="form" action="<?php echo base_url('customer-about');?>" method="post">
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="first_name">
        <h5>FIRST NAME</h5>
      </label>
      <input type="text1" class="form-control1" name="name" id="name" placeholder="First name" title="enter your first name if any." value="<?php echo $user->name;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="mobile">
        <h5>MOBILE</h5>
      </label>
      <input type="text1" class="form-control1" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php echo $user->mobile;?>" readonly>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="gender">
        <h5>GENDER</h5>
      </label>
      <br>
      <label class="radio-inline">
        <input type="radio" name="gender" value="Male">Male</label>
      <label class="radio-inline">
        <input type="radio" name="gender" value="Female">Female</label>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="marital">
        <h5>MARITAL STATUS</h5>
      </label>
      <br>
      <label class="radio-inline">
        <input type="radio" name="marital" value="Married">Married</label>
      <label class="radio-inline">
        <input type="radio" name="marital" value="Unmarried">Unmarried</label>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="DOB">
        <h5>DATE OF BIRTH</h5>
      </label>
      <input type="date" class="form-control1" name="dob" placeholder="yyyy/mm/dd" value="<?php echo $user->dob;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="education">
        <h5>EDUCATIONAL QUALIFICATION</h5>
      </label>
      <select id="about_inputState" class="form-control1" name="Qualification">
        <option>Choose...</option>
        <option value="<?php echo $user->qualification;?>">
          <?php echo $user->qualification;?></option>
        <option>High School</option>
        <option>Bachelors Degree</option>
        <option>Masters Degree</option>
        <option>Doctrol Degree</option>
        <option>Diploma/IT</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="password">
        <h5>RESIDENCE STATUS</h5>
      </label>
      <select id="inputState" class="form-control1" name="nationality">
        <option>Choose...</option>
        <option value="<?php echo $user->nationality;?>">
          <?php echo $user->nationality;?></option>
        <option>Indian</option>
        <option>NRI</option>
      </select>
    </div>
  </div>
  <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
    <button class="saveNow btn btn-secondary float_left menu-login js-saveNow" divcontext="" type="submit" style="z-index: 0;">Save</button>
    <button class="btn btn-primary" type="reset" name="reset" data-action="">Reset</button>
  </div>
</form>
<?php }?>
</div>
</div>
</div>
</div>
<!--   end aCCORDIAN 1-->
<!--   aCCORDIAN 2 -->
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" class="panel-heading">
<h4 class="panel-title">
<img src="fronts/images/phone (1).png">
<a>Contact Information</a>
</h4>
</div>
<div id="collapsetwo" class="panel-collapse collapse">
<div class="panel-body">
<form class="form" action="<?php echo base_url('customer-loan-apply');?>" method="post" id="contact_registrationForm">
  <?php foreach ($profile as $user) { ?>
  
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="email">
        <h5>PER-ADDRESS</h5>
      </label>
      <input type="text1" class="form-control1" name="address2" id="address2" title="enter your Address2." value="<?php echo $user->address2;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="email">
        <h5>COUNTRY</h5>
      </label>
      <select class="form-control1" name="country" id="country" title="enter your Country.">
        <option value="103" selected>India</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="email">
        <h5>STATE</h5>
      </label>
      <select class="form-control1" name="state" id="state" title="enter your country." onchange="selectState(this.value);">
        <option value="<?php echo $user->state;?>">
          <?php echo $state[0]->name;?></option>
        <option>Please select State</option>
        <?php foreach($countries as $country){ ?>
        <option value="<?php echo $country->id;?>">
          <?php echo $country->name;?></option>
        <?php }?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6" id="showCity">
      <label class="pad" for="email">
        <h5>CITY</h5>
      </label>
      <input type="text1" class="form-control1" title="enter your city." value="<?php echo $city[0]->name;?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="email">
        <h5>PINCODE</h5>
      </label>
      <input type="text1" class="form-control1" name="pincode" id="pincode" title="pincode" value="">
    </div>
  </div>
  <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
    <button class="btn btn-secondary float_left menu-login " name="submit" type="submit" style="z-index: 0;">Save</button>
    <button class="btn btn-primary js-cancel" divcontext="" type="button" data-action="">Cancel</button>
  </div>
  <?php }?>
</form>
</div>
</div>
</div>
</div>
<!--   aCCORDIAN 2 -->
<!--   aCCORDIAN 3 -->
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div data-toggle="collapse" data-parent="#accordion" href="#collapsethree" class="panel-heading">
<h4 class="panel-title">
<img src="fronts/images/employee.png">  <a>Employment Information</a>
</h4>
</div>
<div id="collapsethree" class="panel-collapse collapse">
<div class="panel-body">
<form class="form" action="<?php echo base_url('customer-employee');?>" method="post" id="employment_registrationForm">
  <?php foreach ($profile as $user) { ?>
     <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="password">
        <h5>COMPANY NAME</h5>
      </label>
        <input type="text" name="cname" class="form-control1">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="password">
        <h5>EMPLOYMENT TYPE</h5>
      </label>
      <select id="employment type" name="emp_type" class="form-control1">
        <option>Choose...</option>
        <option>
          <?php echo $user->emp_type;?></option>
        <option value="SALARIED">Salaried</option>
        <option value="SELF_EMPLOYED_BUSINESS">Self Employed Business</option>
        <option value="SELF_EMPLOYED_PROFESSIONAL">Self Employed Professional</option>
        <option value="SALARIED_DOCTOR">Salaried Doctor</option>
        <option value="RETIRED">Retired</option>
        <option value="STUDENT">Student</option>
        <option value="HOMEMAKER">Homemaker</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="email">
        <h5>ANNUAL SALARY(in hand)</h5>
      </label>
      <select id="bank_name" name="bank_name" class="form-control1">
        <option>Choose...</option>
        <option value="Axis Bank">1-1.5 Lakh</option>
        <option value="CitiBank">2-2.5 Lakh</option>
        <option value="Deutsche Bank">3-3.5 Lakh</option>
        <option value="HDFC Bank">4-4.5 Lakh</option>
        <option value="HSBC">5-5.5 Lakh</option>
        <option value="ICICI Bank">6-6.5 Lakh</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="password">
        <h5>EMPLOYMENT SECTOR</h5>
      </label>
      <select id="employment type" class="form-control1" name="emp_occupation">
        <option>Choose...</option>
        <option>
          <?php echo $user->emp_occupation;?></option>
        <option value="Government">Government</option>
        <option value="Private">Private</option>
        <option value="Self Business">Self Business</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="pad" for="password">
        <h5>ANNUAL SALARY</h5>
      </label>
      <select id="salary" class="form-control1" name="salary">
        <option>Choose...</option>
        <option>
          <?php echo $user->salary;?></option>
        <option value="1-1.5">1-1.5 Lac</option>
        <option value="2-2.5">2-2.5 Lac</option>
        <option value="3-3.5">3-3.5 Lac</option>
        <option value="4-4.5">4-4.5 Lac</option>
        <option value="5-5.5">5-5.5 Lac</option>
        <option value="6-6.5">6-6.5 Lac</option>
        <option value="ABOVE">Above</option>
      </select>
    </div>
  </div>
  <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
    <button class="saveNow btn btn-secondary float_left menu-login js-saveNow" type="submit" style="z-index: 0;">Save</button>
    <button class="btn btn-primary js-cancel" divcontext="" type="button" data-action="">Cancel</button>
  </div>
  <?php }?>
</form>
</div>
</div>
</div>
</div>
<!-- end  aCCORDIAN 3-->
<!--   aCCORDIAN 4 -->
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div data-toggle="collapse" data-parent="#accordion" href="#collapsefour" class="panel-heading">
<h4 class="panel-title">
<img src=<?php echo base_url();?>fronts/images/txt.png>
<a>Digital KYC</a>
</h4>
</div>
<div id="collapsefour" class="panel-collapse collapse">
<div class="panel-body">
<form class="form" action="<?php echo base_url('customer-digitalKYC');?>" method="post" enctype="multipart/form-data">
  <?php foreach ($profile as $user) { ?>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="control-label">
        <h5>AADHAR No:</h5>
      </label>
      <input type="text" name="adhar_no" class="form-control1" value="<?php echo $user->aadhar_no;?>" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="control-label">
        <h5>Aadhar Image Upload:</h5>
      </label>
      <input type="file" name="adhar_image" class="form-control1" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="control-label">
        <h5>PAN No:</h5>
      </label>
      <input type="text" name="pan_no" class="form-control1" value="<?php echo $user->pan_no;?>" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-6">
      <label class="control-label">
        <h5>Pan Image Upload:</h5>
      </label>
      <input type="file" name="pan_image" class="form-control1" />
    </div>
  </div>
  <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
    <button class="saveNow btn btn-secondary float_left menu-login js-saveNow" type="submit" style="z-index: 0;">Save</button>
    <button class="btn btn-primary js-cancel" divcontext="" type="button" data-action="">Cancel</button>
  </div>
  <?php }?>
</form>
</div>
</div>
</div>
</div>
<!-- end  aCCORDIAN 4-->
</div>
<!-- <div class="tab-pane" id="apply">
<div class="col-lg-12">
<!- aCCORDIAN 1-->
<!-- <div class="panel panel-default">
<div  class="panel-heading">
<h4 class="panel-title">
<img src="fronts/images/home.png">  <a>Home Loan</a>
</h4>
</div>
<div class="panel-body">
    <form role="form" action="<?php echo base_url('loan-apply-customer');?>" method="post">
      <div class="row setup-content" id="step-1">
          <div class="col-md-12 cal">
            <h3 class="text-center"> Get Loan </h3>
              <div class="col-md-6">
                <div class="form-group">
                   <label class="pad" for="loantype"><h5>SELECT LOAN TYPE:</h5></label>
                      <input class="form-control1 loan_cat" name="loan_cat" type="text"  data-toggle="modal" data-target="#myModal" id="dataval" placeholder="Loan Type">
                      <div class="modal" id="myModal" >
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <!-- <div class="modal-header pad">
                            <h5 class="modal-title">SELECT LOAN CATEGORY</h5>
                          </div> -->

                          <!-- Modal body -->
                          <!-- <div class="modal-body">
                           <ul> name="loan_cat" -->
                            <!-- <?php $i=1; $j=1;foreach($cats as $cat){?>
                            <li><input type="checkbox" id="cb<?php echo $i++;?>"   value="<?php echo $cat->name;?>" onclick="checkboxs(this.value)"/>
                              <label for="cb<?php echo $j++;?>"><img src="<?php echo base_url('categories/').$cat->image;?>" /></label>
                            </li>
                            <?php }?>
                          </ul>
                          </div> --> 

                          <!-- Modal footer -->
                          <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                          </div> -->

                        <!-- </div>
                      </div>
                    </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="emi"><h5>EMI TYPE (IF ANY)</h5></label>
                  <select name="emi_type_payment" class="form-control1 emi_type_payment">
                  <option>Please Select EMI</option>
                  <option>Online</option>
                  <option>Cash</option>
                  <option>Salary</option>
                  </select>
                </div>
                <div class="form-group">
                <label for="bonus"><H5>INTEREST RATE</H5></label>
                <select name="intrest_rate" id="number1" onchange="calculator()" class="form-control1 intrest_rate" placeholder="Enter Annual Bonus" >
                <option>Please EMI Montly</option>}
                <script>for(var i=1;i<=200;i++){ document.writeln('<option>'+i+'</option>'); }</script>
                </select>
                </div>
                <div class="form-group">
                <label for="bank"><H5>EMI MONTHLY AMOUNT</H5></label>
                <input type="text" name="emi_amount" id="number2" class="form-control1 emi_amount" placeholder="EMI Monthly Amount" readonly>
                </div> -->

                <!-- </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="gross"><H5>ENTER SALARY (AMOUNT)</H5></label>
                <input type="text" id="number3" name="g_salary" class="form-control1 g_salary" placeholder="Enter Salary" >
                </div>
                <div class="form-group">
                <label for="loan_emi"><H5>LOAN (AMOUNT)</H5></label>
                <input id="number4" type="text" name="loan_amount" class="form-control1 loan_amount" placeholder="Loan EMI" >
                </div>
                <div class="form-group">
                <label for="tax"><H5>ENETR EMI (MONTHLY)</H5></label>
                <select  id="number5" name="month_emi" onchange="calculator()" class="form-control1 month_emi" placeholder="Enter Deduction Tax" > 
                <option>Please EMI Montly</option>}
                <script>for(var i=1;i<=200;i++){ document.writeln('<option>'+i+'</option>'); }</script>
                </select>
                </div> 
                <div class="form-group">
                <label for="bank"><H5>CASH AMOUNT</H5></label>
                <input type="text" id="number6" name="amount" class="form-control1 month_salary " placeholder="Cash Amount" >

                <input type="hidden" id="number6" name="month_salary" class="form-control1 month_salary emi_amount_total" placeholder="Cash Amount" > -->
                <!--  // -->
               <!--  </div>
                </div>
                <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
                    <button class="btn btn-secondary btn-lg pull-left" type="Reset">Reset</button>
                    <button class="btn btn-primary btn-lg pull-left" id="next1" onclick="return nextpage()">Next</button>
                </div>
            </div>
        </div>
      <div class="row setup-content" id="step-2" >
        <div class="col-md-12 cal">
            <h3 class="text-center">User Info</h3>
            <div class="col-md-6">
                <div class="form-group">
                   <label for="name"><h5>ENTER FULLNAME</h5></label>
                    <input type="text" class="form-control1" name="name" placeholder="Enter Full Name" >
                </div>
                <div class="form-group">
                    <label for="dob"><h5>ENTER DATE OF BIRTH</h5></label>
                      <input type="date" class="form-control1" id="date_of_birth" name="date_of_birth">
                        
                </div>
                <div class="form-group"> -->
                    <!-- <label for="Salary"><h5>TOTAL JOB YEAR</h5></label>
                      <select class="form-control1" id="job_year" name="job_year">
                        <option value="">Total Years Of Job</option>
                        <script>for(var k=1;k<=60;k++){ document.writeln('<option>'+k+'</option>');}</script>
                      </select>
                </div>
                <div class="form-group state_show">
                    <label for="State"><h5>ENTER STATE</h5></label>
                    <input type="text" class="form-control1" id="state" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <label for="name"><h5>ENTER MOBILE NUMBER</h5></label>
                    <input type="text" id="number" name="mobile_no" class="form-control1" placeholder="Enter Mobile Number" minlength="10" maxlength="10">
                </div>
                <div class="form-group">
                   <label for="email"><h5>ENTER EMAIL</h5></label>
                   <input type="email"  class="form-control1" placeholder="Enter Email" name="email_id">
                </div>
                <div class="form-group">
                    <label for="Salary"><h5>COUNTRY</h5></label>
                      <select class="form-control1" id="country" name="country" onchange="selectState(this.value);">
                        <option value="">Select Country</option>
                        <?php //foreach($country as $count){?>
                          <option value="103">India</option>
                          <?php //} ?>
                      </select>
                </div> -->
        <!--         <div class="form-group city_show">
                    <label for="City"><h5>ENTER CITY</h5></label>
                    <input type="text" class="form-control1" id="city" >
                </div>
                
            </div>
            <div class="col-md-12">
                <div class="form-group">
                   <label for="Address"><h5>ENTER ADDRESS</h5></label>
                    <textarea id="subject" style="width:43%" name="client_message" class="form-control1" placeholder="Write something.."></textarea>
                </div>
              <button class="btn btn-secondary btn-lg pull-left" onclick="return previous()" type="button">Previous</button>
              <button class="btn btn-primary btn-lg pull-left" onclick="return nextpage2()" type="button">Next</button>
            </div>
        </div>
      </div> -->
<!--       <div class="row setup-content" id="step-3" >
        <div class="col-md-12 cal">
          <h3 class="text-center">Apply Loan</h3>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Tenure"><h5>ENTER TENURE(YEARS)</h5></label>
                    <input type="text" id='number7' name="tenure" class="form-control1" placeholder="Enter Tenure" required>
                </div>
                <div class="form-group">
                    <label for="CIBIL"><h5>PROPERTY LOCATION</h5></label>
                        <select class="form-control1" id="location" name="location">
                            <option value="">Please Select</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Gurugram">Gurugram</option>
                            <option value="Noida">Noida</option>
                            <option value="Faridabad">Faridabad</option>
                            <option value="Ghaziabad">Ghaziabad</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="CIBIL"><h5>PROPERTY</h5></label>
                        <select class="form-control1" id="property" name="property">
                            <option value="">Select Property Type</option>
                            <option value="1">Lal Dora and Other </option>
                            <option value="2">Regularised</option>
                            <option value="3">Approved</option>
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="CIBIL"><h5>SELECT CIBIL DETAILS</h5></label>
                    <select class="form-control1" id="cibil" name="cibil">
                        <option value="">Select CIBIL Detail</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good </option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="CIBIL"><h5>PROPERTY DETAILS</h5></label>
                        <select class="form-control1" id="Property_detail" name="Property_detail">
                            <option value="">Select Property</option>
                            <option value="1"> Residential</option>
                        </select>
                </div>
            </div>
          <div class="col-md-12">
              <button class="btn btn-secondary btn-lg pull-left" onclick="return previous2()" type="button">Previous</button>
              <button class="btn btn-success btn-lg pull-left" type="submit">Submit</button>
            </div>
        </div>
      </div> -->
 <!-- </form>
</div>
</div>  -->
<!-- end  aCCORDIAN 1-->
<!--   aCCORDIAN 2 -->

<!-- end  aCCORDIAN 2-->
<!--   aCCORDIAN 3 -->

<!-- end  aCCORDIAN 3-->
<!-- </div>
</div> --> 
<div class="tab-pane" id="civil">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-heading">
        <h4 class="panel-title">
        <img src="fronts/images/list.png">  <a>CIBIL Check</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapsed">
      <div class="panel-body">
      <form class="form" action="<?php echo base_url('profile-update');?>" method="post" id="cibil_registrationForm">
        <?php foreach ($profile as $user) { ?>
        <div class="form-group">
          <div class="col-xs-6">
            <label class="pad" for="first_name">
              <h5>FULL NAME(As Per PAN)</h5>
            </label>
            <input type="text1" class="form-control1" name="name" id="cibil_name" placeholder="First name" title="enter your first name if any." value="<?php echo $user->name;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label class="pad" for="mobile">
              <h5>MOBILE</h5>
            </label>
            <input type="text1" class="form-control1" name="mobile" id="cibil_mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php echo $user->mobile;?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label class="pad" for="gender">
              <h5>GENDER</h5>
            </label>
            <br>
            <label class="radio-inline">
              <input type="radio" name="optradio" checked>Male</label>
            <label class="radio-inline">
              <input type="radio" name="optradio">Female</label>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label class="pad" for="DOB">
              <h5>DATE OF BIRTH</h5>
            </label>
            <input type="date" class="form-control1" name="dob" placeholder="yyyy/mm/dd">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6" id="showCity">
            <label class="pad" for="email">
              <h5>CITY</h5>
            </label>
            <input type="text1" class="form-control1" title="enter your city.">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label class="pad" for="pan">
              <h5>PAN</h5>
            </label>
            <input type="text1" class="form-control1" name="pan" id="cibil_pan" placeholder="Enter PAN No." value="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-6">
            <label class="pad" for="pin">
              <h5>PIN CODE</h5>
            </label>
            <input type="text" class="form-control1" name="pin" id="pin" placeholder="122001" value="">
          </div>
        </div>
        <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
          <button class="saveNow btn btn-secondary float_left menu-login js-saveNow" divcontext="" data-action="" type="button" style="z-index: 0;">Save</button>
          <button class="btn btn-primary js-cancel" divcontext="" type="button" data-action="">Cancel</button>
        </div>
        <?php }?>
      </form>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane" id="support">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="panel-heading">
        <h4 class="panel-title">
        <img src="fronts/images/list.png"><a>Support Ticketing</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapsed">
        <div class="panel-body">
          <form class="form" action="<?php echo base_url('customer-message');?>" method="post" id="ticketing_registrationForm">
           
            <div class="form-group">
              <div class="col-xs-6">
                <label class="pad" for="first_name">
                  <h5>FULL NAME(As Per PAN)</h5>
                </label>
                <input type="text" style="border: 1px solid #cccccc57;" class="form-control1" name="name" id="ticketing_name" placeholder="First name" title="enter your first name if any." value="<?php echo $profile[0]->name; ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-6">
                <label class="pad" for="mobile">
                  <h5>MOBILE</h5>
                </label>
                <input type="text" style="border: 1px solid #cccccc57;" class="form-control1" name="mobile" id="ticketing_mobile" placeholder="enter mobile number" title="enter your mobile number if any." value="<?php echo $this->session->userdata('mobile');?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label class="pad" for="first_name">
                  <h5>Agent Name</h5>
                </label>
                <input type="text" style="border: 1px solid #cccccc57;" name="agent" class="form-control1">
              </div>
            </div>
             <div class="form-group">
              <div class="col-xs-6">
                <label class="pad" for="first_name">
                  <h5>Agent Mobile</h5>
                </label>
                <input type="text"style="border: 1px solid #cccccc57;"  id="mobile" name="agent_mobile" class="form-control1" maxlength="10">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="subject">
                  <h5>MESSAGE</h5>
                </label>
                <textarea id="subject" style="border: 1px solid #cccccc57; width: 90%"name="client_message" class="form-control1" placeholder="Write something..">   
                </textarea>
              </div>
            </div>
            <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
              <button class="saveNow btn btn-secondary float_left menu-login js-saveNow" type="submit" style="z-index: 0;">Save</button>
              <button class="btn btn-primary js-cancel" divcontext="" type="button" data-action="">Cancel</button>
            </div>
          </form>
        </div>
      </div>
      <div id="collapse5" class="panel-collapse collapsed">
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#Sr</th>
                  <th>Ticket Id</th>
                  <th>Mobile</th>
                  <th>Agent</th>
                  <th>Agent Mobile</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $K=1; foreach($sendMessage as $detail){?>
                      <tr>
                        <td><?php echo $K++;?></td>
                        <td><?php echo $detail->tkt_id;?></td>
                        <td><?php echo $detail->mobile;?></td>
                        <td><?php echo $detail->agent;?></td>
                        <td><?php echo $detail->agent_mobile;?></td>
                        <td><?php echo $detail->message;?></td>
                        <td><a href="javascript:void;" class="btn btn-success">Clear</a><br>
                          <a  class="btn btn-warning" href="<?php echo base_url('customer-response/').$detail->tkt_id.'/'.$detail->agent_mobile;?>">Problem</a></td>
                      </tr>
                    <?php } ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane" id="previous">
  <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-heading">Apply Loan List</div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">##</th>
              <th scope="col">Loan Type</th>
              <th scope="col">Loan Total Amount</th>
              <th scope="col">Loan Total EMI</th>
              <th scope="col">Loan Total Month</th>
              <th scope="col">Loan Payment Type</th>
              <th scope="col">Loan Interest</th>
              <th scope="col">Loan Emi Month</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1; foreach($loan_detail as $details){?>
          <tr>
            <th scope="row">
              <?php echo $i++;?>
            </th>
            <td>
              <?php echo $details->loan_type;?></td>
            <td>
              <?php echo $details->balance;?></td>
            <td>
              <?php echo $details->emi_amount;?></td>
            <td>
              <?php echo $details->month_emi;?></td>
            <td>
              <?php echo $details->emi_type_payment;?></td>
            <td>
              <?php echo $details->intrest_rate;?>%</td>
          <td><a class="btn btn-success" href="<?php echo base_url('customer-payment-detail/'.$details->id)?>">More Details</td>
          </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<br>
</div>
<!--Cases Detail column-->
<!-- <div class="column pull-right col-md-3 col-sm-2 col-xs-12">

</div>
-->
</div>
</div>
</div>
</div>
</div>
</div>


<?php $this->load->view('front/footer');?>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#example').DataTable();
} );
function selectState(arg)
{
$.ajax({
url: '<?php echo base_url('front/customer/country')?>',
type: 'POST',
data: {'param': arg},
success:function(res)
{
$('#showCity').html(res);
}
});

}

</script>
<script>
var allowsubmit = false;
$(function(){

$('#confpass').keyup(function(e){
var pass = $('#pass').val();
var confpass = $(this).val();

if(pass == confpass){
$('.error').html('<span style="color:green;">Password  Success</span>');
allowsubmit = true;
}else{
$('.error').html('<span style="color:red;">Password not matching</span>');
allowsubmit = false;
}
});
$('#form').submit(function(){

var pass = $('#pass').val();
var confpass = $('#confpass').val();
if(pass == confpass){
allowsubmit = true;
}
if(allowsubmit){
return true;
}else{
return false;
}
});
});
</script>


<script>
$(document).ready(function(){
// Add minus icon for collapse element which is open by default
$(".collapse.in").each(function(){
$(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
});

// Toggle plus minus icon on show hide of collapse element
$(".collapse").on('show.bs.collapse', function(){
$(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hide.bs.collapse', function(){
$(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});
});
</script>

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
$(document).ready(function () {
//called when key is pressed in textbox
$("#mobile,#number,#number1,#number2,#number3,#number4,#number5,#number6,#number7").keypress(function (e) {
//if the letter is not digit then display error and don't type anything
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//display error message
$("#errmsg").html("Digits Only").show().fadeOut("slow");
return false;
}
});
});
</script>

<script type="text/javascript">    
$(document).ready(function () {

$('#step-1').show();
$('#step-2').hide();
$('#step-3').hide();
$('#step-4').hide();
$('.a1').addClass("btn-primary");
$('.a1').removeClass("btn-default");
});
function nextpage(){

$('#step-1').hide();
$('#step-2').show();
$('#step-3').hide();
$('#step-4').hide();

$('.a1').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a2').removeAttr('disabled');

$('.a1').addClass("btn-default");
$('.a1').removeClass("btn-primary");
$('.a2').addClass("btn-primary");
$('.a2').removeClass("btn-default");
}
function nextpage2(){

$('#step-1').hide();
$('#step-2').hide();
$('#step-3').show();
$('#step-4').hide();

$('.a1').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a3').removeAttr('disabled');

$('.a2').addClass("btn-default");
$('.a2').removeClass("btn-primary");
$('.a3').addClass("btn-primary");
$('.a3').removeClass("btn-default");
}
function nextpage3(){

$('#step-1').hide();
$('#step-2').hide();
$('#step-3').hide();
$('#step-4').show();

$('.a1').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').removeAttr('disabled');

$('.a3').addClass("btn-default");
$('.a3').removeClass("btn-primary");
$('.a4').addClass("btn-primary");
$('.a4').removeClass("btn-default");
}
function previous(){
$('#step-1').show();
$('#step-2').hide();
$('#step-3').hide();
$('#step-4').hide();

$('.a2').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a1').removeAttr('disabled');

$('.a2').addClass("btn-default");
$('.a2').removeClass("btn-primary");
$('.a1').addClass("btn-primary");
$('.a1').removeClass("btn-default");
} 
function previous2(){
$('#step-1').hide();
$('#step-2').show();
$('#step-3').hide();
$('#step-4').hide();
$('.a1').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a3').removeAttr('disabled');

$('.a3').addClass("btn-default");
$('.a3').removeClass("btn-primary");
$('.a2').addClass("btn-primary");
$('.a2').removeClass("btn-default");
} 
function previous3(){
$('#step-1').hide();
$('#step-2').hide();
$('#step-3').show();
$('#step-4').hide();

$('.a1').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').removeAttr('disabled');

$('.a4').addClass("btn-default");
$('.a4').removeClass("btn-primary");
$('.a3').addClass("btn-primary");
$('.a3').removeClass("btn-default");
}
function checkboxs(argument) {
$('#dataval').val(argument);
}
function calculator()
{
//alert('hello');
var amount=parseFloat($('.loan_amount').val());
var emi_intrest=parseFloat($('.intrest_rate').val());
var emi=parseFloat($('.month_emi').val());
if(amount!='' && emi_intrest!='' && emi!='')
{
total=amount / 100 * emi_intrest;
total_amount=total * emi;
var emi_amount=parseFloat($('.emi_amount_total').val(total));
var emi_amount=parseFloat($('.emi_amount').val(total_amount));
}

}
function selectState(argument) 
{
$.ajax({
url: '<?php echo base_url('home/selectState')?>',
type: 'POST',
data: {'state': argument},
success:function(res)
{
$('.state_show').html(res);
}
});
}
function selectCity(argument) 
{
$.ajax({
url: '<?php echo base_url('home/selectCity')?>',
type: 'POST',
data: {'city': argument},
success:function(res)
{
$('.city_show').html(res);
}
});
}
</script>