<?= $this->include('recruiter-header') ?>
<!--=================================
Header -->
<style>
    input#add {
    color: black;
    background-color: aliceblue;
}
</style>
<!--=================================
Register -->
<section class="space-ptb-outer bg-light edit-profile recruiter-job-posting">
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4"></div>
            <div class="col-lg-6 text-center mb-3"><h2 class="main-site-title sub-title-bg"><span>MY Profile</span></h2></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <?php if(!empty(session()->getFlashdata("wrong"))): ?>
                <div class="col-10">
                <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata("wrong") ?>
                </div>
                </div>
                <?php endif; ?>
                
                <?php if(!empty(session()->getFlashdata("success"))): ?>
                <div class="row justify-content-center"><div class="alert alert-success col-lg-10" role="alert">
                <?= session()->getFlashdata("success") ?>
                </div></div>
                <?php endif; ?>
                 <?php $validation =  \Config\Services::validation(); ?>
                    <div class="col-lg-3">
                        <div class="dashboard_nav_item">
                          <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="tab-01" data-bs-toggle="tab" href="../assets/#editProfile" role="tab" aria-controls="editProfile" aria-selected="true"><i class="login-icon fas fa-edit"></i> Edit Profile</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tab-02" data-bs-toggle="tab" href="../assets/#manageSubUser" role="tab" aria-controls="manageSubUser" aria-selected="false"><i class="login-icon fas fa-users"></i>Manage Sub Users</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="tab-03" data-bs-toggle="tab" href="../assets/#changePassword" role="tab" aria-controls="changePassword" aria-selected="false"><i class="login-icon fas fa-key"></i>Change Password</a>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="editProfile" role="tabpanel" aria-labelledby="tab-01">
                            <form class="postjob-form" action="<?php echo base_url('updateprofile');?>" method="post" id="formsubmitted">
                                <div class="box-header">
                                    <h4><i class="login-icon fas fa-edit"></i> Edit Profile</h4>
                                </div>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="bg-white login-register justify-content-center">
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="firstname">Client Name</label>
                                                    <input type="text" name="first_name" value="<?php if(!empty($user['client_first_name'])){ echo $user['client_first_name'];}?>" class="form-control" value="" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="lastname">Contact Person Name</label>
                                                    <input type="text" name="last_name" value="<?php if(!empty($user['client_last_name'])){ echo $user['client_last_name'];}?>" class="form-control" value="" placeholder="">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    
                                                    <label class="form-label" for="state">State</label>
                                                    <select class="form-control basic-select" id="states" name="state">
                                                         <option value="">Select state</option>
                                                      <?php if(!empty($state)){ foreach($state as $states){
                                                      
                                                      if(isset($user['State']) && $user['State']== $states['id']){
                                                      ?>
                                                      <option value="<?php echo $user['State'];?>" selected><?php echo $states['name'];?></option>
                                                      <?php }else{?>
                                                     
                                                      <option value="<?php echo $states['id'];?>"><?php echo $states['name'];?></option>
                                                      <?php }} }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label">City</label>
                                                    <select class="form-control basic-select" name="city" id="city">
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="Username">Pin Code<em class="text-danger">*</em></label>
                                                    <input type="text" class="form-control <?php if($validation->getError('pincode')): ?>is-invalid<?php endif ?>" maxlength="6" id="pincode" name="pincode" value="<?php if(!empty($user['pincode'])){ echo $user['pincode'];}?>" required>
                                                   <?php if ($validation->getError('pincode')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('pincode') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="Username">Website Address</label>
                                                    <input type="text" class="form-control"  name="website_address" value="<?php if(!empty($user['website_address'])){ echo $user['website_address'];}?>">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label">Contact No.</label>
                                                    <input type="text" class="form-control"  maxlength="10"   name="contact_no" value="<?php if(!empty($user['contact_no'])){ echo $user['contact_no'];}?>">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label">Alternate No.</label>
                                                    <input type="text" class="form-control"   maxlength="10"  name="alternate_no" value="<?php if(!empty($user['alternate_no'])){ echo $user['alternate_no'];}?>">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="Username">Designation</label>
                                                    <input type="text" class="form-control"  name="designation" value="<?php if(!empty($user['designation'])){ echo $user['designation'];}?>">
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label">Email Address<em class="text-danger">*</em></label>
                                                    <input type="text" class="form-control <?php if($validation->getError('email_address')): ?>is-invalid<?php endif ?>" id="emailaddress"  name="email_address" value="<?php if(!empty($user['email_address'])){ echo $user['email_address'];}?>" required>
                                                    <?php if ($validation->getError('email_address')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('email_address') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-12 mt-2 mt-lg-3 mb-3 text-center">
                                                    <input class="btn btn-secondary main-btn" type="submit" value="Update">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                          <div class="tab-pane fade show" id="manageSubUser" role="tabpanel" aria-labelledby="tab-02">
                            <form class="postjob-form">
                                <div class="box">
                                    <div class="box-header">
                                        <h4><i class="login-icon fas fa-users pe-2"></i>Manage Sub Users</h4>
                                        
                                    <div class="col-md-5 col-sm-7 mt-2">
                                    <div class="delete" style="cursor: pointer;">
                                        <h4><i class="login-icon fas fa-plus"></i> <a onclick="addfunction()" >Add</a> </h4>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="bg-white login-register justify-content-center">
                                            <div class="row">
                                                <div class="col-md-12">
                                        <div class="user-dashboard-info-box mb-0 manage-table">
                                          <div class="user-dashboard-table table-responsive">
                                            <table class="table table-bordered" id="checktables">
                                              <thead class="bg-light">
                                                <tr>
                                                  <th scope="col">Name</th>
                                                  <th scope="col">Email ID</th>
                                                  <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                $i= 1; 
                                                if(!empty($managejob)){ foreach($managejob as $Mjob){ ?>
                                                  <tr>
                                                      <td><?php if(!empty($Mjob['client_first_name'])){ echo $Mjob['client_first_name']; }?></td>
                                                     <td><?php if(!empty($Mjob['email_address'])){ echo $Mjob['email_address']; }?></td>
                                                      <td><?php if(!empty($Mjob['status'])){ echo ucfirst($Mjob['status']); }?></td>
                                                      <td>
                                                        <ul class="list-unstyled mb-0 d-flex">
                                                          <li><a class="text-info" onclick="MyEditManage(<?php echo $Mjob['id'];?>)"><i class="fas fa-pencil-alt"></i></a></li>
                                                          <li><a class="text-danger" onclick="MyDelFunction(<?php echo $Mjob['id'];?>)"><i class="far fa-trash-alt"></i></a></li>
                                                        </ul>
                                                      </td>
                                                  </tr>
                                                  <?php $i++; }} ?>
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="row justify-content-center">
                                            <div class="col-12 text-center">
                                            <?php 
                                            if(!empty($Mjob)){
                                            echo $pager->links();
                                            }
                                            ?>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                          <div class="tab-pane fade show" id="changePassword" role="tabpanel" aria-labelledby="tab-03">
                            <form class="postjob-form"  method="post" id="changeTHepassword">
                                <div class="box">
                                    <div class="box-header">
                                        <h4><i class="login-icon fas fa-key pe-2"></i> Change Password</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="bg-white login-register justify-content-center">
                                            <div class="row">
                                                <div class="form-group col-sm-6 mb-3">
                                                    <label class="form-label">Old Password </label>
                                                    <input type="password" name="oldpassword" value="<?php echo set_value('oldpassword');?>" id="oldpassword" class="form-control">
                                                 <span class="errormsg" id= oldpassword_error_msg></span>
                                                 <span class="message"></span>
                                                </div>
                                                <div class="form-group col-sm-6 mb-3">
                                                    <div class="forget-pass-btn">
                                                    <input type="reset" onclick="myforfunction()" value="Forget Password"></div>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="password2">New Password</label>
                                                    <input type="password" name="newpassword" value="<?php echo set_value('password');?>" id="newpassword" class="form-control">
                                                <span class="errormsg" id= password_error_msg></span>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="password2">Confirm Password</label>
                                                    <input type="password" name="confirmpassword" value="<?php echo set_value('confirmpassword');?>" id="confirmpassword" class="form-control">
                                                     <span class="errormsg" id= confirm_error_msg></span>
                                                </div>
                                                <div class="form-group col-md-12 mt-2 mt-lg-3 mb-3 text-center">
                                                    <input class="btn btn-secondary main-btn" type="submit" value="Update">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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


<?= $this->include('recruiter-footer') ?>

<!--=================================
Add Manage sub users  Modal Popup -->

<div class="modal  modal-right popup-modal show" id="AddSubForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Add Manage Sub Users</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
        <span id="adduser"></span>
      <div class="modal-body">
        <form class="" method="post" id="formmanage">
             <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="firstname">First Name</label>
            <input type="text" class="form-control" value="" placeholder="First name" name="first_name">
            </div>
             <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="lastname">Last Name</label>
            <input type="text" class="form-control" value="" placeholder="Last Name" name="last_name">
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="Username">Designation</label>
            <input type="text" class="form-control" name="designation">
            </div>
             <div class="form-group col-md-12 mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email_id" id="emailId">
             <div class='error_field' id='email_error'></div>
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label">Contact No.</label>
            <input type="tel" maxlength="12"  class="form-control" name="contact_no">
            </div>
                <div class="form-group col-md-12 mb-3">
                <label class="form-label" for="firstname">Status</label>
                <select id="status" name="status" class="form-control basic-select">
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
                </select>
                </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="firstname">Services Allocated</label>
             <div class="row">
             <div class="col-md-6 mb-3">
                <input type="checkbox"  name="service_resume"  value="1">
                <label for="coding">Search Job</label>
                </div>
                <div class="col-md-6 mb-3">
                <input type="checkbox" name="service_whatsapp" value="1">
                <label for="music">Post Jobs</label>
                </div>
                </div>
            </div>
           <div class="form-group col-md-12 mb-3">
            <label class="form-label">Password </label>
            <input type="password" class="form-control" name="password" id="password">
            <div class='error_field' id='password_error'></div>
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="confirmpass">
            <div class='error_field' id='confirm_error'></div>
            </div>
          <div class="text-center">
              <div class="form-group col-md-12 mt-5 mb-3">
                  <ul class="list-unstyled d-flex align-items-center justify-content-center">
                      <li class="text-center me-4">
                          <input class="btn btn-primary main-btn" type="submit" value="Submit">
                      </li>
                      <li class="text-left">
                        <input class="btn btn-secondary main-btn" type="button" id="btnclosed" value="Cancel" data-bs-dismiss="modal" aria-label="Close">
                      </li>
                  </ul>
              </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!--=================================
Edit Manage  Modal Popup -->
<div class="modal  modal-right popup-modal show" id="EditSubForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Edit Manage Sub Users</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
          <?php if(!empty(session()->getFlashdata("success"))): ?>
          <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata("success") ?>
          </div>
          <?php endif; ?>
      <div class="modal-body">
        <form class="" method="post" id="Updateform">
             <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="firstname">First Name</label>
            <input type="text" class="form-control" value="" placeholder="First name" name="first_name" id="firstname">
            </div>
             <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="lastname">Last Name</label>
            <input type="text" class="form-control" value="" placeholder="Last Name" name="last_name" id="lastname">
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="Username">Designation</label>
            <input type="text" class="form-control" name="designation" id="Designation">
            </div>
             <div class="form-group col-md-12 mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email_id" id="email_Id">
             <div class='error_field' id='email_error'></div>
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label">Contact No.</label>
            <input type="tel" class="form-control"  maxlength="12"  name="contact_no" id="contact_no">
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="firstname">Status</label>
            <select id="getstatus" name="status" class="form-control basic-select">
            </select>
            </div>
            <div class="form-group col-md-12 mb-3">
            <label class="form-label" for="firstname">Services Allocated</label>
            <div class="row">
                
                  <div id="resumeid" class= "col-md-6 mb-3"></div>
                <div id='whatsappid' class= "col-md-6 mb-3"></div>
    
                </div>
            </div>
           <div class="form-group col-md-12 mb-3">
            <label class="form-label">Password </label>
            <input type="password" class="form-control" name="password" id="password_old">
            <div class='error_field' id='password_error'></div>
            </div>
            <input type="hidden" name="id" id="userid">
          <div class="text-center">
              <div class="form-group col-md-12 mt-5 mb-3">
                  <ul class="list-unstyled d-flex align-items-center justify-content-center">
                      <li class="text-center me-4">
                          <input class="btn btn-primary main-btn" type="submit" value="Submit">
                      </li>
                      <li class="text-left">
                        <input class="btn btn-secondary main-btn" type="submit" id="btnclosed" value="Cancel" data-bs-dismiss="modal" aria-label="Close">
                      </li>
                  </ul>
              </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!--!--========Delete model=====-->
<div class="modal  modal-right popup-modal show" id="deletepopup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body ">
            <div class="delete-btn">
                <h2>Do you want to delete ?</h2>
                <input type="hidden" id="delid" name="id" value="">
                <ul class="list-unstyled">
                     <li><input class="btn btn-secondary" type="button" id="delete" value="Delete" onclick="mydeletfunction()"></li>
                     <li><input class="btn btn-primary-dark" type="button" value="Cancel" id="btnclosed" data-bs-dismiss="modal" aria-label="Close"></li>
                </ul>
            </div>
      </div>
    </div>
  </div>
</div>




<!--=================================
FORGOT Modal Popup -->
<div class="modal  modal-right popup-modal show" id="forgetpopup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Forget password</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
          <?php if(!empty(session()->getFlashdata("success"))): ?>
          <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata("success") ?>
          </div>
          <?php endif; ?>
      <div class="modal-body">
        <form class="" method="post" id="MyForm">
          <!--general info-->
          <div class="box">
              
              <div class="box-body edit">
                  
                    <input type="hidden" name="id" id="updateid">
                      <div class="form-group col-md-12 mb-3">
                          <label>Email Address<em class="text-danger">*</em></label>
                          <input type="text" id="email" name="email"  id="email" class="form-control" placeholder="Enter  Email address">
                        <div class='error_field' id='email_error_msg'></div>
                      
                      </div>
                   
              <div class="form-group col-md-12 mt-4 mb-3">
                  <ul class="list-unstyled d-flex align-items-center justify-content-center">
                      <li class="text-center me-4">
                          <input class="btn btn-primary main-btn" onclick=myfunctionforgot(this.value); type="button" value="Submit">
                      </li>
                      <li class="text-left">
                        <input class="btn btn-secondary main-btn" type="button" id="btnclosed" value="Cancel" data-bs-dismiss="modal" aria-label="Close">
                      </li>
                  </ul>
              </div>
         
                     
                </div>   
            </div>
        </div>  
    </div>
    </div>
</div>

<!--=================================
FORGOT Modal Popup Modal Popup -->


<script>
  function myforfunction(){
     $("#forgetpopup").modal('show');           
  }
</script>

<script>
  function myfunctionforgot(){
     var email = $('#email').val();
     if (email == '') {
    $('#email_error_msg').html("Email address cannot be empty");
    $('#email_error_msg').parent().show();
    $("#email_error_msg").css("color", "red");
    return false;
    }else{
        $("#email_error_msg").html("");
    }
    if(IsEmail(email)==false){
                $('#email_error_msg').html("Email address invalid");
                $('#email_error_msg').show();
                return false;
            }else{
        $("#email_error_msg").html("");
    }
     if(user_email(email)==false){
                $('#email_error_msg').html("Email address invalid");
                $('#email_error_msg').show();
                return false;
            }else{
        $("#email_error_msg").html("");
    }
            
     
  }
    function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
    return false;
    }else{
    return true;
    }
    }
    
    function user_email(email){
    var url= '<?php echo base_url();?>';
     if(email!=''){
    $.ajax({
    type: "get",
     url: url +'/AjexCallback/check_email',
    data: {email:email},
     dataType:'json',
    success: function(response){
      if(response.success==true){
                               $('#email_error_msg').html(response.msg);
                                $('#email_error_msg').show();
                                $('#email_error_msg').css("color", "green");
                                setTimeout(function () {
                                window.location.href = '<?php echo base_url('logout');?>';                 
                                }, 2000);
         }
         else if(response.success==false){
                              $('#email_error_msg').html(response.msg);
                                $('#email_error_msg').show();
                                $('#email_error_msg').css("color", "red");
                            }
    }
    });
  }

 }
    
