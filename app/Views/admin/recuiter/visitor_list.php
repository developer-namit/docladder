<?= view('admin/common/header.php'); ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Visitor List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Visitor List</li>
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
                <h4 class="card-title mb-0 flex-grow-1">Visitor List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <?php
                    if (!empty($users)) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Contact no.</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $value) {
                                        //print'<pre>';print_r($value);die();   
                                    ?>
                                        <tr>
                                            <td class="fw-medium"><?= $value['id']; ?></td>
                                            <td><?= $value['name']; ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td><?= $value['phone']; ?></td>
                                            <td><?= date("Y/m/d", strtotime($value['created_date'])); ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

                            <?php if ($pager) : ?>
                                <?= $pager->links() ?>
                            <?php endif ?>

                        </div>
                    <?php } else { ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                No visitor found.
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
</div>
<!--end row-->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<?= view('admin/common/footer.php'); ?>