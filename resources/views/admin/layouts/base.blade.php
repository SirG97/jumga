<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} :: Merchant</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <div>
        <div class="">
            <div id="hamburger" class="navigation-menu mr-2">
                <svg width="29" height="17" viewBox="0 0 29 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.833328 0.25H28.1667V3H0.833328V0.25ZM7.66666 7.125H28.1667V9.875H7.66666V7.125ZM16.2083 14H28.1667V16.75H16.2083V14Z" fill="black"/>
                </svg>
            </div>
            <nav class="nav nav-sidebar"  style="background:#252F3F">
                <div class="nav_section">
                    <div class="nav_section_content company">
                        <div class="nav_item prelative">
                            <a href="" class="nav_flex">
                            <span class="company-icon flex justify-center">
<!--                             <i class="fas fa-fw fa-shield-alt self-center"></i>-->
                                <img src="/img/logo.svg" alt="">
                            </span>
                                <span class="company_text font-bold text-white text-xl">Jumga :: Admin</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nav_section mt-5">
                    <div class="nav_section_content">
                        <div class="nav_item prelative">
                            <a href="/admin/dashboard" class="nav_link nav_flex nav_link_dark">
                               <span class="nav_link_icon">
                                <i class="fa fa-fw fa-tachometer-alt"></i>
                               </span>
                                <span class="nav_link_text">Dashboard</span>
                            </a>
                        </div>
                        <div class="nav_item prelative">
                            <a href="/admin/profile" class="nav_link nav_flex nav_link_dark">
                               <span class="nav_link_icon">
                                <i class="fa fa-fw fa-user"></i>
                               </span>
                                <span class="nav_link_text">Profile</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/admin/merchants" class="nav_link nav_flex nav_link_dark">
                            <span class="nav_link_icon">
                             <i class="fa fa-fw fa-database"></i>
                            </span>
                                <span class="nav_link_text">{{__('Merchants')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/admin/sales" class="nav_link nav_flex nav_link_dark">
                         <span class="nav_link_icon">
                          <i class="fas fa-fw fa-handshake"></i>
                         </span>
                                <span class="nav_link_text">{{__('Sales')}}</span>
                            </a>
                        </div>
                        <div class="nav_item prelative">
                            <a href="/admin/riders" class="nav_link nav_flex nav_link_dark">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-motorcycle"></i>
                            </span>
                                <span class="nav_link_text">{{__('Dispatch Riders')}}</span>
                            </a>
                        </div>
                        <div class="nav_item prelative">
                            <a href="/admin/rider/add" class="nav_link nav_flex nav_link_dark">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-plus-circle"></i>
                            </span>
                                <span class="nav_link_text">{{__('Add Dispatch Rider')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/notifications" class="nav_link nav_flex nav_link_dark">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-bell"></i>
                            </span>
                                <span class="nav_link_text">{{__('Notifications')}}</span>
                            </a>
                        </div>


                        <div class="nav_item prelative">
                            <a href="/merchant/approve" class="nav_link nav_flex nav_link_dark">
                            <span class="nav_link_icon">
                             <i class="fas fa-clipboard-check"></i>
                            </span>
                                <span class="nav_link_text">{{__('Approval fees')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/changepassword" class="nav_link nav_flex nav_link_dark">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-key"></i>
                            </span>
                                <span class="nav_link_text">{{__('Change Password')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <form class="nav_link nav_flex nav_link_dark">
                                 <span class="nav_link_icon">
                                    <i class="fas fa-fw fa-sign-out-alt"></i>
                                </span>
                                <span class="nav_link_text">
                                    <a class="" style="color: inherit" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                </span>
                            </form>

                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <header class="d-flex shadow-sm">
            <div class="header-page-title mr-auto">
                <div class="icon-block blue-bg">
                    <i class="fa fa-fw fas fa-history"></i>
                </div>
                <span class="header-page-title-text">Dashboard</span>
            </div>

            <div class="header-nav">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="ml-3 relative">

                    </div>
                </div>
                               <span class="header-nav-item">
                                    <img class="avatar img-thumbnail img-fluid" src="{{ asset('/img/avatar-1.jpg') }}" alt="profile pics">

                                </span>
                                <div class="nav-dropdown">
                                    <div class="nav-dropdown-item">
                                        <div class="nav-dropdown-item-link">
                                            Profile
                                        </div>
                                    </div>
                                    <div class="nav-dropdown-item">
                                        <div class="nav-dropdown-item-link">
                                            Settings
                                        </div>
                                    </div>
                                    <div class="nav-dropdown-item">
                                        <div class="nav-dropdown-item-link">
                                            <a class="" style="color: inherit; text-decoration: none;" href="{{ route('admin.logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </div>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
            </div>
        </header>
    </div>
    <main class="main" id="main" style="background-color:#fafafa">
        <div class="main_container" >
            @yield('content')
        </div>
    </main>
    <!-- Modal Portal -->

</div>
</body>
</html>

