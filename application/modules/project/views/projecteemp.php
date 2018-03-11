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
                        <h3 class="box-title">Stage Activity</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<!-- Project employee relation -->
						<form role="form" action="<?php echo base_url('project/projectEmployee'); ?>" method="post">
						<table id="emprelation" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
						<thead>
                            <tr>
                                <th>Select Project</th>
                                <th>Select Stage</th>
                                <th>Select Employee</th>
                            </tr>
                            </thead>
							<tbody>
								<tr>
									<td>
										<div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
                                                
                                                <select name="projectname" id="projectname" required>
                                                    <option value="">Select Project</option>
                                                   <?php foreach ($projactname as $row){?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                    <?php }?>
                                                </select>

                                            </div>
									</td>
									<td>
										<div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8" id="stage-options">
										</div>
									</td>
									<td>
									<div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
										<select name="employee" id="employee" required>
											<option value="">Select Employee</option>
										   <?php foreach ($getEmployee as $emp){?>
											<option value="<?php echo $emp['id'];?>"><?php echo $emp['username'];?></option>
											<?php }?>
										</select>

									</div>
									</td>
								</tr>
							</tbody>
						</table>
						<input type="submit" name="submit" class="btn btn-primary" value="Submit">
						</form>
						<!-- Project employee relation End -->
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
                                <th>Employee</th>
                                <th>Stage Name</th>
                                 <th>project name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Employee</th>
                                <th>Stage Name</th>
                                 <th>Project Name</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
							$obj =& get_instance();
							$obj->load->model('Mdl_project');
                            $i=1;
                            
								foreach ($datapro as $row){
									//print_r($row);
									//$pro_name = $obj->Mdl_project->getStageNames($row['project_stage_map_id']);
									//if($row[0]['project_name']){
										
                                ?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?php  
									echo $row['fname'].' '.$row['sname'];
									?></td>
									<?php if($_GET['edit'] == $row['emp_id']){
										$pro_stg = $obj->Mdl_project->getProjectStage($row['project_id']);
										?>
									<td>
										<form role="form" action="<?php echo base_url('project/projectEmployeeUpdate'); ?>" method="post">
											<input type="hidden" name="employee" value="<?= $row['emp_id']; ?>">
											<input type="hidden" name="projectname" value="<?= $row['project_id']; ?>">
											<?php foreach ($pro_stg as $rows){
												$check_stg = $obj->Mdl_project->checkStg($row['emp_id'],$rows['stage_id']);
												?>
											<input type="checkbox" name="stage[]" value="<?php echo $rows['stage_id'];?>" <?php if($check_stg){ echo 'checked'; }?>><?php echo $rows['name'];
											?>
											<br>
											<?php } ?>
											<input type="submit" name="submit" class="btn btn-primary" value="Update">
										</form>
									</td>
									<?php }else{ ?>
                                    <td><?php $pro_stg = $obj->Mdl_project->getStageListEmp($row['emp_id']);
										/* echo '<pre>';
										print_r($row['pro_id']);
										echo '</pre>';  */
										$j=0;
										foreach($pro_stg as $pro_nm){
											echo $pro_nm['name'].','; 
											$j++;
										}
									?></td>
									<?php } ?>
									<td><?php $pro_act = $obj->Mdl_project->getProjactEmpMap($row['emp_id']);
										  
										$j=0;
										foreach($pro_act as $pro_nm){
											echo $pro_nm['name'].','; 
											$j++;
										}
									?></td>
									<td>
										<a href="<?php echo base_url('project/projectEmployeeDelete/').$row['emp_id']; ?>" onclick="return confirm('Are you sure, you want to delete?');" class="btn btn-info">Delete</a>&nbsp;
										<?php if($_GET['edit'] == $row['emp_id']){?>
										
										
										<?php }else{ ?>
										<a href="<?php echo base_url('project/projectEmployee/?edit=').$row['emp_id']; ?>" class="btn btn-info">Edit</a>
									<?php } ?>
									</td>
                                </tr>
                                <?php $i++; } //} ?>
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
			url: "<?php echo base_url('/project/stage_call');?>",
			type:"POST",
			dataType:"html",
			data:{projectid : projectid},
			success : function(stgdata){
				//alert(stgdata);
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