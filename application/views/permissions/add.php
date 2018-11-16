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
                                    <label for="status">User Group</label>
                                    <select class="form-control" name="status" >
                                    <?php  
                                        foreach($userGroup as $row)
                                    { 
                                      echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                    </select>
                                    <?php echo form_error('status','<p class="text-danger">','</p>'); ?>
                                </div> 
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Permission Type</td>
                                            <td>View</td>
                                            <td>Add</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                        <?php  
                                        foreach($pType as $row)
                                    { 
                                      echo '
                                        <tr>
                                            <td>'.$row->name.'</td>
                                            <td><input type="checkbox"></td>
                                            <td><input type="checkbox" ></td>
                                            <td><input type="checkbox" ></td>
                                            <td><input type="checkbox" class="flat-red"></td>
                                        </tr>';
                                    }
                                    ?>
                                    </table>
                                </div> 
                                <div class="form-group col-xs-12 row">
                                <input type="submit" name="permissiontypeSubmit" class="btn btn-primary" value="Submit"/> </div>
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

  