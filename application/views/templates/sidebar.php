<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CRUD - Admin<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <?php if ($this->uri->segment(1) == 'home') : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <?php if ($this->uri->segment(1) == 'user') : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>User</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <?php if ($this->uri->segment(1) == 'product') : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url('product'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Product</span></a>
                </li>

                <!-- Nav Item - Dashboard -->
                <?php if ($this->uri->segment(1) == 'news') : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url('news'); ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>News</span></a>
                    </li>

                    <!-- Nav Item - Dashboard -->
                    <?php if ($this->uri->segment(1) == 'career') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url('career'); ?>">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Career</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

</ul>
<!-- End of Sidebar -->