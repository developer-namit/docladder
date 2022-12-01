<?= view('admin/common/header.php'); ?>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>

    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color: var(--vz-vertical-menu-bg-dark) !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #fff;
    }

    .nmSelBox .select2-selection__rendered {
      border: 1px solid #eeeeee;
      color: #574e4e;
      border-radius: 0px;
      filter: drop-shadow(0 0 2.5px rgba(121, 121, 121, 0.57));
      background-color: #ffffff;
      height: 35px;
      padding: 5px 20px;
      box-shadow: none;
      font-size: 14px;
      font-weight: 600;
      display: flex !important;
        align-items: center !important;
    }
    
    .nmSelBox .select2-selection__rendered li{
        margin: 7px !important;
    }
    
    .nmSelBox .select2-selection__rendered li input::placeholder{
        color:#000000 !important;
        font-size:16px !important;
    }
    
    .select2-results__options.select2-results__options--nested li{
        font-weight:bold !important;
    }
    
    .select2-results__group {
      display: none !important;
      padding: 0px !important;
    }
    .select2-results__options.select2-results__options--nested{
        padding: 0px !important;
    }
</style>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Recruiter Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/recruiter/list') ?>">Recruiter List</a></li>
                    <li class="breadcrumb-item active">Recruiter Details</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">

    <div class="col-xxl-12">
        
        <div class="card mt-xxl-n5">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Recruiter Details</h4>
            </div>

            <div class="card-body p-4">
                <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal-details" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                            <span class="d-none d-sm-block">Personal Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#change-password" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                            <span class="d-none d-sm-block">Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#subusers" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                            <span class="d-none d-sm-block">Subusers</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="personal-details" role="tabpanel">
                        <form id="UpdateRecruiter" method="post" enctype="multipart/form-data" >
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Client Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?= $user['client_first_name']; ?>">
                                        <div id="name_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Contact Person Name</label>
                                        <input type="text" name="person_name" class="form-control" placeholder="Enter Contact Person Name" value="<?= $user['contact_person_name']; ?>">
                                        <div id="person_name_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email address" value="<?= $user['email_address']; ?>" readonly>
                                        <div id="email_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label w-100">Consult Type</label>
                                        <select class="form-control basic-select" name="client_type">
                                            <option value="1" <?php if($user['client_type'] == 1){ echo "selected"; } ?>>Consultant</option>
                                            <option value="2" <?php if($user['client_type'] == 2){ echo "selected"; } ?>>Hospital</option>
                                            <option value="3" <?php if($user['client_type'] == 3){ echo "selected"; } ?> >Others</option>
                                        </select>
                                        <div id="client_type_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Contact</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Contact" maxlength="10" value="<?= $user['contact_no']; ?>" readonly>
                                        <div id="phone_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Alternate No</label>
                                        <input type="text" name="aleternative_no" class="form-control" placeholder="Enter alternative no" maxlength="10" value="<?= $user['alternate_no']; ?>">
                                        <div id="aleternative_no_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="">Select State</option>
                                            <?php if(!empty($state)){
                                                foreach($state as $states){

                                                    if($states['id'] == $user['State']){
                                                        $selected = "selected";
                                                    }else{
                                                        $selected = "";
                                                    }
                                            ?>
                                                <option value="<?php echo $states['id'];?>" <?= $selected ?>><?php echo $states['name'];?></option>
                                            <?php } }?>
                                        </select>
                                        <div id="state_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <select id="city" name="city" class="form-control">
                                            <option value="">Select City</option>
                                        </select>
                                        <div id="city_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Pincode</label>
                                        <input type="text" name="pincode" class="form-control" placeholder="Enter Pincode" maxlength="10" value="<?= $user['pincode']; ?>">
                                        <div id="pincode_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Website Address</label>
                                        <input type="text" name="website_address" class="form-control" placeholder="Enter Website Address" value="<?= $user['website_address']; ?>">
                                        <div id="website_address_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Designation</label>
                                        <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="<?= $user['designation']; ?>">
                                        <div id="designation_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="1" <?php if($user['status'] == 'active'){ echo "selected"; } ?>>Active</option>
                                            <option value="0" <?php if($user['status'] == 'deactive'){ echo "selected"; } ?>>Inactive</option>
                                        </select>
                                        <div id="status_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" onclick="resetForm()" class="btn btn-soft-success">Reset</button>
                                    </div>
                                </div>

                                
                            </div>
                            <!--end row--> 
                        </form>
                    </div>
                    <div class="tab-pane" id="change-password" role="tabpanel">
                        <form id="UpdatePassword" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="password" value="">
                                        <div id="password_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="cpassword" value="">
                                        <div id="cpassword_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                        <button type="reset" class="btn btn-soft-success">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="subusers" role="tabpanel">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Recuiter List</h4>
                                        <div class="flex-shrink-0">
                                            <a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#AddNewSubUserModal">Add New Subuser</a>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <?php
                                            if (!empty($sub_users)) {
                                            ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Email Address</th>
                                                                <th scope="col">Contact no.</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                foreach ($sub_users as $key => $value) {
                                                            ?>
                                                                <tr>
                                                                    <td class="fw-medium"><?= $value['id']; ?></td>
                                                                    <td><?= $value['client_first_name']. " ". $value['client_last_name']; ?></td>
                                                                    <td><?= $value['email_address']; ?></td>
                                                                    <td><?= $value['contact_no']; ?></td>
                                                                    
                                                                    <td>
                                                                        <?php if ($value['status'] == 'active') { ?>
                                                                            <span class="badge badge-soft-success">Active</span>
                                                                        <?php } else { ?>
                                                                            <span class="badge badge-soft-danger">In active</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?= base_url('admin/recruiter/detail/'.$value['id']) ?>" class="btn btn-secondary btn-animation waves-effect waves-light" data-text="View Detail"><span>View Detail</span></a>

                                                                        <a type="button" class="btn btn-danger btn-animation waves-effect waves-light deleteThis" data-text="Delete" data-url="<?= base_url('admin/recuiter/delete/'.$value['id']) ?>" ><span>Delete</span></a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            <?php } else { ?>
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger">
                                                        No sub user found.
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

<!-- Modal -->
<div class="modal fade" id="AddNewSubUserModal" tabindex="-1" aria-labelledby="AddNewSubUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form id="AddSubUser" method="post" enctype="multipart/form-data" >
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewSubUserModalLabel">Add New Subuser</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="">
                            <div id="first_name_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="">
                            <div id="last_name_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email_address" class="form-control" placeholder="Email Address" value="">
                            <div id="email_address_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Contact No</label>
                            <input type="text" name="contact_num" class="form-control" placeholder="Contact No" value="" maxlength="10">
                            <div id="contact_num_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="passwordData" class="form-control" placeholder="Password" value="">
                            <div id="passwordData_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="c_passwordData" class="form-control" placeholder="Confirm Password" value="">
                            <div id="c_passwordData_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designationData" class="form-control" placeholder="Designation" value="">
                            <div id="designationData_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="statusData" class="form-control">
                                <option value="active" >Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                            <div id="statusData_error" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group col-md-12 mb-3">
                            <label class="form-label" for="firstname">Services Allocated</label>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input id="searchJob" type="checkbox" name="service_resume" value="1">
                                    <label for="searchJob">Search Job</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input id="PostJob" type="checkbox" name="service_whatsapp" value="1">
                                    <label for="PostJob">Post Jobs</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $( "#UpdateRecruiter" ).submit(function( event ) {
        event.preventDefault();
        $('.text-danger').html('');
        $.ajax({
            url: "<?= base_url().'/admin/recruiter/detail/'.$user['id'] ?>",
            type: "POST",
            data: $("#UpdateRecruiter").serialize(),
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
    });

    $( "#UpdatePassword" ).submit(function( event ) {
        event.preventDefault();
        $('.text-danger').html('');
        $.ajax({
            url: "<?= base_url().'/admin/recruiter/update_password/'.$user['id'] ?>",
            type: "POST",
            data: $("#UpdatePassword").serialize(),
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

                    $('#UpdatePassword')[0].reset();

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
    });

    $( "#AddSubUser" ).submit(function( event ) {
        event.preventDefault();
        $('.text-danger').html('');
        $.ajax({
            url: "<?= base_url().'/admin/recruiter/add_sub_user/'.$user['id'] ?>",
            type: "POST",
            data: $("#AddSubUser").serialize(),
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

                    $('#AddSubUser')[0].reset();

                    setTimeout(function(){
                        location.reload(); 
                    }, 2000);

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
    });

    <?php if($user['State']){  ?>
        fetch_cities("<?= $user['State'] ?>");
    <?php } ?>
    

    $('#state').on('change', function () {  
        var state = this.value;
        fetch_cities(state);
    });

    function fetch_cities(state) {
       
        if(state){
            var selected_city = "<?= $user['City']; ?>"
            var url= '<?php echo base_url('cities');?>';
            var selected = '';
            $.ajax({
                type: "get",
                url:  url,
                data:{state:state},
                dataType:'json',
                success:function(res){
                    var html="";                        
                    var html= '<option value="">Select City</option>';
                    for(var count=0; count < res.length; count++){        
                       
                        if(selected_city == res[count]['id']){
                            selected = 'selected';
                        }else{
                            selected = '';
                        }
                        html+= '<option value="'+res[count]['id']+'" '+ selected +' >'+res[count]['name']+'</option>';
                    } 
                    $('#city').html(html);
                },
                error:function(err){
                    console.log('Erro',err)
                }
            });
        }else{
            var html="";                        
            var html= '<option value="">Select City</option>';
            $('#city').html(html);
        }
        
    }



  </script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?= view('admin/common/footer.php'); ?>