<div>
    <nav class="navbar navbar-expand-lg navbar-light  custom">
        <a class="navbar-brand user-nav-b" href="/"><img src="img/foodlogo.png" style="height: 40px" class="img-fluid" alt=""> Jumga</a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            {{--            <span class="navbar-toggler-icon"></span>--}}
            <svg width="29" height="17" viewBox="0 0 29 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.833328 0.25H28.1667V3H0.833328V0.25ZM7.66666 7.125H28.1667V9.875H7.66666V7.125ZM16.2083 14H28.1667V16.75H16.2083V14Z" fill="black"/>
            </svg>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  px-3 mx-auto {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item px-3 mx-auto {{ request()->is('merchants') ? 'active' : '' }}">
                    <a class="nav-link" href="/merchants">Merchants</a>
                </li>
                <li class="nav-item px-3 mx-auto {{ request()->is('products') ? 'active' : '' }}">
                    <a class="nav-link" href="/products">Products</a>
                </li>
                <li class="nav-item px-3 mx-auto {{ request()->is('categories') ? 'active' : '' }}">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>
                <li class="nav-item px-3 mx-auto {{ request()->is('merchant/create') ? 'active' : '' }}">
                    <a href="https://wa.me/message/WF7XP2IZZIY4N1" class="nav-link">Sell on Jumga</a>
                </li>

            </ul>

            <ul class="navbar-nav mr-3">
                @if(Auth::check())
                    <div class="dropdown mx-auto">
                        <button class="auth-btn btn auth btn-sm  dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->firstname }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/user/orders">Recent orders</a>
                            <a class="dropdown-item" href="/user/account">Account</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <li class="nav-item px-3 mb-3 mb-lg-0 mx-auto">
                        <a class="auth-btn btn auth btn-sm" href="/login">Login</a>
                    </li>
                    <li class="nav-item px-3 mb-3  mb-lg-0 mx-auto">
                        <a class="auth-btn btn auth btn-sm ic" href="/cart">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 450.391 450.391" style="enable-background:new 0 0 450.391 450.391;" xml:space="preserve">
<g>
    <g>
        <g>
            <path d="M143.673,350.322c-25.969,0-47.02,21.052-47.02,47.02c0,25.969,21.052,47.02,47.02,47.02
				c25.969,0,47.02-21.052,47.02-47.02C190.694,371.374,169.642,350.322,143.673,350.322z M143.673,423.465
				c-14.427,0-26.122-11.695-26.122-26.122c0-14.427,11.695-26.122,26.122-26.122c14.427,0,26.122,11.695,26.122,26.122
				C169.796,411.77,158.1,423.465,143.673,423.465z"/>
            <path d="M342.204,350.322c-25.969,0-47.02,21.052-47.02,47.02c0,25.969,21.052,47.02,47.02,47.02s47.02-21.052,47.02-47.02
				C389.224,371.374,368.173,350.322,342.204,350.322z M342.204,423.465c-14.427,0-26.122-11.695-26.122-26.122
				c0-14.427,11.695-26.122,26.122-26.122s26.122,11.695,26.122,26.122C368.327,411.77,356.631,423.465,342.204,423.465z"/>
            <path d="M448.261,76.037c-2.176-2.377-5.153-3.865-8.359-4.18L99.788,67.155L90.384,38.42
				C83.759,19.211,65.771,6.243,45.453,6.028H10.449C4.678,6.028,0,10.706,0,16.477s4.678,10.449,10.449,10.449h35.004
				c11.361,0.251,21.365,7.546,25.078,18.286l66.351,200.098l-5.224,12.016c-5.827,15.026-4.077,31.938,4.702,45.453
				c8.695,13.274,23.323,21.466,39.184,21.943h203.233c5.771,0,10.449-4.678,10.449-10.449c0-5.771-4.678-10.449-10.449-10.449
				H175.543c-8.957-0.224-17.202-4.936-21.943-12.539c-4.688-7.51-5.651-16.762-2.612-25.078l4.18-9.404l219.951-22.988
				c24.16-2.661,44.034-20.233,49.633-43.886l25.078-105.012C450.96,81.893,450.36,78.492,448.261,76.037z M404.376,185.228
				c-3.392,15.226-16.319,26.457-31.869,27.69l-217.339,22.465L106.58,88.053l320.261,4.702L404.376,185.228z"/>
        </g>
    </g>
</g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
</svg>
                        Cart</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
