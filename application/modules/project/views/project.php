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
                  <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                      <label for="exampleInputEmail1">Plot Number</label>
                      <input type="text" class="form-control" name="plotNumber" id="plotNumber" placeholder="Enter plot number">
                  </div>

        <div class="clearfix"></div>

        <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Project location</label>
            <input class="form-control"  id="address" name="address" placeholder="Enter project location">
        </div>
        <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Assign Project</label>
            <select class="form-control" onchange="getuser(this.value)">
                <option >Select </option>

                <option value="client">Client</option>
                <option value="contractor">Contractor</option>
                <option value="employee">Employee</option>
            </select>

        </div>

                  <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                      <label for="exampleInputPassword1">Assign User</label>
                      <select class="form-control" id="assignuser">

                      </select>

                  </div>
<!--                  --><?php //print_r($stage); ?>
                  <div class="clearfix"></div>
        <div class="form-group col-xs-10 col-sm-10 col-md-4 col-lg-4">
            <label for="exampleInputPassword1">Project stage</label>
            <select class="form-control" id="example-multiple-optgroups" multiple ">
              <?php foreach( $stage as $data ){?>
                <option value="<?php echo $data['id'];   ?>"><?php echo $data['stage_name'];?></option>
                <?php } ?>
            </select>
        </div>



                  <div class="form-group col-xs-10 col-sm-10 col-md-8 col-lg-8">
                      <label for="exampleInputEmail1">Project Details</label>
                      <textarea name="projectDetails" style=" width: 100%;" rows="8"></textarea>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>


    function getuser (value){
//       alert(123);
//         var statevlau=document.getElementById('state').value;
//       alert(statevlau);

        var dd ={"role":value};
        // alert(dd);
        // console.log(dd);
        $('#assignuser').empty();
        $.ajax({
            'url': "<?php echo base_url('/project/getuser');?>",
            'type':"POST",
            'dataType':"json",
            data:dd,
            success : function(json){
            // alert(json);
            //     console.log(json);
                $('#assignuser').append($('<option>').text("Select User").attr('value',""));
                $.each(json, function(i, value) {
                    $('#assignuser').append($('<option>').text(value.fname).attr('value', value.id));
                });
//


            },
            error:function(res){
                console.log("some error");
            }
        });
    }
</script>