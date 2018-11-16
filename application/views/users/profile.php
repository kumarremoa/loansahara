<section class="content">
  
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
          <?php          
              if($care['kyc_status'] == 0){
                 echo '<div class="alert alert-info"> Please Updated Your KYC</div>';
              }elseif($care['kyc_status'] == 1){
                  echo '<div class="alert alert-warning"> KYC has been submitted for approval.</div>';
              }
          ?>
          </div> 
        <div class="col-md-3">
           <?php
            if ($user['profile_pic'] != "") {
              $images = site_url('assets/uploads/').$user['profile_pic'];   
            }else{      
              $images = site_url('assets/img/')."avatar5.png";      
            }
          ?>
          <!-- Profile Image -->
          <div class="box box-danger">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $images; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $user['name']; ?></h3>

              <p class="text-muted text-center">Member since <?php echo $user['created_date']; ?></p>
              
                 <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                <p class="text-muted"><?php echo $user['address1']; ?><br><?php echo $user['address2']; ?><br><?php echo $user['city_name']; ?>, <?php echo $user['state_name']; ?><br><?php echo $user['country_name']; ?> - <?php echo $user['pincode']; ?></p>                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">         
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">Profile Details</a></li>
              <li><a href="#cpassword" data-toggle="tab">Change Password</a></li>
              <li><a href="#kyc" data-toggle="tab">KYC</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
                 <form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($care['name'])?$care['name']:''; ?>">
                     <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                     <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo !empty($care['email'])?$care['email']:''; ?>" disabled>
                      <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label">Mobile</label>

                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" value="<?php echo !empty($care['mobile'])?$care['mobile']:''; ?>">
                                            <?php echo form_error('mobile','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="aadhar_no" class="col-sm-2 control-label">Aadhar Number</label>

                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="aadhar_no" placeholder="Enter Aadhar Number" value="<?php echo !empty($care['aadhar_no'])?$care['aadhar_no']:''; ?>">
                                            <?php echo form_error('aadhar_no','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pan_no" class="col-sm-2 control-label">PAN Number</label>

                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="pan_no" placeholder="Enter PAN Number" value="<?php echo !empty($care['pan_no'])?$care['pan_no']:''; ?>">
                      <?php echo form_error('pan_no','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic" class="col-sm-2 control-label">Profile Picture</label>

                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="pic"/>
                      <?php echo form_error('pic','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address1" class="col-sm-2 control-label">Address 1</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address1" placeholder="Enter Address (Flat No / Floor/ Unit No)" value="<?php echo !empty($care['address1'])?$care['address1']:''; ?>">
                      <?php echo form_error('address1','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address2" class="col-sm-2 control-label">Address 2</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address2" placeholder="Enter (Area/Land Mark/ Socity)" value="<?php echo !empty($care['address2'])?$care['address2']:''; ?>">
                      <?php echo form_error('address2','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">City</label>

                    <div class="col-sm-10">
                      <select class="form-control select2" name="city" >
                          <?php
                                foreach($citylist as $city)
                                {
                                    ?>
                                    <option <?php echo !empty($care['city'] == $city['id'])? 'Selected':''; ?>  value="<?=$city['id']?>"> <?=$city['name']?> </option>
                                    <?php
                                }
                                ?>                                  
                      </select>
                      <?php echo form_error('city','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="state" class="col-sm-2 control-label">State</label>

                    <div class="col-sm-10">
                       <select class="form-control select2" name="state" >
                            <?php
                                  foreach($statelist as $state)
                                  {
                                      ?>
                                      <option <?php echo !empty($care['state'] == $state['id'])? 'Selected':''; ?>  value="<?=$state['id']?>"> <?=$state['name']?> </option>
                                      <?php
                                  }
                                  ?>                                  
                        </select>
                        <?php echo form_error('state','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="country" class="col-sm-2 control-label">Country</label>

                    <div class="col-sm-10">
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
                  </div>
                  <div class="form-group">
                    <label for="pincode" class="col-sm-2 control-label">Pincode</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pincode" placeholder="Enter Pincode" value="<?php echo !empty($care['pincode'])?$care['pincode']:''; ?>">
                                            <?php echo form_error('pincode','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       <input type="submit" class="btn btn-info btn-flat btn-block" value="Submit" name="updateInfo">
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="cpassword">
                
                 <form class="form-horizontal" method="post" action="">                 
                  <div class="form-group">
                    <label for="opassword" class="col-sm-2 control-label">Old Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="opassword" name="opassword" placeholder="Enter Old Password" value="">
                       <?php echo form_error('opassword','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="npassword" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="Enter New Password" value="">
                       <?php echo form_error('npassword','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="rnpassword" class="col-sm-2 control-label">Re-New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="rnpassword" name="rnpassword" placeholder="Re-Enter New Password" value="">
                       <?php echo form_error('rnpassword','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-info btn-flat btn-block" value="Submit" name="changePassword">
                    </div>
                  </div>
                </form>
              </div>
               <div class="tab-pane" id="kyc">
                
                 <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data">     

                  <div class="form-group">
                    <label for="aadhar_no" class="col-sm-2 control-label">Aadhar Number</label>

                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="aadhar_no" placeholder="Enter Aadhar Number" value="<?php echo !empty($kyc['aadhar_no'])?$kyc['aadhar_no']:''; ?>">
                                            <?php echo form_error('aadhar_no','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>          
                  <div class="form-group">
                    <label for="aadharpic" class="col-sm-2 control-label">Upload Aadhar Card</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" name="aadharpic"/>
                      <?php echo form_error('aadharpic','<p class="text-danger">','</p>'); ?>
                      <?php echo !empty($kyc['aadhar_pic'])?'<a target="blank" href="'. base_url('assets/uploads/').$kyc['aadhar_pic'].'">View Picture</a>':''; ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pan_no" class="col-sm-2 control-label">PAN Number</label>

                    <div class="col-sm-10">
                     <input type="text" class="form-control" name="pan_no" placeholder="Enter PAN Number" value="<?php echo !empty($kyc['pan_no'])?$kyc['pan_no']:''; ?>">
                      <?php echo form_error('pan_no','<p class="text-danger">','</p>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="panpic" class="col-sm-2 control-label">Upload PAN Card</label>

                    <div class="col-sm-10">
                       <input class="form-control" type="file" name="panpic"/>
                      <?php echo form_error('panpic','<p class="text-danger">','</p>'); ?>
                      <?php echo !empty($kyc['pan_pic'])?'<a target="blank" href="'. base_url('assets/uploads/').$kyc['pan_pic'].'">View Picture</a>':''; ?>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-info btn-flat btn-block"<?php echo ($kyc['kyc_status'] != 0)?'disabled':''; ?>   value="Submit" name="updateKyc">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section></div>