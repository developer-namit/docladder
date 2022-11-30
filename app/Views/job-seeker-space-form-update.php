<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Docladder- Job Seeker Space Form Update</title>

    <!-- Favicon -->
    <link href="images/favicon.png" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link rel="stylesheet" href="css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="css/flaticon/flaticon.css" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="css/select2/select2.css" />
    <link rel="stylesheet" href="css/datetimepicker/datetimepicker.min.css" />
    
    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/responsive.css" />

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
      <a class="navbar-brand" href="index.html">
        <img class="img-fluid" src="images/main-logo.png" alt="logo">
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Profile<i class="fas fa-chevron-down fa-xs"></i></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="job-seeker-profile.html">Profile</a></li>
              <li><a class="dropdown-item" href="job-seeker-change-password.html">Change Password</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="community.html"  aria-haspopup="true" aria-expanded="false">Community</a>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Postings <i class="fas fa-chevron-down fa-xs"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Create Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                    <ul class="dropdown-menu left-side">
                      <li><a class="dropdown-item" href="job-seeker-equipment-form.html">Equipment Posting</a></li>
                      <li><a class="dropdown-item" href="job-seeker-space-form.html">Space Posting</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Manage Postings <i class="fas fa-chevron-right fa-xs"></i></a>
                    <ul class="dropdown-menu left-side">
                      <li><a class="dropdown-item" href="job-seeker-manage-equipments.html">Manage Equipment</a></li>
                      <li><a class="dropdown-item" href="job-seeker-manage-space.html">Manage Space</a></li>
                    </ul>
                </li>
                  
              </ul>
            </li>
          <li class="nav-item">
               <a class="nav-link" href="premium-job-seeker-payment.html"  aria-haspopup="true" aria-expanded="false">Premium Job Seeker</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="job-seeker-search-recruiter.html"  aria-haspopup="true" aria-expanded="false">Search Recruiter</a>
          </li>
          
        </ul>
      </div>
      <div class="add-listing">
        <div class="login d-inline-block me-3">
            <a data-placement="bottom" title="Username" data-toggle="tooltip">Welcome <span style="color:#443000;padding:0;">Username</span></a>
        </div>
        <a class="btn btn-outline btn-md logout-btn" href="job-seeker.html"><i class="fas fa-power-off"></i>Logout</a>
      </div>
    </div>
  </nav>
</header>
<!--=================================
Header -->

