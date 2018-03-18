<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 16/3/18
 * Time: 9:37 PM
 */
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report
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
                        <h3 class="box-title">Report Date</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-8">



                                <form role="form" action="<?php echo base_url('project/reoprt'); ?>" method="post">
                                    <table id="emprelation" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Select Project</th>
                                            <th>Select Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">

                                                    <select name="project" id="projectnames" required >
                                                        <option value="">Select Project</option>
                                                        <?php foreach ($project as $row){?>
                                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </td>
                                            <!--                                    <td>-->
                                            <!--                                        <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8" id="stage-options">-->
                                            <!--                                        </div>-->
                                            <!--                                    </td>-->
                                            <td>
                                                <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
                                                    <select name="projectdate" id="stage-options" required>
                                                        <option value="">Select Stage</option>

                                                    </select>

                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                </form>




                            </div>

                        </div>
                        <?php
                        /* echo '<pre>';
                        print_r($datapro);
                        echo '</pre>'; */
                        ?>
                        <table id="example_project_emp" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Activity</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Photo</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Activity</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Photo</th>
                                <th>Date</th>


                            </tr>
                            </tfoot>

                            <tbody>
                            <?php
                            //                         print_r($projectdata);
                            $i=1;
                            foreach ($projectdata as $pro){


                                ?>
                                <tr>

                                    <td>
                                        <?php echo $i; $i=$i+1;?>
                                    </td>
                                    <td>
                                        <?php echo $pro['name'];?>
                                    </td>

                                    <td>
                                        <?php if ($pro['approved']==1){?>
                                            Accepted
                                        <?php }else{?>
                                            Rejected
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $pro['remarks'];?>
                                    </td>
                                    <td>
                                        <img src="<?php echo base_url($pro['image_url']);?>" height="100" width="100">
                                    </td>
                                    <td>
                                        <?php echo $pro['datetime'];?>
                                    </td>


                                </tr>
                            <?php }?>
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
<style>
    a.LinkButton {
        border-style: solid;
        border-width : 1px 1px 1px 1px;
        text-decoration : none;
        padding : 4px;
        border-color : #000000
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#projectname").change(function(){
            var projectid = $("#projectname").val();
            //alert(projectid);
            $.ajax({
                url: "<?php echo base_url('/project/stage_calls');?>",
                type:"POST",
                dataType:"html",
                data:{projectid : projectid},
                success : function(stgdata){
                    // alert(stgdata);
                    $("#stage-options").html(stgdata);
                }
            });
        });
    });

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


