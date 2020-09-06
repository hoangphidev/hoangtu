@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{$user->name}}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">Trang cá nhân</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-4 mt-3 mb-3 text-center">
                                        @if($user->avatar == null)
                                            <img src="backends\images\users\avatar.png" alt="" width="300" class="rounded-circle mt-3">
                                        @endif
                                        @if($user->avatar != null)
                                            @if(substr($user->avatar, 0, 5) != "https")
                                                <img src="upload\avatar\{{$user->avatar}}" alt="" width="300" class="rounded-circle mt-3">
                                            @endif
                                            @if(substr($user->avatar, 0, 5) == "https")
                                                <img src="{{$user->avatar}}" alt="" width="300" class="rounded-circle mt-3">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-sm-8 mt-3 mb-3">
                                        <div class="row  mt-3">
                                            <label class="col-sm-3 mt-auto  font-15">Họ tên: </label>
                                            <h1 class="header-title font-20 col-sm-6 text-left">{{$user['name']}}</h1>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3  font-15">Ngày sinh: </label>
                                            <?php if($user['birthday'] == null): ?>
                                                <lable class="col-sm-9  font-15">( Chưa cập nhật )</lable>
                                            <?php else: ?>
                                                <lable class="col-sm-9  font-15"><?php echo date('d / m / Y', strtotime($user->birthday)); ?></lable>
                                            <?php endif ?>
                                            
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3  font-15">Giới tính: </label>
                                            <lable class="col-sm-9  font-15">
                                                <?php if($user['sex'] == 1): ?>
                                                    Nam
                                                <?php else: ?>
                                                    Nữ
                                                <?php endif ?>
                                            </lable>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3 font-15">Số điện thoại: </label>
                                            <?php if($user['phone'] == null): ?>
                                                <lable class="col-sm-9 font-15">( Chưa cập nhật )</lable>
                                            <?php else: ?>
                                                <lable class="col-sm-9 font-15"> 
                                                <a href="tel:{{$user->phone}}" target="_blank">
                                                    {{$user->phone}}
                                                </a>
                                            </lable>
                                            <?php endif ?>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3 font-15">Email: </label>
                                            <lable class="col-sm-9 font-15"> 
                                                <a href="mailto:{{$user->email}}" target="_blank">
                                                    {{$user->email}}
                                                </a>
                                            </lable>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3 font-15">Facebook: </label>
                                            <?php if($user['facebook'] == null): ?>
                                                <lable class="col-sm-9 font-15">( Chưa cập nhật )</lable>
                                            <?php else: ?>
                                                <lable class="col-sm-9 font-15"> 
                                                    <a href="{{$user->facebook}}" target="_blank">
                                                        {{$user->facebook}}
                                                    </a>
                                                </lable>
                                            <?php endif ?>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3 font-15">Địa chỉ: </label>
                                            
                                            <?php if($user['locations'] == null): ?>
                                                <lable class="col-sm-9 font-15">( Chưa cập nhật )</lable>
                                            <?php else: ?>
                                                <lable class="col-sm-9 font-15">{{$user->locations}}</lable>
                                            </lable>
                                            <?php endif ?>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="col-sm-3 font-15">Chức vụ: </label>
                                            <lable class="col-sm-9 font-15">{{$user->getPosition['name']}}</lable>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-12 text-center">
                                        
                                        <a href="{{route('admin.edit')}}" class="btn btn-primary waves-effect waves-light mr-3">
                                            <span>Chỉnh sửa</span>
                                        </a>
                                        <a href="{{route('admin.home')}}" class="btn btn-secondary">
                                            <span>Quay lại</span>
                                        </a>
                                    </div>
                                </div>

                                <!-- end row -->

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->

        </div>

    </div>
</div>
@endsection
@section('title')
	<title>{{$user['name']}} - Phụ kiện máy tính Hoàng Tú</title>
@endsection