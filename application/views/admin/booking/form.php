<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <?php $this->load->view("admin/_partials/navbar.php") ?>

                <div class="container-fluid">

                    <h1 class="h3 mb-3 text-gray-800"><?= isset($booking) ? 'Edit' : 'Tambah' ?> Pemesanan</h1>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="<?= site_url('booking/' . (isset($booking) ? 'update/' . $booking->id : 'store')) ?>" method="post">

                                <div class="form-group">
                                    <label>Nama Pemesan</label>
                                    <select name="user_id" class="form-control" required>
                                        <option value="">-- Pilih Pemesan --</option>
                                        <?php foreach ($users as $u): ?>
                                            <option value="<?= $u->id ?>" <?= isset($booking) && $booking->user_id == $u->id ? 'selected' : '' ?>>
                                                <?= $u->name ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kendaraan</label>
                                    <select name="vehicle_id" class="form-control" required>
                                        <option value="">-- Pilih Kendaraan --</option>
                                        <?php foreach ($vehicles as $v): ?>
                                            <option value="<?= $v->id ?>" <?= isset($booking) && $booking->vehicle_id == $v->id ? 'selected' : '' ?>>
                                                <?= $v->name ?> (<?= $v->license_plate ?>)
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Driver</label>
                                    <select name="driver_id" class="form-control" required>
                                        <option value="">-- Pilih Driver --</option>
                                        <?php foreach ($drivers as $d): ?>
                                            <option value="<?= $d->id ?>" <?= isset($booking) && $booking->driver_id == $d->id ? 'selected' : '' ?>>
                                                <?= $d->name ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="start_date" class="form-control" value="<?= isset($booking) ? $booking->start_date : '' ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="end_date" class="form-control" value="<?= isset($booking) ? $booking->end_date : '' ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Alasan</label>
                                    <textarea name="reason" class="form-control" required><?= isset($booking) ? $booking->reason : '' ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Approver Level 1</label>
                                    <select name="approver_1" class="form-control" required>
                                        <option value="">-- Pilih Approver 1 --</option>
                                        <?php foreach ($approvers as $a): ?>
                                            <option value="<?= $a->id ?>" <?= isset($booking) && $booking->approver_1 == $a->id ? 'selected' : '' ?>>
                                                <?= $a->name ?> (<?= $a->role ?>)
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Approver Level 2</label>
                                    <select name="approver_2" class="form-control" required>
                                        <option value="">-- Pilih Approver 2 --</option>
                                        <?php foreach ($approvers as $a): ?>
                                            <option value="<?= $a->id ?>" <?= isset($booking) && $booking->approver_2 == $a->id ? 'selected' : '' ?>>
                                                <?= $a->name ?> (<?= $a->role ?>)
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="<?= site_url('booking') ?>" class="btn btn-secondary">Batal</a>

                            </form>
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

</html>