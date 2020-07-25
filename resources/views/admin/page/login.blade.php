<!DOCTYPE html>
<html lang="vn">

    <head>
        <meta charset="utf-8">
        <title>Đăng nhập hệ thống quản trị website Phụ kiện máy tính Hoàng Tú</title>
        <base href="{{asset('')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\fav.ico">

        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header p-4 bg-primary text-center">
                                <img src="{{asset('assets\images\logo_light.png')}}" height="130" align="center">
                            </div>
                            <div class="card-body">

                                @if(session('notice'))
                                    <div class="alert alert-danger text-center">
                                        {{session('notice')}}
                                    </div>
                                @endif

                                <form action="{{route('admin.login')}}" method="POST" class="p-2">
                                    {!! csrf_field() !!}
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email :</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" name="email" placeholder="Nhập email để đăng nhập">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Mật khẩu :</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Nhập mật khẩu để đăng nhập">
                                    </div>

                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="mb-3 col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit"><i class="ion ion-ios-log-in mr-2"></i> Đăng nhập</button>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <span>Hoặc</span>
                                        </div>
                                        <div class="col-12">
                                            <a class="btn btn-md btn-block btn-outline-danger waves-effect waves-light" href="{{route('admin.login.google')}}">
                                                <i class="fab fa-google-plus-square mr-2"></i> Đăng nhập với Google</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>

    </body>

</html>