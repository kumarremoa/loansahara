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
                  <h3 class="box-title">Add Category</h3>
            </div>
                <!-- /.box-header -->
              <form action="<?php echo base_url('loancatagory/cat_insert');?>" method="post" enctype="multipart/form-data"  class="form">
                <div class="box-body">
                  <div class="row col-md-offset-3 col-md-6">                   
                    <div class="form-group col-md-12">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="email">Category Image</label>
                        <input type="file" class="form-control" name="userfile" placeholder="Enter Image" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="cname">Categoory Description</label>
                        <input  class="form-control" name="description" id="cname" placeholder="Enter  Description" >
                    </div>
                     <div class="form-group col-md-12" data-role="rangeslider">
                        <label for="price-min">Min Price:</label>
                        <input type="range" class="custom-range" name="price-min" id="price-min" value="10000" min="10000" max="100000">
                        <label for="price-max">Max Price:</label>
                        <input type="range" name="price-max" class="custom-range" id="price-max" value="100000000" min="100000" max="10000000">
                      </div>
                     <div class="form-group col-md-12">
                        <label for="cname"> Late Payment Monthly</label>
                        <input type="text"  class="form-control" form-control" name="late_payment" id="late_payment" placeholder="Month Late Payment" >
                          
                    </div>
                    <div class="form-group col-md-12">
                        <label for="cname">Late Payment Day</label>
                        <input type="text"  class="form-control" name="late_payment_value" id="late_payment_value" placeholder="Day Late Payment" value="">
                         
                    </div>
                    <div class="form-group col-md-12">
                       <div class="box-footer">
                  <input type="submit" name="userSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/> </div>                                   
                </div>
                </div>
                </div>
                <!-- /.box-body -->
               
            </div>
            </form>
                          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  