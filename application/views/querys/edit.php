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
                
                <div class="col-xs-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <form method="post" action="" class="form">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
                                    <?php echo form_error('name','<p class="text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo !empty($post['email'])?$post['email']:''; ?>">
                                    <?php echo form_error('email','<p class="text-danger">','</p>'); ?>
                                </div>                                                              
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile" value="<?php echo !empty($post['mobile'])?$post['mobile']:''; ?>">
                                    <?php echo form_error('mobile','<p class="text-danger">','</p>'); ?>
                                </div> 
                                <div class="form-group">
                                    <label for="location">Enter Your Latitude</label>
                                    <input type="text" id="lat" class="form-control" name="lat"  value="<?php echo !empty($post['lat'])?$post['lat']:''; ?>">
                                    <?php echo form_error('lat','<p class="text-danger">','</p>'); ?>
                                </div>  
                                <div class="form-group">
                                    <label for="location">Enter Your Longitude</label>
                                    <input type="text" id="lng" class="form-control" name="lng"  value="<?php echo !empty($post['lng'])?$post['lng']:''; ?>">
                                    <?php echo form_error('lng','<p class="text-danger">','</p>'); ?>
                                </div>    
                                <div class="form-group">
                                    <label for="dt">Enter Pickup Date & Time</label>
                                    <input type="text"  class="form-control" name="dt"  value="<?php echo !empty($post['dt'])?$post['dt']:''; ?>">
                                    <?php echo form_error('dt','<p class="text-danger">','</p>'); ?>

                                </div>    
                                <div class="form-group">
                                    <label for="hawker_id">Assign a Hawker</label>
                                    <select class="form-control" name="hawker_id">
                                    <option value="none" selected="selected">------------Select Hawker------------</option>
                                    <!----- Displaying fetched cities in options using foreach loop ---->
                                    <?php foreach($hawkers as $hawker):?>
                                    <option value="<?php echo $hawker['id']; ?>"> <?php echo $hawker['name']; ?></option>
                                    <?php endforeach;?>
                                    </select>
                                   <!--  <?php echo form_error('dt','<p class="text-danger">','</p>'); ?>
                                    -->
                                </div>    
                                
                                <input type="hidden" name="status" value="2" >
                                <div class="form-group col-xs-12">
                                <input type="submit" name="ememberSubmit" class="btn btn-primary" value="Submit"/> </div>

                            </form>
                        </div>
                    </div>
                </div>
            
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- <script>
      var map, infoWindow;
      function initMap() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById("lat").setAttribute('value',position.coords.latitude);
            document.getElementById("lng").setAttribute('value',position.coords.longitude);
           // document.getElementById("loc").setAttribute('value',position.coords.latitude + , + position.coords.longitude);
          });
        }}
     
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUadxlSzJe8YtOOrsjicQul7gHRx4LOIc&callback=initMap">
    </script>
   -->