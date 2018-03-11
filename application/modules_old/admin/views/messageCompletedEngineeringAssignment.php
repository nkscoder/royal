<?php
/**
 * Created by PhpStorm.
 * User: nitesh
 * nkscoder@gmail.com
 * Date: 9/10/17
 * Time: 11:09 AM
 */
?>




<html>
<head>

    <title>Edu Workers </title>



    <style>

        .change{
            background-color: #fff;
            width: 60%;
            margin-right: auto;
            margin-left: auto;
            display: block;
        }



        .ReadMsgBody { width: 100%; background-color: #F6F6F6; }
        .ExternalClass { width: 100%; background-color: #F6F6F6; }
        body { width: 100%; background-color: #f6f6f6; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; font-family: Arial, Times, serif }
        table { border-collapse: collapse !important; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }

        @-ms-viewport{ width: device-width; }

        @media only screen and (max-width: 639px){
            .wrapper{ width:100%;  padding: 0 !important; }
        }

        @media only screen and (max-width: 480px){
            .centerClass{ margin:0 auto !important; }
            .imgClass{ width:100% !important; height:auto; }
            .wrapper{ width:320px; padding: 0 !important; }
            .header{ width:320px; padding: 0 !important; background-image: url(http://placehold.it/320x400) !important; }
            .container{ width:300px;  padding: 0 !important; }
            .mobile{ width:300px; display:block; padding: 0 !important; text-align:center !important;}
            .mobile50{ width:300px; padding: 0 !important; text-align:center; }
            *[class="mobileOff"] { width: 0px !important; display: none !important; }
            *[class*="mobileOn"] { display: block !important; max-height:none !important; }
        }


    </style>
    <!--<![endif]-->

    <!-- Start Wrapper  -->
    <div class="change">

        <?php /*print_r($file);*/ ?>

        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
                <td height="10" style="font-size:10px; line-height:10px;">   </td>
            </tr>

            <tr>
                <td align="left">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr>
                            <td width="20%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:left">
                                <h1 >Hi,</h1>
                            </td>


                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>
            <tr>
                <td align="left">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr>
                            <td width="20%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:left">
                                <p>
                                    Thanks you for trusting Eduworkers and giving us the opportunity to serve you.
                                </p>

                                <p>This is to confirm you that we have received the details of your assignment and we will get back to you within 12 hours after thoroughly reviewing your assignment with a fair quote.
                                </p>
                                <p>  We being experts and specialists in engineering assignments understand that it will not be fair to quote engineering assignments only on the basis of word count or some other criteria as there is more than one dimension to engineering tasks and it will not be fair on our part to give you a quote on the basis of some algorithm without assessing the exact requirements of your assignment.  Hence, we ask you for 12 hours, but in most of the cases we revert in 3-6 hours time.

                                <p> We would again like to thank you for giving us the opportunity to assess your work and will try our best to come back to you ASAP with a fair quote to place your order.

                                </p>
                            </td>


                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>
            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr>
                            <td width="20%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h1 style=" color: tomato">Eduworkers</h1>
                            </td>


                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>

            <tr>
                <td height="10" style="font-size:10px; line-height:10px;">   </td>
            </tr>
            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr>
                            <td width="20%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h2>YOUR ORDER IS  SUCCESSFULLY COMPLETED</h2>
                            </td>


                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>



            <tr>
                <td height="10" style="font-size:10px; line-height:10px;">   </td>
            </tr>
            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr>
                            <td width="20%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h1>ORDER DETAILS</h1>
                            </td>


                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>


            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr style="border-top: 1px solid #aaa;">
                            <td width="40%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h3>Order Id</h3>
                            </td>

                            <td width="60%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center ">
                                <p style=""><?php echo $result[0]['eduworkers_products_id']; ?></p>
                            </td>
                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>






            <tr>
                <td height="10" style="font-size:10px; line-height:10px;">   </td>
            </tr>
            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr style="border-top: 1px solid #aaa;">
                            <td width="40%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h3>Service:  </h3>
                            </td>

                            <td width="60%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <p><?php echo $result[0]['eduworkers_products_services'];  ?></p>
                            </td>
                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>


            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr style="border-top: 1px solid #aaa;">
                            <td width="40%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h3>Subject:</h3>

                            </td>

                            <td width="60%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center ">
                                <p style=""><?php echo $result[0]['eduworkers_products_subjects']; ?></p>
                            </td>
                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>









            <tr>
                <td height="10" style="font-size:10px; line-height:10px;">   </td>
            </tr>
            <tr>
                <td align="center">

                    <!-- Start Container  -->
                    <table width="90%" cellpadding="0" cellspacing="0" border="0" class="container" style="margin-left:5%; margin-right:5%;">
                        <tr style="border-top: 1px solid #aaa;">
                            <td width="40%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <h3>Order Date & Time:</h3>
                            </td>

                            <td width="60%" class="mobile" style="font-family:arial; font-size:12px; line-height:18px; text-align:center">
                                <p><?php  echo $result[0]['eduworkers_products_data']; ?></p>
                            </td>
                        </tr>
                    </table>
                    <!-- Start Container  -->

                </td>
            </tr>
            <tr>
                <td align="center">
                    <h3>Thank you for using our services.</h3>

                </td>
            </tr>


            <tr>
                <td align="left">
                    <p>Regards:</p>
                    <p>Eduworkers</p>

                </td>
            </tr>






            <!-- End Wrapper  -->

    </div>

    </body>
</html>
