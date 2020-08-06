<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="utf-8">

        @yield('title')
        <base href="{{asset('')}}">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets\images\fav.ico">
        <link href="assets\libs\custombox\custombox.min.css" rel="stylesheet" type="text/css">

        <!-- Plugins css-->
        <link href="assets\libs\sweetalert2\sweetalert2.min.css" rel="stylesheet" type="text/css">

        <link href="assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css" rel="stylesheet">
        <link href="assets\libs\switchery\switchery.min.css" rel="stylesheet" type="text/css">

        <link href="assets\libs\quill\quill.core.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\quill\quill.bubble.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\quill\quill.snow.css" rel="stylesheet" type="text/css">

        <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css" rel="stylesheet">
        <link href="assets\libs\bootstrap-timepicker\bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="assets\libs\bootstrap-colorpicker\bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="assets\libs\bootstrap-datepicker\bootstrap-datepicker.css" rel="stylesheet">

        <!-- third party css -->
        <link href="assets\libs\datatables\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

        <!-- App css -->
        <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            @include('admin.layout.topbar')
            <!-- end Topbar --> 

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layout.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                @yield('main')
                <!-- end content -->

                <!-- Footer Start -->
                @include('admin.layout.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <script src="assets\libs\custombox\custombox.min.js"></script>

        <!-- Plugin js-->
        <script src="assets\libs\parsleyjs\parsley.min.js"></script>
        <script src="assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js"></script>
        <script src="assets\libs\switchery\switchery.min.js"></script>

        <script src="assets\libs\select2\select2.min.js"></script>
        <script src="assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>
        <script src="assets\libs\jquery-mask-plugin\jquery.mask.min.js"></script>
        <script src="assets\libs\moment\moment.min.js"></script>
        <script src="assets\libs\bootstrap-timepicker\bootstrap-timepicker.min.js"></script>
        <script src="assets\libs\bootstrap-colorpicker\bootstrap-colorpicker.min.js"></script>
        <script src="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>

        <script src="assets\libs\katex\katex.min.js"></script>
        <script src="assets\libs\quill\quill.min.js"></script>

       

        <!-- Init js-->
        <script src="assets\js\pages\form-advanced.init.js"></script>
        <script src="assets\js\pages\form-quilljs.init.js"></script>

        <!-- Validation init js-->
        <script src="assets\js\pages\form-validation.init.js"></script>

        <script src="assets\libs\moment\moment.min.js"></script>
        <script src="assets\libs\jquery-scrollto\jquery.scrollTo.min.js"></script>
        <script src="assets\libs\sweetalert2\sweetalert2.min.js"></script>

        <!-- Chat app -->
        <script src="assets\js\pages\jquery.chat.js"></script>

        <!-- Todo app -->
        <script src="assets\js\pages\jquery.todo.js"></script>

        <!--Morris Chart-->
        <script src="assets\libs\morris-js\morris.min.js"></script>
        <script src="assets\libs\raphael\raphael.min.js"></script>

        <!-- Sparkline charts -->
        <script src="assets\libs\jquery-sparkline\jquery.sparkline.min.js"></script>

        <!-- Dashboard init JS -->
        <script src="assets\js\pages\dashboard.init.js"></script>

        <!-- Required datatable js -->
        <script src="assets\libs\datatables\jquery.dataTables.min.js"></script>
        <script src="assets\libs\datatables\dataTables.bootstrap4.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets\libs\datatables\dataTables.responsive.min.js"></script>
        <script src="assets\libs\datatables\responsive.bootstrap4.min.js"></script>

        <script src="assets\libs\datatables\dataTables.keyTable.min.js"></script>
        <script src="assets\libs\datatables\dataTables.select.min.js"></script>
        
        <script src="assets\js\bootstrap-datepicker.vi.min.js"></script>
        @include('admin.layout.js')
        
        <!-- Datatables init -->
        <script src="assets\js\pages\datatables.init.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>
    </body>
</html>