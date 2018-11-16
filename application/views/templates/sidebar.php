  <?php
   if ($user['profile_pic'] != "") {
     $images = site_url('assets/uploads/').$user['profile_pic'];   
   }else{
     $images = site_url('assets/img/')."avatar5.png";      
   }
   ?> 
  <aside class="main-sidebar">
     <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $images; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['name']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" autocomplete="off" class="form-control" placeholder="Search..." onkeyup="searchmenu(this.value);">
        <span class="input-group-btn">
               <button class="btn btn-flat"><i class="fa fa-search"></i>
               </button>
             </span> 
        </div>
      </form>
    <section class="sidebar"> 
    <ul class="sidebar-menu" data-widget="tree" id="mainmenu1">
      
    <?php
       $menudata = json_decode(setting_all('menu'), true);         
       
     // print_r($menudata);
      foreach ($menudata as $value) {

      if(CheckPermission($value['permission_type'], "own_read")  || $value['permission_type'] == "" ){


      $uri_seg = $this->uri->segment($value['segmentNo']);
      //  print_r($value);
        $lim= '<li class="';
        $lim.= ($uri_seg==$value["href"])?'active':'';
      //  $lim.= (isset($value["href"]))?' treeview':'';
       
 
       
        $lim.= '">';
        $lim.= '<a href="'.base_url($value['href']).'"><i class="'.$value['icon'].'"></i> <span>'.$value['text'].'</span>';
        echo $lim;
        echo (isset($value['children']))?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'';
        echo '</a>';    
        if(isset($value['children'])){
          echo '<ul class="treeview-menu">';
          foreach ($value['children'] as $val) {
                  if(CheckPermission($val['permission_type'], "own_read") || $val['permission_type'] == "" ){
                  $uri_seg1 = $this->uri->segment($val['segmentNo']);
                  $lim= '<li class="active ';
                  $lim.= ($uri_seg1==$val["href"])?'active':'';              
                  $lim.= '">';
                  $lim.= '<a href="'.base_url($val['href']).'"><i class="'.$val['icon'].'"></i> <span>'.$val['text'].'</span>';
                  echo $lim;
                  echo (isset($val['children']))?'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>':'';
                  echo '</a></li>';
              } 
              //echo  "test^".  $uri_seg."^". $val["href"]."^test";
          }
          echo '</ul>';

        }      
       echo '</li>';
      }}
      
  
    
    ?>


    </ul>
    </section>
  </aside>