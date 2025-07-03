<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <div class="container-fluid">
                    <h4>Approval Pemesanan Kendaraan</h4>
                    <div class="card mb-3">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Kendaraan</th>
                                        <th>Driver</th>
                                        <th>Tanggal</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bookings as $b): ?>
                                        <tr>
                                            <td><?= $b->vehicle_name ?></td>
                                            <td><?= $b->driver_name ?></td>
                                            <td><?= $b->start_date ?> - <?= $b->end_date ?></td>
                                            <td><?= $b->reason ?></td>
                                            <td><?= $b->status ?></td>
                                            <td>
                                                <a href="<?= site_url('approval/approve/' . $b->id) ?>" class="btn btn-sm btn-success">Setujui</a>
                                                <a href="<?= site_url('approval/reject/' . $b->id) ?>" class="btn btn-sm btn-danger">Tolak</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
</body>