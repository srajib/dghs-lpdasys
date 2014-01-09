<?php session_start(); 
	  require_once 'include/db_connection.php'; 
  
	$msg='';
	if(!empty($_POST)){
	$pda_org_code=$_POST['pda_org_code'];
	$pda_union_name=$_POST['pda_union_name']; 
	$pda_ward_no=$_POST['pda_ward_no']; 
	$pda_person_type=$_POST['pda_person_type']; 
	$pda_person_name=$_POST['pda_person_name']; 
	$pda_staff_id=$_POST['pda_staff_id'];
	$pda_person_mobile_no=$_POST['pda_person_mobile_no']; 
	$pda_imei_no=$_POST['pda_imei_no']; 
	$pda_sim_no=$_POST['pda_sim_no']; 
	$pda_upazila_code=$_POST['pda_upazila_code']; 
	$pda_updated_datetime=$_POST['pda_updated_datetime'];
	$pda_updated_by=$_POST['pda_updated_by'];
	$pda_active=$_POST['pda_active'];
	
	$sql="INSERT INTO `lpda_pda` (`id`,`pda_org_code`,`pda_union_name`,`pda_ward_no`,`pda_person_type`,`pda_staff_id`,`pda_person_name`,`pda_person_mobile_no`,`pda_imei_no`,`pda_sim_no`,`pda_upazila_code`,`pda_updated_datetime`,`pda_updated_by`,`pda_active`)
	VALUES ('','$pda_org_code','$pda_union_name','$pda_ward_no','$pda_person_type','$pda_staff_id','$pda_person_name','$pda_person_mobile_no','$pda_imei_no','$pda_sim_no','$pda_upazila_code','$pda_updated_datetime','$pda_updated_by','$pda_active')";
	mysql_query($sql);
	$msg=2;
	}	             
	?>

