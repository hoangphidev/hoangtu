@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách danh mục sản phẩm</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($cate as $ct)
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>
                                    <td>{{$ct->name}}</td>
                                    <!-- status -->
                                    <?php if($ct['status'] == 1): ?>
                                        <td><i class="mdi mdi-check-circle-outline text-success"></i> Đang kinh doanh</td>
                                    <?php else: ?>
                                        <td><i class="mdi mdi-close-circle-outline text-danger"></i> Ngừng kinh doanh</td>
                                    <?php endif ?>
                                    <td>
                                        <a href="{{asset('admin/category/delete/'.$ct['id'])}}" class="text-dark" onClick="return confirm('Bạn có chắc chắn muốn xóa danh mục {{$ct->name}}?');"><i class="mdi mdi-delete-sweep text-danger"></i><span> Xóa </span></a>
                                        <a href="{{asset('admin/category/edit/'.$ct['id'])}}" style="margin-left: 10px;" class="text-dark"><i class="far fa-edit text-success"></i><span class=""> Sửa </span></a>
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
	<title>Danh sách danh mục sản phẩm - Phụ kiện máy tính Hoàng Tú</title>
@endsection