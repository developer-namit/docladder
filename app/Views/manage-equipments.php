<?= $this->include('recruiter-header') ?>
<!--=================================
Register -->
<style>
    button.close.btn.btn-danger {
    position: absolute;
    font-size: 9px;
    padding: 3px 10px;
    border-radius: 5px;
}
.select-border img {
    padding: 0px;
}
.sub-title-bg span {
    padding: 6px 16px;
}
.modal #uploadimages {
    float: left;
    padding: 8px 0;
}
    #addmore{
        float:right;
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

<section class="space-ptb-outer bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0 manage-table">
            <div class="row mb-2 align-items-center user-table-title table-desktop">
                <div class="col-3 d-flex align-items-center">
                  <div class="form-check theme-col select-all-bg mt-2">
                    <input class="form-check-input" type="checkbox" value="1" id="checkdata">
                <label class="form-check-label" for="flexCheckDefault">Select All</label>
                  </div>
                </div>
                <div class="col-6 d-flex align-items-center justify-content-sm-center justify-content-end">
                  <div class="section-title mb-0 mt-1">
                    <h4 class="main-site-title sub-title-bg"><span>Manage Equipments</span></h4>
                  </div>
                </div>
                <div class="col-3 mt-2">
                  <div class="delete">
                    <input type="submit" value="Delete" id="delete" class="btn btn-primary del-all">
                  </div>
                </div>
            </div>
            <div class="row mb-2 align-items-center user-table-title table-tab">
                <div class="row mx-auto">
                  <div class="col-6 d-flex align-items-center">
                    <div class="form-check theme-col select-all-bg mt-2">
                        <input class="form-check-input" type="checkbox" value="1" id="checkdata">
                        <label class="form-check-label" for="flexCheckDefault">Select All</label>
                    </div>
                  </div>
                  <div class="col-6 mt-2">
                    <div class="delete">
                      <input type="submit" value="Delete" id="delete" class="btn btn-primary del-all">
                    </div>
                  </div>
                </div>
                <div class="row mx-auto">
                  <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="section-title mb-0 mt-2 mt-sm-0">
                      <h4 class="main-site-title sub-title-bg"><span>Manage Equipments</span></h4>
                    </div>
                  </div>
                </div>
            </div>
 
          <div class="user-dashboard-table table-responsive">
            <table class="table table-bordered">
              <thead class="bg-light">
                <tr>
                  <th scope="col">Select</th>
                  <th scope="col">Sr. No</th>
                  <th scope="col"><i class="fas fa-pencil-alt me-1"></i> Product Name</th>
                  <th scope="col"><i class="fas fa-rupee-sign me-1"></i>Price</th>
                  <th scope="col"><i class="fas fa-map-marker-alt me-2"></i>Location</th>
                  <th scope="col"><i class="far fa-calendar-alt me-2"></i>Date Posted</th>
                  <th scope="col"><i class="fas fa-hand-point-up me-2"></i>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(!empty($equipment)){
                  $i=1;
                  foreach($equipment as $val){?>
                  <tr>
                      <td>
                          <div class="form-check">
                              <input class="form-check-input checkbox" type="checkbox" value="<?php if(!empty($val)){ echo $val['id'];}?>" id="flexCheckDefault">
                        </div>
                      </td>
                      <td><?php echo $i;?></td>
                      <td><?php if(!empty($val)){ echo $val['product_name'];}?></td>
                      <td><?php if(!empty($val)){ echo $val['product_price'];}?></td>
                      <td><?php if(!empty($val['state_name'])){ echo $val['state_name'];}?>, <?php if(!empty($val['city_name'])){ echo $val['city_name'];}?> </td>
                      <td><?php if(!empty($val)){ echo $val['created_at'];}?></td>
                      <td>
                        <ul class="list-unstyled mb-0 d-flex">
                          <li><a  class="text-primary" onclick="MyProductFunction(<?php if(!empty($val)){ echo $val['id'];}?>);"><i class="far fa-eye"></i></a></li>
                          <li><a  class="text-info" onclick="MyProductEdit(<?php if(!empty($val)){ echo $val['id'];}?>);"><i class="fas fa-pencil-alt"></i></a></li>
                          <li><a  class="text-danger" onclick="MyProductdelete(<?php if(!empty($val)){ echo $val['id'];}?>);"><i class="far fa-trash-alt"></i></a></li>
                        </ul>
                      </td>                 
            <?php $i++; }}?>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row justify-content-center">
            <div class="col-12 text-center">
              <ul class="pagination mt-3">
                <?php echo $pager->links();?>
                  
              </ul>
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
Footer-->
<!--=================================
View Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="ViewEquipmentForm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>View Details</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
      <div class="modal-body">
        <div class="box-header">
          <h4>Equipment Information</h4>
        </div>
        <form class="postjob-form">
            <div class="box">
                <div class="box-body">
                    <div class="row bg-white justify-content-center">
                        <div class="form-group col-md-12 mb-3">
                            <label>Product name</label>
                            <input type="text" class="form-control" value="" id="product_name" disabled>
                        </div>
                        <div class="form-group col-md-12 select-border mb-3 ">
                          <label>Product Image </label>
                          <div class="thumbnail text-lg-center" id="fileimages"> 
                              <div class="text-center cover-photo cover-edit figure" id="file_image">
                                <i class="fas fa-times-circle cover-photo-icon"></i>
                             </div>
                        </div>
                        </div>
                            <div class="form-group col-md-12 mb-3">
                            <label>Product Price<em class="text-danger">*</em></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex input-right-border">
                                <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" id="product_price" disabled> 
                            </div>
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>State<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" id="state" disabled> 
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>City<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" id="city" disabled> 
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Product Description<em class="text-danger">*</em></label>
                            <textarea class="form-control" rows="2" id="product_description"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Year of Manufacturing</label>
                            <input type="text" class="form-control" id="year_of_manufacturing">
                        </div>
                        <div class="form-group col-md-12 select-border mb-3">
                          <label>Product Video </label>
                          <div class="cover-photo cover-edit" id="getvideo">
                              <!--<video id="file_video"></video>-->
                            <i class="fas fa-times-circle cover-photo-icon"></i>
                          </div>
                           <div class="thumbnail text-lg-center" id="filevideo"></div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Contact Details</label>
                            <input type="text" class="form-control"  id="contact_details">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Concerned Person Name</label>
                            <input type="text" class="form-control" id="concerned_person_name">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Contact</label>
                            <input type="tel" class="form-control"  id="contact" disabled>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>E-mail address</label>
                            <input type="text" class="form-control" id="e-mail_address" disabled>
                        </div>
                        <div class="form-group col-md-12 select-border mb-2">
                            <label>Country of Origin</label>
                            <input type="text" class="form-control" id="country_name" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--=================================
