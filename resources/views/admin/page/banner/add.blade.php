@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm quảng cáo</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listbanner')}}">Quảng cáo</a></li>
                            <li class="breadcrumb-item active">Thêm quảng cáo</li>
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
                                    <form class="form-horizontal" action="{{route('addbanner')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="name">Tiêu đề</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tiêu đề quảng cáo...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="des">Mô tả</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" required="" name="description" rows="5" id="des" placeholder="Nhập mô tả quảng cáo..."></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Vị trí quảng cáo</label>
                                            <div class="col-sm-10">
                                                <div class="radio radio-success form-check-inline">
                                                    <input type="radio" id="position1" value="1" name="locate" checked="true">
                                                    <label for="position1"> Slide </label>
                                                </div>
                                                <div class="radio radio-danger form-check-inline">
                                                    <input type="radio" id="position2" value="2" name="locate">
                                                    <label for="position2"> Chính giữa </label>
                                                </div>
                                                <div class="radio radio-dark form-check-inline">
                                                    <input type="radio" id="position3" value="3" name="locate">
                                                    <label for="position3"> Bên trái </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="image">Hình ảnh</label>
                                            <div class="col-lg-10">
                                                <input type="file" class="form-control" required="" name="image" id="image">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="cate_id">Danh mục sản phẩm</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="cate_id" id="cate_id">
                                                    @foreach($cate as $ct)
                                                    <?php if($ct['status'] == 1): ?>
                                                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                                                    <?php endif ?>
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
	<title>Thêm quảng cáo mới - Phụ kiện máy tính Hoàng Tú</title>
@endsection