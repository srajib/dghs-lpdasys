<?php session_start(); 
error_reporting(E_ALL);
ini_set('display_errors','On');
?>
<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'include/db_connection.php'; 
include('include/inc.functions.generic.php');

    $msg='';
    
	if(!empty($_POST)){
	$laptop_org_code=$_POST['laptop_org_code'];
    $laptop_usc_name=$_POST['laptop_usc_name'];
	$laptop_union_name=$_POST['laptop_union_name']; 
	$laptop_ward_no=$_POST['laptop_ward_no']; 
	$laptop_person_name=$_POST['laptop_contact_person']; 
	$laptop_staff_id=$_POST['laptop_staff_id'];
	$laptop_person_mobile_no=$_POST['laptop_person_mobile_no']; 
	$laptop_imei_no=$_POST['laptop_imei_no']; 
	$laptop_sim_no=$_POST['laptop_sim_no']; 
    $laptop_serial_no=$_POST['laptop_serial_no']; 
	$laptop_upazila_code=$_POST['laptop_upazila_code']; 
	$laptop_updated_datetime=$_POST['laptop_updated_datetime'];
	$laptop_updated_by=$_POST['laptop_updated_by'];
	$laptop_active=$_POST['laptop_active'];
    $laptop_updated_org_code=$_POST['laptop_updated_org_code'];
    $laptop_elect_source=$_POST['laptop_elect_source'];
	
	$sql="INSERT INTO `lpda_laptop_usc` (`id`,`laptop_org_code`,`laptop_usc_name`,`laptop_union_name`,`laptop_ward_no`,`laptop_staff_id`,`laptop_contact_person`,`laptop_contact_person_mobile`,`laptop_electricity_source_value`,`laptop_imei_no`,`laptop_sim_no`,`laptop_serial_no`,`laptop_upazila_code`,`laptop_updated_by`,`laptop_updated_org_code`) VALUES ('','$laptop_org_code','$laptop_usc_name','$laptop_union_name','$laptop_ward_no','$laptop_staff_id','$laptop_person_name','$laptop_person_mobile_no','$laptop_elect_source','$laptop_imei_no','$laptop_sim_no','$laptop_serial_no','$laptop_upazila_code','$laptop_updated_by','$laptop_updated_org_code')";
	mysql_query($sql);
    
	$msg=2;
	}	             

