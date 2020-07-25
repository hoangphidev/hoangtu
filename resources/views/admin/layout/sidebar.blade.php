<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{route('admin.home')}}" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span>  Trang chủ  </span>
                    </a>
                </li>
                @if($userLogin->position_id == 1)
                <!-- Banner -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-ios-aperture"></i>
                        <span> Quảng cáo </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listbanner')}}">Danh sách</a></li>
                        <li><a href="{{route('addbanner')}}">Thêm quảng cáo</a></li>

                    </ul>
                </li>
                <!-- Product -->
                <li class="menu-title">Quản lý kinh doanh</li>
                <!-- Nhà cung cấp -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-business"></i>
                        <span> Nhà cung cấp </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listcarrier')}}">Danh sách</a></li>
                        <li><a href="{{route('addcarrier')}}">Thêm nhà cung cấp</a></li>

                    </ul>
                </li>
                <!-- Danh mục sản phẩm -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-bookmark"></i>
                        <span> Danh mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listcate')}}">Danh sách</a></li>
                        <li><a href="{{route('addcate')}}">Thêm danh mục</a></li>

                    </ul>
                </li>
                <!-- Sản phẩm -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-ios-basket"></i>
                        <span> Sản Phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listproduct')}}">Danh sách</a></li>
                        <li><a href="{{route('addproduct')}}">Thêm sản phẩm</a></li>

                    </ul>
                </li>
                <!-- Đơn hàng -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-cart"></i>
                        <span> Đơn hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listorder')}}">Đơn chưa chốt</a></li>
                        <li><a href="{{route('listdelivery')}}">Đơn đang giao</a></li>
                        <li><a href="{{route('shiped')}}">Đơn đã giao</a></li>

                    </ul>
                </li>
                <!-- Nhân sự -->
                <li class="menu-title">Quản lý nhân sự</li>
                <!-- Chức vụ -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-clipboard"></i>
                        <span> Chức vụ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listposition')}}">Danh sách</a></li>
                        <li><a href="{{route('addposition')}}">Thêm chức vụ</a></li>

                    </ul>
                </li>
                <!-- Nhân viên -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-ios-people"></i>
                        <span> Nhân viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listemployee')}}">Danh sách</a></li>
                        <li><a href="{{route('addemployee')}}">Thêm nhân viên</a></li>

                    </ul>
                </li>
                @endif

                @if($userLogin->position_id == 2)
                <!-- Banner -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-ios-aperture"></i>
                        <span> Quảng cáo </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listbanner')}}">Danh sách</a></li>
                        <li><a href="{{route('addbanner')}}">Thêm quảng cáo</a></li>

                    </ul>
                </li>
                <!-- Product -->
                <li class="menu-title">Quản lý kinh doanh</li>
                <!-- Nhà cung cấp -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-business"></i>
                        <span> Nhà cung cấp </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listcarrier')}}">Danh sách</a></li>
                        <li><a href="{{route('addcarrier')}}">Thêm nhà cung cấp</a></li>

                    </ul>
                </li>
                <!-- Danh mục sản phẩm -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-bookmark"></i>
                        <span> Danh mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listcate')}}">Danh sách</a></li>
                        <li><a href="{{route('addcate')}}">Thêm danh mục</a></li>

                    </ul>
                </li>
                <!-- Sản phẩm -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-ios-basket"></i>
                        <span> Sản Phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listproduct')}}">Danh sách</a></li>
                        <li><a href="{{route('addproduct')}}">Thêm sản phẩm</a></li>

                    </ul>
                </li>
                <!-- Đơn hàng -->
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion ion-md-cart"></i>
                        <span> Đơn hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li><a href="{{route('listorder')}}">Đơn chưa chốt</a></li>
                        <li><a href="{{route('listdelivery')}}">Đơn đang giao</a></li>
                        <li><a href="{{route('shiped')}}">Đơn đã giao</a></li>

                    </ul>
                </li>
                <!-- Nhân sự -->
                <li class="menu-title">Quản lý nhân sự</li>
                <!-- Nhân viên -->
                <li>
                    <a href="{{route('listemployee')}}" class="waves-effect">
                        <i class="ion ion-ios-people"></i>
                        <span> Nhân viên </span>
                    </a>
                </li>
                @endif

                @if($userLogin->position_id == 3)
                <!-- Product -->
                <li class="menu-title">Quản lý kinh doanh</li>
                <!-- Đơn hàng -->
                <li>
                    <a href="{{route('listorder')}}" class="waves-effect">
                        <i class="ion ion-md-cart"></i>
                        <span> Đơn hàng</span>
                    </a>
                </li>
                @endif

                @if($userLogin->position_id == 4)
                <!-- Product -->
                <li class="menu-title">Quản lý kinh doanh</li>
                <!-- Đơn hàng -->
                <li>
                    <a href="{{route('listdelivery')}}" class="waves-effect">
                        <i class="ion ion-md-cart"></i>
                        <span> Đơn đang giao</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>