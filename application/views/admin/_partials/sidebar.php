<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VehicleApp</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Kendaraan -->
    <li class="nav-item <?= $this->uri->segment(1) == 'vehicle' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('vehicle') ?>">
            <i class="fas fa-fw fa-truck"></i>
            <span>Data Kendaraan</span>
        </a>
    </li>

    <!-- Nav Item - Driver -->
    <li class="nav-item <?= $this->uri->segment(1) == 'driver' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('driver') ?>">
            <i class="fas fa-fw fa-id-badge"></i>
            <span>Data Sopir</span>
        </a>
    </li>

    <!-- Nav Item - Booking -->
    <li class="nav-item <?= $this->uri->segment(1) == 'booking' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('booking') ?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Pemesanan Kendaraan</span>
        </a>
    </li>

    <!-- Nav Item - Approval -->
    <?php if ($this->session->userdata('role') === 'approver'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('approval') ?>">
                <i class="fas fa-check"></i>
                <span>Approval Booking</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Logs -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('log') ?>">
            <i class="fas fa-fw fa-history"></i>
            <span>Log Aktivitas</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>