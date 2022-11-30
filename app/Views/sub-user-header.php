<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Docladder- Homepage</title>

    <!-- Favicon -->
    <link href="<?php echo base_url();?>/public/assets/images/favicon.png" rel="shortcut icon" />

 <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/bootstrap/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/select2/select2.css" />
    
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
      <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/magnific-popup/magnific-popup.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>/public/assets/css/responsive.css" />

  <style>
        /* .homepage-slider{
            display: none;
        } */
        @media (max-width: 991px) {
            #nav-icon4 {
                margin-top: 30px;
            }
        }
        ol.num-ol {
            list-style: none;
            counter-reset: item;
            padding-left: 0;
        }
        .num-ol li {
            counter-increment: item;
            margin-bottom: 5px;
        }
        .num-ol li:before {
            margin-right: 10px;
            content: counter(item);
            background: #9c7100;
            border-radius: 50%;
            color: #fff;
            width: 1.4em;
            text-align: center;
            display: inline-block;
        }
    </style>
</head>
<body

<!--=================================
Header -->
    <header class="header header-transparent" id="recruiter-header">
	<nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
        <div class="container-fluid">
            <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
				<span></span>
				<span></span>
				<span></span>
			</button>
            <a class="navbar-brand" href="">
                <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/Docladder-final-logo.png" alt="logo">
            </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                        </li>
                         
                          <?php if(!empty($users['service_resume']==1) && !empty($users['service_whatsapp']==1)) {?>
                           <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Postings <i class="fas fa-chevron-down fa-xs"></i>
                            </a>
                           
                            <ul class="dropdown-menu">
                              <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Create Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                                  <ul class="dropdown-menu left-side">
                                    <li><a class="dropdown-item" href="<?php echo base_url('jobposting');?>">Job Posting</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Equipment');?>">Equipment Posting</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Space');?>">Space Posting</a></li>
                                  </ul>
                              </li>
                              <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Manage Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                                  <ul class="dropdown-menu left-side">
                                    <li><a class="dropdown-item" href="<?php echo base_url('managejob');?>">Manage Jobs</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('managequipment');?>">Manage Equipment</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Managespace');?>">Manage Space</a></li>
                                  </ul>
                              </li>
                                
                            </ul>
                          </li>
                          
                          <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search<i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="<?php echo base_url('Search/Simple');?>">Simple Search</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('Search/Advance');?>">Advance Search</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('Search/Save');?>">Saved Search</a></li>
                            </ul>
                          </li>
                          <?php }else if($users['service_resume']==1 && $users['service_whatsapp']==0){ ?>
                          
                           <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Search<i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="<?php echo base_url('Search/Simple');?>">Simple Search</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('Search/Advance');?>">Advance Search</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('Search/Save');?>">Saved Search</a></li>
                            </ul>
                          </li>
                           <?php }else if($users['service_resume']==0 && $users['service_whatsapp']==1){ ?>
                           
                              <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Postings <i class="fas fa-chevron-down fa-xs"></i>
                            </a>
                           
                            <ul class="dropdown-menu">
                              <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Create Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                                  <ul class="dropdown-menu left-side">
                                    <li><a class="dropdown-item" href="<?php echo base_url('jobposting');?>">Job Posting</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Equipment');?>">Equipment Posting</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Space');?>">Space Posting</a></li>
                                  </ul>
                              </li>
                              <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Manage Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                                  <ul class="dropdown-menu left-side">
                                    <li><a class="dropdown-item" href="<?php echo base_url('managejob');?>">Manage Jobs</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('managequipment');?>">Manage Equipment</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url('Managespace');?>">Manage Space</a></li>
                                  </ul>
                              </li>
                                
                            </ul>
                          </li>
                           
                           
                          <?php }?>
                          
                    </ul>
                </div>
                
                
                
                
                <div class="add-listing">
                    <div class="login d-inline-block me-3">
                        <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;"><?php echo session()->get('firstname');?></span></a>
                    </div>
                    <a class="btn btn-outline btn-md logout-btn" href="<?php echo base_url('logout');?>"><i class="fas fa-power-off"></i>Logout</a>
                </div>
            </div>
        </nav>
    </header>
<!--=================================
Header -->
<section class="inner-banner" style="background-image: url(<?php echo base_url();?>/public/assets/images/bg-slider/inner-banner.png);" id="homepage-banner">