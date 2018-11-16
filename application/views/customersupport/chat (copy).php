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
                  <?php foreach($admins as $admin){?>
                    <div class="col-md-6">
                           <div class="panel panel-success">
                                <div class="panel-heading">All Chat List</div>
                                <div class="panel-body">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#admin">Admin</a></li>
                                    <li><a data-toggle="tab" href="#Customer">Customer</a></li>
                                    <li><a data-toggle="tab" href="#Agent">Agent</a></li>
                                    <li><a data-toggle="tab" href="#support">Customer Care</a></li>
                                  </ul>
                                  <div class="tab-content">
                                      <div id="admin" class="tab-pane fade in active">
                                        <?php foreach($admins as $admin){?>
                                          <div class="chat">
                                            <a href="javascript:void(0);" onclick="selectChat('<?php  echo $admin->id;?>');"><img src="<?php echo base_url();?>fronts/images/avatar-05.png"  alt="Avatar" style="width:10%;"></a>
                                            <p><?php echo $admin->name;?></p>
                                          </div>
                                        <?php }?>
                                      </div>
                                    </div>
                              </div>
                              </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel-group">
                            <div class="panel panel-default">
                              <div class="panel-heading">All Users</div>
                                <div class="panel-body">
                                  <div id="London" class="tabcontent">
                                    <h3>London</h3>
                                      <p>London is the capital city of England.</p>
                                  </div>
                                </div>
                            </div>
                          </div>
                    </div>
                  <?php }?>
                 </div>
                    
                </div>
             </div>
          </div>
          <!-- /.box-body -->
        </div>

        </div>   
      </div>
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Select Agent</h4>
            </div>
           
              <div class="modal-body mx-3">
                
                <form id="formtopost" method="post">
                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Agent Name</label>
                    <select id="agent_id" class="form-control validate">
                      <option value="">Please Select Agent</option>
                      <?php foreach($agents as $agent):?>
                      <option value="<?php echo $agent->id?>"><?php echo $agent->name?></option>
                    <?php endforeach;?>
                    </select>
                    <div id="error">
                      
                    </div>
                    <input type="hidden" id="customer_id" class="form-control validate roomNumber" value="">
                </div>
                <br>
                <button type="button" class="btn btn-default" id="aht_btn"  name="submit">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div id="cont" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <center><h1><span class="text-success showing"> Agent Selected Successsfull</span></h1></center>
            </div>
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
function ConfirmDelete(id)
{
  if(confirm("Are you sure you want to delete?" + id))
  {
      $.ajax({
            type:"POST",
            url : "<?php echo base_url('customer/Delete');?>",
            data:{"customer_id":id } ,
            success : function(data){
              $('#myModal').modal('hide');
              $('.showing').html(data);
              $('#cont').modal('show');
              setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 5000); 
            } 
        });
  }else{
    alert('Customer did not delete!');
  }
}
function selectChat(argument) {
   var user_id=$('#user_id').val(argument);
    var chat='<?php echo $this->session->userdata('userId')?>';
    $.ajax({
        type:"POST",
        url : "<?php echo base_url('support/selectId');?>",
        data:{"customer_id":argument,"chat_id":chat } ,
        success : function(data){
         cus=jQuery.parseJSON(data);
         console.log(cus);
          if(cus['id'][0]['user_type']==3)
          {
            $('#message_id1').html('Agent ' +cus['id'][0]['name']);
              $("p").append("");
          }else if(cus['id'][0]['user_type']==4){
            $('#message_id1').html('Customer ' + cus['id'][0]['name']);
          }else if(cus['id'][0]['user_type']==2){
            $('#message_id1').html('Development '+cus['id'][0]['name']);
          }else if(cus['id'][0]['user_type']==1){
            $('#message_id1').html('Admin ' + cus['id'][0]['name']);
          } 
          else{
            $('#message_id1').html('Please Select Name');
          }
        }
    });
}

/*function fetchData(){
 name= '<?php echo $name?>';
    $.ajax({
        url: '<?php echo base_url('support/message')?>',
        type: 'POST',
        cache:false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        data: {'user_id':user_id,'name':name},
        success:function(res)
        {
          alert(res);
        }
      }); 
}*/
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