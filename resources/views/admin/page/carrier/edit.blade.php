@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{$carrier->name}}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listcarrier')}}">Nhà cung cấp</a></li>
                            <li class="breadcrumb-item active">Cập nhật nhà cung cấp</li>
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
                                    <form class="form-horizontal" action="{{asset('admin/carrier/edit/'.$carrier['id'])}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Tên</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tên danh mục sản phẩm..." value="{{$carrier->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="phone">Số điện thoại</label>
                                            <div class="col-lg-10">
                                                <input type="number" data-parsley-type="number" class="form-control" required="" name="phone" id="phone" placeholder="Nhập số điện thoại liên hệ..." value="{{$carrier->phone}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="inputEmail3">Email</label>
                                            <div class="col-lg-10">
                                                <input type="email" parsley-type="email" class="form-control" name="email" id="inputEmail3" placeholder="Nhập địa chỉ email..." value="{{$carrier->email}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="website">Website</label>
                                            <div class="col-lg-10">
                                                <input type="url" parsley-type="url" class="form-control" name="website" id="website" placeholder="Nhập url website nhà cung cấp (nếu có)..." value="{{$carrier->website}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="locations">Địa chỉ</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="locations" id="locations" placeholder="Nhập địa chỉ nhà cung cấp..." value="{{$carrier->locations}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="des">Mô tả</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="5" name="description" id="des" placeholder="Nhập mô tả nhà cung cấp...">{{$carrier->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Trạng thái</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="inlineRadio1" value="1" name="status"
                                                        @if($carrier->status == 1)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="inlineRadio1"> Đang hợp tác </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="inlineRadio2" value="0" name="status"
                                                        @if($carrier->status == 0)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="inlineRadio2"> Ngừng hợp tác </label>
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
	<title>Cập nhật nhà cung cấp {{$carrier->name}} - Phụ kiện máy tính Hoàng Tú</title>
@endsection