@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm sản phẩm</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listbanner')}}">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                                    <form class="form-horizontal" action="{{route('addproduct')}}" method="POST" enctype="multipart/form-data">
                                        {!!csrf_field() !!}

                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm</label>
                                            <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tên sản phẩm...">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="amount">Số lượng</label>
                                                <input type="number" class="form-control text-center" min="0" required="" name="amount" id="amount" placeholder="Nhập số lượng sản phẩm...">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="cate_id">Danh mục sản phẩm</label>
                                                <select class="form-control" name="cate_id" id="cate_id">
                                                    @foreach($cate as $ct)
                                                    <?php if($ct['status'] == 1): ?>
                                                        <option value="{{$ct->id}}">{{$ct->name}}</option>
                                                    <?php endif ?>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="price">Giá sản phẩm</label>
                                                <input type="number" class="form-control text-center" min="0" required="" name="price" id="price" placeholder="Nhập giá sản phẩm...">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="percent_promotion">Khuyến mại</label>
                                                <input type="number" class="form-control text-center" min="0" max="70" name="percent_promotion" id="percent_promotion" placeholder="Nhập % khuyến mại...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="start_promotion">Bắt đầu khuyến mại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker text-center" data-mask="99/99/9999" id="start_promotion" name="start_promotion" placeholder="ngày / tháng / năm" data-date-autoclose="true">
                                                    <div class="input-group-append" for="start_promotion">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="end_promotion">Kết thúc khuyến mại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker text-center" id="end_promotion" name="end_promotion" data-mask="99/99/9999" placeholder="ngày / tháng / năm" data-date-autoclose="true">
                                                    <div class="input-group-append" for="end_promotion">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="carrier_id">Nhà cung cấp</label>
                                            <select class="form-control" name="carrier_id" id="carrier_id">
                                                @foreach($carrier as $cr)
                                                <?php if($cr['status'] == 1): ?>
                                                    <option value="{{$cr->id}}">{{$cr->name}}</option>
                                                <?php endif ?>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="des">Mô tả</label>
                                        
                                            <textarea class="form-control" name="description" rows="5" id="des" placeholder="Nhập mô tả sản phẩm..."></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Hình ảnh</label>
                                            <input type="file" class="form-control" required="" name="image" id="image">
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
	<title>Thêm sản phẩm mới - Phụ kiện máy tính Hoàng Tú</title>
@endsection