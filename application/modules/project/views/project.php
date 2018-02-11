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
        Project form details
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
              <h3 class="box-title">Project Form Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" id="add_client">
                <input type="hidden" name="client" value="client">
        <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <label for="exampleInputEmail1">Project Name</label>
            <input type="name" class="form-control" name="name" id="name" placeholder="Enter project name">
        </div>
        <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <label for="exampleInputEmail1">Built up area</label>
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter built up area">
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Project location</label>
            <input class="form-control"  id="address" name="address" placeholder="Enter project location">
        </div>
        <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Project stage</label>
            <select class="form-control" id="example-multiple-optgroups" multiple onclick="select_stage(this.value);">
                    <option value="2-1">Option 2.1</option>
                    <option value="2-2">Option 2.2</option>
                    <option value="2-3">Option 2.3</option>
            </select>
        </div>
                  <div class="clearfix"></div>
        <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Project activity</label>
            <select class="form-control">
                <option>Choose Project activity</option>
                <option value="1">USA</option>
                <option value="2">Germany</option>
                <option value="3">France</option>
                <option value="4">Poland</option>
                <option value="5">Japan</option>
            </select>
        </div>
        <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Assign Project</label>
            <select class="form-control">
                <option>Select Id</option>
                <option value="1">USA</option>
                <option value="2">Germany</option>
                <option value="3">France</option>
                <option value="4">Poland</option>
                <option value="5">Japan</option>
            </select>

        </div>

        <div class="clearfix"></div>
        <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <button type="button" class="btn btn-primary" onclick="add_client(); ">Submit</button>
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

<script>
    function select_stage (value) {
     alert(value);

    }
</script>