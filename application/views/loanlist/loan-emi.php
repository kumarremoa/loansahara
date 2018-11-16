    
<!-- Main content -->
<style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
}
.bs-linebreak {
  height:10px;
}
    </style>
<?php foreach($customers as $customer):?>
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-12">
      <div class="clearfix"></div>
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">White Label Users</h3>
          </div>
        
          <div class="panel panel-primary">
            <div class="panel-heading"><h3>Total Emi</h3></div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6 col-md-4">
                    
                  <div class = "panel panel-default">
                     <div class = "panel-heading">
                        <h3 class = "panel-title">
                          EMI Details:
                        </h3>
                     </div>
                     
                     <div class = "panel-body">
                              <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-money"></i> Balance</span>
                                     </div>
                                        <input name="" class="form-control" placeholder="Total Amount" type="text" value="<?php echo $customers[0]->balance?>">
                                    </div> <!-- form-group// -->
                                    <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-money"></i> Total Payment</span>
                                     </div>
                                     <?php $total=round(($customers[0]->balance + ($customers[0]->balance /$customers[0]->month_emi))/$customers[0]->month_emi);
                     $compound=$total * $customers[0]->month_emi / 100 + $total;?>
                                        <input name="" class="form-control" placeholder="Total EMI" type="email" value="<?php echo $compound * $customers[0]->month_emi;?>">
                                    </div> <!-- form-group// -->
                                    <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-money"></i> Total Month Emi</span>
                                    </div>
                                    
                                      <input name="" class="form-control" placeholder="Total Month Emi" type="text" value="<?php echo $customers[0]->month_emi?>">
                                    </div> <!-- form-group// -->
                                    <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> Intrest Rate</span>
                                    </div>
                                    <input class="form-control" placeholder="Intrest Rate" type="text" value="<?php echo $customers[0]->intrest_rate;?> %"> 
                                   
                                  </div> <!-- form-group end.// -->
                                    <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-money"></i> Payment Type</span>
                                    </div>
                                        <input class="form-control" placeholder="Payment Type" type="text" value="<?php echo $customers[0]->emi_type_payment?>">
                                    </div> <!-- form-group// -->
                                    <!-- <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-money"></i> Cash Payment</span>
                                    </div>
                                        <input class="form-control" placeholder="Cash Payment" type="text" value="<?php echo $customers[0]->amount?>">
                                    </div> -->
                     </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-8">
                  <div class = "panel panel-default">
                     <div class = "panel-heading">
                     </div>
                  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <th>#Sr</th>
                        <th>Intrest Rate</th>
                        <th>Total Emi</th>
                        <th>Montly Balance</th>
                        <th>Agent ID</th>
                        <th>Date</th>
                        <th>Action</th>
                        </tr>
                        </thead>

                        </tfoot>
                        <tbody>
                        <?php  
                        $K=1;
                        $j=1;
                        foreach($loan as $detail){
                        ?>
                        <tr>
                        <td><?php echo $K++;?></td>
                        <td><?php echo $detail->emi_intrest;?></td>
                        <td><?php echo $j++;?></td>
                        <td><?php echo $detail->balance ?></td>
                        <td><?php echo $detail->agent_id?></td>
                        <td><?php echo $detail->payment_date;?></td>
                        <td></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                      </div>
                </div>
              </div>
            </div>
           </div>
      
      </div>
    </div>
  </div>
</section>
<?php endforeach;?>
</div>
<script type="text/javascript">
$('#myModal').on('show.bs.modal', function (e) {
    var myRoomNumber = $(e.relatedTarget).attr('data-id');
    $(this).find('.roomNumber').val(myRoomNumber);
});

$(document).ready(function() {
        $('#aht_btn').click(function(event){
          event.preventDefault();
          var agent =$('#agent_id').val();
          if(agent!=0){
            $.ajax({
            type:"POST",
            url : "<?php echo base_url('customer/cibilCheck');?>",
            data:{ "agent_id": agent,"customer_id":customer } ,
            success : function(data){
              $('#myModal').modal('hide');

              $('#cont').modal('show');
              

            },
            always: function() {
               $("#formtopost").submit();
            }
        });  
        }
        else{
          $("#error").html("<span class='text-danger'>please Select Agent!</sapn>");
        } 
      });
    });
$('#agent_id').change(function(){
  $('#error').hide();
});
//$('#result').hide(20000);
</script>
