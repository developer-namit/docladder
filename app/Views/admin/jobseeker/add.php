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
            <h4 class="mb-sm-0">Add New Jobseeker</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/jobseeker/list') ?>">Jobseeker List</a></li>
                    <li class="breadcrumb-item active">Add New Jobseeker</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Add New Jobseeker</h4>
            </div>

            <div class="card-body p-4">
                <form id="addNewSeeker" method="post" enctype="multipart/form-data" >
                <ul class="nav nav-pills arrow-navtabs nav-success bg-light mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personal-details" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                            <span class="d-none d-sm-block">Personal Details</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#career-profile" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                            <span class="d-none d-sm-block">Career Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#educational-details" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                            <span class="d-none d-sm-block">Education Details</span>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="personal-details" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                            <?php 
                                                $pimage = base_url('public/admin/images/users/avatar-1.jpg');
                                             ?>
                                            <img src="<?= $pimage; ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input" name="image" type="file" class="profile-img-file-input" accept="image/*" >
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-16 mb-1">Upload Image</h5>
                                        <div id="image_error" class="text-danger"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="">
                                            <div id="name_error" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email address" value="">
                                            <div id="email_error" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" id="" class="form-control" >
                                            <div id="password_error" class="text-danger"></div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" id="" class="form-control" >
                                            <div id="cpassword_error" class="text-danger"></div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Contact</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Enter Contact" maxlength="10" value="">
                                            <div id="phone_error" class="text-danger"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">DOB</label>
                                            <input type="text" name="dob" class="form-control datepicker" value="">
                                            <div id="dob_error" class="text-danger"></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-control" id="">
                                        <option value="">Select Gender</option>
                                        <option value="male" >Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div id="gender_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label w-100">Upload Resume</label>
                                    <input type="file" class="form-control" name="file" id="" accept=".doc,.pdf,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf">
                                    <div id="file_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 form-group">
                                            <label class="form-label">Current Location</label>
                                            <select class="form-control jquery-select2 slt-location cuurentLocationSel" name="state[]" id="states" autocomplete="off" multiple>
                                                <option disabled>Select Location...</option>

                                                <optgroup><option value="NI">Anywhere in North India</option></optgroup>
                                                <optgroup><option value="EI">Anywhere in East India</option></optgroup>
                                                <optgroup><option value="WI">Anywhere in West India</option></optgroup>
                                                <optgroup><option value="SI">Anywhere in South India</option></optgroup>
                                                <?php 
                                                    if(!empty($margedata)){
                                                        foreach($margedata as $val){
                                                ?>
                                                    <optgroup><option value="state_<?= $val['id'];?>"><?= strtolower($val['name']);?></option></optgroup>
                                                <?php 
                                                    if(!empty($val['city'])){
                                                        foreach($val['city'] as $cities){
                                                ?>
                                                    <option value="city_<?= $cities['id'];?>"> <?= strtolower($cities['name']);?></option>
                                                <?php } } ?>
                                                    <optgroup><option value="other_<?= $val['id'] ?>" type="others" mainId="<?= $val['id'] ?>" mainState="<?= $val['name'] ?>" ><?= $val['other'];?></option></optgroup>
                                                <?php } } ?>     
                                        </select>
                                        
                                        <div class="child">
                                            
                                        </div>
                                        <div id="state_error" class="text-danger"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3 form-group">
                                        <label class="form-label">Preffered Location</label>
                                        <select class="form-control jquery-select2 slt-location prefferedLocationSel" name="location[]" id="location" autocomplete="off" multiple>
                                                
                                            <option disabled>Select Location...</option>

                                            <optgroup><option value="NI">Anywhere in North India</option></optgroup>
                                            <optgroup><option value="EI">Anywhere in East India</option></optgroup>
                                            <optgroup><option value="WI">Anywhere in West India</option></optgroup>
                                            <optgroup><option value="SI">Anywhere in South India</option></optgroup>
                                            <?php 
                                                if(!empty($margedata)){
                                                    foreach($margedata as $val){
                                            ?>
                                                <optgroup><option value="state_<?= $val['id'];?>"><?= strtolower($val['name']);?></option></optgroup>
                                            <?php 
                                                if(!empty($val['city'])){
                                                    foreach($val['city'] as $cities){
                                            ?>
                                                <option value="city_<?= $cities['id'];?>"> <?= strtolower($cities['name']);?></option>
                                            <?php } } ?>
                                                <optgroup><option value="other_<?= $val['id'] ?>" type="others"  mainId="<?= $val['id'] ?>"  mainState="<?= $val['name'] ?>" ><?= $val['other'];?></option></optgroup>
                                            <?php } } ?>                                                         
                                        </select>
            
                                        <div class="child"></div>
                                        <div id="location_error" class="text-danger"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end row--> 
                    </div>
                    <div class="tab-pane" id="career-profile" role="tabpanel">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Job Title</label>
                                    <input type="text" class="form-control" name="job_title" value="">
                                    <div id="job_title_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Key Skills</label>
                                    <select name="key_skills[]" class="form-control select2Multiple" id="" multiple>
                                        <option value="">Select</option>
                                        <?php 
                                            if(!empty($skill)){
                                                foreach($skill as $skills){

                                                    if(!empty($user['key_skills'])) {
                                                        $key_skills = explode(',',$user['key_skills']);
                                                        if(in_array($skills['skills'],$key_skills)){
                                                            $selected = 'selected';
                                                        }else{
                                                            $selected = '';
                                                        }
                                                        
                                                    }else{
                                                        $selected = '';
                                                    }
                                        ?>
                                           <option value="<?= $skills['skills']; ?>"><?= $skills['skills'];?></option>
                                        <?php } } ?>
                                    </select>
                                    <div id="key_skills_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Job Function</label>
                                    <select name="job_function" class="form-control" id="">
                                        <option value="">Select</option>
                                        <?php 
                                            if(!empty($job_function)){
                                                foreach($job_function as $jfunction){
                                        ?>
                                           <option value="<?= $jfunction['designation_id'];?>" ><?= $jfunction['designation'];?></option>
                                        <?php } } ?>
                                    </select>
                                    <div id="job_function_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Area of Specialization</label>
                                    <select name="specialization" class="form-control" id="specialization">
                                        <option value="">Select</option>
                                    </select>
                                    <div id="specialization_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Experience Year</label>
                                    <select name="exp_year" class="form-control" id="">
                                            <option value="">Select</option>
                                            <option value="0">0 Experience</option>
                                            <option value="1">1Y Experience</option>
                                            <option value="2">2Y Experience</option>
                                            <option value="3">3Y Experience</option>
                                            <option value="4">4Y Experience</option>
                                            <option value="5">5Y Experience</option>
                                            <option value="6">6Y Experience</option>
                                            <option value="7">7Y Experience</option>
                                            <option value="8">8Y Experience</option>
                                            <option value="9">9Y Experience</option>
                                            <option value="10">10Y Experience</option>
                                            <option value="11">10Y+ Experience</option>
                                    </select>
                                    <div id="exp_year_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Experience Month</label>
                                    <select name="exp_month" class="form-control" id="">
                                            <option value="" >Select</option>
                                            <option value="1">1M Experience</option>
                                            <option value="2">2M Experience</option>
                                            <option value="3">3M Experience</option>
                                            <option value="4">4M Experience</option>
                                            <option value="5">5M Experience</option>
                                            <option value="6">6M Experience</option>
                                            <option value="7">7M Experience</option>
                                            <option value="8">8M Experience</option>
                                            <option value="9">9M Experience</option>
                                            <option value="10">10M Experience</option>
                                            <option value="11">11M Experience</option>
                                    </select>
                                    <div id="exp_year_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Employer</label>
                                    <input type="text" class="form-control" name="current_employer" id="" value="">
                                    <div id="current_employer_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Designation</label>
                                    <input type="text" class="form-control" name="current_designation" id="" value="">
                                    <div id="current_designation_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Annual CTC Yearly( in Lacs ) </label>
                                    <input type="text" class="form-control" name="current_ctc" id="" value="">
                                    <div id="current_ctc_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Expected Annual CTC Yearly( in Lacs) </label>
                                    <input type="text" class="form-control" name="expected_ctc" id="" value="">
                                    <div id="expected_ctc_error" class="text-danger"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="educational-details" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Highest Qualification</label>
                                    <input type="text" class="form-control" name="higher_education" id="" value="" >
                                    <div id="higher_education_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Graduation</label>
                                    <select name="graduation" id="" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            if(!empty($graduate)){ 
                                                foreach($graduate['education'] as $key=> $edu){  
                                        ?>
                                            <option value="<?php echo $key;?>"><?php echo $edu;?></option>
                                        <?php } } ?>
                                    </select>
                                            
                                    <div id="graduation_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Institute</label>
                                    <input type="text" class="form-control" name="institute" id="" value="">
                                    <div id="institute_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Year of passing</label>
                                    <input type="text" class="form-control" name="year_of_passing" id="" value="">
                                    <div id="year_of_passing_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Post Graduation</label>
                                   
                                    <select name="post_graducation" id="" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            if(!empty($graduate)){ 
                                                foreach($graduate['postgarduate'] as $key=> $edu){
                                        ?>
                                            <option value="<?php echo $key;?>" ><?php echo $edu;?></option>
                                        <?php } } ?>
                                    </select>
                                    <div id="post_graducation_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Institute</label>
                                    <input type="text" class="form-control" name="post_instittute" id="" value="">
                                    <div id="post_instittute_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Year of passing</label>
                                    <input type="text" class="form-control" name="post_passing_year" id="" value="">
                                    <div id="post_passing_year_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Super Specialty</label>
                                   
                                    <select name="super_specialty" id="" class="form-control">
                                        <option value="">Select</option>
                                        <?php 
                                            if(!empty($graduate)){ 
                                                foreach($graduate['specialty'] as $key=> $edu){
                                        ?>
                                            <option value="<?php echo $key;?>"><?php echo $edu;?></option>
                                        <?php } } ?>
                                    </select>
                                    <div id="super_specialty_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Institute</label>
                                    <input type="text" class="form-control" name="specialty_graducation" id="" value="">
                                    <div id="specialty_graducation_error" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Year of passing</label>
                                    <input type="text" class="form-control" name="specialty_passing_year" id="" value="">
                                    <div id="specialty_passing_year_error" class="text-danger"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary">Add new Jobseeker</button>
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

    // logo Image show while selection
    document.querySelector("#profile-img-file-input").addEventListener("change", function() {
        var o = document.querySelector(".user-profile-image"),
            e = document.querySelector(".profile-img-file-input").files[0],
            i = new FileReader;
        i.addEventListener("load", function() {
            o.src = i.result
        }, !1), e && i.readAsDataURL(e)
    });

    $( function() {
        $( ".datepicker" ).datepicker();

        $(".cuurentLocationSel").select2({
            closeOnSelect : false,
            placeholder : "Current Location",
            allowHtml: true,
            allowClear: true,
            tags: true 
        });
        
        $(".prefferedLocationSel").select2({
            closeOnSelect : false,
            placeholder : "Preferred Location",
            allowHtml: true,
            allowClear: true,
            tags: true 
        });

        $('.select2Multiple').select2();
    });

    $('.jquery-select2').on('select2:select', function (e) {
        
        var data = e.params.data;
        
        if(data.element.getAttribute('type') == 'others'){
            var selectedMainId = data.element.offsetParent.getAttribute('id');
            var selectedValue = data.id;
                // colsole.log(selectedMainId);
                // colsole.log(selectedMainId);
            $(`#${selectedMainId}`).parent('.form-group').find('.child').append(`
                <div id="Main${selectedMainId}${selectedValue}" class="mb-3 mt-3 col-md-12">
                    <label class="form-label">${data.text.trim()}</label>
                    <input type="text" class="form-control" name="other[${selectedMainId}][${data.element.getAttribute('mainId')}]" value="">
                </div>
            `);
        }
    });
    
    $('.jquery-select2').on('select2:unselect', function (e) {
        var data = e.params.data;
        if(data.element.getAttribute('type') == 'others'){
            var selectedMainId = data.element.offsetParent.getAttribute('id');
            var selectedValue = data.id;
            $(`#Main${selectedMainId}${selectedValue}`).remove()
        }
    });
  

  $( "#addNewSeeker" ).submit(function( event ) {
        event.preventDefault();
        $('.text-danger').html('');
        $.ajax({
            url: "<?= base_url().'/admin/jobseeker/add' ?>",
            type: "POST",
            data: $("#addNewSeeker").serialize(),
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

                    $('#addNewSeeker')[0].reset();

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

    });


    $('select[name="job_function"]').change(function(){
        selectedVal = $(this).val();
        getjobfunction(selectedVal);
    });

    function getjobfunction(designation_id){

        var url= '<?php echo base_url('admin/jobseeker/getdata');?>';
        $.ajax({
            type: "post",
            url:  url,
            data:{designation_id:designation_id},
            dataType:'json',
            success:function(res){
                var html="";
                if(res.status == 1){
                    $(res.data).each(function( index,value ) {
                        html+= '<option value="'+ value.id +'">'+ value.skills +'</option>';
                    });
                }else{
                    html+= '<option value="">Select</option>';
                }
                
                for(var count=0; count < res.length; count++){                 
                html+= '<option value="'+res[count]['id']+'">'+res[count]['skills']+'</option>';
                }
                $('#specialization').html(html);
            },
            error:function(err){
                console.log('Erro',err)
            }
        });
      }


  </script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?= view('admin/common/footer.php'); ?>