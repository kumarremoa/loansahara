 <?php $this->load->view('front/header');?>
  <!--Page Title-->
  
<style type="text/css" media="screen">
.moul {
list-style-type: none;
}

.moli {
display: inline-block;
}

input[type="checkbox"][id^="cb"] {
display: none;
}

label {
padding: 10px;
display: block;
position: relative;
margin: 10px;
cursor: pointer;
}

label:before {
background-color: white;
color: white;
content: " ";
display: block;
border-radius: 50%;
border: 1px solid grey;
position: absolute;
top: -5px;
left: -5px;
width: 25px;
height: 25px;
text-align: center;
line-height: 28px;
transition-duration: 0.4s;
transform: scale(0);
}

label img {
height: 100px;
width: 100px;
transition-duration: 0.2s;
transform-origin: 50% 50%;
}

:checked + label {
border-color: #ddd;
}

:checked + label:before {
content: "✓";
background-color: grey;
transform: scale(1);
}

:checked + label img {
transform: scale(0.9);
box-shadow: 0 0 5px #333;
z-index: -1;
}
</style>
<section class="page-title" style="background-image:url("<?php echo base_url('fronts/images/background/3.jpg');?>")">
<div class="auto-container">
<div class="title-box">
<h2><?php echo $title;?></h2>
<ul>
<li><a href="#">Home</a></li>
<li><?php echo $title;?></li>
</ul>
</div>
</div>
</section>


