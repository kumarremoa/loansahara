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
            
                <div class="col-xs-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <form method="post" action="" class="form">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Member Name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
                                    <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" >
                                    <option value="1" <?php echo ($post['status'] == 1)?'selected="selected"':''?>>Active</option> 
                                    <option value="0" <?php echo ($post['status'] == 0)?'selected="selected"':''?> >Inactive</option>
                                    </select>
                                    <?php echo form_error('status','<p class="text-danger">','</p>'); ?>
                                </div>  
                                <div class="form-group col-xs-12">
                                <input type="submit" name="epermissiontypeSubmit" class="btn btn-primary" value="Submit"/> </div>
                            </form>
                        </div>
                    </div>
                </div>
            
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->