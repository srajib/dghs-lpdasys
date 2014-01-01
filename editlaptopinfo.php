<?php session_start(); ?>
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
$org = mysql_query("SELECT lpda_organization.org_code,lpda_organization.org_name,lpda_organization.upazila_id
FROM lpda_organization where lpda_organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_id=$rows['upazila_id'];
$org_name=$rows['org_name'];

$id=$_GET['id'];

$result = mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_cc_name,lpda.laptop_electricity_source_value,u.union_name,lpda.laptop_ward_no,lpda.laptop_chcp_name,lpda.laptop_chcp_mobile_no,lpda.laptop_imei_no,lpda.laptop_sim_no,laptop_serial_no FROM lpda_laptop AS lpda INNER JOIN lpda_union AS u ON u.union_bbs_code = lpda.laptop_union_name WHERE lpda.laptop_upazila_id=u.old_upazila_id AND lpda.id='$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		$laptop_org_code=$test['laptop_org_code'] ;
		$laptop_cc_name=$test['laptop_cc_name'] ;
		$laptop_union_name=$test['union_name'] ;
		$laptop_ward_no=$test['laptop_ward_no'] ;
		$laptop_chcp_name=$test['laptop_chcp_name'] ;
		$laptop_chcp_mobile_no=$test['laptop_chcp_mobile_no'] ;
		//$laptop_elect_source=$test['laptop_elect_source'] ;
		$laptop_electricity_source_value=$test['laptop_electricity_source_value'] ;
		$laptop_imei_no = $test['laptop_imei_no'] ;
		$laptop_sim_no = $test['laptop_sim_no'] ;
		$laptop_serial_no= $test['laptop_serial_no'] ;
				

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
 


                <div class="row-fluid">

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span9">
                                <div class="row-fluid">
                                        <section class="utopia-widget">
										<form name="" method="post" action="" class="formular" id="form3">
										<table class="table">
										<tr>
										<td>
                                        Org Code 
										</td>
										<td colspan="2">
										<input type="text" readonly value="<?php echo $laptop_org_code;?>">
										</td>
										</tr>
										<tr>
										<td>
										Name of CC : 
										</td>
										<td colspan="2">
										<input type="text" readonly value="<?php echo $laptop_cc_name;?>">
										</td>
										</tr>
										<tr>
										<td>
										Union Name : 
										</td>
										<td colspan="2">
										<input type="text" name="laptop_union_name" readonly value="<?php echo $laptop_union_name;?>">
								        </td>
										</tr>
										<tr>
										<td>
										Ward No (New) : 
										</td>
										<td>
											<input type="text" readonly value="<?php echo $laptop_ward_no;?>">
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
										<input name="laptop_chcp_name" type="text" class="validate[required]" value="<?php echo $laptop_chcp_name;?>">
										</td>
										<td>
										IMEI No : <input name="laptop_imei_no" type="text" value="<?php echo $laptop_imei_no;?>">
										</td>
										</tr>
										<tr>
										<td>
										<label for="laptop_chcp_mobile_no">CHCP Mobile no : </label>
										</td>
										<td>
										<span style="padding-top:2px;">+88</span><input name="laptop_chcp_mobile_no" id="laptop_chcp_mobile_no" class="validate[required,custom[phone]]" value="<?php echo $laptop_chcp_mobile_no;?>">
									    </td>
										<td>
										SIM No : <input name="laptop_sim_no" type="text" value="<?php echo $laptop_sim_no;?>">
										</td>
										</tr>
										<tr>
										<td>
										Source of Electricity:
										</td>
										<td>
										
										<select name="laptop_electricity_source_value" id="laptop_electricity_source_value" class="validate[required]">
                                                    
                                                    <?php
                                                    $sql = "SELECT
                                                            lpda_source_of_electricity.electricity_source_code,
                                                            lpda_source_of_electricity.electricity_source_name
                                                        FROM
                                                            lpda_source_of_electricity
                                                        ORDER BY
                                                            lpda_source_of_electricity.electricity_source_name ASC";
                                                    $result = mysql_query($sql) or die(mysql_error() . "<br /><br />Code:<b>loadorg_type:1</b><br /><br /><b>Query:</b><br />___<br />$sql<br />");

                                                    while ($rows = mysql_fetch_assoc($result)) { ?>
													<option value="<?php echo $rows['electricity_source_code']; ?>" <?php if($rows['electricity_source_code']==$laptop_electricity_source_value){echo 'selected';}?>><?php echo $rows['electricity_source_name']; ?></option>
                                         <?php         
													 }
                                                    ?>
                                         </select>
										
										</td>
										<td>
										Laptop Serial#: <input name="laptop_serial_no" type="text" value="<?php echo $laptop_serial_no;?>">
										</td>
									
										</tr>
									
									
										<tr>
										<td colspan="2">
								
										<input type="submit" value="Submit" name="submit">
										</td>
										
									<td>
										&nbsp;
										</td>
										</tr>
										</table>
										
										</form>
<?php
if(isset($_POST['submit']))
{	
	//$laptop_org_code=$_POST['laptop_org_code'] ;
	//$laptop_cc_name=$_POST['laptop_cc_name'] ;
	//$laptop_union_name=$_POST['laptop_union_name'] ;
	//$laptop_ward_no=$_POST['laptop_ward_no'] ;
	//$laptop_chcp_name=$_POST['laptop_chcp_name'] ;
	//$laptop_chcp_mobile_no=$_POST['laptop_chcp_mobile_no'] ;
	//$laptop_elect_source=$_POST['laptop_elect_source'] ;
	$laptop_imei_no = $_POST['laptop_imei_no'] ;
	$laptop_sim_no = $_POST['laptop_sim_no'] ;
	$laptop_serial_no= $_POST['laptop_serial_no'] ;
	//$id=$_POST['id'] ;
	
	mysql_query("UPDATE lpda_laptop SET laptop_imei_no='$laptop_imei_no',laptop_sim_no='$laptop_sim_no',laptop_serial_no='$laptop_serial_no' WHERE id='$id'")
	or die(mysql_error()); 
	//echo "Saved!";
    print "<script>";
	print " self.location='addlaptopinfo.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}

?>
										
                                        </section>
										
										  <div class="span12">


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

					
</body>

<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:50:08 GMT -->
</html>
