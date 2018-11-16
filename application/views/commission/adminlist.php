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
            <h3 class="box-title">SET ADMIN COMMISSION </h3>            
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="adminCommission" class="cell-border table table-striped table1">
              <thead>
                <tr>                  
                  <th width="3%">ID</th>
                  <th width="10%">API</th>
                  <th width="30%">Operator Name</th>
                  <th width="15%">TYPE</th>
                  <th width="5%">Commission</th>
                  <th width="5%">Surcharge</th>
                  <th width="15%">Deduction Type</th>
                  <th width="10%">Status</th>
                </tr>
              </thead>
              <tbody>
              </tbody> 
            </table>
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

