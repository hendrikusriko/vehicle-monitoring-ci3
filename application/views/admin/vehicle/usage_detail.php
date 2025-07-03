<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <div class="container-fluid">
                    <h3 class="mb-4">Detail Pemakaian Kendaraan: <?= $vehicle->name ?></h3>

                    <div class="card mb-3">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Driver</th>
                                        <th>Keperluan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usages as $u): ?>
                                        <tr>
                                            <td><?= $u->user_name ?></td>
                                            <td><?= $u->driver_name ?></td>
                                            <td><?= $u->reason ?></td>
                                            <td><?= date('d-m-Y', strtotime($u->start_date)) ?></td>
                                            <td><?= date('d-m-Y', strtotime($u->end_date)) ?></td>
                                            <td><?= ucfirst($u->status) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="<?= site_url('vehicle') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>

    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
</body>

</html>