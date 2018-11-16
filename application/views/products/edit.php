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
                                    <label for="title">Product Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
                                    <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                                </div>                                                 
                               <div class="form-group">
                                    <label for="customerPrice">Customer Price</label>
                                    <input type="text" class="form-control" name="customerPrice" placeholder="Enter Customer Price" value="<?php echo !empty($post['customerPrice'])?$post['customerPrice']:''; ?>">
                                    <?php echo form_error('customerPrice','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="hawkerPrice">Hawker Price</label>
                                    <input type="text" class="form-control" name="hawkerPrice" placeholder="Enter Hawker Price" value="<?php echo !empty($post['hawkerPrice'])?$post['hawkerPrice']:''; ?>">
                                    <?php echo form_error('hawkerPrice','<p class="text-danger">','</p>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="kabariwalaPrice">Kabariwala Price</label>
                                    <input type="text" class="form-control" name="kabariwalaPrice" placeholder="Enter Kabariwala Price" value="<?php echo !empty($post['kabariwalaPrice'])?$post['kabariwalaPrice']:''; ?>">
                                    <?php echo form_error('kabariwalaPrice','<p class="text-danger">','</p>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="centerPrice">Collection Center Price</label>
                                    <input type="text" class="form-control" name="centerPrice" placeholder="Enter Collection Center Price" value="<?php echo !empty($post['centerPrice'])?$post['centerPrice']:''; ?>">
                                    <?php echo form_error('centerPrice','<p class="text-danger">','</p>'); ?>
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
                                <input type="submit" name="equerySubmit" class="btn btn-primary" value="Submit"/> </div>

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