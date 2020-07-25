@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm nhân viên</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listemployee')}}">Nhân viên</a></li>
                            <li class="breadcrumb-item active">Thêm nhân viên</li>
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
                                    <form class="form-horizontal" action="{{route('addemployee')}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Họ tên</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nguyễn Văn A">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="email">Địa chỉ Email</label>
                                            <div class="col-lg-10">
                                                <input type="email" class="form-control" required="" name="email" id="email" placeholder="username@hoangtu.store">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Giới tính</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="inlineRadio1" value="1" name="sex" checked="true">
                                                    <label for="inlineRadio1"> Nam </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="inlineRadio2" value="0" name="sex">
                                                    <label for="inlineRadio2"> Nữ </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="position_id">Chức vụ</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="position_id" id="position_id">
                                                    @foreach($position as $pt)
                                                    <option value="{{$pt->id}}">{{$pt->name}}</option>
                                                    @endforeach
                                                </select>
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
	<title>Thêm nhân viên mới - Phụ kiện máy tính Hoàng Tú</title>
@endsection