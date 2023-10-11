@if ($navbar === 'Kontributor')
    <div class="header-wrapper">

        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="topbar-logo-header">
                        <div class="">
                            <img src="{{ asset('assets/images/logo-halalfood.png') }}" class="logo-icon"
                                alt="logo iconnnnn" />
                        </div>
                    </div>
                    <div class="mobile-toggle-menu"><i class="bx bx-menu"></i></div>
                    <div class="top-menu-left d-none d-lg-block ps-3">
                        <div style="font-size: 20px">Kontributor Halal Food</div>
                    </div>
                    <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                            <input type="text" class="form-control search-control" placeholder="Type to search..." />
                            <span class="position-absolute top-50 search-show translate-middle-y"><i
                                    class="bx bx-search"></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i
                                    class="bx bx-x"></i></span>
                        </div>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="alert-count">7</span>
                                    <i class="bx bx-bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-group"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span
                                                            class="msg-time float-end">14
                                                            Sec ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-cart-alt"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span
                                                            class="msg-time float-end">28
                                                            min ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i
                                                        class="bx bx-home-circle"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                            class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-message-detail"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4
                                                            hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class="bx bx-check-square"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span
                                                            class="msg-time float-end">5 hrs ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-user-pin"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span
                                                            class="msg-time float-end">1
                                                            day ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class="bx bx-door-open"></i></div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span
                                                            class="msg-time float-end">2
                                                            weeks ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="ssss" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span
                                                            class="msg-time float-end">5
                                                            sec ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span
                                                            class="msg-time float-end">14 sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span
                                                            class="msg-time float-end">8
                                                            min ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="sss avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span
                                                            class="msg-time float-end">15 min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span
                                                            class="msg-time float-end">22
                                                            min ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span
                                                            class="msg-time float-end">2
                                                            hrs ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span
                                                            class="msg-time float-end">4
                                                            hrs ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span
                                                            class="msg-time float-end">6
                                                            hrs ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span
                                                            class="msg-time float-end">2
                                                            hrs ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span
                                                            class="msg-time float-end">2
                                                            days ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}"
                                                        class="msg-avatar" alt="user avatar" />
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span
                                                            class="msg-time float-end">5
                                                            days ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" class="user-img"
                                alt="user avatar" />
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">
                                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                                </p>
                                <p class="designattion mb-0">PPH Bandung</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cog"></i><span>Settings</span></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-home-circle"></i><span>Dashboard</span></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-dollar-circle"></i><span>Earnings</span></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-download"></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" style="cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#LogoutModal"><i
                                        class="bx bx-log-out-circle"></i><span>Keluar</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Modal -->
        <div class="modal fade" id="LogoutModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Dengan keluar anda memutus akses pada halalfood website
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <form name="logout" action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end header -->

        <!--navigation-->
        <div class="nav-container">
            <div class="mobile-topbar-header">
                <div>
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon" />
                </div>
                <div>
                    <h4 class="logo-text">Synadmin</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class="bx bx-first-page"></i></div>
            </div>
            <nav class="topbar-nav">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="dashboard.html">
                            <div class="parent-icon"><i class="bx bx-home-circle"></i></div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bx bx-file-blank"></i></div>
                            <div class="menu-title">Review Sertifikasi</div>
                        </a>
                        <ul>
                            <li>
                                <a href="/review-saya"><i class="bx bx-right-arrow-alt"></i>Review Saya</a>
                            </li>
                            <li>
                                <a href="/list_restoran"><i class="bx bx-right-arrow-alt"></i>List Restoran</a>
                            </li>
                            <li>
                                <a href="/report-restaurant"><i class="bx bx-right-arrow-alt"></i>Pengaduan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bx bx-spreadsheet"></i></div>
                            <div class="menu-title">Sertifikasi MUI</div>
                        </a>
                        <ul>
                            <li>
                                <a href="/certified_restaurants/regular"><i
                                        class="bx bx-right-arrow-alt"></i>Regular</a>
                            </li>
                            <li>
                                <a href="/certified_restaurants/self_declare"><i
                                        class="bx bx-right-arrow-alt"></i>Self Declare</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:;">
                            <div class="parent-icon"><i class="bx bx-news"></i></div>
                            <div class="menu-title">Artikel</div>
                        </a>
                        <ul>
                            <li>
                                <a href="widgets.html"><i class="bx bx-right-arrow-alt"></i>Publish</a>
                            </li>
                            <li>
                                <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Draft</a>
                            </li>
                            <li>
                                <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Trash</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="back-menu">
                            <a href="#">Kembali Ke Halaman Utama</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <!--end navigation-->

    </div>
@elseif($navbar == 'authentication')
    <header class="login-header shadow">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded fixed-top rounded-0 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/images/logo-halalfood.png" width="140" alt="" />
                </a>
            </div>
        </nav>
    </header>
@else
    @if (Auth::check())
        <!--Start Header-->
        <header>
            <div class="topbar d-flex align-items-center">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('assets/images/logo-halalfood.png') }}" width="180"
                                alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span><i data-feather="menu"></i></span>
                        </button>
                        <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item {{ $title == 'Landing Page' ? 'active' : '' }}"
                                    aria-current="page">
                                    <a class="nav-link" href="/">Beranda</a>
                                    <div class="underline"></div>
                                </li>
                                <li class="nav-item {{ $title == 'Restoran' ? 'active' : '' }}" aria-current="page">
                                    <a class="nav-link" href="/restaurant">Resto</a>
                                    <div class="underline"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tentang</a>
                                    <div class="underline"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blog</a>
                                    <div class="underline"></div>
                                </li>
                            </ul>
                            <div>
                                <a class="nav-link favorite {{ $title == 'Daftar Favorit Saya' ? 'active' : '' }}"
                                    href="/my-favorites"><i data-feather="heart"></i></a>
                                <div class="underline"></div>
                            </div>
                            <div>
                                <a class="nav-link" href="/profile" style="color: #670075;"><i
                                        data-feather="clock"></i></i></a>
                                <div class="underline"></div>
                            </div>
                            <div>
                                <a class="d-flex align-items-center nav-link" href="/profile" role="button"
                                    aria-expanded="false">
                                    <img src="{{ asset('storage/images/' . Auth::user()->profile_picture) }}"
                                        onerror="this.src='{{ asset('/images/' . Auth::user()->profile_picture) }}'"
                                        class="user-img" alt="user avatar">
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Navbar akhir -->
            </div>
        </header>
        <!-- End Header-->
    @else
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <img src="assets/images/logo-halalfood.png" width="180" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span><i data-feather="menu"></i></span>
                        </button>
                        <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item {{ $title == 'Landing Page' ? 'active' : '' }}">
                                    <a class="nav-link" aria-current="page" href="/">Beranda</a>
                                    <div class="underline"></div>
                                </li>
                                <li class="nav-item {{ $title == 'Restoran' ? 'active' : '' }}">
                                    <a class="nav-link" href="/restaurant">Resto</a>
                                    <div class="underline"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tentang</a>
                                    <div class="underline"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Blog</a>
                                    <div class="underline"></div>
                                </li>
                            </ul>
                            <div>
                                <button type="button" onclick="location.href='/login'"
                                    class="btn btn-primary">Masuk</button>
                                <button type="button" onclick="location.href='/register'"
                                    class="btn btn-outline-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    @endif
@endif