View Equipment Details Modal Popup -->


<!--=================================
View Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="deletepopup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!--<div class="modal-header">-->
      <!--      <button type="button" class="btn-close" ></button>-->
      <!--</div>-->
      <div class="modal-body ">
            <!--<div class="alert alert-danger d-flex align-items-center" role="alert">-->
            <!--  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>-->
            <!--  <div>-->
            <!--    An example danger alert with an icon-->
            <!--  </div>-->
            <!--</div>-->
            <div class="delete-btn">
                <h2>Really want to Delete ?</h2>
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


<!--=================================
Edit Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="EditJobForm2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content recruiter-job-posting">
      <div class="modal-title">
          <ul class="list-unstyled">
              <li>
                <h2>Edit Details</h2>
              </li>
              <li>
                 <button type="button" class="btn-close popup-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              </li>
          </ul>
      </div>
      <div class="modal-body">
        <div class="box-header">
          <h4>Equipment Information</h4>
        </div>
        <form class="postjob-form" method="post" id="formsubmit"  enctype="multipart/form-data" >
          <!--general info-->
          <div class="box">
            
              <div class="box-body filter_data">
                  <div class="row bg-white justify-content-center">
                      <div class="form-group col-md-12 mb-3">
                          <label>Product name</label>
                          <input type="text" name="product_name" class="form-control" value="" id="productname">
                      </div>
                        <div class="form-group col-md-12 select-border mb-3 file-img">
                        <label>Product Image </label>
                        <div class="input-group choose-file" id="filesimages">
                        <input type="file" name="imagefiles" id="fileupload" class="form-control" value=""  accept="image/*" >
                        <label for="imagefiles" class="input-group-text" id="fileuploadfilename">Choose file </label>
                        </div>
                        <div class="addmore">
                        <button type="button" name="add" id="add" class="btn btn-secondary main-btn">Add Image</button>
                        </div>
                        <div id="checkimg">
                          <span id="uploadimages">upload imgage</span> 
                          <div class="thumbnail text-lg-center" id="fileimage2"> 
                        </div>
                          </div>
                      
                        </div>
                      <div class="form-group col-md-12 mb-3">
                          <label>Product Price<em class="text-danger">*</em></label>
                          <div class="input-group">
                            <div class="input-group-prepend d-flex input-right-border">
                              <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                            </div>
                            <input type="text" name="product_price" maxlength="12" class="form-control" placeholder="" id="productprice" value="">
                          </div>
                      </div>
                      <div class="form-group col-md-6 select-border mb-3">
                          <label>State<em class="text-danger">*</em></label>
                          <select class="form-control basic-select" name="state" id="getstate">
                            
                          </select>
                      </div>
                      <div class="form-group col-md-6 select-border mb-3">
                          <label>City<em class="text-danger">*</em></label>
                          <select class="form-control basic-select" name="city" id="getcity">
                          </select>
                      </div>
                      <div class="form-group col-md-12 mb-3">
                          <label>Product Description<em class="text-danger">*</em></label>
                          <textarea class="form-control" name="product_description" rows="2" maxlength="2000" id="productdescription"></textarea>
                      </div>
                      <div class="form-group col-md-12 mb-3">
                          <label>Year of Manufacturing</label>
                          <input type="text" name="year_of_manufacturing" class="form-control" id="yearof_manufacturing">
                      </div>
                      <div class="form-group col-md-12 select-border mb-3">
                        <label>Product Video </label>
                        <div class="input-group choose-file">
                          <input type="file" name="videofiles" class="form-control" id="fileuploadvideo" accept="video/*" />
                          <label for="file-upload-video" class="input-group-text" id="fileuploadfilenamevideo">Choose file </label>
                    </div>
                         <span id="uploadvideo"></span> 
                         <div class="thumbnail text-lg-center" id="filevideos"></div>
                      </div>
                      <div class="form-group col-md-6 mb-3">
                          <label>Contact Details</label>
                          <input type="text" class="form-control" maxlength="12" name="contact_details" id="contactdetails" value="">
                      </div>
                      <div class="form-group col-md-6 mb-3">
                          <label>Concerned Person Name</label>
                          <input type="text" class="form-control" name="concernedperson_name" value="" id="concernedperson_name">
                      </div>
                      <div class="form-group col-md-6 mb-3">
                          <label>Contact</label>
                          <input type="tel" class="form-control" maxlength="10" value="" name="getcontact" id="getcontact">
                      </div>
                      <div class="form-group col-md-6 mb-3">
                          <label>E-mail address</label>
                          <input type="email" class="form-control" value="" name="email_address" id="emailaddress">
                      </div>
                      <div class="form-group col-md-12 select-border mb-2">
                        <label>Country of Origin</label>
                        <select class="form-control basic-select" name="country" id="getcountry">
                        </select>
                    </div>
                    <input type="hidden" name="id" id="userid">
                     <input type="hidden" id="totalimg" value="">
                      <div class="text-center">
                          <div class="form-group col-md-12 mt-3 mb-3">
                              <input type="submit" class="btn btn-secondary main-btn"  value="Update">
                          </div>
                      </div>   
                  </div>
              </div>
          </div>
          <div class="overlay-loader"></div>
      </form>
      </div>
    </div>
  </div>
