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
            <h3 class="box-title">SET ADMIN COMMISSION :</h3>            
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="commissionSlab" class="cell-border table table-striped table1">
              <thead>
                <tr>                  
                  <th width="3%">ID</th>
                  <th >Operator Name</th>
                  <th >Operator Type</th>
                  <th width="7%">SLAB A</th>
                  <th width="7%">SLAB B</th>
                  <th width="7%">SLAB C</th>
                  <th width="7%">SLAB D</th>
                  <th width="7%">SLAB E</th>
                  <th >SURCHARGE</th>
                  <th >TYPE</th>
                  <th >STATUS</th>
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

