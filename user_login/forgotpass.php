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
<!-- Copyright 
  -- www.travisharley.com --
  -- -- -- -- -- -- -- --
  -- Prepared By Travis Harley --
  -- September/October, 2013 --
  -- www.travisharley.com 
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

<a href="#"><p style="text-align:center; font-size:18px; font-weight:bold; padding-left:10px; padding-right:10px; padding-top:10px;"><img src="#" style="border:none;" /></p></a>

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
									$webmaster = "support@whitejuly.com";
									$headers = "From: White July<$webmaster>";
									$subject = "Your new password";
									$message = "Your password has been reset. Your new password is found below. If you didn't request a new password, please contact us. \n \n";
									$message .= "Password: $pass \n"; 
									//check if email actually was sent
									if( mail($email, $subject, $message, $headers) ){
										echo "<span style='color:red;'>Your password has been reset. An email has been sent with your new password. <br /> Click <a href='#'>here</a> to log in</span>";
										
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



</body></html>