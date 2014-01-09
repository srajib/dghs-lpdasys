<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'include/db_connection.php'; 
include('include/inc.functions.generic.php');
if(empty($_SESSION['loginid']))
{
	print "<script>";
	print " self.location='index.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}


$org_code = $_SESSION['org_code'] ;
$org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_id
FROM organization where organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_id=$rows['upazila_id'];
$org_name=$rows['org_name'];
//print_r($rows );

//print_r($rows_org);

?>
<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:48:05 GMT -->
<head>
    <meta charset="utf-8">
    <title>Laptop/PDA Distribution System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A complete admin panel theme">
    <meta name="author" content="theemio">

    <!-- styles -->

    <link href="css/utopia-white.css" rel="stylesheet">
    <link href="css/utopia-responsive.css" rel="stylesheet">
    <link href="css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="css/weather.css" rel="stylesheet" type="text/css"/>
    <link href="css/gallery/modal.css" rel="stylesheet">
    <link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <link href="css/chosen.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/ie.css" rel="stylesheet"/>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	
	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready( function() {
			// binds form submission and fields to the validation engine
			jQuery("#form3").validationEngine();
		});
	</script>
    <script type="text/javascript">
        if($.cookie("css")) {
            $('link[href*="utopia-white.css"]').attr("href",$.cookie("css"));
            $('link[href*="utopia-dark.css"]').attr("href",$.cookie("css"));
            $('link[href*="utopia-wooden.css"]').attr("href",$.cookie("css"));
        }
        $(document).ready(function() {
            $(".theme-changer a").live('click', function() {
                $('link[href*="utopia-white.css"]').attr("href",$(this).attr('rel'));
                $('link[href*="utopia-dark.css"]').attr("href",$(this).attr('rel'));
                $('link[href*="utopia-wooden.css"]').attr("href",$(this).attr('rel'));
                $.cookie("css",$(this).attr('rel'), {expires: 365, path: '/'});
                $('.user-info').removeClass('user-active');
                $('.user-dropbox').hide();
            });
        });
    </script>




</head>

<body>

<div class="container-fluid">

    <!-- Header starts -->
    <div class="row-fluid">
        <div class="span12">

            <div class="header-top">

                <div class="header-wrapper">

                    <a href="#" class="utopia-logo"><img src="img/gov_logo.gif" alt="Utopia" height="50" width="80" /></a>
                    <span style="font-size:24px;font-weight:bold;">Laptop/PDA Distribution System - <?php 
echo $org_name;					
$org_code=$_SESSION['org_code'];
$email=$_SESSION['username'];?></span>
                    <div class="header-right">

                        <div class="header-divider">&nbsp;</div>

                        <div class="search-panel header-divider">
                            <div class="search-box">
                                <img src="img/icons/zoom.png" alt="Search">
                                <form action="#" method="post">
                                    <input type="text" name="search" placeholder="search"/>
                                </form>
                            </div>
                        </div>


                        <div class="user-panel header-divider">
                            <div class="user-info">
                                <img src="img/icons/user.png" alt="">
                                <a href="#">Admin user</a>
                            </div>

                            <div class="user-dropbox">
                                <ul>
                                    <li class="user"><a href="#">Profile</a></li>
                                    <li class="settings"><a href="#">Account Settings</a></li>
                                    <li class="logout"><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>

                        </div><!-- User panel end -->

                    </div><!-- End header right -->

                </div><!-- End header wrapper -->

            </div><!-- End header -->

        </div>

    </div>

    <!-- Header ends -->

    <div class="row-fluid">

        <!-- Sidebar statrt -->
        <div class="span2 sidebar-container">

            <div class="sidebar">

                <div class="navbar sidebar-toggle">
                    <div class="container">

                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>

                    </div>
                </div>

                <div class="nav-collapse collapse leftmenu">
					<?php include('left_menu.php');?>
				</div>


            </div>
        </div>

        <!-- Sidebar end -->

        <!-- Body start -->
            <div class="span10 body-container">
        <!--    
<div class="container">
	<h4>There are serious errors in your form submission, please see below for details.</h4>
	<ol>
		<li><label for="laptop_org_code" class="error">Please select your Organization Code</label></li>
		<li><label for="laptop_cc_name" class="error">Please select your Organization Name</label></li>
		<li><label for="claptop_chcp_mobile_no" class="error">Please enter CHCP contact <b>number</b> (between 2 and 8 characters)</label></li>
		<li><label for="address" class="error">Please enter your address (at least 3 characters)</label></li>
		<li><label for="avatar" class="error">Please select an image (png, jpg, jpeg, gif)</label></li>
		<li><label for="cv" class="error">Please select a document (doc, docx, txt, pdf)</label></li>
	</ol>
</div>-->


                <div class="row-fluid">

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span9">
                                <div class="row-fluid">
                                        <section class="utopia-widget">
										<form name="" method="post" action="addlaptopinfo.php" class="formular" id="form3">
										<table class="table">
										<tr>
										<td>
                                        Org Code 
										</td>
										<td colspan="2">
										<select name="laptop_org_code" id="laptop_org_code" class="validate[required,ajax[ajaxUserCallPhp]]">
										   <?php
                         $upazila_row = mysql_query("SELECT organization.org_code,id,organization.org_name
FROM organization WHERE organization.org_type_code='1039' AND upazila_id='".$upazila_id."' ORDER BY organization.org_code ASC ");

   while ($rows = mysql_fetch_assoc($upazila_row)) {
	    echo "<option value=\"" . $rows['org_code'] . "\">" . $rows['org_code'] .' : '.$rows['org_name']. "</option>";
                                            
	   }    ?>
										</select>			
										</td>
										</tr>
										<tr>
										<td>
										Name of CC : 
										</td>
										<td colspan="2">
										 <select id="laptop_cc_name" name="laptop_cc_name" class="validate[required]">
                                            <option value="">Select CC Name</option>                                        
                                         </select>
										 <a href="addcc.php">If you want to add CC, please click here. </a>
										</td>
										</tr>
										<tr>
										<td>
										Union Name : 
										</td>
										<td colspan="2">
										<select name="laptop_union_name" class="validate[required]">
										 <?php  $upazila_id;
                         $union_row = mysql_query("SELECT admin_union.union_name,admin_union.old_upazila_id,admin_union.old_union_id,admin_union.union_bbs_code
FROM admin_union WHERE admin_union.old_upazila_id='".$upazila_id."' GROUP BY admin_union.union_name");

   while ($rows = mysql_fetch_assoc($union_row)) {
	    echo "<option value=\"" . $rows['union_bbs_code'] . "\">" . $rows['union_name'] . "</option>";
                                            
	   }

                                                    ?>
										</select>
										if not found , please select nearby union
										</td>
										</tr>
										<tr>
										<td>
										Ward No (New) : 
										</td>
										<td>
											<select name="laptop_ward_no" class="validate[required]">
											<option value="Ward No-1">Ward No-1</option>
											<option value="Ward No-2">Ward No-2</option>
											<option value="Ward No-3">Ward No-3</option>
											<option value="Ward No-4">Ward No-4</option>
											<option value="Ward No-5">Ward No-5</option>
											<option value="Ward No-6">Ward No-6</option>
											<option value="Ward No-7">Ward No-7</option>
											<option value="Ward No-8">Ward No-8</option>
											<option value="Ward No-9">Ward No-9</option>
											</select>
										</td>
										<td>
											<b>Who already got the laptop  (Please fill up the following information):</b>
										</td>
										</tr>
										<tr>
										<td>
										CHCP Name : 
										</td>
										<td>
										<input name="laptop_chcp_name" type="text" class="validate[required]">
										</td>
										<td>
										IMEI No : <input name="laptop_imei_no" type="text">
										</td>
										</tr>
										<tr>
										<td>
										<label for="laptop_chcp_mobile_no">CHCP Mobile no : </label>
										</td>
										<td>
										<span style="padding-top:2px;">+88</span><input name="laptop_chcp_mobile_no" id="laptop_chcp_mobile_no" class="validate[required,custom[phone]]">
									    </td>
										<td>
										SIM No : <input name="laptop_sim_no" type="text">
										</td>
										</tr>
										<tr>
										<td>
										Source of Electricity:
										</td>
										<td>
										
										<select name="laptop_electricity_source_value" id="laptop_electricity_source_value" class="validate[required]">
                                                    <option value="">Select electricity source</option>
                                                    <?php
                                                    $sql = "SELECT
                                                            lpda_source_of_electricity.electricity_source_code,
                                                            lpda_source_of_electricity.electricity_source_name
                                                        FROM
                                                            lpda_source_of_electricity
                                                        ORDER BY
                                                            lpda_source_of_electricity.electricity_source_name ASC";
                                                    $result = mysql_query($sql) or die(mysql_error() . "<br /><br />Code:<b>loadorg_type:1</b><br /><br /><b>Query:</b><br />___<br />$sql<br />");

                                                    while ($rows = mysql_fetch_assoc($result)) {
                                                        echo "<option value=\"" . $rows['electricity_source_code'] . "\">" . $rows['electricity_source_name'] . "</option>";
                                                    }
                                                    ?>
                                         </select>
										<input name="laptop_elect_source" type="hidden" value="" id="laptop_elect_source">
										
										</td>
										<td>
										Laptop Serial#: <input name="laptop_serial_no" type="text">
										</td>
									
										</tr>
									
									
										<tr>
										<td colspan="2">
										 <input name="laptop_upazila_id" type="hidden" value="<?php echo  $upazila_id; ?>">
										  
										  <input name="laptop_updated_datetime" type="hidden" value="<?php echo date('Y-m-d h:m:i');  ?>">
										   <input name="laptop_updated_by" type="hidden" value="<?php echo $org_name; ?>">
										   <input name="laptop_updated_org_code" type="hidden" value="<?php echo $org_code; ?>">
										   <input name="laptop_active" type="hidden" value="1">
										<input type="submit" value="Submit" name="submit">
										</td>
										
									<td>
										&nbsp;
										</td>
										</tr>
										</table>
										
										</form>
                                        </section>
										
										  <div class="span12">

                                        <section class="utopia-widget">
                                         <div class="utopia-widget-title">
                                                <img src="img/icons/paragraph_justify.png" class="utopia-widget-icon">
                                                <span>Name of CHCP & Laptop Information</span>
                                            </div>
                                   
<table class="table table-bordered">

                                                    <thead>
													<tr>
													<th colspan="11">
													List of CHCP with received Laptop
													</th>
													</tr>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th nowrap="nowrap">Org code</th>
														<th nowrap="nowrap">Name of CC</th>
														<th nowrap="nowrap">Union</th>
                                                        <th nowrap="nowrap">New Ward no</th>
														<th nowrap="nowrap">CHCP Name</th>
														<th nowrap="nowrap">CHCP Mobile No.</th>
														<th nowrap="nowrap">Source of Electricity</th>
														<th>IMEI No.</th>
														<th nowrap="nowrap">SIM No.</th>
														<th nowrap="nowrap">Laptop Sl No.</th>
														<th>Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
													<?php


														$lapinfo=mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_cc_name,s.electricity_source_name,u.union_name,lpda.laptop_ward_no,lpda.laptop_chcp_name,lpda.laptop_chcp_mobile_no,lpda.laptop_imei_no,lpda.laptop_sim_no,laptop_serial_no FROM lpda_laptop AS lpda INNER JOIN admin_union AS u ON u.union_bbs_code = lpda.laptop_union_name INNER JOIN lpda_source_of_electricity AS s ON s.electricity_source_code = lpda.laptop_electricity_source_value WHERE lpda.laptop_upazila_id=u.old_upazila_id AND lpda.laptop_updated_org_code='".$org_code."' GROUP BY lpda.laptop_cc_name");
													//$i=1;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														if(!empty($lapinfos['laptop_imei_no'])&&!empty($lapinfos['laptop_sim_no'])&&!empty($lapinfos['laptop_serial_no'])){
														?>
                                                    <tr>
                                                        <td><?php echo $lapinfos['id'];?></td>
                                                        <td><?php echo $lapinfos['laptop_org_code'];?></td>
                                                        <td><?php echo $lapinfos['laptop_cc_name'];?></td>
                                                        <td><?php echo $lapinfos['union_name'];?></td>
														<td><?php echo $lapinfos['laptop_ward_no'];?></td>
														<td><?php echo $lapinfos['laptop_chcp_name'];?></td>
														<td><?php echo $lapinfos['laptop_chcp_mobile_no'];?></td>
														<td><?php echo $lapinfos['electricity_source_name'];?></td>
														<td><?php echo $lapinfos['laptop_imei_no'];?></td>
														<td><?php echo $lapinfos['laptop_sim_no'];?></td>
														<td><?php echo $lapinfos['laptop_serial_no'];?></td>
														<td nowrap="nowrap"><a href=""> Details</a></td>
                                                    </tr>
													<?php }} ?>
                                                   
                                                    </tbody>
</table>

<table class="table table-bordered">

                                                    <thead>
													<tr>
													<th colspan="11">
													List of CHCP without Laptop
													</th>
													</tr>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th nowrap="nowrap">Org code</th>
														<th nowrap="nowrap">Name of CC</th>
														<th nowrap="nowrap">Union</th>
                                                        <th nowrap="nowrap">New Ward no</th>
														<th nowrap="nowrap">CHCP Name</th>
														<th nowrap="nowrap">CHCP Mobile No.</th>
														<th nowrap="nowrap">Source of Electricity</th>
														<th nowrap="nowrap">IMEI No.</th>
														<th nowrap="nowrap">SIM No.</th>
														<th nowrap="nowrap">Laptop Sl No.</th>
														<th>Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
													<?php

														$lapinfo=mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_cc_name,s.electricity_source_name,u.union_name,lpda.laptop_ward_no,lpda.laptop_chcp_name,lpda.laptop_chcp_mobile_no,lpda.laptop_imei_no,lpda.laptop_sim_no,laptop_serial_no FROM lpda_laptop AS lpda INNER JOIN admin_union AS u ON u.union_bbs_code = lpda.laptop_union_name INNER JOIN org_source_of_electricity_main AS s ON s.electricity_source_code = lpda.laptop_electricity_source_value WHERE lpda.laptop_upazila_id=u.old_upazila_id AND lpda.laptop_updated_org_code='".$org_code."' GROUP BY lpda.laptop_cc_name");
														//$i=1;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														if(empty($lapinfos['laptop_imei_no'])|| empty($lapinfos['laptop_sim_no'])||empty($lapinfos['laptop_serial_no'])){
														?>
                                                    <tr>
                                                        <td><?php echo $lapinfos['id'];?></td>
                                                        <td><?php echo $lapinfos['laptop_org_code'];?></td>
                                                        <td><?php echo $lapinfos['laptop_cc_name'];?></td>
                                                        <td><?php echo $lapinfos['union_name'];?></td>
														<td><?php echo $lapinfos['laptop_ward_no'];?></td>
														<td><?php echo $lapinfos['laptop_chcp_name'];?></td>
														<td><?php echo $lapinfos['laptop_chcp_mobile_no'];?></td>
														<td><?php echo $lapinfos['electricity_source_name'];?></td>
														<td><?php echo $lapinfos['laptop_imei_no'];?></td>
														<td><?php echo $lapinfos['laptop_sim_no'];?></td>
														<td><?php echo $lapinfos['laptop_serial_no'];?></td>
														<td nowrap="nowrap"><a href="editlaptopinfo.php?id=<?php echo $lapinfos['id'];?>">Edit</a>
                                                         | <a href="deletelaptop.php?id=<?php echo $lapinfos['id'];?>">Delete</a></td>
                                               
												   </tr>
													<?php }} ?>
                                                   
                                                    </tbody>
