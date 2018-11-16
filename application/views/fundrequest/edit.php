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
                  <h3 class="box-title">Edit - <?php echo !empty($post['name'])?$post['name']:'User'; ?></h3> 
                  <h3 class="box-title pull-right">Avalable Balance : <?php echo !empty($post['balance'])?inr($post['balance']):'0.00'; ?></h3>
                </div>
                <!-- /.box-header -->
                 <form method="post" enctype="multipart/form-data" action="" class="form">
                <div class="box-body">
                  <div class="row">
                   
                                        <div class="form-group col-md-6">
                                            <label for="title">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
                                            <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="title">API Key</label>
                                            <input type="text" class="form-control" name="api_key" value="<?php echo !empty($post['api_key'])?$post['api_key']:''; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>" disabled>
                                            <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password" value="">
                                            <?php echo form_error('password','<p class="text-danger">','</p>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="repassword">Re-Password</label>
                                            <input type="password" class="form-control" name="repassword" placeholder="ReEnter Password" value="">
                                            <?php echo form_error('repassword','<p class="text-danger">','</p>'); ?>
                                        </div>                                
                                        <div class="form-group col-md-6">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="<?php echo !empty($post['mobile'])?$post['mobile']:''; ?>">
                                            <?php echo form_error('mobile','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="aadhar_no">Aadhar Number</label>
                                            <input type="text" class="form-control" name="aadhar_no" placeholder="Enter Aadhar Number" value="<?php echo !empty($post['aadhar_no'])?$post['aadhar_no']:''; ?>">
                                            <?php echo form_error('aadhar_no','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="address1">Address line 1</label>
                                            <input type="text" class="form-control" name="address1" placeholder="Enter Address (Flat No / Floor/ Unit No)" value="<?php echo !empty($post['address1'])?$post['address1']:''; ?>">
                                            <?php echo form_error('address1','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="address2">Address line 2</label>
                                            <input type="text" class="form-control" name="address2" placeholder="Enter (Area/Land Mark/ Socity)" value="<?php echo !empty($post['address2'])?$post['address2']:''; ?>">
                                            <?php echo form_error('address2','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="city">City</label>
                                            <select class="form-control select2" name="city" >
                                                <?php
                                                      foreach($citylist as $city)
                                                      {
                                                          ?>
                                                          <option <?php echo !empty($post['city'] == $city['id'])? 'Selected':''; ?>  value="<?=$city['id']?>"> <?=$city['name']?> </option>
                                                          <?php
                                                      }
                                                      ?>                                  
                                            </select>
                                            <?php echo form_error('city','<p class="text-danger">','</p>'); ?>
                                        </div>                                      
                                        <div class="form-group col-md-6">
                                            <label for="state">State</label>
                                            <select class="form-control select2" name="state" >
                                                <?php
                                                      foreach($statelist as $state)
                                                      {
                                                          ?>
                                                          <option <?php echo !empty($post['state'] == $state['id'])? 'Selected':''; ?>  value="<?=$state['id']?>"> <?=$state['name']?> </option>
                                                          <?php
                                                      }
                                                      ?>                                  
                                            </select>
                                            <?php echo form_error('state','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="country">Country</label>
                                            <select class="form-control select2" name="country" >
                                                <?php
                                                      foreach($countrylist as $country)
                                                      {
                                                          ?>
                                                          <option <?php echo !empty($country['id'] == '103' )? 'Selected':''; ?>  value="<?=$country['id']?>"> <?=$country['name']?> </option>
                                                          <?php
                                                      }
                                                      ?>                                  
                                            </select>
                                            <?php echo form_error('country','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" value="<?php echo !empty($post['pincode'])?$post['pincode']:''; ?>">
                                            <?php echo form_error('pincode','<p class="text-danger">','</p>'); ?>
                                        </div> 
                                        <div class="form-group col-md-6">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" >
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                            </select>
                                            <?php echo form_error('status','<p class="text-danger">','</p>'); ?>
                                        </div>                                
                                        <div class="form-group col-md-6">
                                          <label for="content">Upload Profile Picture</label>
                                          <input class="form-control" type="file" name="pic"/>
                                          <?php echo form_error('pic','<p class="text-danger">','</p>'); ?>                                
                                        </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="submit" name="ememberSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/> </div>                                   
                </div>
            </div>
            </form>
                          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  