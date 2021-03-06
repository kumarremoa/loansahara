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
            <h3 class="box-title">Master Distributors Users</h3>
            <div class="box-tools">
               <?php if(CheckPermission(MASTER, "own_create")){ ?>
               <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url();?>master-distributors-users/add"><i class="glyphicon glyphicon-plus"></i> Add Master Distibutor User</a>             
              <a class="btn-sm  btn btn-success btn-flat" href="<?php echo base_url();?>master-distributors-users/fund"><i class="glyphicon glyphicon-plus"></i> Send/Revert Balance</a>  <?php } ?>            
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="masterDistributor" class="cell-border table table-striped table1">
              <thead>
                <tr>                  
                  <th width="7%">ID</th>
                  <th width="5%">PIC</th>
                  <th width="15%">Name</th>
                  <th width="20%">Email</th>
                  <th width="10%">Mobile</th>
                  <th>Balance</th>
                  <th>City</th>
                  <th>KYC Status</th>
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

