<?php
error_reporting (E_ALL ^ E_NOTICE);


?>
<!--
####################################################################
# Forgot Password
####################################################################
# By Travis Harley
####################################################################
# www.travisharley.com
####################################################################
# SETTINGS START
####################################################################
<!-- Copyright Jetset Magazine 2013 --
  -- www.JetsetMag.com --
  -- -- -- -- -- -- -- --
  -- Prepared By Travis Harley --
  -- September/October, 2013 --
  -- www.travisharley.com 
Jetset Magazine | The Affluent Lifestyle Magazine
www.jetsetmag.com
-->
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
    version="XHTML+RDFa 1.1"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.w3.org/1999/xhtml
    http://www.w3.org/MarkUp/SCHEMA/xhtml-rdfa-2.xsd"
    lang="en-US"
    xml:lang="en-US"
    dir="ltr"
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"
>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="msvalidate.01" content="BE6B07CFCAE9A97DCFB0D7B999231CCF" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="PICS-Label" content='(PICS-1.1 "http://www.classify.org/safesurf/" L gen true for "http://www.jetsetmag.com" r (SS~~000 1))' />
<link rel="shortcut icon" href="http://www.jetsetmag.com/favicon.ico" />
<link rel="icon" type="image/gif" href="http://www.jetsetmag.com/j.gif" />
<link rel="stylesheet" type="text/css" href="index.css" />
<link href="login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="forms/handheld.css" media="only screen and (max-device width:480px)"/>
<title>Forgot Password - Jetset</title>
<script src="forms/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<meta name="description" content="Private Jet Magazine, Jetset Magazine is a luxury magazine which caters exclusively to the wealthiest demographic in the world. Readers include private jet owners, luxury yacht owners, professional athletes, A-list celebrities, Fortune 500 business owners, CEOs, entrepreneurs and politicians." />
<meta name="keywords" content="private jet magazine, jetset magazine, luxury magazines, jetsetter, jetset, luxury lifestyle magazine, affluent magazine, wealthy magazine, jetset mag, affluent lifestyle," />

<meta property="og:title" content="Jetset Magazine" />
<meta property="og:description" content="Jetset Magazine is a luxury lifestyle magazine which caters exclusively to the wealthiest demographic in the world. Our readers include private jet owners and jetsetters, luxury yacht owners, professional athletes, A-list celebrities, Fortune 500 business owners, CEOs, entrepreneurs and politicians." />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.jetsetmag.com" />
<meta property="og:image" content="http://www.jetsetmag.com/images/logo500.jpg" />

<style>
#table {
padding-top: 22px;
margin-left: 255px;
}
input[type="submit"] {
padding: 7px;
width: 145px;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="forms/nagging-menu.js" charset="utf-8"></script>
<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
//<![CDATA[
$(function () {

  var msie6 = $.browser == 'msie' && $.browser.version < 7;
  if (!msie6) {
    var top = $('#box').offset().top;
    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) { $('#box').addClass('fixed_index'); }
	  else { $('#box').removeClass('fixed_index'); } 
    });
  }
});
//]]>
</script>

</head>
<body>

<!-- Header-->

<div class="wrap" style="min-height:1100px;"><!-- Start Wrap -->       

<a href="http://jetsetmag.com"><p style="text-align:center; font-size:18px; font-weight:bold; padding-left:10px; padding-right:10px; padding-top:10px;"><img src="images/jetset-register.png" style="border:none;" /></p></a>

<h3>Forgot Password</h3>
<p style="text-align:center; padding-left:10px; padding-right:10px; width:850px; margin-left:25px; margin-right:25px;">Fill out the form below to reset your password.</p>

	<?php
    //make sure that nobody is logged in
	if (!$username && !$userid){
	
		if($_POST['resetbtn']){
			//get form data
			$user = $_POST['user'];
			$email = $_POST['email'];
			
			//make sure info provided
			if($user){
				//check for email
				if ($email){
					//check for valid email addres
					if( (strlen($email) > 7) && (strstr($email, "@")) && (strstr($email, ".")) ){
						//connect to database
						require("connect.php");
						
						//check database for username
						$query = mysql_query("SELECT * FROM users WHERE username='$user'");
						//determine how many rows have been returned from our query
						$numrows = mysql_num_rows($query);
						if ($numrows == 1){
							
							//get info out of database
							$row = mysql_fetch_assoc($query);
							
							//get info out of the array. get the email ouyt of the database.
							$dbemail = $row['email'];
							
							//make sure the email is correct
							if($email == $dbemail){
								//generate password
								$pass = rand();
								$pass = md5($pass);
								//shorten password
								$pass = substr($pass, 0, 15);
								//encrypt password
								$password = md5(md5("wReit45".$pass."45TFdd"));
								
								//update db with new password
								mysql_query("UPDATE users SET password='$password' WHERE username='$user'");
								
								//make sure password was changed
								$query = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$password'");
								//make sure it reset
								$numrows = mysql_num_rows($query);
								if($numrows == 1){
									//create email if it reset
									$webmaster = "digital@jetsetmag.com";
									$headers = "From: Jetset Magazine<$webmaster>";
									$subject = "Your new password";
									$message = "Your password has been reset. Your new password is found below. If you didn't request a new password, please contact us. \n \n";
									$message .= "Password: $pass \n"; 
									//check if email actually was sent
									if( mail($email, $subject, $message, $headers) ){
										echo "<span style='color:red;'>Your password has been reset. An email has been sent with your new password. <br /> Click <a href='http://www.jetsetmag.com'>here</a> to log in</span>";
										
									}
									else
										echo "an error has occured and your email was not sent with your new password.";
									
									
								}
								else
									echo "An error has occured and the password was not reset.";
								
							}
							else
								echo "You have entered the wrong email address.";
							
						}
						else
							echo "The username was not found.";
					
						
						mysql_close();
					
					}
					else
						echo "Please enter a vaild email address.";
				}
				else
					echo "Pleae enter your email.";
			}
			else
				echo "Please enter your username.";
			
		}
		
		echo "<form action='forgotpass.php' method='post'>
			<div id='table'>
			<table>
				<tr>
					<td>Username:</td>
					<td><input type='text' name='user' /></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type='text' name='email' /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type='submit' name='resetbtn' value='Reset Password' /></td>
				</tr>
			</table>
		</div>
		</form>";
		
	}
	else
		echo "Please logout to view this page.";
		
	
	?>


<!-- Floating Menu (Needed To Display The Top Banner)-->
<div id="box">
</div><!-- END Floating Menu -->

</div><!-- End Wrap -->

<!--Footer-->
<?php include("http://www.jetsetmag.com/footer.html"); ?>

<!-- Google Analytics -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24793550-2']);
  _gaq.push(['_setDomainName', 'jetsetmag.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- End Google Analytics -->

</body></html>