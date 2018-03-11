
<section id="main-content">
    <section class="wrapper">





        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Add Coupon </h4>
                    <form class="form-horizontal style-form" method="post" action="<?php echo base_url().'admin/addCoupon'; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Coupon Code</label>
                            <div class="col-sm-10">
                                <input type="text"   class="form-control" name="coupon"  placeholder="Coupon Code" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Amount </label>
                            <div class="col-sm-10">
                                <input type="text" name="amount" class="form-control"  placeholder="Amount" id="pass" required>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-default" value="Submit" />
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div>     <!-- /row -->

    </section>
</section>
