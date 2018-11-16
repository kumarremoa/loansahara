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
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default ">
                    <div class="panel-heading">Gropus List <a href="<?php echo site_url('permissions/add'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>

                    <div class="col-xs-12" style="margin-top: 30px;">

                    <table class="table table-striped" id="permissions">
                        <thead>
                            <tr>
                                <th width="15%">ID</th>
                                <th width="70%">NAME</th>
                                <th width="10%">STATUS</th>
                               <th width="15%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>                            
                        </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
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