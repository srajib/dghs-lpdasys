<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    require_once 'include/db_connection.php';
    if (empty($_SESSION['loginid'])) {
        print "<script>";
        print " self.location='index.php'"; // Comment this line if you don't want to redirect
        print "</script>";
    }

    $org_code = $_SESSION['org_code'];

    $org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_thana_code,organization.upazila_thana_name,organization.district_code,organization.district_name
FROM organization where organization.org_code='" . $org_code . "'");

    $rows = mysql_fetch_assoc($org);
    $upazila_code = $rows['upazila_thana_code'];
    $upazila_name = $rows['upazila_thana_name'];
    $district_name = $rows['district_name'];
    $district_code = $rows['district_code'];
    $org_name = $rows['org_name'];
    ?>

    <head>
        <meta charset="utf-8">
        <title>Laptop/PDA Distribution System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A complete admin panel theme">
        <meta name="author" content="theemio">
        <link href="css/utopia-white2.css" rel="stylesheet">
        <link href="css/utopia-responsive.css" rel="stylesheet">
        <link href="css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="css/weather.css" rel="stylesheet" type="text/css"/>
        <link href="css/gallery/modal.css" rel="stylesheet">
        <link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
        <link href="css/chosen.css" media="screen" rel="stylesheet" type="text/css"/>
        <link href="css/ie.css" rel="stylesheet"/>
        <style>
            body {
                font-size: 13px;
                background-color:white;
            }
            .btn_print{
                position: fixed;
                float: right;
                right: 0;
                padding: 5px 10px 5px 10px;
                color: #fff;
                background: #09F;
                font-size: 16px;
                font-weight: bold;
            }
            .rclear {
                clear: right;	
            }
            @media print {
                .btn_print{
                    display: none;
                }	
            }
        </style>
        <?php
        $print = "<div><input type=\"button\" onclick=\"javascript:window.print()\" value=\"Print\" class=\"btn_print\" style=\"margin-right:300px;\" /></div><div class=\"rclear\"></div>";
        echo $print;
        ?>
    </head>

    <body>


        <div id="header">



        </div> <!-- /#header -->


        <div id="nav">

            <div class="container">

                <a href="javascript:;" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-reorder"></i>
                </a>

                <div class="nav-collapse">



                </div> <!-- /.nav-collapse -->

            </div> <!-- /.container -->

        </div> <!-- /#nav -->


        <div id="content">

            <div class="container">


<?php ?>
                <div id="output"></div>

                <div class="row">

                    <div class="span6">


                        <div class="fullpage" >
                            <div id="headlogo">
                                <br> &nbsp; <br>
                                <table align="center">
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <span style="float:left;"><img src="./publish_files/gov.jpg" height="50px" alt="BD GOV"></span><span class="subheading" style="font-size: 17px">Laptop distribution list under <?php echo $org_name; ?> ( CC )<?php //echo $pdfdata->lhb_year;   ?></span><br>

                                                <span class="subheading"><?php //echo $org_name;   ?></span>
                                                </p>
                                                <p><span class="subheading" style="font-size: 16px"><b>Upazila:</b> <?php echo $upazila_name; ?></span> , <span class="subheading" style="font-size: 16px;margin-left:5px;"><b>District:</b> <?php echo $district_name; ?></span></p>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />


                            </div><!--end of id headlogo -->

                        </div><!--end of class fullpage -->

                        <?php
