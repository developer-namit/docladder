<?= view('admin/common/header.php'); ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Jobseeker List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Jobseeker List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">

    <div class="col-lg-12">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-xxl-6 col-md-6">
        <div class="card mt-xxl-n5">


            <div class="card-body p-4">

                

                <div class="tab-content">

                    <form action="" method="get">

                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php if (isset($_GET['name'])) {  echo $_GET['name']; } ?>">
                                    <div id="name_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email address" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; } ?>">
                                    <div id="email_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Contact" maxlength="10" value="<?php if (isset($_GET['phone'])) {
                                                                                                                                                echo $_GET['phone'];
                                                                                                                                            } ?>">
                                    <div id="phone_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="order_by" class="form-control" id="">
                                        <option value="">Select Order</option>
                                        <option value="ASC" <?php if (isset($_GET['order_by']) && $_GET['order_by'] == "ASC") {
                                                                echo "selected";
                                                            } ?>>Order by ASC</option>
                                        <option value="DESC" <?php if (isset($_GET['order_by']) && $_GET['order_by'] == "DESC") {
                                                                    echo "selected";
                                                                } ?>>Order by DESC</option>
                                    </select>
                                    <div id="current_location_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success w-100">Search</button>
                                </div>
                            </div>


                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-6 col-md-6">
        <div class="card mt-xxl-n5">


            <div class="card-body p-4">

                <div class="tab-content">
                    <form action="<?= base_url('admin/jobseeker/export'); ?>" method="get" > 
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input id="from" type="text" name="from" class="form-control" placeholder="Start Date" value="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input id="to" type="text" name="to" class="form-control" placeholder="End Date" value="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success w-100">Export</button>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>

                    <form action="<?= base_url('admin/jobseeker/importcsv'); ?>" method="post" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="">
                                    <input type="file" name="file_upload" class="form-control" >
                                </div>
                                
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <button type="submit" class="btn btn-success w-100">Import</button>
                                    <a style="float: right; color:#2196f3;" href="<?= base_url('public/admin/jobseeker_sample.csv'); ?>">Download Sample file</a>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 d-flex align-items-center flex-grow-1">
                    <span>Jobseeker List</span>
                    
                    <div style="display:none" class="mainSelection">
                        <button id="deleteAll" type="button" class="btn btn-danger ms-4" data-bs-toggle="modal" data-bs-target="#BulkdeleteModal" >Delete All</button>
                        <button id="sendMail" type="button" class="btn btn-success ms-2" >Send Mail</button>
                    </div>

                </h4>
                <div class="flex-shrink-0">
                    <a href="<?= base_url() . '/admin/jobseeker/add/'; ?>" class="btn btn-primary">Add New Jobseeker</a>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <?php
                    if (!empty($users)) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col"><input class="checkall" type="checkbox" > Check all</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Contact no.</th>
                                        <th scope="col">Specialization</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="fw-medium"><input class="inputcheck" type="checkbox" name="ids[]" value="<?= $value['id']; ?>"></td>
                                            <td class="fw-medium"><?= $value['id']; ?></td>
                                            <td><?= $value['first_name']; ?></td>
                                            <td><?= $value['email_id']; ?></td>
                                            <td><?= $value['contact_no']; ?></td>
                                            <td><?php echo (!empty($value['specialization_data'])) ?  $value['specialization_data'] : '-'; ?></td>
                                            <td>
                                                <?php if ($value['status'] == 1) { ?>
                                                    <span class="badge badge-soft-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-soft-danger">In active</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('admin/jobseeker/detail/'.$value['id']) ?>" class="btn btn-secondary btn-animation waves-effect waves-light" data-text="View Detail"><span>View Detail</span></a>

                                                <a type="button" class="btn btn-danger btn-animation waves-effect waves-light deleteThis" data-text="Delete" data-url="<?= base_url('admin/jobseeker/delete/'.$value['id']) ?>" ><span>Delete</span></a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                            <?php if ($pager) : ?>
                                <?= $pager->links() ?>
                            <?php endif ?>

                        </div>
                    <?php } else { ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                No jobseeker found.
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
</div>
<!--end row-->

    <!-- Modal -->
    <div class="modal fade" id="BulkdeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Permanently</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete multiple records?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="deleteAllData" type="button" class="btn btn-danger" >Delete</button>
            </div>
            </div>
        </div>
        
    </div>


<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  $(function() {
        var dateFormat = "mm/dd/yy",
            from = $( "#from" )
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
            })
            .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            }),
            to = $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
            })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });
    
            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }
                return date;
            }

            $('.deleteThis').click(function(){
                var url = $(this).attr('data-url');
                $('#deleteModal .deleteRecord').attr('href',url);
                $('#deleteModal').modal('show');
            })
    });

    $('.checkall').change(function(){
        if ($(this).is(':checked')) {
            $('.inputcheck').prop('checked', true);
            show_hide();
        }else{
            $('.inputcheck').prop('checked', false);
            show_hide();
        }
    });

    $('input[name="ids[]"]').change(function(){
        if ($(this).is(':checked')) {
            show_hide();
        }else{
            show_hide();
        }
    });

    function show_hide(){
        if($('input[name="ids[]"]:checked').length > 0){
            $('.mainSelection').show();
        }else{
            $('.mainSelection').hide();
        }
    }

    $('#deleteAllData').click(function(){
        var ids = new Array();
        $(`input[name="ids[]"]:checked`).each(function() {
            ids.push($(this).val());
        });

        if(ids){
            $.ajax({
                url: "<?= base_url().'/admin/jobseeker/bulk_delete' ?>",
                type: "POST",
                data: { ids : ids},
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

                        setTimeout(function() {
                            // reload Page
                            window.location.href = "<?= base_url().'/admin/jobseeker/list' ?>";
                        }, 2500);
                        

                    }else if(data.status == 2){
                    
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
        }
    });

    $('#sendMail').click(function(){

        var ids = new Array();
        $(`input[name="ids[]"]:checked`).each(function() {
            ids.push($(this).val());
        });

        if(ids){
            var selIds = ids.toString();
            window.location.href = "<?= base_url().'/admin/jobseeker/bulk_email?ids=' ?>" + selIds;
        }

    });

    
  </script>
<?= view('admin/common/footer.php'); ?>