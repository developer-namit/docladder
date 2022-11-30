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
            <h4 class="mb-sm-0">Add New Recruiter</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/recruiter/list') ?>">Recruiter List</a></li>
                    <li class="breadcrumb-item active">Add New Recruiter</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add New Recuiter</h4>
            </div>

            <div class="card-body p-4">
                <form id="addNewRecruiter" method="post" enctype="multipart/form-data" >
                <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal-details" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                            <span class="d-none d-sm-block">Personal Details</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="personal-details" role="tabpanel">
                    
                        <div class="row">

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="">
                                    <div id="name_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Contact Person Name</label>
                                    <input type="text" name="person_name" class="form-control" placeholder="Enter Contact Person Name" value="">
                                    <div id="person_name_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email address" value="">
                                    <div id="email_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" id="" class="form-control" placeholder="Enter Password" >
                                    <div id="password_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="cpassword" id="" class="form-control" placeholder="Enter Confirm Password">
                                    <div id="cpassword_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label w-100">Consult Type</label>
                                    <select class="form-control basic-select" name="client_type">
                                        <option value="1">Consultant</option>
                                        <option value="2">Hospital</option>
                                        <option value="3">Others</option>
                                    </select>
                                    <div id="client_type_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Contact No</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Contact" maxlength="10" value="">
                                    <div id="phone_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Alternate No</label>
                                    <input type="text" name="aleternative_no" class="form-control" placeholder="Enter alternative no" maxlength="10" value="">
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
                                        ?>
                                            <option value="<?php echo $states['id'];?>"><?php echo $states['name'];?></option>
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
                                    <input type="text" name="pincode" class="form-control" placeholder="Enter Pincode" maxlength="10" value="">
                                    <div id="pincode_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Website Address</label>
                                    <input type="text" name="website_address" class="form-control" placeholder="Enter Website Address" value="">
                                    <div id="website_address_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="">
                                    <div id="designation_error" class="text-danger"></div>
                                </div>
                            </div>
                           
                        </div>
                        <!--end row--> 
                    </div>
                   
                </div>

                <div class="col-lg-12">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary">Add new Recruiter</button>
                        <button type="button" onclick="resetForm()" class="btn btn-soft-success">Reset</button>
                    </div>
                </div>
                <!--end col-->

            </form>
            </div>

        </div>
    </div>
    <!--end col-->
</div>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>  

  $( "#addNewRecruiter" ).submit(function( event ) {
        event.preventDefault();
        $('.text-danger').html('');
        $.ajax({
            url: "<?= base_url().'/admin/recruiter/add' ?>",
            type: "POST",
            data: $("#addNewRecruiter").serialize(),
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

                    $('#addNewRecruiter')[0].reset();

                    setTimeout(function() {
                        // reload Page
                        window.location.href = "<?= base_url().'/admin/recruiter/list' ?>";
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

    });


    $('#state').on('change', function () {  
        var state= this.value;

        if(state){
            var url= '<?php echo base_url('cities');?>';
            $.ajax({
                type: "get",
                url:  url,
                data:{state:state},
                dataType:'json',
                success:function(res){
                    console.log('res',res);
                    var html="";                        
                    var html= '<option value="">Select City</option>';
                    for(var count=0; count < res.length; count++){               
                        html+= '<option value="'+res[count]['id']+'">'+res[count]['name']+'</option>';
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
        
    });


  </script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?= view('admin/common/footer.php'); ?>