<!-- START CONETENT-->
<section id="salaryloan_calculater">
  <div class="container salaryloan_calculater ">
    <div class="row salary ">
      <div class="stepwizard col-md-offset-3">
        <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
            <p class="btn btn-default btn-circle a1">1</p>
            <p>Loan Info</p>
          </div>
          <div class="stepwizard-step">
            <p class="btn btn-default btn-circle a2" disabled>2</p>
            <p>Get Loan</p>
          </div>
          <div class="stepwizard-step">
            <p class="btn btn-default btn-circle a3" disabled>3</p>
            <p>User Info</p>
          </div>
          <div class="stepwizard-step">
            <p class="btn btn-default btn-circle a4" disabled>4</p>
            <p>Successful</p>
          </div>
        </div>
      </div>

    <form name="myForm" role="form" onsubmit="return validateForm()" action="<?php echo base_url('loan-apply-customer');?>" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-sm-6 col-md-offset-3">
        <div class="col-md-12 cal">
          <h3 class="text-center"> Select Loan Type </h3>
          <?php foreach($cats as $cat):?>
          <div class="col-md-4 selector">
            <label class="image-checkbox">
            <a href="<?php echo base_url('apply-loan');?>#emicalculatordashboard" ><img src="<?php echo base_url('categories/').$cat->image;?>" class="image"></a>
            <input type="radio" onclick="checkSelectedvalue(this.value)" name="image" value="<?php echo $cat->name;?>" style="display:none" />
            <i class="fa fa-check hidden"></i>
            <div class="middle" >
              <div class="text"><b><?php echo $cat->name;?></b></div>
            </div>
            </label>
          </div>
          <?php endforeach;?>
         
            <div class="col-md-12 submit-button-block js-buttons text-center" data-actionloc="">
              <button class="btn btn-primary btn-lg " id="next1" onclick="return nextpage()">Next</button>
            </div>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2" >
      <div class="col-sm-6 col-md-offset-3">
        <div class="col-md-12 cal">
          <h3 class="text-center"> Get Loan </h3>
          <div class="calculatorcontainer">
        <div class="emicalculatorcontainer">
          <div id="loanformcontainer" class="row">
            <div id="emicalculatordashboard" class="col-sm-12">
              <ul class="loanproduct-nav">
                <?php foreach($cats as $cat):?>
                <li id="<?php echo $cat->name;?>" class="active">
                  <a href="#" ><?php echo $cat->name;?></a>
                </li>
                <?php endforeach;?>
              </ul>
              <div class="cleardiv"></div>
              <div id="emicalculatorinnerformwrapper">
                <div id="emicalculatorform" class="">
                  <div class="form-horizontal" id="emicalculatorinnerform">
                    <div class="form-group lamount">
                      <label class="col-md-4 control-label" for="loanamount"><strong></strong></label>
                      <div class="col-md-6">
                        <div class="input-group">
                          <input class="form-control" id="loanamount" name="loanamount" value="" type="text">
                          <img src="fronts/images/rupee-indian.png">
                        </div>
                      </div>
                    </div>
                    <div id="loanamountslider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 25%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 25%;"></span></div>
                    <div id="loanamountsteps" class="steps">
                      <span class="tick" style="left: 0%;">|<br>
                        <span class="marker">0</span></span>
                        <span class="tick hidden-xs" style="left: 12.5%;">|<br><span class="marker">25L</span></span><span class="tick" style="left: 25%;">|<br><span class="marker">50L</span></span><span class="tick hidden-xs" style="left: 37.5%;">|<br><span class="marker">75L</span></span><span class="tick" style="left: 50%;">|<br><span class="marker">100L</span></span><span class="tick hidden-xs" style="left: 62.5%;">|<br><span class="marker">125L</span></span><span class="tick" style="left: 75%;">|<br><span class="marker">150L</span></span><span class="tick hidden-xs" style="left: 87.5%;">|<br><span class="marker">175L</span></span><span class="tick" style="left: 100%;">|<br><span class="marker">200L</span></span></div>
                    <div class="sep form-group lint">
                      <label class="col-md-4 control-label" for="loaninterest">Interest Rate</label>
                      <div class="col-md-6">
                        <div class="input-group">
                          <input class="form-control" id="loaninterest" name="loaninterest" value="" type="text">
                          <span class="input-group-addon">%</span>
                        </div>
                      </div>
                    </div>
                    <div id="loaninterestslider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 36.6667%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 36.6667%;"></span></div>
                    <div id="loanintereststeps" class="steps"><span class="tick" style="left: 0%;">|<br><span class="marker">5</span></span><span class="tick" style="left: 16.67%;">|<br><span class="marker">7.5</span></span><span class="tick" style="left: 33.34%;">|<br><span class="marker">10</span></span><span class="tick" style="left: 50%;">|<br><span class="marker">12.5</span></span><span class="tick" style="left: 66.67%;">|<br><span class="marker">15</span></span><span class="tick" style="left: 83.34%;">|<br><span class="marker">17.5</span></span><span class="tick" style="left: 100%;">|<br><span class="marker">20</span></span></div>
                    <div class="sep form-group form-inline lterm">
                      <label class="col-md-4 control-label" for="loanterm">Loan Tenure</label>
                      <div class="col-md-6">
                        <div class="loantermwrapper">
                          <div class="btn-group float-right gutter-left no-gutter-right tenure-choice" data-toggle="buttons">
                            <label class="btn btn-default active">
                              <input type="radio" name="loantenure" id="loanyears" value="loanyear" tabindex="4" autocomplete="off" checked="checked">Year 
                            </label>
                            <label class="btn btn-default">
                                <input type="radio" name="loantenure" id="loanmonths" value="loanmonths" tabindex="5" autocomplete="off">Month 
                              </label>
                          </div>
                          <div class="input-group fill-width">
                            <input class="form-control" id="loanterm" name="loanterm" value="" type="text">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="loantermslider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 66.6667%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 66.6667%;"></span></div>
                    <div id="loantermsteps" class="steps"><span class="tick" style="left: 0%;">|<br><span class="marker">0</span></span><span class="tick" style="left: 16.67%;">|<br><span class="marker">5</span></span><span class="tick" style="left: 33.33%;">|<br><span class="marker">10</span></span><span class="tick" style="left: 50%;">|<br><span class="marker">15</span></span><span class="tick" style="left: 66.67%;">|<br><span class="marker">20</span></span><span class="tick" style="left: 83.33%;">|<br><span class="marker">25</span></span><span class="tick" style="left: 100%;">|<br><span class="marker">30</span></span></div>
                    <div id="leschemewrapper" class="sep toggle-hidden">
                      <div class="form-group escheme">
                        <label class="col-md-4 control-label" for="emischeme">EMI Scheme</label>
                        <div class="col-md-8">
                          <div class="input-group emischemes">
                            <div class="btn-group add-check" data-toggle="buttons">
                              <label class="btn btn-default">
                                <input type="radio" name="emischeme" id="emiadvance" value="emiadvance" tabindex="4" autocomplete="off">EMI in Advance 
                              </label>
                              <label class="btn btn-default active">
                                <input type="radio" name="emischeme" id="emiarrears" value="" tabindex="5" autocomplete="off" checked="checked">EMI in Arrears 
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input  name="loanproduct" value="" type="hidden" class="loanproduct"> 
                  <input id="loanstartdate" name="loanstartdate" value="" type="hidden">
                  <input id="loandata" name="loandata" value="" type="hidden">
                  <input id="calcversion" name="calcversion" value="4.0" type="hidden">
                </div>
                <div class="row gutter-left gutter-right">
                  <div id="emipaymentsummary">
                    <div id="emiamount">
                      <h4>Loan EMI</h4>
                      <p><img src="fronts/images/rupee-indian.png"><span>49,919</span></p>
                    </div>
                    <div id="emitotalinterest">
                      <h4>Total Interest Payable</h4>
                      <p><img src="fronts/images/rupee-indian.png"><span>69,80,559</span></p>
                    </div>
                    <div id="emitotalamount" class="column-last">
                      <h4>Total Payment<br>(Principal + Interest)</h4>
                      <p><img src="fronts/images/rupee-indian.png"><span>1,19,80,559</span></p>
                    </div>
                  </div>   
                  <div id="emipiechart"  data-highcharts-chart="3"><div class="highcharts-container" id="highcharts-8" style="position: relative; overflow: hidden; width: 361px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);     margin-left: -53px !important; font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: bold; color: rgb(51, 51, 51);"><svg version="1.1" style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;color:#333333;fill:#333333;" xmlns="http://www.w3.org/2000/svg" width="361" height="400"><desc>Created with Highcharts 4.2.2</desc><defs><clipPath id="highcharts-9"><rect x="0" y="0" width="341" height="305"></rect></clipPath></defs><rect x="0" y="0" width="361" height="400" strokeWidth="0" fill="transparent" class=" highcharts-background"></rect><rect x="10" y="42" width="341" height="305" fill="transparent"></rect><g class="highcharts-series-group" zIndex="3"><g class="highcharts-series highcharts-series-0 highcharts-tracker" zIndex="0.1" transform="translate(10,42) scale(1 1)" style="cursor:pointer;"><path fill="#88A825" d="M 170.47097656847345 10.000002955647659 A 142.5 142.5 0 0 1 241.4038743245711 276.1078096471474 L 170.5 152.5 A 0 0 0 0 0 170.5 152.5 Z" stroke-linejoin="round" transform="translate(0,0)"></path><path fill="#ED8C2B" d="M 241.28023108359105 276.178651705755 A 142.5 142.5 0 1 1 170.3020703588248 10.000137460216678 L 170.5 152.5 A 0 0 0 1 0 170.5 152.5 Z" stroke-linejoin="round" transform="translate(-10,3)"></path></g><g class="highcharts-markers highcharts-series-0" zIndex="0.1" transform="translate(10,42) scale(1 1)"></g></g><text x="181" text-anchor="middle" class="highcharts-title" zIndex="4" style="color:#333333;font-size:18px;font:bold 14px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;width:297px;" y="24"><tspan>Break-up of Total Payment</tspan></text><g class="highcharts-data-labels highcharts-series-0 highcharts-tracker" zIndex="6" visibility="visible" transform="translate(10,42) scale(1 1)" opacity="1" style="cursor:pointer;"><g zIndex="1" style="cursor:pointer;" transform="translate(258,114)"><text x="5" zIndex="1" style="font-size:11px;font-weight:bold;color:#FFFFFF;text-shadow:false;fill:#FFFFFF;" y="16"><tspan style="font-weight:bold">41.7%</tspan></text></g><g zIndex="1" style="cursor:pointer;" transform="translate(41,171)"><text x="5" zIndex="1" style="font-size:11px;font-weight:bold;color:#FFFFFF;text-shadow:false;fill:#FFFFFF;" y="16"><tspan style="font-weight:bold">58.3%</tspan></text></g></g><g class="highcharts-legend" zIndex="7" transform="translate(44,359)"><rect x="0.5" y="0.5" width="272" height="25" strokeWidth="1" stroke="#DDDDDD" stroke-width="1" fill="none" visibility="visible"></rect><g zIndex="1"><g><g class="highcharts-legend-item" zIndex="1" transform="translate(8,3)"><text x="21" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" zIndex="2" y="15"><tspan>Principal Loan Amount</tspan></text><rect x="0" y="4" width="16" height="12" zIndex="3" fill="#88A825"></rect></g><g class="highcharts-legend-item" zIndex="1" transform="translate(171.390625,3)"><text x="21" y="15" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;fill:#333333;" text-anchor="start" zIndex="2"><tspan>Total Interest</tspan></text><rect x="0" y="4" width="16" height="12" zIndex="3" fill="#ED8C2B"></rect></g></g></g></g><g class="highcharts-tooltip" zIndex="8" style="cursor:default;padding:0;pointer-events:none;white-space:nowrap;font:14px Lato, Helvetica Neue, Helvetica, Arial, sans-serif;" transform="translate(0,-9999)"><path fill="none" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="black" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="black" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="black" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(249, 249, 249, .85)" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5"></path><text x="8" zIndex="1" style="font-size:12px;color:#333333;fill:#333333;" y="20"></text></g></svg></div></div>
                </div>            
                <div class="cleardiv"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
          <!-- <div class="col-md-6">
                <div class="form-group">
                   <label for="loantype">Select Loan Type:</label>
                      <input class="form-control loan_cat" name="loan_cat" type="text"  data-toggle="modal" data-target="#myModal" id="dataval" placeholder="Loan Type">
                      <div class="modal" id="myModal" >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Select Loan Category</h4>
                           
                          </div>
                          <div class="modal-body">
                           <ul class="moul">
                            <?php $i=1; $j=1;foreach($cats as $cat){?>
                            <li class="moli"><input type="checkbox" id="cb<?php echo $i++;?>"   value="<?php echo $cat->name;?>" onclick="checkboxs(this.value)"/>
                              <label for="cb<?php echo $j++;?>"><img src="<?php echo base_url('categories/').$cat->image;?>" /></label>
                            </li>
                            <?php }?>
                          </ul>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                          </div>

                        </div>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="emi">EMI Type (if any)</label>
                    <select  style="width:90%" name="emi_type_payment" class="form-control emi_type_payment">
                      <option>Please Select EMI</option>
                     <option>Online</option>
                     <option>Cash</option>
                     <option>Salary</option>
                     option
                    </select>
                </div>
               
                
                <div class="form-group">
                   <label for="bonus">Interest Rate</label>
                    <select style="width:90%" name="intrest_rate" id="number1" onchange="calculator()" class="form-control intrest_rate" placeholder="Enter Annual Bonus" >
                    <option>Please EMI Montly</option>}
                      <script>for(var i=1;i<=200;i++){ document.writeln('<option>'+i+'</option>'); }</script>
                    </select>
                </div>
                <div class="form-group">
                   <label for="bank">EMI Monthly Amount</label>
                    <input type="text" name="emi_amount" id="number2" class="form-control emi_amount" placeholder="EMI Monthly Amount" readonly>
                </div>
                 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <label for="gross">Enter Salary (Monthly)</label>
                    <input type="text" id="number3" name="g_salary" class="form-control g_salary" placeholder="Enter Salary" >
                </div>
                <div class="form-group">
                   <label for="loan_emi">Loan (Amount)</label>
                    <input id="number4" type="text" name="loan_amount" class="form-control loan_amount" placeholder="Loan EMI" >
                </div>
                <div class="form-group">
                   <label for="tax">Enter EMI (Monthly)</label>
                    <select style="width:90%" id="number5" name="month_emi" onchange="calculator()" class="form-control month_emi" placeholder="Enter Deduction Tax" > 
                      <option>Please EMI Montly</option>}
                      <script>for(var i=1;i<=200;i++){ document.writeln('<option>'+i+'</option>'); }</script>
                    </select>
                </div> 
                <div class="form-group">
                   <label for="bank">Cash Amount</label>
                   <input type="text" id="number6" name="amount" class="form-control month_salary " placeholder="Cash Amount" >

                    <input type="hidden" id="number6" name="month_salary" class="form-control month_salary emi_amount_total" placeholder="Cash Amount" >
                   
                </div>
            </div> -->
            <div class="col-md-12 submit-button-block js-buttons" data-actionloc="">
              <button class="btn btn-primary btn-lg pull-left" onclick="return previous()" type="button">Previous</button>
              <button class="btn btn-primary btn-lg pull-right" id="next1" onclick="return nextpage2()">Next</button>
            </div>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3" >
      <div class="col-sm-6  col-md-offset-3">
        <div class="col-md-12 cal">
            <h3 class="text-center">User Info</h3>
            <div class="col-md-12">
              <div class="form-group">
                   <label for="name">Enter Mobile Number</label>
                    <input type="text" id="number" name="mobile_no" class="form-control" placeholder="Enter Mobile Number" minlength="10" maxlength="10" onkeypress="removeWarning()">
                </div>
                <div class="form-group">
                   <label for="email">Enter Email</label>
                   <input type="email"  class="form-control" placeholder="Enter Email" name="email_id" onkeypress="removeWarning()">
                </div>
                <div class="form-group">
                   <label for="email">Address</label>
                   <input type="text"  class="form-control" placeholder="Enter Address" name="address1" onkeypress="removeWarning()">
                </div>
                <div class="form-group">
                   <label for="name">Enter Aadhar Number</label>
                    <input type="text" class="form-control" name="adhar" placeholder="Enter Aadhar Number" onkeypress="removeWarning()">
                </div>
                <div class="form-group">
                    <label for="dob">Enter PAN Number</label>
                      <input type="text" class="form-control"  name="pancard" placeholder="Enter PAN Number" onkeypress="removeWarning()">
                </div>
               <!--  <div class="form-group">
                    <label for="dob">Enter Verification Code</label>
                      <input type="text" class="form-control"  name="verification" placeholder="Enter Verification Code" required>
                </div> -->
            
                
            </div>
            <div class="col-md-12">
              <button class="btn btn-primary btn-lg pull-left" onclick="return previous2()" type="button">Previous</button>
              <button class="btn btn-primary btn-lg pull-right" onclick="return nextpage3()" type="button">Next</button>
            </div>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-4" >
      <div class="col-sm-6  col-md-offset-3">
        <div class="col-md-12 cal">
          <h3 class="text-center">Successful</h3>
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="CIBIL">Property Location</label>
                        <select style="width:90%"  class="form-control" id="location" name="location" onselect="removeWarning()">
                            <option value="">Please Select</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Gurugram">Gurugram</option>
                            <option value="Noida">Noida</option>
                            <option value="Faridabad">Faridabad</option>
                            <option value="Ghaziabad">Ghaziabad</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="CIBIL">Property</label>
                        <select style="width:90%" class="form-control" id="property" name="property" onselect="removeWarning()">
                            <option value="">Select Property Type</option>
                            <option value="Regularised">Regularised</option>
                            <option value="Approved">Approved</option>
                        </select>
                </div>
            
                <div class="form-group">
                    <label for="CIBIL">Select CIBIL Details</label>
                    <select style="width:90%" class="form-control" id="cibil" name="cibil" onselect="removeWarning()">
                        <option value="">Select CIBIL Detail</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Good">Good </option>
                            <option value="Average">Average</option>
                            <option value="Bad">Bad</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="CIBIL">Property Details</label>
                        <select style="width:90%" class="form-control" id="Property_detail" name="Property_detail" onselect="removeWarning()">
                            <option value="">Select Property</option>
                            <option value="Residential"> Residential</option>
                        </select>
                </div>
                <div class="form-group">
                    <label class="error" style="color: red;"></label>  
                </div>
            </div>
          <div class="col-md-12">
              <button class="btn btn-primary btn-lg pull-left" onclick="return previous3()" type="button">Previous</button>
              <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
            </div>
        </div>
      </div>
    </div>
    </form>
    </div>
    </div>
  </div>
