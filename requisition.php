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

$org = mysql_query("SELECT lpda_organization.org_code,lpda_organization.org_name,lpda_organization.upazila_id,lpda_organization.upazila_thana_name,lpda_organization.district_name
FROM lpda_organization where lpda_organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_id=$rows['upazila_id'];
$district_name=$rows['district_name'];
$upazila_name=$rows['upazila_thana_name'];
$org_name=$rows['org_name'];
?>

<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:48:05 GMT -->
<head>
    <meta charset="utf-8">
    <title>Laptop/PDA Distribution System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A complete admin panel theme">
    <meta name="author" content="theemio">

    <!-- styles -->

  
    <!--[if IE 8]>
    <link href="css/ie8.css" rel="stylesheet">
    <![endif]-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if gte IE 9]>
      <style type="text/css">
        .gradient {
           filter: none;
        }
      </style>
    <![endif]-->
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
</head>
<?php $print="<div><input type=\"button\" onclick=\"javascript:window.print()\" value=\"Print Requisition Form\" class=\"btn_print\" /></div><div class=\"rclear\"></div>";
 	echo $print;?>
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
			
					
	<div class="fullpage">
    	<div id="headlogo">
    		<br> &nbsp; <br>
            <table align="center">
             <tbody>
              <tr>
               <td align="center">
                  <span style="float:left;"><img src="./publish_files/gov.jpg" height="50px" alt="BD GOV"></span><span class="subheading" style="font-size: 18px">Laptop Requisition for CHCP <? //echo $pdfdata->lhb_year; ?></span><br>
                  
                   <span class="subheading"><? echo $org_name; ?></span>
                </p>
                <p><span class="subheading" style="font-size: 16px"><b>District:</b> <? echo $district_name; ?>,<b>Upazila:</b> <?php echo $upazila_name; ?></span></p>

				</td>
			  </tr>
             </tbody>
            </table>
            <br />
			
		
        </div><!--end of id headlogo -->
   
    </div><!--end of class fullpage -->
    <div class="fullpage" style="height:4480px;">
    	<div style="width:100%; text-align:right;"></div>
		 <table class="table table-bordered">
		  <tbody>
		  <thead>
     <tr>
                                                         <td id="tblclm2">ID</td>
                                                        <td id="tblclm2">Org code</td>
														 <td id="tblclm2" nowrap="nowrap">Name of CC</td>
														<td id="tblclm2" nowrap="nowrap">Union</td>
                                                        <td id="tblclm2" nowrap="nowrap">New Ward no</td>
														 <td id="tblclm2" nowrap="nowrap">CHCP Name</td>
														 <td id="tblclm2" nowrap="nowrap">CHCP Mobile No.</td>
														 <td id="tblclm2" nowrap="nowrap">IMEI No.</td>
														 <td id="tblclm2" nowrap="nowrap">SIM No.</td>
														<td id="tblclm2"  nowrap="nowrap">Laptop Sl No.</td>
													
                                                    </tr>
                                                    </thead>
 <tbody>
													<?php

														$lapinfo=mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_cc_name,u.union_name,lpda.laptop_ward_no,lpda.laptop_chcp_name,lpda.laptop_chcp_mobile_no,lpda.laptop_imei_no,lpda.laptop_sim_no,laptop_serial_no FROM lpda_laptop AS lpda INNER JOIN lpda_union AS u ON u.union_bbs_code = lpda.laptop_union_name WHERE lpda.laptop_upazila_id=u.old_upazila_id AND lpda.laptop_updated_org_code='".$org_code."' GROUP BY lpda.laptop_cc_name");
													    
														$lapinfo_no=mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_cc_name,u.union_name,
														lpda.laptop_ward_no,lpda.laptop_chcp_name,lpda.laptop_chcp_mobile_no,lpda.laptop_imei_no,
														lpda.laptop_sim_no,laptop_serial_no FROM lpda_laptop AS lpda INNER JOIN lpda_union AS u ON u.union_bbs_code = lpda.laptop_union_name 
														WHERE(lpda.laptop_imei_no IS NULL AND lpda.laptop_upazila_id=u.old_upazila_id AND lpda.laptop_updated_org_code='".$org_code."')OR(lpda.laptop_sim_no IS NULL AND lpda.laptop_upazila_id=u.old_upazila_id AND lpda.laptop_updated_org_code='".$org_code."')OR(lpda.laptop_serial_no IS NULL AND lpda.laptop_upazila_id=u.old_upazila_id AND lpda.laptop_updated_org_code='".$org_code."')");
													
													  
													// echo  $no_of_requested_laptop=mysql_num_rows($lapinfo);
													
													$i=0;
												    while($lapinfos = mysql_fetch_array($lapinfo))
														{ 
														if(empty($lapinfos['laptop_imei_no']) && empty($lapinfos['laptop_sim_no'])&&empty($lapinfos['laptop_serial_no'])){
														$i=$i+1;
														?>
                                                    <tr>
                                                        <td><?php echo $lapinfos['id'];?></td>
                                                        <td><?php echo $lapinfos['laptop_org_code'];?></td>
                                                        <td><?php echo $lapinfos['laptop_cc_name'];?></td>
                                                        <td><?php echo $lapinfos['union_name'];?></td>
														<td><?php echo $lapinfos['laptop_ward_no'];?></td>
														<td><?php echo $lapinfos['laptop_chcp_name'];?></td>
														<td><?php echo $lapinfos['laptop_chcp_mobile_no'];?></td>
														<td><?php echo $lapinfos['laptop_imei_no'];?></td>
														<td><?php echo $lapinfos['laptop_sim_no'];?></td>
														<td><?php echo $lapinfos['laptop_serial_no'];?></td>
                                                    </tr>
													<?php }} ?>
                                                   
                                                    </tbody>
													</table>
													<div style="clear:both;height:20px;">
