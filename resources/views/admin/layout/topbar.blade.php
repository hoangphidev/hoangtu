<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            @if(isset($userLogin))
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                @if($userLogin->avatar == null)
                    <img src="assets\images\users\avatar.png" alt="user-image" class="rounded-circle">
                @endif
                @if($userLogin->avatar != null)
                    @if(substr($userLogin->avatar, 0, 5) == "https")
                        <img src="{{$userLogin->avatar}}" alt="user-image" class="rounded-circle">
                    @endif
                    @if(substr($userLogin->avatar, 0, 5) != "https")
                        <img src="upload\avatar\{{$userLogin->avatar}}" alt="user-image" class="rounded-circle">
                    @endif
                    
                @endif
                
                <span class="pro-user-name ml-1">
                    {{$userLogin->name}}   <i class="mdi mdi-chevron-down"></i> 
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                <!-- item-->
                <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
                    <i class="ion ion-md-person"></i>
                    <span>Cá nhân</span>
                </a>

                <!-- item-->
                <a href="{{route('admin.changepass')}}" class="dropdown-item notify-item">
                    <i class=" ion ion-ios-lock"></i>
                    <span>Đổi mật khẩu</span>
                </a>
                
                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Đăng xuất</span>
                </a>

            </div>
            @endif
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{route('admin.home')}}" class="logo text-center logo-light">
            <span class="logo-lg mt-1 mb-1">
                <img src="assets\images\logo_light.png" alt="" height="75">
                <!-- <span class="logo-lg-text-dark">Velonic</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-lg-text-dark">V</span> -->
                <img src="assets\images\logo-sm.png" alt="" height="22">
            </span>
        </a>
    </div>

    <!-- LOGO -->


    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>