</div>



<!--=================================
Edit Equipment Details Modal Popup -->

<!--=================================
Javascript -->
<script>
  function MyProductFunction(id){
    var url= '<?php echo base_url('ManageEquipments/GetEquipment');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save  
                      var val="";  
                       $('#city').val(data['city_name']);
                       $('#concerned_person_name').val(data['concerned_person_name']);
                       $('#contact').val(data['contact']);
                       $('#contact_details').val(data['contact_details']);
                       $('#country').val(data['country']);
                       $('#e-mail_address').val(data['e-mail_address']);
                       $('#product_description').val(data['product_description']);
                       $('#product_name').val(data['product_name']); 
                       $('#product_price').val(data['product_price']);
                       $('#state').val(data['state_name']);
                       $('#country_name').val(data['country_name']);
                       $('#year_of_manufacturing').val(data['year_of_manufacturing']);
                       $('#file_image').html('<img src="<?php echo base_url('/public/uploads/equipmentimages');?>/'+data['file_image']+'" />');
                        if(data['file_video'].length >0){
                         var video='';        
                       video += '<video id="myvideo" controls>';
                       video += '<source  src="<?php echo base_url('/public/uploads/equipmentvideos');?>/'+data['file_video']+'" type="video/mp4"/>';
                       video += '</video>';
                       $("#getvideo").html(video);
                        }else{
                         $("#getvideo").html('');   
                        }
                       //images
                            var images='';
                            if(data['images_name'].length> 0){
                                $.each(data['images_name'], function(key, val){
                                   $.each(val, function(key, vals){
                                   images += '<img src="<?php echo base_url('/public/uploads/Equipmentimages');?>/'+vals['images']+'" />';
                                   });
                                     $('#fileimages #file_image').html(images);
                                }); 
                            }else{
                               $('#fileimages #file_image').html('');  
                            }
                       // videos
                         if(data['video_name'].length >0){
                         var video='';
                          $.each(data['video_name'], function(key, val){
                        $.each(val, function(key, vals){
                       video += '<video id="myvideo" controls>';
                       video += '<source  src="<?php echo base_url('/public/uploads/Equipmentvideos');?>/'+vals['video']+'" type="video/mp4"/>';
                       video += '</video>';
                         }); 
                       $("#filevideo").html(video);
                          }); 
                        }else{
                         $("#filevideo").html('');   
                        }
                      $("#ViewEquipmentForm").modal('show');                   
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                    
                }); 
  }
