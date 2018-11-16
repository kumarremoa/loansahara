    <!-- Main content -->
    <style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
}
    </style>
        <?php  foreach($customers as $customer){ 
           $total=round(($customer->balance + ($customer->balance /$customer->month_emi))/$customer->month_emi);
                   $compound=$total * $customer->month_emi / 100 + $total;
          ?>
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
          <h2 class="box-title"><button  class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo $customer->id?>">Cibil Check</a></h2> 
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body"> 
          
          <div class="row">
           
            
               
            <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->name?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $customer->email?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->mobile?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"> Address1</label>
                <textarea disabled  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ><?php echo $customer->address1?></textarea>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"> Address2</label>
                <textarea disabled  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ><?php echo $customer->address2?></textarea>
                
              </div>
            </div>
           
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">City</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$city[0]->name ? @$city[0]->name: '1';?>">
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"></label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$state[0]->name ? @$state[0]->name : '1';?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Country</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$country[0]->name ? @$country[0]->name : 'india';?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Pincode</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->pincode?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Profile Image</label><br>
                 <input disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $customer->name?>">
                 <?php if(@$customer->profile_pic!=''){?>
                 <input disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $customer->name?>">
                 <a href="#" data-toggle="modal" data-target=".dialog1">
                <img src="<?php echo base_url('profiles/'.$customer->profile_pic)?>" class="img-rounded" alt="Cinque Terre" width="200" height="200"></a>
                <?php } else{ ?>
                  <img src="<?php echo base_url('assets/uploads/profile.png')?>" class="img-rounded" alt="Cinque Terre" width="100" height="100">
                <?php }?>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Aadhar No And image</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo @$customer->aadhar_no?>">
                <?php if(@$customer->aadhar_pic!=''){?>
                  <a href="#" data-toggle="modal" data-target=".dialog2">
                <img src="<?php echo base_url('aadhar/'.$customer->aadhar_pic)?>" class="img-rounded" alt="Cinque Terre" width="100" height="100"></a>
                <?php } else{ ?>
                  <img src="<?php echo base_url('assets/uploads/adhar.png')?>" class="img-rounded" alt="Cinque Terre" width="100" height="100">
                <?php } ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">PanCard No and Image</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo @$customer->pan_no?>">
                 <?php if(@$customer->pan_pic!=''){?>
                   <a href="#" data-toggle="modal" data-target=".dialog3">
                <img src="<?php echo base_url('pancard/'.$customer->pan_pic)?>" class="img-rounded" alt="Cinque Terre" width="100" height="100"></a>
                <?php } else{ ?>
                  <img src="<?php echo base_url('assets/uploads/pancard.jpeg')?>" class="img-rounded" alt="Cinque Terre" width="100" height="100">
                <?php }?>
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Loan Balance</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $customer->balance;?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Montly EMI</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo round($compound);?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Intrest Rate</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $customer->intrest_rate;?> %">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Total Emi</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $customer->month_emi;?>">
              </div>
            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input  type="button" onclick="submitApproved();" class="form-control btn btn-info"  value="Submit Approve for Loan" name="submit">
              </div>
            </div>
          </div>
      
          </div>
          <!-- /.box-body -->
           <?php }?>
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
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Cibil Check</label>
                    <input id="agent_id" class="form-control validate">
                     
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
function submitApproved() {
  if(confirm("Do You Want To Loan Approved")){
    id='<?php echo $customers[0]->id;?>';
   $.ajax({
     url: '<?php echo base_url('payment/loan');?>',
     type: 'POST',
     data: {'parent_id': id},
     success:function(arg) {
       if(arg)
       {
         alert('Confirm');
         window.history.back();
       }else{
         alert('Cancel');
       }
     }
   });
 }
 else{
  alert('Cancel');
 }
}
</script>
