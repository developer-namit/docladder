<?= $this->include('header') ?>
<style>
#addvideo {
    float: right;
}
.select-border {
    position: relative;
}
#dynamicfield .btn-danger.btn_remove {
    position: absolute;
    height: 35px;
    z-index: 2;
    font-size: 14px;
    line-height: 1.2;
    right: 0px;
    top: 0;
}
button#addvideo {
    margin-top: 10px;
}
     .loader {
        position: relative;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin: 75px;
        display: inline-block;
        vertical-align: middle;
    }
    .loader-1 .loader-outter {
        position: absolute;
        border: 4px solid #13648c;
        border-left-color: transparent;
        border-bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        -webkit-animation: loader-1-outter 1s cubic-bezier(.42, .61, .58, .41) infinite;
        animation: loader-1-outter 1s cubic-bezier(.42, .61, .58, .41) infinite;
    }
    
    .loader-1 .loader-inner {
        position: absolute;
        border: 4px solid #13648c;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        left: calc(50% - 20px);
        top: calc(50% - 20px);
        border-right: 0;
        border-top-color: transparent;
        -webkit-animation: loader-1-inner 1s cubic-bezier(.42, .61, .58, .41) infinite;
        animation: loader-1-inner 1s cubic-bezier(.42, .61, .58, .41) infinite;
    }    
     @-webkit-keyframes loader-1-outter {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @-webkit-keyframes loader-1-outter {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    
    @keyframes loader-1-outter {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    
    @-webkit-keyframes loader-1-inner {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }
    
    @keyframes loader-1-inner {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }
    
.invalid {
    width: 100%;
    margin-top: 0.25rem;
    font-size: .875em;
    color: #dc3545;
}    
</style>
<!--=================================
Header -->

<!--=================================
Register -->
<section class="space-ptb-outer bg-light recruiter-job-posting" >
    <div class="container">
        <?php $validation =  \Config\Services::validation(); ?>
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center mb-3"><h2 class="main-site-title sub-title-bg"><span>Space Form</span></h2></div>
            <div class="col-lg-9">
                <form class="postjob-form filter_data" id="spaceform" action="<?=base_url('Infrastructure/Sell');?>" method="post" enctype="multipart/form-data">
                    <!--general info-->
                            <?php if(!empty(session()->getFlashdata("success"))): ?>
                              <div class="alert alert-success" role="alert">
                              <?= session()->getFlashdata("success") ?>
                              </div>
                              <?php endif; ?>
                            
                            <div class="box-header">
                                <h4>Space Information</h4>
                            </div>
                            <div class="box">
                                <div class="box-body">
                                    <div class="bg-white login-register justify-content-center">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Product name</label>
                                                <input type="text" name="product_name" class="form-control" value="<?php  echo set_value('product_name'); ?>" placeholder="Enter a Title">
                                                 <?php if ($validation->getError('product_name')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('product_name') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 select-border" id="dynamic_field">
                                              <label>Product Image <em class="text-danger">*</em></label>
                                              <div class="input-group choose-file" >
                                                    <input type="file"   name="image" class="form-control" id="file-upload" accept="image/*" multiple  />
                                                    <label for="file-upload"  class="input-group-text" id="file-upload-filename">Choose file </label>
                                              </div>
                                               <button type="button" name="add" id="add" class="btn btn-secondary main-btn my-3">Add Image</button>
                                                <?php if ($validation->getError('image')): ?>
                                                    <div class="invalidfeedback" style="color:red;">
                                                    <?= $validation->getError('image') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Price<em class="text-danger">*</em></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex input-right-border">
                                                    <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" name="price"  maxlength="12"  id="space_price"  value="<?php  echo set_value('price'); ?>" class="form-control  <?php if($validation->getError('price')): ?>is-invalid<?php endif ?>" placeholder="">
                                                </div>
                                                    <?php if ($validation->getError('price')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('price') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label>Offer Price<em class="text-danger">*</em></label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend d-flex input-right-border">
                                                    <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                                  </div>
                                                  <input type="text" name="offerprice" maxlength="12"  id="offerprice"  value="<?php echo set_value('offerprice'); ?>"  class="form-control <?php if($validation->getError('offerprice')): ?>is-invalid<?php endif ?>" placeholder="">
                                                </div>
                                                 <?php if ($validation->getError('offerprice')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('offerprice') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>State<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="state" id="state">
                                                <option value="" selected disabled>Select Your state--</option>
                                                <?php if(!empty($state)){foreach($state as $states){?>
                                                <option value="<?php echo $states['id'];?>"><?php echo $states['name'];?></option>
                                                <?php }}?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 select-border mb-3">
                                                <label>City<em class="text-danger">*</em></label>
                                                <select class="form-control basic-select" name="city" id="city">
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Product Description<em class="text-danger">*</em></label>
                                                <textarea class="form-control <?php if($validation->getError('product_description')): ?>is-invalid<?php endif ?>" id="product_description" rows="2" maxlength="2000" name="product_description" maxlength="2000" ><?php echo set_value('product_description'); ?></textarea>
                                                    <?php if ($validation->getError('product_description')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('product_description') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Year of Manufacturing</label>
                                                <input type="text" class="form-control"  maxlength="4"  id="pin" pattern="\d{4}" name="year_of_manufacturing" value="<?php  set_value('year_of_manufacturing'); ?>">
                                            </div>
                                            <div class="form-group col-md-12 select-border mb-3" id="dynamicfield">
                                              <label>Product Video <em class="text-danger"></label>
                                              <div class="input-group choose-file">
                                                    <input type="file"  name="video" class="form-control" id="file-upload-video" accept="video/*" multiple  />
                                                    <label for="file-upload-video"  class="input-group-text" id="file-upload-filename-video">Choose file </label>
                                                   </div>
                                                   <button type="button" name="video_name" id="addvideo" class="btn btn-secondary main-btn">Add Video</button>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Area(sq. ft)</label>
                                                <input type="text" class="form-control" name="area_sq_ft" value="<?php echo set_value('area_sq_ft'); ?>">
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Concerned Person Name<em class="text-danger">*</em></label>
                                                <input type="text" id="person_name" class="form-control" name="concerned_person_name" value="<?php echo set_value('concerned_person_name'); ?>">
                                                <?php if ($validation->getError('concerned_person_name')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('concerned_person_name') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Contact<em class="text-danger">*</em></label>
                                                <input type="text" class="form-control allow_numeric" id="conatct_name"  maxlength="10"  name="contact_details" value="<?php echo set_value('contact_details'); ?>">
                                                <?php if ($validation->getError('contact_details')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('contact_details') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>E-mail address<em class="text-danger">*</em></label>
                                                <input type="email" id="emailid" class="form-control" name="e-mail_address" value="">
                                                <?php if ($validation->getError('e-mail_address')): ?>
                                                    <div class="invalid">
                                                    <?= $validation->getError('e-mail_address') ?>
                                                    </div>                                
                                                    <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mt-3 mb-2 mb-lg-3 text-center">
                                                 <!--<a class="btn btn-secondary main-btn" id="Updatedata"  href="#">Submit</a>-->
                                                <input class="btn btn-secondary main-btn" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                        <div class="overlay-loader"></div>
            </div>
        </div>
    </div>
</section>
<!--=================================
Register -->

<?= $this->include('footer') ?>
<!--=================================
Footer-->
<script>
$(document).ready(function(){
 $(".allow_numeric").on("input", function(evt) {
   var self = $(this);
   self.val(self.val().replace(/\D/g, ""));
   if ((evt.which < 48 || evt.which > 57)) 
   {
     evt.preventDefault();
   }
 });
});
</script>


<script>
    $(document).ready(function() {
    $('#spaceform').on('submit', function(){ 
    $('.overlay-loader').addClass('active').html('<div class="loader loader-1"><div class="loader-outter"></div><div class="loader-inner"></div></div>');
    });
    });
</script>

<script>
  $(document).ready(function () {
    $('#state').on('change', function () {  
      var state= this.value;
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
                    var html= '<option >Select city</option>';
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

<script>
 $(document).ready(function(){        
  var max = 4;   
  var i=0;    
      $('#add').click(function(){ 
        if (i <= max) {   
             
           $('#dynamic_field #add').before('<div id="row'+i+'"><div class="form-group col-md-12 mt-3"><div class="input-group choose-file"><input type="file" name="images[]"  value="" class="form-control fileuploadinput" accept="image/*" id="filesUpload'+i+'" data-val='+i+' ><label for="file-upload" class="input-group-text" id="fileuploadname'+i+'">Choose file</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');   
           i++; 
          return false;
          }
          });  
//onchnge of file input
$(document).on('change', '.fileuploadinput', function(){ 
  let name = $(this).val();
  let filename = name.replace(/^.*\\/, "");
let id = $(this).data('val');
document.getElementById('fileuploadname'+id).innerHTML = filename;
});
      $(document).on('click', '.btn_remove', function(){   
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           $('#myform')[0].reset(); 

      });
    }); 
</script>
// videos 
<script>
 $(document).ready(function(){        
  var max = 4;   
  var i=0;    
      $('#addvideo').click(function(){ 
        if (i <= max) {   
           $('#dynamicfield #addvideo').before('<div id="row'+i+'"><div class="form-group col-md-12 select-border mt-3"><div class="input-group choose-file"><input type="file" name="video_name[]"  value="" class="form-control filesinput" accept="video/*" id="filedsname'+i+'" data-val='+i+' ><label for="file-upload-video" class="input-group-text" id="filesname'+i+'">Choose file</label></div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></div>');   
           i++; 
          return false;
          }
          });  
//onchnge of file input
$(document).on('change', '.filesinput', function(){ 
  let name = $(this).val();
  let file_name = name.replace(/^.*\\/, "");
let id = $(this).data('val');
document.getElementById('filesname'+id).innerHTML = file_name;
});
$(document).on('click', '.btn_remove', function(){   
   var button_id = $(this).attr("id");   
   $('#row'+button_id+'').remove(); 
   $('#myform')[0].reset(); 
      });
    }); 
</script>



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

