<?= $this->include('header') ?>
<style>
    img{
        width:100%;
    }
  
.single-property-tab-slider .nav-link {
    padding: 0;
}
.thumbnail img,.thumbnail iframe{
    width:90px!important;
    height:90px!important;
}
.thumbnail{
    margin-top:20px;
}
video#myvideo {
    width: 100%;
   left: 50%;
    max-height: 100%;
    max-width: 100%;
    position: relative;
    top: 50%;
    -webkit-transform: translate3d(-50%, -50%, 0);
    -ms-transform: translate3d(-50%, -50%, 0);
    -o-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, 0%, 0);
    transition-duration: 0.3s;
    transition-property: width, height, top, left;
    vertical-align: middle;
    width: auto;
    height: 350px;
    padding: 20px;
}
.single-property-tab-content img {
   left: 50%;
    max-height: 100%;
    max-width: 100%;
    position: relative;
    top: 50%;
    -webkit-transform: translate3d(-50%, -50%, 0);
    -ms-transform: translate3d(-50%, -50%, 0);
    -o-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, 0%, 0);
    transition-duration: 0.3s;
    transition-property: width, height, top, left;
    vertical-align: middle;
    width: auto;
    height: 350px;
    padding: 20px;
}
.single-property-tab-content {
    border: 1px solid #DBDBDB;
    box-sizing: border-box;
    border-radius: 3px;
    height: 350px;
}
.thumbnail img {
    padding: 0px; 
}
</style>
<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?=base_url('public/assets');?>/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative about-banner inner-slider-heading-main">
        <h2>Great Deals on Instruments,<br/>
         Equipment's from Best Brands</h2>
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<section class="space-ptb bg-light-white" id="product-details">
  <div class="container">
    <div class="row product-details mb-3 mb-lg-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5">
                           
                         <div class="single-property-area">
                                <div class="single-property-tab-content tab-content figure d-block">
                                    <div class="tab-pane active" role="tabpanel" id="example1"
                                        aria-labelledby="image-1-tab">
                                        <!--<img src="img/property/property-tab-large-1.jpg" alt="">-->
                                        <img  src="<?=base_url('/public/uploads/equipmentimages/');?>/<?php if(!empty($equipment['file_image'])) { echo $equipment['file_image']; }?>" width="100%" />
                                    </div>
                                    <?php if(!empty($equipment['images'])){
                                            foreach($equipment['images'] as $key=> $img){?> 
                                    <div class="tab-pane" role="tabpanel" id="ex<?= $key+1 ?>"
                                        aria-labelledby="image-1-tab">
                                        <!--<img src="img/property/property-tab-large-1.jpg" alt="">-->
                                        <img src="<?=base_url('public/uploads/Equipmentimages');?>/<?php if(!empty($img)){ echo $img; }?>" width="100%" />
                                    </div>
                                    
                                <?php }}?>
                                    <div class="tab-pane"  role="tabpane2" id="example2"
                                        aria-labelledby="image-1-tab">
                                        <!--<img src="img/property/property-tab-large-1.jpg" alt="">-->
                                        <?php
                                            $file_video = "";
                                            if(!empty($equipment['file_video']))
                                            {
                                                $video_url = $equipment['file_video'];
                                            }else{
                                                $video_url = base_url('/public/uploads/equipmentvideos');
                                            }
                                        ?>
                                        <!--<video id="video" src="<?= $video_url ?>">-->
                                            <video  id="myvideo" controls poster="/images/w3html5.gif" src="<?php echo base_url('/public/uploads/equipmentvideos');?>/<?php if(!empty($equipment['file_video'])){ echo $equipment['file_video']; }?>"></video>
                                    </div>
                                </div>
                                <div class="indicator-style2 thumbnail" style="display:flex;">
                                    <div class="nav-item"><a class="prev-icon" 
                                            data-toggle="tab" role="tab" aria-controls="image-1"
                                            aria-selected="true">
                                           <img  src="<?=base_url('/public/uploads/equipmentimages/');?>/<?php if(!empty($equipment['file_image'])){ echo $equipment['file_image']; }?>"
                                            data-target="#example1" /> 
                                        
                                        </a>
                                    </div>
                                    
                                    <?php if(!empty($equipment['images'])){
                                       
                                            foreach($equipment['images'] as $key=> $img){?> 
                                    <div class="nav-item"><a class="prev-icon" 
                                            data-toggle="tab" role="tab" aria-controls="image-1"
                                            aria-selected="true">
                                            <img src="<?=base_url('public/uploads/Equipmentimages');?>/<?php if(!empty($img)){ echo $img; }?>" 
                                            data-target="#ex<?= $key+1  ?>"> 
                                        
                                    </a>
                                    </div>
                                <?php }}?>
                                <?php if(!empty($equipment['file_video'])){?>
                                     <div class="nav-item"><a class="prev-icon"
                                            data-toggle="tab" role="tab" aria-controls="image-1"
                                            aria-selected="true">
                                         <img src="<?=base_url('public/assets/images');?>/blackvideo.jpg" data-target="#example2">
                                         
                                        
                                        </a>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                           
                        <!--<div class="images">-->
                        <!--    <div class="text-center product-border p-4 mb-3 figure">-->
                        <!--     <img id="main-image" src="<?=base_url('/public/uploads/equipmentimages/');?>/<?php if(!empty($equipment['file_image'])){ echo $equipment['file_image']; }?>" width="100%" /> -->
                             
                        <!--     </div>-->
                        <!--    <div class="thumbnail"> -->
                        <!--    <?php if(!empty($equipment['file_video'])){?>-->
                                
                              
                        <!--        <iframe  onclick="change_image(this)"  src="<?php echo base_url('/public/uploads/equipmentvideos');?>/<?php if(!empty($equipment['file_video'])){ echo $equipment['file_video']; }?>" allowfullscreen=""></iframe>-->
                        <!--        <?php }?>-->
                                
                        <!--    <img onclick="change_image(this)" src="<?=base_url('/public/uploads/equipmentimages/');?>/<?php if(!empty($equipment['file_image'])) { echo $equipment['file_image']; }?>" >-->
                                 
                        <!--    <img onclick="change_image(this)" src="<?=base_url('public/uploads/Equipmentimages');?>/<?php if(!empty($img)){ echo $img; }?>" > -->
                               
                        <!--    </div>-->
                            
                        <!--</div>-->
                    </div>
                    
                    <div class="col-lg-7">
                        <div class="product-name mt-4 mt-lg-0 ms-lg-3">
                            <h5 class="text-capital"><span><?php if(!empty($equipment['product_name'])){echo $equipment['product_name']; }?></span></h5>
                            <div class="product-subtitle mt-2 mb-2 mb-lg-3"> <span class="text-capital"><?php if(!empty($equipment['product_name'])){echo $equipment['product_name']; }?></span></div>
                            <p class="about">Sold by <strong><?php if(!empty($equipment['concerned_person_name'])){echo $equipment['concerned_person_name']; }?></strong> and Fulfilled by <strong>Docladder</strong></p>
                            <p class="about">SKU <strong><?php if(!empty($equipment['sku'])){echo $equipment['sku']; }?></strong></p>
                            <ul class="d-flex list-unstyled about">
                                <li>GST 12% Inclusive Price :</li>
                                <li>HSN Code: 90191090</li>
                            </ul>
                            <div class="price d-flex flex-row align-items-center"> <span class="act-price">₹<?php if(!empty($equipment['product_price'])){echo $equipment['product_price']; }?></span>
                                <!--<div class="ml-2 ms-3"> <small class="dis-price">₹<?php if(!empty($equipment['product_price'])){echo $equipment['product_price']; }?></small> </div>-->
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="product-btn pt-lg-4 me-4 mt-3">
                                <input type="hidden" id="productname" value="<?php if(!empty($equipment['product_name'])){echo $equipment['product_name']; }?>">
                                <input type="hidden" id="productprice" value="<?php if(!empty($equipment['product_price'])){echo $equipment['product_price']; }?>">
                                <input type="hidden" id="personame" value="<?php if(!empty($equipment['concerned_person_name'])){echo $equipment['concerned_person_name']; }?>">
                                <input type="hidden" id="description" value="<?php if(!empty($equipment['product_description'])){echo $equipment['product_description']; }?>">
                                <input type="hidden" id="contact" value="<?php if(!empty($equipment['contact'])){echo $equipment['contact']; }?>">
    
                            
                                <button class="btn btn-primary main-btn" id="btnreinfo" onclick ="sendQuery('<?=$equipment['id']?>','<?=$equipment['e-mail_address']?>')">Send Enquiry</button>                     
                                </div>
                                <div class="product-btn pt-lg-4 mt-3">
                                    <a href="<?=base_url('contact');?>"><input class="btn btn-secondary main-btn" type="button" value="Get in Touch"></a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    <div class="row product-description">
      <div class="col-md-12">
        <div class="browse-job d-flex">
          <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="tab-01" data-bs-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="true">Specifications</a>
            </li>
            
          </ul>
        </div>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane product-details-description fade show active" id="specifications" role="tabpanel" aria-labelledby="tab-01">
              <div class="row align-items-center mb-lg-2">
                  <div class="col-3 col-md-4 desc-title"><p>Country of Origin</p></div>
                  <div class="col-1 col-md-1 text-center text-dark">:</div>
                  <div class="col-8 col-md-7 desc-data"><p><?php if(!empty($equipment['country_name'])){echo $equipment['country_name']; }?></p></div>
              </div>
              <div class="row align-items-center mb-lg-2">
                  <div class="col-3 col-md-4 desc-title"><p>Description</p></div>
                  <div class="col-1 col-md-1 text-center text-dark">:</div>
                  <div class="col-8 col-md-7 desc-data"><p><?php if(!empty($equipment['product_description'])){echo $equipment['product_description']; }?></p></div>
              </div>
              <div class="row align-items-center">
                  <div class="col-3 col-md-4 desc-title"><p>Seller</p></div>
                  <div class="col-1 col-md-1 text-center text-dark">:</div>
                  <div class="col-8 col-md-7 desc-data"><p><?php if(!empty($equipment['concerned_person_name'])){echo $equipment['concerned_person_name']; }?></p></div>
              </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</section>


<!--=================================
Footer-->
<?= $this->include('footer') ?>
<script>
$(".single-property-tab-slider").owlCarousel({
    autoplay: false,
    smartSpeed: 2000,
    dots: false,
    nav: false,
    items: 6,
    margin: 20,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    responsive: {
      0: {
        items: 1,
      },
      320: {
        items: 2,
      },
      479: {
        items: 3,
      },
      767: {
        items: 4
      }
    }
  });
  
  
  $(document).ready(function(){
//   var filteredContent = $('.figure img');
//   console.log("filteredContent", filteredContent)
  
$('.figure:first-child').addClass('active');
  $('.thumbnail img').on('click', function(){
    // $('.figure img').removeClass('active');
    $(this).addClass('active');
    var $dataType = $(this).attr('data-target');
    // filteredContent.show();
    $($dataType).show().siblings(".tab-pane").hide();
    $(this).siblings().hide();
  });
  
})
  
  
  
   $(document).ready(function(){
//   var filteredContent = $('.figure iframe');
  $('.thumbnail iframe').on('click', function(){
    $(this).addClass('active');
    var $dataType = $(this).attr('data-target');
    // filteredContent.show();
    $($dataType).show().siblings(".tab-pane").hide();
    // $(this).siblings().hide();
  });
})
$(document).ready(function () {

// If user clicks on any thumbanil,
// we will get it's image URL
// $('.thumbnail iframe').on({
// click: function () {
// let thumbnailURLL = $(this).attr('src');
// console.log("thumbnailURLL");
// // Replace main image's src attribute value 
// // by clicked thumbanail's src attribute value
// $('.figure iframe')function () {
// $(this).attr('src', thumbnailURLL);
// }).fadeIn(200);
// }
// });


});
  </script>
<script>
function sendQuery(id, email){    
 var product_name=$("#productname").val();
 var product_price=$("#productprice").val();
 var product_personame=$("#personame").val();
 var product_description=$("#description").val();
 var product_contact=$("#contact").val();
  var url= '<?=base_url();?>'
    $.ajax({
    type: "post",
    url: url +'/EquipmentsProduct/sendquery',
    data: {id:id, email:email,productname:product_name, price:product_price, personame:product_personame, description:product_description, contact:product_contact},
    dataType: "json",
    beforeSend:function(){
        $('#btnreinfo').attr('disabled', 'disabled');
    },
    success: function (response) {
        console.log(response);
        $('#btnreinfo').attr('disabled', false);
        $('#btnreinfo').remove('btn-secondary');
        $('#btnreinfo').addClass('custom-button');
        $('#btnreinfo').text('Mail Sent');
        $("#btnreinfo").css({"background-color": "grey", "border": "aliceblue"});

    },
    error: function(error){
     console.log(error); 
   }

 });

 } 

</script>

<script>
var video = document.getElementById('myvideo');
video.src = videoFile;
video.load();
video.play();
</script>

<script>
    $(document).ready(function(){
        var url = $('input:file').val();
        console.log(url);
        $('input:file').val(url);
});
</script>

<script>
// When webpage will load, everytime below 
// function will be executed
$(document).ready(function () {

// If user clicks on any thumbanil,
// we will get it's image URL
// $('.thumbnail img,.thumbnail video').on({
// click: function () {
// let thumbnailURL = $(this).attr('src');
// console.log("el", $(this));
// Replace main image's src attribute value 
// by clicked thumbanail's src attribute value

    // $('.figure img').fadeOut(200, function () {
    // $(this).attr('src', thumbnailURL);
    // }).fadeIn(200);
// if(type == "image"){
//     }else if(type == "video"){
//         let HTML = `<div class="tab-pane fade show active" id="image-1" role="tabpanel" aria-labelledby="image-1-tab">
//                         <iframe controls poster="/images/w3html5.gif"
//                               id="video"  
//                               src="${src}" allowfullscreen=""></iframe>
//                     </div>`;
//         console.log("HTML",HTML)
//         $('.figure').html(HTML);
//     }
// }
// });


});

function change_image(as){
    console.log("change_image methode invoke");
}


</script>


