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
                        <form role="form" action="<?php echo base_url('project/stage'); ?>" method="post">
                            <input type="hidden" value="stage" name="role">
                            <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
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

