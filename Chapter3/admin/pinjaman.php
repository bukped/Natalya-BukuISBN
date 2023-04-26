    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-header">Daftar Pinjaman</h5>

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
                                <th>Action</th>
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
                                    <!-- <td><?= $r->tgl_bts_pembayaran; ?></td> -->
                                    <td>
                                        <a style="color: white;" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPinjaman<?= $r->id_pinjaman; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    </td>
                                </tr>
                                <!-- MODAL EDIT -->
                                <div class="modal fade" id="editPinjaman<?= $r->id_pinjaman; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pinjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= base_url("Admin/update_pinjaman/" . $r->id_pinjaman); ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <input disabled name="n_user" type="text" class="form-control" placeholder="Nama User" value="<?= $r->n_user; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Nominal</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-user-voice"></i></span>
                                                            <input disabled name="nominal" type="text" class="form-control" placeholder="Nominal" value="<?= $r->nominal; ?>" />
                                                        </div>
                                                    </div>
                                                    <!-- <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Masa Kerja</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                                            <input name="masa_kerja" type="text" class="form-control" placeholder="masa_kerja" value="<?= $r->masa_kerja; ?>" />
                                                        </div>
                                                    </div> -->
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Keperluan</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                                            <input name="kebutuhan" type="text" class="form-control" placeholder="Keperluan" value="<?= $r->kebutuhan; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Jaminan</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bxs-briefcase"></i></span>
                                                            <select name="jaminan" class="form-control">
                                                                <option value="Emas">Emas >= 1 gram</option>
                                                                <option value="Elektronik">Elektronik</option>
                                                                <option value="BPKB">BPKB Kendaraan</option>
                                                                <option value="Surat Tanah">Surat Tanah</option>
                                                                <option value="Surat Rumah">Surat Rumah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <input type="file" class="form-control bg-light border-0" name="gambar" required>
                                                            <label for="name">Gambar</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Jangka Waktu</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bxs-briefcase"></i></span>
                                                            <select name="waktu" class="form-control">
                                                                <option value="3">3 Bulan</option>
                                                                <option value="6">6 Bulan</option>
                                                                <option value="10">10 Bulan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" value="submit" name="btn" class="btn btn-warning">Edit</button>
                                                </form>
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