</table>
</div>
                                </div>

								
					

                                <!-- image gallery  Starts-->

                               
                                <!-- image gallery  ends-->


                            </div><!-- Mid panel -->

                        </div>

                    </div>

                </div>


                <div class="row-fluid">
     </div>
        <!-- Body end -->

    </div>

    <!-- Maincontent end -->

</div> <!-- end of container -->

<!-- javascript placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/utopia.js"></script>
<script type="text/javascript" src="js/jquery.hoverIntent.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.datatable.js"></script>
<script type="text/javascript" src="js/tables.js"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script type="text/javascript" src="js/maskedinput.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>

<script type="text/javascript" src="js/header6654.js?v1"></script>
<script type="text/javascript" src="js/sidebar.js"></script>

<script type="text/javascript">

			
    $(function() {
	
	// load district
            $('#laptop_org_code').change(function() {
                $("#loading_content").show();
                var org_code = $('#laptop_org_code').val();
                $.ajax({
                    type: "POST",
                    url: 'get/get_cc_list.php',
                    data: {org_code: org_code},
                    dataType: 'json',
                    success: function(data)
                    {
                       $("#loading_content").hide();
                        var laptop_cc_name = document.getElementById('laptop_cc_name');
                        laptop_cc_name.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            laptop_cc_name.options.add(new Option(d.text, d.value));
                        }
                    }
                });
            });

		$('#laptop_electricity_source_value').change(function() {
										  var elec_source = $('#laptop_electricity_source_value').find('option:selected').text();
											$("#laptop_elect_source").val(elec_source);
										 });
			

        jQuery("#validation").validationEngine();
        $("#phone").mask("(999) 9999999999");
        $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});

    });

</script>
	<?php 
	                //echo "<pre>";
					//print_r($_POST);   
	               
				    if($_POST['submit']){			
					$exception_field=array('submit','param');
					$str=createMySqlInsertString($_POST, $exception_field);
					/******************************************************/	
					$str_k=$str['k'];
					$str_v=$str['v'];
					$sql="INSERT INTO lpda_laptop($str_k) values ($str_v)";
					mysql_query($sql);
					print "<script>";
					print " self.location=laptopinfo.php'"; // Comment this line if you don't want to redirect
					print "</script>";
	}
	?>
					
</body>

<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:50:08 GMT -->
</html>
