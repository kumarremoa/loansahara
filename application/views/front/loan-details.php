  <?php $this->load->view('front/top');?>
  <style>
   .highcharts-credits{ display: none !important; } 
  </style>
  <?php $profile= $this->Customer_model->profile_status($this->session->userdata('id')); ?>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <div class="sidebar-page-container blog-page">
  <div class="auto-container">
  <div class="row clearfix">
  <!--Content Side-->
  <div class="content-side pull-right col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <!--Services Single-->
  <div class="services-single">
  <div class="sec-title margin-bottom">
  <h3>Hi <?php echo $this->session->userdata('mobile');?>, Welcome Back</h3>
  </div>
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
  <ul class="nav nav-tabs">
  <li class="active" width="100%"><a href="javascript:void(0);" data-toggle="tab" onclick="window.history.back();"><img src="<?php echo base_url();?>fronts/images/user.png"> Profile</a></li>
  </ul>
  <aside>
  <div class="profile-completion js-profile-completion">

  <div class="cd-sec-right-title font-lg">Your Profile Status</div>
  <div class="profile-content">
  <div class="progress">
  <div class="progress-bar js-progress-bar" role="progressbar" aria-valuenow="15.384615384615385" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $profile[0]->profile_status;?>%"><?php echo $profile[0]->profile_status;?>%</div>
  </div>
  <div class="procom js-procom">Complete your profile for maximum flavour!</div>
  
  </div>
  </div>
  <!--    <div class="social-profile js-social-profile">
  <div class="cd-sec-right-title font-lg"> Social Profile </div>
  <div class="social-content sign-in-box">
  <div class="fb">
  <img src="<?php echo base_url();?>fronts/images/fb.png"> Connect Facebook
  </div>
  <div class="gm">
  <img src="<?php echo base_url();?>fronts/images/gm.png"> Connect G+
  </div>
  </div>
  </div> -->
  <div class="need-help">
  <div class="cd-sec-right-title font-lg">
  Need help?
  </div>
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
  </aside>
  </div>
  <!--end Column-->

  <!--Cases Detail column-->
  <div class="cases-detail-column col-md-9 col-sm-12 col-xs-12">
    <div class="text">
      <div class="tab-content">
        <div class="tab-pane active" id="profile">

  <!--   aCCORDIAN 1-->

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div  class="panel-heading">
        <h4 class="panel-title">
        <img src="<?php echo base_url();?>fronts/images/man.png">  <a>About Loan</a>
        </h4>
      </div>
    <div class="panel-body">
        <div class="row col-md-12">
          <div id="container1" style="height: 300px; min-width: 310px"></div>
        </div>

      <div class="row col-md-12">
        <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Total Monthly Payment </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Successful Payment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#references" role="tab" data-toggle="tab">Pending Payment</a>
        </li>
      </ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="profile">
    <h2 class="text-center">Total Monthly Payment</h2>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th>#Sr</th>
              <th>Intrest Rate</th>
              <th>Total Emi</th>
              <th>Montly Balance</th>
              <!-- <th>Pay Monthly Bill</th> -->
              <th>Date</th>
              <th></th>
              </tr>
            </thead>
            <tbody>
              <?php  
              
              foreach($details as $detail){
              $investment=$detail->balance;
              $rate=$detail->intrest_rate;
              $year=$detail->month_emi;
              $n=1;
              $K=1; 
              for ($i=1; $i <= $detail->month_emi ; ) { 
                $da=$detail->approval_date;
                $repeat = strtotime("+1 month",strtotime($da));
                $today = date('Y-m-d',$repeat);
              ?>
              <tr>
              <td><?php echo $K++;?></td>
              <td><?php echo $detail->intrest_rate;?></td>
              <td><?php echo $i++;?></td>
              <td><?php echo $detail->balance / 100 * $detail->intrest_rate;?></td>
              <!-- <td><?php echo $investment * pow(1 + $rate/(100 * $n),$n++);?></td> -->
              <td><?php echo $today;?></td>
              <td></td>
              </tr>
              <?php } }?>
            </tbody>
    </table>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="buzz">
    <h2 class="text-center">Successful Payment</h2>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th>#Sr</th>
              <th>Intrest Rate</th>
              <th>Total Emi</th>
              <th>Montly Balance</th>
              <!-- <th>Pay Monthly Bill</th> -->
              <th>Date</th>
              <th></th>
              </tr>
            </thead>
            <tbody>
              <?php  
              
              foreach($details as $detail){
              $investment=$detail->balance;
              $rate=$detail->intrest_rate;
              $year=$detail->month_emi;
              $n=1;
              $K=1; 
              for ($i=1; $i <= $detail->month_emi ; ) { 
                $da=$detail->approval_date;
                $repeat = strtotime("+1 month",strtotime($da));
                $today = date('Y-m-d',$repeat);
              ?>
              <tr>
              <td><?php echo $K++;?></td>
              <td><?php echo $detail->intrest_rate;?></td>
              <td><?php echo $i++;?></td>
              <td><?php echo $detail->balance / 100 * $detail->intrest_rate;?></td>
              <!-- <td><?php echo $investment * pow(1 + $rate/(100 * $n),$n++);?></td> -->
              <td><?php echo $today;?></td>
              <td></td>
              </tr>
              <?php } }?>
            </tbody>
    </table>
  </div>
  <div role="tabpanel" class="tab-pane fade" id="references">
    <h2 class="text-center">Pending Payment</h2>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th>#Sr</th>
              <th>Intrest Rate</th>
              <th>Total Emi</th>
              <th>Montly Balance</th>
             <!--  <th>Pay Monthly Bill</th> -->
              <th>Date</th>
              <th></th>
              </tr>
            </thead>
            <tbody>
              <?php  
              
              foreach($details as $detail){
              $investment=$detail->balance;
              $rate=$detail->intrest_rate;
              $year=$detail->month_emi;
              $n=1;
              $K=1; 
              for ($i=1; $i <= $detail->month_emi ; ) { 
                $da=$detail->approval_date;
                $repeat = strtotime("+1 month",strtotime($da));
                $today = date('Y-m-d',$repeat);
              ?>
              <tr>
              <td><?php echo $K++;?></td>
              <td><?php echo $detail->intrest_rate;?></td>
              <td><?php echo $i++;?></td>
              <td><?php echo $detail->balance / 100 * $detail->intrest_rate;?></td>
             <!--  <td><?php //echo number_format($investment * pow(1 + $rate/(100 * $n),$n++));?></td> -->
              <td><?php echo $today;?></td>
              <td></td>
              </tr>
              <?php } }?>
            </tbody>
    </table>
  </div>
</div>
      </div>
    </div>
  </div>
</div>
  <!-- end  aCCORDIAN 4-->

        </div>
      </div>
    </div>
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

  <?php


  ?>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script type="text/javascript">

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
   $(document).ready(function() {
  $('#example').DataTable();
  } );

  </script>

  <script type="text/javascript">
    

Highcharts.chart('container1', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Monthly Installment'
    },
    subtitle: {
        text: 'Source: Loan Sahara'
    },
    xAxis: {
        categories: [<?php foreach($details as $det){ 
          for ($i=1; $i <= $det->month_emi ; $i++) 
            { echo date("m", strtotime($det->approval_date)); } 
        }?>]
    },
    yAxis: {
        title: {
            text: 'Money'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Success',
        data: [<?php foreach($details as $det){ 
          for ($i=1; $i <= $det->month_emi ; $i++) 
            { echo $det->balance / 100 * $det->intrest_rate.','; } 
        }?>]
    }]
});
  </script>
