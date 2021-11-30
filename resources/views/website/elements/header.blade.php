<header class="header fixed-top ">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand col-6 col-sm-6 col-md-4 col-lg-2" href="{{ route('index') }}">
                <img src="{{ asset('physics/assets/img/Logo.jpeg') }}" class="img-fluid w-100">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                Menu
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <form class="form-inline my-2 my-lg-0  col-lg-6"> -->
                <input class="typeahead form-control w-100 py-lg-3 rounded-pill position-relative" type="search" placeholder="Search here" value="" id="example-search-input">
                <!-- <button class="btn search position-absolute ">
                    <span class="icon-Icon-awesome-search"></span>
                </button> -->
            <!-- </form>  -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Home </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul> 
            </div>
        </nav>
    </div>
</header> 