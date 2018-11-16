    <!-- Main content -->
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
            <h3 class="box-title">Payment Gateway Request</h3>
           <!--  <div class="box-tools">
               <?php if(CheckPermission(AGENTS, "own_create")){ ?>
               <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url();?>agents/add"><i class="glyphicon glyphicon-plus"></i> Add Agent User</a>             
              <a class="btn-sm  btn btn-success btn-flat" href="<?php echo base_url();?>agents/fund"><i class="glyphicon glyphicon-plus"></i> Send/Revert Balance</a>  <?php } ?>            
            </div> -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="paymentgateway" class="cell-border table table-striped table1">
              <thead>
                <tr>                  
                  <th>ID</th>
                  <th>Business Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Gateway Type</th>
                  <th>Apply Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody> 
            </table>
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

<!-- Payment gateway View Detail -->
   <div class="modal fade" id="viewdetailmodal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
          <div id=""></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Payment gateway View Detail -->