</section>
<!-- END CONTENT-->

<!--Info Section-->
<section class="info-section">
<div class="clearfix">
<!--Info Column-->
<div class="info-column">
<div class="inner-box">
<div class="info-box">
<div class="inner"> <span class="icon flaticon-house"></span>
<div class="title">Locate us on:</div>
<h3>Gurgaon and Dwarka</h3>
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
<h3><a href="tel:+919310000440">+919310000440</a></h3>
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


<!-- The Modal -->
   <div id="cont" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             <h3><span class="showing"> 
              <?php echo $this->session->flashdata('message'); ?>
             </span></h3>
            </div>
          </div>

        </div>
      </div>

</div>

<?php $this->load->view('front/footer');?>
<?php if($this->session->flashdata('message')){?>
 <script type="text/javascript">
    $(window).load(function(){
        $('#cont').modal('show');
    });
</script>
<?php }?>
<script type="text/javascript">
  /*$(".image-checkbox").each(function () {
  if ($(this).find('input[type="radio"]').first().attr("checked")) {
    $(this).addClass('image-checkbox-checked');
  }
  else {
    $(this).removeClass('image-checkbox-checked');
  }
});

// sync the state to the input
$(".image-checkbox").on("click", function (e) {
  $(this).toggleClass('image-checkbox-checked');
  var $checkbox = $(this).find('input[type="radio"]');
  $checkbox.prop("checked",!$checkbox.prop("checked"))

  e.preventDefault();
});*/
$(document).ready(function(e){
        
      $('.image-checkbox').click(function(e) {
        $('.image-checkbox').not(this).removeClass('image-checkbox-checked')
        .siblings('input').prop('checked',false);
      $(this).addClass('image-checkbox-checked')
            .siblings('input').prop('checked',true);
    });
      
  });
