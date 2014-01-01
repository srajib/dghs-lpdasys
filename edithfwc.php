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

$result = mysql_query("SELECT lpda.id,lpda.laptop_org_code,lpda.laptop_hfwc_name,lpda.laptop_electricity_source_value,u.union_name,lpda.laptop_ward_no,lpda.laptop_contact_person,lpda.laptop_contact_person_mobile,lpda.laptop_imei_no,lpda.laptop_sim_no,laptop_serial_no FROM lpda_laptop_hfwc AS lpda INNER JOIN lpda_union AS u ON u.union_bbs_code = lpda.laptop_union_name WHERE lpda.laptop_upazila_id=u.old_upazila_id AND lpda.id='$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		$laptop_org_code=$test['laptop_org_code'] ;
		$laptop_hfwc_name=$test['laptop_hfwc_name'] ;
		$laptop_union_name=$test['union_name'] ;
		$laptop_ward_no=$test['laptop_ward_no'] ;
		$laptop_contact_person=$test['laptop_contact_person'] ;
		$laptop_contact_person_mobile=$test['laptop_contact_person_mobile'] ;
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
										<form name="" method="post" action="edithfwc.php" class="formular" id="form3">
										<table class="table">
										<tr>
										<td>
                                        Org Code 
										</td>
										<td colspan="2">
										<input type="text" value="<?php echo $laptop_org_code;?>" readonly>	
										</td>
										</tr>
										<tr>
										<td>
										Name of HFWC : 
										</td>
										<td colspan="2">
										<input type="text" value="<?php echo $laptop_hfwc_name;?>" readonly>	
										
										</td>
										</tr>
										<tr>
										<td>
										Union Name : 
										</td>
										<td colspan="2">
										<input type="text" value="<?php echo $laptop_union_name;?>" readonly>	
										
										if not found , please select nearby union
										</td>
										</tr>
										<tr>
										<td>
										Ward No (New) : 
										</td>
										<td>
										<input type="text" value="<?php echo $laptop_ward_no;?>" readonly>	
										
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
										<input name="laptop_contact_person" type="text" class="validate[required]" value="<?php echo $laptop_contact_person ?>">
										</td>
										<td>
										IMEI No :<input type="text" value="<?php echo $laptop_imei_no;?>" name="laptop_imei_no">	
										
										</td>
										</tr>
										<tr>
										<td>
										<label for="laptop_contact_person_mobile">Contact Person Mobile: </label>
										</td>
										<td>
										<span style="padding-top:2px;">+88</span><input name="laptop_contact_person_mobile" id="laptop_contact_person_mobile" class="validate[required,custom[phone]]" value="<?php echo $laptop_contact_person_mobile;?>">
									    </td>
										<td>
										SIM No : 
										<input type="text" name="laptop_sim_no" id="laptop_sim_no" value="<?php echo $laptop_sim_no;?>" >	
										
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
										<input name="laptop_elect_source" type="hidden" value="" id="laptop_elect_source">
										
										</td>
										<td>
										Laptop Serial#: 
										
										<input type="text" name="laptop_serial_no" id="laptop_serial_no" value="<?php echo $laptop_serial_no;?>" >	
										
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
                        var laptop_usc_name = document.getElementById('laptop_hfwc_name');
                        laptop_usc_name.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            laptop_usc_name.options.add(new Option(d.text, d.value));
                        }
                    }
                });
            });

		$('#laptop_electricity_source_value').change(function() {
										  var elec_source = $('#laptop_electricity_source_value').find('option:selected').text();
											$("#laptop_elect_source").val(elec_source);
										 });
	
        jQuery("#validation").validationEngine();
      
 
        
    });

</script>
<?php
if(isset($_POST['submit']))
{	
	$laptop_imei_no = $_POST['laptop_imei_no'] ;
	$laptop_sim_no = $_POST['laptop_sim_no'] ;
	$laptop_serial_no= $_POST['laptop_serial_no'] ;
	
	mysql_query("UPDATE lpda_laptop_hfwc SET laptop_imei_no='$laptop_imei_no',laptop_sim_no='$laptop_sim_no',laptop_serial_no='$laptop_serial_no' WHERE id='$id'")
	or die(mysql_error()); 
	//echo "Saved!";
    print "<script>";
	print " self.location='addhfwclaptopinfo.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}

?>			
</body>
</html>
