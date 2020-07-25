@extends('admin.layout.index')
@section('main')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Chi tiết đơn hàng</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
                            <?php if ($order->status == 0): ?>
                                <li class="breadcrumb-item"><a href="{{route('listorder')}}">Đơn hàng chưa chốt</a></li>
                            <?php endif ?>
                            <?php if ($order->status == 1): ?>
                                <li class="breadcrumb-item"><a href="{{route('listdelivery')}}">Đơn hàng đang giao</a></li>
                            <?php endif ?>
                            <?php if ($order->status > 1): ?>
                                <li class="breadcrumb-item"><a href="{{route('shiped')}}">Đơn hàng đã giao</a></li>
                            <?php endif ?>
                            <li class="breadcrumb-item">Đơn hàng #{{$order->id}}</li>
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
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="panel-heading">
                                    <h4>Invoice</h4>
                                </div> -->
                    <div class="card-body">
                        <div class="clearfix">
                            <h5 class="float-left ml-2">Chi tiết đơn hàng 
                                <strong> #{{$order->created_at->format('Ymd')}}-{{$order->id}}</strong>
                            </h5>
                            <div class="d-print-none float-right mr-3">
                                <div class="text-center">
                                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-left mt-4 ml-4">
                                    <p><strong>Khách hàng: </strong> {{$order->name}}</p>
                                    <p class="mt-2"><strong>Số điện thoại: </strong> {{$order->phone}}</p>
                                    <p class="mt-2"><strong>Email: </strong> {{$order->email}}</p>
                                    <p class="mt-2">
                                        <strong>Địa chỉ: </strong>
                                        <span>
                                            {{$order->customer_address}}
                                        </span>
                                    </p>
                                </div>
                                <div class="float-right mt-4 mr-4">
                                    <p><strong>Mã đơn hàng: </strong> #{{$order->id}}</p>
                                    <p class="mt-2"><strong>Ngày đặt: </strong> {{$order->created_at->format('d-m-Y')}}</p>
                                    <?php if ($order->status == 2): ?>
                                        <p class="mt-2"><strong>Ngày giao: </strong> {{$order->updated_at->format('d-m-Y')}}</p>
                                    <?php endif ?>
                                    <?php if ($order->status == 3): ?>
                                        <p class="mt-2"><strong>Ngày hủy: </strong> {{$order->updated_at->format('d-m-Y')}}</p>
                                    <?php endif ?>
                                    <p class="mt-2">
                                        <strong>Trạng thái: </strong>
                                        <span class="badge badge-pink">
                                            <?php if ($order->status == 0): ?>
                                                Chờ duyệt
                                            <?php endif ?>
                                            <?php if ($order->status == 1): ?>
                                                Giao hàng
                                            <?php endif ?>
                                            <?php if ($order->status == 2): ?>
                                                Đã nhận
                                            <?php endif ?>
                                            <?php if ($order->status == 3): ?>
                                                Hủy đơn
                                            <?php endif ?>
                                        </span>
                                    </p>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <?php $i = 1; ?>
                                            @foreach($detail as $dt)
                                                @foreach($product as $pd)
                                                    @if($dt->product_id == $pd->id)
                                                        <tr class="text-center">
                                                            <td><?php echo $i++; ?></td>
                                                            <td>
                                                                <img width="80rem" src="{{asset('/upload/product/'.$pd->getCate['unsigned_name'].'/'.$pd['images'])}}">
                                                            </td>
                                                            <td class="text-left">{{$pd->name}}</td>
                                                            <?php $price = $pd->price*(100 - $pd->percent_promotion)/100 ?>
                                                            <td>{{number_format($price,0,',','.')}} đ</td>
                                                            <td>{{$dt->count}}</td>
                                                            <td>
                                                                <?php $gia = $price; $sl = $dt->count; $tt = $gia*$sl; echo number_format($tt,0,',','.')." đ"; ?>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px">
                            <div class="col-md-3 offset-md-9">
                                <p class="text-right"><b>Tổng thanh toán:</b> {{number_format($order->cost_total,0,',','.')}} đ</p>
                                <hr>
                                <h4 class="text-right">{{number_format($order->cost_total,0,',','.')}} đ</h4>
                            </div>
                        </div>
                        
                        <?php if($order['status'] == 0): ?>
                            <?php if ($userLogin->position_id != 2): ?>        
                                <hr>
                                <div class="text-center">
                                    <a href="{{route('listorder')}}" class="btn btn-outline-secondary mr-3" role="button">
                                        <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>
                                        Quay lại
                                    </a>
                                    <a href="{{route('delivery', ['id'=>$order['id']])}}" class="btn btn-outline-success mr-3" role="button">
                                        <i class="fa fa-truck mr-1" aria-hidden="true"></i> Giao hàng
                                    </a>
                                    <a href="{{route('cancelorder', ['id'=>$order['id']])}}" class="btn btn-outline-danger mr-3" role="button">
                                         <i class="ion ion-md-trash mr-1" aria-hidden="true"></i> Huỷ đơn hàng
                                    </a>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                        <?php if($order['status'] == 1): ?>
                            <?php if ($userLogin->position_id != 2): ?>        
                                <hr>
                                <div class="text-center">
                                    <a href="{{route('listdelivery')}}" class="btn btn-outline-secondary mr-3" role="button">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Quay lại
                                    </a>
                                    <a href="{{route('delivered', ['id'=>$order['id']])}}" class="btn btn-outline-success mr-3" role="button">
                                        <i class="fa fa-truck mr-1" aria-hidden="true"></i> Đã giao hàng
                                    </a>
                                    <a href="{{route('cancelorder', ['id'=>$order['id']])}}" class="btn btn-outline-danger mr-3" role="button">
                                         <i class="ion ion-md-trash mr-1" aria-hidden="true"></i> Huỷ đơn hàng
                                    </a>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div>
</div>
@endsection
@section('title')
    <title>Chi tiết đơn hàng #{{$order->created_at->format('Ymd')}}-{{$order->id}} - Phụ kiện máy tính Hoàng Tú</title>
@endsection