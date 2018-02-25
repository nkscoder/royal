
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
                            <h3 class="box-title">Add Client</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Button trigger modal -->
                            <button type="button" id="reset_form" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               Add Client
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  id="client_form" action="<?php echo base_url('users/register');?>" method="post" >
                                                <input type="hidden" name="role" value="client">
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="name" class="form-control" name="name" id="name" placeholder="Enter name">
                                                    <input type="hidden" class="form-control" name="role" value="client">


                                                </div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputEmail1">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">Address</label>
                                                    <textarea class="form-control" rows="1" id="address" name="address" placeholder="Enter address"></textarea>
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">user name</label>
                                                    <input type="text" class="form-control" id="user_name" name="username" placeholder="Enter User name">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                                </div>

                                                <div class="clearfix"></div>
                                                <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                    <button type="submit" name="submit"  value="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>


                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Edit popup modal-->
                            <div class="modal fade" id="exampleModalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"  id="client_form" action="<?php echo base_url('users/update');?>" method="post" >
                                                <input type="hidden" name="role" value="client">
                                                <input type="hidden" name="edit" id="disp" value="">
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="name" class="form-control" name="name" id="name_c" placeholder="Enter name">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputEmail1">Mobile</label>
                                                    <input type="text" class="form-control" id="mobile_c" name="mobile" placeholder="Enter mobile">
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">Address</label>
                                                    <textarea class="form-control" rows="1" id="address_c" name="address" placeholder="Enter address"></textarea>
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="email_e" name="email" placeholder="Enter Email">
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <label for="exampleInputPassword1">user name</label>
                                                    <input type="text" class="form-control" id="user_name_c" name="username" placeholder="Enter User name">
                                                </div>


                                                <div class="clearfix"></div>
                                                <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                                    <button type="submit" name="submit"  value="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End Edit popup modal-->

                            <table id="example" class="table table-striped table-bordered nowrap" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $i=1;
                                foreach ($client as $row){ ?>

                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $row['fname'];?></td>
                                    <td><?= $row['mobile'];?></td>
                                    <td><?= $row['address'];?></td>
                                    <td><?= $row['email'];?></td>
                                    <td><?= $row['sname'];?></td>
                                    <td>
                                        <?php
                                        $checked ='';
                                        $active = '';
                                        if($row['status'] == 0){
                                           $checked ='checked';
                                            $active = 'active focus';
                                        }

//
                                        ?>
                                        <div class="btn-group" id="status" data-toggle="buttons">
                                            <label class="btn btn-default btn-on <?php echo $active; ?>">
                                                <input type="radio" id="1_<?= $row['id']; ?>" value="0" name="status" <?php echo $checked; ?> onchange="status(this.id)">ON</label>
                                            <label class="btn btn-default btn-off <?php echo $active; ?>">
                                                <input type="radio" id="0_<?= $row['id']; ?>" value="1" name="status" <?php  echo $checked; ?> onchange="status(this.id)">OFF</label>
                                        </div>
                                    </td>
                                    <td><a type="button" id="<?php echo $row['id']; ?>" onclick="display_value(this.id);" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalc">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            <span><strong>Edit</strong></span>
                                        </a>
                                    </td>
                                </tr>
                                    <span id="dispay_value_<?php echo $row['id']; ?>" style="display: none">
                                        <?php echo json_encode($row);?>
                                    </span>
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

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        function status(id) {
            var dd ={"id":id};
            $.ajax({
                'url' : "<?php echo base_url().'users/status'; ?>",
                'type' : 'POST',  //the way you want to send data to your URL
                //dataType: "json",
                'data':dd,
                'success' : function(data){
                 if(data =='0'){
                     alert('data update successfully');
                 }else{
                     alert('something wrong');
                 }
                },
                'error': function(data){

                }
            });

        }
        function display_value(id) {
            $('#disp').val(id);
            var dd = $('#dispay_value_'+id).html();
            var t = JSON.parse(dd);
            $('#name_c').val(t['fname']);
            $('#mobile_c').val(t['mobile']);
            $('#address_c').val(t['address']);
            $('#email_e').val(t['email']);
            $('#user_name_c').val(t['sname']);
        }

    </script>