</script>

<script type="text/javascript">
$('from#frm_load').submit(function(e){
e.preventDefault();
var mobile = $('#mobile').val();
$.ajax({
type: "POST",
url: 'order.php',
data: {'mobile':mobile}, 
success: function(res)
{
if(res=='success')
{
$('#empModal').modal('show');

}else{
alert('Mobile no is wrong');
}
}
});
});

</script>
<script>
$(document).ready(function () {
//called when key is pressed in textbox
$("#mobile,#number,#number1,#number2,#number3,#number4,#number5,#number6,#number7").keypress(function (e) {
//if the letter is not digit then display error and don't type anything
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//display error message
$("#errmsg").html("Digits Only").show().fadeOut("slow");
return false;
}
});
});
</script>

<script type="text/javascript">    
$(document).ready(function () {

$('#step-1').show();
$('#step-2').hide();
$('#step-3').hide();
$('#step-4').hide();
$('.a1').addClass("btn-primary");
$('.a1').removeClass("btn-default");
});
function nextpage(){

$('#step-1').hide();
$('#step-2').show();
$('#step-3').hide();
$('#step-4').hide();

$('.a1').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a2').removeAttr('disabled');

$('.a1').addClass("btn-default");
$('.a1').removeClass("btn-primary");
$('.a2').addClass("btn-primary");
$('.a2').removeClass("btn-default");
}
function nextpage2(){

$('#step-1').hide();
$('#step-2').hide();
$('#step-3').show();
$('#step-4').hide();

$('.a1').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a3').removeAttr('disabled');

$('.a2').addClass("btn-default");
$('.a2').removeClass("btn-primary");
$('.a3').addClass("btn-primary");
$('.a3').removeClass("btn-default");
}
function nextpage3(){

$('#step-1').hide();
$('#step-2').hide();
$('#step-3').hide();
$('#step-4').show();

$('.a1').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').removeAttr('disabled');

$('.a3').addClass("btn-default");
$('.a3').removeClass("btn-primary");
$('.a4').addClass("btn-primary");
$('.a4').removeClass("btn-default");
}
function previous(){
$('#step-1').show();
$('#step-2').hide();
$('#step-3').hide();
$('#step-4').hide();

$('.a2').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a1').removeAttr('disabled');

$('.a2').addClass("btn-default");
$('.a2').removeClass("btn-primary");
$('.a1').addClass("btn-primary");
$('.a1').removeClass("btn-default");
} 
function previous2(){
$('#step-1').hide();
$('#step-2').show();
$('#step-3').hide();
$('#step-4').hide();
$('.a1').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').attr('disabled', 'disabled');
$('.a3').removeAttr('disabled');

$('.a3').addClass("btn-default");
$('.a3').removeClass("btn-primary");
$('.a2').addClass("btn-primary");
$('.a2').removeClass("btn-default");
} 
function previous3(){
$('#step-1').hide();
$('#step-2').hide();
$('#step-3').show();
$('#step-4').hide();

$('.a1').attr('disabled', 'disabled');
$('.a3').attr('disabled', 'disabled');
$('.a2').attr('disabled', 'disabled');
$('.a4').removeAttr('disabled');

$('.a4').addClass("btn-default");
$('.a4').removeClass("btn-primary");
$('.a3').addClass("btn-primary");
$('.a3').removeClass("btn-default");
}
function checkboxs(argument) {
$('#dataval').val(argument);
}
function calculator()
{
  //alert('hello');
  var amount=parseFloat($('.loan_amount').val());
  var emi_intrest=parseFloat($('.intrest_rate').val());
  var emi=parseFloat($('.month_emi').val());
  if(amount!='' && emi_intrest!='' && emi!='')
  {
    total=amount / 100 * emi_intrest;
    total_amount=total * emi;
    var emi_amount=parseFloat($('.emi_amount_total').val(total));
    var emi_amount=parseFloat($('.emi_amount').val(total_amount));
  }
  
}
function selectState(argument) 
{
  $.ajax({
    url: '<?php echo base_url('home/selectState')?>',
    type: 'POST',
    data: {'state': argument},
    success:function(res)
    {
      $('.state_show').html(res);
    }
  });
}
function selectCity(argument) 
{
  $.ajax({
    url: '<?php echo base_url('home/selectCity')?>',
    type: 'POST',
    data: {'city': argument},
    success:function(res)
    {
      $('.city_show').html(res);
    }
  });
}
function checkSelectedvalue(argument) {
  $('.loanproduct').val(argument);
}

