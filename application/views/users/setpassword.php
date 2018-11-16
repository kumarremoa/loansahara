<?php $setting = setting_all();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo (setting_all('company_name'))?setting_all('company_name'):'Dasboard';?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('assets/bower_components/font-awesome/css/'); ?>font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('assets/bower_components/Ionicons/css/'); ?>ionicons.min.css">
  <link rel="stylesheet" href="<?php echo site_url('assets/plugins/iCheck/all.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('assets/css/'); ?>AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo site_url('assets/plugins/iCheck/square/'); ?>blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b><?php echo (setting_all('title1'))?setting_all('title1'):'ADMIN';?></b> <?php echo (setting_all('title1'))?setting_all('title2'):'PANEL';?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
      <?php
      if(!empty($success_msg)){
          echo '<p class="alert alert-success alert-dismissible btn-flat">'.$success_msg.'</p>';
      }elseif(!empty($error_msg)){
          echo '<p class="alert alert-danger alert-dismissible btn-flat">'.$error_msg.'</p>'; 
      }
      ?>
    </p>
    <h4 class="text-center">RESET PASSWORD</h4>  
    <?php 
    if($email=='allredyUsed'){ ?>
      <div class="alert alert-warning text-center">
        <h2>You have already reset your password..</h2>
         <p>Please Login <a href="<?php echo base_url().'login'; ?>">Here</a> </p>
      </div>
    <?php } else{  ?>
          <form class="createaccount" action="<?php echo base_url().'users/reset_password'?>" method="post">

            <input type="hidden" name="email" value="<?php echo $email; ?>" class="form-control" placeholder=""  />
            <div class="form-group">
              <input type="password" id="password1" name="password_confirmation" class="form-control" placeholder="new password..." data-validation="required" />
            </div>
            <div class="form-group">
              <input type="password" id="password2" name="password" class="form-control" placeholder="confirm Password" data-validation="confirmation" />
            </div>
            <div>
              <button type="submit" name="sub" value="Set password" class="btn btn-info btn-block btn-flat">Set password</button>
              <!--<a class="btn btn-default submit" >Log in</a>-->         
            </div>
          </form>
          <?php } ?>
  
  <!-- /.login-box-body -->
</div>
<p class="text-center clearfix" style="margin-top: 5px;"><b>Back to main site : <a href="http://<?php echo setting_all('website'); ?>" target="blank" style="color:#dd4b39 !important;"><?php echo setting_all('website'); ?> </a></b></p>

</div>

<!-- /.login-box -->

<script src="<?php echo site_url('assets/bower_components/jquery/dist/'); ?>jquery.min.js"></script>
<script src="<?php echo site_url('assets/bower_components/bootstrap/dist/js/'); ?>bootstrap.min.js"></script>
<script src="<?php echo site_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>

<script type="text/javascript">
      window.onload = function () {
      document.getElementById("password1").onchange = validatePassword;
      document.getElementById("password2").onchange = validatePassword;
      }
      function validatePassword(){
        var pass2=document.getElementById("password2").value;
        var pass1=document.getElementById("password1").value;
        if(pass1!=pass2)
        {
          document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        }
        else{
             document.getElementById("password2").setCustomValidity('');
        }
      }
    </script>   
</body>
</html>
