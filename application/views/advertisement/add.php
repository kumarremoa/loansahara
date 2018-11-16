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
                  <h3 class="box-title">Add Banner</h3>
            </div>
                <!-- /.box-header -->
                 <form method="post" enctype="multipart/form-data" action="" class="form">
                <div class="box-body">
                  <div class="row">
                   
                      <div class="form-group col-md-6">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="<?php echo !empty($post['title'])?$post['title']:''; ?>">
                          <?php echo form_error('title','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="position">Position</label>
                          <select name="position" id="position" class="form-control select2">
                            <option value="">Select Position</option>
                             <?php foreach($positionlist as $position) { ?>
                                <option value="<?php echo $position['id']?>"> <?php echo $position['title']?> </option>
                             <?php } ?>    
                          </select>
                          <?php echo form_error('position','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="image">Image</label>
                          <input type="file" class="form-control" name="image" id="image" placeholder="Select Image">
                          <?php echo form_error('image','<p class="text-danger">','</p>'); ?>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="priority">Priority</label>
                          <input type="text" class="form-control" name="priority" id="priority" placeholder="Enter priority" value="<?php echo !empty($post['priority'])?$post['priority']:''; ?>">
                          <?php echo form_error('priority','<p class="text-danger">','</p>'); ?>
                      </div>                                
                      <div class="form-group col-md-6">
                          <label for="status">Status</label>
                          <select name="status" id="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Dective</option>
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

    