//$ccid=$_GET
                        ?>
                        <div class="fullpage" style="height:auto;">
                            <div style="width:100%; text-align:right;"></div>
                            <table class="table table-bordered" style="background-image:url('img/govt_logo.png');background-repeat:no-repeat;background-position:center;">
                                <tbody>

                                    <tr>
                                        <th>Sl</th>
                                        <th nowrap="nowrap">CC Name</th>
                                        <th nowrap="nowrap">Union Name</th>
                                        <th nowrap="nowrap">Ward No.</th>
                                        <th nowrap="nowrap">CHCP Name</th>
                                        <th nowrap="nowrap">CHCP Mobile No.</th>
                                        <th nowrap="nowrap">Source of Electricity</th>
                                        <th nowrap="nowrap" align="center" style="text-align:center;width:140px;"> SIM Number </th>
                                    </tr>

                                    <?php
                                    $lapinfo = mysql_query("SELECT * FROM organization where org_type_code='1039' AND upazila_thana_code='$upazila_code' AND district_code='$district_code'");
                                    $i = 1;
                                    while ($lapinfos = mysql_fetch_array($lapinfo)) {
                                        ?>
                                        <tr>
                                            <?php
                                            $cc_org_code = $lapinfos['org_code'];
                                            $cc_electrictiy_source = $lapinfos['source_of_electricity_main_code'];
                                            $union_name = $lapinfos['union_name'];
                                            $ward_code = $lapinfos['ward_code'];

                                            if ($cc_electrictiy_source) {
                                                $elect_source = mysql_query("SELECT org_source_of_electricity_main.electricity_source_code,org_source_of_electricity_main.electricity_source_name
                                                            FROM org_source_of_electricity_main where org_source_of_electricity_main.electricity_source_code='" . $cc_electrictiy_source . "'");
                                                $source_of_electricityrows = mysql_fetch_assoc($elect_source);
                                                $electricity_source = $source_of_electricityrows['electricity_source_name'];
                                            } else {
                                                $electricity_source = 'N/A';
                                            }

                                            if ($cc_org_code) {
                                                $cc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
														where old_tbl_staff_organization.org_code='$cc_org_code'");

                                                $cc_staff_rows = mysql_fetch_assoc($cc_staff);
                                                $staff_name = $cc_staff_rows['staff_name'];
                                                $contact_no = $cc_staff_rows['contact_no'];
                                            }

                                            if ($staff_name) {
                                                ?>
                                                <td><?php echo $i++ . '.'; ?></td>
                                                <td nowrap="nowrap"><a href="addlaptopinfo.php?org_code=<?php echo $lapinfos['org_code']; ?>"><?php echo $lapinfos['org_name']; ?></a></td>
                                                <td> <?php
                                                    if ($union_name) {
                                                        echo $union_name;
                                                    } else
                                                        echo 'N/A';
                                                    ?></td>
                                                <td> <?php
                                                    if ($ward_code) {
                                                        echo $ward_code;
                                                    } else
                                                        echo 'N/A';
                                                    ?></td>
                                                <td><?php
                                                    if ($staff_name) {
                                                        echo $staff_name;
                                                    } else
                                                        echo 'N/A';
                                                    ?></td>
                                                <td><?php
                                            if ($contact_no) {
                                                echo $contact_no;
                                            } else
                                                echo 'N/A';
                                            ?></td>
                                                <td> <?php
                                            if ($electricity_source) {
                                                echo $electricity_source;
                                            } else {
                                                echo 'N/A';
                                            }
                                            ?></td>
                                                <td>&nbsp;</td>
    <?php } ?>
                                        </tr>
<?php } ?>
                                </tbody>
                                <div style="clear:both;height:20px;">
                                </div>

                                <div >
                                    <table style="float:right;margin-left:600px;margin-top:40px;">
                                        <tr>
                                            <th>&nbsp;</th>     
                                            <th align="right">&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>     
                                            <th align="right">&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>     
                                            <th align="right">___________________</th>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>     
                                            <th align="middle">Signature & Seal of UHFPO</th>
                                        </tr>

                                        <tr>
                                            <th>&nbsp;</th>     

                                        </tr>



                                    </table>
                                </div>



                                <div style="float:right;">
                                    <table align="right">
                                        <tr>
                                            <th></th>     
                                            <th align="middle"></th>
                                        </tr>

                                        <tr>



                                        <tr>
                                            <th>&nbsp;</th>     
                                            <th align="right"></th>
                                        </tr>
                                        <tr>
                                            <th></th>     
                                            <th align="middle">

                                            </th>
                                        </tr>


                                        </tr>
                                    </table>



                                </div>
                                <!-- /.widget-content -->


                        </div> <!-- /.widget -->

                    </div> <!-- /.span6 -->

                    </form>

                    <div class="span6">





                    </div> <!-- /.span6 -->

                </div> <!-- /.row -->



            </div> <!-- /.container -->

        </div> <!-- /#content -->








    </body>
</html>
