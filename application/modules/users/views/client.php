
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                General Add Client Elements
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->

                    <!-- /.box -->
                    <!-- general form elements disabled -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Client</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form"  action="<?php echo base_url('users/register')?>" method="post" >
                                <!--                <input type="hidden" name="client" value="client">-->
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter name">
                                    <input type="hidden" class="form-control" name="role" value="client">

                                </div>
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputPassword1">Address</label>
                                    <textarea class="form-control" rows="1" id="address" name="address" placeholder="Enter address"></textarea>
                                </div>
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
                                    <label for="exampleInputPassword1">user_name</label>
                                    <input type="text" class="form-control" id="user_name" name="username" placeholder="Enter User name">
                                </div>
                                <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


