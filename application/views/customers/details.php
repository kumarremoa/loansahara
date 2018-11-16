    <!-- Main content -->
    <style type="text/css" media="screen">
      .cont {
    border-radius: 50%;
    width: 600px;
    height: 600px;
    border: 15px solid #000;
}
#commentForm {
    width: 500px;
  }
  #commentForm label {
    width: 250px;
  }
  #commentForm label.error, #commentForm input.submit {
    margin-left: 253px;
  }
  #signupForm {
    width: 670px;
  }
  #signupForm label.error {
    margin-left: 10px;
    width: auto;
    display: inline;
  }
  #newsletter_topics label.error {
    display: none;
    margin-left: 103px;
  }

    </style>
     <?php foreach($customers as $customer):?>
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
          <h2 class="box-title"><button  class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo $customer->id?>">Cibil Check</a></h2> 
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body"> 
          
          <div class="row">
           
            <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->name?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="<?php echo $customer->email?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->mobile?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"> Address1</label>
                <textarea disabled  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ><?php echo $customer->address1?></textarea>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"> Address2</label>
                <textarea disabled  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ><?php echo $customer->address2?></textarea>
                
              </div>
            </div>
           
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">City</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$city[0]->name ? @$city[0]->name: '1';?>">
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1"></label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">State</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$state[0]->name ? @$state[0]->name : '1';?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Country</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo @$country[0]->name ? @$country[0]->name : 'india';?>">
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Pincode</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->pincode?>">
                
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Profile Image</label>
                 <?php if($customer->profile_pic!=''){?>
                 <input disabled class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $customer->name?>">
                 <a href="#" data-toggle="modal" data-target=".dialog1">
                <img src="<?php echo base_url('profiles/'.$customer->profile_pic)?>" class="img-rounded" alt="Cinque Terre" width="200" height="200"></a>
                <?php } else{ ?>
                  <img src="<?php echo base_url('assets/uploads/profile.png')?>" class="img-rounded" alt="Cinque Terre" width="200" height="200">
                <?php }?>
                
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Aadhar No And image</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->aadhar_no?>">
                <?php if($customer->aadhar_pic!=''){?>
                  <a href="#" data-toggle="modal" data-target=".dialog2">
                <img src="<?php echo base_url('aadhar/'.$customer->aadhar_pic)?>" class="img-rounded" alt="Cinque Terre" width="200" height="200"></a>
                <?php } else{ ?>
                  <img src="<?php echo base_url('assets/uploads/adhar.png')?>" class="img-rounded" alt="Cinque Terre" width="200" height="200">
                <?php } ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">PanCard No and Image</label>
                <input disabled type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $customer->pan_no?>">
                 <?php if($customer->pan_pic!=''){?>
                   <a href="#" data-toggle="modal" data-target=".dialog3">
                <img src="<?php echo base_url('pancard/'.$customer->pan_pic)?>" class="img-rounded" alt="Cinque Terre" width="200" height="200"></a>
                <?php } else{ ?>
                  <img src="<?php echo base_url('assets/uploads/pancard.jpeg')?>" class="img-rounded" alt="Cinque Terre" width="200" height="200">
                <?php }?>
                
              </div>
            </div>
           
            
            </div>
          </div>
      
          </div>
          <!-- /.box-body -->
        </div>

        </div>   
      </div>
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cibil Check</h4>
            </div>
           
              <div class="modal-body mx-3">
                
                <form id="formtopost" method="post" action="<?php echo base_url("customer/cibil");?>">
                  <div class="md-form mb-4">
                    
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Gender</label>
                    <input type="radio"  id="gender" name="gender" class="" value="male" required> Male
                    <input type="radio"  id="gender" name="gender" class="" value="female" required> Female
                    
                   
                </div>
                  <div class="md-form mb-4">
                    
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Customer Full Name</label>
                    <input type="text" onkeyup="" id="full_name" name="full_name" class="form-control validate" required>
                    
                   
                </div>
                <div class="md-form mb-4">
                    
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Email Id</label>
                    <input type="text" onkeyup="" name="email_id" id="email_id" class="form-control validate" required>
                </div>
                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Date Of Birth</label>
                    <input type="text" onkeyup="" id="datepicker" name="dob" class="form-control validate" required>
                </div>
                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Pan No</label>
                    <input type="text" onkeyup="" id="pan_no" name="pan_no" class="form-control validate" required maxlength="10">
                </div>
                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Mobile No( As Per Bank Records )</label>
                    <input type="text" onkeyup="" name="mobile" id="mobile" class="form-control validate" required maxlength="10" onkeypress="return isNumber(event)">
                    
                    
                </div>
                 <div class="md-form mb-4">
                    
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Pincode</label>
                    <input type="text" onkeyup="" id="pincode" class="form-control validate" name="pincode" required maxlength="6" onkeypress="return isNumber(event)">
                   
                   
                </div>
                <div class="md-form mb-4">
                    
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">CIBIL score</label>
                    <select type="text" onkeyup="" id="cibil_score" class="form-control validate" name="cibil_score" required>
                      <option>Please Select</option>
                      <option>None</option>
                      <option>Disputed</option>
                      <option>Good</option>
                      <option>Better</option>
                      <option>Best</option>
                    </select>
                    
                   
                </div>
                <div class="md-form mb-4">
                    
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Address</label>
                    <input type="text" name="address" onkeyup="" id="address" class="form-control validate" required>
                  
                    
                </div>
                <!-- <div id="error" ></div> -->
                <br>
                
                <input type="submit" class="btn btn-success" name="submit" value="Submit">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <div id="cont" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <center><h1><span class="text-success"> Agent Selected Successsfull</span></h1></center>
            </div>
          </div>

        </div>
      </div>
       <div class="modal fade dialog1" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myLargeModalLabel-1">Profile Image</h4>
                    </div>
                    <div class="modal-body active">
                        <img src="<?php echo base_url('profiles/'.$customer->profile_pic)?>" class="img-responsive img-rounded center-block" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!--  Modal content for House Image -->
        <div class="modal fade dialog2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-2" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myLargeModalLabel-2">Aadhar card</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url('aadhar/'.$customer->aadhar_pic)?>" class="img-responsive img-rounded center-block" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!--  Modal content for House Image -->
        <div class="modal fade dialog3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-2" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="myLargeModalLabel-3">Pancard</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo base_url('pancard/'.$customer->pan_pic)?>" class="img-responsive img-rounded center-block" alt="" />
                    </div>
                </div>
            </div>
        </div>
      <!-- /.row -->
    </section>
      <?php endforeach;?>
    <!-- /.content -->
  </div>

<script type="text/javascript">
$('#myModal').on('show.bs.modal', function (e) {
    var myRoomNumber = $(e.relatedTarget).attr('data-id');
    $(this).find('.roomNumber').val(myRoomNumber);
});
 $(document).ready(function () {
   $('#datepicker').datetimepicker({
        useCurrent: true,
        minDate:new Date(),
        viewMode: 'days',
        format: 'DD/MM/YYYY'
     });
 });
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
   $('#error').html("Please enter only Numbers.");
    return false;
  }

  return true;
}
</script>
