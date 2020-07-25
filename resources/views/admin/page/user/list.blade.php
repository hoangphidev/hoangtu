@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách nhân viên</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Nhân viên</li>
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
                                <?php if($userLogin->position_id == 2): ?>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>SĐT</th>
                                        <th>Giới tính</th>
                                        <th>Chức vụ</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                <?php else: ?>
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Giới tính</th>
                                        <th>Chức vụ</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                <?php endif ?>
                            </thead>

                            <tbody>
                                @foreach($users as $us)
                                <?php if($userLogin->position_id == 2): ?>
                                    <tr class="text-center">
                                        <td>{{$us->id}}</td>
                                        <td class="text-left">{{$us->name}}</td>
                                        <td class="text-left">{{$us->email}}</td>
                                        <?php if ($us->phone == ""): ?>
                                            <td>-</td>
                                        <?php else: ?>
                                            <td>{{$us->phone}}</td>
                                        <?php endif ?>
                                        <!-- sex -->
                                        <?php if($us['sex'] == 0): ?>
                                            <td>Nam</td>
                                        <?php else: ?>
                                            <td>Nữ</td>
                                        <?php endif ?>
                                        <td class="text-left">{{$us->getPosition['name']}}</td>
                                        <!-- status -->
                                        <?php if($us['status'] == 1): ?>
                                            <td><i class="mdi mdi-check-circle-outline text-success"></i> Hoạt động</td>
                                        <?php else: ?>
                                            <td><i class="mdi mdi-close-circle-outline text-danger"></i> Bị chặn</td>
                                        <?php endif ?>
                                    </tr>
                                <?php else: ?>
                                    <tr class="text-center">
                                        <td>{{$us->id}}</td>
                                        <td>{{$us->name}}</td>
                                        <td>{{$us->email}}</td>
                                        <!-- sex -->
                                        <?php if($us['sex'] == 0): ?>
                                            <td>Nam</td>
                                        <?php else: ?>
                                            <td>Nữ</td>
                                        <?php endif ?>
                                        <td>{{$us->getPosition['name']}}</td>
                                        <!-- status -->
                                        <?php if($us['status'] == 1): ?>
                                            <td><i class="mdi mdi-check-circle-outline text-success"></i> Hoạt động</td>
                                        <?php else: ?>
                                            <td><i class="mdi mdi-close-circle-outline text-danger"></i> Bị chặn</td>
                                        <?php endif ?>
                                        <?php if($us['id'] == 1): ?>
                                            <td>Không được phép</td>
                                        <?php else: ?>
                                            <td>
                                                <a href="{{asset('admin/user/delete/'.$us['id'])}}" class="text-dark" onClick="return confirm('Bạn có chắc chắn muốn xóa nhân viên {{$us->name}}?');"><i class="mdi mdi-delete-sweep text-danger"></i><span> Xóa </span></a>
                                                <a href="{{asset('admin/user/edit/'.$us['id'])}}" style="margin-left: 10px;" class="text-dark"><i class="far fa-edit text-success"></i><span class=""> Sửa </span></a>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                <?php endif ?>
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
	<title>Danh sách nhân viên - Phụ kiện máy tính Hoàng Tú</title>
@endsection