<?php $this->load->view('front/header');?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="col-md-4 offset-md-4">
        </div>
        <div class="col-md-4 offset-md-4">
          <div class="card" style="width:400px">
              <div class="card-header">
                <h2 class="text-center">Thank You</h2>
                <b><?php echo $email;?></b>
              </div>
              <div class="card-body">
                <img class="card-img-top" src="<?php echo base_url();?>fronts/images/tick.png" style="padding:20px">
                <h2 class="card-title">Form Apply Succesfully Sahara Loan</h2>
              </div>
            <div class="card-footer">
              <h3 class="card-text">Reference id "fss"</h3>
              <h4>We will catch you back soon...</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-4">
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('front/footer');?>