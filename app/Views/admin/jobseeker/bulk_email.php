<?= view('admin/common/header.php'); ?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .table tbody{
        max-height: 270px;
        overflow: auto;
        height: 100%;
        display: table-caption;
    }
    tbody tr, tbody td{
        width: 100%;
        display: block;
    }

    .table .form-check-label{
        margin-left: 15px;
    }
    .ck-editor__editable {height: 300px;}
</style>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Send email to Jobseeker</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Send email to Jobseeker</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">

    <div class="col-lg-12">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Send email to Jobseeker</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <form id="SendEmail" method="post">
                <div class="row">
                    <div class="col-md-8">
                    <textarea class="ckeditor-classic" name="description" ></textarea>
                        <div id="description_error" class="text-danger"></div>
                    </div>
                    <div class="col-md-4">
                        <h4>Sending Email to Jobseeker</h4><br>
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check">
                                                <input id="checkAll" class="form-check-input" type="checkbox" value="1" >
                                                <label class="form-check-label" for="checkAll">Check All</label>
                                            </div>
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($users as $key => $user) { 
                                            if(isset($selected_ids) && !empty($selected_ids)){
                                                if(in_array($user['id'],$selected_ids)){
                                                    $checked = "checked";
                                                }else{
                                                    $checked = "";
                                                }
                                            }else{
                                                $checked = "";
                                            }
                                        ?>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input name="emails[]" class="form-check-input checkIn" type="checkbox" value="<?= $user['email_id']; ?>" id="cardtableCheck<?= $key; ?>" <?= $checked ?>>
                                                <label class="form-check-label" for="cardtableCheck<?= $key; ?>"><?= $user['email_id']; ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="emails_error" class="text-danger w-100 mt-4"></div>
                    </div>

                    <div class="col-lg-12 mt-3">
                        <div class="hstack gap-2 justify-content-end mb-5">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
                </form>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
</div>
<!--end row-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        ClassicEditor.create( document.querySelector( '.ckeditor-classic' ) )
        .then( editor => {
            editor.ui.view.editable.element.style.height = '300px';
        } )
        .catch( error => {
            console.error( error );
        } );

        $("#checkAll").change(function() {
            if($(this).is(":checked")){
                $('.checkIn').prop('checked',true);
            }else{
                $('.checkIn').prop('checked',false);
            }
        });

        $( "#SendEmail" ).submit(function( event ) {
            event.preventDefault();
            $('.text-danger').html('');
            $.ajax({
                url: "<?= base_url().'/admin/jobseeker/bulk_email' ?>",
                type: "POST",
                data: $("#SendEmail").serialize(),
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

    });
</script>
<?= view('admin/common/footer.php'); ?>