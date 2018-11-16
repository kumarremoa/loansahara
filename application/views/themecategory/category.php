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
            <h3 class="box-title">Theme Category </h3>    
              <div class="box-tools">
                 <?php if(CheckPermission(THEMECAT, "own_create")){ ?>
                 <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url();?>themeCategory/cat_add"><i class="glyphicon glyphicon-plus"></i> Add Theme Category</a>  <?php } ?>            
              </div>        
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="themeCategory" class="cell-border table table-striped table1">
              <thead>
                <tr>                  
                  <th>ID</th>
                  <th>Category Name</th>
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

