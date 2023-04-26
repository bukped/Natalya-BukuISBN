    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-header">Nama Anggota</h5>

                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#addModal">ADD</button>
                    </div>

                    <!-- MODAL ADD -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Anggota</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?= base_url("Admin/add_anggota"); ?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input name="n_user" type="text" class="form-control" placeholder="Nama User" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">Username</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-user-voice"></i></span>
                                                <input name="uname" type="text" class="form-control" placeholder="Username" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">Passowrd</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bxs-key"></i></span>
                                                <input name="pass" type="password" class="form-control" placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">No Telp</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                                <input name="no_hp" type="number" class="form-control" placeholder="No yang dapat dihubungi" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">Tanggal Lahir</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                <input name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-icon-default-company">Unit</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bx bxs-briefcase"></i></span>
                                                <select name="unit" class="form-control">
                                                    <option value="1">ADM</option>
                                                    <option value="2">Farmasi</option>
                                                    <option value="3">Poli</option>
                                                    <option value="4">Tourmaline</option>
                                                    <option value="5">Kyanit</option>
                                                    <option value="6">Mutiara</option>
                                                    <option value="7">Safir</option>
                                                    <option value="8">Garnet</option>
                                                    <option value="9">Casemix</option>
                                                    <option value="10">P2D</option>
                                                    <option value="11">Medrek</option>
                                                    <option value="12">HC</option>
                                                    <option value="13">GA</option>
                                                    <option value="14">Marketing</option>
                                                    <option value="15">Lab</option>
                                                    <option value="16">HD</option>
                                                    <option value="17">Teknisi</option>
                                                    <option value="18">IBS</option>
                                                    <option value="19">Keuangan</option>
                                                    <option value="20">ICU</option>
                                                    <option value="21">Gizi</option>
                                                    <option value="22">Billing</option>
                                                    <option value="23">Radiologi</option>
                                                    <option value="24">Logistik Farmasi</option>
                                                    <option value="25">IT</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" value="submit" name="btn" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF MODAL ADD -->


                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No.telp</th>
                                <th>Tanggal Lahir</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($u_all as $r) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $r->n_user; ?></td>
                                    <td><?= $r->uname; ?></td>
                                    <td><?= $r->no_hp; ?></td>
                                    <td><?= $r->tgl_lahir; ?></td>
                                    <td><?= $r->n_unit; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUser<?= $r->id; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="<?= base_url('Admin/delete_anggota/' . $r->id); ?>"><i class="bx bx-trash me-1"></i> Nonaktifkan</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- MODAL EDIT -->
                                <div class="modal fade" id="editUser<?= $r->id; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User <?= $r->id; ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= base_url("Admin/update_anggota/" . $r->id); ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                            <input name="n_user" type="text" class="form-control" placeholder="Nama User" value="<?= $r->n_user; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Username</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-user-voice"></i></span>
                                                            <input name="uname" type="text" class="form-control" placeholder="Username" value="<?= $r->uname; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Passowrd</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bxs-key"></i></span>
                                                            <input name="pass" type="password" class="form-control" placeholder="Password" value="<?= $r->pass; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">No Telp</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                                            <input name="no_hp" type="number" class="form-control" placeholder="No yang dapat dihubungi" value="<?= $r->no_hp; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Tanggal Lahir</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                            <input disabled name="tgl_lahir" type="text" class="form-control" placeholder="Tanggal Lahir" value="<?= $r->tgl_lahir; ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-icon-default-company">Unit</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bx bxs-briefcase"></i></span>
                                                            <select name="unit" class="form-control">
                                                                <option value="1">ADM</option>
                                                                <option value="2">Farmasi</option>
                                                                <option value="3">Poli</option>
                                                                <option value="4">Tourmaline</option>
                                                                <option value="5">Kyanit</option>
                                                                <option value="6">Mutiara</option>
                                                                <option value="7">Safir</option>
                                                                <option value="8">Garnet</option>
                                                                <option value="9">Casemix</option>
                                                                <option value="10">P2D</option>
                                                                <option value="11">Medrek</option>
                                                                <option value="12">HC</option>
                                                                <option value="13">GA</option>
                                                                <option value="14">Marketing</option>
                                                                <option value="15">Lab</option>
                                                                <option value="16">HD</option>
                                                                <option value="17">Teknisi</option>
                                                                <option value="18">IBS</option>
                                                                <option value="19">Keuangan</option>
                                                                <option value="20">ICU</option>
                                                                <option value="21">Gizi</option>
                                                                <option value="22">Billing</option>
                                                                <option value="23">Radiologi</option>
                                                                <option value="24">Logistik Farmasi</option>
                                                                <option value="25">IT</option>
                                                                <option value="28">Manager</option>
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