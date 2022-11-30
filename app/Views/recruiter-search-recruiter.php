<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Docladder- Search Recruiter</title>

    <!-- Favicon -->
    <link href="images/favicon.png" rel="shortcut icon" />

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="css/select2/select2.css" />
    
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/responsive.css" />
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
          
      <button id="nav-icon-login" type="button" class="navbar-toggler2" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-new">
          <i class="fas fa-user"></i>
      </button>
          <a class="navbar-brand" href="index.html">
              <img class="img-fluid" src="images/main-logo.png" alt="logo">
          </a>
          
          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="index.html" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="recruiter-homepage.html"  aria-haspopup="true" aria-expanded="false">Recruiter Homepage</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="recruiter-dashboard.html" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                  </li>
                  <li class="nav-item dropdown ">
                      <a class="nav-link" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false">My Profile<i class="fas fa-chevron-down fa-xs"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="edit-profile.html">Profile</a></li>
                          <li><a class="dropdown-item" href="manage-user.html">Manage Sub User</a></li>
                          <li><a class="dropdown-item" href="recruiter-change-password.html">Change Password</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown ">
                      <a class="nav-link" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false">Posting<i class="fas fa-chevron-down fa-xs"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item dropdown-toggle">Create Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                              <ul class="dropdown-menu left-side">
                                  <li><a class="dropdown-item" href="recruiter-job-posting.html">Job Posting</a></li>
                                  <li><a class="dropdown-item" href="equipment-form.html">Equipment Posting</a></li>
                                  <li><a class="dropdown-item" href="space-form.html">Space Posting</a></li>
                              </ul>
                          </li>
                          <li><a class="dropdown-item dropdown-toggle" href="#">Manage Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                              <ul class="dropdown-menu left-side">
                                  <li><a class="dropdown-item" href="manage-jobs.html">Manage Jobs</a></li>
                                  <li><a class="dropdown-item" href="manage-equipments.html">Manage Equipment</a></li>
                                  <li><a class="dropdown-item" href="manage-space.html">Manage Space</a></li>
                              </ul>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false">Search<i class="fas fa-chevron-down fa-xs"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="simple-search.html">Simple Search</a></li>
                          <li><a class="dropdown-item" href="advance-search.html">Advance Search</a></li>
                          <li><a class="dropdown-item" href="saved-search.html">Saved Search</a></li>
                      </ul>
                  </li>

              </ul>
          </div>
          <div class="navbar-collapse-new collapse">
          <div class="add-listing">
              <div class="login d-inline-block me-3">
                  <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;">Username</span></a>
              </div>
              <a class="btn btn-outline btn-md logout-btn" href="recruiter-signup.html"><i class="fas fa-power-off"></i>Logout</a>
          </div>
          </div>
      </div>
  </nav>
</header>
<!--=================================
Header -->

