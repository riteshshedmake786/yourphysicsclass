<header id="topnav">
            <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('dashboard/assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

            <div class="logo-box">
                <a href="{{ route('home') }}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="{{ asset('physics/assets/img/Logo.jpeg') }}" alt="" height="60">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('physics/assets/img/favicon.png') }}" alt="" height="40">
                    </span>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <ul class="navigation-menu">
                    @php
                        $activeClass = '';
                        $systemsetArr = ['home'];
                        if(in_array(Route::currentRouteName(), $systemsetArr)){
                            $activeClass = 'has-submenu';
                        }
                    @endphp
                    <li class="{{ $activeClass }}">
                        <a href="{{ route('home') }}">
                            <i class="la la-dashboard"></i>Dashboard 
                        </a>
                    </li>
                    @php
                        $activeClass = '';
                        $systemsetArr = ['slider'];
                        if(in_array(Route::currentRouteName(), $systemsetArr)){
                            $activeClass = 'has-submenu';
                        }
                    @endphp
                    <li class="{{ $activeClass }}">
                        <a href="{{ route('slider') }}">
                            <i class="fe-sliders"></i>Slider 
                        </a>
                    </li>  
                    <li class="has-submenu">
                        <a href="#">
                            <i class="la la-users"></i>Course <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('course', ['section' => 'class-11']) }}">Class 11</a>
                            </li>
                            <li>
                                <a href="{{ route('course', ['section' => 'class-12']) }}">Class 12</a>
                            </li>
                            <li>
                                <a href="{{ route('course', ['section' => 'JEE-NEET']) }}">JEE/NEET</a>
                            </li>
                        </ul>
                    </li>
                    @php
                        $activeClass = '';
                        $systemsetArr = ['topic'];
                        if(in_array(Route::currentRouteName(), $systemsetArr)){
                            $activeClass = 'has-submenu';
                        }
                    @endphp
                    <li class="{{ $activeClass }}">
                        <a href="{{ route('topic') }}">
                            <i class="fab fa-blogger"></i>Topic 
                        </a>
                    </li>
                    @php
                        $activeClass = '';
                        $systemsetArr = ['important-topic','important-topic-add'];
                        if(in_array(Route::currentRouteName(), $systemsetArr)){
                            $activeClass = 'has-submenu';
                        }
                    @endphp
                    <li class="{{ $activeClass }}">
                        <a href="{{ route('important-topic') }}">
                            <i class="fab fa-blogger"></i>Important Topics 
                        </a>
                    </li>
                    @php
                        $activeClass = '';
                        $systemsetArr = ['feedback'];
                        if(in_array(Route::currentRouteName(), $systemsetArr)){
                            $activeClass = 'has-submenu';
                        }
                    @endphp
                    <li class="{{ $activeClass }}">
                        <a href="{{ route('feedback') }}">
                            <i class="fas fa-comments"></i>Feedback 
                        </a>
                    </li>
                    @php
                        $activeClass = '';
                        $systemsetArr = ['contact-list'];
                        if(in_array(Route::currentRouteName(), $systemsetArr)){
                            $activeClass = 'has-submenu';
                        }
                    @endphp
                    <li class="{{ $activeClass }}">
                        <a href="{{ route('contact-list') }}">
                            <i class="la la-phone"></i>Contact 
                        </a>
                    </li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</header>