</script>

<!--=================================
Javascript -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->

<script>
  $(document).ready(function () {
    $('#states').on('change', function () {  
      var state= this.value;
      var name= '<?php if(!empty($user['city_name'])){echo $user['city_name'];}?>';
      var city_id= '<?php if(!empty($user['City'])){echo $user['City'];}?>';
      if(state >0){
      var url= '<?php echo base_url('cities');?>';
          $.ajax({
                    type: "get",
                    url:  url,
                    data:{state:state},
                    dataType:'json',
                    success:function(res){
                     console.log('res',res);
                     var html="";
                    var html= '<option >Select city</option>'
                      var html= '<option value="'+city_id+'">'+name+'</option>';
                     for(var count=0; count < res.length; count++){               
                   html+= '<option value="'+res[count]['id']+'">'+res[count]['name']+'</option>';
                     }
                     $('#city').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });
              }     

    }).change();
});
</script>

<!--change the password-->
<script>
 $(function(){
 $("#password_error_msg").hide();
 $("#confirm_error_msg").hide();
 $('#error_old_password').hide(); 

  var error_password= false;
  var error_confirm_password= false;
  var error_old_password= false;

   $("#newpassword").focusout(function(){
      new_password();
     });

   $("#confirmpassword").focusout(function(){
      confirm_password();
     });
     
     $("#oldpassword").focusout(function(){
      oldpassword();
     });
     
     
     function oldpassword(){
  var url= '<?php echo base_url();?>';
  var oldpassword=$("#oldpassword").val();
  
    $.ajax({
    type: "post",
     url: url+'/RecruiterProfile/old_password',
    data: {oldpassword:oldpassword},
    
    success: function(res)
    {
    if (res.success == true) {
                              $('#oldpassword_error_msg').html(res.msg);
                                $('#oldpassword_error_msg').show();
                                $('#oldpassword_error_msg').css("color", "green");
                               error_old_password= true;
                            } else if (res.success == false) {
                                $('#oldpassword_error_msg').html(res.msg);
                                $('#oldpassword_error_msg').show();
                                $('#oldpassword_error_msg').css("color", "red");
                                 error_old_password= false;
                            }
  }
    });


 }

   function new_password(){
  var password_length= $("#newpassword").val().length;
  if(password_length < 7 || password_length > 20){
    $("#password_error_msg").html("At least 8 characters");
    $('#password_error_msg').css("color", "red");
    $("#password_error_msg").show();
    error_password= true;
  }else {
    $("#password_error_msg").hide();
  }
  }
 
 function confirm_password(){
  var password= $("#newpassword").val();
  var confirm_password=$("#confirmpassword").val();
  if(password != confirm_password){
    $("#confirm_error_msg").html("Password don't match");
    $('#confirm_error_msg').css("color", "red");
    $("#confirm_error_msg").show();
    error_confirm_password= true;

  }else{
    $("#confirm_error_msg").hide();
  }

 }
 
 $("#changeTHepassword").submit(function(event){
     event.preventDefault();
     error_password= false;
     error_confirm_password= false;
    
  new_password();
  confirm_password();
  oldpassword();
 var url= '<?php echo base_url();?>';
  var newpassword= $("#newpassword").val();
  if(error_password== false && error_confirm_password== false &&  error_old_password== true){
     $.ajax({
    type: "post",
     url: url+'/RecruiterProfile/changepassword',
    data: {newpassword:newpassword},
    success: function(res)
    {
        console.log(res);
        alert(res.msg);        
         window.location.href = '<?php echo base_url('logout');?>';
                            
  }
                     
    });

  }else{
    return false;
  }

});

 });
 
</script>





<!--manage job posting-->
<script>
    function addfunction(){
         $("#AddSubForm").modal('show');    
    }
</script>
<!--Add manage data-->
<script>
    $(document).ready(function() {
    $('#formmanage').on('submit', function(event){ 
      event.preventDefault();
      var email = $('#emailId').val();
     if (email == '') {
    $('#email_error').html("Email address cannot be empty");
    $('#email_error').parent().show();
    $("#email_error").css("color", "red");
    return false;
    }else{
        $("#email_error").html("");
    }
    if(IsEmail(email)==false){
                $('#email_error').html("Email address invalid");
                $('#email_error').show();
                return false;
            }else{
        $("#email_error").html("");
    }
    function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
    return false;
    }else{
    return true;
    }
    } 
// new password
     var password= $("#password").val();
   var password_length= $("#password").val().length;
  if(password_length < 7 || password_length > 20){
    $("#password_error").html("At least 8 characters");
    $("#password_error").show();
     $('#password_error').css("color", "red");
     return false;
  }else {
    $("#password_error").html("");
  }
  //confirm password
  var confirm_password=$("#confirmpass").val();
  if(password != confirm_password){
    $("#confirm_error").html("Password don't match");
    $("#confirm_error").show();
    $('#confirm_error').css("color", "red");
     return false;

  }else{
    $("#confirm_error").hide();
  }
  // check email
  var url='<?php echo base_url();?>';
    // ajext submit data
    $.ajax({
    type: "post",
    url: url +'/RecruiterProfile/ManageUsers',
    data: $(this).serialize(),
    dataType:'json',
    success: function(response){
    if(response.success==false){
      $('#email_error').html("Email address invalid");
    $('#email_error').parent().show();
      return false;
    }else{
    $('#adduser').html("New User has been added");
    $("#adduser").show();
    $('#adduser').css("color", "green"); 
    alert("New User has been added");
     window.location.href = '<?php echo base_url('profile');?>';
    }
        
    },
    });
    });    
    });
