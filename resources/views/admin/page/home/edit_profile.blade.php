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
                                    <li class="breadcrumb-item active">Cập nhật tài khoản</li>
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

                                <div class="">
                                    @if(count($errors)>0)
                                        <div class="alert alert-danger text-center">
                                            @foreach($errors->all() as $er)
                                                {{$er}}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form class="form-horizontal" action="{{asset(route('admin.edit.profile'))}}" method="POST" enctype="multipart/form-data"> 
                                        @csrf
                                        <div class="row col-12">
                                            <div class="form-group col-sm-4 mt-5 text-center">
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

                                                <input type="file" name="image" class="mt-3 btn btn-danger form-control">
                                                <input type="text" name="iconname" class="mt-3 btn btn-danger form-control" hidden="" value="{{$user->avatar}}">

                                            </div>
                                            <div class="form-group col-sm-8 mt-3 mb-3">
                                                <div class="row form-group mt-3">
                                                    <label class="col-sm-3 mt-auto font-15 " for="name">Họ tên: </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" required="" class="form-control" id="name" placeholder="Nhập họ tên của bạn..." value="{{$user->name}}">
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <label class="col-sm-3 font-15">Email: </label>
                                                    <lable class="col-sm-9 font-15"> 
                                                        <a href="mailto:{{$user->email}}" target="_blank">
                                                            {{$user->email}}
                                                        </a>
                                                    </lable>
                                                    <input type="text" name="email" value="{{$user->email}}" hidden="">
                                                </div>

                                                <div class="row form-group mt-2">
                                                    <label class="col-sm-3 font-15" for="phone">Số điện thoại: </label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="phone" data-mask="9999999999"" id="phone" placeholder="Nhập số điện thoại của bạn..." value="{{$user->phone}}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row form-group mt-2">
                                                    <label class="col-sm-3  font-15 control-label">Giới tính: </label>
                                                    <div class="col-sm-9">
                                                        <div class="radio radio-success form-check-inline">
                                                            <input type="radio" id="sex1" value="1" name="sex"
                                                                @if($user->sex == 1)
                                                                    {{"checked"}}
                                                                @endif
                                                            >
                                                            <label for="sex1"> Nam </label>
                                                        </div>
                                                        <div class="radio radio-danger form-check-inline">
                                                            <input type="radio" id="sex2" value="2" name="sex"
                                                                @if($user->sex == 2)
                                                                    {{"checked"}}
                                                                @endif
                                                            >
                                                            <label for="sex2"> Nữ </label>
                                                        </div>
                                                    </div>
                                                </div> 

                                                <div class="row form-group mt-2">
                                                    <label class="col-sm-3 font-15">Địa chỉ: </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="locations" id="locations" placeholder="Nhập địa chỉ của bạn..." value="{{$user->locations}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <label class="col-sm-3 font-15">Chức vụ: </label>
                                                    <lable class="col-sm-9 font-15">{{$user->getPosition['name']}}</lable>
                                                </div>

                                                <div class="form-group row" hidden="">
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

                                                <div class="form-group row" hidden="">
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
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-3">
                                                Cập nhật
                                            </button>
                                            <a href="{{route('admin.profile')}}" class="btn btn-secondary">
                                                <span>Quay lại</span>
                                            </a>
                                        </div>
                                    </div>
                                    </form>

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
	<title>Cập nhật {{$user['name']}} - Phụ kiện máy tính Hoàng Tú</title>
@endsection