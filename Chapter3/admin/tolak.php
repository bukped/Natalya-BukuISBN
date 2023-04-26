    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-header">List Pinjaman Ditolak</h5>

                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Jangka Waktu</th>
                                <!-- <th>Masa Kerja</th> -->
                                <th>Keperluan</th>
                                <th>Jaminan</th>
                                <th>Gambar</th>
                                <th>Tgl Pinjaman</th>
                                <!-- <th>Tgl Batas Pembayaran</th> -->
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($u_all as $r) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $r->n_user; ?></td>
                                    <td><?= $r->nominal; ?></td>
                                    <td><?= $r->waktu; ?></td>
                                    <!-- <td><?= $r->masa_kerja; ?></td> -->
                                    <td><?= $r->kebutuhan; ?></td>
                                    <td><?= $r->jaminan; ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/' . $r->gambar); ?>" style="width:100px">
                                    </td>
                                    <td><?= $r->tgl_pinjaman; ?></td>
                                    <!-- <?= $r->tgl_bts_pembayaran; ?></td> -->
                                </tr>
                                <!-- MODAL EDIT -->
                                <div class="modal fade" id="acc<?= $r->id_pinjaman; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Setujui Pinjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda menyetujui pinjaman ini?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a type="submit" href="<?= base_url('Admin/acc/' . $r->id_pinjaman); ?>" class="btn btn-warning">Acc</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="tolak<?= $r->id_pinjaman; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tolak Pinjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Apakah anda menolak pinjaman ini?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a type="submit" href="<?= base_url('Admin/tolak/' . $r->id_pinjaman); ?>" class="btn btn-danger">Tolak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF MODAL EDIT -->
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / Content -->