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
            
            <div class="col-xs-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#online" data-toggle="tab" aria-expanded="true">Request Online</a></li>
                  <li class=""><a href="#offline" data-toggle="tab" aria-expanded="false">Request Offline</a></li>
                  <li class=""><a href="#bank-details" data-toggle="tab" aria-expanded="false">Bank Details</a></li>
                  <li class=""><a href="#requests" data-toggle="tab" aria-expanded="false">My Requests History</a></li>
                </ul> 
                <div class="tab-content">
                  <div class="tab-pane active" id="online">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Request Fund Online</h3>
                      </div>
                      <!-- /.box-header -->
                      <form method="post" action="" class="form">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-md-6">
                              <label for="amount">Amount</label>
                              <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount..." value="">
                            </div> 
                            <div class="clearfix"></div> 
                            <div class="form-group col-md-2">
                            <input type="submit" name="userSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/>
                          </div>                                     
                          <!-- /.row -->
                        </div>
                                                          
                        </div>
                     </form>
                    </div> 
                  </div>
                  <div class="tab-pane" id="offline">
                      <div class="box box-info">
                          <div class="box-header with-border">
                            <h3 class="box-title">Request Fund Offline</h3>
                          </div>
                          <!-- /.box-header -->
                          <form method="post" action="" class="form">
                            <div class="box-body">
                              <div class="row">
                                <input type="hidden" id="id" name="id" value="<?php echo $user['id']; ?>">
                                <div class="form-group col-md-6">
                                  <label for="amount">Bank</label>
                                  <select class="form-control" name="bank" id="bank">
                                  </select>
                                </div> 
                                <div class="form-group col-md-6">
                                  <label for="amount">Date</label>
                                  <input type="text" class="form-control" id="datepicker" autocomplete="off" name="datepicker" placeholder="Select Date..." value="">                                  
                                </div> 
                                <div class="form-group col-md-6">
                                  <label for="amount">Amount</label>
                                  <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount..." value="">
                                </div> 
                                <div class="form-group col-md-6">
                                  <label for="amount">Reference Number</label>
                                  <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Reference Number..." value="">
                                </div> 
                                <div class="clearfix"></div> 
                                <div class="form-group col-md-2">
                                <input type="submit" name="userSubmit" class="btn btn-primary btn-flat btn-block" value="Submit"/>
                              </div>                                     
                              <!-- /.row -->
                            </div>
                                                              
                            </div>
                         </form>
                      </div> 
                  </div>
                  <div class="tab-pane" id="bank-details">                    
                      <div class="box box-info">
                          <div class="box-header with-border">
                            <h3 class="box-title">Bank Account List</h3>
                          </div>
                          <table id="bankslist" class="table table-bordered table-striped"></table>
                          
                      </div> 


                  </div>
                  <div class="tab-pane" id="requests">
                    <div class="box box-info">
                          <div class="box-header with-border">
                            <h3 class="box-title">My Request History</h3>
                          </div>
                          <table id="requestlist" class="table table-bordered table-striped"></table>                          
                      </div> 

                  </div>
                </div>

              </div>
            </div>
            <div class="col-xs-3"></div>
           
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    