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
						
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Map Stage and Activity
                        </button>
						
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Map Stage and Activity</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form role="form" action="<?php echo base_url('project/stageActivity'); ?>" method="post">
                                            <input type="hidden" value="stage" name="role">
                                            <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
                                                <label for="stage">Stage</label>
<!--                                                --><?php //print_r($stage); ?>
<!--                                                --><?php //print_r($stage); ?>
                                                <select name="stage" id="stage" class="selectpicker"  data-live-search="true"  required>
                                                    <option value="">Select Stage</option>
                                                   <?php foreach ($stageList as $row){?>
                                                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                                    <?php }?>
                                                </select>

                                            </div>

                                            <div class="form-group col-xs-12 col-sm-8 col-md-12 col-lg-8">
                                                <label for="stage">Activity</label>

                                                <select name="activity[]" id="activity" multiple required>
                                                    <option value="">Select Activity</option>
                                                    <?php foreach ($activity as $row){?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
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
						
					</div>
                       <table id="example" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Stage Name</th>
                                <th>Activities</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Stage Name</th>
                                <th>Activities</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
							$obj =& get_instance();
							$obj->load->model('Mdl_project');
                            $i=1;
                            /* foreach ($stage as $row){
                                $status = '';
                                if($row['is_blocked'] == '0'){
                                    $status = 'Active';
                                }else{
                                    $status = 'In-active';
                                } */
								foreach ($StageActivity as $row){
									//print_r($row);
									$pro_name = $obj->Mdl_project->getStageNames($row['project_stage_map_id']);
									if($pro_name[0]['name']){
                                ?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?php 
									//echo $row['project_stage_map_id'];
									echo $pro_name[0]['name'];
									
									?></td>
									<?php if($_GET['edit'] == $row['project_stage_map_id']){
										$pro_act = $obj->Mdl_project->getStageActivityList($row['project_stage_map_id']);
										?>
									<td>
										<form role="form" action="<?php echo base_url('project/stageActivity'); ?>" method="post">
											<input type="hidden" name="stage" value="<?= $row['project_stage_map_id']; ?>">
											<?php foreach ($activity as $rows){
												$check_act = $obj->Mdl_project->checkAct($row['project_stage_map_id'],$rows['id']);
												?>
											<input type="checkbox" name="activity[]" value="<?php echo $rows['id'];?>" <?php if($check_act){ echo 'checked'; }?>><?php echo $rows['name'];
											?>
											<br>
											<?php } ?>
											<input type="submit" name="submit" class="btn btn-primary" value="Update">
										</form>
									</td>
									<?php }else{ ?>
                                    <td><?php $pro_act = $obj->Mdl_project->getStageActivityList($row['project_stage_map_id']);
										/* echo '<pre>';
										print_r($pro_stage);
										echo '</pre>';  */
										$j=0;
										foreach($pro_act as $pro_nm){
											echo $pro_nm['name'].','; 
											$j++;
										}
									?></td>
									<?php } ?>
									<td>
										<a href="<?php echo base_url('project/deleteStageActivity/').$row['project_stage_map_id']; ?>" onclick="return confirm('Are you sure, you want to delete?');" class="btn btn-info">Delete</a>&nbsp;
										<?php if($_GET['edit'] == $row['project_stage_map_id']){?>
										
										
										<?php }else{ ?>
										<a href="<?php echo base_url('project/stageActivity/?edit=').$row['project_stage_map_id']; ?>" class="btn btn-info">Edit</a>
									<?php } ?>
									</td>
                                </tr>
                                <?php $i++; } } ?>
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