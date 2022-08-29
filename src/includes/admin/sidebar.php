<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link w-100">
        <img src="/assets/img/Brand/SVG/Logo.svg" alt="AdminLTE Logo" class="col-2 m-0">
        <img src="/assets/img/Brand/SVG/Typo_Title_white.svg" class="col-10">
    </a>

    <!-- Sidebar -->
    <div class="sidebar pt-2">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a class="nav-item nav-link <?= $PAGE_ID == 'projetos' ? 'active' : '' ?>" href="/admin/projetos">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        Projetos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link <?= $PAGE_ID == 'acabamentos' ? 'active' : '' ?>" href="/admin/acabamentos">
                        <i class="nav-icon fas fa-brush"></i>
                        Acabamentos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link <?= $PAGE_ID == 'contactos' ? 'active' : '' ?>" href="/admin/contactos">
                        <i class="nav-icon fas fa-phone"></i>
                        Contactos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link <?= $PAGE_ID == 'associados' ? 'active' : '' ?>" href="/admin/associados">
                        <i class="nav-icon fas fa-user"></i>
                        Associados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link <?= $PAGE_ID == 'users' ? 'active' : '' ?>" href="/admin/users">
                        <i class="nav-icon fas fa-users"></i>
                        Users
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>