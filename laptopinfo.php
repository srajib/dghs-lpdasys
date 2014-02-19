<?php session_start(); 
error_reporting(E_ALL);
ini_set('display_errors','On');
?>
<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'include/db_connection.php'; 
//include('include/inc.functions.generic.php');
if(empty($_SESSION['loginid']))
{
	print "<script>";
	print " self.location='index.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}


$org_code = $_SESSION['org_code'] ;

$org = mysql_query("SELECT organization.org_code,organization.org_name,organization.upazila_thana_code,organization.district_code
FROM organization where organization.org_code='".$org_code."'");
	
$rows = mysql_fetch_assoc($org);
$upazila_code=$rows['upazila_thana_code'];
$district_code=$rows['district_code'];
$org_name=$rows['org_name'];
?>
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
                    <span style="font-size:24px;font-weight:bold;">Laptop/PDA Distribution System
					 - <?php echo $org_name;?>
					</span>
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

                                    <div class="span12">

                                        <section class="utopia-widget">
                                            <div class="utopia-widget-title">
                                                <img src="img/icons/paragraph_justify.png" class="utopia-widget-icon">
                                                <span>CC Informtion who received laptop &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="laptopprint.php">Print</a></span>
                                            </div>

                                            <div class="utopia-widget-content">

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
													List of CC who filled up CHCP data into HRM
													</th>
													</tr>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>CC Name</th>
														<th>CHCP Name</th>
														<th>CHCP Mobile No.</th>
														<th>Source of Electricity</th>
                                                    </tr>
                                                    </thead>
												
                                                    <tbody>
													<?php
													
												    $lapinfo=mysql_query("SELECT * FROM organization where org_type_code='1039' AND upazila_thana_code='$upazila_code' AND district_code='$district_code'");
													
													$i=1;
												    while($lapinfos= mysql_fetch_array($lapinfo))
														{  
												        ?>
                                                     <tr>
														<?php 
                                                        $cc_org_code=$lapinfos['org_code'];
                                                        $cc_electrictiy_source=$lapinfos['source_of_electricity_main_code'];
                                                       
                                                        if ( $cc_electrictiy_source) {
                                                            $elect_source = mysql_query("SELECT org_source_of_electricity_main.electricity_source_code,org_source_of_electricity_main.electricity_source_name
                                                            FROM org_source_of_electricity_main where org_source_of_electricity_main.electricity_source_code='" . $cc_electrictiy_source . "'");
                                                            $source_of_electricityrows = mysql_fetch_assoc($elect_source);
                                                            $electricity_source = $source_of_electricityrows['electricity_source_name'];
                                                            } else {
                                                              $electricity_source = 'N/A';
                                                            }
                                                             
														if($cc_org_code){ 
														$cc_staff = mysql_query("SELECT old_tbl_staff_organization.staff_name,old_tbl_staff_organization.contact_no FROM old_tbl_staff_organization
														LEFT JOIN total_manpower_imported_sanctioned_post_copy as total_manpower ON total_manpower.id=old_tbl_staff_organization.sanctioned_post_id 
														where old_tbl_staff_organization.org_code='$cc_org_code' AND total_manpower.designation_code='11960'");

														$cc_staff_rows = mysql_fetch_assoc($cc_staff);
														$staff_name=$cc_staff_rows['staff_name'];
														$contact_no =$cc_staff_rows['contact_no'];
														}
                                                        
                                                        if($staff_name){
														?>
                                                        <td><?php echo $i++;?></td>
                                                        <td><a href="addlaptopinfo.php?org_code=<?php echo $lapinfos['org_code'];?>"><?php echo $lapinfos['org_name'];?></a></td>
														<td><?php if($staff_name){echo $staff_name;}else echo 'N/A';?></td>
														<td><?php  if($contact_no){echo $contact_no;}else echo 'N/A';?></td>
                                                        <td> <?php if($electricity_source){ echo $electricity_source; } else { echo 'N/A';}?></td>
                                                        <?php } ?>
                                                    </tr>
                                                   <?php } ?>
                                                    </tbody>
                                                </table>
												
<!--
                            <div class="span3">

                                <div class="row-fluid">

                                    <div class="span12">

                                        <div class="utopia-chart-legend">
                                            <div class="utopia-chart-sparkline" id="utopia-sparkline-type1">
                                            </div>
                                            <div class="utopia-chart-heading">LINE</div>
                                            <div class="utopia-chart-desc">SPARKLINE</div>
                                        </div>
                                    </div>

                                </div>

                               

                             

                            </div><!-- Right panel -->

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


        /* maps with route directions */
        $("#utopia-google-map-5").gmap3(
            { action:'getRoute',
                options:{
                    origin:'48 Pirrama Road, Pyrmont NSW',
                    destination:'Bondi Beach, NSW',
                    travelMode:google.maps.DirectionsTravelMode.DRIVING
                },
                callback:function (results) {
                    if (!results) return;
                    $(this).gmap3(
                        { action:'init',
                            zoom:13,
                            mapTypeId:google.maps.MapTypeId.ROADMAP,
                            streetViewControl:true,
                            center:[-33.879, 151.235]
                        },
                        { action:'addDirectionsRenderer',
                            options:{
                                preserveViewport:true,
                                draggable:false,
                                directions:results
                            }
                        }
                    );
                }
            }
        );
        /* maps with route directions end */
        
    });

    
    $("#utopia-sparkline-type1").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 9], {type:"line", height:48, width:140});

    $('.utopia-activity-feeds').vTicker({
        speed: 500,
        pause: 3000,
        animation: 'fade',
        height: 335,
        mousePause: true,
        showItems: 4
    });


    
</script>
</body>


<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:50:08 GMT -->
</html>