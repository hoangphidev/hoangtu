@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách sản phẩm</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @if(session('notice'))
            <div class="alert alert-success text-center">
                {{session('notice')}}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr class="text-center">
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá bán</th>
                                    <th>Sale</th>
                                    <th>Đã bán</th>
                                    <th>Còn lại</th>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($product as $pd)
                                <tr class="text-center">
                                    <td>
                                        <img src="{{asset('/upload/product/'.$pd->getCate['unsigned_name'].'/'.$pd['images'])}}" height="50">
                                    </td>
                                    <td>{{str_limit($pd->name, 20)}}</td>
                                    <td>{{number_format($pd->price)}}</td>
                                    <?php if($pd['percent_promotion'] == null): ?>
                                        <td>-</td>
                                    <?php else: ?>
                                        <td>{{$pd->percent_promotion}} %</td>
                                    <?php endif ?>
                                    
                                    <td>{{$pd->sale}}</td>
                                    <td>{{$pd->amount}}</td>
                                    <td>
                                        <?php if ($pd['cate_id'] == $pd->getCate['id']): ?>
                                            <label>
                                                {{$pd->getCate['name']}}
                                            </label>
                                        <?php endif ?>
                                    </td>
                                    <!-- status -->
                                    <?php if($pd['status'] == 1): ?>
                                        <td><i class="mdi mdi-check-circle-outline text-success"></i> Đang bán</td>
                                    <?php else: ?>
                                        <td><i class="mdi mdi-close-circle-outline text-danger"></i> Ngừng bán</td>
                                    <?php endif ?>
                                    <td style="width: 13%;">
                                        <a href="{{asset('admin/product/edit/'.$pd['id'])}}" style="margin-right: 10px;" class="text-dark"><i class="far fa-edit text-success"></i><span class=""> Sửa </span></a>
                                        <a href="{{asset('admin/product/delete/'.$pd['id'])}}" class="text-dark" onClick="return confirm('Bạn có chắc chắn muốn xóa danh mục {{$pd->name}}?');"><i class="mdi mdi-delete-sweep text-danger"></i><span> Xóa </span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
</div>
@endsection
@section('title')
	<title>Danh sách sản phẩm - Phụ kiện máy tính Hoàng Tú</title>
@endsection