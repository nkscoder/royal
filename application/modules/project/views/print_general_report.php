<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 7/4/18
 * Time: 3:27 PM
 */
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Report
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
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"> General Report Print </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <!-- Project employee relation -->
                                <form role="form" action="<?php echo base_url('project/printGeneralReport/'); ?>" method="post">


                                        <div class="row">
                                        <div class="col-xs-3 col-md-3">Select Project</div>
                                        <div class="col-xs-3 col-md-3">Select Employee</div>
                                        <div class="col-xs-3 col-md-3">Start Date</div>
                                        <div class="col-xs-3 col-md-3">End Date</div>
                                        </div>

                                    <div class="row">
                                        <div class="col-xs-3 col-md-3">
                                            <select name="project" id="project" style="width: 100%;">
                                                <option value="">Select Project</option>
                                                <?php foreach ($project as $row){?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <select name="employee" id="employee_id" >
                                                <option value="">Select Employee</option>

                                            </select>
                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <input type="date" name="startdate">
                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <input type="date" name="enddate">
                                        </div>
                                    </div>


                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                </form>
                                <!-- Project employee relation End -->

                            </div>

                        </div>





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
        $("#project").change(function(){
            var projectid = $("#project").val();
            //alert(projectid);
            $.ajax({
                url: "<?php echo base_url('/project/get_employee');?>",
                type:"POST",
                dataType:"html",
                data:{projectid : projectid},
                success : function(stgdata){
                    //alert(stgdata);
                    $("#employee_id").html(stgdata);
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