if(empty($_SESSION['loginid']))
{
	print "<script>";
	print " self.location='index.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}


$org_code = $_SESSION['org_code'] ;
$org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_thana_code
FROM organization where organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_thana_code=$rows['upazila_thana_code'];
$org_name=$rows['org_name'];


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
	<style>
 #page_links
 {
  font-family: arial, verdana;
  font-size: 12px;
  border:1px #000000 solid;
  padding: 6px;
  margin: 3px;
  background-color: #cccccc;
  text-decoration: none;
 }
 #page_a_link
 {
  font-family: arial, verdana;
  font-size: 12px;
  border:1px #000000 solid;
  color: #ff0000;
  background-color: #cccccc;
  padding: 6px;
  margin: 3px;
  text-decoration: none;
 }
	</style>
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
-->				 <?php 
                 if(!empty($_GET['org_code']))
				 {
				 $usc_org_code=mysql_real_escape_string($_GET['org_code']);
				 $usc_org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_id,organization.union_name,organization.ward_code,organization.source_of_electricity_main_code
FROM organization where organization.org_code='".$usc_org_code."'");
	
				$uscrows = mysql_fetch_assoc($usc_org);
				$usc_upazila_id=$uscrows['upazila_id'];
				$usc_org_name=$uscrows['org_name'];
				$usc_org_code=$uscrows['org_code'];
				$usc_union_name=$uscrows['union_name'];
				$usc_ward_code=$uscrows['ward_code'];
				$source_of_electricity_main_code=$uscrows['source_of_electricity_main_code'];
				
				 if($source_of_electricity_main_code){
				 $elect_source = mysql_query("SELECT org_source_of_electricity_main.electricity_source_code,org_source_of_electricity_main.electricity_source_name
FROM org_source_of_electricity_main where org_source_of_electricity_main.electricity_source_code='".$source_of_electricity_main_code."'");
                 
				 $source_of_electricityrows = mysql_fetch_assoc($elect_source);	
				 
                 $electricity_source=$source_of_electricityrows['electricity_source_name'];				
				  }
				  else 
				  $electricity_source='N/A';
				
				if($usc_org_code){ 
				$usc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.staff_id,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
				LEFT JOIN total_manpower_imported_sanctioned_post_copy as total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
				where old_tbl_staff_organization.org_code='$usc_org_code' AND total_manpower.designation_code='11226'");

				$usc_staff_rows = mysql_fetch_assoc($usc_staff);
				$staff_name=$usc_staff_rows['staff_name'];
                $staff_id=$usc_staff_rows['staff_id'];
				$contact_no =$usc_staff_rows['contact_no'];
				}
				else
				{
				$staff_name='N/A';
				$contact_no ='N/A';
                $staff_id   ='N/A';
				}
				}else
				{
				$usc_org_name='N/A';;
				$usc_org_code='N/A';
				$usc_union_name='N/A';
				$usc_ward_code='N/A';
				$source_of_electricity_main_code='N/A';
				$staff_name='N/A';
                $staff_id    ='N/A';
				$contact_no ='N/A';
				$electricity_source='N/A';
				}
				?>


                <div class="row-fluid">

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span9">
                                <div class="row-fluid">
                                        <section class="utopia-widget">
										<form name="" method="post" action="addusclaptopinfo.php" class="formular" id="form3">
										 <?php 
										 $msg_usc='';
										 if(!empty($_GET['org_code'])){
										 $usc_org_code=mysql_real_escape_string($_GET['org_code']);
										 $usclapinfo=mysql_query("SELECT id FROM lpda_laptop_usc AS lpda WHERE lpda.laptop_org_code='".$usc_org_code."'");
										 $rows = mysql_num_rows($usclapinfo);
										 if($rows>0){ 
										 $msg_usc=1;
										 }
										 }
										?>
										 
										<?php if(!empty($msg)){ 	
												echo "<span style='color:green;font-weight:bold;margin-left:5px;>  Your data has been inserted succssfully into our system.</span>";
												}  
										?>
											<?php if(!empty($msg_usc)){ 	
												echo "<span style='color:red;font-weight:bold;margin-left:5px;'>  This Union sub center already taken laptop. So, this union sub center can not take any laptop .</span>";
												}  
										?>
										<table class="table">
										<tr>
										<td>
                                        Org Code 
										</td>
										<td colspan="2">
										<?php if($usc_org_code){echo $usc_org_code;}else{echo 'N/A';}?>
										<?php if($usc_org_code){?><input type='hidden' name='laptop_org_code' value='<?php echo $usc_org_code;?>'><?php } ?>
											
										</td>
										</tr>
										<tr>
										<td>
										Name of USC : 
										</td>
										<td colspan="2">
										   <?php if($usc_org_name){echo $usc_org_name;}else{echo 'N/A';}?>
										 <?php if($usc_org_name){?><input type='hidden' name='laptop_usc_name' value='<?php echo $usc_org_name;?>'><?php } ?>
									
										 <!--<a href="addusc.php">If you want to add USC, please click here. </a>-->
										</td>
										</tr>
										<tr>
										<td>
										Union Name : 
										</td>
										<td colspan="2">
									    <?php if($usc_union_name)
											{ 
											 echo $usc_union_name;
											}else{echo 'N/A';}
											?>
										 <?php if($usc_union_name){?><input type='hidden' name='laptop_union_name' value='<?php echo $usc_union_name;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_union_name' value='<?php echo 'N/A';?>'> <?php } ?>
										 <?php if($staff_id){?><input type='hidden' name='laptop_staff_id' value='<?php echo $staff_id;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_staff_id' value='<?php echo 'N/A';?>'> <?php } ?>
                                       
										</td>
										</tr>
										<tr>
										<td>
										Ward No (New) : 
										</td>
										<td>
											 <?php if($usc_ward_code){?><input type='hidden' name='laptop_ward_no' value='<?php echo $usc_ward_code;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_ward_no' value='<?php echo 'N/A';?>'> <?php } ?>
										
										</td>
										<td>
											<b>Who already got the laptop  (Please fill up the following information):</b>
										</td>
										</tr>
										<tr>
										<td>
										Contact Person Name : 
										</td>
										<td>
										<?php if($staff_name){ echo $staff_name;} else {echo 'N/A';}?>
										<?php if($staff_name){?><input type='hidden' name='laptop_contact_person' value='<?php echo $staff_name;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_contact_person' value='<?php echo 'N/A';?>'> <?php } ?>
									
										</td>
										<td>
										IMEI No : <input name="laptop_imei_no" type="text">
										</td>
										</tr>
										<tr>
										<td>
										<label for="laptop_contact_person_mobile">Contact Person Mobile: </label>
										</td>
										<td>
										<span style="padding-top:2px;"><?php if($contact_no){ echo $contact_no;} else {echo 'N/A';}?></span>
											<?php if($contact_no){?><input type='hidden' name='laptop_person_mobile_no' value='<?php echo $contact_no;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_person_mobile_no' value='<?php echo 'N/A';?>'> <?php } ?>
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
										 <?php if($electricity_source){echo $electricity_source;}else {echo 'N/A';};?>
										 <?php if($electricity_source){?><input type='hidden' name='laptop_elect_source' value='<?php echo $electricity_source;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_elect_source' value='<?php echo 'N/A';?>'> <?php } ?>
										
										</td>
										<td>
										Laptop Serial#: <input name="laptop_serial_no" type="text">
										</td>
									
										</tr>
									
									
										<tr>
										<td colspan="2">
										  <input name="laptop_upazila_code" type="hidden" value="<?php echo  $upazila_thana_code; ?>">
										  <input name="laptop_updated_datetime" type="hidden" value="<?php echo date('Y-m-d h:m:i');  ?>">
										  <input name="laptop_updated_by" type="hidden" value="<?php echo $org_name; ?>">
										  <input name="laptop_updated_org_code" type="hidden" value="<?php echo $org_code; ?>">
										  <input name="laptop_active" type="hidden" value="1">
										 <?php if(!empty($msg_usc)){} else { ?>
										    <input type="submit" value="Submit" name="submit">
										 <?php } ?>
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
                                                <span>Name of USC & Laptop Information</span>
                                            </div>
                                   
<table class="table table-bordered">

                                                    <thead>
													<tr>
													<th colspan="11">
													List of USC with received Laptop
													</th>
													</tr>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th nowrap="nowrap">Org code</th>
														<th nowrap="nowrap">Name of USC</th>
														<th nowrap="nowrap">Contact Person</th>
														<th nowrap="nowrap">Contact no.</th>
														<th>Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
													<?php
														    $perpage = 20;
															 
															if(isset($_GET["page"])){
															$page = intval($_GET["page"]);
															}
															else {
															$page = 1;
															}
															$calc = $perpage * $page;
															$start = $calc - $perpage;

												    $lapinfo=mysql_query("SELECT * FROM organization where org_type_code='1038' AND upazila_thana_code='$upazila_thana_code' Limit $start, $perpage");
													
													$rows = mysql_num_rows($lapinfo);
													$j=1;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														
														?>
                                                    <tr><td><?php echo $j++;?></td>
                                                        <td><?php echo $usc_org_code=$lapinfos['org_code'];?></td>
                                                        <td><a href="addusclaptopinfo.php?org_code=<?php echo $lapinfos['org_code'];?>"><?php echo $lapinfos['org_name'];?></a></td>
														<?php 	
														if($usc_org_code){ 
														$usc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.staff_id,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
														LEFT JOIN total_manpower_imported_sanctioned_post_copy as total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
														where old_tbl_staff_organization.org_code='$usc_org_code' AND total_manpower.designation_code='11226'");

														$usc_staff_rows = mysql_fetch_assoc($usc_staff);
														$staff_name=$usc_staff_rows['staff_name'];
														$contact_no =$usc_staff_rows['contact_no'];
                                                        $laptop_staff_id=$usc_staff_rows['staff_id'];
														} 
														?> 
														
														<td><?php if($staff_name){echo $staff_name;}else echo 'N/A';?></td>
														<td><?php if($contact_no){echo $contact_no;}else echo 'N/A';?></td>
														<td nowrap="nowrap"><a href="addusclaptopinfo.php?org_code=<?php echo $lapinfos['org_code'];?>">Update</a></td>
                                                
                                                    </tr>
													<?php 
													} ?>
                                                   
                                                    </tbody>
</table>


<table width="400" cellspacing="2" cellpadding="2" align="center">
<tbody>
<tr>
<td align="center">
 
<?php
 
if(isset($page))
 
{
//$lapinfo=mysql_query("SELECT * FROM organization where org_type_code='1039' AND upazila_id='$upazila_id'");
													
$result = mysql_query("SELECT COUNT(*) AS Total FROM organization where org_type_code='1038' AND upazila_thana_code='$upazila_thana_code'");
 
$rows = mysql_num_rows($result);
 
if($rows)
 
{
 
$rs = mysql_fetch_assoc($result);
 
$total = $rs["Total"];
 
}
 
$totalPages = ceil($total / $perpage);
 
if($page <=1 ){
 
echo "<span id='page_links' style='font-weight: bold;'>Prev</span>";
 
}
 
else
 
{
 
$j = $page - 1;
 
echo "<span><a id='page_a_link' href='addlaptopinfo.php?page=$j'>< Prev</a></span>";
 
}
 
for($i=1; $i <= $totalPages; $i++)
 
{
 
if($i<>$page)
 
{
 
echo "<span><a id='page_a_link' href='addusclaptopinfo.php?page=$i'>$i</a></span>";
 
}
 
else
 
{
 
echo "<span id='page_links' style='font-weight: bold;'>$i</span>";
 
}
 
}
 
if($page == $totalPages )
 
{
 
echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";
 
}
 
else
 
{
 
$j = $page + 1;
 
echo "<span><a id='page_a_link' href='addusclaptopinfo.php?page=$j'>Next</a></span>";
 
}
 
}
 
?></td>
<td></td>
</tr>
</tbody>
</table>

<table class="table table-bordered">

                                                    <thead>
													<tr>
													<th colspan="11">
													List of USC with received Laptop
													</th>
													</tr>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th nowrap="nowrap">Org code</th>
														<th nowrap="nowrap">Name of Organization</th>
														<th nowrap="nowrap">Union</th>
                                                        <th nowrap="nowrap">New Ward no</th>
														<th nowrap="nowrap">Person Name</th>
														<th nowrap="nowrap">Contact person Mobile No.</th>
														<th nowrap="nowrap">Source of Electricity</th>
														<th nowrap="nowrap">IMEI No.</th>
														<th nowrap="nowrap">SIM No.</th>
														<th nowrap="nowrap">Laptop Sl No.</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
													<?php


													$lapinfo=mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_usc_name,lpda.laptop_electricity_source_value,lpda.laptop_union_name,lpda.laptop_ward_no,lpda.laptop_contact_person,lpda.laptop_contact_person_mobile,lpda.laptop_imei_no,lpda.laptop_sim_no,lpda.laptop_serial_no FROM lpda_laptop_usc AS lpda WHERE lpda.laptop_updated_org_code='".$org_code."'");
													
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														if(!empty($lapinfos['laptop_imei_no'])&&!empty($lapinfos['laptop_sim_no'])&&!empty($lapinfos['laptop_serial_no'])){
														?>
                                                    <tr>
                                                        <td><?php echo $lapinfos['id'];?></td>
                                                        <td><?php echo $lapinfos['laptop_org_code'];?></td>
                                                        <td><a href="uscreport.php?uid=<?php echo $lapinfos['id'];?>"><?php echo $lapinfos['laptop_usc_name'];?></a></td>
                                                        <td><?php echo $lapinfos['laptop_union_name'];?></td>
														<td><?php echo $lapinfos['laptop_ward_no'];?></td>
														<td><?php echo $lapinfos['laptop_contact_person'];?></td>
														<td><?php echo $lapinfos['laptop_contact_person_mobile'];?></td>
														<td><?php echo $lapinfos['laptop_electricity_source_value'];?></td>
														<td><?php echo $lapinfos['laptop_imei_no'];?></td>
														<td><?php echo $lapinfos['laptop_sim_no'];?></td>
														<td><?php echo $lapinfos['laptop_serial_no'];?></td>
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
<script type="text/javascript" src="js/jquery.sparkline.js"></script>
<script type="text/javascript" src="js/jquery.vticker-min.js"></script>
<script type="text/javascript" src="js/ui/datepicker.js"></script>
<script type="text/javascript" src="js/upload/load-image.min.js"></script>
<script type="text/javascript" src="js/upload/image-gallery.min.js"></script>
<script type="text/javascript" src="js/jquery.simpleWeather.js"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script type="text/javascript" src="js/maskedinput.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAeTbCOpuPIKT4i9n8iUQsBHNUt_MWjtog&amp;sensor=false"></script>
<script type="text/javascript" src="js/gmap3.js"></script>
<script type="text/javascript" src="js/header6654.js?v1"></script>
<script type="text/javascript" src="js/sidebar.js"></script>


	
					
</body>
</html>
