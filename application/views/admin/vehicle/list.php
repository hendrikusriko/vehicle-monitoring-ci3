<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <div class="container-fluid">

                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?php echo site_url('vehicle/create') ?>"><i class="fas fa-plus"></i> Tambah Kendaraan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Kendaraan</th>
                                            <th>No. Polisi</th>
                                            <th>Tipe</th>
                                            <th>Kepemilikan</th>
                                            <th>Jenis BBM</th>
                                            <th>Konsumsi BBM</th>
                                            <th>Tanggal Service Terakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vehicles as $v): ?>
                                            <tr>
                                                <td><?= $v->name ?></td>
                                                <td><?= $v->license_plate ?></td>
                                                <td><?= ucfirst($v->type) ?></td>
                                                <td><?= ucfirst($v->ownership) ?></td>
                                                <td><?= $v->fuel_type ?></td>
                                                <td><?= $v->fuel_consumption ?></td>
                                                <td><?= $v->last_service_date ?></td>
                                                <td width="180">
                                                    <a href="<?= site_url('vehicle/edit/' . $v->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="deleteConfirm('<?= site_url('vehicle/delete/' . $v->id) ?>')" href="#!" class="btn btn-sm btn-danger text-white">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                    <a href="<?= site_url('vehicle/usage_detail/' . $v->id) ?>" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i> Lihat Pemakaian
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>

    <!-- Scroll to Top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>