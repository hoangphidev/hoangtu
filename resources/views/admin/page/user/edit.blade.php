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
                            <li class="breadcrumb-item"><a href="{{route('listemployee')}}">Nhân viên</a></li>
                            <li class="breadcrumb-item active">{{$user->name}}</li>
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
                                    <form class="form-horizontal" action="{{asset('admin/user/edit/'.$user['id'])}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Họ tên</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nguyễn Văn A" value="{{$user->name}}">
                                            </div>
                                        </div>

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
                                            <label class="col-sm-2 control-label">Giới tính</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="sex1" value="0" name="sex"
                                                        @if($user->sex == 0)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="sex1"> Nam </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="sex2" value="1" name="sex"
                                                        @if($user->sex == 1)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="sex2"> Nữ </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="position_id">Chức vụ</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="position_id" id="position_id">
                                                    @foreach($position as $pt)
                                                    <option
                                                        @if($user->getPosition['id'] == $pt->id)
                                                            {{"selected"}}
                                                        @endif
                                                        value="{{$pt->id}}">{{$pt->name}}
                                                     </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Trạng thái</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="inlineRadio1" value="1" name="status"
                                                        @if($user->status == 1)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="inlineRadio1"> Bình thường </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="inlineRadio2" value="0" name="status"
                                                        @if($user->status == 0)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="inlineRadio2"> Bị chặn </label>
                                                </div>
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
	<title>Sửa nhân viên - Phụ kiện máy tính Hoàng Tú</title>
@endsection