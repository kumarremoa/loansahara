<?php $this->load->view('front/top');?>
  <style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
}
.chat {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}
img{
  max-width:100px;
}
input[type=file]{
padding:10px;
background:#2d2d2d;}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.chat::after {
    content: "";
    clear: both;
    display: table;
}

.chat img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

.chat img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

.time-right {
    float: right;
    color: #aaa;
}

.time-left {
    float: left;
    color: #999;
}
.heughtschat{
  max-height: 300px;
    overflow-x: scroll;
}
    </style>
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
                            <div class="progress-bar js-progress-bar" role="progressbar" aria-valuenow="15.384615384615385" aria-valuemin="0" aria-valuemax="100" style="width:15%">15%</div>
                        </div>
                        <div class="procom js-procom">Complete your profile for maximum flavour!</div>
                        <ul id="suggestions"><li><a href="#" data-targetname="" class="email id"><span>15%</span>email id</a></li><li><a href="#" data-targetname="" class="pan"><span>15%</span>Quicken your process</a></li><li><a href="#" data-targetname="personalInfo.applicantDetail.maritalStatus" class="marital status"><span>8%</span>marital status</a></li></ul>
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
                                    <img src="<?php echo base_url();?>fronts/images/man.png">  <a>Message Loan</a>
                                </h4>
                              </div>
                              <div class="panel-body">
                                <div class="row col-md-12">
                                      <div class="row">
                <div class="col-md-12">
                    

                    <div class="col-md-12" style="padding-left: 20px !important;">
                          <div class="chat">

                           <h2 id="message_id1">Ticket: (<?php echo $ticket;?>)</h2>
                            <p id="err"></p>
                          </div>
                          <div class="heughtschat">

                            <!-- <div class="chat darker">
                            <img src="<?php //echo base_url()?>fronts/images/avatar-05.png" alt="Avatar" class="right" style="width:10%;">
                            <p>Hey! I'm fine. Thanks for asking!</p>
                            <span class="time-left">11:01</span>
                          </div>

                          <div class="chat">
                            <img src="<?php //echo base_url()?>fronts/images/avatar-05.png" alt="Avatar" style="width:10%;">
                            <p>Sweet! So, what do you wanna do today?</p>
                            <span class="time-right">11:02</span>
                          </div>
 -->
                          
                          
                          </div> 
                          <div class="panel panel-danger">
                                <div class="panel-heading">Message</div>
                                <div style="color:green" id="showCity"></div>
                                <div class="panel-body">
                           <form id="form" action="" method="post" enctype="multipart/form-data" class="has-validation-callback">
                                    <textarea id="editor" name="message" class="form-control"></textarea><br>
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id');?>">
                                    <input type="hidden" id="ticket_id" name="ticket" value="<?php echo $ticket;?>">
                                   <!--  <input type="hidden" name="agent_id" value="<?php echo $agent;?>"> -->
                                   <input class="btn btn-success" type="button" value="Upload" onclick="sendMessage()">
                                    
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
                        <!-- end  aCCORDIAN 4-->

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
<script type="text/javascript">
  function sendMessage()
  {
    var user_id=$('#user_id').val();
    var editor=$('#editor').val();
    var ticket_id=$('#ticket_id').val();
    $.ajax({
      url: '<?php echo base_url('front/response/sendData')?>',
      type: 'POST',
      data: {'user_id': user_id,'editor': editor,'ticket_id':ticket_id},
      success:function(res)
      {
        $('#showCity').html('<span id="hidde">'+res+'</span>');
      }
    });
  }
  $('#hidde').hide(1000);
</script>

<script type="text/javascript">
$(document).ready(function(){
    setInterval(message,1000);
    function message() {
      var ticket='<?php echo $ticket;?>';
        $.ajax({
          url: '<?php echo base_url('front/response/details')?>',
          type: 'POST',
          data: {'param': ticket},
          success:function(res)
          {
            $('.heughtschat').html(res);
          }
        });
    }
  });
</script>
</script>