<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * Date: 22/1/18
 * Time: 3:18 PM
 */
?>



<link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>admin/assets/css/jquery.dataTables.min.css"/>

<script type="text/javascript" src="<?php echo asset_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('.display').DataTable();
    } );
</script>
<section id="main-content">
    <section class="wrapper">


        <div style="overflow: auto; padding: 10px 15px 10px 15px; border:2px solid #bbbbbb; border-radius: 5px; margin: 20px;">

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Amount</th>
                    </tr>
                </thead>
                <!--  <tfoot>
                     <tr>
                         <th>Service</th>
                         <th>Grade</th>
                         <th>Length</th>
                         <th>Delivery Date</th>
                         <th>Date</th>
                         <th>Total Price</th>
                     </tr>
                 </tfoot> -->
                <tbody><?php foreach ($couponData as  $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['eduworkers_products_coupon_code']; ?></td>
                        <td><?php echo $row['eduworkers_products_coupon_amount']; ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section></section>
