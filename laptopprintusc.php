<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors','On');?>
<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'include/db_connection.php'; 
if(empty($_SESSION['loginid']))
{
	print "<script>";
	print " self.location='index.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}

$org_code = $_SESSION['org_code'] ;

$org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_thana_code,organization.upazila_thana_name,organization.district_code,organization.district_name
FROM organization where organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_code=$rows['upazila_thana_code'];
$upazila_name=$rows['upazila_thana_name'];
$district_name=$rows['district_name'];
$district_code=$rows['district_code'];
$org_name=$rows['org_name'];
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
<?php $print="<div><input type=\"button\" onclick=\"javascript:window.print()\" value=\"Print\" class=\"btn_print\" style=\"margin-right:300px;\" /></div><div class=\"rclear\"></div>";
 	echo $print;?>
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
		
	
		<?php
		
				
			
					
			?>
			<div id="output"></div>
		
		<div class="row">
			
			<div class="span6">
			
					
	<div class="fullpage" style="height:auto;">
    	<div id="headlogo">
    		<br> &nbsp; <br>
            <table align="center">
             <tbody>
              <tr>
               <td align="center">
                  <span style="float:left;"><img src="./publish_files/gov.jpg" height="50px" alt="BD GOV"></span><span class="subheading" style="font-size: 17px">Laptop distribution list under <?php echo $org_name; ?> ( USC )<?php //echo $pdfdata->lhb_year; ?></span><br>
                  
                   <span class="subheading"><?php //echo $org_name; ?></span>
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
													    <th>Sl. </th>
                                                        <th nowrap="nowrap">USC Name</th>
														<th>Union Name</th>
														<th nowrap="nowrap">Name</th>
														<th nowrap="nowrap">Designation</th>
														<th nowrap="nowrap">Contact Person Mobile No.</th>
														<th nowrap="nowrap" align="center" style="text-align:center;width:140px;"> SIM Number </th>
                                                    </tr>
													
													<?php
												   
                                                    $lapinfo=mysql_query("SELECT * FROM organization where upazila_thana_code='$upazila_code' AND district_code='$district_code' AND org_type_name LIKE 'Union Sub-center%'");
													
													$rows = mysql_num_rows($lapinfo);
													$j=1;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														
														?>
                                                        <?php $usc_org_code=$lapinfos['org_code'];?>
                                                        <?php $org_name=$lapinfos['org_name'];?>
														<?php $union_name=$lapinfos['union_name'];?>
														<?php 	
														
														if($usc_org_code){ 
														$usc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.staff_id,total_manpower.designation,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
														LEFT JOIN total_manpower_imported_sanctioned_post_copy as total_manpower ON total_manpower.id=old_tbl_staff_organization.sp_id_2
														where old_tbl_staff_organization.org_code='$usc_org_code' AND total_manpower.designation_code<>'11321'");
														
														//AND total_manpower.designation_code='11226'");

														$usc_staff_rows = mysql_fetch_assoc($usc_staff);
														$staff_name=$usc_staff_rows['staff_name'];
														$contact_no =$usc_staff_rows['contact_no'];
                                                        $laptop_staff_id=$usc_staff_rows['staff_id'];
														$designation=$usc_staff_rows['designation'];
														
														} 
														?> 
												
													<?php if($staff_name){ ?>
													    <td><?php  echo $j++.'. ';?></td>
														<td nowrap="nowrap"><?php  echo $org_name;?></td>
														<td><?php if($union_name) { echo $union_name; } else echo 'N/A';?></td>
														<td><?php echo $staff_name;?></td>
														<td><?php echo $designation;?></td>
														<td><?php if($contact_no){echo $contact_no;}else echo 'N/A';?></td>
														<td></td>
                                                        <?php } ?>
                                                    </tr>
													<?php 
													} ?>
                                                   
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
<div style="clear:both;height:20px;">
</div>
<div style="float:left;">
<!--
<table class="table table-bordered" width="100%">
<tr>
<th>
Receipt Information
</th>
</tr>
 <tr>
												   <th align="right"></th>
												   </tr>
 <tr>     
												   <th colspan="5">Total laptop requested: <?php //echo $i;?></th>
												    <th colspan="6">Received: <?php //echo $i;?> </th>
												   </tr>
												   <tr>
												    <th colspan="5">Total EDGE Modem Requested: <?php //echo $i;?></th>     
												    <th colspan="6"> Received:<?php //echo $i;?> </th>
												  
												
                                                       
													
 </tr>
 </table>
 -->
 					
	 
	 

					
					
					
					
					</div> <!-- /.widget-content -->
					
					
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
