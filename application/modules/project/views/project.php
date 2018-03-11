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
                                                <input type="name" required class="form-control" name="name" id="name" placeholder="Enter project name">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Built up area</label>
                                                <input type="text" required class="form-control"  name="area" placeholder="Enter built up area">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Plot Number</label>
                                                <input type="text" required class="form-control" name="plotNumber" id="plotNumber" placeholder="Enter plot number">
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Project location</label>
                                                <input class="form-control"  required id="address" name="location" placeholder="Enter project location">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                                <label for="exampleInputEmail1">Project Details</label>
                                                <textarea required name="projectDetails" style=" width: 100%;" rows="2"></textarea>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Assign Project</label>
                                                <select class="form-control" name="conntractor" id="conntractor">
                                                    <option>Select Conntractor</option>

                                                    <?php foreach ($user as $row){
                                                        if($row['role']=='contractor'){ ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['fname']; ?> </option>
                                                        <?php }  }?>

                                                </select>

                                            </div>
                                            <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Assign Project</label>
                                                <select class="form-control" name="client" id="client">
                                                    <option>Select Client</option>
                                                    <?php foreach ($user as $row){
                                                        if($row['role']=='client'){ ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['fname']; ?> </option>
                                                        <?php }  }?>
                                                </select>

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
						</div>

                        <table id="example_project" class="table display" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Area</th>
                                <th>Location</th>
                                <th>Plot Number</th>
                                <th>Details</th>
                                <th>Action</th>
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
                                <th>Action</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($data as $row){?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $row['name'];?></td>
                                    <td><?= $row['area'];?></td>
                                    <td><?= $row['location'];?></td>
                                    <td><?= $row['plotNumber'];?></td>
                                    <td><?= $row['details'];?></td>
                                    <td>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']; ?>">
                            Edit
                        </button>
									<a href="<?php echo base_url('project/deleteProject/').$row['id']; ?>" onclick="return confirm('Are you sure, you want to delete Project?');" class="btn btn-info">Delete</a></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
						
						<!-- Popup box for edit projects -->
						<?php foreach ($data as $row){ ?>
                    <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="add_client" action="<?php echo base_url('project/updateProject')?>" method="post">
                                            <input type="hidden" name="client" value="client">
                                            <input type="hidden" name="proid" value="<?php echo $row['id']; ?>">
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Project Name</label>
                                                <input type="name" required class="form-control" name="name" id="name" value="<?= $row['name'];?>">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Built up area</label>
                                                <input type="text" required class="form-control"  name="area" value="<?= $row['area'];?>">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputEmail1">Plot Number</label>
                                                <input type="text" required class="form-control" name="plotNumber" id="plotNumber" value="<?= $row['plotNumber'];?>">
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Project location</label>
                                                <input class="form-control"  required id="address" name="location" value="<?= $row['location']; ?>">
                                            </div>
                                            <div class="form-group col-xs-10 col-sm-10 col-md-8 col-lg-8">
                                                <label for="exampleInputEmail1">Project Details</label>
                                                <textarea required name="projectDetails" style=" width: 100%;" rows="2"><?= $row['details'];?></textarea>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Assign Project</label>
                                                <select class="form-control" name="conntractor" id="conntractor">
                                                    <option>Select Conntractor</option>

                                                    <?php foreach ($user as $row1){
                                                        if($row1['role']=='contractor'){ ?>
                                                            <option value="<?php echo $row1['id']; ?>"  <?php  if($row1['id'] == $row['contractor_id']) {
                                                                echo " selected";
                                                            } ?>><?php echo $row1['fname']; ?> </option>
                                                        <?php }  }?>

                                                </select>

                                            </div>
                                            <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
                                                <label for="exampleInputPassword1">Assign Project</label>
                                                <select class="form-control" name="client" id="client">
                                                    <option>Select Client</option>
                                                    <?php foreach ($user as $row1){
                                                        if($row1['role']=='client'){ ?>
                                                            <option value="<?php echo $row1['id']; ?>"<?php  if($row1['id'] == $row['client_id']) {
                                                                echo " selected";
                                                            } ?>><?php echo $row1['fname']; ?> </option>
                                                        <?php }  }?>
                                                </select>

                                            </div>


                                            <div class="clearfix"></div>

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
						</div> 
						<?php } ?>
						<!-- Popup box end for edit projects -->
						
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
