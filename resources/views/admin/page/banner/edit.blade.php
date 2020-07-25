@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{$banner->name}}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listbanner')}}">Quảng cáo</a></li>
                            <li class="breadcrumb-item active">Sửa quảng cáo</li>
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
                                    <form class="form-horizontal" action="{{asset('admin/banner/edit/'.$banner->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Tiêu đề</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tiêu đề quảng cáo..." value="{{$banner->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="des">Mô tả</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" required="" name="description" rows="5" id="des" placeholder="Nhập mô tả quảng cáo...">{{$banner->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Trạng thái</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="locate1" value="1" name="locate"
                                                        @if($banner->locate == 1)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="locate1"> Slide </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="locate2" value="2" name="locate"
                                                        @if($banner->locate == 2)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="locate2"> Chính giữa </label>
                                                </div>
                                                <div class="radio radio-dark form-check-inline">
                                                    <input type="radio" id="locate3" value="3" name="locate"
                                                        @if($banner->locate == 3)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="locate3"> Bên trái </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="image">Hình ảnh</label>
                                            <div class="col-lg-10">
                                                <p>
                                                    <img width="200px" src="{{ asset('/upload/banner/'.$banner->images) }}">
                                                    <input type="text" name="iconname" value="{{$banner->images}}" hidden>
                                                </p>
                                                <input type="file" class="form-control" name="image" id="image">
                                            </div>
                                        </div>

                                        <div class="form-group row" hidden="">
                                            <label class="col-lg-2 col-form-label" for="cate_id">Danh mục sản phẩm</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="cate_id" id="cate_id">
                                                    @foreach($cate as $ct)
                                                    <option
                                                        @if($banner->getCate['id'] == $ct->id)
                                                            {{"selected"}}
                                                        @endif
                                                        value="{{$ct->id}}">{{$ct->name}}
                                                     </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Trạng thái</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="status1" value="1" name="status"
                                                        @if($banner->status == 1)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="status1"> Đã xuất bản </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="status2" value="0" name="status"
                                                        @if($banner->status == 0)
                                                            {{"checked"}}
                                                        @endif
                                                    >
                                                    <label for="status2"> Ngừng xuất bản </label>
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
	<title>{{$banner->name}} - Phụ kiện máy tính Hoàng Tú</title>
@endsection