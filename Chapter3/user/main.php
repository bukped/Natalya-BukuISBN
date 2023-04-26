    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Selamat datang, <?= $u_log['uname']; ?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Halaman</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">User</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <?= $this->session->flashdata('message'); ?>
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="<?= base_url('assets/img/profile/' . $u_log['image']); ?>" alt="">
                        <h4><?= $u_log['n_user']; ?></h4>
                        <p><?= $u_log['n_unit']; ?></p>
                        <script type="text/javascript">
                            window.onload = function() {
                                jam();
                            }

                            function jam() {
                                var a = document.getElementById('jam');
                                d = new Date(), h, m, s;
                                var h = d.getHours();
                                var m = set(d.getMinutes());
                                var s = set(d.getSeconds());

                                a.innerHTML = h + ":" + m + ":" + s;
                                setTimeout('jam()', 1000);
                            }

                            function set(a) {
                                a = a < 10 ? '0' + a : a;
                                return a;
                            }
                        </script>
                        <h1 style="font-size: 55px;" id="jam" class="ms-auto"></h1>
                        <h4 class="ms-auto mb-3"><?php
                                                    function tgl_indo($tanggal)
                                                    {
                                                        $bulan = array(
                                                            1 =>   'Januari',
                                                            'Februari',
                                                            'Maret',
                                                            'April',
                                                            'Mei',
                                                            'Juni',
                                                            'Juli',
                                                            'Agustus',
                                                            'September',
                                                            'Oktober',
                                                            'November',
                                                            'Desember'
                                                        );
                                                        $pecahkan = explode('-', $tanggal);


                                                        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                                                    }

                                                    echo tgl_indo(date('Y-m-d'));
                                                    ?></h4>
                        <a class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#detailUModal">
                            Detail
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                                <img class="img-fluid mb-4 no-select" src="<?= base_url('assets/img/Koperasi/icons/loan.png'); ?>" alt="">
                                <h4 class="mb-3">Pengajuan Pinjaman</h4>
                                <!-- <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p> -->
                                <a class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#modalPinjaman">
                                    Selanjutnya
                                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                                <a class="btn btn-outline-primary px-3 mt-3" data-bs-toggle="modal" data-bs-target="#modalPersyaratan">
                                    Info

                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                                <img class="img-fluid mb-4" src="<?= base_url('assets/img/Koperasi/icons/piggy.png'); ?>" alt="">
                                <h4 class="mb-3">Tabungan Koperasi</h4>
                                <!-- <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p> -->
                                <a class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#modalSimpanan">
                                    Selanjutnya
                                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                                <h4 class="mb-5">Laporan</h4>
                                <!-- <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p> -->
                                <a class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#modalLaporan">
                                    Simpanan
                                </a>
                                <a class="btn btn-outline-primary px-3 mt-3" data-bs-toggle="modal" data-bs-target="#modalLaporanPinjaman">
                                    Pinjaman
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 pt-4 justify-content-center">
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                                <img class="img-fluid mb-4" src="<?= base_url('assets/img/Koperasi/icons/deposit.png'); ?>" alt="">
                                <h4 class="mb-3">Deposito</h4>
                                <!-- <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p> -->
                                <a class="btn btn-outline-primary px-3" href="">
                                    Selanjutnya
                                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                                <img class="img-fluid mb-4" src="<?= base_url('assets/img/Koperasi/icons/credit.png'); ?>" alt="">
                                <h4 class="mb-3">Catat Cicilan Koperasi</h4>
                                <!-- <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p> -->
                                <a class="btn btn-outline-primary px-3" href="">
                                    Selanjutnya
                                    <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Service End -->

    <!-- modal sect -->

    <!-- Modal Detail -->
    <div class="modal fade" id="detailUModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-primary table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td><?= $u_log['n_user']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Unit</th>
                                <td><?= $u_log['n_unit']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Roles</th>
                                <td><?= $u_log['n_role']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Member sejak</th>
                                <td><?= tgl_indo(date("Y-m-d", strtotime($u_log['date_created']))); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Detail End -->

    <!-- Modal Pinjam -->
    <div class="modal fade" id="modalPinjaman" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Pengajuan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url("User/ajukan/" . $u_log['id'] . "/" . $u_log['unit']); ?>">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control bg-light border-0" name="nominal" placeholder="inputkan Nominal...." id="nomi" oninput="hitung(this.value)" onchange="hitung(this.value)" required>
                                    <label for="name">Nominal Keperluan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select form-control bg-light border-0" name="waktu" id="waktu" onchange="hitung(this.value)" required>
                                        <option value="1" hidden>Pilih Jangka Waktu Cicilan</option>
                                        <option value="3">3 Bulan</option>
                                        <option value="6">6 Bulan</option>
                                        <option value="10">10 Bulan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" id="cicil" class="form-control bg-light border-0" name="cicilan" readonly placeholder="inputkan Nominal...." required>
                                    <label for="name">Cicilan</label>
                                </div>
                            </div>
                            <script>
                                function hitung(valNum) {
                                    document.getElementById("cicil").value = Math.round(document.getElementById("nomi").value / document.getElementById("waktu").value + (document.getElementById("nomi").value * 0.025));

                                }
                            </script>
                            <!-- <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" name="masa_kerja" placeholder="Input Masa Kerja...." required>
                                    <label for="name">Masa Kerja|<i>cth: 2</i></label>
                                </div>
                            </div> -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control bg-light border-0" name="kebutuhan" placeholder="Input Masa Kerja...." required>
                                    <label for="name">Keperluan Pinjaman</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select form-control bg-light border-0" name="jaminan" id="jaminan" required>
                                        <option value="1" hidden>Jaminan</option>
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
                                    <label for="name">Foto Jaminan</label>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="form-floating">
                                    <input type="date" min="<?php $a =  date('Y-m-d');
                                                            echo $a; ?>" class="form-control bg-light border-0" name="tgl_pinjaman" required>
                                    <label for="name">Tgl Pinjaman</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="date" min="<?php $a =  date('Y-m-d');
                                                            echo $a; ?>" class="form-control bg-light border-0" name="tgl_bts_pembayaran" required>
                                    <label for="name">Tgl Batas Pembayaran</label>
                                </div>
                            </div> -->
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" value="submit" name="btn" class="btn btn-primary">Ajukan</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Modal Pinjam End -->

    <!-- Modal Simpan -->
    <div class="modal fade" id="modalSimpanan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Tabungan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url("User/simpan/" . $u_log['id']); ?>">
                        <div class="row g-3">
                            <h1 class="text-center">Saldo : <?= $u_log['saldo']; ?></h1>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control bg-light border-0" name="nominal" placeholder="inputkan Nominal...." required min="0">
                                    <label for="name">Nominal |<i> min: 10000 </i> </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" value="submit" name="btn" class="btn btn-primary">Tambah</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Modal Simpan End -->

    <!-- Modal Laporan Simpanan-->
    <div class="modal fade" id="modalLaporan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Simpanan Tabungan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($u_history as $r) { ?>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $r->n_user; ?></td>
                                    <td><?= $r->nominal; ?></td>
                                    <td><?= $r->tgl_simpanan; ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Modal Laporan Simpanan End -->

    <!-- Modal Laporan Pinjaman-->
    <div class="modal fade" id="modalLaporanPinjaman" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Pengajuan Pinjaman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- <span aria-hidden="true">&times;</span> -->
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
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
                                <!-- <th>Tgl Batas pembayaran</th> -->
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($u_pinjaman as $r) { ?>
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

                                    <?php if ($r->acc_1 == '1') { ?>
                                        <td class="text-success">Terima</td>
                                    <?php } else if ($r->acc_1 == '2') { ?>
                                        <td class="text-danger">Tolak</td>
                                    <?php } else { ?>
                                        <td class="text-warning">Prosses</td>
                                    <?php } ?>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Modal Laporan Pinjaman End -->

    <!-- Modal Persyaratan-->
    <div class="modal fade" id="modalPersyaratan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Mengenai Pengajuan Pinjaman</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>1. Batas pengajuan pinjaman untuk karyawan 5jt, manager 10jt</td>
                            </tr>
                            <tr>
                                <td>2. Jaminan dapat berupa emas min 1 gram, Surat Tanah, Surat Rumah, BPKB, Elektronik(Ketentuan harga barang mendekati nominal pinjaman(contoh: Kulkas, TV, Ac, Laptop, Handphone, dll))</td>
                            </tr>
                            <tr>
                                <td>3. Status akan diverifikasi selama 24 jam</td>
                            </tr>
                            <tr>
                                <td>4. Bunga Pinjaman sebesar 2,5%</td>
                            </tr>
                            <tr>
                                <td>5. Masa kerja min 2tahun menjadi Karyawan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Modal Persyaratan End -->

    <!-- End  of Modal Sect -->