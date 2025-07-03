<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <div class="container-fluid">

                    <h1 class="h3 mb-4 text-gray-800"><?= isset($driver) ? "Edit" : "Tambah" ?> Driver</h1>

                    <form action="<?= isset($driver) ? site_url('driver/update/' . $driver->id) : site_url('driver/store') ?>" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required value="<?= isset($driver) ? $driver->name : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="number" name="phone" class="form-control" required value="<?= isset($driver) ? $driver->phone : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Nomor SIM</label>
                            <input type="number" name="license_number" class="form-control" required value="<?= isset($driver) ? $driver->license_number : '' ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('driver') ?>" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
            <?php $this->load->view("admin/_partials/footer.php") ?>
        </div>
    </div>

    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
</body>