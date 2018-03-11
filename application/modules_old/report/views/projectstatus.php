
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
                        <h3 class="box-title">Project Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example_reoprt" class="table display" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Project Name</th>
                                <th>Stage</th>
                                <th>activity</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Project Name</th>
                                <th>Stage</th>
                                <th>activity</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                            </tfoot>
                            <tbody>

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






