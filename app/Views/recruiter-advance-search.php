<?= $this->include('recruiter-header') ?>
  <!--=================================
  Header -->
  <style>
      .select2-selection__rendered{
         padding-left:0px!important;
    }
    li.select2-selection__choice {
       margin-left: 10px;
    }
    input#key_skills {
       padding-left: 0px;
    }
::placeholder {
   padding-left:20px!important;
}
::-webkit-input-placeholder { /* Edge */
   padding-left:20px!important;;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
   padding-left:20px!important;
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
Register -->
    <section class="space-ptb-outer bg-light recruiter-job-posting">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h2 class="main-site-title sub-title-bg mb-3"><span>Advance Search</span></h2>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form class="postjob-form" action="<?=base_url('advance');?>" method="get">
                                <!--general info-->
                                <?php $validation =  \Config\Services::validation(); ?>
                                <div class="box-header">
                                    <h4>General Information</h4>
                                </div>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="bg-white login-register justify-content-center">
                                            <div class="row">
                                                 <input type="hidden" name="search" value="advance">
                                                <div class="form-group col-md-12 select-border mb-2">
                                                    <label>Key Skills</label>
                                                    <input type="text" name="key_skills" id="key_skills" placeholder="Enter Key Skills" class="form-control" value="<?=set_value('key_skills');?>">
                                                    </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label>Min Experience<em class="text-danger">*</em></label>
                                                    <select class="form-control basic-select <?php if($validation->getError('min_experience')): ?>is-invalid<?php endif ?>" name="min_experience">
                                                <option value="" selected="selected">Select Value</option>
                                                    <option value="0" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '0'){echo("selected");}?>>Fresher</option>                                      
                                                    <option value="1" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                    <option value="2" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                    <option value="3" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                    <option value="4" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                    <option value="5" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                    <option value="6" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                    <option value="7" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                    <option value="8" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                    <option value="9" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                    <option value="10" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                    <option value="11" <?php if(isset($_GET['min_experience']) && $_GET['min_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                    </select>
                                                    </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                <label>Max Experience<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select <?php if($validation->getError('max_experience')): ?>is-invalid<?php endif ?>" name="max_experience">
                                                     <option value="" selected="selected">Select Value</option>
                                                    <option value="1" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '1'){echo("selected");}?>>1Y Experience</option>
                                                    <option value="2" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '2'){echo("selected");}?>>2Y Experience</option>
                                                    <option value="3" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '3'){echo("selected");}?>>3Y Experience</option>
                                                    <option value="4" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '4'){echo("selected");}?>>4Y Experience</option>
                                                    <option value="5" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '5'){echo("selected");}?>>5Y Experience</option>
                                                    <option value="6" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '6'){echo("selected");}?>>6Y Experience</option>
                                                    <option value="7" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '7'){echo("selected");}?>>7Y Experience</option>
                                                    <option value="8" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '8'){echo("selected");}?>>8Y Experience</option>
                                                    <option value="9" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '9'){echo("selected");}?>>9Y Experience</option>
                                                    <option value="10" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '10'){echo("selected");}?>>10Y Experience</option>
                                                    <option value="11" <?php if(isset($_GET['max_experience']) && $_GET['max_experience'] == '11'){echo("selected");}?>>10Y+ Experience</option>
                                                </select>
                                                <?php if ($validation->getError('max_experience')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('max_experience') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <label>Job Function<em class="text-danger">*</em></label>
                                                    <select class="form-control basic-select <?php if($validation->getError('designation')): ?>is-invalid<?php endif ?>" name="designation" id="designation">
                                                <option value="">Select job function</option>
                                                <?php if (!empty($designation)){ 
                                                    foreach($designation as $val) { ?>                           
                                                    <option value="<?php echo $val['designation_id'];?>" <?php if(isset($_GET['designation']) && $_GET['designation'] == $val['designation_id']){echo("selected");}?>><?php if(!empty($val['designation'])){ echo $val['designation']; }?></option>
                                                    <?php }}?>
                                            </select>
                                            <?php if ($validation->getError('designation')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('designation') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <label>Area of Specialization<em class="text-danger">*</em></label>
                                                    <select class="form-control basic-select <?php if($validation->getError('specialization')): ?>is-invalid<?php endif ?>" name="specialization" id="specialization"> 
                                            </select>
                                                    <?php if ($validation->getError('specialization')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('specialization') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                                                <label class="form-label">Current  Location <em class="text-danger">*</em></label>
                    
                                                <select class="form-control jquery-select2 slt-location cuurentLocationSel" name="state[]" id="states" autocomplete="off" multiple>
                                                    <option disabled>Select Location...</option>
        
                                                    <optgroup><option value="NI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('NI',$_GET['state']) ){  echo "selected"; }  ?>>Anywhere in North India</option></optgroup>
                                                    <optgroup><option value="EI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('EI',$_GET['state']) ){  echo "selected"; }  ?> >Anywhere in East India</option></optgroup>
                                                    <optgroup><option value="WI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('WI',$_GET['state']) ){  echo "selected"; }  ?>>Anywhere in West India</option></optgroup>
                                                    <optgroup><option value="SI" <?php if(isset($_GET['state']) && !empty($_GET['state']) && in_array('SI',$_GET['state']) ){  echo "selected"; }  ?> >Anywhere in South India</option></optgroup>
                                                    <?php 
                                                        if(!empty($margedata)){
                                                            foreach($margedata as $val){
                                                                
                                                            if(isset($_GET['state']) && !empty($_GET['state']) && in_array('state_'.$val['id'],$_GET['state']) ){  
                                                                $selected = "selected";
                                                            } else{
                                                                $selected = "";
                                                            }
                                                    ?>
                                                        <optgroup><option value="state_<?= $val['id'];?>" <?= $selected; ?> ><?= strtolower($val['name']);?></option></optgroup>
                                                    <?php 
                                                        if(!empty($val['city'])){
                                                            foreach($val['city'] as $cities){
                                                                
                                                                if(isset($_GET['state']) && !empty($_GET['state']) && in_array('city_'.$cities['id'],$_GET['state']) ){  
                                                                    $selected = "selected";
                                                                } else{
                                                                    $selected = "";
                                                                }
                                                    ?>
                                                        <option value="city_<?= $cities['id'];?>" <?= $selected; ?> > <?= strtolower($cities['name']);?></option>
                                                    <?php } } 
                                                         if(isset($_GET['state']) && !empty($_GET['state']) && in_array('other_'.$val['id'],$_GET['state']) ){  
                                                            $selected = "selected";
                                                        } else{
                                                            $selected = "";
                                                        }
                                                    ?>
                                                        <optgroup><option value="other_<?= $val['id'] ?>" type="others" mainId="<?= $val['id'] ?>" mainState="<?= $val['name'] ?>" <?= $selected; ?> ><?= strtolower($val['other']);?></option></optgroup>
                                                    <?php } } ?>     
                                              </select>
                                              
                                              <div class="child">
                                                    <?php
                                                        if(isset($_GET['other']['states']) && !empty($_GET['other']['states']) ){
                                                        foreach($_GET['other']['states'] as $p => $others){
                                                    ?>
                                                     
                                                     <div id="Mainstatesother_<?= $p; ?>" class="mb-3 mt-3 col-md-12">
                                                        <label class="form-label">other cities in </label>
                                                        <input type="text" class="form-control" name="other[states][<?= $p; ?>]" value="<?= $others ?>">
                                                     </div>
                                                    <?php 
                                                        }  }
                                                    ?>
                                              </div>
                                          
                                            </div>
                  
                                          <div class="form-group col-md-12 select-border mb-3 nmSelBox">
                                              <label class="form-label">Preferred Location <em class="text-danger">*</em></label>
                                                <select class="form-control jquery-select2 slt-location prefferedLocationSel" name="location[]" id="location" autocomplete="off" multiple>
                                                 
                                                    <option disabled>Select Location...</option>
        
                                                    <optgroup><option value="NI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('NI',$_GET['location']) ){  echo "selected"; }  ?>>Anywhere in North India</option></optgroup>
                                                    <optgroup><option value="EI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('EI',$_GET['location']) ){  echo "selected"; }  ?> >Anywhere in East India</option></optgroup>
                                                    <optgroup><option value="WI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('WI',$_GET['location']) ){  echo "selected"; }  ?>>Anywhere in West India</option></optgroup>
                                                    <optgroup><option value="SI" <?php if(isset($_GET['location']) && !empty($_GET['location']) && in_array('SI',$_GET['location']) ){  echo "selected"; }  ?> >Anywhere in South India</option></optgroup>
                                                    <?php 
                                                        if(!empty($margedata)){
                                                            foreach($margedata as $val){
                                                                
                                                                if(isset($_GET['location']) && !empty($_GET['location']) && in_array('state_'.$val['id'],$_GET['location']) ){  
                                                                    $selected = "selected";
                                                                } else{
                                                                    $selected = "";
                                                                }
                                                    ?>
                                                        <optgroup><option value="state_<?= $val['id'];?>" <?= $selected; ?>><?= strtolower($val['name']);?></option></optgroup>
                                                    <?php 
                                                        if(!empty($val['city'])){
                                                            foreach($val['city'] as $cities){
                                                                
                                                                if(isset($_GET['location']) && !empty($_GET['location']) && in_array('city_'.$cities['id'],$_GET['location']) ){  
                                                                    $selected = "selected";
                                                                } else{
                                                                    $selected = "";
                                                                }
                                                    ?>
                                                        <option value="city_<?= $cities['id'];?>" <?= $selected; ?> > <?= strtolower($cities['name']);?></option>
                                                    <?php } } 
                                                    
                                                        if(isset($_GET['location']) && !empty($_GET['location']) && in_array('other_'.$val['id'],$_GET['location']) ){  
                                                            $selected = "selected";
                                                        } else{
                                                            $selected = "";
                                                        }
                                                    ?>
                                                        <optgroup><option value="other_<?= $val['id'] ?>" type="others"  mainId="<?= $val['id'] ?>"  mainState="<?= $val['name'] ?>" <?= $selected; ?>  ><?= strtolower($val['other']);?></option></optgroup>
                                                    <?php } } ?>                                                         
                                                </select>
                                
                                    
                                                <div class="child">
                                                    
                                                    <?php
                                                        if(isset($_GET['other']['location']) && !empty($_GET['other']['location']) ){
                                                        foreach($_GET['other']['location'] as $p => $others){
                                                    ?>
                                                     
                                                     <div id="Mainstatesother_<?= $p; ?>" class="mb-3 mt-3 col-md-12">
                                                        <label class="form-label">other cities in </label>
                                                        <input type="text" class="form-control" name="other[states][<?= $p; ?>]" value="<?= $others ?>">
                                                     </div>
                                                    <?php 
                                                        }  }
                                                    ?>
                                    
                                                </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label>Min Salary<em class="text-danger">*</em> <small>( in Lacs Yearly)</small></label>
                                                    <div class="input-group">
                                                    <div class="input-group-prepend d-flex">
                                                        <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                    </div>
                                                    <input type="text" class="form-control <?php if($validation->getError('min_salary')): ?>is-invalid<?php endif ?>" name="min_salary" value="<?php if(isset($_GET['min_salary']) && !empty($_GET['min_salary'])){ echo $_GET['min_salary']; }?>">
                                                    <?php if ($validation->getError('min_salary')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('min_salary') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label>Max Salary<em class="text-danger">*</em> <small>( in Lacs Yearly)</small></label>
                                                    <div class="input-group">
                                                    <div class="input-group-prepend d-flex">
                                                        <div class="input-group-text form-control"><i class="fas fa-rupee-sign"></i></div>
                                                    </div>
                                                    <input type="text" class="form-control <?php if($validation->getError('max_salary')): ?>is-invalid<?php endif ?>"  name="max_salary" value="<?php if(isset($_GET['max_salary']) && !empty($_GET['max_salary'])){ echo $_GET['max_salary']; }?>">
                                                    <?php if ($validation->getError('max_salary')): ?>
                                                    <div class="invalid-feedback">
                                                    <?= $validation->getError('max_salary') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 select-border mb-3">
                                                    <label>Gender<em class="text-danger">*</em></label>
                                                    <select class="form-control basic-select" name="gender">
                                                       <option value=""> Select Gender</option>  
                                                    <option value="male" <?php if(isset($_GET['gender']) && $_GET['gender'] == 'male'){echo("selected");}?>>Male</option>
                                                    <option value="female" <?php if(isset($_GET['gender']) && $_GET['gender'] == 'female'){echo("selected");}?>>Female</option>
                                                    <option value="other" <?php if(isset($_GET['gender']) && $_GET['gender'] == 'other'){echo("selected");}?>>Others</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Education -->
                                <div class="box-header">
                                    <h4>Educational Qualification </h4>
                                   
                                </div>
                                <div class="box">
                                    <div class="box-body">
                                        <div class="bg-white login-register justify-content-center">
                                            <div class="row">
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label>Graduation</label>
                                                    <select class="form-control basic-select" name="graduate">
                                                          <option value=""> Select Graduation</option>
                                                    <?php if(!empty($graduate['education'])){
                                                        foreach($graduate['education'] as $key=> $edu){
                                                            ?> 
                                                    <option value="<?=$key;?>"><?=$edu;?></option>
                                                    <?php   
                                                        }
                                                          }?>
                                                       </select>
                                                </div>
                                                <div class="form-group col-md-6 select-border mb-3">
                                                    <label>Post Graduation</label>
                                                    <select class="form-control basic-select" name="postgraduate">
                                                        <option value=""> Select Post Graduation</option>
                                                    <?php if(!empty($graduate['postgarduate'])){
                                                        foreach($graduate['postgarduate'] as $key=> $pedu){
                                                            ?>
                                                        <option value="<?=$key;?>"><?=$pedu;?></option>
                                                    <?php   
                                                        }
                                                          }?>
                                                      </select>
                                                </div>
                                                <div class="form-group col-md-12 select-border">
                                                    <label>Super Specialty</label>
                                                    <select class="form-control basic-select" name="speciality">
                                                           <option value=""> Select Super Graduation</option>
                                                    <?php if(!empty($graduate['specialty'])){
                                                        foreach($graduate['specialty'] as $key=> $spc){
                                                            ?>
                                                        <option value="<?=$key;?>"><?=$spc;?></option>
                                                    <?php   
                                                        }
                                                          }?>
                                                        </select>
                                                </div>
                                                <div class="text-center">
                                                    <div class="form-group col-md-12 mt-3 mb-3">
                                                        <input class="btn btn-secondary main-btn" type="submit" value="Start Search">
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
            </div>
        </div>
    </section>
    <!--=================================
Register -->


    <!--=================================
Footer-->
<?= $this->include('recruiter-footer') ?>
 
    <!--=================================
Footer-->

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.filter.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multiselect-widget/3.0.1/jquery.multiselect.min.js"></script>

<script>
  $(document).ready(function () {
    $('#designation').on('change', function () {  
      var skill= this.value;
      var url= '<?php echo base_url('RecruiterHome/getdata');?>';
          $.ajax({
                    type: "post",
                    url:  url,
                    data:{skill:skill},
                    dataType:'json',
                    success:function(res){
                     console.log('res',res);
                     var html="";                        
                    var html= '<option value="" >Select Area of Specialization</option>';
                     for(var count=0; count < res.length; count++){                 
                      html+= '<option value="'+res[count]['id']+'">'+res[count]['skills']+'</option>';
                     }
                     $('#specialization').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                });     
    }).change();
  });
    </script>

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
    
    
    