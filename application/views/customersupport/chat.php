    <!-- Main content -->
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
 


/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;

    border-left: none;
   
}
</style>
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
           
         <?php if(!empty($success_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
        <?php }elseif(!empty($error_msg)){ ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
        <?php } ?> 

        <div class="clearfix"></div>    
        <div class="box box-success">
          
          <!-- /.box-header -->
          <div class="box-body">           
             <div class="row">
                <div class="col-md-12">
                
                    <div class="col-md-6">
                        <div class="panel panel-success">
                        <div class="panel-heading">Chat List</div>
                        <div class="panel-body">
                        <?php foreach($customers as $admin){?>
                          <div class="chat">
                            <a href="javascript:void(0);" ><img src="<?php echo base_url();?>fronts/images/avatar-05.png"  alt="Avatar" style="width:10%;">
                            </a>
                            <p>Name: <?php echo $admin->name;?></p>
                            <p>Mobile: <?php echo $admin->mobile;?></p>
                            <p>Address: <?php echo $admin->address1;?></p>
                          </div>
                      <?php }?>
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel-group">
                            <div class="panel panel-default">
                              <div class="panel-heading">All Users</div>
                                <div class="panel-body">
                                   <div class="col-md-12" style="padding-left: 20px !important;">
                          <div class="chat">

                           <h2 id="message_id1">Chat Messages</h2>
                            <p id="err"></p>
                          </div>
                          <div class="heughtschat">
                          </div> 
                          <div class="panel panel-danger">
                                <div class="panel-heading">Message</div>
                                <div id="showCity"></div>
                                <div class="panel-body">
                           <form id="form" action="" method="post" enctype="multipart/form-data">
                                    <textarea id="editor" name="message" class="form-control" ></textarea><br>
                                    <input type="hidden" name="user_id" class="user_id" id="user_id" value="<?php echo $customers[0]->id?>">
                                     <input type="hidden" name="user_id" class="user_id" id="ticket_id" value="<?php echo $ticket?>">
                                   <input class="btn btn-success" type="submit" value="Upload" onclick="sendMessage()">
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
             </div>
          </div>
          <!-- /.box-body -->
        </div>

        </div>   
      </div>
     
   
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
  <!-- /.content-wrapper -->
<script type="text/javascript">
$('#myModal').on('show.bs.modal', function (e) {
    var myRoomNumber = $(e.relatedTarget).attr('data-id');
    $(this).find('.roomNumber').val(myRoomNumber);
});

$(document).ready(function() {
        $('#aht_btn').click(function(event){
          event.preventDefault();
          var agent =$('#agent_id').val();
          var customer =$('#customer_id').val();
          if(agent!=0){
            $.ajax({
            type:"POST",
            url : "<?php echo base_url('customer/agentSelect');?>",
            data:{ "agent_id": agent,"customer_id":customer } ,
            success : function(data){
              $('#myModal').modal('hide');

              $('#cont').modal('show');
              

            },
            always: function() {
               $("#formtopost").submit();
            }
        });  
        }
        else{
          $("#error").html("<span class='text-danger'>please Select Agent!</sapn>");
        } 
      });
    });
$('#agent_id').change(function(){
  $('#error').hide();
});
//$('#result').hide(20000);



$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  var user_id=$('.user_id').val();
  if(user_id!=''){
  $.ajax({
  url: "<?php echo base_url('support/message')?>",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
   {
        if(data=='Success')
        {
         $("#err").html("<span style='color:green'>Message Send Success</span> !").fadeIn();
         $("#form")[0].reset(); 
        }
        else
        {
         // view uploaded file.
         //$("#preview").html(data);
         $("#err").html("<span style='color:red'>Message Did Not Send! Please Try Again</span> !").fadeIn();
         $("#form")[0].reset(); 
        }
      },         
    });
  }else{
    $("#err").html("<span style='color:red'>Please Select Agent OR Customer</span> !").fadeIn();
  }
 }));
});

</script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">
  function sendMessage()
  {
    var user_id=$('#user_id').val();
    var editor=$('#editor').val();
    var ticket_id=$('#ticket_id').val();
    $.ajax({
      url: '<?php echo base_url('support/sendData')?>',
      type: 'POST',
      data: {'user_id': user_id,'editor': editor,'ticket_id':ticket_id},
      success:function(res)
      {
        if(res=='Message Send SuccessFull!'){
          $('#editor').val('');
        $('#showCity').html('<span style="color:green">'+res+'</span>');
      }
      else{
        $('#editor').val('');
          $('#showCity').html('<span style="color:red">'+res+'</span>');
        }
      }
    });
  }
  $('#showCity').hide(30000);
</script>

<script type="text/javascript">
$(document).ready(function(){
    setInterval(message,1000);
    function message() {
      var ticket='<?php echo $ticket;?>';
      var id='<?php echo $customers[0]->id;?>';
        $.ajax({
          url: '<?php echo base_url('support/details')?>',
          type: 'POST',
          data: {'param': ticket,'id':id},
          success:function(res)
          {
            $('.heughtschat').html(res);
          }
        });
    }
  });
</script>