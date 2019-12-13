@include('includes.sidebar')
@include('includes.header')
@include('includes.footer')

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin</title>

        <!-- Custom fonts for this template-->
        <!-- URL for real time server -->
        <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::to('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{URL::to('css/sb-admin-2.min.css')}}" rel="stylesheet">

        <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        {{-- <link href="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> --}}

        	
       
    </head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        {{--Side bar--}}
        @yield('sidebar')

        <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">

                    {{--Header--}}
                    @yield('header')

                    <!-- Begin Page Content -->
                        <div class="container-fluid">
                            {{--Content--}}
                            @yield('content')

                        </div>
                        <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                {{--Footer--}}
                @yield('footer')
            </div>
        <!--End of content wrapper-->

    </div>
    <!--End of Page Wrapper-->

    <!-- Bootstrap core JavaScript-->
    
    <script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::to('js/sb-admin-2.min.js')}}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    {{-- <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script> --}}
</body>
</html>

