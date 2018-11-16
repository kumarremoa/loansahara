    <!-- Main content -->
    <style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
}
    </style>
        
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
          <h2 class="box-title"></h2> 
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body"> 
          <form action="<?php echo base_url('payment/online');?>" method="post" >
           
          
          <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-offset-2">
              <div class=" col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input  type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $users[0]->name?>" readonly>
                  
                </div>
              </div>
             <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input  type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $users[0]->email?>" readonly>
                
              </div>
              </div>
              <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input  type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $users[0]->mobile?>" readonly>
                
              </div>
              </div>
              <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Balance</label>
                <input  type="text" name="balance" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $pending[0]->balance?>" readonly>
                
              </div>
              </div>
              <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Installment No</label>
                <input  type="text" name="installment" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $pending[0]->emi_month?>" readonly>
                
              </div>
              </div>
              <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Late Payment</label>
                <input  type="text" class="form-control" id="exampleInputEmail1" name="extrapayment" aria-describedby="emailHelp"   value="<?php echo $pending[0]->extrapayment?>" readonly>
                
              </div>
              </div>
              <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Last Date</label>
                <input  type="text" name="last_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $pending[0]->payment_date?>" readonly>
                
              </div>
              </div>
              <div class=" col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Payment Date</label>
                <input  type="text" name="payment_date" class="form-control" id="datetimepicker1" aria-describedby="emailHelp" >
              </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $pending[0]->id?>">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input  type="submit" class="form-control btn btn-info"  value="Payment" name="submit">
                </div>
              </div>
            </div>
            
          </div>
      </form>
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
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>