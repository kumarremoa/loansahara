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
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required="" value="">
        <?php echo form_error('email','<span class="glyphicon glyphicon-envelope form-control-feedback">','</span>'); ?>
      </div>      
          
      <div class="row">
        <div class="col-xs-12">
          <input  type="submit" name="forgetPassword" value="Reset Password" class="btn btn-danger btn-block btn-flat">
        </div>
        <!-- /.col -->
      </div>    
    </form>
    <div class="clearfix">        
    </div>   
   
  <!-- /.login-box-body -->
</div>
<p class="text-center clearfix" style="margin-top: 5px;"><b>Back to main site : <a href="http://<?php echo setting_all('website'); ?>" target="blank" style="color:#dd4b39 !important;"><?php echo setting_all('website'); ?> </a></b></p>

</div>

<!-- /.login-box -->

<script src="<?php echo site_url('assets/bower_components/jquery/dist/'); ?>jquery.min.js"></script>
<script src="<?php echo site_url('assets/bower_components/bootstrap/dist/js/'); ?>bootstrap.min.js"></script>
<script src="<?php echo site_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".alert").fadeTo(5000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
    });
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass   : 'iradio_flat-red'
    });

  });
</script>
</body>
</html>
