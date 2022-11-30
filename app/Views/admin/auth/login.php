<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>Docladder</title>
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>/public/admin/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="<?php echo base_url();?>/public/admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url();?>/public/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url();?>/public/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url();?>/public/admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?php echo base_url();?>/public/admin/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="<?php echo base_url();?>/public/admin/images/logo-light.png" alt="" height="60">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="p-2 mt-4">
                                    <form id="loginProcess" method="post">
                                       
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" value="" >
                                            <span id="email_error" class="text-danger f-left m-0"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input" value="" >

                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                <div class="col-12">
                                                    <span id="password_error" class="text-danger f-left m-0"></span>
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-success w-100" type="submit">Sign In</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> by docladder
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url();?>/public/admin/js/jquery.min.js"></script> 
    <script src="<?php echo base_url();?>/public/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?php echo base_url();?>/public/admin/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?php echo base_url();?>/public/admin/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?php echo base_url();?>/public/admin/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="<?php echo base_url();?>/public/admin/js/pages/password-addon.init.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Add new restaurant script
        $( "#loginProcess" ).submit(function( event ) {
            event.preventDefault();
            $('.text-danger').html('');
            $.ajax({
                url: "<?= base_url().'/admin/login' ?>",
                type: "POST",
                data: $("#loginProcess").serialize(),
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(msg){
                    document.documentElement.setAttribute("data-preloader","enable")
                },
                success: function(data){
                    if(data.status == 1){
                        // success

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });

                        window.location.href = "<?= base_url().'/admin/dashboard' ?>";

                    }else if(data.status == 2){
                        // Validation error
                        //printErrorMsg(data.error);
                        $.each(data.errors, function (key, val) {
                            $('#'+key+'_error').text(val);
                        });
                    }else{
                        Swal.fire({
                            icon: 'error',
                            text: data.message
                        })
                    }
                    
                    document.documentElement.setAttribute("data-preloader","disable");
                    
                },error: function(error){
                    alert('Something went wrong, Please try again!');
                }
            });

        });
    </script>
</body>

</html>