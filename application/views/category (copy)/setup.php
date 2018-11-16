    <!-- Main content -->
    <input type="hidden" id="parent_id" name="parent_id" value="<?php echo $user['id']; ?>">
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">       
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
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Setup White Label Account</h3>              
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
              <div class="col-md-3"></div>
              <div class="col-md-6 table-bordered">
                <div id="domainbox">                
                <h3 class="text-center lead"><b>Get A Domain (Step: 1/4)</b></h3><hr>
                <p class="text-center lead">To get a white label system you need to have a domain,<br> you can buy a domain name with us at just <span class="text-green"><b><?php echo inr('99'); ?></b></span></p>
                <div class="form-group ">
                  <div class=" col-md-8 lla">                    
                       <input type="text" class="form-control" id="domainname" name="domainname" placeholder="Enter Domain Name You Are Looking For..." value=""> 
                  </div>
                  <div class=" col-md-4 lls"> 
                       <select name="tldList" class="form-control select2"  id="tldList">
                        <option value="com">.com</option>
                        <option value="in">.in</option>
                        <option value="co.in">.co.in</option>
                        <option value="net">.net</option>
                        <option value="org">.org</option>
                        <option value="online">.online</option></select>
                  </div>                  
                  </div>  
                  <div class="form-group col-lg-3 " style="margin-top: 20px;">
                     <input type="button" class="btn btn-info btn-flat btn-block" value="I Have Domain" onclick="return enterDomain()" id="nofind" name="nofind">
                  </div>            
                  <div class="form-group col-lg-6 pull-right" style="margin-top: 20px;">
                    <input type="button" class="btn btn-success btn-flat btn-block" value="Find" onclick="return findDomain()" id="find" name="find">
                  </div> 
                  <div class="clearfix"></div>
                  <hr>
                  <div id="domainlist"></div>
                 </div>
                  <div class="col-md-3">
                    
                  </div>
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