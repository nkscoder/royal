<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 7/4/18
 * Time: 3:33 PM
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Inspection Report
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

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Inspection Report Print </h3>
                    </div>
                    <!-- /.box-header -->



                                <!-- Project employee relation -->
                                <form role="form" action="<?php echo base_url('project/printInspectionReport/'); ?>" method="post">
<!--                                    <table id="emprelation" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">-->
<!--                                        <thead>-->
<!--                                        <tr>-->
                                    <div class="row">
                                        <div class="col-xs-3 col-md-3">Select Project</div>
                                        <div class="col-xs-3 col-md-3">Select Stage</div>
                                        <div class="col-xs-3 col-md-3">Start Date</div>
                                        <div class="col-xs-3 col-md-3">End Date</div>



                                    </div>



                                    <div class="row">
                                        <div class="col-xs-3 col-md-3">
                                            <select name="project" id="projectnames" required style="width: 100%;">
                                                <option value="">Select Project</option>
                                                <?php foreach ($project as $row){?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <select name="stage" id="stage-option" >
                                                <option value="">Select Stage</option>

                                            </select>
                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <input type="date" name="startdate" placeholder="Start Date">

                                        </div>
                                        <div class="col-xs-3 col-md-3">
                                            <input type="date" name="enddate" placeholder="End Date">

                                        </div>



                                    </div>




                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                </form>
                                <!-- Project employee relation End -->



                    </div>
    </section>
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
                success : function(value){
                    console.log(value)
                    var data = value.split(",");
                    $('#stage-options').html(data[0]);
                    $('#date-option').html(data[1]);
                    $('#date-option').html(data[1]);



                    // alert(stgdata);
                    // $("#stage-options").html(stgdata);
                }
            });
        });
    });


    $(document).ready(function(){
        $("#projectnames").change(function(){
            var projectid = $("#projectnames").val();
            //alert(projectid);
            $.ajax({
                url: "<?php echo base_url('/project/stage_calls');?>",
                type:"POST",
                dataType:"html",
                data:{projectid : projectid},
                success : function(value){
                    console.log(value)
                    var data = value.split(",");
                    $('#stage-option').html(data[0]);
                    $('#date-options').html(data[1]);
                    $('#date-option').html(data[1]);

                    // alert(stgdata);
                    // $("#stage-options").html(stgdata);
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



