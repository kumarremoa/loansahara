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
                 
                <div class="box-body">
                
                 <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Agent Information Edit</a></li>
                  <li><a data-toggle="tab" href="#menu1">Account</a></li>
                </ul>
                 <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                      <h3>Agent Information Edit</h3>
                  <div class="row">
                   <form method="post" enctype="multipart/form-data" action="" class="form">
                        <div class="form-group col-md-6">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
                            <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                        </div>
                        <div class="form-group col-md-6"  style="display: none;">
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
                      </div>

                      <div class="box-footer">
                        <input type="submit" name="ememberSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/> 
                      </div>
                      </form>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Account</h3>
                      <div class="row">
                        <div class="col-md-12">
                          <?php foreach($accounts as $account):?>
                          <form action="<?php echo base_url('agents/account')?>" method="post" enctype="multipart/form-data">
                         <div class="form-group col-md-6">
                            <label for="address2">Bank Name</label>
                            <input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Name" value="<?php echo $account->account_bank_name;?>">
                           
                        </div> 
                          <div class="form-group col-md-6">
                            <label for="address2">Account No</label>
                            <input type="text" class="form-control" name="account_no" placeholder="Enter Account No" value="<?php echo $account->account_no;?>">
                           
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="address2">Account Holder</label>
                            <input type="text" class="form-control" name="holder_name" placeholder="Enter Account Holder" value="<?php echo $account->account_holder_name;?>">
                            
                        </div> 
                       
                        <div class="form-group col-md-6">
                            <label for="address2">Branch</label>
                            <input type="text" class="form-control" name="branch_name" placeholder="Enter Branch Address" value="<?php echo $account->account_branch;?>">
                            
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="address2">ICFC Code</label>
                            <input type="text" class="form-control" name="icfc_code" placeholder="Enter ICFC Code" value="<?php echo $account->account_icfc;?>">
                            
                        </div>
                         <div class="form-group col-md-6">
                            <label for="address2">Personal Contact No</label>
                            <input type="text" class="form-control" name="personal_contact" placeholder="Enter Personal Contact No" value="<?php echo $account->account_contact;?>">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="address2">Pancard No.</label>
                            <input type="text" class="form-control" name="pancard_no" placeholder="Enter Pancard No" value="<?php echo $account->account_pan_no;?>">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="address2">Upload Pancard Image</label>
                            <input type="file" class="form-control" name="userfile" placeholder="Enter Upload Pancard Image">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="address2">Aadhar No.</label>
                            <input type="text" class="form-control" name="adhar_no" placeholder="Enter Aadhar No" value="<?php echo $account->account_adhar_no;?>">
                         
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="address2">Upload Aadhar Card Image</label>
                            <input type="file" class="form-control" name="adhar_image" placeholder="Enter Upload Aadhar Card Image">

                           <input type="hidden" class="form-control" name="email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>" >
                           <input type="hidden" class="form-control" name="pancard_img" value="<?php echo $account->account_pan_image;?>" >

                           <input type="hidden" class="form-control" name="adhar_img" value="<?php echo $account->account_adhar_image;?>" >
                        </div> 
                        <div class="box-footer">
                        <input type="submit" name="ememberSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/> 
                      </div>
                        
                          </form>
                        <?php endforeach;?>
                        </div>

                      </div>
                      
                    </div>
                    
                    
                
                
                </div>
                               
                </div>
            </div>
           
              </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  