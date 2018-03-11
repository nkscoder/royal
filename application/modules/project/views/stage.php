<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 8/2/18
 * Time: 11:09 PM
 */

?>


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
                        <h3 class="box-title">Add Project Stage</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Stage
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Stage</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="<?php echo base_url('project/stage'); ?>" method="post">
                                            <input type="hidden" value="stage" name="role">
                                            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                <label for="stage">Stage</label>
                                                <input type="text" class="form-control" name="stage" id="stage"
                                                       placeholder="Enter stage">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                <button type="submit" class="btn btn-primary">Submit
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                        <table id="example_stage" class="table display" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Stage Name</th>
                                <th>Status</th>
								<th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Activity Name</th>
                                <th>Status</th>
								<th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($stage as $row){
                                $status = '';
                                if($row['is_blocked'] == '0'){
                                    $status = 'Active';
                                }else{
                                    $status = 'In-active';
                                }

                                ?>
                                <tr>
                                    <td><?= $i;?></td>
									<?php if($_GET['edit'] == $row['id']){ ?>
                                    <td>
									<form action="<?php echo base_url('project/updateStage/'); ?>" name="updatestage" method="post">
										<input type="hidden" name="stgid" value="<?= $row['id'];?>">
										<input type="text" name="stgname" value="<?= $row['name'];?>">
										<input type="submit" name="submit" value="Update">
									</form>
									</td>
									<?php }else{ ?>
                                    <td><?= $row['name'];?></td>
									<?php } ?>
                                    <td><?= $status;?></td>
									<td>
									<?php if($_GET['edit'] != $row['id']){ ?>
									<a href="<?php echo base_url('project/Stage/?edit=').$row['id']; ?>" class="btn btn-info">Edit</a>
									<?php } ?>
									<a href="<?php echo base_url('project/deleteStage/').$row['id']; ?>" onclick="return confirm('Are you sure, you want to delete this stage?');" class="btn btn-info">Delete</a></td>
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
        <!-- /.row
      </section>
      <!-- /.content -->
</div>

