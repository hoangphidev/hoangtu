@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách quảng cáo</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Quảng cáo</li>
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
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($banner as $bn)
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <img src="{{asset('/upload/banner/'.$bn['images'])}}" width="150">
                                    </td>
                                    <td style="width: 45%;">{{$bn->name}}</td>
                                    <!-- status -->
                                    <?php if($bn['status'] == 1): ?>
                                        <td><i class="mdi mdi-check-circle-outline text-success"></i> Đã xuất bản</td>
                                    <?php else: ?>
                                        <td><i class="mdi mdi-close-circle-outline text-danger"></i> Ngừng xuất bản</td>
                                    <?php endif ?>
                                    <td>
                                        <a href="{{asset('admin/banner/delete/'.$bn['id'])}}" class="text-dark" onClick="return confirm('Bạn có chắc chắn muốn xóa danh mục {{$bn->name}}?');"><i class="mdi mdi-delete-sweep text-danger"></i><span> Xóa </span></a>
                                        <a href="{{asset('admin/banner/edit/'.$bn['id'])}}" style="margin-left: 10px;" class="text-dark"><i class="far fa-edit text-success"></i><span class=""> Sửa </span></a>
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
	<title>Danh sách quảng cáo - Phụ kiện máy tính Hoàng Tú</title>
@endsection