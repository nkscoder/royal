
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Croquis Enginerring | Dashboard</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.7 -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>css/custom.css">

            <link rel="stylesheet" href="<?php echo asset_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>bower_components/font-awesome/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>bower_components/Ionicons/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>dist/css/skins/_all-skins.min.css">
            <!-- Morris chart -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>bower_components/morris.js/morris.css">
            <!-- jvectormap -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>bower_components/jvectormap/jquery-jvectormap.css">
            <!-- Date Picker -->
            <link rel="stylesheet"
                  href="<?php echo asset_url(); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <!-- Daterange picker -->
            <link rel="stylesheet"
                  href="<?php echo asset_url(); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
            <!-- bootstrap wysihtml5 - text editor -->
            <link rel="stylesheet" href="<?php echo asset_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

            <link rel="stylesheet" href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- Google Font -->
            <link rel="stylesheet"
                  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>

    <body>
    <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">

        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="https://adminlte.io/themes/AdminLTE/index2.html" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="<?php echo base_url().'users/login'?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text"  name="email" id="user_name" class="form-control" placeholder="User name" required >
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" name="remenber" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    </body>
    </html>
