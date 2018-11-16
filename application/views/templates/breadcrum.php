 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo strtoupper($this->uri->segment(1));  ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active"><?php echo strtoupper($this->uri->segment(1));  ?></li>
      </ol>
    </section>
