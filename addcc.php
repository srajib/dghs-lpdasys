<?php session_start();
//error_reporting(0);
require_once 'include/db_connection.php'; 
if(empty($_SESSION['loginid']))
{
	print "<script>";
	print " self.location='index.php'"; // Comment this line if you don't want to redirect
	print "</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

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
                    <span style="font-size:24px;font-weight:bold;">Laptop/PDA Distribution System</span>
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
						<ul>
                          <li class="current"><a class="dashboard smronju" href="dashboard.php" title="Dashboard"><span>Dashboard</span></a></li>
                        <li><a class="elements" href="laptopinfo.php" title="Tables"><span>Laptop Info</span></a>
                        </li>
						 <li><a class="elements" href="pdainfo.php" title="Tables"><span>PDA Info</span></a>
                        </li>
                        <li><a class="tables" href="allcc.php" title="Typography"><span>Community Clinic </span></a></li>
                     
                          
                        </li>
                    </ul>
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
										<table class="table">
										Name of CC : <input name="org_name" type="text"><br>
										Union Name : <input name="union_name" type="text"><br>
										Ward No (New) : <input name="ward_no" type="text"><br>
										CHCP Name : <input name="chcp_names" type="text"><br>
										CHCP Mobile no : <input name="contact_no" type="text"><br>
										Source of Electricity:
										<select name="laptop_electricity_source_value">
										</select><br>
										
										
                                <div class="control-group">
                                    <label class="control-label" for="org_type">Organization Type</label>
                                    <div class="controls">
                                        <select id="org_type" name="org_type">
                                            <option value="0">-- Select form the list --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="agency_code">Agency Name</label>
                                    <div class="controls">
                                        <select id="agency_code" name="agency_code" >
                                            <option value="0">-- Select form the list --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="new_established_year">Year established</label>
                                    <div class="controls">
                                        <input type="text" id="new_established_year" name="new_established_year" placeholder="Enter the Year" > 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="org_location_type">Urban/Rural Location</label>
                                    <div class="controls">
                                        <select id="org_location_type" name="org_location_type" >
                                            <option value="0">-- Select form the list --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="admin_division">Division Name</label>
                                    <div class="controls">
                                        <select id="admin_division" name="admin_division" >
                                            <option value="0">Select Division</option>
                                            <?php
                                            /**
                                             * @todo change old_visision_id to division_bbs_code
                                             */
                                            $sql = "SELECT lpda_division.division_name, lpda_division.old_division_id FROM lpda_division";
                                            $result = mysql_query($sql) or die(mysql_error() . "<br /><br />Code:<b>loadDivision:1</b><br /><br /><b>Query:</b><br />___<br />$sql<br />");

                                            while ($rows = mysql_fetch_assoc($result)) {
                                                echo "<option value=\"" . $rows['old_division_id'] . "\">" . $rows['division_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="admin_district">District Name</label>
                                    <div class="controls">
                                        <select id="admin_district" name="admin_district">
                                            <option value="0">Select District</option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="admin_upazila">Upazila Name</label>
                                    <div class="controls">
                                        <select id="admin_upazila" name="admin_upazila" >
                                            <option value="0">Select Upazila</option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="new_ownarship_info">Ownership Information</label>
                                    <div class="controls">
                                        <select id="new_ownarship_info" name="new_ownarship_info" required>
                                            <option value="0">Select Ownership </option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="org_organizational_functions_code">Organization Function</label>
                                    <div class="controls">
                                        <select id="org_organizational_functions_code" name="org_organizational_functions_code" required>
                                            <option value="0">Select Function </option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="org_level_code">Organization Level</label>
                                    <div class="controls">
                                        <select id="org_level_code" name="org_level_code" required>
                                            <option value="0">Select Level </option>                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="new_org_email">Email Address</label>
                                    <div class="controls">
                                        <input type="text" id="new_org_email" name="new_org_email" placeholder="Organization Email Address"> 
                                    </div>
                                </div>
                                <input type="hidden" id="new_post_type" name="new_post_type" value="org" /> 
                                <div class="control-group">
                                    <div class="controls">                                            
                                        <button type="submit" class="btn btn-large btn-info">Add New Organization</button>
                                    </div>
                                </div>
                            </form>
										
										
										
										</table>
                                        </section>

                                   

                                </div>

								
								<!--
                                <div class="row-fluid">
                                    <div class="span12">

                                        <section class="utopia-widget">
                                            <div class="utopia-widget-title">
                                                <img src="img/icons/satellite.png" class="utopia-widget-icon">
                                                <span>maps with route directions</span>
                                            </div>

                                            <div class="utopia-widget-content">
                                                <div class="utopia-map-wrapper">
                                                    <div id="utopia-google-map-5" class="utopia-map"></div>
                                                    <div class="utopia-map-details">
                                                        <div class="utopia-map-description">
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et tempus elit.
                                                                Duis pharetra blandit risus, a condimentum ipsum ultricies nec. Integer accumsan
                                                                neque nec augue dictum sit amet dignissim tortor scelerisque.
                                                            </p>
                                                        </div>
                                                        <div class="utopia-map-action">
                                                            <img src="img/icons2/sun.png"/>
                                                            <img src="img/icons2/world.png"/>
                                                            <img src="img/icons2/cloud.png"/>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                </div>
                              -->

                                <!-- image gallery  Starts-->

                               
                                <!-- image gallery  ends-->


                            </div><!-- Mid panel -->
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
<!--
                    <div class="span6">

                        <section class="utopia-widget">
                            <div class="utopia-widget-title">
                                <img src="img/icons/font_size.png" class="utopia-widget-icon">
                                <span>contact form</span>
                            </div>

                            <div class="utopia-widget-content utopia-chosen-form">
                                <form id="validation" action="javascript:void(0)" class="utopia-form-freeSpace form-horizontal">
                                    <fieldset>
                                        <div class="control-group">
                                            <label class="control-label" for="input01">Title*:</label>

                                            <div class="controls">
                                                <input id="input01" class="input-fluid validate[required]" type="text" value="">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputError"> Contact email*:</label>

                                            <div class="controls">
                                                <input id="inputError" class="input-fluid validate[required,custom[email]]" type="text" value="jon.com"><br>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="phone">Contact phone*:</label>

                                            <div class="controls">
                                                <input id="phone" class="input-fluid  validate[required, custom[phone]]" type="text" value=""><br/>
                                                <span class="help-inline">Must be (xxx) xxxxxxxxxx</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="select02">Category:</label>

                                            <div class="controls sample-form-chosen">
                                                <select id="select02" data-placeholder="Select your category" style="width:82.5%;" class="chzn-select-deselect" tabindex="7">
                                                    <option value=""></option>
                                                    <option value="Zimbabwe">Mac</option>
                                                    <option value="Zimbabwe">Linux</option>
                                                    <option value="Zimbabwe">Debian</option>
                                                    <option value="Zimbabwe">Ubuntu</option>
                                                    <option value="Zimbabwe">Gnome 3</option>
                                                    <option value="Zimbabwe">Windows</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="input" >Message:</label>

                                            <div class="controls utopia-dashbord-cleditor">
                                                <textarea id="input" class="input-fluid" name="input"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </section>

                    </div>-->

<!--
                    <div class="span6">
                        <section class="utopia-widget">
                            <div class="utopia-widget-title">
                                <img src="img/icons/pyramid.png" class="utopia-widget-icon">
                                <span>activity</span>
                            </div>

                            <div class="utopia-widget-content">

                                <div class="utopia-activity-feeds">
                                    <ul>
                                        <li>
                                            <div class="text">
                                                <p><span class="label label-success">smronju</span> Posted on tumblr blog.</p>
                                            </div>

                                            <div class="info">
                                                <span>Type:</span> <a class="tooltipA" href="#" data-original-title="visit smronju's blog" rel="tooltip">blog</a>
                                                <span>Status:</span> <a class="tooltipA" href="#" data-original-title="anyone can view" rel="tooltip">open</a>
                                                <span class="date">May, 25 2012 2:00pm</span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="text">
                                                <p><span class="label">hasinhayder</span> Commented on smronju's blog post.</p>
                                            </div>

                                            <div class="info">
                                                <span>Type:</span> <a class="tooltipA" href="#" data-original-title="visit smronju's blog" rel="tooltip">blog</a>
                                                <span>Status:</span> <a class="tooltipA" href="#" data-original-title="anyone can view" rel="tooltip">open</a>
                                                <span class="date">May, 25 2012 2:00pm</span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="text">
                                                <p><span class="label label-info">smronju</span> Updated his blog post.</p>
                                            </div>

                                            <div class="info">
                                                <span>Type:</span> <a class="tooltipA" href="#" data-original-title="visit smronju's blog" rel="tooltip">blog</a>
                                                <span>Status:</span> <a class="tooltipA" href="#" data-original-title="anyone can view" rel="tooltip">open</a>
                                                <span class="date">May, 25 2012 2:00pm</span>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="text">
                                                <p><span class="label">hasinhayder</span> Replied on smronju's blog post comment.</p>
                                            </div>

                                            <div class="info">
                                                <span>Type:</span> <a class="tooltipA" href="#" data-original-title="visit smronju's blog" rel="tooltip">blog</a>
                                                <span>Status:</span> <a class="tooltipA" href="#" data-original-title="anyone can view" rel="tooltip">open</a>
                                                <span class="date">May, 25 2012 2:00pm</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>-->
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
/////////////////////////////////////////// end of previous script //////

            $.ajax({
                url: 'get/get_agency_code.php',
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    $.each(data, function(k, v) {
                        $('#agency_code')
                                .append($("<option></option>")
                                .attr("value", v.value)
                                .text(v.text));
                    });
                }
            });

            $.ajax({
                url: 'get/get_org_location_type.php',
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    $.each(data, function(k, v) {
                        $('#org_location_type')
                                .append($("<option></option>")
                                .attr("value", v.value)
                                .text(v.text));
                    });
                }
            });

            $.ajax({
                url: 'get/get_org_ownership.php',
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    $.each(data, function(k, v) {
                        $('#new_ownarship_info')
                                .append($("<option></option>")
                                .attr("value", v.value)
                                .text(v.text));
                    });
                }
            });
            
            //org_type
            $.ajax({
                url: 'get/get_org_type_name.php',
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    $.each(data, function(k, v) {
                        $('#org_type')
                                .append($("<option></option>")
                                .attr("value", v.value)
                                .text(v.text));
                    });
                }
            });
            
            //org_organizational_functions_code
            $.ajax({
                url: 'get/get_org_function_code.php',
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    $.each(data, function(k, v) {
                        $('#org_organizational_functions_code')
                                .append($("<option></option>")
                                .attr("value", v.value)
                                .text(v.text));
                    });
                }
            });
            
            //get_org_level_code
            $.ajax({
                url: 'get/get_org_level_code.php',
                type: 'get',
                dataType: 'json',
                success: function(data)
                {
                    $.each(data, function(k, v) {
                        $('#org_level_code')
                                .append($("<option></option>")
                                .attr("value", v.value)
                                .text(v.text));
                    });
                }
            });

            $("#new_user_type").change(function() {
                var selectedType = $("#new_user_type").val();
                if (selectedType === "4") {
                    $("#new_admin_org_code").hide();
                    $("#org_select_block").slideDown();
                }
                else if (selectedType === "3") {
                    $("#org_select_block").hide();
                    $("#new_admin_org_code").slideDown();
                }
            });
            // load district
            $('#admin_division').change(function() {
                $("#loading_content").show();
                var div_id = $('#admin_division').val();
                $.ajax({
                    type: "POST",
                    url: 'get/get_district_list.php',
                    data: {div_id: div_id},
                    dataType: 'json',
                    success: function(data)
                    {
                        $("#loading_content").hide();
                        var admin_district = document.getElementById('admin_district');
                        admin_district.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            admin_district.options.add(new Option(d.text, d.value));
                        }
                    }
                });
            });

            // load upazila
            $('#admin_district').change(function() {
                var dis_id = $('#admin_district').val();
                $("#loading_content").show();
                $.ajax({
                    type: "POST",
                    url: 'get/get_upazila_list.php',
                    data: {dis_id: dis_id},
                    dataType: 'json',
                    success: function(data)
                    {
                        $("#loading_content").hide();
                        var admin_upazila = document.getElementById('admin_upazila');
                        admin_upazila.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            admin_upazila.options.add(new Option(d.text, d.value));
                        }
                    }
                });
            });

            // load organization 
            $('#org_type').change(function() {
                $("#loading_content").show();
                var div_id = $('#admin_division').val();
                var dis_id = $('#admin_district').val();
                var upa_id = $('#admin_upazila').val();
                var agency_code = $('#org_agency').val();
                var org_type_code = $('#org_type').val();
                $.ajax({
                    type: "POST",
                    url: 'get/get_organization_list.php',
                    data: {
                        div_id: div_id,
                        dis_id: dis_id,
                        upa_id: upa_id,
                        agency_code: agency_code,
                        org_type_code: org_type_code
                    },
                    dataType: 'json',
                    success: function(data)
                    {
                        $("#loading_content").hide();
                        var org_list = document.getElementById('org_list');
                        org_list.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            var d = data[i];
                            org_list.options.add(new Option(d.text, d.value));
                        }
                    }
                });
            });
        </script>
</body>

<!-- Mirrored from utopiaadmin.themio.net/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:50:08 GMT -->
</html>
