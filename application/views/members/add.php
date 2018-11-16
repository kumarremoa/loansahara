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
                            <form method="post" enctype="multipart/form-data" action="" class="form">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Member Name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
                                    <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Member Email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>">
                                    <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter Member Password" value="<?php echo !empty($post['password'])?$post['password']:''; ?>">
                                    <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Re-Password</label>
                                    <input type="password" class="form-control" name="repassword" placeholder="ReEnter Member Password" value="<?php echo !empty($post['repassword'])?$post['repassword']:''; ?>">
                                    <?php echo form_error('repassword','<p class="text-danger">','</p>'); ?>
                                </div>                                
                                <div class="form-group">
                                    <label for="phone">Mobile</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter Member Mobile Number" value="<?php echo !empty($post['phone'])?$post['phone']:''; ?>">
                                    <?php echo form_error('phone','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select  class="form-control" name="type" >
                                    <option value="1">Admin</option>
                                    <option value="2" selected="selected">Lead Manager</option>
                                    <option value="3">Blogger</option>
                                    <option value="4">Employee</option>
                                    </select>
                                    <?php echo form_error('gender','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" >
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    </select>
                                    <?php echo form_error('status','<p class="text-danger">','</p>'); ?>
                                </div>                                
                                <div class="form-group">
                                  <label for="content">Upload Profile Picture</label>
                                  <input class="form-control" type="file" name="pic"/>
                                  <?php echo form_error('pic','<p class="text-danger">','</p>'); ?>                                
                                </div>
                                <div class="form-group col-xs-12">
                                <input type="submit" name="memberSubmit" class="btn btn-primary" value="Submit"/> </div>
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

  