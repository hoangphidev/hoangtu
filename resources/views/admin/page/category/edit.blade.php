@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{$cate->name}}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listcate')}}">Danh mục sản phẩm</a></li>
                            <li class="breadcrumb-item active">{{$cate->name}}</li>
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
                                    <form class="form-horizontal" action="{{asset('admin/category/edit/'.$cate['id'])}}" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Tên</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tên danh mục sản phẩm..." value="{{$cate->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Trạng thái</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="inlineRadio1" value="1" name="status"
                                                        @if($cate->status == 1)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="inlineRadio1"> Đang kinh doanh </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="inlineRadio2" value="0" name="status"
                                                        @if($cate->status == 0)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="inlineRadio2"> Ngừng kinh doanh </label>
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
	<title>Sửa danh mục sản phẩm mới - Phụ kiện máy tính Hoàng Tú</title>
@endsection