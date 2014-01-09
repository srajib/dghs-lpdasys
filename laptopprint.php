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
$org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_thana_name,organization.district_name,organization.upazila_id
FROM organization where organization.org_code='".$org_code."'");	
$rows = mysql_fetch_assoc($org);

$upazila_id=$rows['upazila_id'];
$org_name=$rows['org_name'];
$upazila_name=$rows['upazila_thana_name'];
$district_name=$rows['district_name'];
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
                  <span style="float:left;"><img src="./publish_files/gov.jpg" height="50px" alt="BD GOV"></span><span class="subheading" style="font-size: 18px">Laptop distribution list of <?php echo $org_name; ?> ( CC )<?php //echo $pdfdata->lhb_year; ?></span><br>
                  
                   <span class="subheading"><?php //echo $org_name; ?></span>
                </p>
                <p><span class="subheading" style="font-size: 16px"><b>Upazila:</b> <?php echo $upazila_name; ?></span><span class="subheading" style="font-size: 16px;margin-left:5px;"><b>District:</b> <?php echo $district_name; ?></span></p>

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
    <div class="fullpage" style="height:4480px;">
    	<div style="width:100%; text-align:right;"></div>
		 <table class="table table-bordered">
		                                       <tbody>
											   
											         <tr>
                                                        <th>Sl</th>
                                                        <th>CC Name</th>
                                                        <th>Union Name</th>
														<th>Ward No</th>
														<th>CHCP Name</th>
														<th>CHCP Mobile No.</th>
														<th>Source of Electricity</th>
														<th>IMEI No.</th>
														<th>SIM No.</th>
														<th>Serial No.</th>
                                                    </tr>
													
													<?php
													$pdainfo=mysql_query("SELECT * FROM lpda_laptop WHERE laptop_updated_org_code=$org_code");
													$i=1;
													
												    while($pdainfos = mysql_fetch_array($pdainfo))
														{  
														//if(!empty($pdainfos['pda_imei_no'])&&!empty($pdainfos['pda_sim_no'])){
												        ?>
                                                     <tr>
                                                        <td><?php echo $pdainfos['id'];?></td>
                                                        <td><?php echo $pdainfos['laptop_cc_name'];?></td>
                                                        <td><?php echo $pdainfos['laptop_union_name'];?></td>
														<td><?php echo $pdainfos['laptop_ward_no'];?></td>
														<td><?php echo $pdainfos['laptop_chcp_name'];?></td>
														<td><?php echo $pdainfos['laptop_chcp_mobile_no'];?></td>
														<td><?php echo $pdainfos['laptop_electricity_source_value'];?></td>
														<td><?php echo $pdainfos['laptop_imei_no'];?></td>
														<td><?php echo $pdainfos['laptop_sim_no'];?></td>
														<td><?php echo $pdainfos['laptop_serial_no'];?></td>
                                                    </tr>

                                                   <?php //}
												   } ?>
                                                    </tbody>							<div style="clear:both;height:20px;">
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
