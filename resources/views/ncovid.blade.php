<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Thống kê về NCovid</title>
        <base href="{{asset('')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\favicon.ico">

        <!-- Plugins css-->
        <link href="assets\libs\sweetalert2\sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- third party css -->
        <link href="assets\libs\datatables\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body data-layout="horizontal">
            
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Việt Nam</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item active"> 
                                            <?php echo Carbon\Carbon::now()->format('H : m : s , d/m/Y');?>
                                                
                                            </li>
                                    </ol>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body widget-style-2">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h2 class="my-0"><span data-plugin="counterup">{{number_format($data['vn']['cases'])}}</span></h2>
                                            <p class="mb-0">Số ca nhiễm</p>
                                        </div>
                                        <i class="ion ion-md-trending-up text-pink bg-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body widget-style-2">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h2 class="my-0"><span data-plugin="counterup">{{number_format($data['vn']['recovered'])}}</span></h2>
                                            <p class="mb-0">Phục hồi</p>
                                        </div>
                                        <i class="ion ion-md-heart text-danger bg-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body widget-style-2">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h2 class="my-0"><span data-plugin="counterup">{{number_format($data['vn']['deaths'])}}</span></h2>
                                            <p class="mb-0">Tử vong</p>
                                        </div>
                                        <i class="ion ion-md-heart-dislike text-dark bg-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Thế Giới</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item active"> 
                                            <?php echo Carbon\Carbon::now()->format('H : m : s , d/m/Y');?>
                                                
                                            </li>
                                    </ol>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body widget-style-2">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h2 class="my-0"><span data-plugin="counterup">{{number_format($data['world']['cases'])}}</span></h2>
                                            <p class="mb-0">Số ca nhiễm</p>
                                        </div>
                                        <i class="ion ion-md-trending-up text-pink bg-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body widget-style-2">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h2 class="my-0"><span data-plugin="counterup">{{number_format($data['world']['recovered'])}}</span></h2>
                                            <p class="mb-0">Phục hồi</p>
                                        </div>
                                        <i class="ion ion-md-heart text-danger bg-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="card">
                                <div class="card-body widget-style-2">
                                    <div class="media">
                                        <div class="media-body align-self-center">
                                            <h2 class="my-0"><span data-plugin="counterup">{{number_format($data['world']['deaths'])}}</span></h2>
                                            <p class="mb-0">Tử vong</p>
                                        </div>
                                        <i class="ion ion-md-heart-dislike text-dark bg-light"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Các quốc gia khác</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item active"> 
                                            <?php echo Carbon\Carbon::now()->format('H : m : s , d/m/Y');?>
                                                
                                            </li>
                                    </ol>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive mt-0">
                                    <table id="datatable" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Quốc gia</th>
                                                <th>Ca nhiễm</th>
                                                <th>Tử vong</th>
                                                <th>Phục hồi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['data'] as $value)
                                            <tr class="text-center">
                                                <td class="text-left">{{$value['country']}}</td>
                                                <td>{{$value['cases']}}</td>
                                                <td>{{$value['deaths']}}</td>
                                                <td>{{$value['recovered']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->
            <!-- Footer Start -->
            <div>
            <!-- end Footer -->
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <script src="assets\libs\moment\moment.min.js"></script>
        <script src="assets\libs\jquery-scrollto\jquery.scrollTo.min.js"></script>
        <script src="assets\libs\sweetalert2\sweetalert2.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets\libs\datatables\jquery.dataTables.min.js"></script>
        <script src="assets\libs\datatables\dataTables.bootstrap4.min.js"></script>

        <!-- Init js -->
        <script src="assets\js\pages\responsive-table.init.js"></script>

        <!-- Dashboard init JS -->
        <script src="assets\js\pages\dashboard.init.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#datatable').dataTable({
                    "language": {
                        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                        "emptyTable": "Không có dữ liệu",
                        "search": "Tìm kiếm",
                        "info": "Hiển thị từ _START_ đến _END_ trong _TOTAL_ kết quả",
                        "infoEmpty": "Hiển thị 0 kết quả",
                        "infoFiltered": "(Lọc từ _MAX_ kết quả)",
                        "paginate": { "first": "Đầu", "last": "Cuối", "next": "Sau", "previous": "Trước" },
                        "lengthMenu": "Hiện _MENU_ mục",
                    }
                });
            });
        </script>


        <!-- App js -->
        <script src="assets\js\app.min.js"></script>

    </body>

</html>