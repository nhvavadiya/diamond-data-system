
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand ">AdSudani</a>
        {{-- <a class="navbar-brand brand-logo mr-5" href="../../index.html"><img src="https://www.urbanui.com/justdo/template/images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="https://www.urbanui.com/justdo/template/images/logo-mini.svg" alt="logo"/></a> --}}
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="ti-menu"></span>
        </button>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" >
        {{-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-layout-grid2"></span>
        </button> --}}
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle"
                    href="#"
                    data-toggle="dropdown"
                    id="profileDropdown">
                    <img src="{{ URL::to('resources/views/templates/AdminLTE/images/faces/default_user.png') }}"
                        alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                    aria-labelledby="profileDropdown" style="text-align:center;">
                   
                        <i class="ti-power-off text-primary"></i>
                        <a href="{{route('logout')}}" style=color:black;>Logout</a>
                    
                </div>
            </li> 
        </ul>
        {{-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="ti-layout-grid2"></span>
        </button> --}}
    </div>
</nav>
