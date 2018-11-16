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
            <h3 class="box-title">White Label Users</h3>
            <div class="box-tools">
               <?php if(CheckPermission(WHITELABEL, "own_create")){ ?>
               <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url('loancatagory/cat_add');?>"><i class="glyphicon glyphicon-plus"></i> Add Loan Category</a>             
             <!--  <a class="btn-sm  btn btn-success btn-flat" href="<?php echo base_url();?>white-label-users/fund"><i class="glyphicon glyphicon-plus"></i> Send/Revert Balance</a>  <?php } ?> -->            
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="dtBasicExample" class="cell-border table table-striped">
              <thead>
                <tr>                  
                  <th>#</th>
                  <th>Loan Category Name</th>
                  <th>Loan Category Image</th>
                  <th>Loan Category Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($loancats as $cat):?>
                 <tr>                  
                  <td><?php echo $i++;?></td>
                  <td><?php echo $cat->name; ?></td>
                  <td><img src="<?php echo base_url('categories/'.$cat->image)?>" width="100" > </td>
                  <td><?php echo $cat->description; ?></td>
                  <td>
                    <a class="btn btn-danger fa fa-trash" href="<?php echo base_url('loancatagory/cat_delete/'.$cat->id);?>"></a>
                    <a class="btn btn-warning fa fa-pencil" href="<?php echo base_url('loancatagory/cat_edit/'.$cat->id);?>"></a>
                  </td>
                </tr>
              <?php endforeach; ?>
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

