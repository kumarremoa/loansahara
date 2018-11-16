
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
   

        <div class="clearfix"></div>    
        <div class="box box-success">
          
          <!-- /.box-header -->
          <div class="box-body">           
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
              <thead>
                <tr>                  
                  <th width="5%">ID</th>
                  <th width="15%">Name</th>
                  <th width="10%">Email</th>
                  <th width="10%">Mobile</th>
                  <th width="30%">Message</th>
                  <th width="20%">Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($message as $msg):?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $msg->name;?></td>
                  <td><?php echo $msg->email;?></td>
                  <td><?php echo $msg->phone;?></td>
                  <td><?php echo substr($msg->discription,0,100);?> <a data-toggle="modal" data-target="#myModal" data-id="<?php echo $msg->discription;?>">Read more...</a></td>
                  <td><?php echo $msg->created_at;?></td>
                </tr>
              <?php endforeach;?>
              </tbody> 
            </table>
          </div>
          <!-- /.box-body -->
        </div>

        </div>   
      </div>
     
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Message:</h4>

            </div>
            <div class="modal-body">
                <p><span class="roomNumber"></span>.</p>                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
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

$('a').click(function() {
   myRoomNumber = $(this).attr('data-id'); 
});

$('#myModal').on('show.bs.modal', function (e) {
    $(this).find('.roomNumber').text(myRoomNumber);
});

</script>