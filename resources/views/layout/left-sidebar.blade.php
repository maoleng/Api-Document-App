<div class="left-side-menu">

    <!-- LOGO -->
    <a href="{{route('api.index')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('assets/images/logo.png')}}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('assets/images/logo_sm.png')}}" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('api.index')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('assets/images/logo_sm_dark.png')}}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="left-side-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Phần mềm</li>

            <li class="side-nav-item">
                <a href="{{route('api.index')}}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Tài liệu API </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Quản lý</li>

            <li class="side-nav-item">
                <a href="{{route('api.create')}}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Thêm API </span>
                </a>
            </li>


            <li class="side-nav-item">
                <a href="https://api.github.com" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> Chat </span>
                </a>
            </li>

        </ul>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
