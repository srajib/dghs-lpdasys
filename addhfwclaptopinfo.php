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
       <div class="row-fluid">
								<?php 
							 if(!empty($_GET['org_code']))
							 {
							 $uhfwc_org_code=mysql_real_escape_string($_GET['org_code']);
							 $uhfwc_org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_id,organization.union_name,organization.ward_code,organization.source_of_electricity_main_code
			FROM organization where organization.org_code='".$uhfwc_org_code."'");
				
							$uhfwcrows = mysql_fetch_assoc($uhfwc_org);
							$uhfwc_upazila_id=$uhfwcrows['upazila_id'];
							$uhfwc_org_name=$uhfwcrows['org_name'];
							$uhfwc_org_code=$uhfwcrows['org_code'];
							$uhfwc_union_name=$uhfwcrows['union_name'];
							$uhfwc_ward_code=$uhfwcrows['ward_code'];
							$source_of_electricity_main_code=$uhfwcrows['source_of_electricity_main_code'];
							
							 if($source_of_electricity_main_code){
							 $elect_source = mysql_query("SELECT org_source_of_electricity_main.electricity_source_code,org_source_of_electricity_main.electricity_source_name
			FROM org_source_of_electricity_main where org_source_of_electricity_main.electricity_source_code='".$source_of_electricity_main_code."'");
							 
							 $source_of_electricityrows = mysql_fetch_assoc($elect_source);	
							 
							 $electricity_source=$source_of_electricityrows['electricity_source_name'];				
							  }
							  else 
							  $electricity_source='N/A';
							
							if($uhfwc_org_code){ 
							$uhfwc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
							LEFT JOIN total_manpower_imported_sanctioned_post_copy as total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
							where old_tbl_staff_organization.org_code='$uhfwc_org_code' AND total_manpower.designation_code='11864'");

							$uhfwc_staff_rows = mysql_fetch_assoc($uhfwc_staff);
							$staff_name=$uhfwc_staff_rows['staff_name'];
							$contact_no =$uhfwc_staff_rows['contact_no'];
							}
							else
							{
							$staff_name='N/A';
							$contact_no ='N/A';
							}
							}else
							{
							$uhfwc_org_name='N/A';;
							$uhfwc_org_code='N/A';
							$uhfwc_union_name='N/A';
							$uhfwc_ward_code='N/A';
							$source_of_electricity_main_code='N/A';
							$staff_name='N/A';
							$contact_no ='N/A';
							$electricity_source='N/A';
							}
							?>

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span9">
                                <div class="row-fluid">
                                        <section class="utopia-widget">
										<form name="" method="post" action="addhfwclaptopinfo.php" class="formular" id="form3">
										<table class="table">
										<tr>
										<td>
                                        Org Code 
										</td>
										<td colspan="2">
										<?php if($uhfwc_org_code){echo $uhfwc_org_code;}else{echo 'N/A';}?>
										<?php if($uhfwc_org_code){?><input type='hidden' name='laptop_org_code' value='<?php echo $uhfwc_org_code;?>'><?php } ?>
										</td>
										</tr>
										<tr>
										<td>
										Name of HFWC : 
										</td>
										<td colspan="2">
										 <?php if($uhfwc_org_name){echo $uhfwc_org_name;}else{echo 'N/A';}?>
										 <?php if($uhfwc_org_name){?><input type='hidden' name='laptop_org_name' value='<?php echo $uhfwc_org_name;?>'><?php } ?>
									
										</td>
										
										</tr>
										<tr>
										<td>
										Union Name : 
										</td>
										<td colspan="2">
										  <?php if($uhfwc_union_name)
											{ 
											 echo $uhfwc_union_name;
											}else{echo 'N/A';}
											?>
										 <?php if($uhfwc_union_name){?><input type='hidden' name='laptop_union_name' value='<?php echo $uhfwc_union_name;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_union_name' value='<?php echo 'N/A';?>'> <?php } ?>
										
										</td>
										</tr>
										<tr>
										<td>
										Ward No (New) : 
										</td>
										<td>
								        <?php if($uhfwc_ward_code){?><input type='hidden' name='laptop_ward_no' value='<?php echo $uhfwc_ward_code;?>'><?php }else{ 
										echo 'N/A';
										?>	
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
										<span style="padding-top:2px;"></span>
									    <span style="padding-top:2px;"><?php if($contact_no){ echo $contact_no;} else {echo 'N/A';}?></span>
										<?php if($contact_no){?><input type='hidden' name='laptop_contact_person_mobile' value='<?php echo $contact_no;?>'><?php }else{ ?>	
										<input type='hidden' name='laptop_contact_person_mobile' value='<?php echo 'N/A';?>'> <?php } ?>
									     
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
										 <input name="laptop_upazila_id" type="hidden" value="<?php echo  $upazila_thana_code; ?>">
										  
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
                                                <span>Name of HFWC & Laptop Information</span>
                                            </div>
                                   

<table class="table table-bordered">

                                                    <thead>
													<tr>
													<th colspan="11">
													List of UH&FWC
													</th>
													</tr>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th nowrap="nowrap">Org code</th>
														<th nowrap="nowrap">Name of UH&FWC</th>
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

												    $lapinfo=mysql_query("SELECT * FROM organization where org_type_code='1037' AND upazila_thana_code='$upazila_thana_code'");
													
													$rows = mysql_num_rows($lapinfo);
													$j=1;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														
														?>
                                                    <tr><td><?php echo $j++;?></td>
                                                        <td><?php echo $uhfwc_org_code=$lapinfos['org_code'];?></td>
                                                        <td><a href="addhfwclaptopinfo.php?org_code=<?php echo $lapinfos['org_code'];?>"><?php echo $lapinfos['org_name'];?></a></td>
														<?php 	
														if($uhfwc_org_code){ 
														$uhfwc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
														LEFT JOIN total_manpower_imported_sanctioned_post_copy as total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
														where old_tbl_staff_organization.org_code='$uhfwc_org_code' AND total_manpower.designation_code='11864'");

														$uhfwc_staff_rows = mysql_fetch_assoc($uhfwc_staff);
														$staff_name=$uhfwc_staff_rows['staff_name'];
														$contact_no =$uhfwc_staff_rows['contact_no'];
														} 
														?> 
														
														<td><?php if($staff_name){echo $staff_name;}else echo 'N/A';?></td>
														<td><?php if($contact_no){echo $contact_no;}else echo 'N/A';?></td>
														<td nowrap="nowrap"><a href="addhfwclaptopinfo.php?org_code=<?php echo $lapinfos['org_code'];?>">Update</a></td>
                                                
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
													
$result = mysql_query("SELECT COUNT(*) AS Total FROM organization where org_type_code='1037' AND upazila_thana_code='$upazila_thana_code' Limit $start, $perpage");
 
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
 
echo "<span><a id='page_a_link' href='addhfwclaptopinfo.php?page=$j'>< Prev</a></span>";
 
}
 
for($i=1; $i <= $totalPages; $i++)
 
{
 
if($i<>$page)
 
{
 
echo "<span><a id='page_a_link' href='addhfwclaptopinfo.php?page=$i'>$i</a></span>";
 
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
 
echo "<span><a id='page_a_link' href='addhfwclaptopinfo.php?page=$j'>Next</a></span>";
 
}
 
}
 
?></td>
<td></td>
</tr>
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

<script type="text/javascript">

			
    $(function() {
	/*
	// load district
            $('#laptop_org_code').change(function() {
                //$("#loading_content").show();
                var org_code = $('#laptop_org_code').val();
                $.ajax({
                    type: "POST",
                    url: 'get/get_hfwc_list.php',
                    data: {org_code: org_code},
                    dataType: 'json',
                    success: function(data)
                    {
                       // $("#loading_content").hide();
                        var laptop_uhfwc_name = document.getElementById('laptop_hfwc_name');
						 
                       laptop_uhfwc_name.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            laptop_uhfwc_name.options.add(new Option(d.text, d.value));
                        }
						
						
						
						
                    }
                });
            });

		$('#laptop_electricity_source_value').change(function() {
										  var elec_source = $('#laptop_electricity_source_value').find('option:selected').text();
											$("#laptop_elect_source").val(elec_source);
										 });
	
        jQuery("#validation").validationEngine();
      
 
        */
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
					$sql="INSERT INTO lpda_laptop_hfwc($str_k) values ($str_v)";
					mysql_query($sql);
					print "<script>";
					print " self.location=addhfwclaptopinfo.php'"; // Comment this line if you don't want to redirect
					print "</script>";
	}
	?>
					
</body>
</html>
