    <!-- Main content -->
    <style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
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
          <div class="box-header with-border">
            <h3 class="box-title">White Label Users</h3> 
            <div class="box-tools">

               <?php //if(CheckPermission(WHITELABEL, "own_create")){ ?>
               <!-- <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url();?>white-label-users/setup"><i class="glyphicon glyphicon-plus"></i> Add White Label Users</a>  -->            
              <!-- <a class="btn-sm  btn btn-success btn-flat" href="<?php echo base_url();?>white-label-users/fund"><i class="glyphicon glyphicon-plus"></i> Send/Revert Balance</a>  --> <?php //} ?>            
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>                  
                  <th width="5%">ID</th>
                  <th width="15%">Name</th>
                  <th width="10%">Email</th>
                  <th width="10%">Mobile</th>
                  <th width="10%">Address</th>
                 
                  <th width="10%">Loan Balance</th>
                  <th>Check Agent Assign</th>
                  <th>Status</th>
                  <th width="30%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach($customers as $customer){ ?>
                 <tr>                  
                  <th width="5%"><?php echo $i++;?></th>
                  <th width="5%"><?php echo $customer->name;?></th>
                  <th width="10%"><?php echo $customer->email;?></th>
                  <th width="10%"><?php echo $customer->mobile;?></th>
                  <th width="10%"><?php echo $customer->address1;?></th>
                  
                  <th><?php echo $customer->balance;?></th>
                  <td><button class="btn" data-toggle="modal" data-id="<?php echo $customer->id;?>" data-target="#myModal"><i class="fa fa-bars"></i></button></td>
                  <th><?php  if($customer->status){ echo '<button class="btn"><i class="fa fa-check btn text-success"></i></button>'; } else{ echo '<button class="btn"><i class="fa fa-close text-danger"></i></button>'; } ?></th>
                  <th>
                    <button class="btn"><i class="text-danger fa fa-trash" onclick="ConfirmDelete('<?php echo $customer->id;?>')"></i></button>
                    <a href="<?php echo base_url('loanapply/loanDetail/'.$customer->id);?>" class="btn btn-success"><i class="  fa fa-table" aria-hidden="true"></i></a>
                  </th> 
                </tr>
              <?php }?>
              </tbody> 
            </table>
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
</script>
<script>
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
</script>