<!--=================================
Register -->
<section class="space-ptb-outer bg-light recruiter-job-posting" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 text-center mb-3"><h2 class="main-site-title sub-title-bg"><span>Space Form Update</span></h2></div>
        <div class="col-lg-9">
          <form class="postjob-form">
            <div class="box-header">
              <h4>Space Information</h4>
            </div>
              <div class="box">
                  <div class="box-body">
                      <div class="bg-white login-register justify-content-center">
                        <div class="row">
                          <div class="form-group col-md-12 mb-3">
                              <label>Product name</label>
                              <input type="text" class="form-control" value="ABC" placeholder="Enter a Title">
                          </div>
                          <div class="form-group col-md-12 select-border mb-3">
                            <label>Product Image </label>
                            <div class="input-group choose-file">
                              <input type="file" class="form-control" id="file-upload" multiple required />
                              <label for="file-upload" class="input-group-text" id="file-upload-filename">Choose file </label>
                            </div>
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label>Price<em class="text-danger">*</em></label>
                              <div class="input-group">
                                <div class="input-group-prepend d-flex input-right-border">
                                  <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="10000">
                              </div>
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label>Offer Price<em class="text-danger">*</em></label>
                              <div class="input-group">
                                <div class="input-group-prepend d-flex input-right-border">
                                  <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="15000">
                              </div>
                          </div>
                          <div class="form-group col-md-6 select-border mb-3">
                              <label>State<em class="text-danger">*</em></label>
                              <select class="form-control basic-select">
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab" selected>Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                              </select>
                          </div>
                          <div class="form-group col-md-6 select-border mb-3">
                              <label>City<em class="text-danger">*</em></label>
                              <select class="form-control basic-select">
                                  <option value="JL"selected>Jalandhar</option>
                                  <option value="AL">Alabama</option>
                                  <option value="AK">Alaska</option>
                                  <option value="AZ">Arizona</option>
                                  <option value="AR">Arkansas</option>
                                  <option value="CA">California</option>
                                  <option value="CO">Colorado</option>
                                  <option value="CT">Connecticut</option>
                                  <option value="DE">Delaware</option>
                                  <option value="DC">District Of Columbia</option>
                                  <option value="FL">Florida</option>
                                  <option value="GA">Georgia</option>
                                  <option value="HI">Hawaii</option>
                                  <option value="ID">Idaho</option>
                                  <option value="IL">Illinois</option>
                                  <option value="IN">Indiana</option>
                                  <option value="IA">Iowa</option>
                                  <option value="KS">Kansas</option>
                                  <option value="KY">Kentucky</option>
                                  <option value="LA">Louisiana</option>
                                  <option value="ME">Maine</option>
                                  <option value="MD">Maryland</option>
                                  <option value="MA">Massachusetts</option>
                                  <option value="MI">Michigan</option>
                                  <option value="MN">Minnesota</option>
                                  <option value="MS">Mississippi</option>
                                  <option value="MO">Missouri</option>
                                  <option value="MT">Montana</option>
                                  <option value="NE">Nebraska</option>
                                  <option value="NV">Nevada</option>
                                  <option value="NH">New Hampshire</option>
                                  <option value="NJ">New Jersey</option>
                                  <option value="NM">New Mexico</option>
                                  <option value="NY">New York</option>
                                  <option value="NC">North Carolina</option>
                                  <option value="ND">North Dakota</option>
                                  <option value="OH">Ohio</option>
                                  <option value="OK">Oklahoma</option>
                                  <option value="OR">Oregon</option>
                                  <option value="PA">Pennsylvania</option>
                                  <option value="RI">Rhode Island</option>
                                  <option value="SC">South Carolina</option>
                                  <option value="SD">South Dakota</option>
                                  <option value="TN">Tennessee</option>
                                  <option value="TX">Texas</option>
                                  <option value="UT">Utah</option>
                                  <option value="VT">Vermont</option>
                                  <option value="VA">Virginia</option>
                                  <option value="WA">Washington</option>
                                  <option value="WV">West Virginia</option>
                                  <option value="WI">Wisconsin</option>
                                  <option value="WY">Wyoming</option>
                              </select>
                              
                              
                          </div>
                          <div class="form-group col-md-12 mb-3">
                              <label>Product Description<em class="text-danger">*</em></label>
                              <textarea class="form-control" rows="2" maxlength="2000">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
                          </div>
                          <div class="form-group col-md-12 mb-3">
                              <label>Year of Manufacturing</label>
                              <input type="text" class="form-control" value="2021">
                          </div>
                          <div class="form-group col-md-12 select-border mb-3">
                            <label>Product Video </label>
                            <div class="input-group choose-file">
                              <input type="file" class="form-control" id="file-upload-video" multiple required />
                              <label for="file-upload-video" class="input-group-text" id="file-upload-filename-video">Choose file </label>
                        
                            </div>
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label>Area(sq. ft)</label>
                              <input type="text" class="form-control" value="20 sq ft">
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label>Concerned Person Name</label>
                              <input type="text" class="form-control" value="XYZ">
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label>Contact</label>
                              <input type="tel" class="form-control" value="9874563210">
                          </div>
                          <div class="form-group col-md-6 mb-3">
                              <label>E-mail address</label>
                              <input type="email" class="form-control" value="abc@gmail.com">
                          </div>
                          <div class="form-group col-md-12 mt-2 mb-2 mb-lg-3 text-center">
                              <input class="btn btn-secondary main-btn" type="button" value="Submit">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </form>
        </div>
    </div>
  </div>
</section>
<!--=================================
Register -->


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
    <script src="js/datetimepicker/moment.min.js"></script>
    <script src="js/datetimepicker/datetimepicker.min.js"></script>

    <!-- Template Scripts (Do not remove)-->
    <script src="js/custom.js"></script>
    <script>
      var input = document.getElementById( 'file-upload' );
        var infoArea = document.getElementById( 'file-upload-filename' );

        input.addEventListener( 'change', showFileName );

        function showFileName( event ) {
          
          // the change event gives us the input it occurred in 
          var input = event.srcElement;
          
          // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
          var fileName = input.files[0].name;
          
          // use fileName however fits your app best, i.e. add it into a div
          infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
    <script>
      var inputA = document.getElementById( 'file-upload-video' );
        var infoAreaA = document.getElementById( 'file-upload-filename-video' );

        inputA.addEventListener( 'change', showFileName );

        function showFileName( event ) {
          
          // the change event gives us the input it occurred in 
          var inputA = event.srcElement;
          
          // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
          var fileName = inputA.files[0].name;
          
          // use fileName however fits your app best, i.e. add it into a div
          infoAreaA.textContent = 'File name: ' + fileName;
        }
    </script>

</body>
</html>