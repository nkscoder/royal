<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 7/2/18
 * Time: 11:16 PM
 */
?>
!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
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
                        <h3 class="box-title">General Elements</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Employee
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="<?php echo base_url('users/register/');?>" method="post">
                                            <input type="hidden" name="role" value="employee">
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="name" class="form-control" name="name" id="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputEmail1">Mobile</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Address</label>
                                                <textarea class="form-control" rows="1" id="address" name="address" placeholder="Enter address"></textarea>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">User name</label>
                                                <input type="text" class="form-control" id="user_name" name="username" placeholder="Enter User name">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Qualification</label>
                                                <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Enter qualification">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Designation</label>
                                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Qualification</label>
                                                <input class="form-control" id="dob" name="dob" placeholder="Date of Birth" type="date">
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Gender</label><br>

                                                <label class="radio-inline"><input type="radio" name="gender">Male</label>
                                                <label class="radio-inline"><input type="radio" name="gender">Female</label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Status</label>
                                                <select class="form-control" name="working_area">
                                                    <option value="1">Active</option>
                                                    <option value="0">In-active</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Nationality</label>
                                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter nationality">
                                            </div>


                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <label for="exampleInputPassword1">Working Area</label>
                                                <select class="form-control" name="working_area">
                                                    <option>option 1</option>
                                                    <option>option 2</option>
                                                    <option>option 3</option>
                                                    <option>option 4</option>
                                                    <option>option 5</option>
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>User Name</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>User Name</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($employee as $row){ ?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $row['fname'];?></td>
                                    <td><?= $row['mobile'];?></td>
                                    <td><?= $row['address'];?></td>
                                    <td><?= $row['email'];?></td>
                                    <td><?= $row['sname'];?></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>




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
