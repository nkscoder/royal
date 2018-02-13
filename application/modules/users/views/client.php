
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               Add Client
                            </button>

                            <!-- Modal -->
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
                                            <form role="form"  action="<?php echo base_url('users/register');?>" method="post" >
                                                <input type="hidden" name="role" value="client">
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter name">
                                                    <input type="hidden" class="form-control" name="role" value="client">

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
                                                    <label for="exampleInputPassword1">user name</label>
                                                    <input type="text" class="form-control" id="user_name" name="username" placeholder="Enter User name">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                                </div>

                                                <div class="clearfix"></div>
                                                <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                    <button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
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
                                foreach ($client as $row){ ?>
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

<<<<<<< HEAD
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                responsive: true
            } );

            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>

=======
>>>>>>> 9a97db293835009f1ca1084d5923ac1f3342350c

