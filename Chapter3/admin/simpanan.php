    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Hoverable Table rows -->
            <div class="card">
                <div class="row">
                    <div class="col-md-10">
                        <h5 class="card-header">Log Tabungan Masuk</h5>

                    </div>

                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 1;
                            foreach ($u_all as $r) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $r->n_user; ?></td>
                                    <td><?= $r->nominal; ?></td>
                                    <td><?= $r->tgl_simpanan; ?></td>
                                </tr>

                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- / Content -->