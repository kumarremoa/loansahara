<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    
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
    <div class="col-md-12">
     <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Send/Revert Balance</h3>            
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <form class="form-horizontal" method="post" autocomplete="off">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Your Avalable Balance : </label>
                    <div class="col-sm-10">
                     <input type="text"  name ="senderbalance" class="form-control" readonly value="<?php echo inr($user['balance']); ?>">
                     <input type="hidden"  name ="siditype" class="form-control" value="<?php echo $user['user_type']; ?>">
                     <input type="hidden" name ="senderId" value="<?php echo $user['id']; ?>">
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="reciverId" class="col-sm-2 control-label">Select User</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" name ="reciverId"style="width: 100%;" >  
                      <option value="" selected="selected"> Select A User </option>
                      <?php foreach($wllist as $wl) { ?>  

                      <option value="<?=$wl['id']?>"> <?=$wl['name']?> - <?=$wl['mobile']?> (<?= inr($wl['balance'])?> )</option>
                      <?php } ?>                                  
                      </select>
                     <?php echo form_error('reciverId','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="paymentType" class="col-sm-2 control-label">Payment Type</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" name="paymentType" style="width: 100%;" >  
                      <option value="Credit" selected="selected"> Send Money</option>
                      <option value="Debit"> Revert Money</option>          
                      </select>
                     <?php echo form_error('paymentType','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">Enter Amount</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="amount" placeholder="Enter Amount" value="">
                      <?php echo form_error('amount','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>     
            <div class="col-lg-2"></div>       
            <div class="form-group col-lg-10">
            <input type="submit" class="btn btn-info btn-flat btn-block" value="Submit" name="fundTransfer">
           </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>

        </div>   
      </div></div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

