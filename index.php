<?php
session_start();
if(!empty($_SESSION['loginid']))
{
	    if($_SESSION['loginid'] == 2 )
		{
			print "<script>";
			print " self.location='admin.php'"; // Comment this line if you don't want to redirect
			print "</script>";
		}
		else
		{
			print "<script>";
			print " self.location='dashboard.php'"; // Comment this line if you don't want to redirect
			print "</script>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>:DGHS:MIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A complete admin panel theme">
    <meta name="author" content="theemio">

    <!-- styles -->
    <link href="css/utopia-white.css" rel="stylesheet">
    <link href="css/utopia-responsive.css" rel="stylesheet">
    <link href="css/validationEngine.jquery.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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

</head>

<body>
<?php
require_once 'include/db_connection.php'; 
extract($_POST);
$uname = preg_replace('/\s+/', '', $username);
$pass2 = preg_replace('/\s+/', '', $password);
$pass = md5($pass2);

if(isset($_POST['submit']))
{
	$signin = mysql_query("SELECT * FROM lpda_user WHERE username='$uname' AND password='$pass'");
	$row = mysql_fetch_assoc($signin);
	$rowsign = mysql_num_rows($signin);
	if($rowsign > 0)
	{
	$msg = '<font color="#009900"><b>Login Successful. Redirecting, please wait.</b></font>';
	$_SESSION['loginid'] = $row['user_id'];
	$_SESSION['org'] = $row['organization_id'];
	$_SESSION['org_code'] = $row['org_code'];
    $_SESSION['username'] = $row['username'];
	
		/*$ip = $_SERVER['REMOTE_ADDR'];
		$login = time();*/
		if($_SESSION['loginid'] == 2 || $_SESSION['loginid'] == 1)
		{
			echo "<meta http-equiv='refresh' content='2; url=admin.php'>";
		}else{
			echo "<meta http-equiv='refresh' content='2; url=dashboard.php'>";
		}
			
	}
	else
	{
		$msg = '<font color="#FF0000"><b>Login Failed. Check your ID & Password</b></font>';
	}
}
?>
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
            <div class="utopia-login-message">
                <h1>Welcome to Laptop/PDA Distribution System</h1>
                <p>Sign in to get access
				 <?php echo $msg; ?>
				</p>
            </div>
        </div>
    </div>

    <div class="row-fluid">

        <div class="span12">

            <div class="row-fluid">

                <div class="span6">
                    <div class="utopia-login-info">
                      <img src="img/login.png" alt="image">
                    </div>

                </div>

                <div class="span6">
                    <div class="utopia-login">
                        <h1>Login</h1>
                        <form action="./" method="post" class="utopia">
                            <label>Username:</label>
                            <input type="text" value="Admin" id="username" name="username" class="span12 utopia-fluid-input validate[required]">

                            <label>Password:</label>
                            <input type="password"  id="password" name="password" class="span12 utopia-fluid-input validate[required]" value="Password">

                            <ul class="utopia-login-action">
                                <li>
                                    <input type="submit" name="submit" class="btn span4" value="Login">
                                    <div class="pull-right"><input type="checkbox"> Remember me!</div>
                                </li>
                            </ul>

                            <label><a href="#">Can't access your account?</a></label>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div> <!-- end of container -->

<!-- javascript placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/utopia.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-en.js"></script>
<script type="text/javascript">
    jQuery(function(){
        jQuery(".utopia").validationEngine('attach', {promptPosition : "topLeft", scroll: false});
    })
</script>
</body>

<!-- Mirrored from utopiaadmin.themio.net/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 27 Aug 2013 05:50:58 GMT -->
</html>
