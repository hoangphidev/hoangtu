@extends('admin.layout.index')
@section('main')
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
                            <li class="breadcrumb-item active">Đổi mật khẩu</li>
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
                        <h4 class="header-title mb-4 text-center">Nhập thông tin</h4>
                        @if(count($errors)>0)
                            <div class="alert alert-danger text-center">
                                @foreach($errors->all() as $er)
                                    {{$er}}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <form class="form-horizontal" action="{{route('admin.changepass')}}" method="POST">
                                        {!!csrf_field() !!}
                                        <div class="form-group row" hidden="">
                                            <label class="col-lg-2 col-form-label" for="email">Địa chỉ Email</label>
                                            <div class="col-lg-10">
                                                <input type="email" class="form-control" required="" name="email" id="email" placeholder="username@hoangtu.store" value="{{$user->email}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="email">Địa chỉ Email</label>
                                            <div class="col-lg-10">
                                                <input type="email" disabled="" class="form-control" required="" name="email" id="email" placeholder="username@hoangtu.store" value="{{$user->email}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="password">Mật khẩu</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="password" required="" id="password" name="password" placeholder="Nhập mật khẩu mới">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="repassword">Xác nhận</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="password" required="" id="repassword" name="repassword" placeholder="Xác nhận mật khẩu mới">
                                            </div>
                                        </div>

                                        <div class="form-group text-center mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-3" type="submit">
                                                Xác nhận
                                            </button>
                                            <a href="{{route('admin.home')}}" class="btn btn-secondary waves-effect waves-light">Hủy</a>
                                        </div>

                                    </form>
                                </div>
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
</div>
@endsection
@section('title')
    <title>Đổi mật khẩu - Phụ kiện máy tính Hoàng Tú</title>
@endsection