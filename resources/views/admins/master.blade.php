<!DOCTYPE html>
<html lang="en" ng-app="my-app">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <link href="<?php echo asset('public/template/vendor/bootstrap/css/bootstrap.min.css') ; ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo asset('public/template/vendor/metisMenu/metisMenu.min.css') ; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo asset('public/template/dist/css/sb-admin-2.css') ; ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo asset('public/template/vendor/font-awesome/css/font-awesome.min.css') ; ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <link href="<?php echo asset('public/template/css/admin.css') ; ?>" rel="stylesheet" type="text/css">
    @yield('header')
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!! Auth::user()->name!!} 
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{!! url('adminsites/account/profile') !!}"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        </li>
                        <li><a href="{!! url('adminsites/account/edit') !!}"><i class="fa fa-gear fa-fw"></i> Cập nhật thông tin</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!! url('logout') !!}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{!! url('adminsites') !!}"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                        </li>
                         <li>
                            <a href="{!! url('adminsites/category/list') !!}">Quản lý danh mục</a>
                        </li>
                       



 
             
                 
             
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> @yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                 @include('blocks.error')  
                @include('blocks.flash')
                @yield('content')

            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo asset('public/template/vendor/jquery/jquery.min.js') ; ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset('public/template/vendor/bootstrap/js/bootstrap.min.js') ; ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo asset('public/template/vendor/metisMenu/metisMenu.min.js') ; ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo asset('public/template/dist/js/sb-admin-2.js') ; ?>"></script>
    <script src="<?php echo asset('public/app/lib/angular.min.js') ; ?>"></script>
    <script src="<?php echo asset('public/app/app.js') ; ?>"></script>   
@yield('footer')
</body>

</html>
