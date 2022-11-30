<?= $this->include('recruiter-header') ?>
<style>
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
<!--=================================
Header -->

<!--=================================
Register -->

<section class="space-ptb-outer bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="user-dashboard-info-box mb-0 manage-table">
          <div class="row mb-2 align-items-center table-desktop">
            <div class="col-md-3 col-sm-5 d-flex align-items-center">
              <div class="form-check theme-col select-all-bg mt-2">
                <input class="form-check-input" type="checkbox" value="1" id="spacecheckid">
                <label class="form-check-label" for="flexCheckDefault">Select All</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-5 d-flex align-items-center justify-content-center">
              <div class="section-title mb-0">
                <h4 class="main-site-title sub-title-bg"><span>Manage Space</span></h4>
              </div>
            </div>
            <div class="col-md-3 col-sm-7 mt-2">
              <div class="delete">
                <input type="submit" value="Delete" id="delete" class="btn btn-primary del-all">
              </div>
            </div>
          </div>
           <div class="row mb-2 align-items-center table-tab">
              <div class="row mx-auto"> 
                    <div class="col-6 d-flex align-items-center">
                      <div class="form-check theme-col select-all-bg mt-2">
                        <input class="form-check-input" type="checkbox" value="1" id="spacecheckid">
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
                  <div class="section-title mb-0 mt-2 mt-sm-0">
              <div class="section-title mb-0">
                <h4 class="main-site-title sub-title-bg"><span>Manage Space</span></h4>
              </div>
            </div>
              </div>
         
            
            
          </div>
          <div class="user-dashboard-table table-responsive">
            <table class="table table-bordered">
              <thead class="bg-light">
                <tr >
                  <th scope="col">Select</th>
                   <th scope="col">Sr. No</th>
                  <th scope="col"><i class="fas fa-pencil-alt me-1"></i>Product Name</th>
                  <th scope="col"><i class="fas fa-rupee-sign me-1"></i>Price</th>
                  <th scope="col"><i class="fas fa-map-marker-alt me-2"></i>Location</th>
                  <th scope="col"><i class="far fa-calendar-alt me-2"></i>Date Posted</th>
                  <th scope="col"><i class="fas fa-hand-point-up me-2"></i>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if(!empty($space)){
                  $i=1;
                  foreach($space as $val){?>
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
                          <li><a  class="text-primary" onclick="MySpaceFunction(<?php if(!empty($val)){ echo $val['id'];}?>);"><i class="far fa-eye"></i></a></li>
                          <li><a  class="text-info" onclick="MySpaceEdit(<?php if(!empty($val)){ echo $val['id'];}?>);"><i class="fas fa-pencil-alt"></i></a></li>
                          <li><a  class="text-danger" onclick="MySpacedelete(<?php if(!empty($val)){ echo $val['id'];}?>);"><i class="far fa-trash-alt"></i></a></li>
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


<!--=================================
Footer-->
<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer-->


<!--=================================
View Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="ViewSpaceForm" tabindex="-1" role="dialog" aria-hidden="true">
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
          <h4>Space Information</h4>
        </div>
        <form class="postjob-form">
            <div class="box">
                <div class="box-body">
                    <div class="row bg-white justify-content-center">
                        <div class="form-group col-md-12 mb-3">
                            <label>Product name</label>
                            <input type="text" name="product_name"  id="product_name" class="form-control" value="ABC" placeholder="Enter a Title" disabled>
                        </div>
<div class="form-group col-md-12 select-border mb-3">
<label>Product Image </label>

<div class="cover-photo cover-edit"  id="getimage">
<i class="fas fa-times-circle cover-photo-icon"></i>
</div>
<div class="thumbnail text-lg-center" id="fileimages"> 
</div>
</div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Price<em class="text-danger">*</em></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex input-right-border">
                                <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" value="" name="price" id="price">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Offer Price<em class="text-danger">*</em></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex input-right-border">
                                <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" placeholder="" value="" name="offer_price" id="offer_price">
                            </div>
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>State<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" placeholder="" value="" name="state" id="state">                
                        </div>
                        <div class="form-group col-md-6 select-border mb-3">
                            <label>City<em class="text-danger">*</em></label>
                            <input type="text" class="form-control" placeholder="" value="" name="city" id="city">                          
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Product Description<em class="text-danger">*</em></label>
                            <textarea class="form-control" rows="2" name="product_description" id="product_description"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Year of Manufacturing</label>
                            <input type="text" name= "year_of_manufacturing" id="year_of_manufacturing" class="form-control" value="2020">
                        </div>
                        <div class="form-group col-md-12 select-border mb-3">
                          <label>Product Video </label>
                          <div class="cover-photo cover-edit" id="getvideo">
                            <i class="fas fa-times-circle cover-photo-icon"></i>
                          </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Area(sq. ft)</label>
                            <input type="text" class="form-control" value="" name="sq_ft" id="sqft">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Concerned Person Name</label>
                            <input type="text" name="concerned_person_name" id="concerned_person_name" class="form-control" value="XYZ">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>Contact</label>
                            <input type="tel" class="form-control" maxlength="11"  value="" name="contact" id="contact">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>E-mail address</label>
                            <input type="email" name="email_address" id="email_address" class="form-control" value="">
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
End View Equipment Details Modal Popup -->

<!--=================================
Edit Equipment Details Modal Popup -->
<div class="modal  modal-right popup-modal show" id="EditJobForm" tabindex="-1" role="dialog" aria-hidden="true">
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
          <h4>Space Information</h4>
        </div>
        <form class="postjob-form" id="spaceform" method="post" enctype="multipart/form-data">
            <div class="box">
                <div class="box-body">
                    <div class="row bg-white justify-content-center">
                        <div class="form-group col-md-12 mb-3">
                            <label>Product name</label>
                            <input type="text" name="product_name"  id="productname" class="form-control" value="ABC" placeholder="Enter a Title" >
                        </div>
                        <div class="form-group col-md-12 select-border" id="filesimages">
                        <label>Product Image </label>
                        <div class="input-group choose-file">
                          <input type="file" name="imagefiles" id="file-upload" class="form-control" value=""  accept="image/*">
                          <label for="file-upload" class="input-group-text" id="file-upload-filename">Choose file </label>
                        </div>
                        <div class="addmore">
                          <button type="button" name="add" id="add" class="btn btn-secondary main-btn">Add</button>
                        </div>
                         <span id="uploadimg"></span>
                          <div class="thumbnail text-lg-center" id="fileimage2">  
                       
                        </div>
                        
                      </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Price<em class="text-danger">*</em></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex input-right-border">
                                <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" value="" name="price" id="getprice">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Offer Price<em class="text-danger">*</em></label>
                            <div class="input-group">
                              <div class="input-group-prepend d-flex input-right-border">
                                <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                              </div>
                              <input type="text" class="form-control" placeholder="" value="" name="offer_price" id="offerprice">
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
                            <textarea class="form-control" rows="2" name="product_description" id="productdescription"></textarea>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label>Year of Manufacturing</label>
                            <input type="text" name= "year_of_manufacturing" id="manufacturing" class="form-control" value="">
                        </div>
                        <div class="form-group col-md-12 select-border mb-3">
                        <label>Product Video </label>
                        <div class="input-group choose-file">
                          <input type="file" name="videofiles" class="form-control" name="video" id="file-upload-video" accept="video/*" />
                          <label for="file-upload-video" class="input-group-text" id="file-upload-filename-video">Choose file </label> 
                        </div>
                        <span id="uploadvideos"></span>
                      </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Area(sq. ft)</label>
                            <input type="text" class="form-control" value="" name="sq_ft" id="sq_ft">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label>Concerned Person Name</label>
                            <input type="text" name="concerned_person_name" id="person_name" class="form-control" value="XYZ">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>Contact</label>
                            <input type="tel" class="form-control" maxlength="10"  value="" name="contact" id="getcontact">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label>E-mail address</label>
                            <input type="email" name="email_address" id="email_id" class="form-control" value="">
                        </div>
                             <input type="hidden" name="id" id="userid">
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
Delete Modal Popup -->
<div class="modal  modal-right popup-modal show" id="deletepopup" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body ">
            <div class="delete-btn">
                <h2>Really want to Delete ?</h2>
                <input type="hidden" name="spaceid" id="spaceid">
                <ul class="list-unstyled">
                     <li>
                         <input class="btn btn-secondary" type="button" value="Delete" onclick="mydeletfunction()">
                     <!--<button type="button" class="btn btn-danger">Delete</button>-->
                     </li>
                     <li>
                         <input class="btn btn-primary-dark" type="button" value="Cancel" data-bs-dismiss="modal" aria-label="Close">
                         <!--<button type="button"  data-bs-dismiss="modal" aria-label="Close">Cancel</button>-->
                    </li>
                </ul>
            </div>
      </div>
    </div>
  </div>
</div>
<!--=================================
Delete Modal Popup Modal Popup -->


<!--=================================
Javascript -->
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

<!-- // view modal -->
<script>
  function MySpaceFunction(id){
    var url= '<?php echo base_url('ManageSpace/GetSpace');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      console.log(data);
                      var val="";  
                       $('#city').val(data['city_name']);
                       $('#concerned_person_name').val(data['concerned_person_name']);
                       $('#contact').val(data['contact']);
                       $('#sqft').val(data['area_sq_ft']);
                       $('#email_address').val(data['e-mail_address']);
                       $('#file_image').val(data['file_image']);
                       $('#file_video').val(data['file_video']);
                       $('#product_description').val(data['product_description']);
                       $('#product_name').val(data['product_name']); 
                       $('#price').val(data['product_price']);
                       $('#state').val(data['state_name']);
                       $('#year_of_manufacturing').val(data['year_of_manufacturing']);
                       $('#offer_price').val(data['offer_price']);
                       
                       $('#getimage').html('<img src="<?php echo base_url('/public/uploads/spaceimages');?>/'+data['file_image']+'" />');
                          if(data['file_video'].length >0){
                         var video='';        
                       video += '<video id="myvideo" controls>';
                       video += '<source  src="<?php echo base_url('/public/uploads/spacevideo');?>/'+data['file_video']+'" type="video/mp4"/>';
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
                                   images += '<img src="<?php echo base_url('/public/uploads/Spaceimages');?>/'+vals['images']+'" />';
                                   });
                                    $('#fileimages').html(images);
                                }); 
                            }else{
                               $('#fileimages').html('');  
                            }
                       
                      $("#ViewSpaceForm").modal('show');                   
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                }); 
  }
