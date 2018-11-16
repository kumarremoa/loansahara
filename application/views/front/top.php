<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customer | Dashboard</title>
<meta name= "Keywords" Content="Business Loan in Gurgaon,Business Loan provider in Gurgaon,Loan for Small Business in Gurgaon,Unsecured Small Business Loans in Gurgaon,Business Loan in Dwarka,Business Loan provider in Dwarka,Loan for Small Business in Dwarka,Unsecured Small Business Loans in Dwarka,Business Loan in Uttam Nagar,Business Loan provider in Uttam Nagar,Loan for Small Business in Uttam Nagar,Unsecured Small Business Loans in Uttam Nagar,Business Loan in Janak puri,Business Loan provider in Janak puri,Loan for Small Business in Janak puri,Unsecured Small Business Loans in Janak Puri,Business Loan in Vikas Puri.Business Loan provider in Vikas puri,Loan for Small Business in Vikas puri,Unsecured Small Business Loans in Vikas Puri,Business Loan in Palam,Business Loan provider in Palam,Loan for Small Business in Palam,Unsecured Small Business Loans in Palam"/>
<meta name="Description" Content="Get fast and easy business Loan in Gurgaon and Dwarka With easy step.Business loans in Gurgaon are based on company turn over. Best small business loans can give the much-needed boost to any startup business."/>
<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW"/> 
<Meta name="revisit" content="2days"/>
<!-- Stylesheets -->
<link href="<?php echo base_url();?>fronts/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url();?>fronts/css/revolution-slider.css" rel="stylesheet">
<link href="<?php echo base_url();?>fronts/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>fronts/css/responsive.css" rel="stylesheet">
<!--Color Switcher Mockup-->
<link href="<?php echo base_url();?>fronts/css/color-switcher-design.css" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="<?php echo base_url();?>fronts/css/color-themes/default-theme.css" rel="stylesheet">
<!--Favicon-->
<link rel="shortcut icon" href="<?php echo base_url();?>fronts/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url();?>fronts/images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style type="text/css">
    input{ width: 90% !important; }
    label{ margin-left: 20px; }
    .btn{ margin-left: 20px; }
     #password {
   border: 1px solid #f00;
 }
  #signupForm label.error {
    margin-left: 0px;
    width: auto;
    font-size: initial;
    color: red;
    display: inline;
}
  </style>
  <style type="text/css">
    input{ width: 90% !important; }
    label{ margin-left: 20px; }
    .btn{ margin-left: 20px; }
  </style>
</head>
<body>
<div class="page-wrapper">
  <!-- Preloader -->
  <div class="preloader"></div>
  <!-- Main Header-->
  <header class="main-header">
    <!--Header Top-->
    <div class="header-top">
      <div class="auto-container">
        <div class="clearfix">
          <div class="pull-left logo-outer">
            <div class="logo"><a href="index.php"><img src="<?php echo base_url();?>fronts/images/footer-logo.png" alt="" title=""></a></div>
          </div>
          <div class="top-right clearfix">
            <ul class="clearfix" style="margin-top:20px">
              <li class="number"><span class="icon flaticon-smartphone"></span><span class="help">Helpline:</span><br>
                <a href="tel:+919310000440">+919310000440</a>
              </li>
              <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle cust" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Customer Id:  <?php echo $this->session->userdata('mobile');?>
                </button>
                <div class="dropdown-menu cust">
                  <a class="dropdown-item" href="#"> - Forget Password</a><br>
                  <a class="dropdown-item" href="#"> - Track Application</a><br>
                  <a class="dropdown-item" href="<?php echo base_url('customer-logout');?>"> - Logout</a><br>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
              <!-- <li>
                <div class="dropdown">
                <button type="button"  data-toggle="dropdown" >
                     Profile :<?php echo $this->session->userdata('mobile');?>
                  </button>
                  <div class="dropdown-menu">
                    <ul class="dropdown-item">
                      <li><a  href="<?php echo base_url('customer-logout');?>">Logout</a></li><!-- 
                      <li><a class="dropdown-item" href="#">Forget Password</a></li> -->
                     <!--  <li><a class="dropdown-item" href="#">Track Application</a></li> -->
                       <!-- <li><a class="dropdown-item" href="<?php echo base_url('customer-logout');?>">Logout</a></li> -->
                    <!-- </ul>
                  </div>
                </div>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
