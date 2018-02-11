<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 11/2/18
 * Time: 9:57 AM
 */
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change Password

        </h1>

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
                        <h3 class="box-title">Change Password</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="<?php echo base_url('users/password');?>" method="post" id="project_activity">
                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                <label for="exampleInputEmail1">Old Password</label>
                                <input type="password" class="form-control" required name="oldPassword" id="project_stage"
                                       placeholder="Old Password">
                            </div>
                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                <label for="exampleInputEmail1">New Password</label>
                                <input type="password" class="form-control"  required name="newPassword" id="project_stage"
                                       placeholder="New Password">
                            </div>
                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control" required name="cPassword" id="project_stage"
                                       placeholder="Confirm Password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                <button type="submit" class="btn btn-primary" ">Submit
                                </button>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row
      </section>
      <!-- /.content -->
</div>


