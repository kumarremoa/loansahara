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
            <h3 class="box-title">Add Banners</h3>
            <div class="box-tools">
               <?php if(CheckPermission(WHITELABEL, "own_create")){ ?>
               <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url();?>Addbanner/add"><i class="glyphicon glyphicon-plus"></i> Add Banners</a>             
             <!--  <a class="btn-sm  btn btn-success btn-flat" href="<?php echo base_url();?>white-label-users/fund"><i class="glyphicon glyphicon-plus"></i> Send/Revert Balance</a>   -->      
             <?php } ?>      
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="AddBanners" class="cell-border table table-striped table1">
              <thead>
                <tr>                  
                  <th width="5%">ID</th>
                  <th width="5%">Title</th>
                  <th width="15%">Position</th>
                  <th width="20%">Image</th>
                  <th width="10%">Priority</th>
                  <th width="10%">created_date</th>
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

