@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{$product->name}}</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('listbanner')}}">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                                    <form class="form-horizontal" action="{{route('editproduct',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm</label>
                                            <input type="text" class="form-control" required="" name="name" id="name" placeholder="Nhập tên sản phẩm..." value="{{$product->name}}">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="amount">Số lượng</label>
                                                <input type="number" class="form-control text-center" min="0" value="{{$product->amount}}" required="" name="amount" id="amount" placeholder="Nhập số lượng sản phẩm...">
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="cate_id">Danh mục sản phẩm</label>
                                                <select class="form-control" name="cate_id" id="cate_id" disabled="">
                                                    @foreach($cate as $ct)
                                                    <option
                                                        @if($product->getCate['id'] == $ct->id)
                                                            {{"selected"}}
                                                        @endif
                                                        value="{{$ct->id}}">{{$ct->name}}
                                                     </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-sm-6" hidden="">
                                                <label for="cate_id">Danh mục sản phẩm</label>
                                                <select class="form-control" name="cate_id" id="cate_id">
                                                    @foreach($cate as $ct)
                                                    <option
                                                        @if($product->getCate['id'] == $ct->id)
                                                            {{"selected"}}
                                                        @endif
                                                        value="{{$ct->id}}">{{$ct->name}}
                                                     </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="price">Giá sản phẩm</label>
                                                <input type="number" class="form-control text-center" min="0" value="{{$product->price}}" required="" name="price" id="price" placeholder="Nhập giá sản phẩm...">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="percent_promotion">Khuyến mại</label>
                                                <input type="number" class="form-control text-center" value="{{$product->percent_promotion}}" min="0" max="100" name="percent_promotion" id="percent_promotion" placeholder="Nhập % khuyến mại...">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="start_promotion">Bắt đầu khuyến mại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker text-center" data-mask="99/99/9999" id="start_promotion" name="start_promotion" placeholder="ngày / tháng / năm" data-date-autoclose="true" value="{{ $product->start_promotion ? $product->start_promotion->format('d/m/Y')  : null }}">
                                                    <div class="input-group-append" for="start_promotion">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="end_promotion">Kết thúc khuyến mại</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker text-center" id="end_promotion" name="end_promotion" data-mask="99/99/9999" placeholder="ngày / tháng / năm" data-date-autoclose="true" value="{{ $product->end_promotion ? $product->end_promotion->format('d/m/Y')  : null }}">
                                                    <div class="input-group-append" for="end_promotion">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" hidden="">
                                            <label for="carrier_id">Nhà cung cấp</label>
                                            <select class="form-control" name="carrier_id" id="carrier_id">
                                                @foreach($carrier as $cr)
                                                <option
                                                    @if($product->getCarrier['id'] == $cr->id)
                                                        {{"selected"}}
                                                    @endif
                                                    value="{{$cr->id}}">{{$cr->name}}
                                                 </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                            <label>Trạng thái</label>
                                                <div class="">
                                                    <div class="radio radio-success form-check-inline ml-5">
                                                        <input type="radio" id="status1" value="1" name="status"
                                                            @if($product->status == 1)
                                                                {{"checked"}}
                                                            @endif
                                                        >
                                                        <label for="status1"> Đã xuất bản </label>
                                                    </div>
                                                    <div class="radio radio-danger form-check-inline ml-5">
                                                        <input type="radio" id="status2" value="0" name="status"
                                                            @if($product->status == 0)
                                                                {{"checked"}}
                                                            @endif
                                                        >
                                                        <label for="status2"> Ngừng xuất bản </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="carrier_id">Nhà cung cấp</label>
                                                <select class="form-control" name="carrier_id" id="carrier_id" disabled="">
                                                    @foreach($carrier as $cr)
                                                    <option
                                                        @if($product->getCarrier['id'] == $cr->id)
                                                            {{"selected"}}
                                                        @endif
                                                        value="{{$cr->id}}">{{$cr->name}}
                                                     </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="des">Mô tả</label>
                                            <textarea class="form-control" name="description" rows="5" id="des" placeholder="Nhập mô tả quảng cáo...">{{$product->description}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Hình ảnh</label>
                                        </div>

                                        <div class="form-group">
                                            <p>
                                                <img src="{{asset('/upload/product/'.$product->getCate['unsigned_name'].'/'.$product['images'])}}" width="150" alt="">
                                                <input type="text" value="{{$product->images}}" name="iconname" hidden="">
                                            </p>
                                            <input type="file" class="form-control" name="image" id="image">
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