</script>
<!-- // edit modal -->
<script>
  function MyProductEdit(id){
    var url= '<?php echo base_url('ManageEquipments/GetEquipment');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      var val="";
                      $('#userid').val(data['id']);  
                       $('#concernedperson_name').val(data['concerned_person_name']);
                       $('#getcontact').val(data['contact']);
                       $('#contactdetails').val(data['contact_details']);
                       $('#getcountry').val(data['country']);
                       $('#emailaddress').val(data['e-mail_address']);
                       $('#productdescription').val(data['product_description']);
                       $('#productname').val(data['product_name']); 
                       $('#productprice').val(data['product_price']);
                       $('#yearof_manufacturing').val(data['year_of_manufacturing']);
                       $('#totalimg').val(data['totalimages']['equipment_id']);
                        $('#uploadimages').html('<img src="<?php echo base_url('/public/uploads/equipmentimages');?>/'+data['file_image']+'" />');
                         if(data['file_video'].length >0){
                         var video='';        
                       video += '<video id="myvideo" controls>';
                       video += '<source  src="<?php echo base_url('/public/uploads/equipmentvideos');?>/'+data['file_video']+'" type="video/mp4"/>';
                       video += '</video>';
                       $("#uploadvideo").html(video);
                        }else{
                         $("#uploadvideo").html('');   
                        }
                      // get state
                      var getstates='';
                      getstates += '<option value="'+ data['state'] +'">'+ data['state_name'] +'</option>';
                       $.each(data['getstates'], function(key, val){
                        getstates += '<option value="'+ val['id'] +'">'+ val['name'] +'</option>'; 
                          });
                          $('#getstate').html(getstates);
                          // get city
                          var getcity='';
                          getcity += '<option value="'+ data['city'] +'">'+ data['city_name'] +'</option>';
                               $.each(data['getcities'], function(key, val){
                                getcity += '<option value="'+ val['id'] +'">'+ val['name'] +'</option>'; 
                                });                             
                              $('#getcity').html(getcity); 
                           var getcounties='';                          
                           getcounties += '<option value="'+ data['country'] +'">'+ data['country_name'] +'</option>';
                             $.each(data['counties'], function(key, val){
                             getcounties += '<option value="'+ val['id'] +'">'+ val['name'] +'</option>'; 
                             });                             
                             $('#getcountry').html(getcounties);
                             //images
                             
                            if(data['images_name'].length> 0){
                                 var image='';
                                $.each(data['images_name'], function(key, val){
                                   $.each(val, function(key, vals){
                                    image+='<div id="row'+vals['id']+'">';   
                                    image+='<button type="submit" id="'+vals['id']+'" class="close btn btn-danger btn_remove" onclick=imgfunction('+vals['id']+');><span>&times;</span></button>';   
                                    image += '<img src="<?php echo base_url('/public/uploads/Equipmentimages');?>/'+vals['images']+'" />';
                                   image+='</div>';
                                       
                                   });
                                     $('#fileimage2').html(image);
                                }); 
                            }else{
                                 $('#fileimage2').html('');
                            }
                            
                            // videos
                            if(data['video_name'].length >0){
                            var video='';
                            $.each(data['video_name'], function(key, val){
                            $.each(val, function(key, vals){
                            video += '<video id="myvideo" controls>';
                            video += '<source  src="<?php echo base_url('/public/uploads/Equipmentvideos');?>/'+vals['video']+'" type="video/mp4"/>';
                            video += '</video>';
                            }); 
                            $("#filevideos").html(video);
                            }); 
                            }else{
                            $("#filevideos").html('');   
                            }

                          $("#EditJobForm2").modal('show');                   
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>
<!-- // get state value -->
<script>
  $(document).ready(function () {
    $('#getstate').on('change', function () {  
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
                     $('#getcity').html(html);
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }

                });
              }     

    }).change();
});
</script>

