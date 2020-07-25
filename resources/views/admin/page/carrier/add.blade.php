@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm nhà cung cấp</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listcarrier')}}">Danh sách nhà cung cấp</a></li>
                            <li class="breadcrumb-item active">Thêm nhà cung cấp</li>
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
                        <h4 class="header-title mb-4">Nhập thông tin</h4>
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
                                    <form class="form-horizontal" action="{{route('addcarrier')}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Tên</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tên nhà cung cấp...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="phone">Số điện thoại</label>
                                            <div class="col-lg-10">
                                                <input type="number" data-parsley-type="number" data-mask="9999999999" class="form-control" required="" name="phone" id="phone" placeholder="Nhập số điện thoại liên hệ...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="inputEmail3">Email</label>
                                            <div class="col-lg-10">
                                                <input type="email" parsley-type="email" class="form-control" name="email" id="inputEmail3" placeholder="Nhập địa chỉ email...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="website">Website</label>
                                            <div class="col-lg-10">
                                                <input type="url" parsley-type="url" class="form-control" name="website" id="website" placeholder="Nhập url website nhà cung cấp (nếu có)...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="locations">Địa chỉ</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="locations" id="locations" placeholder="Nhập địa chỉ nhà cung cấp...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="des">Mô tả</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="5" name="description" id="des" placeholder="Nhập mô tả nhà cung cấp..."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group text-center mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Xác nhận
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Làm mới
                                            </button>
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
	<title>Thêm nhà cung cấp mới - Phụ kiện máy tính Hoàng Tú</title>
@endsection