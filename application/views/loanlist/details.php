    <!-- Main content -->
    <style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
}
.bs-linebreak {
  height:10px;
}
    </style>
     <?php foreach($customers as $customer):?>
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
          <h2 class="box-title">
            <a  class="btn btn-success"  href="<?php echo base_url('loanapply/emiCheck/').$customer->id?>">Total Emi</a></h2> 
          <h2 class="box-title">
            <button  class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo $customer->id?>">Cibil Check</button></h2> 
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
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $city[0]->name;?>">
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
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $state[0]->name;?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Country</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $country[0]->name;?>">
                
              </div>
            </div>
            
            <hr>
            </div>
          </div>
        
          </div>
          <div class="box-body"> 
            <div class="row">
           
            <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Loan Type</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->loan_type;?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->balance?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Loan EMI</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $customer->month_emi?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Intrest Rate</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->intrest_rate?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Payment Type</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->emi_type_payment?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Tenure</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->tenure?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Cash Payment</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->amount?>">
                
              </div>
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
              <h4 class="modal-title">Cibil Check</h4>
            </div>
           
              <div class="modal-body mx-3">
                
                <form id="formtopost" method="post">
                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Agent Name</label>
                    <input type="text" onkeyup="" id="agent_id" class="form-control validate">
                      
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
             <center><h1><span class="text-success"> Agent Selected Successsfull</span></h1></center>
            </div>
          </div>

        </div>
      </div>
       <div class="modal fade dialog1" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myLargeModalLabel-1">Profile Image</h4>
                    </div>
                    <div class="modal-body active">
                        <img src="<?php echo base_url('profiles/'.$customer->profile_pic)?>" class="img-responsive img-rounded center-block" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!--  Modal content for House Image -->
        <div class="modal fade dialog2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-2" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myLargeModalLabel-2">Aadhar card</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url('aadhar/'.$customer->aadhar_pic)?>" class="img-responsive img-rounded center-block" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!--  Modal content for House Image -->
        <div class="modal fade dialog3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-2" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myLargeModalLabel-3">Pancard</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url('pancard/'.$customer->pan_pic)?>" class="img-responsive img-rounded center-block" alt="" />
                    </div>
                </div>
            </div>
        </div>
      <!-- /.row -->
    </section>
      <?php endforeach;?>
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
          if(agent!=0){
            $.ajax({
            type:"POST",
            url : "<?php echo base_url('customer/cibilCheck');?>",
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
