 <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo setting_all('version'); ?> 
    </div>
    <strong>Copyright <?php echo setting_all('company_name'); ?> &copy; <?php echo date('Y');?> - <?php echo (date('Y') + 1);?> | Visit : <a href="https://<?php echo setting_all('website'); ?>" target="blank"><?php echo setting_all('website'); ?></a>
  </footer>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url('assets/js/renderMenu.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/js/daterangepicker.js'); ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-menu-editor.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/iconset/iconset-fontawesome-4.7.0.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-iconpicker.js'); ?>"></script>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/PACE/pace.min.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.form-validator.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/js/icheck.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/adapters/jquery.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/js/demo.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script>
  $('.select2').select2();
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  });
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  });

  function validate_fileType(fileName,Nameid,arrayValu)
  {
    var string = arrayValu;
    var tempArray = new Array();
    var tempArray = string.split(',');          
    var allowed_extensions =tempArray;
    var file_extension = fileName.split(".").pop(); 
    for(var i = 0; i <= allowed_extensions.length; i++)
    {
      if(allowed_extensions[i]==file_extension)
      { 
        $("#error_"+Nameid).html("");
        return true; // valid file extension
      }
    }
    $("#"+Nameid).val("");
    $("#error_"+Nameid).css("color","red").html("File format not support to upload");
    return false;
  }
</script>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function () {
    $(".alert").fadeTo(5000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
    });
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass   : 'iradio_flat-red'
    });

  });
