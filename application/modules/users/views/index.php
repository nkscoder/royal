
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
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--        <title>Site Inpection Model </title>-->
<!--        <style type="text/css">-->
<!--            /*-->
<!--       * Specific styles of signin component-->
<!--       */-->
<!--            /*-->
<!--             * General styles-->
<!--             */-->
<!--            body, html {-->
<!--                height: 100%;-->
<!--                background-repeat: no-repeat;-->
<!--                background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));-->
<!--            }-->
<!---->
<!--            .card-container.card {-->
<!--                max-width: 350px;-->
<!--                padding: 40px 40px;-->
<!--            }-->
<!---->
<!--            .btn {-->
<!--                font-weight: 700;-->
<!--                height: 36px;-->
<!--                -moz-user-select: none;-->
<!--                -webkit-user-select: none;-->
<!--                user-select: none;-->
<!--                cursor: default;-->
<!--            }-->
<!---->
<!--            /*-->
<!--             * Card component-->
<!--             */-->
<!--            .card {-->
<!--                background-color: #F7F7F7;-->
<!--                /* just in case there no content*/-->
<!--                padding: 20px 25px 30px;-->
<!--                margin: 0 auto 25px;-->
<!--                margin-top: 50px;-->
<!--                /* shadows and rounded borders */-->
<!--                -moz-border-radius: 2px;-->
<!--                -webkit-border-radius: 2px;-->
<!--                border-radius: 2px;-->
<!--                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);-->
<!--            }-->
<!---->
<!--            .profile-img-card {-->
<!--                width: 96px;-->
<!--                height: 96px;-->
<!--                margin: 0 auto 10px;-->
<!--                display: block;-->
<!--                -moz-border-radius: 50%;-->
<!--                -webkit-border-radius: 50%;-->
<!--                border-radius: 50%;-->
<!--            }-->
<!---->
<!--            /*-->
<!--             * Form styles-->
<!--             */-->
<!--            .profile-name-card {-->
<!--                font-size: 16px;-->
<!--                font-weight: bold;-->
<!--                text-align: center;-->
<!--                margin: 10px 0 0;-->
<!--                min-height: 1em;-->
<!--            }-->
<!---->
<!--            .reauth-email {-->
<!--                display: block;-->
<!--                color: #404040;-->
<!--                line-height: 2;-->
<!--                margin-bottom: 10px;-->
<!--                font-size: 14px;-->
<!--                text-align: center;-->
<!--                overflow: hidden;-->
<!--                text-overflow: ellipsis;-->
<!--                white-space: nowrap;-->
<!--                -moz-box-sizing: border-box;-->
<!--                -webkit-box-sizing: border-box;-->
<!--                box-sizing: border-box;-->
<!--            }-->
<!---->
<!--            .form-signin #inputEmail,-->
<!--            .form-signin #inputPassword {-->
<!--                direction: ltr;-->
<!--                height: 44px;-->
<!--                font-size: 16px;-->
<!--            }-->
<!---->
<!--            .form-signin input[type=email],-->
<!--            .form-signin input[type=password],-->
<!--            .form-signin input[type=text],-->
<!--            .form-signin button {-->
<!--                width: 100%;-->
<!--                display: block;-->
<!--                margin-bottom: 10px;-->
<!--                z-index: 1;-->
<!--                position: relative;-->
<!--                -moz-box-sizing: border-box;-->
<!--                -webkit-box-sizing: border-box;-->
<!--                box-sizing: border-box;-->
<!--            }-->
<!---->
<!--            .form-signin .form-control:focus {-->
<!--                border-color: rgb(104, 145, 162);-->
<!--                outline: 0;-->
<!--                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);-->
<!--                box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);-->
<!--            }-->
<!---->
<!--            .btn.btn-signin {-->
<!--                /*background-color: #4d90fe; */-->
<!--                background-color: rgb(104, 145, 162);-->
<!--                /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/-->
<!--                padding: 0px;-->
<!--                font-weight: 700;-->
<!--                font-size: 14px;-->
<!--                height: 36px;-->
<!--                -moz-border-radius: 3px;-->
<!--                -webkit-border-radius: 3px;-->
<!--                border-radius: 3px;-->
<!--                border: none;-->
<!--                -o-transition: all 0.218s;-->
<!--                -moz-transition: all 0.218s;-->
<!--                -webkit-transition: all 0.218s;-->
<!--                transition: all 0.218s;-->
<!--            }-->
<!---->
<!--            .btn.btn-signin:hover,-->
<!--            .btn.btn-signin:active,-->
<!--            .btn.btn-signin:focus {-->
<!--                background-color: rgb(12, 97, 33);-->
<!--            }-->
<!---->
<!--            .forgot-password {-->
<!--                color: rgb(104, 145, 162);-->
<!--            }-->
<!---->
<!--            .forgot-password:hover,-->
<!--            .forgot-password:active,-->
<!--            .forgot-password:focus{-->
<!--                color: rgb(12, 97, 33);-->
<!--            }-->
<!--        </style>-->
<!--    -->
<!--    -->
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
             <img src="<?php echo asset_url(); ?>dist/img/logo.jpg" class="" alt="User Image">

        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>


            <form method="post" action="<?php echo base_url().'users/login'?>">
                <div class="form-group has-feedback">
                    <input type="text"  name="email" id="user_name" class="form-control" placeholder="User name" required >
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label style="padding-left: 10%;">
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button class="btn btn-primary btn-block btn-flat" type="submit"">Sign in</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

<!--            <a href="#">I forgot my password</a><br>-->
<!--            <a href="register.html" class="text-center">Register a new membership</a>-->

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

    </html>
