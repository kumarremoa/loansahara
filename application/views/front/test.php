<!doctype html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<link rel='stylesheet' id='sage_css-css'  href='https://emicalculator.net/wp-content/themes/emicalculator/dist/styles/main.css?x18730' type='text/css' media='all' /><link rel='stylesheet' id='commoncalculator_css-css'  href='https://emicalculator.net/wp-content/themes/emicalculator/dist/styles/commoncalculator.css?x18730' type='text/css' media='all' />
		<link rel='stylesheet' id='emicalculator_css-css'  href='https://emicalculator.net/wp-content/themes/emicalculator/dist/styles/emicalculator.css?x18730' type='text/css' media='all' />
		<script type='text/javascript' src='https://emicalculator.net/wp-includes/js/jquery/jquery.js?x18730'></script> 
		<link rel="alternate" type="application/json+oembed" href="https://emicalculator.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Femicalculator.net%2F" />
		<link rel="alternate" type="text/xml+oembed" href="https://emicalculator.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Femicalculator.net%2F&#038;format=xml" />
		<link type="text/css" rel="stylesheet" href="https://emicalculator.net/wp-content/plugins/simple-pull-quote/css/simple-pull-quote.css?x18730" />
		<style type='text/css'>img#wpstats{display:none}</style>  
	</head>
	<body>

		<div class="wrap container" role="document">
			<div class="content row">
			<div class="page-header">
				<h1>EMI Calculator for Home Loan, Car Loan &#038; Personal Loan in India</h1>
			</div>
			<div class="homepagebanner visible-xs"></div>
			<div class="calculatorcontainer">
				<div class="emicalculatorcontainer">
					<div id="loanformcontainer" class="row">
						<div id="emicalculatordashboard" class="col-sm-8">
							<ul class="loanproduct-nav">
								<li id="home-loan" class="active"><a href="#">Home Loan</a></li>
								<li id="personal-loan"><a href="#">Personal Loan</a></li>
								<li id="car-loan"><a href="#">Car Loan</a></li>
							</ul>
							<div class="cleardiv"></div>
							<div id="emicalculatorinnerformwrapper">
								<form id="emicalculatorform">
									<div class="form-horizontal" id="emicalculatorinnerform">
										<div class="form-group lamount">
											<label class="col-md-4 control-label" for="loanamount">Home Loan Amount</label>
											<div class="col-md-6">
												<div class="input-group">
													<input class="form-control" id="loanamount" name="loanamount" value="25,00,000" type="text" />
													<span class="input-group-addon">₹</span>
												</div>
											</div>
										</div>
										<div id="loanamountslider"></div>
										<div id="loanamountsteps" class="steps">
											<span class="tick" style="left: 0%;">|<br/><span class="marker">0</span></span>
											<span class="tick hidden-xs" style="left: 12.5%;">|<br/><span class="marker">25L</span></span>
											<span class="tick" style="left: 25%;">|<br/><span class="marker">50L</span></span>
											<span class="tick hidden-xs" style="left: 37.5%;">|<br/><span class="marker">75L</span></span>
											<span class="tick" style="left: 50%;">|<br/><span class="marker">100L</span></span>
											<span class="tick hidden-xs" style="left: 62.5%;">|<br/><span class="marker">125L</span></span>
											<span class="tick" style="left: 75%;">|<br/><span class="marker">150L</span></span>
											<span class="tick hidden-xs" style="left: 87.5%;">|<br/><span class="marker">175L</span></span>
											<span class="tick" style="left: 100%;">|<br/><span class="marker">200L</span></span>
										</div>
										<div class="sep form-group lint">
											<label class="col-md-4 control-label" for="loaninterest">Interest Rate</label>
											<div class="col-md-6">
												<div class="input-group">
													<input class="form-control" id="loaninterest" name="loaninterest" value="10.5" type="text" />
													<span class="input-group-addon">%</span>
												</div>
											</div>
										</div>
										<div id="loaninterestslider"></div>
										<div id="loanintereststeps" class="steps">
											<span class="tick" style="left: 0%;">|<br/><span class="marker">5</span></span>
											<span class="tick" style="left: 16.67%;">|<br/><span class="marker">7.5</span></span>
											<span class="tick" style="left: 33.34%;">|<br/><span class="marker">10</span></span>
											<span class="tick" style="left: 50%;">|<br/><span class="marker">12.5</span></span>
											<span class="tick" style="left: 66.67%;">|<br/><span class="marker">15</span></span>
											<span class="tick" style="left: 83.34%;">|<br/><span class="marker">17.5</span></span>
											<span class="tick" style="left: 100%;">|<br/><span class="marker">20</span></span>
										</div>
										<div class="sep form-group form-inline lterm">
											<label class="col-md-4 control-label" for="loanterm">Loan Tenure</label>
											<div class="col-md-6">
												<div class="loantermwrapper">
													<div class="btn-group float-right gutter-left no-gutter-right tenure-choice" data-toggle="buttons">
														<label class="btn btn-default active">
															<input type="radio" name="loantenure" id="loanyears" value="loanyears" tabindex="4" autocomplete="off" checked="checked" />Yr 
														</label>
														<label class="btn btn-default">
														    <input type="radio" name="loantenure" id="loanmonths" value="loanmonths" tabindex="5" autocomplete="off" />Mo 
													    </label>
													</div>
													<div class="input-group fill-width">
														<input class="form-control" id="loanterm" name="loanterm" value="20" type="text" />
													</div>
												</div>
											</div>
										</div>
										<div id="loantermslider"></div>
										<div id="loantermsteps" class="steps">
											<span class="tick" style="left: 0%;">|<br/><span class="marker">0</span></span>
											<span class="tick" style="left: 16.67%;">|<br/><span class="marker">5</span></span>
											<span class="tick" style="left: 33.33%;">|<br/><span class="marker">10</span></span>
											<span class="tick" style="left: 50%;">|<br/><span class="marker">15</span></span>
											<span class="tick" style="left: 66.67%;">|<br/><span class="marker">20</span></span>
											<span class="tick" style="left: 83.33%;">|<br/><span class="marker">25</span></span>
											<span class="tick" style="left: 100%;">|<br/><span class="marker">30</span></span>
										</div>
										<div id="leschemewrapper" class="sep toggle-visible">
											<div class="form-group escheme">
												<label class="col-md-4 control-label" for="emischeme">EMI Scheme</label>
												<div class="col-md-8">
													<div class="input-group emischemes">
														<div class="btn-group add-check" data-toggle="buttons">
															<label class="btn btn-default">
															 	<input type="radio" name="emischeme" id="emiadvance" value="emiadvance" tabindex="4" autocomplete="off" />EMI in Advance 
															</label>
															<label class="btn btn-default active">
															 	<input type="radio" name="emischeme" id="emiarrears" value="emiarrears" tabindex="5" autocomplete="off" checked="checked"/>EMI in Arrears 
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<input id="loanproduct" name="loanproduct" value="" type="hidden"/>
									<input id="loanstartdate" name="loanstartdate" value="" type="hidden"/>
									<input id="loandata" name="loandata" value="" type="hidden"/>
									<input id="calcversion" name="calcversion" value="4.0" type="hidden"/>
								</form>
								<div class="row gutter-left gutter-right">
									<div id="emipaymentsummary" class="col-sm-5 col-md-6 no-gutter-left no-gutter-right">
										<div id="emiamount">
											<h4>Loan EMI</h4>
											<p>₹<span>24,959</span></p>
										</div>
										<div id="emitotalinterest">
											<h4>Total Interest Payable</h4>
											<p>₹<span>34,90,279</span></p>
										</div>
										<div id="emitotalamount" class="column-last">
											<h4>Total Payment<br/>(Principal + Interest)</h4>
											<p>₹<span>59,90,279</span></p>
										</div>
								    </div>		
									<div id="emipiechart" class="no-gutter-left no-gutter-right col-sm-7 col-md-6 highcharts-container"></div>
								</div>						
								<div class="cleardiv"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<link rel='stylesheet' id='sow-features-default-0afe5955d6f9-css'  href='https://emicalculator.net/wp-content/uploads/siteorigin-widgets/sow-features-default-0afe5955d6f9.css?x18730' type='text/css' media='all' />
	    <script type='text/javascript' src='https://emicalculator.net/wp-includes/js/jquery/ui/core.min.js?x18730'></script>

	    <script type='text/javascript' src='https://emicalculator.net/wp-includes/js/jquery/ui/widget.min.js?x18730'></script>

	    <script type='text/javascript' src='https://emicalculator.net/wp-includes/js/jquery/ui/mouse.min.js?x18730'></script>

	    <script type='text/javascript' src='https://emicalculator.net/wp-includes/js/jquery/ui/slider.min.js?x18730'></script> 

	    <script type='text/javascript' src='https://emicalculator.net/wp-content/themes/emicalculator/dist/scripts/commoncalculator.js?x18730'></script>
	    <script type='text/javascript' src='cal.js'></script>
	    <script type='text/javascript' src='https://emicalculator.net/wp-content/plugins/ajax-load-more/core/dist/js/ajax-load-more.min.js?x18730'></script> 
	</body>
</html>