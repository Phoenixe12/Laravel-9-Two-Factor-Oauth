@include('layouts.admin-layout.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center ">
            <img class="animation__shake" src="{{ asset('assets/dist/img/WholeOrder-01.png') }}" alt="AdminLTELogo"
                width="800px" width="220">
        </div>


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-warning">
            <!-- Left navbar links -->

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    {{--
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>

                    <div class="dropdown-divider"></div>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div> --}}
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    {{--
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
                </div> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <!--  -->
                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-th-large and-arrows-alt"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <li class="dropdown-header">

                            <span>Admin</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="fa fa-user-circle mr-2" aria-hidden="true"></i>
                                <span>My profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDef@extends('layouts.admin-layout.main')
                    @section('GestionPage')ault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Se déconnecter</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                    @csrf
                </form>


                </a>
            </li>
        </ul>
        </li>
        <!--  -->
        </ul>
    </nav>
    <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#4B0082;">
            <!-- Brand Logo -->

              <!-- Brand Logo -->
              <a href="#" class="brand-link text-center"
              style="padding-top: 3px; padding-bottom: 2px;background-color:#FFF;height: 60px;">
              {{-- --}}
              <img style="max-width: 200px;max-height: 54px;" src="{{ asset('assets/dist/img/WholeOrder-01.png') }}"
                  alt="WholeOrderLogo" width="150px" height="150px">
              <!--span class="brand-text font-weight-light">AdminLTE 3</span-->
          </a>

          <!-- Sidebar -->
          <div class="sidebar" style="background-color:#343a40;">
              <!-- Sidebar user panel (optional) -->
              <!-- SidebarSearch Form -->
              <div class="form-inline mt-4">
                  <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                          aria-label="Search">
                      <div class="input-group-append">
                          <button class="btn btn-sidebar">
                              <i class="fas fa-search fa-fw"></i>
                          </button>
                      </div>
                  </div>
              </div>


                <!-- Sidebar Menu -->
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('home.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Graphs of statistics</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Graphs of transfers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item  menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Businesses
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                @php
                                // Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
                                $userTasks = array_map('trim', explode(',', auth()->user()->task));
                            @endphp

                            @if (in_array('task_providers', $userTasks))
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Providers</p>
                                        <span class="badge badge-danger right">6</span>
                                    </a>
                                </li>
                            @endif

                            @if (in_array('task_restaurant', $userTasks))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Restaurant</p>
                                    <span class="badge badge-danger right">6</span>
                                </a>
                            </li>
                          @endif
                        </ul>
                        </li>
                        @if (in_array('task_transfers', $userTasks))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-exchange-alt"></i>
                                <p>
                                    Transfers
                                </p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item  menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (in_array('task_profile', $userTasks))
                                <li class="nav-item">
                                    <a href="{{ route('Gestion+Profile.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>My profile</p>
                                    </a>
                                </li>
                                @endif
                                @if (in_array('task_under', $userTasks))
                                <li class="nav-item">
                                    <a href="{{ route('Gestion+Utilisateurs.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Under account</p>
                                    </a>
                                </li>
                                @endif
                                @if (in_array('task_2fa', $userTasks))
                                <li class="nav-item">

                                    <a href="{{ route('two-factor-authentication.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Authentication 2Fa</p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>

                        <li class="nav-header">
                        <i class="nav-icon far fa-plus-square"></i>
                        OTHRS
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Se déconnecter</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>

                <li class="nav-header">

                </li>


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

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                @yield('GestionPage')
            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.admin-layout.footer')
    @yield('script')


</body>

</html>