function validateForm() {
    var mobile_no = document.forms["myForm"]["mobile_no"].value;
    var email = document.forms["myForm"]["email_id"].value;
    var adhar = document.forms["myForm"]["adhar"].value;
    var pancard = document.forms["myForm"]["pancard"].value;
     var address = document.forms["myForm"]["address1"].value;
     var location = document.forms["myForm"]["location"].value;
     var property = document.forms["myForm"]["property"].value;
     var cibil = document.forms["myForm"]["cibil"].value;
     var Property_detail = document.forms["myForm"]["Property_detail"].value;
    if (mobile_no == "") {
        $('.error').html("Mobile No must be fill");
        return false;
    }
    else if (email == "") {
        $('.error').html("Email Id must be fill");
        return false;
    }
    else if (address == "") {
        $('.error').html("Address  must be fill");
        return false;
    }
    else if (adhar == "") {
        $('.error').html("Aadhar Id must be fill");
        return false;
    }
    else if (pancard == "") {
        $('.error').html("Pancard Id must be fill");
        return false;
    }
    else if (location == "") {
        $('.error').html("Location  must be select");
        return false;
    }
    else if (property == "") {
        $('.error').html("property  must be select");
        return false;
    }
    else if (cibil == "") {
        $('.error').html("cibil  must be select");
        return false;
    }
    else if (Property_detail == "") {
        $('.error').html("Property detail must be select");
        return false;
    }
    else{
      return true;
    }

}

