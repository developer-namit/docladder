<?= $this->include('recruiter-header') ?>

<!--=================================
Header -->
<style>
    .postjob-form .note-editor .btn ,.postjob-form .note-editor .btn.btn-sm {
    padding: 5px!important;
    font-size:16px;
}
</style>
<!--=================================
Slider Banner -->
<section class="inner-banner" style="background-image: url(<?=base_url();?>/public/assets/images/bg-slider/inner-banner.png);" id="homepage-banner">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center position-relative inner-slider-heading-main">
        <h1>Send Mail</h1>
      </div>
      </div>
    </div>
</section>
<!--=================================
Slider Banner -->

<!--=================================
Signin -->
<section class="space-ptb bg-light-white" id="login-form">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="login-register">
             <span id="alertMsg"></span>
          <fieldset>
            <legend class="px-2">or fill out with</legend>
                <div class="tab-content p-4">
                <form class="postjob-form" id="emailform" method="post" enctype="multipart/form-data">
                <div class="row">
                          <div class="mb-3 col-12">
                            <label class="form-label" for="Email2">To</label>
                            <?php if(!empty(session()->get('get_email'))){
                              $var= implode(", ",session()->get('get_email'));
                              ?>
                            <input type="text" name="toemail" value="<?=$var;?>" class="form-control" id="toemail">
                            <?php }                     
                           ?>    
                            </div>
                          <div class="mb-3 col-12">
                            <label class="form-label" for="password2">Text*</label>
                            <textarea id="summernote" name="textemail" class="form-control" >
                            </textarea>
                          </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="mt-3 mb-3 col-12 text-center">
                              <input class="btn btn-primary main-btn" id="submit" type="submit" value="Send">
                          </div>
                        </div>
                      </form>
                </div>
          </fieldset>
          

        </div>
      </div>
    </div>
  </div>
</section>


<!--=================================
Signin -->

<!--=================================
Footer-->
<?= $this->include('recruiter-footer') ?>
<!--=================================
Footer-->
<script>
  $(document).ready(function(){
    $('#emailform').on('submit', function(event){ 
    event.preventDefault(); 
    var arr = [];
    var formto= $("#toemail").val();
  let formtext= $("#textemail").val();
  var url= '<?php echo base_url('RecruiterSimpleSearch/sendmail');?>'; 
    $.ajax({
                    type: "post",
                    url:  url,
                    cache: false,
                   data:{formto:formto,formtext:formtext},            
                    dataType: "JSON",
                    success:function(response){
                     console.log(response);
                    if(response.success==true){
                         $('#alertMsg').html(response.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "green");
                                window.location.replace('<?php echo session()->get('url');?>');
                             }else if(response.success==false){
                              $('#alertMsg').html(response.msg);
                                $('#alertMessage').show();
                                $('#alertMsg').css("color", "red");
                            }
                    },
                    error:function(err){
                    console.log('Erro',err)
                    }
                });
    });
});

</script>

  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
       $('textarea#summernote').summernote({
        tabsize: 2,
        height: 200,
  toolbar: [
        ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
      ],
       callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        $.delete(target[0].src);
                    }
                }
      });

    </script>

