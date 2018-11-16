<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-xs-12">
            <?php 
                if(!empty($success_msg)){
                    echo '<div class="alert alert-success">'.$success_msg.'</div>';
                }elseif(!empty($error_msg)){
                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
            ?>
            </div>
            <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add User</h3>
            </div>
                <!-- /.box-header -->
                 <form method="post" enctype="multipart/form-data" action="" class="form">
                <div class="box-body">
                  <div class="row">
                   
                    <div class="form-group col-md-6">
                        <label for="title">Category Name</label>
                        <input type="text" class="form-control" name="catname" placeholder="Enter Name" value="<?php echo !empty($post['cat_name'])?$post['cat_name']:''; ?>">
                        <?php echo form_error('cat_name','<p class="text-danger">','</p>'); ?>
                    </div>                                        
                    </div>                                        
                    <div class="row">
	                    <div class="form-group col-md-6">
	                        <label for="status">Status</label>
	                        <select class="form-control" name="status" >
	                        <option value="1">Active</option>
	                        <option value="0">Inactive</option>
	                        </select>
	                        <?php echo form_error('status','<p class="text-danger">','</p>'); ?>
	                    </div>  
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="submit" name="userSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/> </div>                                   
                </div>
            </div>
            </form>
                          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    