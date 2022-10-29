    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                {{-- <img style="width:70%" src="{{ asset('logo.png') }}"> --}}
                <h5>admin passel</h5>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>control Board</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/books*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/courses">
                <i class="fas fa-book-open"></i>
                <span>courses</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/explainers">
                <i class="fas fa-folder"></i>
                <span>Explainers</span>
            </a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
            <a class="nav-link " href="/admin/users">
                <i class="fas fa-users"></i>
                <span>users</span>
            </a>
        </li>

        <li class="nav-item {{ request()->is('admin/allproduct*') ? 'active' : '' }}">
            <a class="nav-link" href="/admin/purchases">
                <i class="fas fa-shopping-bag"></i>
                <span>Purchases</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->