<!DOCTYPE html>
<html lang="en">
<?php 

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
?>
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
            



                <div class="row-fluid">

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span9">
                                <div class="row-fluid">

									   	 <?php 
											if(!empty($_GET['staff_id']))
											{
											 $staff_id=mysql_real_escape_string($_GET['staff_id']);
											 $pda_org = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.staff_id,old_tbl_staff_organization.contact_no,total_manpower.union,total_manpower.designation,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
	LEFT JOIN total_manpower_imported_sanctioned_post_copy AS total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id WHERE old_tbl_staff_organization.staff_id='$staff_id'");				
											$uscrows = mysql_fetch_assoc($pda_org);
											$union_name=$uscrows['union'];
											$designation=$uscrows['designation'];
											$staff_name=$uscrows['staff_name'];
											$staff_id=$uscrows['staff_id'];
											$contact_no=$uscrows['contact_no'];
											$ward_no ='N/A';
										   }else{
										     $union_name='N/A';  
                                             $designation='N/A';  
                                             $staff_name='N/A';  
                                             $contact_no='N/A';
											 $ward_no ='N/A';
											 $staff_id=NULL;
                                            }
										?>
									   
                                        <section class="utopia-widget">
										<form name="" method="post" action="addpdainfo.php">
										
										<?php 
										 $msg_pda='';
										 if(!empty($_GET['staff_id'])){
										 $staff_code=mysql_real_escape_string($_GET['staff_id']);
										 $pdainfo=mysql_query("SELECT * FROM lpda_pda AS pda WHERE pda.pda_staff_id='".$staff_code."'");
										 $rows = mysql_num_rows($pdainfo);
										 if($rows>0){
										 $msg_pda=1;
										 }
										 }
										?>
										 
										<?php if(!empty($msg)){ 	
												echo "<span style='color:green;font-weight:bold;margin-left:5px;>  Your data has been inserted succssfully into our system.</span>";
												}  
										?>
											<?php if(!empty($msg_pda)){ 	
												echo "<span style='color:red;font-weight:bold;margin-left:5px;'>  This staff already taken PDA. So, he can not take any more PDA.</span>";
												}  
										?>
										
										<table class="table">
										 <input name="pda_org_code" type="hidden" value="<?php echo $org_code; ?>">
										<tr>
										<td>
										Union Name : 
										</td>
										<td>
										<?php if($union_name){?><input name="pda_union_name" type="hidden" value="<?php echo $union_name; ?>">
										<?php echo $union_name; } else{ ?> <input name="pda_union_name" type="hidden" value="<?php echo $union_name; ?>"><?php } ?>
										</td>
										</tr>
										
										<tr>
										<td>
										Ward No.(Old) : 
										</td>
										<td>
										<?php if($ward_no){ ?><input name="pda_ward_no" type="hidden" value="<?php echo $ward_no; ?>">
										<?php echo $ward_no; } else{ ?> <input name="pda_ward_no" type="hidden" value="N/A"><?php } ?>
										</td>
										</tr>
										
										<tr>
                                        <td>
										Name : 
										</td>
										<td>
										<?php if($staff_name){ ?><input name="pda_person_name" type="hidden" value="<?php echo $staff_name; ?>">
										<?php echo $staff_name; } else{ ?> <input name="pda_person_name" type="hidden" value="N/A"><?php 
                                         echo $staff_name; } ?>
										</td>
										</tr>
										
										<tr>
										<td>
										Designation : 
										</td>
										<td>
										<input name="pda_person_type" type="hidden" value="<?php echo $designation;?>">
										<?php echo $designation;?>
										</td>
										</tr>
										
										<tr>
										<td>
										Mobile no : 
										</td>
										<td>
										<input name="pda_person_mobile_no" type="hidden" value="<?php echo $contact_no;?>">
                                        <?php echo $contact_no;?>
									    </td>
										</tr>
										
										<tr>
										<td colspan="2">
										<b>Who already got the PDA  (Please fill up the following information):</b>
										</td>
										</tr>
										<tr>
										<td>
										IMEI No (PDA): 
										</td>
										<td>
										<input name="pda_imei_no" type="text">
										</td>
										</tr>
										
										<tr>
										<td>
										SIM No :
										</td>
										<td>
										<input name="pda_sim_no" type="text"><br>
										</td>
										</tr>
									
										<tr>
										<td colspan="2">
										   <input name="pda_upazila_code" type="hidden" value="<?php echo $upazila_thana_code;  ?>">
										   <input name="pda_updated_datetime" type="hidden" value="<?php echo date('Y-m-d h:m:i');  ?>">
										   <input name="pda_updated_by" type="hidden" value="<?php echo $org_name; ?>">
										   <input name="pda_staff_id" type="hidden" value="<?php echo $staff_id; ?>">
										   <input name="pda_active" type="hidden" value="1">
										   
										    <?php if(!empty($msg_pda)) {} else{ ?>
										     <input type="submit" value="Submit" name="submit">
										   <?php  } ?>
										</td>
										</tr>
										</table>
										
										</form>
                                        </section>

                                   <table class="table table-bordered">

                                                    <colgroup>
                                                        <col class="utopia-col-0">
                                                        <col class="utopia-col-1">
                                                        <col class="utopia-col-0">
                                                        <col class="utopia-col-1">
                                                        <col class="utopia-col-0">
                                                    </colgroup>

                                                    <thead>
													<tr>
													<th colspan="11">
													List of Health Worker
													</th>
													</tr>
                                                    <tr>
                                                        <th>Sl</th>
														<th>Union</th>
														<th>Designation</th>
														<th>Staff Name</th>
														<th>Mobile No.</th>
														<th>Actions</th>
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
													
													
													$pda_info = mysql_query("SELECT total_manpower.id,total_manpower.union,total_manpower.designation,total_manpower.designation_code FROM total_manpower_imported_sanctioned_post_copy AS total_manpower
WHERE (total_manpower.designation_code='10959' OR total_manpower.designation_code='10274' OR total_manpower.designation_code='10951') AND total_manpower.org_code='$org_code' Limit $start, $perpage");
													/*
													mysql_query("SELECT old_tbl_staff_organization.staff_name,total_manpower.designation,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
LEFT JOIN total_manpower_imported_sanctioned_post_copy AS total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
WHERE (total_manpower.designation_code='10959' OR total_manpower.designation_code='10274' OR total_manpower.designation_code='10951') AND old_tbl_staff_organization.org_code='$org_code'");
													*/
													
													$i=1;
												    while($pdainfos = mysql_fetch_array($pda_info))
														{  
														?>
                                                     <tr>
                                                        <td><?php echo $i++.'.';?></td>
														<td><?php echo $pdainfos['union'];?></td>
														<td><?php echo $pdainfos['designation'];?></td>
														 <td><?php 
														 
														  $total_manpower_id=$pdainfos['id'];
														  
														 if($total_manpower_id){ 
														$pda_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.staff_id,total_manpower.designation,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
LEFT JOIN total_manpower_imported_sanctioned_post_copy AS total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
WHERE (total_manpower.designation_code='10959' OR total_manpower.designation_code='10274' OR total_manpower.designation_code='10951') AND total_manpower.id=' $total_manpower_id'");

														$pda_staff_rows = mysql_fetch_assoc($pda_staff);
														$staff_name=$pda_staff_rows['staff_name'];
														$contact_no =$pda_staff_rows['contact_no'];
														} 
														 if($staff_name){echo $staff_name;}else echo 'N/A';?></td>
                                                        <td><?php  if($contact_no){echo $contact_no;}else echo 'N/A';//echo $pdainfos['contact_no'];?></td>
                                                    <td nowrap="nowrap"><a href="addpdainfo.php?staff_id=<?php echo $pda_staff_rows['staff_id'];?>">Update</a></td>
                                                
													</tr>

                                                   <?php } ?>
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
													
$result = mysql_query("SELECT COUNT(*) AS Total FROM total_manpower_imported_sanctioned_post_copy AS total_manpower
WHERE (total_manpower.designation_code='10959' OR total_manpower.designation_code='10274' OR total_manpower.designation_code='10951') AND total_manpower.org_code='$org_code'");
													
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
 
echo "<span><a id='page_a_link' href='addpdainfo.php?page=$j'>< Prev</a></span>";
 
}
 
for($i=1; $i <= $totalPages; $i++)
 
{
 
if($i<>$page)
 
{
 
echo "<span><a id='page_a_link' href='addpdainfo.php?page=$i'>$i</a></span>";
 
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
 
echo "<span><a id='page_a_link' href='addpdainfo.php?page=$j'>Next</a></span>";
 
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
													List of Field worker who received PDA
													</th>
													</tr>
                                                    <tr>
                                                        <th>ID</th>
														
														<th nowrap="nowrap">Organization</th>
                                                        <th nowrap="nowrap">Org code</th>
														<th nowrap="nowrap">Union</th>
                                                        <th nowrap="nowrap">New Ward no</th>
														<th nowrap="nowrap">Staff Name</th>
														<th nowrap="nowrap">Designation</th>
														<th nowrap="nowrap">Staff Mobile No.</th>
														<th nowrap="nowrap">IMEI No.</th>
														<th nowrap="nowrap">SIM No.</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
													<?php


														$lapinfo=mysql_query("SELECT pda.id,pda.pda_org_code,pda.pda_union_name,pda.pda_ward_no,pda.pda_person_type,pda.pda_person_type,pda.pda_person_name,pda.pda_person_mobile_no,pda.pda_imei_no,pda.pda_sim_no FROM lpda_pda AS pda WHERE pda.pda_org_code='".$org_code."' GROUP BY pda.pda_person_name");
													//$i=1;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														if(!empty($lapinfos['pda_imei_no'])&&!empty($lapinfos['pda_sim_no'])){
														?>
                                                    <tr>
                                                        <td><?php echo $lapinfos['id'];?></td>
                                                        <td><?php echo $org_name;?></td>
                                                        <td><?php echo $lapinfos['pda_org_code'];?></td>
                                                        <td><?php echo $lapinfos['pda_union_name'];?></td>
														<td><?php echo $lapinfos['pda_ward_no'];?></td>
														<td><a href="pdareport.php?pdaid=<?php echo $lapinfos['id'];?>"><?php echo $lapinfos['pda_person_name'];?></a></td>
														<td><?php echo $lapinfos['pda_person_type'];?></td>
														<td><?php echo $lapinfos['pda_person_mobile_no'];?></td>
														<td><?php echo $lapinfos['pda_imei_no'];?></td>
														<td><?php echo $lapinfos['pda_sim_no'];?></td>
                                                    </tr>
													<?php }} ?>
                                                   
                                                    </tbody>
</table>
				  
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
<script type="text/javascript" src="js/header6654.js?v1"></script>
<script type="text/javascript" src="js/sidebar.js"></script>


	
					
</body>
</html>
