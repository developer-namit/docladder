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
<body>
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
            <a class="navbar-brand" href="<?php echo base_url();?>/public/assets/index.html">
                <img class="img-fluid" src="<?php echo base_url();?>/public/assets/images/main-logo.png" alt="logo">
            </a>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Home');?>" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('RecruiterHomepage');?>"  aria-haspopup="true" aria-expanded="false">Recruiter Homepage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('RecruiterDashboard');?>" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('packages');?>"  aria-haspopup="true" aria-expanded="false">Packages</a>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Profile<i class="fas fa-chevron-down fa-xs"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="<?php echo base_url('profile');?>">Profile</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('profile');?>">Manage Sub User</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('profile');?>">Change Password</a></li>
                            </ul>
                          </li>

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
                              <li><a class="dropdown-item" href="<?php echo base_url('simplesearch');?>">Simple Search</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('AdvanceSearch');?>">Advance Search</a></li>
                              <li><a class="dropdown-item" href="<?php echo base_url('SaveSearch');?>">Saved Search</a></li>
                            </ul>
                          </li>
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

<!--=================================
Register -->
<section class="space-ptb-outer bg-light service-information">
    <div class="container">
        <div class="row mb-4">
          <h2 class="main-site-title sub-title-bg mb-3 text-center"><span>Dashboard</span></h2>
            <div class="col-lg-10">
                <div class="service-info">
                  <h3 class="main-sub-title mb-3 text-left"><span>Service Information</span></h3>
                    <div class="user-dashboard-table table-responsive border-table">
                        <table class="table table-lg table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>Receipt ID </td>
                                    <td>-</td>
                                    <td><?php if(!empty($transaction['id'])){ echo $transaction['id'];}?></td>
                                </tr>
                                <tr>
                                    <td>Client Name</td>
                                    <td>-</td>
                                    <td><?php if(!empty($transaction['username'])){ echo $transaction['username'];}?></td>
                                </tr>
                                <tr>
                                    <td>Concerned Person Name</td>
                                    <td>-</td>
                                    <td><?php echo session()->get('contactpersonname');?></td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td>-</td>
                                    <td><?php echo session()->get('contactno');?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <div class="service-info-bg">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="job-posting-info pt-lg-2 pb-lg-3">
                              <h3 class="main-sub-title mb-3 text-left"><span>Job Posting</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Recent Job</td>
                                                <td>-</td>
                                                <td>0/0</td>
                                            </tr>
                                            <tr>
                                                <td>Featured Jobs</td>
                                                <td>-</td>
                                                <td>0/0</td>
                                            </tr>
                                            <tr>
                                                <td>Register Date </td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['start_date'])){ echo $transaction['start_date'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>Expired on</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['expired_date'])){ echo $transaction['expired_date'];}?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="resume-services-info">
                                <div class="job-posting-info pt-lg-2 pt-4 pb-lg-3">
                                <h3 class="main-sub-title mb-3 text-left"><span>Resume Services</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Number of Resumes</td>
                                                <td>-</td>
                                                <td>0/<?php if(!empty($transaction['service_resumes'])){ echo $transaction['service_resumes'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>Upgraded Resumes</td>
                                                <td>-</td>
                                                <td>0/0</td>
                                            </tr>
                                            <tr>
                                                <td>Register Date </td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['start_date'])){ echo $transaction['start_date'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>Expired on</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['expired_date'])){ echo $transaction['expired_date'];}?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row pt-lg-3 pb-lg-2">
                        <div class="col-lg-12">
                            <div class="job-posting-info pt-lg-0 pt-4">
                              <h3 class="main-sub-title mb-3 text-left"><span>Other Services</span></h3>
                                <div class="user-dashboard-table table-responsive border-table">
                                    <table class="table table-lg table-hover mb-0">
                                        <thead>
                                            <tr>
                                              <th colspan="3">Total number of</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Emails (Used Services/ Remaining services )</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['service_emails'])){ echo $transaction['service_emails'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>sms (Used Services/ Remaining services )</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['service_smss'])){ echo $transaction['service_smss'];}?></td>
                                            </tr>
                                            <tr>
                                                <td>WhatsApp Messages (Used Services/ Remaining services )</td>
                                                <td>-</td>
                                                <td><?php if(!empty($transaction['service_whatsapps'])){ echo $transaction['service_whatsapps'];}?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Register -->


<!--=================================
Footer-->
<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer-->
