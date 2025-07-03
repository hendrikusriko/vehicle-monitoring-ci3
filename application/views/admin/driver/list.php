<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <div class="container-fluid">
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="<?= site_url('driver/create') ?>"><i class="fas fa-plus"></i> Tambah Driver</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Nomor Telepon</th>
                                            <th>No. SIM</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($drivers as $d): ?>
                                            <tr>
                                                <td><?= $d->name ?></td>
                                                <td><?= $d->phone ?></td>
                                                <td><?= $d->license_number ?></td>
                                                <td width="180">
                                                    <a href="<?= site_url('driver/edit/' . $d->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                    <a onclick="deleteConfirm('<?= site_url('driver/delete/' . $d->id) ?>')" href="#!" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i> Hapus</a>
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