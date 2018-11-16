<style type="text/css" media="screen">
.highcharts-credits{ display: none; }  
</style>
 <section class="content">
        <?php          
            if(!empty($success_msg)){
                echo '<div class="alert alert-success">'.$success_msg.'</div>';
            }elseif(!empty($error_msg)){
                echo '<div class="alert alert-danger">'.$error_msg.'</div>';
            }          
            if($user['kyc_status'] == 0){
               echo '<div class="alert alert-info"> Please Updated Your KYC, from your profile.</div>';
            }elseif($user['kyc_status'] == 1){
                echo '<div class="alert alert-warning"> KYC has been submitted for approval.</div>';
            }
          ?>
          <?php if($user['user_type']==1){ ?>
              <div class="row">
                  <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-purple">
                        <div class="inner">
                          <h3><?php echo $agent[0]->agn; ?></h3>
                            <p>Total Agent</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-globe"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3><?php echo $customer[0]->cus; ?></h3>
                        <p>Customers</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-sitemap"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><?php echo $pending[0]->pend; ?></h3>
                            <p>Pending Installment</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-globe"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                  </div>
                  <div class="col-lg-3 col-xs-6">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?php echo $complete[0]->conf; ?></h3>
                            <p>Complete Installment</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-globe"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                  </div>
              </div>
            <div class="row">
              <section class="col-md-12 connectedSortable">
                  <div class="box box-danger">
                  <div class="box-header with-border bg-maroon">
                    <h3 class="box-title">Payment</h3>
                  </div> 
                <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </section>
          </div> 
          <div class="row">
              <section class="col-md-12 connectedSortable">
                  <div class="box box-success">
                  <div class="box-header with-border bg-blue">
                    <h3 class="box-title">Installment</h3>
                  </div> 
                <div id="container2" style="height: 400px; min-width: 310px"></div>
                </div>
            </section>
          </div> 
     <!-- <div class="row">
               
                <section class="col-lg-5 connectedSortable">
                    
                    <div class="box box-danger">
                    <div class="box-header with-border bg-maroon">
                      <h3 class="box-title">Other Users</h3>
                    </div>         
                    <div class="box-footer no-padding">
                      <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">WhiteLable User Type <span class="pull-right"><?php echo "10"; ?></span></a></li>
                        <li><a href="#">Customer Users <span class="pull-right"><?php echo "10" ?></span></a></li>         
                      </ul>
                    </div>
                  </div>        
                 
                </section>
              </div>  -->     
  <?php } ?>
    </section>
  </div>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
Highcharts.chart('container1', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Monthly Average Payment Complete And Pending'
    },
    subtitle: {
        text: 'Source: <a class="text-success" href="<?php echo base_url()?>">Loan Sahara.com</a>'
    },
    xAxis: {
        categories: ['Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct' ]
    },
    yAxis: {
        title: {
            text: 'Payment Complete And Pending'
        },
        labels: {
            formatter: function () {
                return this.value + '°';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: 'green',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Complete',
        marker: {
            symbol: 'square'
        },
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
            y: 26.5,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/sun.png)'
            }
        }, 23.3, 18.3, 13.9, 9.6]

    }, {
        name: 'Pending',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
            marker: {
                symbol: 'url(https://www.highcharts.com/samples/graphics/snow.png)'
            }
        }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }]
});
</script>
<script type="text/javascript">
  $.ajax({
    url: '<?php echo base_url('payment/getBalance');?>',
    type: 'GET',
    dataType: 'json',
    data: {},
    success:function(res){
      resp=JSON.stringify(res);
$.getJSON('https://cdn.rawgit.com/highcharts/highcharts/057b672172ccc6c08fe7dbb27fc17ebca3f5b770/samples/data/'+resp, function (data) {

    var start = +new Date();
    var date_start='1538332200';
    var last_date='1857035277';
    // Create the chart
    Highcharts.stockChart('container2', {
        chart: {
            events: {
                load: function () {
                    if (!window.TestController) {
                        this.setTitle(null, {
                            text: 'Loan Sahara ' + (new Date() - start) + ' Customer'
                        });
                    }
                }
            },
            zoomType: 'x'
        },

        rangeSelector: {

            buttons: [{
                type: 'day',
                count: 3,
                text: '3d'
            }, {
                type: 'week',
                count: 1,
                text: '1w'
            }, {
                type: 'month',
                count: 1,
                text: '1m'
            }, {
                type: 'month',
                count: 6,
                text: '6m'
            }, {
                type: 'year',
                count: 1,
                text: '1y'
            }, {
                type: 'all',
                text: 'All'
            }],
            selected: 3
        },

        yAxis: {
            title: {
                text: '<i class="fa fa-money"></i>'
            }
        },

        title: {
            text: 'Daily Payment System'
        },

        subtitle: {
            text: 'Built chart in ...' // dummy text to reserve space for dynamic subtitle
        },

        series: [{
            name: 'Daily Loan Payment',
            data: data.data,
            pointStart: data.pointStart,
            pointInterval: data.pointInterval,
            tooltip: {
                valueDecimals: 1,
                valueSuffix: '<i class="fa fa-money"></i>'
            }
        }]

    });
});
}
});
  
</script>