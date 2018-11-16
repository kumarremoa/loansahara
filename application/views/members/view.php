    <?php
    if ($member['pic'] != "") {
      $image = site_url('assets/uploads/').$member['pic'];   
    }else{      
      $image = site_url('assets/img/')."avatar5.png";      
    }
    ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
              <div class="widget-user-image">
                <img class="img-circle" style=" height: 60px ; width: 60px ;" src="<?php echo $image; ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $member['name']; ?></h3>
              
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Name <span class="pull-right"><?php echo $member['name']; ?></span></a></li>
                <li><a href="#">Email <span class="pull-right"><?php echo $member['email']; ?></span></a></li>
                <li><a href="#">Phone <span class="pull-right"><?php echo $member['mobile']; ?></span></a></li>                
                <li><a href="#">User Type <span class="pull-right"><?php echo $member['user_group']; ?></span></a></li>
                <li><a href="#">Member Since<span class="pull-right"><?php echo $member['created_date']; ?></span></a></li>
                <li><a href="#">Status <span class="pull-right"><?php if($member['status'] == 1){ echo "Active";}else{echo "Inactive";} ?></span></a></li>
                <li></li>
              </ul>              
            </div>
          </div>
           <a href="<?php echo site_url('members/edit/'.$member['id']); ?>" class="btn btn-info btn-flat">Edit</a>
                <a href="<?php echo site_url('members/delete/'.$member['id']); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Are you sure to delete?')">Delete</a>
          <!-- /.widget-user -->
        </div>
        <div class="col-md-12">

         




        </div>   
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->