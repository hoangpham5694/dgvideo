<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ Session::token() }}"> 
    <title>Login</title>

    <!-- Bootstrap Core CSS -->
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

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Quản trị video</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên đăng nhập" name="txtUsername" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="txtPassword" type="password" value="">
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="form-group">
                                    @include('blocks.error')  
                                    @include('blocks.flash')
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                               
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Đăng nhập" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo asset('public/template/vendor/jquery/jquery.min.js') ; ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo asset('public/template/vendor/bootstrap/js/bootstrap.min.js') ; ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo asset('public/template/vendor/metisMenu/metisMenu.min.js') ; ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo asset('public/template/dist/js/sb-admin-2.js') ; ?>"></script>

</body>

</html>
