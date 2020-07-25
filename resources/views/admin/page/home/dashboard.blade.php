@extends('admin.layout.index')
@section('main')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Hôm nay</h4>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row" id="demoload">
            <div class="col-xl-4 col-sm-6">
                <div class="card bg-primary">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{$views}}</span></h2>
                                <p class="mb-0">Lượt xem</p>
                            </div>
                            <i class="ion ion-md-eye"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card bg-secondary">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{$order}}</span></h2>
                                <p class="mb-0">Chờ duyệt</p>
                            </div>
                            <i class="ion ion-md-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card bg-pink">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h3 class="my-0 text-white"><span data-plugin="counterup">{{number_format($money)}}</span> đ</h3>
                                <p class="mb-0">Doanh thu ước tính</p>
                            </div>
                            <i class="ion ion-logo-usd"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Tháng này</h4>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="row" id="demoload">
            <div class="col-xl-4 col-sm-6">
                <div class="card bg-primary">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{$views_month}}</span></h2>
                                <p class="mb-0">Lượt xem</p>
                            </div>
                            <i class="ion ion-md-eye"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card bg-secondary">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{$order_month}}</span></h2>
                                <p class="mb-0">Thành công</p>
                            </div>
                            <i class="ion ion-md-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card bg-danger">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{$order_month_false}}</span></h2>
                                <p class="mb-0">Không thành công</p>
                            </div>
                            <i class="ion ion-md-close-circle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card bg-warning">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{$count}}</span></h2>
                                <p class="mb-0">Doanh số sản phẩm</p>
                            </div>
                            <i class="ion ion-md-analytics"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card bg-info">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h3 class="my-0 text-white"><span data-plugin="counterup">{{number_format($money_month)}}</span> đ</h3>
                                <p class="mb-0">Doanh thu thành công</p>
                            </div>
                            <i class="ion ion-logo-usd"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card bg-danger">
                    <div class="card-body widget-style-2">
                        <div class="text-white media">
                            <div class="media-body align-self-center">
                                <h3 class="my-0 text-white"><span data-plugin="counterup">{{number_format($money_month_false)}}</span> đ</h3>
                                <p class="mb-0">Doanh thu không thành công</p>
                            </div>
                            <i class="ion ion-logo-usd"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end container-fluid -->
</div>
@endsection
@section('title')
	<title>Quản trị website Phụ kiện máy tính Hoàng Tú</title>
@endsection