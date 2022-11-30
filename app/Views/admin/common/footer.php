</div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Docladder.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Permanently</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete permanently?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger deleteRecord" >Delete</a>
            </div>
            </div>
        </div>
        
    </div>


    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url();?>/public/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?php echo base_url();?>/public/admin/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="<?php echo base_url();?>/public/admin/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="<?php echo base_url();?>/public/admin/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?php echo base_url();?>/public/admin/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="<?php echo base_url();?>/public/admin/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="<?php echo base_url();?>/public/admin/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url();?>/public/admin/js/app.js"></script>
</body>
</html>