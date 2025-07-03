<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">
                        <?= isset($vehicle) ? "Edit" : "Tambah" ?> Kendaraan
                    </h1>

                    <form action="<?= isset($vehicle) ? site_url('vehicle/update/' . $vehicle->id) : site_url('vehicle/store') ?>" method="post">
                        <div class="form-group">
                            <label for="name">Nama Kendaraan</label>
                            <input type="text" name="name" class="form-control" required
                                value="<?= isset($vehicle) ? $vehicle->name : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="license_plate">Nomor Polisi</label>
                            <input type="text" name="license_plate" class="form-control" required
                                value="<?= isset($vehicle) ? $vehicle->license_plate : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Kendaraan</label>
                            <select name="type" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="angkutan orang" <?= isset($vehicle) && $vehicle->type == 'angkutan orang' ? 'selected' : '' ?>>Angkutan Orang</option>
                                <option value="angkutan barang" <?= isset($vehicle) && $vehicle->type == 'angkutan barang' ? 'selected' : '' ?>>Angkutan Barang</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ownership">Kepemilikan</label>
                            <select name="ownership" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="milik" <?= isset($vehicle) && $vehicle->ownership == 'milik' ? 'selected' : '' ?>>Milik Perusahaan</option>
                                <option value="sewa" <?= isset($vehicle) && $vehicle->ownership == 'sewa' ? 'selected' : '' ?>>Sewa</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('vehicle') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("admin/_partials/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <!-- javascript -->
    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>