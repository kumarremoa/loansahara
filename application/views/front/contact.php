 <?php $this->load->view('front/header');?>
  <!--Page Title-->
  <section class="page-title" style="background-image:url("<?php echo base_url('fronts/images/background/3.jpg')?>");">
    <div class="auto-container">
      <div class="title-box">
        <h2><?php echo $title;?></h2>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><?php echo $title;?></li>
        </ul>
      </div>
    </div>
  </section>
  <!--End Page Title-->
  <!--Contact Section-->
  <section class="contact-section">
    <div class="auto-container">
      <!--Sec Title-->
      <div class="sec-title centered">
         <?php if($this->session->flashdata('message')){
                echo $this->session->flashdata('message');
               }?>
        <h2>Get in Touch with us</h2>
        <div class="text">These days are all share them with me oh inspect more than a hunch.</div>
        <div class="separater"></div>
      </div>
      <div class="row clearfix">
        <!--Column-->
        <div class="form-column pull-right col-md-8 col-sm-12 col-xs-12">
          <!-- Contact Form -->
          <div class="contact-form">
            <!--Comment Form-->
            <form method="post" action="<?php echo base_url('contact-send-query')?>" name="ppc">
              <div class="row clearfix">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <input class="form-control" type="text" name="name" required placeholder="Enter your name" required>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <input class="form-control" type="email" name="email" required placeholder="Enter your email" required>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12 form-group">
                  <input class="form-control" type="text" name="phone" required placeholder="Phone Number" id="cus_mobile" maxlength="10">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                  <textarea id="" class="hero-input textare" name="discription" rows="6" required placeohlder="Your Message - OPTIONAL" required></textarea>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                  <input type="submit" class="theme-btn btn-style-one"  value="Send">
                </div>
              </div>
            </form>
          </div>
          <!--End Comment Form -->
        </div>
        <!--Column-->
        <div class="contact-info-column pull-left col-md-4 col-sm-12 col-xs-12">
          <div class="inner-box" style="background-image:url("<?php echo base_url('fronts/images/resource/contact-info-bg.jpg');?>")">
            <ul class="contact-info">
              <li>
                <div class="icon"><span class="flaticon-placeholder"></span></div>
                <span class="title">Locate us on:</span>F-43, Palam Vihar Road Gurgaon - 122001</li>
              <li>Branch Office: T-6, 3rd floor, malik plaza, Near bank of baroda, KM chowk, sec-12 Dwarka. New delhi-75</li>
              <li>
                <div class="icon"><span class="flaticon-email"></span></div>
                <span class="title">Send us on:</span><a href="mailto:contact@loansahara.com">contact@loansahara.com</a></li>
              <li>
                <div class="icon"><span class="flaticon-phone-call"></span></div>
                <span class="title">Get us on:</span><a href="tel:+91-9310000440">+91 931 000 0440</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Contact Section-->
  <!--Info Section-->
  <section class="info-section">
    <div class="clearfix">
      <!--Info Column-->
      <div class="info-column">
        <div class="inner-box">
          <div class="info-box">
            <div class="inner"> <span class="icon flaticon-house"></span>
              <div class="title">Locate us on:</div>
              <h3>Gurgaon, Haryana, India</h3>
            </div>
          </div>
        </div>
      </div>
      <!--Info Column-->
      <div class="info-column">
        <div class="inner-box">
          <div class="info-box">
            <div class="inner"> <span class="icon flaticon-phone-call"></span>
              <div class="title">Get us on:</div>
              <h3><a href="tel:+919310000440">+91 931 000 0440</a></h3>
            </div>
          </div>
        </div>
      </div>
      <!--Info Column-->
      <div class="info-column">
        <div class="inner-box">
          <div class="info-box">
            <div class="inner"> <span class="icon flaticon-email"></span>
              <div class="title">Send us on:</div>
              <h3><a href="mailto:contact@loansahara.com">contact@loansahara.com</a></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Info Section-->
 <?php $this->load->view('front/footer');?>