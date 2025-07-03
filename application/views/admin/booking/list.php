<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php $this->load->view("admin/_partials/navbar.php") ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-3 text-gray-800">Daftar Pemesanan Kendaraan</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?= site_url('booking/create') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Pemesanan
                            </a>

                            <form action="<?= site_url('booking/export') ?>" method="get" class="form-inline mb-3 mt-3">
                                <input type="date" name="start" class="form-control mr-2" required>
                                <input type="date" name="end" class="form-control mr-2" required>
                                <button type="submit" class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</button>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Pemesan</th>
                                            <th>Kendaraan</th>
                                            <th>Driver</th>
                                            <th>Tgl Mulai</th>
                                            <th>Tgl Selesai</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bookings as $b): ?>
                                            <tr>
                                                <td><?= $b->requester_name ?></td>
                                                <td><?= $b->vehicle_name ?> (<?= $b->license_plate ?>)</td>
                                                <td><?= $b->driver_name ?></td>
                                                <td><?= date('d-m-Y', strtotime($b->start_date)) ?></td>
                                                <td><?= date('d-m-Y', strtotime($b->end_date)) ?></td>
                                                <td><?= $b->reason ?></td>
                                                <td>
                                                    <span class="badge badge-<?= $b->approver_1_status === 'approved' ? 'success' : ($b->approver_1_status === 'rejected' ? 'danger' : 'secondary') ?>">
                                                        Approver 1: <?= ucfirst($b->approver_1_status) ?>
                                                    </span><br>
                                                    <span class="mt-2 badge badge-<?= $b->approver_2_status === 'approved' ? 'success' : ($b->approver_2_status === 'rejected' ? 'danger' : 'secondary') ?>">
                                                        Approver 2: <?= ucfirst($b->approver_2_status) ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url('booking/edit/' . $b->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="#!" onclick="deleteConfirm('<?= site_url('booking/delete/' . $b->id) ?>')" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i> Hapus</a>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php if (empty($bookings)): ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Belum ada pemesanan.</td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>

    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
</body>

</html>