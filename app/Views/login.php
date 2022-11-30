<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Docladder- Login</title>

    <!-- Favicon -->
    <link href="images/favicon.png" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Template Style -->
    <link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/responsive.css" />
    
    
    
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />
    
    <!-- Additional CSS Style -->
    <style>
        .owl-prev {
            position: absolute;
            left: -30px;
            top: 60px;
        }
        .owl-next {
            position: absolute;
            right: -30px;
            top: 60px;
        }
        .social-login ul {
            -ms-flex-wrap: wrap;
            flex-wrap: nowrap;
        }
        .login-register fieldset{
            background: #fff;
        }
        .social-login ul li:last-child {
            margin-right: 0;
        }
        
    </style>
    
    
  </head>
<body>

<!--=================================
Header -->
<header class="header header-transparent">
  <nav class="navbar navbar-static-top navbar-expand-lg navbar-light header-sticky">
    <div class="container-fluid">
      <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
          <span></span>
          <span></span>
          <span></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img class="img-fluid" src="images/main-logo.png" alt="logo">
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown active">
            <a class="nav-link" href="index.html" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html"  aria-haspopup="true" aria-expanded="false">About Us</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="equipments.html" id="navbarDropdown" role="button" data-toggle aria-haspopup="true" aria-expanded="false" >Equipments<i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="equipments-product.html">Buy</a></li>
              <li><a class="dropdown-item" href="equipment-register.html">Sell</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link" href="infrastructure.html" id="navbarDropdown" role="button" data-bs-toggle aria-haspopup="true" aria-expanded="false">Infrastructure<i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="infrastructure-products.html">Buy</a></li>
              <li><a class="dropdown-item" href="infrastructure-register.html">Sell</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.html"  aria-haspopup="true" aria-expanded="false">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="search-recruiter.html"  aria-haspopup="true" aria-expanded="false">Search Recruiter</a>
          </li>
          
        </ul>
      </div>
      <div class="add-listing">
        <div class="login d-inline-block">
            <!--<a href="login.html" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Job Seeker<span>|</span></a>-->
            <a href="job-seeker.html">Job Seeker<span>|</span></a>
        </div>
        <div class="login d-inline-block me-4 me-lg-3">
            <!--<a href="login.html" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Recruiter</a>-->
            <a href="recruiter-signup.html">Recruiter Zone</a>
        </div>
        <a class="btn btn-outline btn-md post-job-btn" href="recruiter-signup.html">Post a job</a>
      </div>
    </div>
  </nav>
</header>
<!--=================================
Header -->


<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Login</h1>
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<!--=================================
Signin -->
<section class="space-ptb bg-light-white" id="login-form">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="login-register">
          <div class="mt-4 mb-4">
            <fieldset>
              <legend class="px-2">Login or Sign up with</legend>
              <div class="social-login p-3">
                <ul class="list-unstyled d-flex mb-0">
                  <li class="google text-center mb-0">
                    <a href="#"> <img src="images/social-icons/google.png" alt="GOOGLE"> Login with Google</a>
                  </li>
                  <li class="google text-center mb-0">
                    <a href="#"> <img src="images/social-icons/facebook.png" alt="FACEBOOK"> Login with Facebook</a>
                  </li>
                  <li class="google text-center mb-0">
                    <a href="#"> <img src="images/social-icons/instagram.png" alt="INSTAGRAM"> Login with Instagram</a>
                  </li>
                </ul>
              </div>
            </fieldset>
          </div>
          <fieldset>
            <legend class="px-2">or fill out with</legend>
                <div class="tab-content p-4">
                      <form class="mt-2">
                        <div class="row">
                          <div class="mb-3 col-12">
                            <label class="form-label" for="Email2">Username / Email Address</label>
                            <input type="text" class="form-control" id="Email22">
                          </div>
                          <div class="mb-3 col-12">
                            <label class="form-label" for="password2">Password*</label>
                            <input type="password" class="form-control" id="password32">
                          </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="mt-3 mb-3 col-8 text-center">
                              <input class="btn btn-primary main-btn" type="button" value="Sign In">
                          </div>
                          <div class="mb-3 col-12">
                            <div class="mt-3 mt-md-0 forgot-pass text-center">
                              <a href="#">Forgot Password?</a>
                              <p class="mt-1">Don't have account? <a href="register.html">Sign Up here</a></p>
                            </div>
                          </div>
                        </div>
                      </form>
                </div>
          </fieldset>
          

        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Signin -->

<!--=================================
Footer-->
<footer class="footer mt-0">
  <div class="container">

    <div class="row">
        <div class="col-lg-8">
          <div class="footer-logo"><a class="navbar-brand" href="index.html">
              <img class="img-fluid" src="images/footer-logo.png" alt="logo"></a></div>
          <div class="row">
            <div class="col-lg-4 col-md-6">
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
            <div class="col-lg-4 col-md-6">
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
            <div class="col-lg-4 col-md-6">
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
