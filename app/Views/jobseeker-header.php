<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Docladder- Job Seeker Profile</title>

    <!-- Favicon -->
    <link href="<?= base_url('/public/assets')?>/images/new-favicon.png" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/bootstrap/bootstrap.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/select2/select2.css" />
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/datetimepicker/datetimepicker.min.css" />
    
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/style.css" />
<link rel="stylesheet" href="<?= base_url('/public/assets')?>/css/responsive.css" />

  </head>
  <body>

<!--=================================
Header -->
<header class="header header-transparent" id="job-seeker">
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
      <a class="navbar-brand" href="<?= base_url('Home')?>">
        <img class="img-fluid" src="<?= base_url('/public/assets')?>/images/Docladder-final-logo.png" alt="logo">
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home')?>" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">Home</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link" href="<?= base_url('/public/assets')?>/#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Profile<i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= base_url('JobProfile')?>">Profile</a></li>
              <li><a class="dropdown-item" href="<?= base_url('Changepassword')?>">Change Password</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <!--<a class="nav-link" href="<?= base_url('community')?>"  aria-haspopup="true" aria-expanded="false">Community</a>-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="<?= base_url('/public/assets')?>/javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Postings <i class="fas fa-chevron-down fa-xs"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#">Create Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                    <ul class="dropdown-menu left-side">
                      <li><a class="dropdown-item" href="<?= base_url('JobSeekerEquipment')?>">Equipment Posting</a></li>
                      <li><a class="dropdown-item" href="<?= base_url('JobseekerSpace')?>">Space Posting</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#">Manage Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                    <ul class="dropdown-menu left-side">
                      <li><a class="dropdown-item" href="<?= base_url('ManageEquipment')?>">Manage Equipment</a></li>
                      <li><a class="dropdown-item" href="<?= base_url('ManageSpace')?>">Manage Space</a></li>
                    </ul>
                </li>
                
                  
              </ul>
            </li>
          <li class="nav-item">
               <a class="nav-link" href="<?= base_url('JobseekerPayment')?>"  aria-haspopup="true" aria-expanded="false">Premium Job Seeker</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?= base_url('SearchRecruiter')?>"  aria-haspopup="true" aria-expanded="false">Search Recruiter</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?= base_url('JobSearching')?>"  aria-haspopup="true" aria-expanded="false">Find Jobs</a>
          </li>
          
        </ul>
      </div>
      <div class="navbar-collapse-new collapse">
      <div class="add-listing">
        <div class="login d-inline-block me-3">
            <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;"><?= session()->get('firstname');?></span></a>
        </div>
        <a class="btn btn-outline btn-md logout-btn" href="<?= base_url('logout')?>"><i class="fas fa-power-off"></i><span>Logout</span></a>
      </div>
      </div>
    </div>
  </nav>
</header>

