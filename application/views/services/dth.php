<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">          		
			<div class="col-xs-12">
	            <div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title hidden-print">DTH Recharge - By: <?php echo !empty($user['name'])?$user['name']:'User'; ?>

	                  </h3> 
	                  <h3 class="box-title pull-right hidden-print">Available Main A/c Balance : <?php echo !empty($user['balance'])?inr($user['balance']):'0.00'; ?></h3>
	                  <div class="visible-print-block text-center"><img src='<?php echo base_url().'assets/images/'.setting_all('logo');?>' style="width:20%" ><hr><p style="font-size: 14dp;">Address : <?php echo !empty($user['address1'])?$user['address1']:''; ?>, <?php echo !empty($user['address2'])?$user['address2']:''; ?><?php echo !empty($user['city'])?$user['city']:''; ?>, <?php echo !empty($user['state'])?$user['state']:''; ?> - <?php echo !empty($user['pincode'])?$user['pincode']:''; ?><br> Email : <?php echo !empty($user['email'])?$user['email']:''; ?> | Mobile : <?php echo !empty($user['mobile'])?$user['mobile']:''; ?></p>
	                  </div>
	                  <input type="hidden" class="form-control" id="ubal" name="ubal" value="<?php echo $user['balance']; ?>">
	                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id']; ?>">
	                </div>
	                <div class="box-body">	  
	               	<div class="col-md-4"></div>              
	               	<div class="col-md-4">
	               		<?php 
			                if(!empty($success_msg)){
			                    echo '<div class="alert alert-success">'.$success_msg.'</div>';
			                }elseif(!empty($error_msg)){
			                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
			                }
			            ?>
	               	</div>              
	               	<div class="col-md-4"></div>  
	                </div>
	                <!-- /.box-header -->	              
	                <div class="box-body" >	
						<div id="mtval">
			               	<div class="col-md-4"></div>              
			               	<div class="col-md-4 table-bordered" id="senderMobile">	
			               		<h3 class="text-center">DTH Recharge</h3><hr>
								<div class="form-group col-md-12">
			                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Customer Id..." value="">  
			                    </div>
			                    <div class="form-group col-md-12">
			                        <select class="form-control select2" id="operator" name="operator"></select>
			                    </div>
			                    <div class="form-group col-md-12">
			                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount..." value="">  
			                    </div>
			                    <div class="form-group col-md-12">
			                        <input type="submit" name="checkUser" id="rechargeDth" class="btn btn-primary btn-flat btn-block" value="Submit"/> 
			                    </div>			                    
			                </div>              
			               	<div class="col-md-4"></div> 
			               	<div class="clearfix"></div> 
			            </div>  
	                </div>
	            </div>	                                    
     		</div>
        </div>

    </section>
  </div>
