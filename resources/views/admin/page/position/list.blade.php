@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách chức vụ</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chức vụ</li>
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
                                    <th>Chức vụ</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($positions as $pt)
                                <tr class="text-center">
                                    <td><?php echo $i++; ?></td>
                                    <td>{{$pt->name}}</td>
                                    <td>
                                        <a href="{{asset('admin/position/delete/'.$pt['id'])}}" class="text-dark" onClick="return confirm('Bạn có chắc chắn muốn xóa chức vụ {{$pt->name}}?');"><i class="mdi mdi-delete-sweep text-danger"></i><span> Xóa </span></a>
                                        <a href="{{asset('admin/position/edit/'.$pt['id'])}}" style="margin-left: 10px;" class="text-dark"><i class="far fa-edit text-success"></i><span class=""> Sửa </span></a>
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
	<title>Danh sách chức vụ - Phụ kiện máy tính Hoàng Tú</title>
@endsection