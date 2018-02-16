<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 16/2/18
 * Time: 10:31 PM
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
                        <h3 class="box-title">Project Stage</h3>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add stage in a project</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="<?php echo base_url('project/createStage'); ?>" method="post">
                                            <input type="hidden" value="stage" name="role">
                                            <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
                                                <label for="stage">Stage</label>
<!--                                                --><?php //print_r($stage); ?>
<!--                                                --><?php //print_r($stage); ?>
                                                <select name="project" id="project" required>
                                                    <option value="">Select Project</option>
                                                   <?php foreach ($data as $row){?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                    <?php }?>
                                                </select>

                                            </div>

                                            <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
                                                <label for="stage">Stage</label>

                                                <select name="stage[]" id="stage" multiple required>
                                                    <option value="">Select stage</option>
                                                    <?php foreach ($stage as $row){?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['stage_name'];?></option>
                                                    <?php }?>
                                                </select>

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
<!--                        <table id="example" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th>S.No</th>-->
<!--                                <th>Stage Name</th>-->
<!--                                <th>Status</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tfoot>-->
<!--                            <tr>-->
<!--                                <th>S.No</th>-->
<!--                                <th>Activity Name</th>-->
<!--                                <th>Status</th>-->
<!---->
<!--                            </tr>-->
<!--                            </tfoot>-->
<!--                            <tbody>-->
<!--                            --><?php
//                            $i=1;
//                            foreach ($stage as $row){
//                                $status = '';
//                                if($row['is_blocked'] == '0'){
//                                    $status = 'Active';
//                                }else{
//                                    $status = 'In-active';
//                                }
//
//                                ?>
<!--                                <tr>-->
<!--                                    <td>--><?//= $i;?><!--</td>-->
<!--                                    <td>--><?//= $row['stage_name'];?><!--</td>-->
<!--                                    <td>--><?//= $status;?><!--</td>-->
<!--                                </tr>-->
<!--                                --><?php //$i++; } ?>
<!--                            </tbody>-->
<!--                        </table>-->


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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    function select_project (value) {
           // alert(value);


                                var dd ={"project":value};

                                $('#stage').empty();
                        $.ajax({
                                'url': "<?php echo base_url('/project/getstage');?>",
                                'type':"POST",
                                'dataType':"json",
                                data:dd,
                                success : function(json){
                                // alert(json);
                                    //     console.log(json);
                                            $('#stage').append($('<option>').text("Select User").attr('value',""));
                                   $.each(json, function(i, value) {
                                            $('#stage').append($('<option>').text(value.fname).attr('value', value.id));
                                        });




                                           },
                            error:function(res){
                                  console.log("some error");
                               }
                       });
            }
</script>