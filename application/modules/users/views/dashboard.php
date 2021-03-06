<?php
/**
 * Created by PhpStorm.
 * User: sitesh
 * Date: 7/2/18
 * Time: 8:53 PM
 */
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
<!--        --><?php
//        foreach ($client as $row){
//
//        }

        ?>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo count($client); ?></h3>

                        <p>Total Client</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <?php if($this->session->userdata['user_data'][0]['role']=="admin"){  ?>
                    <a href="<?php echo base_url('users/client'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo count($contractor); ?></h3>

                        <p>Total Contractor</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <?php if($this->session->userdata['user_data'][0]['role']=="admin"){  ?>

                    <a href="<?php echo base_url('users/contractor'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     <?php } ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                         <h3><?php echo count($project); ?></h3>

                        <p>Total Project</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <?php if($this->session->userdata['user_data'][0]['role']=="admin"){  ?>

                    <a href="<?php echo base_url('project/'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                <?php } ?>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo count($employee); ?></h3>

                        <p>Total Emplyee</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <?php if($this->session->userdata['user_data'][0]['role']=="admin"){  ?>

                    <a href="<?php base_url();?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    <?php  }?>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

