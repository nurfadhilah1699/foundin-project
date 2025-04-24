<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <link rel="icon" href="{{ asset('impact') }}/assets/img/favicon-fi.png" type="image/png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('impact') }}/assets/img/favicon-fi.png" alt="FoundIn Logo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                </form>
                </div>
            </li>

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="nav-link" data-widget="fullscreen" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();"><i class="fas fa-sign-out-alt"></i></a>
                </form>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
        <img src="{{ asset('impact') }}/assets/img/favicon-fi.png" alt="FoundIn Logo" class="brand-image">
        <span class="brand-text font-weight-light">FoundIn</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{ asset('admin-lte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
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
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ asset('admin-lte') }}/pages/widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Widgets
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
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
                        <a href="{{ asset('admin-lte') }}/pages/UI/general.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Post Contents</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/UI/icons.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Comments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/UI/buttons.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/UI/sliders.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tags</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Forms
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Elements</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Advanced Elements</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Editors</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/forms/validation.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Validation</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Tables
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>jsGrid</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">EXAMPLES</li>
            <li class="nav-item">
                <a href="{{ asset('admin-lte') }}/pages/calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Calendar
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ asset('admin-lte') }}/pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Gallery
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ asset('admin-lte') }}/pages/kanban.html" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Kanban Board
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    Mailbox
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compose</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Read</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Pages
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/invoice.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Invoice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/profile.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/e-commerce.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>E-commerce</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/projects.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/project-add.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Add</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/project-edit.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Edit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/project-detail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Project Detail</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/contacts.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contacts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/faq.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/contact-us.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact us</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    Extras
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Login & Register v1
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/login.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/register.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/forgot-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/recover-password.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password v1</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Login & Register v2
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/login-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Login v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/register-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Register v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/forgot-password-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Forgot Password v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ asset('admin-lte') }}/pages/examples/recover-password-v2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Recover Password v2</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/lockscreen.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lockscreen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/legacy-user-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Legacy User Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/language-menu.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Language Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/404.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 404</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/500.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Error 500</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/pace.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pace</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/examples/blank.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blank Page</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="starter.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Starter Page</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                    Search
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/search/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Search</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('admin-lte') }}/pages/search/enhanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Enhanced</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">MISCELLANEOUS</li>
            <li class="nav-item">
                <a href="iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Tabbed IFrame Plugin</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Documentation</p>
                </a>
            </li>
            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Level 1</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                    Level 1
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                        Level 2
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-circle nav-icon"></i>
                <p>Level 1</p>
                </a>
            </li>
            <li class="nav-header">LABELS</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin-layouts.partials.header')
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="http://foundin-project.test/">FoundIn</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin-lte') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin-lte') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-lte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin-lte') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin-lte') }}/plugins/sparklines/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin-lte') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin-lte') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('admin-lte') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin-lte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin-lte') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin-lte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-lte') }}/dist/js/adminlte.js"></script>
    <script src="{{ asset('admin-lte') }}/dist/js/pages/dashboard.js"></script>
    <!-- Ion Icons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