<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(images/bg-slider/contact-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Search Recruiter</h1>
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<!--=================================
search below -->
<section class="space-ptb bg-light">
  <div class="container">
    <div class="row">
       <!-- <div class="col-lg-12 text-center mb-3"><h1 class="main-site-title sub-title-bg"><span>Search Recruiter</span></h1></div> -->
      <div class="col-12">
        <div class="job-search-field job-search-field-02">
          <div class="job-search-item">
            <form class="row basic-select-wrapper justify-content-center">
                      <div class="col-lg-12">
                        <div class="box-shadow search-wrapper-bg">
                           <div class="row">
                             <div class="col-lg-10">
                               <div class="row">
                                 <div class="col-lg-3">
                                 <div class="form-group mt-0">
                                       <div class="form-group-search">
                                           <div class="form-group main-form-input" >
                                                 <div class="position-relative left-icon ps-3" >
                                                     <input type="text" class="form-control" name="job_title" placeholder="Hospital" autocomplete="off" >
                                                     <i class="fas fa-hospital-alt" ></i>
                                                 </div>
                                             </div>
                                       </div>
                                 </div>
                                 </div>
                                 <div class="col-lg-3">
                                 <div class="form-group mt-0">
                                       <div class="form-group-search">
                                           <!-- <label class="form-label">Location</label> -->
                                           <div class="form-group main-form-input" >
                                                 <div class="position-relative left-icon" >
                                                     <input type="text" class="form-control" name="job_title" placeholder="Location" autocomplete="off" >
                                                     <i class="fas fa-map-marker-alt" style="user-select: auto;"></i>
                                                 </div>
                                             </div>
                                       </div>
                                 </div>
                                 </div>
                                 <div class="col-lg-3">
                                   <div class="form-group mt-0">
                                       <!-- <label class="form-label">Job Function</label> -->
                                       <div class="form-group main-form-input" >
                                             <div class="position-relative left-icon" >
                                                 <input type="text" class="form-control" name="job_title" placeholder="Job Function" autocomplete="off" >
                                                 <i class="fas fa-search"></i>
                                             </div>
                                         </div>
                                   </div>
                                   </div>
                                   <div class="col-lg-3">
                                     <div class="form-group mt-0">
                                         <!-- <label class="form-label">Specialization</label> -->
                                         <div class="form-group main-form-input" >
                                               <div class="position-relative left-icon" >
                                                   <input type="text" class="form-control" name="job_title" placeholder="Specialization" autocomplete="off" >
                                                   <i class="fas fa-plus-circle" ></i></i>
                                               </div>
                                           </div>
                                     </div>
                                   </div>
                                 </div>
                             </div>
                             <div class="col-lg-2">
                               <div class="form-group">
                                 <div class="mt-2 mt-lg-0 text-center">
                                      <a href="searched-jobs.html" class="searched-btn"><input class="btn btn-secondary main-btn" type="button" value="Search"></a>
                                 </div>
                            </div>
                             </div>
                           </div>
                           <!-- <div class="row justify-content-center">
                                <div class="col-lg-6">
                                     <div class="form-group">
                                          <div class="mt-0 text-center">
                                               <a href="searched-jobs.html" class="searched-btn"><input class="btn btn-secondary main-btn" type="button" value="Search"></a>
                                          </div>
                                     </div>
                                </div>
                           </div> -->
                         </div>
                      </div>
                
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
search below -->


<!--=================================
Footer-->
<footer class="footer mt-0">
  <div class="container">
    <div class="row">
        <div class="col-lg-8">
          <div class="footer-logo"><a class="navbar-brand" href="index.html">
              <img class="img-fluid" src="images/footer-logo.png" alt="logo"></a></div>
          <div class="row">
            <div class="col-lg-4 col-md-12">
              <div class="footer-link">
                <h5>QUICK LINKS</h5>
                <ul class="bullets">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About US</a></li>
                  <li><a href="#">Career</a></li>
                  <li><a href="#">Feedback</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Private Policies</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="footer-link">
                <h5>JOB SEEKER</h5>
                <ul class="bullets">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About US</a></li>
                  <li><a href="#">Career</a></li>
                  <li><a href="#">Feedback</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Private Policies</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="footer-link">
                <h5>RECRUITERS</h5>
                <ul class="bullets">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About US</a></li>
                  <li><a href="#">Career</a></li>
                  <li><a href="#">Feedback</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Private Policies</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 pt-3">
            <div class="footer-contact-info bg-holder">
              <ul class="list-unstyled mb-0">
                <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor cumsan lacus vel facilisis. </p></li>
                <li><h4>DOWNLOAD APP</h4></li>
                <li>
                  <div class="d-block d-sm-flex mb-0 mb-lg-2 download-btns">
                    <a class="btn btn-white btn-outline-dark btn-app mb-2 mb-sm-0 py-2 me-2" href="#">
                      <i class="fab fa-google-play"></i>
                      <div class="btn-text text-start">
                        <small class="fw-normal">Get it on  </small>
                        <span class="mb-0 d-block">Google Play</span>
                      </div>
                    </a>
                    <a class="btn btn-white btn-outline-dark btn-app" href="#">
                      <i class="fab fa-apple"></i>
                      <div class="btn-text text-start">
                        <small class="fw-normal">Download on the </small>
                        <span class="mb-0 d-block">App Store</span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="pb-1"><h4>STAY CONNECTED</h4></li>
                <li class="social">
                  <ul class="list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul>
                </li>
              </ul>
              
            </div>
          
        </div>
    </div>
  </div>
 
  <div class="footer-bottom border-dark-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0"> © 2022 Docladder. ALL RIGHTS RESERVED </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--=================================
Footer-->

<!--=================================
Back To Top-->
   <div id="back-to-top" class="back-to-top">
     <i class="fas fa-angle-up"></i>
   </div>
<!--=================================
Back To Top-->

<!--=================================
Javascript -->
    <!-- JS Global Compulsory (Do not remove)-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    
    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="js/owl-carousel/owl-carousel.min.js"></script>

    <!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
    <script src="js/select2/select2.full.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>
</body>
</html>