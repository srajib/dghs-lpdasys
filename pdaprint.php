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
$org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_thana_name,organization.upazila_thana_code,organization.union_name,organization.district_name,organization.upazila_id
FROM organization where organization.org_code='".$org_code."'");	
$rows = mysql_fetch_assoc($org);

$upazila_id=$rows['upazila_id'];
$org_name=$rows['org_name'];
$upazila_name=$rows['upazila_thana_name'];
$upazila_bbs_code=$rows['upazila_thana_code'];
$district_name=$rows['district_name'];
 $designation_code=mysql_real_escape_string($_GET['designation_code']);
$union_naame=$rows['union_name'];
if($designation_code=='10959'){$designation='Health Inspector';}
if($designation_code=='10274'){$designation='Asstt. Health Inspector';}
if($designation_code=='10951'){$designation='Health Asst.';}
 //else $designation='N/A';
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
<?php $print="<div><input type=\"button\" onclick=\"javascript:window.print()\" value=\"Print\" class=\"btn_print\" style=\"margin-right:300px;\" /></div><div class=\"rclear\"></div>";
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
			
					
		<div class="fullpage" style="height:auto;">
    	<div id="headlogo">
    		<br> &nbsp; <br>
            <table align="center">
             <tbody>
              <tr>
               <td align="center">
                  <span style="float:left;"><img src="./publish_files/gov.jpg" height="50px" alt="BD GOV"></span><span class="subheading" style="font-size: 18px">PDA distribution list under <?php echo $org_name; ?></span><br>
                  
                   <span class="subheading"><?php //echo $org_name; ?></span>
                </p>
                <p><span class="subheading" style="font-size: 16px"><b>Upazila:</b> <?php echo $upazila_name; ?></span> , <span class="subheading" style="font-size: 16px;margin-left:5px;"><b>District:</b> <?php echo $district_name; ?></span></p>
                <p><span class="subheading" style="font-size: 16px"><b>Designation:</b> <?php echo $designation; ?></span></p>
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
		 <table class="table table-bordered"  style="background-image:url('img/govt_logo.png');background-repeat:no-repeat;background-position:center;"
		  <tbody>
		  <thead>
     <tr>
                                                         <td id="tblclm2">Sl.</td>
														 <td id="tblclm2" nowrap="nowrap">Union</td>
														 <td id="tblclm2" nowrap="nowrap">Designation</td>
														 <td id="tblclm2" nowrap="nowrap">Name of the Person</td>
														 <td id="tblclm2" nowrap="nowrap">Mobile No.</td>
															<th nowrap="nowrap" align="center" style="text-align:center;width:200px;"> SIM Number </th>
													
                                                    </tr>
                                                    </thead>
 <tbody>
													<?php
													//$lapinfo=mysql_query("SELECT * FROM lpda_pda WHERE pda_org_code=$org_code ORDER BY pda_person_type desc");
                                                    if($designation_code=='10274'){
													   $pda_info = mysql_query("SELECT total_manpower.id,total_manpower.union,total_manpower.designation,total_manpower.org_code,total_manpower.designation_code FROM total_manpower_imported_sanctioned_post_copy AS total_manpower WHERE total_manpower.designation_code='10274' AND total_manpower.org_code='$org_code'");
                                                    }
													else if($designation_code=='10951'){
                                                       $pda_info = mysql_query("SELECT total_manpower.id,total_manpower.union,total_manpower.designation,total_manpower.org_code,total_manpower.designation_code FROM total_manpower_imported_sanctioned_post_copy AS total_manpower WHERE total_manpower.designation_code='10951' AND total_manpower.org_code='$org_code'");
                                                    }
											        else if($designation_code=='10959'){
                                                     $pda_info = mysql_query("SELECT total_manpower.id,total_manpower.union,total_manpower.designation,total_manpower.org_code,total_manpower.designation_code FROM total_manpower_imported_sanctioned_post_copy AS total_manpower WHERE total_manpower.designation_code='10959' AND total_manpower.org_code='$org_code'");
                                                    }
													
													$i=1;
												    while($pdainfos = mysql_fetch_array($pda_info))
														{  
														?>
                                                     <tr>
														<?php  
														$total_manpower_id=$pdainfos['id'];
														if($total_manpower_id){ 
														$pda_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.staff_id,total_manpower.designation,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
LEFT JOIN total_manpower_imported_sanctioned_post_copy AS total_manpower ON total_manpower.id=old_tbl_staff_organization.sp_id_2 WHERE total_manpower.id='$total_manpower_id' AND old_tbl_staff_organization.org_code='$org_code'");
                                                        
														
														//$pda_staff = mysql_query("SELECT * FROM old_tbl_staff_organization WHERE org_code='$org_code' AND designation_id='$designation_code'");
                                                        
														
														$pda_staff_rows = mysql_fetch_assoc($pda_staff);
														$staff_name=$pda_staff_rows['staff_name'];
														$contact_no =$pda_staff_rows['contact_no'];
														}
														//} 
													   if($staff_name){
                                                        ?>
                                                       
                                                        <td><?php echo $i++.'.'; ?></td>
														<td><?php if($union_naame){echo $union_naame;}else echo 'N/A';?></td>
														<td><?php echo $pdainfos['designation'];?></td>
                                                        <td><?php echo $staff_name;?> </td>
                                                        <td><?php  if($contact_no){echo $contact_no;}else echo 'N/A';//echo $pdainfos['contact_no'];?></td>
                                                         <td></td> 
                                                       <?php } ?>
													</tr>

                                                   <?php } ?>
                                                   
                                                    </tbody>
													</table>
													<div style="clear:both;height:20px;">
</div>

<div>
<table style="float:right;margin-left:500px;margin-top:40px;">
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
												   <th align="right"><?php $print="<div><input type=\"button\" onclick=\"javascript:window.print()\" value=\"Print Requisition Form\"  /></div><div class=\"rclear\"></div>";
 	//echo $print;?></th>
												   </tr>
                                                       
													

 </table>
</div>

				
					
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
