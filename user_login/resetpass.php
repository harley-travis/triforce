<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>
<!--
####################################################################
# User Registration 
####################################################################
# By Travis Harley
####################################################################
# www.travisharley.com
####################################################################
# SETTINGS START
####################################################################

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
input[type="password"] {
padding: 3px;
width: 204px;
}
table {
padding-top: 28px;
text-align: center;
margin-left: 194px;
}
input[type="submit"] {
padding: 6px;
width: 151px;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="forms/nagging-menu.js" charset="utf-8"></script>


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

<h3>Reset your password</h3>
<p style="text-align:center; padding-left:10px; padding-right:10px; width:850px; margin-left:25px; margin-right:25px;">You can reset your current password by filling out the form below.</p>

<?php

    //makes this so that the user needs to be logged in
	if ($username && $userid){
	
		//check if button on form is click
		if ($_PO#ST['resetpass']){
			//get the form data
			$pass = $_POST['pass'];
			$newpass = $_POST['newpass'];
			$confirmpass = $_POST['confirmpass'];
			
			//make sure all data was entered
			if($pass){
				//check for new password
				if($newpass){
					//check for confirm pass
					if($confirmpass){
						//make sure new/confirm pass is same
						if($newpass === $confirmpass){
							//connect to database to make sure current password is correct
							$password = md5(md5("wReit45".$pass."45TFdd"));
							
							//connect to database
							require("connect.php");
							
							//make sure the password is correct
							$query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password'");
							//will return total rows found from query. should return 1 row if correct
							$numrows = mysql_num_rows($query);
							if ($numrows == 1){
								//encrypt new password
								$newpassword = md5(md5("wReit45".$newpass."45TFdd"));
								
								//update database with new password
								mysql_query("UPDATE users SET password='$newpassword' WHERE username='$username'");
								
								//make sure password was changed
								$query = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$newpassword'");
								$numrows = mysql_num_rows($query);
								//make sure that numrows has returned the correct value
								if($numrows == 1){
									echo "Your password has been reset. Click <a href='#'>here</a> to go back.";
								}
								else
									echo "An error has occured and your password was not reset.";
								
							}
							else
								echo "Your current password is incorrect.";
							
							//close database
							mysql_close();
							
						}
						else
							echo "Your new password did not match.";
						
					}
					else
						echo "You must confirm your new password.";
					
				}
				else
					echo "Yout must enter your new password.";
				
			}
			else
				echo "You must enter your current password.";
			
			
		}
		
		echo "<form action='resetpass.php' method='post'>
		<table>
			<tr>
				<td>Current Password:</td>
				<td><input type='text' name='pass'></td>
			</tr>
				<tr>
				<td>New Password:</td>
				<td><input type='password' name='newpass'></td>
			</tr>
			</tr>
				<tr>
				<td>Confirm Password:</td>
				<td><input type='password' name='confirmpass'></td>
			</tr>
			</tr>
				<tr>
				<td></td>
				<td><input type='submit' name='resetpass' value='Reset Password'></td>
			</tr>
		</table>
		</form>";
	}
	else	
		echo "Please login to acces this page. <a href='login.php'>Login here</a>.";
	
	
	?>

<!-- Floating Menu (Needed To Display The Top Banner)-->
<div id="box">
</div><!-- END Floating Menu -->

</div><!-- End Wrap -->


</body></html>
