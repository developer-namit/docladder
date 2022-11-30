<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Docladder- Homepage</title>

   <!-- Favicon -->
    <link href="<?php echo base_url();?>/public/assets/images/new-favicon.png" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/bootstrap/bootstrap.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/select2/select2.css" />
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/datetimepicker/datetimepicker.min.css" />
    
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/responsive.css" />
    
<!--=================================
Header -->
<style>
    .header .add-listing .login a i {
    color: #111111;
    font-size: 12px;
    margin-left: 3px;
    margin-top: 5px;
}
</style>
<header class="header header-transparent">
  <nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
    <div class="container-fluid">
      <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
          <span></span>
          <span></span>
          <span></span>
      </button>
      <button id="nav-icon-login" type="button" class="navbar-toggler2" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-new">
          <i class="fas fa-user"></i>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('Home');?>">
        <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/Docladder-final-logo.png" alt="logo">
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown active">
            <a class="nav-link" href="<?php echo base_url('Home');?>" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">Home</a>
          </li>
          <!--<li class="nav-item">-->
            <!--<a class="nav-link" href="<?php echo base_url('about');?>"  aria-haspopup="true" aria-expanded="false">About Us</a>-->
          <!--</li>-->
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false" >Equipments<i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="<?php echo base_url('Equipment/Buy');?>">Buy</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('Equipment/Sell');?>">Sell</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle aria-haspopup="true" aria-expanded="false">Infrastructure<i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo base_url('Infrastructure/Buy');?>">Buy</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('Infrastructure/Sell');?>">Sell</a></li>
            </ul>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="<?php echo base_url('contact');?>"  aria-haspopup="true" aria-expanded="false">Contact Us</a>-->
          <!--</li>-->
            <?php if (session()->get('isLoggedIn')== true && session()->get('status')==1) {?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('SearchRecruiter');?>"  aria-haspopup="true" aria-expanded="false">Search Recruiter</a>
          </li>
          <?php }?>
          
        </ul>
      </div>
      <?php if (session()->get('isLoggedIn')== true && session()->get('status')==1) {?>
      <div class="navbar-collapse-new collapse">
       <ul class="nav navbar-nav">
       <div class="add-listing">
        <div class="login d-inline-block">
            <li class="nav-item dropdown ">
            <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false" >Job Seeker<i class="fas fa-chevron-down fa-xs"></i><span>|</span></a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="<?php echo base_url('JobProfile');?>">Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('SearchRecruiter');?>">Dashboard</a></li>
            </ul>
            
          </li>
        </div>
        <div class="login d-inline-block me-3">
        <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;"><?php echo session()->get('firstname');?></span></a>
        </div>
        <a class="btn btn-outline btn-md logout-btn" href="<?php echo base_url('logout');?>"><i class="fas fa-power-off"></i>Logout</a>
            </div>
      </ul>
     </div>
         <?php }else if (session()->get('isLoggedIn')== true  && session()->get('status')==0) {?>
        
      <div class="navbar-collapse-new collapse">
       <ul class="nav navbar-nav">
       <div class="add-listing">
        <div class="login d-inline-block">
            <li class="nav-item dropdown ">
            <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false" >Recruiter<i class="fas fa-chevron-down fa-xs"></i><span>|</span></a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="<?php echo base_url('profile');?>">Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('RecruiterDashboard');?>">Dashboard</a></li>
            </ul>
            
          </li>
        </div>
        <div class="login d-inline-block me-3">
        <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;"><?php echo session()->get('firstname');?></span></a>
        </div>
        <a class="btn btn-outline btn-md logout-btn" href="<?php echo base_url('logout');?>"><i class="fas fa-power-off"></i>Logout</a>
            </div>
      </ul>
     </div>
              
       <?php }else if(session()->get('isLoggedIn')== true  && session()->get('role')=='other'){?> 
    <div class="navbar-collapse-new collapse">
       
        <div class="add-listing">
            <div class="login d-inline-block">
              <div class="login d-inline-block me-3">
                <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;">
                    <?php echo session()->get('firstname');?></span></a>
              </div>
             <a class="btn btn-outline btn-md logout-btn" href="<?php echo base_url('logout');?>"><i class="fas fa-power-off"></i>Logout</a>
            </div>
        </div>
    </div>

    <?php }else{?>
      
    <div class="navbar-collapse-new collapse">
      <div class="add-listing">
        <div class="login d-inline-block">
            <!--<a href="login.html" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Job Seeker<span>|</span></a>-->
            <a href="<?php echo base_url('Jobseeker');?>"><span class="type">Job Seeker</span><span>|</span></a>
        </div>
        <div class="login d-inline-block me-4 me-lg-3">
            <!--<a href="login.html" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Recruiter</a>-->
            <a href="<?php echo base_url('Recruiter');?>"><span class="type">Recruiter Zone</span></a>
        </div>
        <a class="btn btn-outline btn-md post-job-btn" href="<?php echo base_url('Recruiter');?>">Post a job</a>
      </div>
      <?php }?>
      
      </div>

    </div>
  </nav>
</header>