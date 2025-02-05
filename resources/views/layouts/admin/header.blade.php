<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('admin.dashboard')}}">Task Management</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('profile.edit')}}">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    {{-- <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li> --}}

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            {{-- <a class="dropdown-item" href="{{route('logout')}}">Logout</a> --}}
                            <button class="dropdown-item">Logout</button>
                            {{-- <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> --}}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                            Manage Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.addUser')}}">Add User</a>
                                <a class="nav-link" href="{{route('admin.allUser')}}">All Users</a>
                            </nav>
                        </div>
                        {{-- <a class="nav-link" href="{{route('admin.admin')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie"></i></i></div>
                            Admin
                        </a> --}}
                        <a class="nav-link" href="{{route('admin.createTask')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Create Tasks
                        </a>
                        <a class="nav-link" href="{{route('admin.allTask')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                            All Tasks
                        </a>
                        <a class="nav-link" href="https://wa.link/5po5b9">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-whatsapp"></i></div>
                            Whatsapp
                        </a>
                        <a class="nav-link" href="{{route('chatify')}}">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-whatsapp"></i></div>
                            Chatify
                        </a>
                        
                        

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            {{-- <button class="dropdown-item">Logout</button> --}}
                            <div class="nav-link">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>
                                <button class="btn btn-primary btn-sm text-white border-0">Logout</button>
                                {{-- logout --}}
                                {{-- <button class="bg-none">Logout</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    @if (Auth::user())
                    {{Auth::user()->username}}
                    @endif
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">