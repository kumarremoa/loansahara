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

               <?php //if(CheckPermission(WHITELABEL, "own_create")){ ?>
               <!-- <a class="btn-sm  btn btn-info btn-flat" href="<?php echo base_url();?>white-label-users/setup"><i class="glyphicon glyphicon-plus"></i> Add White Label Users</a>  -->            
              <!-- <a class="btn-sm  btn btn-success btn-flat" href="<?php echo base_url();?>white-label-users/fund"><i class="glyphicon glyphicon-plus"></i> Send/Revert Balance</a>  --> <?php //} ?>            
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">           
            <div class="panel panel-primary">
              <div class="panel-heading">Payment And Transaction Report</div>
              <div class="panel-body">
                  <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#Payment">Loan Payment</a></li>
                        <li><a data-toggle="tab" href="#Pending">Pending And Confirm Installment</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="Payment" class="tab-pane fade in active">
                          <h3>All Installment</h3>
                           <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                              <thead>
                                <tr>                  
                                  <th width="5%">ID</th>
                                  <th width="15%">Name</th>
                                  <th width="10%">Email</th>
                                  <th width="10%">Mobile</th>
                                  <th width="10%">Address</th>
                                  <th width="10%">Loan Balance</th>
                                  <th>Month EMI</th>
                                  <th>Instalment Pay</th>
                                  <!-- <th>Check Agent Assign</th>
                                  <th width="30%">Action</th> -->
                                </tr>
                              </thead>
                              <tbody>
                                <?php $year='12'; $i=1; foreach($customers as $customer):
                                $total=round(($customer->balance + ($customer->balance /$customer->month_emi))/$customer->month_emi);
                                   $compound=$total * $customer->month_emi / 100 + $total;
                                ?>
                               <tr>
                                <td><?php echo $i++;?></td>
                                 <td><?php echo $customer->name;?></td>
                                 <td><?php echo $customer->email;?></td>
                                 <td><?php echo $customer->mobile;?></td>
                                 <td><?php echo $customer->address1;?></td>
                                 <td><?php echo $customer->balance;?></td>
                                 <td><?php echo round($compound); ?></td>
                                 <td><?php echo $customer->emi_type_payment;?></td>
                                 <!--  <td><button class="btn" data-toggle="modal" data-id="<?php echo $customer->id;?>" data-target="#myModal"><i class="fa fa-bars"></i></button></td>
                                 <td><a href="<?php echo base_url('payment/transaction'); ?>" class="btn btn-success">Payment</a> <a href="" class="btn btn-info">View</a></td> -->
                               </tr>
                             <?php endforeach;?>
                              </tbody> 
                            </table>
                        </div>
                        <div id="Pending" class="tab-pane fade">
                          <h3>Pending Installment</h3>
                           <table id="dtBasicExample1" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                              <thead>
                                <tr>                  
                                  <th>ID</th>
                                  <th >Mobile</th>
                                  <th >Emi Month</th>
                                  <th>Intrest</th>
                                  <th >Balance</th>
                                  <th >Payment Date</th>
                                  <th>Late Payment Charge</th>
                                  <th>Instalment Pay</th>
                                  <th >Online</th>
                                  <th >Cash</th> 
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1; foreach($pending as $pendings):
                                
                                ?>
                               <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $pendings->mobile_no;?></td>
                                 <td><?php echo $pendings->emi_month;?></td>
                                 <td><?php echo $pendings->emi_intrest;?></td>
                                 <td><?php echo $pendings->balance;?></td>
                                 <td><?php echo $pendings->payment_date;?></td>
                                 <td><?php echo $pendings->extrapayment;?></td>
                                 <td><?php if($pendings->pending==0){?>
                                  <button type="button" class="btn btn-danger">Pending</button>
                                    <?php }else {?> 
                                      <button type="button" class="btn btn-success">Confirm</button>
                                    <?php }?>
                                    </td>

                                  <td>
                                    <?php if($pendings->pending==1){?>
                                      <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                       <?php }else {?> 
                                    <a href="<?php echo base_url('payment/installment/'.$pendings->id.'/'.$pendings->mobile_no); ?>" class="btn btn-success">Payment</a> 
                                  <?php }?>
                                  </td>
                                <td>
                                  <?php if($pendings->pending==1){?>
                                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                       <?php }else {?> 
                                  <a href="<?php echo base_url('payment/cash/'.$pendings->id.'/'.$pendings->mobile_no); ?>" class="btn btn-info">Cash</a>
                                <?php }?>
                                   </td>
                               </tr>
                             <?php endforeach;?>
                              </tbody> 
                            </table>
                        </div>
                      </div>
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
