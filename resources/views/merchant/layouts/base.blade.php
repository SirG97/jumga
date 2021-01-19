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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
            <nav class="nav nav-sidebar"  style="background:#362F78">
                <div class="nav_section">
                    <div class="nav_section_content company">
                        <div class="nav_item prelative">
                            <a href="" class="nav_flex">
                            <span class="company-icon flex justify-center">
<!--                             <i class="fas fa-fw fa-shield-alt self-center"></i>-->
                                <img src="/img/logo.svg" alt="">
                            </span>
                                <span class="company_text font-bold text-white ">Jumga::Merchant</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nav_section mt-5">
                    <div class="nav_section_content">
                        <div class="nav_item prelative">
                            <a href="/merchant/dashboard" class="nav_link nav_flex nav_link_purple">
                               <span class="nav_link_icon">
                                <i class="fa fa-fw fa-tachometer-alt"></i>
                               </span>
                                <span class="nav_link_text">Dashboard</span>
                            </a>
                        </div>
                        <div class="nav_item prelative">
                            <a href="/merchant/profile" class="nav_link nav_flex nav_link_purple">
                               <span class="nav_link_icon">
                                <i class="fa fa-fw fa-user"></i>
                               </span>
                                <span class="nav_link_text">Profile</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/inventory" class="nav_link nav_flex nav_link_purple">
                            <span class="nav_link_icon">
                             <i class="fa fa-fw fa-database"></i>
                            </span>
                                <span class="nav_link_text">{{__('Inventory')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/sales" class="nav_link nav_flex nav_link_purple">
                         <span class="nav_link_icon">
                          <i class="fas fa-fw fa-handshake"></i>
                         </span>
                                <span class="nav_link_text">{{__('Sales')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/product/add" class="nav_link nav_flex nav_link_purple">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-plus"></i>
                            </span>
                                <span class="nav_link_text">{{__('Add product')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/notifications" class="nav_link nav_flex nav_link_purple">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-bell"></i>
                            </span>
                                <span class="nav_link_text">{{__('Notifications')}}</span>
                            </a>
                        </div>


                        <div class="nav_item prelative">
                            <a href="/merchant/approve" class="nav_link nav_flex nav_link_purple">
                            <span class="nav_link_icon">
                             <i class="fas fa-check-circle"></i>
                            </span>
                                <span class="nav_link_text">{{__('Get Approved')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/account" class="nav_link nav_flex nav_link_purple">
                            <span class="nav_link_icon">
                             <i class="fas fa-credit-card"></i>
                            </span>
                                <span class="nav_link_text">{{__('Add Account')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <a href="/merchant/changepassword" class="nav_link nav_flex nav_link_purple">
                            <span class="nav_link_icon">
                             <i class="fas fa-fw fa-key"></i>
                            </span>
                                <span class="nav_link_text">{{__('Change Password')}}</span>
                            </a>
                        </div>

                        <div class="nav_item prelative">
                            <form class="nav_link nav_flex nav_link_purple">
                                 <span class="nav_link_icon">
                                    <i class="fas fa-fw fa-sign-out-alt"></i>
                                </span>
                                <span class="nav_link_text">
                                    <a class="" style="color: inherit" href="{{ route('merchant.logout') }}"
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
                    @yield('icon')

                </div>
                <span class="header-page-title-text">@yield('title')</span>
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
                                            <a class="" style="color: inherit; text-decoration: none;" href="{{ route('merchant.logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </div>
                                        <form id="logout-form" action="{{ route('merchant.logout') }}" method="POST" style="display: none;">
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