<!-- // edit update data -->

<script>
   $(document).ready(function() {
    $('#formsubmit').on('submit', function(event){ 
      event.preventDefault(); 
var formData = new FormData(this);
$('.overlay-loader').addClass('active').html('<div class="loader loader-1"><div class="loader-outter"></div><div class="loader-inner"></div></div>');
  var url= '<?php echo base_url('ManageEquipments/EditEquipment');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success:function(data){
                     
                   window.location.reload();
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  });
  });

</script>
<!-- // single delete row data -->
<script>
function mydeletfunction(){
  var id  =$('#delid').val();
  var url= '<?php echo base_url('ManageEquipments/deletedata');?>'
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
<script>
  function MyProductdelete(id){
    var url= '<?php echo base_url('ManageEquipments/GetEquipment');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                      var val=""; 
                      $('#delid').val(data['id']);                       
                       $("#deletepopup").modal('show');           
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>

<!-- //multiple delete function -->
<script>
     $(document).ready(function(){
      // Check all
        $("#checkdata").change(function(){
           var checked = $(this).is(':checked');
           if(checked){
              $(".checkbox").each(function(){
                  $(this).prop("checked",true);
              });
           }else{
              $(".checkbox").each(function(){
                  $(this).prop("checked",false);
              });
           }
        });
        // Changing state of CheckAll checkbox 
        $(".checkbox").click(function(){

           if($(".checkbox").length == $(".checkbox:checked").length) {
               $("#checkdata").prop("checked", true);
           } else {
               $("#checkdata").prop("checked",false);
           }

        });
        // Delete button clicked
        $('#delete').click(function(){
          var url= '<?php echo base_url('ManageEquipments/multidelete');?>';
           // Confirm alert
           var deleteConfirm = confirm("Are you sure?");
           if (deleteConfirm == true) {
              // Get userid from checked checkboxes
              var users_arr = [];
              $(".checkbox:checked").each(function(){
                  var userid = $(this).val();
                  users_arr.push(userid);
              });
              // Array length
              var length = users_arr.length;
              if(length > 0){
                 // AJAX request
                 $.ajax({
                    url: url,
                    type: 'post',
                    data: {id: users_arr},
                    success: function(response){
                      window.location.reload();
                    }
                 });
              }
           } 

        });

      });
      </script>

      <!-- // cancel modal -->
<!-- // cancel -->
<script>
 $("#btnclosed").click(function(){
            $("#deletepopup").modal('hide');
        });
</script>

<!--// images name -->
<script>
      var input = document.getElementById('fileupload');
        var infoArea = document.getElementById( 'fileuploadfilename' );

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
      var inputD = document.getElementById( 'fileuploadvideo' );
        var infoAreaD = document.getElementById( 'fileuploadfilenamevideo' );

        inputD.addEventListener( 'change', showFileName );

        function showFileName( event ) {
          
          // the change event gives us the input it occurred in 
          var inputD = event.srcElement;
          
          // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
          var fileName = inputD.files[0].name;
          
          // use fileName however fits your app best, i.e. add it into a div
          infoAreaD.textContent = 'File name: ' + fileName;
        }
    </script>

<script>
    var video = document.getElementById('myvideo');
video.load();
video.play();
</script>

<script>
// When webpage will load, everytime below 
// function will be executed
$(document).ready(function () {

// If user clicks on any thumbanil,
// we will get it's image URL
$('.thumbnail img').on({
click: function () {
let thumbnailURL = $(this).attr('src');

// Replace main image's src attribute value 
// by clicked thumbanail's src attribute value
$('.figure').fadeOut(200, function () {
$(this).attr('src', thumbnailURL);
}).fadeIn(200);
}
});

});
</script>

<script>
    function imgfunction(id){
         var url= '<?php echo base_url('ManageEquipments/removeimg');?>';
       $.ajax({
                    url: url,
                    type: 'post',
                    data: {id: id},
                    dataType:'json',
                    success: function(response){
                         setTimeout(function () {
                                $('#alertMessage').hide();
                            }, 4000);
                    }
                 });
    }
$(document).on('click', '.btn_remove', function(){   
var button_id = $(this).attr("id");   
$('#row'+button_id+'').remove(); 
});
    
</script>

<!--// add images -->

<script>
 $(document).ready(function(){
  var k = 4;   
  var i=0; 
      $('#add').click(function(){
        if (i <= k) {   
             
           $('#filesimages').append('<div id="row'+i+'" style="width:100%"><div class="form-group col-md-12 select-border mt-3"><div class="input-group choose-file"><input type="file" name="images[]"  value="" class="form-control fileuploadinput" accept="image/*" id="filesUpload'+i+'" data-val='+i+' ><label for="file-upload" class="input-group-text" id="fileuploadname'+i+'">Choose file</label></div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button></div>');   
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

      });
    }); 
</script>