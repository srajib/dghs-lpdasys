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
$org = mysql_query("SELECT lpda_organization.org_code,lpda_organization.org_name,lpda_organization.upazila_id
FROM lpda_organization where lpda_organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_id=$rows['upazila_id'];
$org_name=$rows['org_name'];

$id=$_GET['id'];

$result = mysql_query("SELECT pda.id,pda.pda_org_code,pda.pda_union_name,pda.pda_ward_no,u.union_name,pda.pda_person_type,pda.pda_person_name,pda.pda_person_mobile_no,pda.pda_imei_no,pda.pda_sim_no FROM lpda_pda AS pda LEFT JOIN lpda_union AS u ON u.union_bbs_code = pda.pda_union_name WHERE pda.id='$id' AND pda.pda_upazila_id=u.old_upazila_id");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		$pda_org_code=$test['pda_org_code'] ;
		$pda_union_name=$test['pda_union_name'] ;
		$pda_ward_no=$test['pda_ward_no'] ;
        $pda_person_type=$test['pda_person_type'] ;
		$pda_person_name=$test['pda_person_name'] ;
		$pda_person_mobile_no=$test['pda_person_mobile_no'] ;
		$pda_imei_no=$test['pda_imei_no'] ;
		$pda_sim_no=$test['pda_sim_no'] ;
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

                                       
                                        <section class="utopia-widget">
										<form name="" method="post" action="" id="form3">
										<table class="table">
										 <input name="pda_org_code" type="hidden" value="<?php echo $org_code; ?>">
										<tr>
										<td>
										Union Name : 
										</td>
										<td>
										 <input name="pda_union_name" type="text" readonly value="<?php echo $pda_union_name; ?>">
										
										</td>
										</tr>
										<tr>
										<td>
										Ward No.(Old) : 
										</td>
										<td>
									   <input name="pda_ward_no" type="text" readonly value="<?php echo $pda_ward_no; ?>">
										
										</td>
										</tr>
										<tr>
										<td>
										Designation : 
										</td>
										<td>
										
										 <input name="pda_person_type" type="text" readonly value="<?php echo $pda_person_type; ?>">
										
										</td>
										</tr>
										<tr>
										<td>
										Name : 
										</td>
										<td>
										<input name="pda_person_name" type="text" readonly class="validate[required]" value="<?php echo $pda_person_name; ?>">
										</td>
										</tr>
										<tr>
										<td>
										Mobile no : 
										</td>
										<td>
										+88<input name="pda_person_mobile_no" type="text" readonly class="validate[required]" value="<?php echo $pda_person_mobile_no; ?>">
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
										<input name="pda_imei_no" type="text" value="<?php echo $pda_imei_no; ?>">
										</td>
										</tr>
										
										<tr>
										<td>
										SIM No :
										</td>
										<td>
										<input name="pda_sim_no" type="text" value="<?php echo $pda_sim_no; ?>"><br>
										</td>
										</tr>
									
										<tr>
										<td colspan="2">
										 <input name="pda_upazila_id" type="hidden" value="<?php echo $upazila_id;  ?>">
										  <input name="pda_updated_datetime" type="hidden" value="<?php echo date('Y-m-d h:m:i');  ?>">
										   <input name="pda_updated_by" type="hidden" value="<?php echo $org_name; ?>">
										  
										   <input name="pda_active" type="hidden" value="1">
										<input type="submit" value="Submit" name="submit">
										</td>
										</tr>
										</table>
										
										</form>
                                        </section>
<?php
if(isset($_POST['submit']))
{	

	$pda_imei_no = $_POST['pda_imei_no'] ;
	$pda_sim_no = $_POST['pda_sim_no'] ;
	
	mysql_query("UPDATE lpda_pda SET pda_imei_no='$pda_imei_no',pda_sim_no='$pda_sim_no' WHERE id='$id'")
	or die(mysql_error()); 
    print "<script>";
	print " self.location='addpdainfo.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}

?>