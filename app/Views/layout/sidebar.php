<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIM <b>Nilai</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session('username'); ?>
                    <span class="badge badge-light">
                        <?php
                        if (session('role') == 1) {
                            echo "Admin";
                        } elseif (session('role') == 2) {
                            echo "Guru";
                        } elseif (session('role') == 3) {
                            echo "Siswa";
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link <?= service('uri')->getSegment(1) == "dashboard" ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if (session('role') == 1) : ?>

                    <li class="nav-item">
                        <a href="/role" class="nav-link <?= service('uri')->getSegment(1) == "role" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-key"></i>
                            <p>Role</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/guru" class="nav-link <?= service('uri')->getSegment(1) == "guru" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Data Guru</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/siswa" class="nav-link <?= service('uri')->getSegment(1) == "siswa" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data Siswa</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/kelas" class="nav-link <?= service('uri')->getSegment(1) == "kelas" && service('uri')->getSegment(2) == "" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Kelas</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/matpel" class="nav-link <?= service('uri')->getSegment(1) == "matpel" && service('uri')->getSegment(2) == "" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Mata Pelajaran</p>
                        </a>
                    </li>

                <?php elseif (session('role') == 2) : ?>

                    <li class="nav-item">
                        <a href="/nilaisiswa" class="nav-link <?= service('uri')->getSegment(1) == "nilaisiswa" && service('uri')->getSegment(2) == "" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Nilai Siswa</p>
                        </a>
                    </li>

                <?php elseif (session('role') == 3) : ?>

                    <li class="nav-item">
                        <a href="/nilaisaya" class="nav-link <?= service('uri')->getSegment(1) == "nilaisaya" && service('uri')->getSegment(2) == "" ? "active" : ""; ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Nilai Saya</p>
                        </a>
                    </li>

                <?php endif; ?>

                <li class="nav-item">
                    <a href="/auth/logout" class="nav-link bg-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>