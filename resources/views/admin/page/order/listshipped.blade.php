@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Danh sách đơn hàng đã giao</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đã giao hàng</li>
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
                        <table id="datatable" class="table table-striped table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr class="text-center">
                                    <th>Mã đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt</th>
                                    <th>Ngày giao</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($order as $ct)
                                <tr class="text-center">
                                    <td>{{$ct->id}}</td>
                                    <td>
                                        <a href="{{route('orderdetail', ['id'=>$ct->id])}}">
                                            <span class="text-danger font-weight-bold">{{$ct->name}}</span>
                                        </a>
                                    </td>
                                    <td class="text-left">
                                        <?php foreach ($detail as $dt): ?>
                                            <?php if ($dt->order_id == $ct->id): ?>
                                                <?php foreach ($product as $pd): ?>
                                                    <?php if ($dt->product_id == $pd->id): ?>
                                                        <?= "- ".str_limit($pd->name, 30)?> <br>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </td>
                                    <td>{{number_format($ct->cost_total,0,',','.')}} đ</td>
                                    <td>{{$ct->created_at->format('d/m/Y')}}</td>
                                    <td>{{$ct->updated_at->format('d/m/Y')}}</td>
                                    <?php if($ct['status'] == 2): ?>
                                        <td>
                                            <label class="text-success font-weight-bold">
                                                <i class="ion ion-md-checkmark-circle-outline text-success"></i> Thành công
                                            </label>
                                        </td>
                                    <?php endif ?>
                                    <?php if($ct['status'] == 3): ?>
                                        <td>
                                            <label class="text-danger font-weight-bold">
                                                <i class="ion ion-md-close-circle text-danger"></i>
                                                 Huỷ đơn
                                            </label>
                                        </td>
                                    <?php endif ?>
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
    <title>Đơn hàng đã giao - Phụ kiện máy tính Hoàng Tú</title>
@endsection