</div>

<div style="float:right;">
<table>
 <tr>
                                                   <th>&nbsp;</th>     
												   <th align="middle">Name & Sign of UHFPO</th>
												   </tr>
												   <tr>
												         <th>&nbsp;</th>     
												   <th align="right">&nbsp;</th>
												   </tr>
												   <tr>
												   <tr>
												         <th>&nbsp;</th>     
												   <th align="right">_____________________</th>
												   </tr>
												   <tr>
												         <th></th>     
												   <th align="middle">Date</th>
												   </tr>
                                                       
													
 </tr>
 </table>
</div>
<div style="clear:both;height:20px;">
</div>
<div style="float:left;">
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
												   <th colspan="5">Total laptop requested: <?php echo $i;?></th>
												    <th colspan="6">Received: <?php echo $i;?> </th>
												   </tr>
												   <tr>
												    <th colspan="5">Total EDGE Modem Requested: <?php echo $i;?></th>     
												    <th colspan="6"> Received:<?php echo $i;?> </th>
												  
												
                                                       
													
 </tr>
 </table>
 <div style="float:right;">
 <table align="right">
 <tr>
                                                   <th></th>     
												   <th align="middle"></th>
												   </tr>
												   <tr>
												   <th>&nbsp;</th>     
												   <th align="right">&nbsp;</th>
												   </tr>
												   <tr>
												   
												   
												   
												   <tr>
												         <th>&nbsp;</th>     
												   <th align="right">_____________________</th>
												   </tr>
												   <tr>
												         <th></th>     
												   <th align="middle">
												   Signature
												   </th>
												   </tr>
                                                       
													
 </tr>
 </table>
													
	 
	 
	 </div>
					
					
					
					
					</div> <!-- /.widget-content -->
					
					
				</div> <!-- /.widget -->
				
			</div> <!-- /.span6 -->
			
			</form>
			
			<div class="span6">
				
				
		
				
				
			</div> <!-- /.span6 -->
			
		</div> <!-- /.row -->
		
		
		
	</div> <!-- /.container -->
	
</div> <!-- /#content -->

<div id="footer">	
		
	<div class="container">
		
		&copy; 2013 MIS, DGHS, All rights reserved.
		
	</div> <!-- /.container -->		
	
</div> <!-- /#footer -->




   
	   
</body>
</html>
