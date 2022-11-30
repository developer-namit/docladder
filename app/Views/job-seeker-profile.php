
<?= $this->include('jobseeker-header') ?>
<style>
    .slt-location .select2-container{
        padding-left:0;
    }
    .recruiter-job-posting .select2-container--default .select2-selection--multiple .select2-selection__rendered{
        padding-left:20px;
    }
    .recruiter-job-posting .select2-container--default .select2-selection--multiple .select2-selection__choice{
        margin-bottom:0;
    }
    .bolddata{
         font-weight: bold;
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
<!--=================================
Header -->

<!--=================================
Register -->
<section class="space-ptb-outer bg-light recruiter-job-posting">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="row">
          
          <div class="col-lg-4"></div>
          <div class="col-lg-8 text-center">
             <h2 class="main-site-title sub-title-bg mb-3"><span><?= esc($title_name);?></span></h2>
            </div>  
        </div>
      </div>
    </div>
    <div class="row justify-content-center job-seeker-profile">
        <div class="col-lg-10">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div id="leftcol_item" class="mb-3">
                        <?php if(!empty($profile['upload_image'])){?>
                  <div class="user_dashboard_pic"> 
                      <img alt="user photo" src="<?=base_url('public/uploads/uploadImage/');?>/<?php  echo $profile['upload_image'];?>"> 
                      <span class="user-photo-action">
                        <?php
                  if(!empty($profile['first_name'])){ echo $profile['first_name'];}?></span> 
                  </div>
                  <?php }else{?>
                  <div class="user_dashboard_pic"> 
                     <img alt="user photo" src="<?=base_url('/public/assets');?>/images/user-profile.png"> 
                      <span class="user-photo-action">
                        <?php
                  if(!empty($profile['first_name'])){ echo $profile['first_name'];}?></span> 
                  </div>
                  
                  <?php }?>
                </div>
                    <div class="dashboard_nav_item">
                      <form method="post" action="" enctype="multipart/form-data" id="myuploadform" >
                      <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
                        <?php if(!empty($profile['upload_image'])){ ?>
                          <!--// edit upload images-->
                         <li class="nav-item">
                          <a class="nav-link active" id="uploadimg" data-bs-toggle="tab" href="" role="tab" aria-controls="editProfile" aria-selected="true" onclick ="editimages('<?php if(!empty($profile['id'])){ echo $profile['id'];}?>');">
                          <i class="login-icon fas fa-file-image"></i><?= esc($editupload);?></a>
                          <input type="file" name="myfile" id="myFile" style="display: none;"  accept="image/*">
                                </li>
                             <span id="alertMsg"></span>    
                      <?php }else{?>
                        <!--//upload images-->
                        <li class="nav-item">
                          <a class="nav-link active" id="uploadimg" data-bs-toggle="tab" href="" role="tab" aria-controls="editProfile" aria-selected="true" onclick ="uploadimgage('<?php if(!empty($profile['id'])){ echo $profile['id'];}?>');">
                          <i class="login-icon fas fa-file-image"></i><?= esc($upload);?></a>
                          <input type="file" name="myfile" id="myFile" style="display: none;"  accept="image/*">
                          
                        </li>
                         <span id="alertMsg"></span>
                        <?php }?>
                         <?php if(!empty($profile['upload_resume'])){ ?>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-02" data-bs-toggle="tab" href="" onclick ="Editresume();"  role="tab" aria-controls="edit" aria-selected="false">
                            <i class="login-icon fas fa-edit"></i><?= esc($editresume);?></a>
                            <input type="file" name="editresume" id="editresume" style="display: none;" accept=".doc,.pdf,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf">
                        </li>
                         <span id="alertMsg2"></span>
                        <?php }else{?>
                         <li class="nav-item">
                          <a class="nav-link" id="tab-03" data-bs-toggle="tab" href="" onclick ="Resumeupdate('<?php if(!empty($profile['id'])){ echo $profile['id'];}?>')" role="tab" aria-controls="upload" aria-selected="false">
                          <i class="login-icon fas fa-upload"></i><?= esc($uploadresume);?></a>
                          
                          <input type="file" name="resume" id="resume" style="display: none;" accept=".doc,.pdf,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf">
                        </li>
                         <span id="alertMsg2"></span>
                        <?php }?>
                    
                        <li class="nav-item premium-btn">
                          <a class="" href="<?= base_url('JobseekerPayment')?>" ><?= esc($getpremium);?></a>
                          
                        </li>
            
                         <li class="nav-item premium-btn">
                          <a class="" href="<?= base_url('Applied')?>" >Applied</a>
                        </li>
                        
                      </ul>
                    </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="postjob-form" enctype="multipart/form-data" method="post" id="updateform" action="">
                 <?php   $validation =  \Config\Services::validation(); ?>
                      <div class="box-header">
                        <h4><i class="fas flaticon-resume me-2"></i><?= esc($heading);?></h4>
                      </div>
                        <div class="box">
                            <div class="box-body">
                                <div class="bg-white login-register justify-content-center">
                                  <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($firstname);?></label>
                                        <input type="text" name="first_name" id="firstname" class="form-control" value="<?php if(!empty($profile['first_name'])){ echo $profile['first_name'];}?>">
                                       <span id="name_error_msg"></span>
                                    </div>
                                    
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($email);?></label>
                                        <input type="email" name="email_id" class="form-control" value="<?php if(!empty($profile['email_id'])){ echo $profile['email_id'];}?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($Contact);?></label>
                                        <input type="tel" name="contact_number" maxlength="10" class="form-control numberonly" value="<?php if(!empty($profile['contact_no'])){ echo $profile['contact_no'];}?>">
                                    </div>
                                    
                                    <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                                        <label class="form-label">Current  Location <em class="text-danger">*</em></label>
                    
                                        <select class="form-control jquery-select2 slt-location cuurentLocationSel" name="state[]" id="states" autocomplete="off" multiple>
                                            <option disabled>Select Location...</option>

                                            <optgroup><option value="NI" <?php if(in_array('NI',$locationp['current_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in North India</option></optgroup>
                                            <optgroup><option value="EI" <?php if(in_array('EI',$locationp['current_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in East India</option></optgroup>
                                            <optgroup><option value="WI" <?php if(in_array('WI',$locationp['current_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in West India</option></optgroup>
                                            <optgroup><option value="SI" <?php if(in_array('SI',$locationp['current_data_group_ids'])){ echo "selected"; }  ?>>Anywhere in South India</option></optgroup>
                                            <?php 
                                                if(!empty($margedata)){
                                                    foreach($margedata as $val){
                                                        
                                                        if(in_array($val['id'],$locationp['current_data_state_ids'])){
                                                            $selected = "selected";
                                                        }else{
                                                            $selected = "";
                                                        }
                                            ?>
                                                <optgroup><option value="state_<?= $val['id'];?>" <?= $selected ?>><?= strtolower($val['name']);?></option></optgroup>
                                            <?php 
                                                if(!empty($val['city'])){
                                                    foreach($val['city'] as $cities){
                                                        
                                                        if(in_array($cities['id'],$locationp['current_data_city_ids'])){
                                                            $selected = "selected";
                                                        }else{
                                                            $selected = "";
                                                        }
                                            ?>
                                                <option value="city_<?= $cities['id'];?>" <?= $selected ?> > <?= strtolower($cities['name']);?></option>
                                            <?php } } ?>
                                                
                                                <?php 
                                                    if(in_array('other_'.$val['id'],$locationp['current_other_ids'])){
                                                        $selected = "selected";
                                                    }else{
                                                        $selected = "";
                                                    }
                                                ?>
                                                <optgroup><option value="other_<?= $val['id'] ?>" type="others" mainId="<?= $val['id'] ?>" mainState="<?= $val['name'] ?>" <?= $selected ?>><?= strtolower($val['other']);?></option></optgroup>
                                            <?php } } ?>     
                                      </select>
                                      
                                      <div class="child">
                                          <?php 
                                            if(!empty($locationp['current_other'])){ 
                                                foreach($locationp['current_other'] as $current_other){
                                          ?>
                                            <div id="Mainstatesother_<?= $current_other['main_id'] ?>" class="mb-3 mt-3 col-md-12">
                                                <label class="form-label"><?= "Others In ".$current_other['name'] ?></label>
                                                <input type="text" class="form-control" name="other[states][<?= $current_other['main_id'] ?>]" value="<?= $current_other['other']?>">
                                            </div>
                                         <?php }  } ?>
                                      </div>
                                          
                                    </div>
                  
                                      <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                                          <label class="form-label">Preferred Location <em class="text-danger">*</em></label>
                                         <select class="form-control jquery-select2 slt-location prefferedLocationSel" name="location[]" id="location" autocomplete="off" multiple>
                                             
                                            
                                            <option disabled>Select Location...</option>

                                            <optgroup><option value="NI" <?php if(in_array('NI',$locationp['preffered_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in North India</option></optgroup>
                                            <optgroup><option value="EI" <?php if(in_array('EI',$locationp['preffered_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in East India</option></optgroup>
                                            <optgroup><option value="WI" <?php if(in_array('WI',$locationp['preffered_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in West India</option></optgroup>
                                            <optgroup><option value="SI" <?php if(in_array('SI',$locationp['preffered_data_group_ids'])){ echo "selected"; }  ?> >Anywhere in South India</option></optgroup>
                                            <?php 
                                                if(!empty($margedata)){
                                                    foreach($margedata as $val){
                                                        
                                                        if(in_array($val['id'],$locationp['preffered_data_state_ids'])){
                                                            $selected = "selected";
                                                        }else{
                                                            $selected = "";
                                                        }
                                            ?>
                                                <optgroup><option value="state_<?= $val['id'];?>" <?= $selected ?>><?= strtolower($val['name']);?></option></optgroup>
                                            <?php 
                                                if(!empty($val['city'])){
                                                    foreach($val['city'] as $cities){
                                                        
                                                        if(in_array($cities['id'],$locationp['preffered_data_city_ids'])){
                                                            $selected = "selected";
                                                        }else{
                                                            $selected = "";
                                                        }
                                                        //$selected ="";
                                            ?>
                                                <option value="city_<?= $cities['id'];?>" <?= $selected ?>> <?= strtolower($cities['name']);?></option>
                                            <?php } } ?>
                                                
                                                <?php 
                                                    if(in_array('other_'.$val['id'],$locationp['preffered_other_ids'])){
                                                        $selected = "selected";
                                                    }else{
                                                        $selected = "";
                                                    }
                                                ?>
                                                
                                                <optgroup><option value="other_<?= $val['id'] ?>" type="others"  mainId="<?= $val['id'] ?>"  mainState="<?= $val['name'] ?>" <?= $selected ?>><?= strtolower($val['other']);?></option></optgroup>
                                            <?php } } ?>                                                         
                                        </select>
                                             <?php if ($validation->getError('location')): ?>
                                                <div class="invalid" style="color:red;">
                                                <?= $validation->getError('location') ?>
                                                </div>                                
                                                <?php endif; ?>
                                                
                                                <div class="child">
                                                    <?php 
                                                        if(!empty($locationp['preffered_other'])){ 
                                                            foreach($locationp['preffered_other'] as $preffered_other){
                                                      ?>
                                                        <div id="Mainlocationother_<?= $preffered_other['main_id'] ?>" class="mb-3 mt-3 col-md-12">
                                                            <label class="form-label"><?= "Others In ".$preffered_other['name'] ?></label>
                                                            <input type="text" class="form-control" name="other[location][<?= $preffered_other['main_id'] ?>]" value="<?= $preffered_other['other']?>">
                                                        </div>
                                                     <?php }  } ?>
                                                </div>
                                      </div>
                  
                                    
                                  
                                      
                                    <div class="form-group mb-3 col-md-6 datetimepickers">
                                        <label class="form-label"><?= esc($dOB);?></label>
                                        <div class="input-group date" id="datetimepicker-01" data-target-input="nearest">
                                          <input type="text" name="dob" class="form-control datetimepicker-input" value="<?php if(!empty($profile['birthday'])){ echo $profile['birthday'];}?>" data-target="#datetimepicker-01">
                                          <div class="input-group-append d-flex" data-target="#datetimepicker-01" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 select-border mb-3">
                                        <label class="form-label"><?= esc($gender);?></label>
                                        <select class="form-control basic-select" name="gender">
                                          <?php if(isset($profile['gender']) && $profile['gender']=='male'){?>
                                              <option value="male" selected>Male</option>
                                              <option value="female">Female</option>
                                               <option value="male">Other</option>       
                                           <?php }else if(isset($profile['gender']) && $profile['gender']=='female'){?>
                                              <option value="female" selected>Female</option>
                                              <option value="male">Male</option>
                                              <option value="male">Other</option>      
                                                  <?php }else if(isset($profile['gender']) && $profile['gender']=='other'){?>
                                              <option value="other" selected>Other</option>
                                              <option value="female">Female</option>
                                              <option value="male">Male</option>       
                                          <?php }else{?>
                                              <option value="female">Female</option>
                                              <option value="male">Male</option>
                                              <option value="male">Other</option>
                                              <?php }?>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!--education-->
                        <div class="box-header">
                          <h4><i class="flaticon-businessman me-1"></i><?= esc($career_profile);?></h4>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <div class="bg-white login-register justify-content-center">
                                  <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($job_title);?></label>
                                        <input type="text" name="job_title" id='job_title' class="form-control" value="<?php if(!empty($profile['job_title'])) { echo $profile['job_title']; } else{ echo set_value('job_tile'); } ?>">
                                        <span id="name_error_msg"></span>
                                    </div>
                                    <div class="form-group col-md-6 select-border mb-2">
                                        <label><?= esc($key_skills);?></label>
                                        <input type="text" name="key_skills" id="key_skills" placeholder="Enter Key Skills" class="form-control" value="<?php if(!empty($profile['key_skills'])){echo $profile['key_skills']; } else{ echo set_value('key_skills'); } ?>">
                                        <span id="key_skill_error_msg"></span>
                                    </div>
                                    <div class="form-group col-md-6 select-border mb-3">
                                        <label><?= esc($job_function);?><em class="text-danger">*</em></label>
                                        <select class="form-control basic-select" id="jobfunction"  name="job_function" onchange="getjobfunction(this)">
                                     <option>select here</option>
                                         <?php 
                                         if(!empty($skill)){
                                          foreach($skill as $skills){
                                             if(!empty($profile['job_function'] == $skills['designation_id'])) {?>
                                            <option value="<?= $skills['designation_id'];?>" selected="selected"><?= $skills['designation'];?></option>
                                         <?php }else {?>
                                          
                                          <option value="<?php echo $skills['designation_id'];?>"><?php echo $skills['designation'];?></option>
                                         <?php
                                        }    
                                        }
                                       }?>
                                         </select>
                                         <span id="error_skill"></span>
                                    </div>
                                    <div class="form-group col-md-6 select-border mb-3">
                                        <label><?= esc($area_of_specialization);?><em class="twext-danger">*</em></label>
                                        <select class="form-control basic-select" name= "specialization" id="specialization">
                                          <?php if(!empty($profile['specialization_name']) && !empty('specialization')){?>
                                        <option value="<?= $profile['specialization'];?>"><?= $profile['specialization_name'];?></option>
                                        <?php }?>
                                        </select>
                                       
                                    </div>
                                     
                                    <div class="form-group col-md-6 select-border mb-3">
                                        <label>Experience Year<em class="text-danger">*</em></label>
                                        <select class="form-control basic-select" name="min_experience" id="min_experience">
                                                <option value="" selected="selected">Select Value</option>
                                                <option value="0" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '0'){echo("selected");}?>>0 Experience</option>
                                                <option value="1" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                <option value="2" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                <option value="3" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                <option value="4" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                <option value="5" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                <option value="6" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                <option value="7" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                <option value="8" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                <option value="9" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                <option value="10" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                <option value="11" <?php if(isset($profile['min_experience']) && $profile['min_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                </select>
                                    <span id="min_error_msg"></span>            
                                    </div>
                                    <div class="form-group col-md-6 select-border mb-3">
                                        <label>Experience Month<em class="text-danger">*</em></label>
                                        <select class="form-control basic-select" name="max_experience" id="max_experience">
                                                <option value="" selected="selected">Select Value</option>
                                                <option value="1" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '1'){echo("selected");}?>>1M Experience</option>
                                                <option value="2" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '2'){echo("selected");}?>>2M Experience</option>
                                                <option value="3" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '3'){echo("selected");}?>>3M Experience</option>
                                                <option value="4" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '4'){echo("selected");}?>>4M Experience</option>
                                                <option value="5" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '5'){echo("selected");}?>>5M Experience</option>
                                                <option value="6" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '6'){echo("selected");}?>>6M Experience</option>
                                                <option value="7" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '7'){echo("selected");}?>>7M Experience</option>
                                                <option value="8" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '8'){echo("selected");}?>>8M Experience</option>
                                                <option value="9" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '9'){echo("selected");}?>>9M Experience</option>
                                                <option value="10" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '10'){echo("selected");}?>>10M Experience</option>
                                                <option value="11" <?php if(isset($profile['max_experience']) && $profile['max_experience'] == '11'){echo("selected");}?>>11M Experience</option>
                                                </select>
                                    
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($current_employer);?></label>
                                        <input type="text" name="current_employer" class="form-control" value="<?php if(!empty($profile['current_employer'])){ echo $profile['current_employer'];} else{ echo set_value('current_employer');} ?>" onkeydown="return /[a-z]/i.test(event.key)">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($current_designation);?></label>
                                        <input type="text" name="current_designation" class="form-control" value="<?php if(!empty($profile['current_designation'])){ echo $profile['current_designation'];} else{ echo set_value('current_designation');} ?>" onkeydown="return /[a-zA-Z\s]+$/i.test(event.key)">
                                    </div>
                                    <div class="form-group col-md-6 mb-3 mb-lg-2">
                                        <label><?= esc($current_ctc);?><em class="text-danger">*</em> <small>Yearly( <?= esc($in_lacs);?> ) </small></label>
                                        <div class="input-group">
                                          <div class="input-group-prepend d-flex">
                                            <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                          </div>
                                          <input type="text" class="form-control" id="current_ctc" name="current_ctc" value="<?php if(isset($profile['current_ctc'])){ echo $profile['current_ctc'];} else{ echo set_value('current_ctc');} ?>">
                                        
                                        </div>
                                        <span id="error_current_ctc"></span>
                                    </div>
                                    <div class="form-group col-md-6 mb-3 mb-lg-2">
                                        <label><?= esc($expected_ctc);?><em class="text-danger">*</em> <small>Yearly( <?= esc($in_lacs);?>)</small></label>
                                        <div class="input-group">
                                          <div class="input-group-prepend d-flex">
                                            <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                          </div>
                                          <input type="text" class="form-control" id="expected_ctc" name="expected_ctc" value="<?php if(isset($profile['expected_ctc'])){ echo $profile['expected_ctc'];} else{ echo set_value('expected_ctc');} ?>">
                                            
                                        </div>
                                        <span id="error_expected_ctc"></span>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--company address-->
                        <div class="box-header">
                          <h4><i class="flaticon-mortarboard me-2"></i><?= esc($education);?></h4>
                        </div>
                        <div class="box mb-4">
                            <div class="box-body">
                                <div class="bg-white login-register justify-content-center">
                                  <div class="row">
                                    <div class="form-group col-md-12 mb-3">
                                        <label><?= esc($highest_qualification);?><em class="text-danger">*</em></label>
                                        <input type="text" class="form-control" name="highest_qualification" value="<?php if(!empty($profile['highest_qualification'])){ echo $profile['highest_qualification'];} else{ echo set_value('highest_qualification');} ?>">
                                    </div>
                                    <div class="form-group col-md-12 select-border mb-3">
                                        <label><?= esc($graduation);?> <em class="text-danger">*</em></label>
                                        <select class="form-control basic-select" name="graduation" id="graduation">
                                            <option value="">Select graduation</option>
                                                <?php if(!empty($graducate)){ foreach($graducate['education'] as $key=> $edu){  
                                                     if(isset($profile['graduation']) && $profile['graduation']== $key){
                                                            ?>
                                                    <option value="<?php echo $key;?>" selected="selected"><?php echo $edu;?></option>
                                                    <?php }else{?>
                                                    <option value="<?php echo $key; ?>"><?php echo $edu; ?></option>
                                                <?php }}}?>
                                                </select>
                                                <span id="graduation_error"></span>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($institute);?> </label>
                                        <input type="text" class="form-control" name="institute" value="<?php if(!empty($profile['institute'])){ echo $profile['institute'];} else{ echo set_value('institute');} ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($yearofpassing);?></label>
                                        <input type="text" name="year_of_passing"  maxlength="4" class="form-control" value="<?php if(!empty($profile['year_of_passing'])){ echo $profile['year_of_passing'];} else{ echo set_value('year_of_passing');} ?>">
                                    </div>
                                    <div class="form-group col-md-12 select-border mb-3">
                                        <label><?= esc($postgraduation);?></label>
                                        <select class="form-control basic-select" name="post_graducation">
                                             <option value="">Select Post graduation</option>
                                                <?php if(!empty($graducate)){ foreach($graducate['postgarduate'] as $key=> $edupost){  
                                                    if(isset($profile['post_graducation']) && $profile['post_graducation']== $key){
                                                            ?>
                                                    <option value="<?php echo $key;?>" selected="selected"><?php echo $edupost;?></option>
                                                    <?php }else{?>
                                                    <option value="<?php echo $key; ?>"><?php echo $edupost; ?></option>
                                                <?php }}}?>
                                                </select>                                        
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($institute);?></label>
                                        <input type="text" name="post_institute" class="form-control" value="<?php if(!empty($profile['post_institute'])){ echo $profile['post_institute'];} else{ echo set_value('post_institute');} ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($yearofpassing);?></label>
                                        <input type="text" name="post_passing_year" maxlength="4" class="form-control" value="<?php if(!empty($profile['post_passing_year'])){ echo $profile['post_passing_year'];} else{ echo set_value('post_passing_year');} ?>">
                                    </div>
                                    <div class="form-group col-md-12 select-border mb-3">
                                        <label><?= esc($superspecialty);?></label>
                                        <select class="form-control basic-select" name="super_specialty">
                                            <option value="">Select Super specialty</option>
                                                <?php if(!empty($graducate)){ foreach($graducate['specialty'] as $key=> $eduspecil){
                                                    if(isset($profile['super_specialty']) && $profile['super_specialty']== $key){
                                                        ?>
                                                <option value="<?php echo $key;?>" selected="selected"><?php echo $eduspecil;?></option>
                                                <?php }else{?>  
                                                <option value="<?php echo $key; ?>"><?php echo $eduspecil; ?></option>
                                                <?php }}}?>
                                                </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($institute);?> </label>
                                        <input type="text" name="specialty_institute" class="form-control" value="<?php if(!empty($profile['specialty_institute'])){ echo $profile['specialty_institute'];} else{ echo set_value('specialty_institute');} ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label><?= esc($yearofpassing);?></label>
                                        <input type="text" name="specialty_passing_year" maxlength="4" class="form-control" value="<?php if(!empty($profile['specialty_passing_year'])){ echo $profile['specialty_passing_year'];} else{ echo set_value('specialty_passing_year');} ?>">
                                    </div>
                                    <div class="form-group col-md-12 mt-3 mb-3">
                                    <?php if(!empty($profile['upload_resume'])){?>
                                      <div class="custom-file">
                                            <p class="m-auto align-self-center" id="uploadresume">
                                        <a href="<?=base_url('public/uploads/uploadResume');?>/<?=$profile['upload_resume'];?>" target="_blank" class="download-btn"  attributes-list download rel="noopener noreferrer" target="_blank">
                                      <i class="fa fa-upload me-2" ></i><?php echo $profile['upload_resume'];?></p>
                                      <input type="hidden" name="fileresume" value="<?php echo $profile['upload_resume'];?>" >
                                      <?php } ?>
                                        
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                          <div class="form-group col-md-12 mt-2 mb-2 mb-lg-3 text-center">
                                              <a class="btn btn-secondary main-btn" id="Updatedata"  href="#">Update</a>
                                        <!--<input class="btn btn-primary main-btn" type="submit" value="Submit">-->
                                    </div>
                                  </div>
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
<?= $this->include('jobseeker-footer') ?>
<!--=================================
Footer-->
<!-- // state data -->

<!-- //get Area of Specialization -->
<script>
  function getjobfunction(sel){  
      var skill= sel.value;
      var skill_names= '<?php if(!empty($profile['specialization_name'])){ echo $profile['specialization_name'];}?>';
       var skill_id= '<?php if(!empty($profile['specialization'])){ echo $profile['specialization'];}?>';
      if(skill >0){
      var url= '<?php echo base_url('RecruiterHome/getdata');?>';
          $.ajax({
                    type: "post",
                    url:  url,
                    data:{skill:skill},
                    dataType:'json',
                    success:function(res){
                     console.log('res',res);
                     var html="";
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
  }
    </script>
    <!-- //get designation -->
<script>
$(document).ready(function(){
function split( val ) {
return val.split( /,\s*/ );
}
function extractLast( term ) {
return split( term ).pop();
}
$('#key_skills').autocomplete({
      source: function (request, response){
        $.getJSON('<?php echo base_url('RecruiterHome/getdesignation');?>',{ term: extractLast(request.term)
      }, response);
    },
    focus: function() {
          return false;
      },
    select: function( event, ui ) {
        var terms = split( this.value );
        terms.pop();
        terms.push( ui.item.value );
        terms.push( "" );
        this.value = terms.join( ", " );
        return false;
    }          
  });
});
    </script>

    <script>
      function uploadimgage(id){
      $("input[id='myFile']").click();    
      $("#myFile").change(function(){

  var name = document.getElementById("myFile").files[0].name;
  var form_data = new FormData();
  form_data.append("file", document.getElementById('myFile').files[0]);
  var url='<?= base_url();?>';
  $.ajax({
    url: url+'/JobseekerProfile/uploadImages',
  method:"POST",
  data: form_data,
  contentType: false,
  cache: false,
  processData: false,
  dataType:'json',

  success:function(res)
  {
    if (res.success == true) {
                              $('#alertMsg').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "green");
                                 window.location.href = '<?php echo base_url('JobProfile');?>';
                            } else if (res.success == false) {
                                $('#alertMsg').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "red");
                             
                            }
                            setTimeout(function () {
                                $('#alertMsg').html('');
                                $('#alertMessage').hide();
                            }, 4000);
                            document.getElementById("myuploadform").reset();    
                            
  }
  });

});
    
    }
    
        $('.jquery-select2').on('select2:select', function (e) {
            var data = e.params.data;
            if(data.element.getAttribute('type') == 'others'){
                var selectedMainId = data.element.offsetParent.getAttribute('id');
                var selectedValue = data.id;
                
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
        
    </script>

  <!-- // upload resume   -->
  <script>
      function Resumeupdate(id){
      $("input[id='resume']").click();    
      $("#resume").change(function(){

  var name = document.getElementById("resume").files[0].name;
  var form_data = new FormData();
  form_data.append("file", document.getElementById('resume').files[0]);
  var url='<?= base_url('/JobseekerProfile/uploadresume');?>';
  $.ajax({
    url: url+'/JobseekerProfile/uploadresume',
  method:"POST",
  data: form_data,
  contentType: false,
  cache: false,
  processData: false,
  dataType:'json',

  success:function(res)
  {
    if (res.success == true) {
                              $('#alertMsg2').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg2').css("color", "green");
                                 alert('Update successfully');
                                window.location.href = '<?php echo base_url('JobProfile');?>';
                            } else if (res.success == false) {
                                $('#alertMsg2').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg2').css("color", "red");
                             
                            }
                            setTimeout(function () {
                                $('#alertMsg2').html('');
                                $('#alertMessage').hide();
                            }, 4000);
                            document.getElementById("myuploadform").reset();    
                            
  }
  });

});
    
    }
    </script>
    <!-- // edit resume -->
    <script>
      function Editresume(){
      $("input[id='editresume']").click();    
      $("#editresume").change(function(){
  var name = document.getElementById("editresume").files[0].name;
  var form_data = new FormData();
  form_data.append("file", document.getElementById('editresume').files[0]);
  var url='<?= base_url('/JobseekerProfile/editResume');?>';
  $.ajax({
    url: url,
  method:"POST",
  data: form_data,
  contentType: false,
  cache: false,
  processData: false,
  dataType:'json',

  success:function(res)
  {
    if (res.success == true) {
                              $('#alertMsg2').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg2').css("color", "green");
                                window.location.href = '<?php echo base_url('JobProfile');?>';
                            } else if (res.success == false) {
                                $('#alertMsg2').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg2').css("color", "red");
                             
                            }
                            setTimeout(function () {
                                $('#alertMsg2').html('');
                                $('#alertMessage').hide();
                            }, 4000);   
                            document.getElementById("myuploadform").reset();                     
  }
  });
});
    }
    <!--</script>-->
    <!--//edit images-->
<script>
      function editimages(id){
      $("input[id='myFile']").click();    
      $("#myFile").change(function(){

  var name = document.getElementById("myFile").files[0].name;
  var form_data = new FormData();
  form_data.append("file", document.getElementById('myFile').files[0]);
  var url='<?= base_url();?>';
  $.ajax({
    url: url+'/JobseekerProfile/editImages',
  method:"POST",
  data: form_data,
  contentType: false,
  cache: false,
  processData: false,
  dataType:'json',

  success:function(res)
  {
    if (res.success == true) {
                              $('#alertMsg').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "green");
                                 window.location.href = '<?php echo base_url('JobProfile');?>';
                            } else if (res.success == false) {
                                $('#alertMsg').html(res.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "red");
                             
                            }
                            setTimeout(function () {
                                $('#alertMsg').html('');
                                $('#alertMessage').hide();
                            }, 4000);
                            document.getElementById("myuploadform").reset();    
                            
  }
  });

});
    
    }
    </script>    
    
  <script>
 $(document).ready(function () {
 $('#Updatedata').on('click', function (e){  
e.preventDefault();
    var first_name = $('#firstname').val();
    var min_experience = $('#min_experience').val();
     var current_ctc = $('#current_ctc').val();
     var expected_ctc = $('#expected_ctc').val();
     var graduation = $('#graduation').val();
     var skills= $('#specialization').val();
     var key_skilla= $('#key_skills').val();
    //emailid
  
   if (key_skilla == '') {
    $('#key_skill_error_msg').html("Key skills cannot be empty");
    $('#key_skill_error_msg').parent().show();
    $("#key_skill_error_msg").css("color", "red");
    return false;
    }else{
        $("#key_skill_error_msg").html("");
    }
  
  
  
  
  
     if (first_name == '') {
    $('#name_error_msg').html("Job Title cannot be empty");
    $('#name_error_msg').parent().show();
    $("#name_error_msg").css("color", "red");
    return false;
    }else{
        $("#name_error_msg").html("");
    }
  
    if (min_experience == '') {
    $('#min_error_msg').html("Minimum Experience cannot be empty");
    $('#min_error_msg').parent().show();
    $('#min_error_msg').css("color", "red");
    return false;
    }else{
        $("#min_error_msg").html("");    
    }
   
    //ctc
    
   if (current_ctc == '') {
    $('#error_current_ctc').html("Current Ctc cannot be empty");
    $('#error_current_ctc').parent().show();
    $('#error_current_ctc').css("color", "red");
    return false;
    }else{
        $("#error_current_ctc").html("");
    }
     if (expected_ctc == '') {
    $('#error_expected_ctc').html("Expect CTC cannot be empty");
    $('#error_expected_ctc').parent().show();
    $('#error_expected_ctc').css("color", "red");
    return false;
    }else{
        $("#error_expected_ctc").html("");
    }
    
     if (graduation == '') {
    $('#graduation_error').html("Graduation cannot be empty");
    $('#graduation_error').parent().show();
    $('#graduation_error').css("color", "red");
    return false;
    }else{
        $("#graduation_error").html("");
    }
    
    
    let optionsLength = document.getElementById("specialization").length;

if(optionsLength == 0){
    $('#error_skill').html("Job Function cannot be empty");
    $('#error_skill').parent().show();
     $('#error_skill').css("color", "red");
    return false;
    }else{
        $("#error_skill").html("");
    }

var data2 = $("#updateform").serialize();
  var url= '<?php echo base_url('JobseekerProfile/updateprofile');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    data:data2,
                    dataType:'json',
                    success:function(res){
                     console.log(res);
                     if(res.status==true){
                         alert("data has been updated");
                         window.location.href = '<?php echo base_url('JobProfile');?>'; 
                     }
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });         
 });     
 });
 function refreshPage() {
    location.reload(true);
}
</script>
        
    <script>
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
		

			$('.icons_select2').select2({
				width: "100%",
				templateSelection: iformat,
				templateResult: iformat,
				allowHtml: true,
				placeholder: "Location",
				dropdownParent: $( '.select-icon' ),//обавили класс
				allowClear: true,
				multiple: false
			});
	

				function iformat(icon, badge,) {
					var originalOption = icon.element;
					var originalOptionBadge = $(originalOption).data('badge');
				 	return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
				}

</script>
    


<script>
    $(document).ready(function(){
  $("#othercity").hide();
  // Initialize Select2
  $('#otherpreffercity').select2();
  // Set option selected onchange
  $('#location').change(function(){
    var value = $(this).val();
    var items = value.toString().split(",");
    var fetch= 50;
    var favProgramming = [];   
    for (i = 0; i <= fetch; i++) {
      favProgramming .push(i);
    }
   
     if($.inArray(favProgramming, items)){
         $("#othercity").show();
     }else{
        
        $("#othercity").hide();
     }
  });
});
</script>

<?php if(!empty($profile['other_city_name'])){ ?>
<script>
    $(document).ready(function(){
       $("#othercity").show(); 
    });    
</script>

<?php } else {?>
<script>
 $(document).ready(function(){
       $("#othercity").hide(); 
               
    }); 
</script>    
<?php }?>

// current location

<script>
    $(document).ready(function(){
  $("#othercurrentcity").hide();
  // Initialize Select2
  // Set option selected onchange
  $('#states').change(function(){
    var value = $(this).val();
    var items = value.toString().split(",");
    var fetch= 50;
    var favProgramming = [];   
    for (i = 0; i <= fetch; i++) {
      favProgramming .push(i);
    }
   
     if($.inArray(favProgramming, items)){
         $("#othercurrentcity").show();
     }else{
        
        $("#othercurrentcity").hide();
     }
  });
});
</script>

<?php if(!empty($profile['other_state_name'])){ ?>
<script>
    $(document).ready(function(){
       $("#othercurrentcity").show(); 
    });    
</script>

<?php } else {?>
<script>
 $(document).ready(function(){
       $("#othercurrentcity").hide(); 
       
       $('.numberonly').keypress(function (e) {    
    
        var charCode = (e.which) ? e.which : event.keyCode    

        if (String.fromCharCode(charCode).match(/[^0-9]/g))    

            return false;                        

    });
               
    }); 
</script>    
<?php }?>






    