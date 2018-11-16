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
            <h3 class="box-title">Users Permisssion Manager</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body"> 
			<div class="tab-pane " id="permissionSetting">
                          
                          <div class="panel-group" id="accordion">
                            <h5 class="over-title">
                              <div class="row form-horizontal">
                                <div class="col-md-3">
                                  <a class="btn btn-o btn-success" id="addmoreRoles" href="#"><i class="fa fa-plus"></i> Add User Type</a>
                                </div>
                                <div class="col-md-9">
                                  <div class="form-horizontal"  id="addmoreRolesShow">
                                    <form>
                                      <div class="form-group">
                                        <label for="roles" class="control-label col-md-2 thfont">User Type</label>
                                        <div class="col-md-5">
                                          <input type="text" name="roles"  id="roles"  class="form-control" placeholder="Enter User Roles" />
                                          <p id="showRolesMSG" style="color:red;"></p>
                                        </div>
                                        <button type="button" id="rolesAdd" class="btn  btn-success">Add</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </h5>   
                          </div> 
                          <form class="form-horizontal" action="<?php echo base_url().'users/permissionsave' ?>" method="post">
                          <?php 
                          $permission = $permissionlist;                           
                          $setPermission =array();
                          $own_create = '';$own_read = '';$own_update = '';$own_delete = '';
                          $all_create = '';$all_read = '';$all_update = '';$all_delete = '';
                          $i=0;
                          $permission = isset($permission)&&is_array($permission)&&!empty($permission)?$permission:array();

                          if(isset($permission[1])) {
                            foreach($permission as $perkey=>$value){
                              $id = isset($value->id)?$value->id:'';
                              $userName = isset($value->userName)?$value->userName:'';
                              $userId = isset($value->userId)?$value->userId:'';
                              $user_type = isset($value->user_type)?$value->user_type:'';
                              $data = isset($value->data)?json_decode($value->data):'';

                              if($user_type=='12'){}else{
                          ?>
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $id;?>"><i class="fa fa-bars"></i> <?php echo  'Permissions for: '. ucfirst($userName);?></a></h4>
                                  </div>
                                  <div id="collapse_<?php echo $id;?>" class="panel-collapse collapse <?php if($i==0){echo"in";}?>">
                                    <div class="panel-body">
                                      <table class="table table-bordered dt-responsive rolesPermissionTable">
                                        <thead>
                                          <tr class="showRolesPermission">
                                            <th scope="col">Modules</th>
                                            <th scope="col">Create</th>
                                            <th scope="col">Read</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                          if(isset($data) && !empty($data)){
                                            foreach($data as $perkey=>$valueR){
                                              $perkey = isset($perkey)?$perkey:'';
                                              $valueR = isset($valueR)?$valueR:'';
                                              if(isset($valueR)) {
                                                $setPermissionCheck = $valueR;
                                                $own_create = isset($setPermissionCheck->own_create)?$setPermissionCheck->own_create:'';
                                                $own_read = isset($setPermissionCheck->own_read)?$setPermissionCheck->own_read:'';
                                                $own_update = isset($setPermissionCheck->own_update)?$setPermissionCheck->own_update:'';
                                                $own_delete = isset($setPermissionCheck->own_delete)?$setPermissionCheck->own_delete:'';
                                                $all_create = isset($setPermissionCheck->all_create)?$setPermissionCheck->all_create:'';
                                                $all_read = isset($setPermissionCheck->all_read)?$setPermissionCheck->all_read:'';
                                                $all_update = isset($setPermissionCheck->all_update)?$setPermissionCheck->all_update:'';
                                                $all_delete = isset($setPermissionCheck->all_delete)?$setPermissionCheck->all_delete:'';
                                              } else {
                                                $setPermissionCheck =array();$own_create = '';$own_read = '';$own_update = '';$own_delete = '';
                                                $all_create = '';$all_read = '';$all_update = '';$all_delete = '';
                                              }
                                             
                                            ?>

                                              <tr>
                                                <th scope="col" colspan="5" class="showRolesPermission text-center"><?php echo ucfirst(str_replace('_', ' ', $perkey));?>
                                                  <?php  
                                                        $perkey = str_replace(' ', '_SPACE_', $perkey); 
                                                        $user_type = str_replace(' ', '_SPACE_', $user_type); 
                                                  ?>
                                                  <input type="hidden" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>]" value="<?php echo $perkey;?>" />
                                                </th>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="thfont">Own Entries</th>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_create]" value="1" <?php if($own_create==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_read]"  value="1" <?php if($own_read==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_update]"  value="1" <?php if($own_update==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_delete]" value="1" <?php if($own_delete==1){echo"checked";}?>/></td>
                                              </tr>
                                              <tr>
                                                <th scope="row" class="thfont">All Entries</th>
                                                <td>-</td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_read]"  value="1" <?php if($all_read==1){echo"checked";}?>/></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_update]"  value="1" <?php if($all_update==1){echo"checked";}?> /></td>
                                                <td><input type="checkbox" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_delete]" value="1" <?php if($all_delete==1){echo"checked";}?>/></td>
                                              </tr>                                              
                                      <?php }
                                      		$array = json_decode(json_encode($data), True);
                                      		foreach($array as $key1=>$vad) {
                                      			$key1 = str_replace('_SPACE_', ' ', $key1);
                                      			$key[] = $key1;
                                      		}                                      			
                                      		$blanckModule = getRowByTable('loan_user_permissions','name');
                              				$result=array_diff($blanckModule,$key);	
											 foreach($result as $key1) {	?>
											<tr>
                                                  <th scope="col" colspan="5" class="showRolesPermission text-center"><?php echo ucfirst(str_replace('_', ' ', $key1));?>
                                                    <?php  
                                                     $key1 = str_replace(' ', '_SPACE_', $key1); 
                                                     $user_type = str_replace(' ', '_SPACE_', $user_type); 
                                                    ?>
                                                    <input type="hidden" name="data[<?php echo $userId;?>][<?php echo $key1;?>]" value="<?php echo $key1;?>" />
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th scope="row" class="thfont">Own Entries</th>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_create]" value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_read]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_update]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_delete]" value="1"/></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row" class="thfont">All Entries</th>
                                                  <td>-</td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][all_read]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][all_update]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][all_delete]" value="1"/></td>
                                                </tr>

                                          <?php } }else {
                                           // $blanckModule1 = getRowByTableColomId('it_permissions','1','user_type','data');
                                            $blanckModule1 = getRowByTable('loan_user_permissions','name');
                                         //   print_r($blanckModule1);die;
                                         //   $blanckModule1 = $permissionlist;
                                            if(isset($blanckModule1) && $blanckModule1 != '') {
                                              foreach($blanckModule1 as $key1) {	
                                      ?>
                                                <tr>
                                                  <th scope="col" colspan="5" class="showRolesPermission text-center"><?php echo ucfirst(str_replace('_', ' ', $key1));?>
                                                    <?php  
                                                     $key1 = str_replace(' ', '_SPACE_', $key1); 
                                                     $user_type = str_replace(' ', '_SPACE_', $user_type); 
                                                    ?>
                                                    <input type="hidden" name="data[<?php echo $userId;?>][<?php echo $key1;?>]" value="<?php echo $key1;?>" />
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th scope="row" class="thfont">Own Entries</th>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_create]" value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_read]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_update]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][own_delete]" value="1"/></td>
                                                </tr>
                                                <tr>
                                                  <th scope="row" class="thfont">All Entries</th>
                                                  <td>-</td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][all_read]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][all_update]"  value="1"/></td>
                                                  <td><input type="checkbox" name="data[<?php echo $userId;?>][<?php echo $key1;?>][all_delete]" value="1"/></td>
                                                </tr>
                                          <?php
                                              } 
                                            }
                                          }
                                          ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                       	 <?php 
                                $i++;
                              }
                            }
                         ?>
                            <hr>
                            <input type="submit" name="save" value="Save Permission" class="btn btn-wide btn-success margin-top-20" />
                    <?php } ?>
                          </form> 
                        </div>
          </div>	
                  
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

