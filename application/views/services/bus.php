<style>
.datepicker { width:210px;  }
</style>


<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">          		
			<div class="col-xs-12">
	            <div class="box box-info">
	                <div class="box-header with-border">
	                  <h3 class="box-title">Bus Boooking - By: <?php echo !empty($user['name'])?$user['name']:'User'; ?>

	                  </h3> 
	                  <h3 class="box-title pull-right">Available Main A/c Balance : <?php echo !empty($user['balance'])?inr($user['balance']):'0.00'; ?></h3>
	                  <input type="hidden" class="form-control" id="ubal" name="ubal" value="<?php echo $user['balance']; ?>">
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
			               	<div class="col-md-3"></div>              
			               	<div class="col-md-6 table-bordered" id="senderMobile">	
			               		<h3 class="text-center">Book Your Bus Tickets</h3><hr>
								<div class="form-group col-md-4">
			                        <select class="form-control select2" id="origin" name="origin" onchange="return destinationList()"></select>  
			                    </div>
			                    <div class="form-group col-md-4">
			                        <select class="form-control select2" id="destination" name="destination">
			                        	<option value="x">Select Destination</option>
			                        </select>  
			                    </div>
			                    <div class="form-group col-md-4">
			                        <div class="input-group date"  data-provide="datepicker" >
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text"class="form-control pull-right" id="dateselector" readonly="readonly" placeholder="Select Date">
					                </div>
			                    </div>
			                    <div class="form-group col-md-12">
			                        <input type="submit" name="checkUser" id="checkUser" class="btn btn-primary btn-flat btn-block" value="Search"/> 
			                    </div>			                    
			                </div>              
			               	<div class="col-md-3"></div> 
			               	<div class="clearfix"></div> 
			            </div>  
	                </div>
	            </div>	                                    
     		</div>
        </div>

    </section>
  </div>