function removeWarning() {
     $('.error').html("");
}


</script>
<link rel='stylesheet'href='fronts/css/cal/main.css?x18730' type='text/css' media='all' />

<link rel='stylesheet' id='commoncalculator_css-css'  href='fronts/css/cal/commoncalculator.css?x18730' type='text/css' media='all' />

<link rel='stylesheet' id='emicalculator_css-css'  href='fronts/css/cal/emicalculator.css?x18730' type='text/css' media='all' />

<script type='text/javascript' src='fronts/css/cal/jquery.js?x18730'></script>

<link rel="alternate" type="application/json+oembed" href="https://emicalculator.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Femicalculator.net%2F" />

<link rel="alternate" type="text/xml+oembed" href="https://emicalculator.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Femicalculator.net%2F&#038;format=xml" />

<link type="text/css" rel="stylesheet" href="fronts/css/cal/simple-pull-quote.css?x18730" />

<style type='text/css'>img#wpstats{display:none}</style>  

<link rel='stylesheet' id='sow-features-default-0afe5955d6f9-css'  href='fronts/css/cal/sow-features-default-0afe5955d6f9.css?x18730' type='text/css' media='all' />
<script type='text/javascript' src='fronts/css/cal/core.min.js?x18730'></script>

<script type='text/javascript' src='fronts/css/cal/widget.min.js?x18730'></script>

<script type='text/javascript' src='fronts/css/cal/mouse.min.js?x18730'></script>

<script type='text/javascript' src='fronts/css/cal/slider.min.js?x18730'></script> 

<script type='text/javascript' src='fronts/css/cal/commoncalculator.js?x18730'></script>
<script type='text/javascript' src='fronts/js/cal.js'></script>
<script type='text/javascript' src='fronts/css/cal/ajax-load-more.min.js?x18730'></script> 
