<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 8/2/18
 * Time: 11:27 PM
 */
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Add Project
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
                        <h3 class="box-title">Add Project</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Project
                        </button>

                        <!-- Modal -->

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="add_client" action="<?php echo base_url('/project')?>" method="post">
                                            <input type="hidden" name="client" value="client">
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Project Name</label>
                                                <input type="name" class="form-control" name="name" id="name" placeholder="Enter project name">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Built up area</label>
                                                <input type="text" class="form-control"  name="area" placeholder="Enter built up area">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Plot Number</label>
                                                <input type="text" class="form-control" name="plotNumber" id="plotNumber" placeholder="Enter plot number">
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Project location</label>
                                                <input class="form-control"  id="address" name="location" placeholder="Enter project location">
                                            </div>







                                            <div class="form-group col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                                <label for="exampleInputEmail1">Project Details</label>
                                                <textarea name="projectDetails" style=" width: 100%;" rows="2"></textarea>

                                            </div>


                                            <div class="clearfix"></div>
                                            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <button type="submit" class="btn btn-primary"  ">Submit</button>
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
                                <th>Area</th>
                                <th>Location</th>
                                <th>Plot Number</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Area</th>
                                <th>Location</th>
                                <th>Plot Number</th>
                                <th>Details</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($data as $row){ ?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['area'];?></td>
                                    <td><?= $row['location'];?></td>
                                    <td><?= $row['plotNumber'];?></td>
                                    <td><?= $row['details'];?></td>
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