</script>
<?php if ($this->uri->segment(1)=="dashboard") {?>

<script>

/*
function closingreportdatail()
  {   var date=$('#closingdatepicker').val();
      //alert(date);
      $.ajax({  
        url: "<?php echo site_url("users/closingreport") ?>",
        method:'post',
        data:{
          date:date
        }
      }).done(function(data) {        
        //alert(data);
        $('#closingreportdata').html(data);
        return false;     
      });
  }*/

   
</script>

<?php  }  ?>
<?php if ($this->uri->segment(1)=="white-label-users") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#whitelableUsers').DataTable({
        "ajax": {
            url : "<?php echo site_url("whitelabels/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "order": [ 0, "desc" ],          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>
<script type="text/javascript">
  $(document).ready(function () {
  $('#dtBasicExample,#dtBasicExample1').DataTable({
    dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ]
  });
  //$('.dataTables_length').addClass('bs-select');
});
</script>
<?php if ($this->uri->segment(1)=="template") {?>
<script type="text/javascript">
$(document).ready(function() {    
    $('#emailTemplates').DataTable({
        "ajax": {
            url : "<?php echo site_url("templates/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "order": [ 0, "desc" ],          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<script>
  var tt = $('textarea.ckeditor').ckeditor();
  CKEDITOR.config.allowedContent = true;
  $(document).ready(function() {
    $('#nameModal_Templates')
      .find('div.col-md-offset-4')
      .removeClass('col-md-offset-4')
      .removeClass('col-md-4')
      .addClass('modal-dialog')
      .addClass('modal-lg');
  });
</script> 
<?php  }  ?>

<?php if ($this->uri->segment(1)=="addbanner") {?>
 
<script type="text/javascript">
$(document).ready(function() {
   
    $('#AddBanners').DataTable({
        "ajax": {
            url : "<?php echo site_url("addbanner/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="api-users") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#ApiUsers').DataTable({
        "ajax": {
            url : "<?php echo site_url("apiusers/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="master-distributors-users") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#masterDistributor').DataTable({
        "ajax": {
            url : "<?php echo site_url("masterdistributors/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="area-distributors-users") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#areaDistributor').DataTable({
        "ajax": {
            url : "<?php echo site_url("areadistributors/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="agents") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#agents').DataTable({
        "ajax": {
            url : "<?php echo site_url("agents/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="customer-care-users") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#ccuser').DataTable({
        "ajax": {
            url : "<?php echo site_url("ccusers/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="admin-commission") {?>

<script type="text/javascript">
$(document).ready(function() {
    
    $('#adminCommission').DataTable({
        "ajax": {
            url : "<?php echo site_url("admincommission/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
function isNumberKey(evt, obj) {

    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function comUpdated(id) { 
    var com = '#commission-'+ id ; 
    var commission = $(com).val(); 
    var sur = '#surcharge-'+ id ; 
    var surcharge = $(sur).val();
    var csom = '#status-'+ id ; 
    var status = $(csom).val();
    var cqom = '#margin_type-'+ id ; 
    var margin_type = $(cqom).val();   
  $.ajax({  
    url: '<?php echo base_url().'admincommission/update'; ?>',
    method:'post',
    data:{
      commission: commission,
      surcharge: surcharge,
      status: status,
      margin_type: margin_type,
      id: id
    }
  }).done(function(data) {
    dat=data.split('^');
    if(dat[1]==1)
    {
       toastr["success"](dat[2]);
    }else{
       toastr["error"](dat[2]);
    }
    setInterval(function(){ toastr.clear(); }, 800);    
  });
}

</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="commission-slab") {?>

<script type="text/javascript">
$(document).ready(function() {
    
    $('#commissionSlab').DataTable({
        "ajax": {
            url : "<?php echo site_url("setcommissionslab/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
function isNumberKey(evt, obj) {

    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function comUpdated(id) { 
    var slab_a1 = '#slab_a-'+ id ; 
    var slab_a = $(slab_a1).val(); 
    var operator_idq = '#operator_id-'+ id ; 
    var operator_id = $(operator_idq).val(); 
    var slab_b1 = '#slab_b-'+ id ; 
    var slab_b = $(slab_b1).val();
    var slab_c1 = '#slab_c-'+ id ; 
    var slab_c = $(slab_c1).val();  
    var slab_d1 = '#slab_d-'+ id ; 
    var slab_d = $(slab_d1).val(); 
    var slab_e1 = '#slab_e-'+ id ; 
    var slab_e = $(slab_e1).val();  
    var sur = '#surcharge-'+ id ; 
    var surcharge = $(sur).val();
    var csom = '#status-'+ id ; 
    var status = $(csom).val();
    var cqom = '#type-'+ id ; 
    var type = $(cqom).val();
    
  $.ajax({  
    url: '<?php echo base_url().'setcommissionslab/update'; ?>',
    method:'post',
    data:{
      operator_id: operator_id,
      slab_a: slab_a,
      slab_b: slab_b,
      slab_c: slab_c,
      slab_d: slab_d,
      slab_e: slab_e,
      surcharge: surcharge,
      status: status,
      type: type,
      id: id
    }
  }).done(function(data) {
    dat=data.split('^');
    if(dat[1]==1)
    {
       toastr["success"](dat[2]);        
    }else{
       toastr["error"](dat[2]);
    }
    setInterval(function(){ toastr.clear(); }, 1800);    
  });
}

</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="money-transfer") {?>
<script type="text/javascript">
$(document).ready(function() {
     $('#checkUser').on('click', function() { 

      var mobile = $('#mobile').val();
      if(mobile =="" || mobile.length != 10 || isNaN(mobile)){
        alert("Please Enter a Valid Mobile Number of 10 digits...");
      }else{

      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'moneytransfers/newsender'; ?>',
        method:'post',
        data:{
          mobile: mobile
        }
      }).done(function(data) {
       console.log(data);
        $('#mtval').html(data);       
      });

      }
    });   
});

function resendotp() {      
  var mobile = $('#mobile').val();
  var ref = $('#ref').val();

  $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
  $.ajax({  
    url: '<?php echo base_url().'moneytransfers/resendotp'; ?>',
    method:'post',
    data:{
      mobile: mobile,
      ref: ref
    }
  }).done(function(data) {
   // console.log(data);
    $('#mtval').html(data);       
  });
}

function verifyotp() {      
      var mobile = $('#mobile').val();
      var otp = $('#otp').val();
      var ref = $('#ref').val();
      
      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'moneytransfers/otpverification'; ?>',
        method:'post',
        data:{
          mobile: mobile,
          ref: ref,
          otp: otp
        }
      }).done(function(data) {
       // console.log(data);
        $('#mtval').html(data);       
      });
    }

function addBeni() {   
      var mobile = $('#mobile').val();
      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'moneytransfers/addbeneficiary'; ?>',
        method:'post',  
        data:{
          mobile: mobile
        }      
      }).done(function(data) {
       //console.log(data);
       $('#mtval').html(data); 
       $('.select2').select2();      
      });
    }

function returnBeni() {   
       var mobile = $('#mobile').val();
      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'moneytransfers/viewbeneficiary'; ?>',
        method:'post',
        data:{
          mobile: mobile
        }        
      }).done(function(data) {
       //console.log(data);
       $('#mtval').html(data);   
      });
    }

function saveBeni() {   
      var mobile = $('#mobile').val();
      var account_no = $('#account_no').val();
      var ifsc = $('#ifsc').val();
      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'moneytransfers/savebeneficiary'; ?>',
        method:'post',  
        data:{
          mobile: mobile,
          account_no: account_no,
          ifsc: ifsc
        }      
      }).done(function(data) {
       //console.log(data);
       $('#mtval').html(data); 
       $('.select2').select2();      
      });
    }  

    function removebeni(benecode,mobile) {
      if(confirm("Are You sure, you want to remove this beneficiary...?"))
      {
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
        $.ajax({  
          url: '<?php echo base_url().'moneytransfers/removebeneficiary'; ?>',
          method:'post',  
          data:{
            mobile: mobile,
            benecode: benecode
          }      
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
      }
    }  

    function sendMoney(code,bank){
      var mobile = $('#mobile').val();
      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'moneytransfers/sendMoney'; ?>',
        method:'post',  
        data:{
          code: code,
          bank: bank,
          mobile: mobile
        }      
      }).done(function(data) {
       //console.log(data);
      $('#mtval').html(data); 
      $('.select2').select2(); 
       return false;     
      });
    }

    function makepayment(){

      var mobile = $('#mobile').val();
      var benecode = $('#benecode').val();
      var transtype = $('#transtype').val();
      var amount = $('#amount').val();
      var ubal = $('#ubal').val();
      var id = $('#id').val();
      if(amount =="" || isNaN(amount)){
        alert("Please Enter a Valid Amount...");
      }else{
        if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
        }else{
          if(confirm("Are you sure you want to transfer Rs."+amount)){
          $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
          $.ajax({  
            url: '<?php echo base_url().'moneytransfers/transferMoney'; ?>',
            method:'post',  
            data:{
              mobile: mobile,
              id:id,
              benecode: benecode,
              transtype: transtype,
              amount: amount,
              ubal: ubal
            }      
          }).done(function(data) {
           //console.log(data);
          $('#mtval').html(data); 
          $('.select2').select2(); 
           return false;     
          });
        }else{
          return false;
        }}
      }

    }  
</script>


<?php  }  ?>
<?php if ($this->uri->segment(1)=="reports") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#reportsList').DataTable({
        "ajax": {
            url : "<?php echo site_url("reports/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,
          "order": [[ 4, "desc" ]],
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="admin-menu") {?>
 <script>
            jQuery(document).ready(function () {
                // menu items
                var strjson = '<?php echo setting_all('menu');  ?>';                
                //icon picker options
                var iconPickerOptions = {searchText: 'Buscar...', labelHeader: '{0} de {1} Pags.'};
                //sortable list options
                var sortableListOptions = {
                    placeholderCss: {'background-color': 'cyan'}
                };

                var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions, labelEdit: 'Edit'});
                editor.setForm($('#frmEdit'));
                editor.setUpdateButton($('#btnUpdate'));
                editor.setData(strjson);
                
                $('#btnOut').on('click', function () {
                    var str = editor.getString();
                    $("#out").text(str);
                });

                $("#btnUpdate").click(function(){
                    editor.update();
                });

                $('#btnAdd').click(function(){
                    editor.add();
                });
            });
        </script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="permission") {?>
<script>   
$(document).ready(function() {  
   $('#addmoreRolesShow').hide();
    $('#addmoreRoles').on('click', function(){
       $('#addmoreRolesShow').slideToggle();
    });
  $('#rolesAdd').on('click',function(event){
  var roles = $('#roles').val();
  var url_page = '<?php echo base_url().'users/add_user_type'; ?>';
  event.preventDefault();
    $.ajax({
        type: "POST",
        url: url_page,
        data:{ action: 'ADDACTION',rolesName:roles},
        success: function (data) { 
      if(data=='This User Type('+ roles +') is alredy exist, In this Project Please enter Another name'){$("#showRolesMSG").html(data);}
      else{
        $('#addmoreRolesShow').hide();
        location.reload();
        //window.location.href="<?php //echo base_url().'setting#permissionSetting'; ?>";
        /*setTimeout(function(){ 
          alert('fdfdf');$('#permis').addClass('active');
        },1000);*/
        }
      }
    });
  });

  $('#templates').on('click', function() {
    $('#templates-div').html('');
    $.ajax({  
      url: '<?php echo base_url().'templates'; ?>',
      method:'post',
      data:{
        showTemplate: 'showTemplate'
      }
    }).done(function(data) {
      console.log(data);
      $('#templates-div').html(data);
    });
  });
  // Javascript to enable link to tab
  var url = document.location.toString();
  if (url.match('#')) {
      var tag = url.split('#')[1];
      if(tag == 'templates-div'){
        $('#templates').click();
      }
      $('.nav-tabs a[href="#' + tag + '"]').tab('show');
  } 

  // Change hash for page-reload
  $('.nav-tabs a').on('shown.bs.tab', function (e) {
      window.location.hash = e.target.hash;
  });
})
</script>
<?php  }  ?>


<script type="text/javascript">
  searchmenu();
  function searchmenu(serchval)
  {
    uri_seg='';
   // alert(uri_seg);
      $.ajax({  
        url: '<?php echo base_url().'users/searchmenu'; ?>',
        method:'post',
        data:{
          serchval: serchval,uri_seg:uri_seg
        }
      }).done(function(data) {
        //alert(data);
        $('#mainmenu').html(data);
      });
    
      
  }
</script>

<?php if ($this->uri->segment(1)=="bus") {?>
  <script>

  $(document).ready(function() {
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

  $('#dateselector,#dateselector1').datepicker({
    minDate: today,
    format: "mm/dd/yyyy",
    todayHighlight: true,
    startDate: today,    
    endDate: end,
    autoclose: true  
  }); 
$('#dateselector').datepicker('setDate', today);
});
  
  originList();
  
  function originList(){   
      $.ajax({  
        url: '<?php echo base_url().'bus/getOrigin'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#origin').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  function destinationList(){   
      var origin = $('#origin').val();
      $.ajax({  
        url: '<?php echo base_url().'bus/getDestination'; ?>',
        method:'post',
        data: {
          origin:origin
        }
      }).done(function(data) {
       //console.log(data);
      $('#destination').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

    
  </script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="recharges") {?>
  <script>    
  operatorList();
  
  function operatorList(){   
      $.ajax({  
        url: '<?php echo base_url().'recharges/getOperator'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#operator').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  $(document).ready(function() {
     $('#rechargePrepaid').on('click', function() { 

      var mobile = $('#mobile').val();
      var id = $('#id').val();
      var operator = $('#operator').val();
      var amount = $('#amount').val();
      var ubal = $('#ubal').val();
      if(mobile =="" || mobile.length != 10 || isNaN(mobile)){
        alert("Please Enter a Valid Mobile Number of 10 digits...");
      }else{

      if(operator ==""){
        alert("Please select a operator...");
      }else{

      if(amount =="" || isNaN(amount)){
        alert("Please Enter a Valid Amount...");
      }else{

      if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{

      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'recharges/prepaidrecharge'; ?>',
        method:'post',
        data:{
          mobile: mobile,
          amount: amount,
          id: id,
          operator: operator
        }
      }).done(function(data) {
       console.log(data);
        $('#mtval').html(data);       
      });

      }}}}
    });   
  });
    
</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="postpaid") {?>
  <script>    
  operatorList();
  
  function operatorList(){   
      $.ajax({  
        url: '<?php echo base_url().'postpaid/getOperator'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#operator').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  $(document).ready(function() {
     $('#rechargePostpaid').on('click', function() { 

      var mobile = $('#mobile').val();
      var id = $('#id').val();
      var operator = $('#operator').val();
      var amount = $('#amount').val();
      var ubal = $('#ubal').val();
      if(mobile =="" || mobile.length != 10 || isNaN(mobile)){
        alert("Please Enter a Valid Mobile Number of 10 digits...");
      }else{

      if(operator ==""){
        alert("Please select a operator...");
      }else{

      if(amount =="" || isNaN(amount)){
        alert("Please Enter a Valid Amount...");
      }else{

      if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{

      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'postpaid/postpaidrecharge'; ?>',
        method:'post',
        data:{
          mobile: mobile,
          amount: amount,
          id: id,
          operator: operator
        }
      }).done(function(data) {
       console.log(data);
        $('#mtval').html(data);       
      });

      }}}}
    });   
  });
    
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="dth") {?>
  <script>    
  operatorList();
  
  function operatorList(){   
      $.ajax({  
        url: '<?php echo base_url().'dth/getOperator'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#operator').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  $(document).ready(function() {
     $('#rechargeDth').on('click', function() { 

      var mobile = $('#mobile').val();
      var id = $('#id').val();
      var operator = $('#operator').val();
      var amount = $('#amount').val();
      var ubal = $('#ubal').val();
      if(mobile =="" || isNaN(mobile)){
        alert("Please Enter a Valid Customer Number...");
      }else{

      if(operator ==""){
        alert("Please select a Operator...")
      }else{

      if(amount =="" || isNaN(amount)){
        alert("Please Enter a Valid Amount...");
      }else{

      if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{

      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'dth/dthrecharge'; ?>',
        method:'post',
        data:{
          mobile: mobile,
          amount: amount,
          id: id,
          operator: operator
        }
      }).done(function(data) {
       console.log(data);
        $('#mtval').html(data);       
      });

      }}}}
    });   
  });
    
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="landline") {?>
  <script>    
  operatorList();
  
  function operatorList(){   
      $.ajax({  
        url: '<?php echo base_url().'landline/getOperator'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#operator').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  $(document).ready(function() {
     $('#rechargeLl').on('click', function() { 
     
      var id = $('#id').val();
      var operator = $('#operator').val();
      var std_code = $('#std_code').val();
      var landline_no = $('#landline_no').val();
      var account = $('#account').val();
      var amount = $('#amount').val();
      var ubal = $('#ubal').val();
     if(operator ==""){
        alert("Please select a Operator...")
      }else{
      if(std_code =="" || isNaN(std_code)){
        alert("Please Enter STD Code...")
      }else{
      if(landline_no =="" || isNaN(landline_no)){
        alert("Please Enter Landline Number...")
      }else{
      if(account =="" || isNaN(account)){
        alert("Please Enter Account Number...")
      }else{
      if(amount =="" || isNaN(amount)){
        alert("Please Enter a Valid Amount...");
      }else{
      if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{

      $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');      
      $.ajax({  
        url: '<?php echo base_url().'landline/llrecharge'; ?>',
        method:'post',
        data:{
          id: id,
          operator: operator,
          std_code: std_code,
          landline_no: landline_no,
          account: account,
          amount: amount,
          ubal: ubal
        }
      }).done(function(data) {
       console.log(data);
        $('#mtval').html(data);       
      });

      }}}}}}
    });   
  });
    
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="electricity") {?>
  <script>    
  operatorList();  
  function operatorList(){       
      $.ajax({  
        url: '<?php echo base_url().'electricity/getOperator'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#operator').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }
  function getOperatorCity(){ 
        var operator = $('#operator').val();
        $.ajax({  
          url: '<?php echo base_url().'electricity/getOperatorCity'; ?>',
          method:'post',
          data: {
            operator:operator
          }
        }).done(function(data) {
         //console.log(data);
        $('#citylist').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }

    function getOperatorCityDetails(){ 
        var operator = $('#operator').val();
        var city = $('#city').val();
        $.ajax({  
          url: '<?php echo base_url().'electricity/getOperatorCityDetails'; ?>',
          method:'post',
          data: {
            operator:operator,
            city:city
          }
        }).done(function(data) {
         //console.log(data);
        $('#citylistd').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }
    function checkBill(){ 
        var city = $('#city').val();
        var validator_1 = $('#validator_1').val();
        var validator_2 = $('#validator_2').val();
        var validator_3 = $('#validator_3').val();
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');   
        $.ajax({  
          url: '<?php echo base_url().'electricity/checkBill'; ?>',
          method:'post',
          data: {
            city:city,
            validator_1:validator_1,
            validator_2:validator_2,
            validator_3:validator_3
          }
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }

    function payBill(){ 
        var city = $('#city').val();
        var ubal = $('#ubal').val();
        var id = $('#id').val();
        var validator_1 = $('#validator_1').val();
        var validator_2 = $('#validator_2').val();
        var validator_3 = $('#validator_3').val();
        var amount = $('#amount').val();
        var duedate = $('#duedate').val();
        if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');   
        $.ajax({  
          url: '<?php echo base_url().'electricity/paybill'; ?>',
          method:'post',
          data: {
            id:id,
            city:city,
            validator_1:validator_1,
            validator_2:validator_2,
            validator_3:validator_3,
            amount:amount,
            duedate:duedate
          }
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }}
    
</script>
<?php  }  ?>
<script>

   messageList();  
  function messageList()
  {       
      $.ajax({  
        url: '<?php echo base_url('customer/message'); ?>',
        method:'post',
        data:{ },
        success:function(data){
          all= jQuery.parseJSON(data);
          //console.log(all);
        $('#messagesss').html(all['total']); 
        all['row'].forEach(function(element) {
          $('#loop').append('<li><a href="<?php echo base_url('customer/notification')?>">'+ element['name'] +'</a></li>');
          }); 
        } 
        
      });
  }
</script>
<?php if ($this->uri->segment(1)=="gas") {?>
  <script>    

  function getOperatorCity(){ 
        var operator = $('#operator').val();
        $.ajax({  
          url: '<?php echo base_url().'gas/getOperatorCity'; ?>',
          method:'post',
          data: {
            operator:operator
          }
        }).done(function(data) {
         //console.log(data);
        $('#citylist').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }

    function getOperatorCityDetails(){ 
        var operator = $('#operator').val();
        var city = $('#city').val();
        $.ajax({  
          url: '<?php echo base_url().'gas/getOperatorCityDetails'; ?>',
          method:'post',
          data: {
            operator:operator,
            city:city
          }
        }).done(function(data) {
         //console.log(data);
        $('#citylistd').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }
    function checkBill(){ 
        var city = $('#city').val();
        var validator_1 = $('#validator_1').val();
        var validator_2 = $('#validator_2').val();
        var validator_3 = $('#validator_3').val();
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');   
        $.ajax({  
          url: '<?php echo base_url().'gas/checkBill'; ?>',
          method:'post',
          data: {
            city:city,
            validator_1:validator_1,
            validator_2:validator_2,
            validator_3:validator_3
          }
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }

    function payBill(){ 
        var city = $('#city').val();
        var ubal = $('#ubal').val();
        var id = $('#id').val();
        var validator_1 = $('#validator_1').val();
        var validator_2 = $('#validator_2').val();
        var validator_3 = $('#validator_3').val();
        var amount = $('#amount').val();
        var duedate = $('#duedate').val();
        if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');   
        $.ajax({  
          url: '<?php echo base_url().'gas/paybill'; ?>',
          method:'post',
          data: {
            id:id,
            city:city,
            validator_1:validator_1,
            validator_2:validator_2,
            validator_3:validator_3,
            amount:amount,
            duedate:duedate
          }
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }}
    
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="water") {?>
  <script>    
  operatorList();  
  function operatorList(){       
      $.ajax({  
        url: '<?php echo base_url().'water/getOperator'; ?>',
        method:'post'
      }).done(function(data) {
       //console.log(data);
      $('#operator').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }
  function getOperatorCity(){ 
        var operator = $('#operator').val();
        $.ajax({  
          url: '<?php echo base_url().'water/getOperatorCity'; ?>',
          method:'post',
          data: {
            operator:operator
          }
        }).done(function(data) {
         //console.log(data);
        $('#citylist').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }

    function getOperatorCityDetails(){ 
        var operator = $('#operator').val();
        var city = $('#city').val();
        $.ajax({  
          url: '<?php echo base_url().'water/getOperatorCityDetails'; ?>',
          method:'post',
          data: {
            operator:operator,
            city:city
          }
        }).done(function(data) {
         //console.log(data);
        $('#citylistd').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }
    function checkBill(){ 
        var city = $('#city').val();
        var validator_1 = $('#validator_1').val();
        var validator_2 = $('#validator_2').val();
        var validator_3 = $('#validator_3').val();
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');   
        $.ajax({  
          url: '<?php echo base_url().'water/checkBill'; ?>',
          method:'post',
          data: {
            city:city,
            validator_1:validator_1,
            validator_2:validator_2,
            validator_3:validator_3
          }
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }

    function payBill(){ 
        var city = $('#city').val();
        var ubal = $('#ubal').val();
        var id = $('#id').val();
        var validator_1 = $('#validator_1').val();
        var validator_2 = $('#validator_2').val();
        var validator_3 = $('#validator_3').val();
        var amount = $('#amount').val();
        var duedate = $('#duedate').val();
        if (ubal<parseFloat(amount)){
          alert("Insufficient Balance..!");
      }else{
        $('#senderMobile').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');   
        $.ajax({  
          url: '<?php echo base_url().'water/paybill'; ?>',
          method:'post',
          data: {
            id:id,
            city:city,
            validator_1:validator_1,
            validator_2:validator_2,
            validator_3:validator_3,
            amount:amount,
            duedate:duedate
          }
        }).done(function(data) {
         //console.log(data);
        $('#mtval').html(data); 
        $('.select2').select2(); 
         return false;     
        });
    }}
    
</script>
<?php  }  ?>
<?php if ($this->uri->segment(1)=="white-label-users" && $this->uri->segment(2)=="setup") {?>
  <script>  

    
  function findDomain(){  
      var domainname = $('#domainname').val();
      if(domainname == ''){
        alert('Enter a domain name..!');
      }else {
      var tldList = $('#tldList').val();   
       $('#domainlist').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');    
      $.ajax({  
        url: '<?php echo base_url().'whitelabels/finddomain'; ?>',
        method:'post',
        data:{
          domainname:domainname,
          tldList:tldList
        }
      }).done(function(data) {
     // console.log(data);
      $('#domainlist').html(data); 
      $('.select2').select2(); 
       return false;     
      });
      }
  }
  function addCustomer(){  
      var dom = $('#domain').val();
      var status = $('#status').val();
       $('#domainbox').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');    
      $.ajax({  
        url: '<?php echo base_url().'whitelabels/addCustomer'; ?>',
        method:'post',
        data:{
          dom:dom,
          status:status
        }        
      }).done(function(data) {
     // console.log(data);
      $('#domainbox').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  function validateEmail(){
    var email = $('#username').val();
    $.ajax({  
        url: '<?php echo base_url().'whitelabels/finddomain'; ?>',
        method:'post',
        data:{
          email:email
        }
      }).done(function(data) {
     // console.log(data);
      $('#erss').html(data); 
      $('.select2').select2(); 
       return false;     
      });
  }

  function register(){
    var domainname = $('#web').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var cname = $('#cname').val();
    var mobile = $('#mobile').val(); 
    var usertype = $('#usertype').val(); 
    var aadhar_no = $('#aadhar_no').val(); 
    var address1 = $('#address1').val(); 
    var address2 = $('#address2').val(); 
    var city = $('#city').val(); 
    var state = $('#state').val(); 
    var country = $('#country').val(); 
    var pincode = $('#pincode').val(); 
    var virtual_fund = $('#virtual_fund').val(); 
    var offline_mt = $('#offline_mt').val(); 
    var slab = $('#slab').val(); 
    var parent_id = $('#parent_id').val(); 
    var status = $('#status').val();     
    if(name ==""){
        alert("Please enter your name...")
      }else{
    if(email ==""){
        alert("Please enter your email...")
      }else{
    if(cname ==""){
        alert("Please enter your company name...")
      }else{
    if(mobile ==""){
    alert("Please enter your mobile...")
      }else{
    if(aadhar_no ==""){
    alert("Please enter your Aadhar number...")
      }else{
    if(address1 ==""){
    alert("Please enter your Address1...")
      }else{
    if(address2 ==""){
    alert("Please enter your Address2...")
      }else{
    if(city ==""){
    alert("Please enter your city ...")
      }else{
    if(state ==""){
    alert("Please enter your state ...")
      }else{
    if(country ==""){
    alert("Please enter your country ...")
      }else{
    $.ajax({  
        url: '<?php echo base_url().'whitelabels/rdomain'; ?>',
        method:'post',
        data:{
          domainname:domainname,
          name:name,
          email:email,
          cname:cname,
          mobile:mobile,
          usertype:usertype,
          aadhar_no:aadhar_no,
          address1:address1,
          address2:address2,
          city:city,
          state:state,
          country:country,
          pincode:pincode,
          virtual_fund:virtual_fund,
          offline_mt:offline_mt,
          parent_id:parent_id,
          slab:slab,
          status:status
        }
      }).done(function(data) {
     // console.log(data);
      $('#domainbox').html(data); 
      $('.select2').select2(); 
       return false;     
      });
    }}}}}}}}}}
    }

function enterDomain(){      
   
       $('#domainbox').html('<img  class="img-responsive" src="<?php echo site_url("assets/images/").setting_all('preloader'); ?>">');    
      $.ajax({  
        url: '<?php echo base_url().'whitelabels/enterdomain'; ?>',
        method:'post'
      }).done(function(data) {
     // console.log(data);
      $('#domainbox').html(data); 
      $('.select2').select2(); 
      return false;     
      });

}

</script>
<?php  }  ?>

<?php if ($this->uri->segment(1)=="paymentgateway") { ?>
<script>
  $( document ).ready(function() {
    paymentgateway();
});
  
  function paymentgateway(){ 
        
       $('#paymentgateway').DataTable({
        "ajax": {
            url : "<?php echo site_url("paymentgateway/get_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
    }

    function viewpaymentgateway(id)
    {
        $.ajax({  
          url: "<?php echo site_url("paymentgateway/viewpaymentgateway") ?>",
          method:'post',
          data:{
            id:id
          }
        }).done(function(data) {
          //alert(data); 
         return false;     
        });
    }
    
</script>
<?php }?>

<?php if ($this->uri->segment(1)=="fund-request") { ?>
<script>
  $(document).ready(function () {
   $('#datepicker').datetimepicker({
        useCurrent: true,
        minDate:new Date(),
        viewMode: 'days',
        format: 'DD/MM/YYYY'
     });
 });  
 showBank();
 function showBank()
    {   
        var id = $('#id').val();
        $.ajax({  
          url: "<?php echo site_url("fundrequests/showbank") ?>",
          method:'post',
          data:{
            id:id
          }
        }).done(function(data) {        
          $('#bank').html(data); 
          $('.select2').select2(); 
          return false;     
        });
    }  
 bankslist();
 function bankslist()
    {   
        var id = $('#id').val();
        $.ajax({  
          url: "<?php echo site_url("fundrequests/bankList") ?>",
          method:'post',
          data:{
            id:id
          }
        }).done(function(data) {        
          $('#bankslist').html(data); 
          return false;     
        });
    }  
</script>
<?php }?>


<?php if ($this->uri->segment(1)=="themeCategory") {?>
<script type="text/javascript">
$(document).ready(function() {
    
    $('#themeCategory').DataTable({
        "ajax": {
            url : "<?php echo site_url("themecategory/get_cat_tables") ?>",
            type : 'GET'
        },
        dom: 'lfBrtip',
          buttons: [
              'copy', 'excel', 'pdf', 'print'
          ],
          "processing": true,          
          "sPaginationType": "full_numbers",
          "language": {
            "search": "_INPUT_", 
            "searchPlaceholder": "Search",
            "paginate": {
                "next": '<i class="fa fa-angle-right"></i>',
                "previous": '<i class="fa fa-angle-left"></i>',
                "first": '<i class="fa fa-angle-double-left"></i>',
                "last": '<i class="fa fa-angle-double-right"></i>'
            }
          }, 
          "iDisplayLength": 10,
          "aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"All"]]
    });
});
</script>
<?php  }  ?>
