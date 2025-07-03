<?php $this->load->view("admin/_partials/head.php") ?>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("admin/_partials/navbar.php") ?>
                <div class="container-fluid">
                    <h3 class="mb-3">Log Aktivitas</h3>
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Aktivitas</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($logs as $log): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($log->name) ?></td>
                                            <td><?= htmlspecialchars($log->activity) ?></td>
                                            <td><?= date("d-m-Y H:i:s", strtotime($log->created_at)) ?></td>
                                        </tr>
                                    <?php endforeach ?>
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

</html>