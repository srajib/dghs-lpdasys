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
//print_r($rows );


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
										<form name="" method="post" action="addpdainfo.php">
										<table class="table">
										 <input name="pda_org_code" type="hidden" value="<?php echo $org_code; ?>">
										<tr>
										<td>
										Union Name : 
										</td>
										<td>
										<select name="pda_union_name">
										 <?php echo $upazila_id;
                         $union_row = mysql_query("SELECT lpda_union.union_name,lpda_union.old_upazila_id,lpda_union.old_union_id,lpda_union.union_bbs_code
FROM lpda_union WHERE lpda_union.old_upazila_id='".$upazila_id."' GROUP BY lpda_union.union_name");

   while ($rows = mysql_fetch_assoc($union_row)) {
	    echo "<option value=\"" . $rows['union_bbs_code'] . "\">" . $rows['union_name'] . "</option>";
                                            
	   }

                                                    ?>
										</select>
										if not found , please select nearby union
										</td>
										</tr>
										<tr>
										<td>
										Ward No.(Old) : 
										</td>
										<td>
										<select name="pda_ward_no">
											<option value="Ward No-1">Ward No-1</option>
											<option value="Ward No-2">Ward No-2</option>
											<option value="Ward No-3">Ward No-3</option>
										</select>
										</td>
										</tr>
										<tr>
										<td>
										Designation : 
										</td>
										<td>
										<select name="pda_person_type">
										<option value="Health Assistant">
										Health Assistant(HA)
										</option>
										<option value="Health Inspector">
										Health Inspector(HI)
										</option>
										<option value="Assistant Health Inspector">
										Assistant Health Inspector(AHI)
										</option>
										</select>
										</td>
										</tr>
										<tr>
										<td>
										Name : 
										</td>
										<td>
										<input name="pda_person_name" type="text">
										</td>
										</tr>
										<tr>
										<td>
										Mobile no : 
										</td>
										<td>
										+88<input name="pda_person_mobile_no" type="text">
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
										  <input name="pda_updated_datetime" type="hidden" value="<?php echo date('Y-m-d h:m:i');  ?>">
										   <input name="pda_updated_by" type="hidden" value="<?php echo $org_name; ?>">
										  
										   <input name="pda_active" type="hidden" value="1">
										<input type="submit" value="Submit" name="submit">
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
                                                        <th>Sl</th>
                                                        <th>Union BBS Code</th>
                                                        <th>Ward no</th>
														<th>Person Type</th>
														<th>Name of the person</th>
														<th>Mobile No.</th>
														<th>IMEI No.(PDA)</th>
														<th>SIM No.</th>
                                                    </tr>
                                                    </thead>
												
                                                    <tbody>
													<?php
													
													$pdainfo=mysql_query("SELECT pda.id,pda.pda_org_code,u.union_name,pda.pda_ward_no,pda.pda_person_type,pda.pda_person_name,pda.pda_person_mobile_no,pda.pda_imei_no,pda.pda_sim_no
FROM lpda_pda AS pda INNER JOIN lpda_union AS u ON u.union_bbs_code = pda.pda_union_name WHERE pda.pda_upazila_id=u.old_upazila_id AND pda.pda_org_code='".$org_code."' GROUP BY pda.pda_org_code");
													$i=1;
												    while($pdainfos = mysql_fetch_array($pdainfo))
														{  ?>
                                                     <tr>
                                                       
                                                        <td><?php echo $pdainfos['id'];?></td>
                                                        <td><?php echo $pdainfos['union_name'];?></td>
                                                        <td><?php echo $pdainfos['pda_ward_no'];?></td>
														<td><?php echo $pdainfos['pda_person_type'];?></td>
														<td><?php echo $pdainfos['pda_person_name'];?></td>
														<td><?php echo $pdainfos['pda_person_mobile_no'];?></td>
														<td><?php echo $pdainfos['pda_imei_no'];?></td>
														<td><?php echo $pdainfos['pda_sim_no'];?></td>
                                                    </tr>

                                                   <?php } ?>
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
                    url: 'get/get_cc_list.php',
                    data: {org_code: org_code},
                    dataType: 'json',
                    success: function(data)
                    {
                       // $("#loading_content").hide();
                        var laptop_cc_name = document.getElementById('laptop_cc_name');
                        laptop_cc_name.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            laptop_cc_name.options.add(new Option(d.text, d.value));
                        }
                    }
                });
            });

		$('#laptop_electricity_source_value').change(function() {
										  var elec_source = $('#laptop_electricity_source_value').find('option:selected').text();
											$("#laptop_elect_source").val(elec_source);
										 });
			
        $( "#utopia-dashboard-datepicker" ).datepicker().css({marginBottom:'20px'});

        jQuery("#validation").validationEngine();
        $("#phone").mask("(999) 9999999999");
        $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true});

        $.simpleWeather({
            zipcode: '10001',
            unit: 'f',
            success: function(weather) {
                html = '<h2>'+weather.city+', '+weather.region+'</h2>';
                html += '<img style="float:left" width="125px " src="'+weather.image+'">';
                html += '<p>'+weather.temp+'&deg; '+weather.units.temp+'<br /><span>'+weather.currently+'</span></p>';
                html += '<a href="'+weather.link+'">View Forecast &raquo;</a>';

                $("#utopia-dashboard-weather").css({marginBottom:'20px'}).html(html);
            },
            error: function(error) {
                $("#utopia-dashboard-weather").html('<p>'+error+'</p>');
            }
        });
        
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
					$sql="INSERT INTO lpda_pda($str_k) values ($str_v)";
					mysql_query($sql);
					echo "your data inserted succssfully into our system";
					print "<script>";
					print " self.location=pdainfo.php'"; // Comment this line if you don't want to redirect
					print "</script>";
	}
	?>
					
</body>

<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:50:08 GMT -->
</html>
