<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('asset_dashboard/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!--tinymce js-->
    <script src="{{ asset('asset_dashboard/js/tinymce/tinymce.min.js') }} "></script>
    <!-- init js -->
    <script src="{{ asset('asset_dashboard/js/form-editor.init.js') }} "></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Admin Dashboard</a>
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
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!--<li><a class="dropdown-item" href="#!">Settings</a></li>-->
                    <!--<li><a class="dropdown-item" href="#!">Activity Log</a></li>-->
                    <!--<li><hr class="dropdown-divider" /></li>-->
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
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
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="{{ route('index_orderALL') }}">
                            <div class="sb-nav-link-icon"></div>
                            Order
                        </a>

                        {{-- <a class="nav-link" href="{{ route('jamaah.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Data Jamaah
                            </a> --}}
                        <div class="sb-sidenav-menu-heading">Fitur</div>
                        {{-- <a class="nav-link" href="{{ route('profile.index') }}">Profile</a> --}}
                        <a class="nav-link" href="{{ route('data.index') }}">User</a>
                        <a class="nav-link" href="{{ route('bank.index') }}">Bank</a>
                        <a class="nav-link" href="{{ route('testimoni.index') }}">Testimoni</a>
                        <a class="nav-link" href="{{ route('mitra.index') }}">Mitra</a>
                        <a class="nav-link" href="{{ route('sertifikasi.index') }}">Sertifikasi</a>
                        <a class="nav-link" href="{{ route('index_service') }}">Service</a>

                        <a class="nav-link" href="{{ route('slide.index') }}">Slide</a>
                        <a class="nav-link" href="{{ route('news.index') }}">News</a>
                        <a class="nav-link" href="{{ route('informasi.index') }}">Informasi</a>
                        <a class="nav-link" href="{{ route('galeri.index') }}">Galeri</a>
                        <a class="nav-link" href="{{ route('whyus.index') }}">WhyUs</a>
                    </div>
                </div>

            </nav>
        </div>

        <div id="layoutSidenav_content">

            <main>
                @yield('Admincontent')
            </main>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script type="text/javascript">
        tinymce.init({

            selector: "textarea",

            plugins: [

                "advlist autolink lists link image charmap print preview anchor",

                "searchreplace visualblocks code fullscreen",

                "insertdatetime media table contextmenu paste"

            ],

            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

        });
    </script>
</body>

</html>
