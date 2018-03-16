<!DOCTYPE html>
<html>


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

    <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">



</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/royal/users/dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Croquis</b>Enginerring</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo asset_url(); ?>dist/img/user2-160x160.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs"><?php echo $this->session->userdata['user_data'][0]['fname']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo asset_url(); ?>dist/img/user2-160x160.jpg" class="img-circle"
                                     alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata['user_data'][0]['fname']; ?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-8 text-center">
                                        <a href="<?php echo base_url('/users/password/');?>">Change Password</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url('users/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('/users/logout'); ?>" class="btn btn-default btn-flat">Sign
                                        out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <script type="text/javascript">
        setTimeout(function () {
            $('#notification1').fadeOut('slow');
        }, 7000);

    </script>

    <script type="text/javascript">
        setTimeout(function () {
            $('#notification').fadeOut('slow');
        }, 7000);
    </script>

    <?php


    $logout = $this->input->get('logout');
    if ($logout){
        ?>
        <div class="notification" id="notification1">

            <h3> You are successfully logged out.</h3>
        </div>


        <?php

    }else if (getInformUser()){
        ?>
        <div class="notification" id="notification" >
            <?php if (islogin()) {
                if ($this->session->userdata['login_first'] == 1) {

                    $this->session->set_userdata('login_first', 0);

                    ?><h3>Welcome User</h3>

                <?php }
            } ?>
            <p>   <?php echo getInformUser(); ?> </p>
        </div>


        <?php
    }
    ?>
    <aside class="main-sidebar">


        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo asset_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata['user_data'][0]['fname']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>User Master</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="<?php echo base_url('users/client'); ?>"><i
                                        class="fa fa-circle-o text-red"></i>Client</a></li>
                        <li><a href="<?php echo base_url('users/contractor'); ?>"><i
                                        class="fa fa-circle-o text-yellow"></i> Contractor</a></li>
                        <li><a href="<?php echo base_url('users/employee'); ?>"><i class="fa fa-circle-o text-aqua"></i>
                                Employee</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-pie-chart"></i>
                        <span>Stage Master</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="<?php echo base_url('project/stage') ?>"><i
                                        class="fa fa-circle-o"></i>Add Stage</a></li>
                        <li><a href="<?php echo base_url('project/activity'); ?>"><i
                                        class="fa fa-circle-o"></i>Add Activity</a></li>
						<li><a href="<?php echo base_url('project/stageActivity'); ?>"><i
                                        class="fa fa-circle-o"></i>Stage Activity Mapping</a></li>
						


                    </ul>
                </li>
				<li class="treeview">
                    <a href="#"><i class="fa fa-book"></i>
                        <span>Project Master</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
				<ul class="treeview-menu">
                <li><a href="<?php echo base_url('project/')?>"><i class="fa fa-circle-o"></i> <span>Create Project</span></a></li>
				<li><a href="<?php echo base_url('project/createStage'); ?>"><i
                                        class="fa fa-circle-o"></i>Add stage in project</a></li>
				<li><a href="<?php echo base_url('project/projectEmployee'); ?>">
                        <i
                                        class="fa fa-circle-o"></i>Add stage to employee</a></li>
                                        <li><a href="<?php echo base_url('project/viewall'); ?>"><i
                                        class="fa fa-circle-o"></i>View All</a></li>
                    <li><a href="<?php echo base_url('project/generalProject'); ?>"><i
                                    class="fa fa-circle-o"></i>General Project Table </a></li>
                    <li><a href="<?php echo base_url('project/report'); ?>"><i
                                    class="fa fa-circle-o"></i>Report </a></li>


                </ul>
				</li>
            </ul>
        </section>
    </aside>