</script>

<!--EdiT sub manage users-->
<script>
    function MyEditManage(id){
    var url= '<?php echo base_url('RecruiterProfile/GetManageUsers');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){ 
                        console.log(data);
                         var val=""; 
                       $('#userid').val(data['manage']['id']);
                       $('#status').val(data['manage']['status']);
                       $('#lastname').val(data['manage']['client_last_name']);
                       $('#firstname').val(data['manage']['client_first_name']);
                       $('#Designation').val(data['manage']['designation']);
                       $('#contact_no').val(data['manage']['contact_no']);
                       $('#email_Id').val(data['manage']['email_address']);
                        var checkedresume= data['manage']['service_resume'];
                        var html ="";
                        if(checkedresume == 1){
                            html+='<div>';
                            html+='<input type="checkbox"  name="service_resume"   value="1" checked="checked"';
                            html+='<label for="resume">Search Job</label>';
                            html+='</div>';
                        }else if(checkedresume == 0){
                            html+='<div>';
                            html+='<input type="checkbox"  name="service_resume"   value="1" >';
                            html+='<label for="resume">Search Job</label>';
                            html+='</div>';
                        }
                         $("#resumeid").html(html);
                        var checkedwhats= data['manage']['service_whatsapp'];
                        var html2 ="";
                        if(checkedwhats == 0){
                            html2+='<div>';
                            html2+='<input type="checkbox"  name="service_whatsapp"   value="1" ';
                            html2+='<label for="whatsapp">Post Jobs</label>';
                            html2+='</div>';
                        }else if(checkedwhats == 1){
                            html2+='<div>';
                            html2+='<input type="checkbox"  name="service_whatsapp"   value="1" checked>';
                            html2+='<label for="whatsapp">Post Jobs</label>';
                            html2+='</div>';
                        }
                         $("#whatsappid").html(html2);
                         
                         var getstatus='';
                          getstatus += '<option value="'+ data['manage']['status'] +'">'+ data['manage']['status'] +'</option>';
                          getstatus += '<option>----Please Select----</option>';
                            getstatus += '<option value="active">Active</option>';
                            getstatus +='<option value="deactive">Deactive</option>'
                              $('#getstatus').html(getstatus);   
                              $("#EditSubForm").modal('show');   
            },
            error:function(err){
            console.log('Erro',err)
            }
            }); 
    }
</script>

<script>
   $(document).ready(function() {
    $('#Updateform').on('submit', function(event){ 
      event.preventDefault(); 
var formData = new FormData(this);
  var url= '<?php echo base_url('RecruiterProfile/UpdateManageUsers');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success:function(res){
                     alert("successfully updated");                     
                   window.location.reload();
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  });
  });

</script>

<!--// delete function -->

<script>
  function MyDelFunction(id){
    var url= '<?php echo base_url('RecruiterProfile/GetManageUsers');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                      var val="";
                      $('#delid').val(data['manage']['id']);
                       $("#deletepopup").modal('show');           
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
 function mydeletfunction(){
  var id  =$('#delid').val();
  var url= '<?php echo base_url('RecruiterProfile/DeleteManagedata');?>'
  $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                     console.log(true);
                     window.location.reload();
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
  });
}
</script>

