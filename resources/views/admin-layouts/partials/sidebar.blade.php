<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
    <img src="{{ asset('impact') }}/assets/img/favicon-fi.png" alt="FoundIn Logo" class="brand-image">
    <span class="brand-text font-weight-light">| FoundIn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('admin-lte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
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
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
                Data Tables
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/posts" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Post Content</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/comments" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/categories" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/tags" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tags</p>
                    </a>
                </li>
            </ul>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>