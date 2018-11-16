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
                  <h3 class="box-title">Edit - <?php echo !empty($post['code'])?$post['code']:'Template'; ?></h3>                   
                </div>
                <!-- /.box-header -->
                 <form method="post" enctype="multipart/form-data" action="" class="form">
                <div class="box-body">
                  <div class="row">
                   
                  <div class="form-group col-md-6">
                      <label for="title">Module name</label>
                      <input type="text" class="form-control" name="module" placeholder="Enter Module Name..." value="<?php echo !empty($post['module'])?$post['module']:''; ?>">
                      <?php echo form_error('module','<p class="text-danger">','</p>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="code">Code</label>
                      <input type="text" class="form-control" name="code" value="<?php echo !empty($post['code'])?$post['code']:''; ?>">
                  </div>
                <div class="col-md-12">

                  <div class="form-group template-vars">
                    <label for="help-variables">Template Variables</label>
                    <div class="help-variables-div">
                      <p class="line">
                        <span class="col-md-4">
                          <code>{var_user_type}</code>
                        </span>
                        <span class="col-md-7">
                          <strong>: User Type</strong>
                        </span>
                      </p>
                      <p class="line">
                        <span class="col-md-4">
                          <code>{var_user_name}</code>
                        </span>
                        <span class="col-md-7">
                          <strong>: User Name</strong>
                        </span>
                      </p>
                      <p class="line">
                        <span class="col-md-4">
                          <code>{var_sender_name}</code>
                        </span>
                        <span class="col-md-7">
                          <strong>: Sender Name</strong>
                        </span>
                      </p>
                      <p class="line">
                        <span class="col-md-4">
                          <code>{var_logo}</code>
                        </span>
                        <span class="col-md-7">
                          <strong>: Logo</strong>
                        </span>
                      </p>
                      <p class="line">
                        <span class="col-md-4">
                          <code>{var_website_name}</code>
                        </span>
                        <span class="col-md-7">
                          <strong>: Website Name</strong>
                        </span>
                      </p>
                      <p class="line">
                        <span class="col-md-4">
                          <code>{var_user_email}</code>
                        </span>
                        <span class="col-md-7">
                          <strong>: User Email</strong>
                        </span>
                      </p>                      
                    </div>
                  </div></div>
                  <div class="form-group col-md-12">
                      <label for="html" class="col-md-12">HTML File</label><hr>
                      <textarea  class="form-control ckeditor" name="html" rows="10" cols="80">
                        <?php echo !empty($post['html'])?$post['html']:''; ?>            
                      </textarea>
                      <?php echo form_error('html','<p class="text-danger">','</p>'); ?>
                  </div>                                        
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="submit" name="etemplateSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/> </div>                                   
                </div>
            </div>
            </form>
                          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  