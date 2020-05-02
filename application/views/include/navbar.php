  <header class="main-header">
	<!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="<?php echo config_item('images'); ?>logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="<?php echo config_item('images'); ?>logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo-->
      <span class="logo-lg text-white">
		  <h2> E-Nota</h2>
	  </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
	  	
      <!-- Sidebar toggle button-->
		  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		  </a>
		    <span class="font-size-20 text-white">
         
        </span>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  
		  
		  <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo config_item('images'); ?>user5-128x128.jpg" class="user-image rounded-circle b-2" alt="User Image">
				<span class="font-size-14"><?php echo $this->session->userdata('ap_level_caption'); ?><i class="mdi mdi-chevron-down fa fa-user"></i></span>
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- Menu Body -->
              <li class="user-body bt-0">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="<?php echo site_url('toko/index'); ?>"><i class="ion ion-person"></i> Profile Toko</a>
                  </div>
            
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="<?php echo site_url('secure/logout'); ?>"><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                  </div>				
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>
    <?php $this->load->view('include/sidebar.php'); ?>





