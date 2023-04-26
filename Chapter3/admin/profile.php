<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Profil Saya</h5>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= base_url('assets/img/profile/' . $u_log['image']); ?>" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5 class="card-title">Nama: </h5>
                                                        <h5 class="card-title">No.hp: </h5>
                                                        <h5 class="card-title">Tanggal lahir: </h5>
                                                        <h5 class="card-title">Unit:</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5 class="card-title"><?= $u_log['n_user']; ?></h5>
                                                        <h5 class="card-title"><?= $u_log['no_hp']; ?></h5>
                                                        <h5 class="card-title"><?= $u_log['tgl_lahir']; ?></h5>
                                                        <h5 class="card-title"><?= $u_log['unit']; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?= base_url('assets/vendor/'); ?>assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->