</script>
<!-- // edit modal -->
<script>
  function MySpaceEdit(id){
    var url= '<?php echo base_url('ManageSpace/GetSpace');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                        // Check Session save                    
                      console.log(data);
                      var val="";
                      $('#getcity').val(data['city_name']);
                       $('#person_name').val(data['concerned_person_name']);
                       $('#getcontact').val(data['contact']);
                       $('#sq_ft').val(data['area_sq_ft']);
                       $('#email_id').val(data['e-mail_address']);
                       $('#productdescription').val(data['product_description']);
                       $('#productname').val(data['product_name']); 
                       $('#getprice').val(data['product_price']);
                       $('#getstate').val(data['state_name']);
                       $('#manufacturing').val(data['year_of_manufacturing']);
                       $('#offerprice').val(data['offer_price']);
                       $('#uploadimg').html('<img src="<?php echo base_url('/public/uploads/spaceimages');?>/'+data['file_image']+'" />');
                       $('#userid').val(data['id']);
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
                            //images
                             if(data['images_name'].length> 0){
                                 var image='';
                                $.each(data['images_name'], function(key, val){
                                   $.each(val, function(key, vals){
                                    image+='<div id="row'+vals['id']+'">';   
                                    image+='<button type="submit" id="'+vals['id']+'" class="close btn btn-danger btn_remove" onclick=imgfunction('+vals['id']+');><span>&times;</span></button>';   
                                    image += '<img src="<?php echo base_url('/public/uploads/Spaceimages');?>/'+vals['images']+'" />';
                                   image+='</div>';
                                       
                                   });
                                     $('#fileimage2').html(image);
                                }); 
                            }else{
                                 $('#fileimage2').html('');
                            } 
                             if(data['file_video'].length >0){
                         var video='';        
                       video += '<video id="myvideo" controls>';
                       video += '<source  src="<?php echo base_url('/public/uploads/spacevideo');?>/'+data['file_video']+'" type="video/mp4"/>';
                       video += '</video>';
                       $("#uploadvideos").html(video);
                        }else{
                         $("#uploadvideos").html('');   
                        }
                          
                          $("#EditJobForm").modal('show');                   
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
    $('#spaceform').on('submit', function(event){ 
      event.preventDefault(); 
       $('.overlay-loader').addClass('active').html('<div class="loader loader-1"><div class="loader-outter"></div><div class="loader-inner"></div></div>');
var formData = new FormData(this);
  var url= '<?php echo base_url('ManageSpace/EditSpace');?>';
  $.ajax({
                    type: "post",
                    url:  url,
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success:function(data){
                     console.log(data);                     
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
  var id  =$('#spaceid').val();
  var url= '<?php echo base_url('ManageSpace/deletedata');?>'
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
<!-- // popup delete function -->
<script>
  function MySpacedelete(id){
    var url= '<?php echo base_url('ManageSpace/GetSpace');?>';
    $.ajax({
                    type: "post",
                    url:  url,
                    data:{id:id},
                    dataType:'json',
                    success:function(data){
                      var val=""; 
                      $('#spaceid').val(data['id']);                       
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
        $("#spacecheckid").change(function(){
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
               $("#spacecheckid").prop("checked", true);
           } else {
               $("#spacecheckid").prop("checked",false);
           }

        });
        // Delete button clicked
        $('#delete').click(function(){
          var url= '<?php echo base_url('ManageSpace/multidelete');?>';
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
                      //  Remove <tr>
                      //  $(".checkbox:checked").each(function(){
                      //      var userid = $(this).val();
                      //      console.log(userid);
                      //      $('#tr_'+userid).remove();
                      //  });

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

<script>
var video = document.getElementById('myvideos');
video.src = videoFile;
video.load();
video.play();
</script>
<script>
    function imgfunction(id){
         var url= '<?php echo base_url('ManageSpace/removeimg');?>';
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
<script>
 $(document).ready(function(){
  var k = 4;   
  var i=0; 
      $('#add').click(function(){
        if (i <= k) {   
             
           $('#filesimages .thumbnail').before('<div id="row'+i+'"><div class="form-group col-md-12 select-border mt-3"><div class="input-group choose-file"><input type="file" name="images[]"  value="" class="form-control fileuploadinput" accept="image/*" id="filesUpload'+i+'" data-val='+i+' ><label for="file-upload" class="input-group-text" id="fileuploadname'+i+'">Choose file</label></div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');   
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


