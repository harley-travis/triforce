<?php
error_reporting (E_ALL ^ E_NOTICE);
date_default_timezone_set('America/New_York');
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

<!-- Auto Reset Form Fields On Page Load or Refresh/ Does so by clicking the hidden button -->
<script type="text/javascript">
	$('#resetFields').click();
</script>

<!-- JS for password checker -->
 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="pschecker.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
           
            //Demo code
            $('.password-container').pschecker({ onPasswordValidate: validatePassword, onPasswordMatch: matchPassword });

            var submitbutton = $('.submit-button');
            var errorBox = $('.error');
            errorBox.css('visibility', 'hidden');
            submitbutton.attr("disabled", "disabled");

            //this function will handle onPasswordValidate callback, which mererly checks the password against minimum length
            function validatePassword(isValid) {
                if (!isValid)
                    errorBox.css('visibility', 'visible');
                else
                    errorBox.css('visibility', 'hidden');
            }
            //this function will be called when both passwords match
            function matchPassword(isMatched) {
                if (isMatched) {
                    submitbutton.addClass('unlocked').removeClass('locked');
                    submitbutton.removeAttr("disabled", "disabled");
                }
                else {
                    submitbutton.attr("disabled", "disabled");
                    submitbutton.addClass('locked').removeClass('unlocked');
                }
            }
        });
    </script>
</head>
<body>

<!-- Header-->

<div class="wrap" style="min-height:1100px;"><!-- Start Wrap -->       

<a href="#"><p style="text-align:center; font-size:18px; font-weight:bold; padding-left:10px; padding-right:10px; padding-top:10px;"><img src="#" style="border:none;" /></p></a>

<h3>Register an account with us!</h3>
<p style="text-align:center; padding-left:10px; padding-right:10px; width:850px; margin-left:25px; margin-right:25px;">Thank You For Choosing White July!<br />Sign Up Now To Receive Your Free Online Subscription.<br />Fields Marked With An Asterisk (<span style="color:#F00">*</span>) Are Required.</p>

	<?php
	
    if ($_POST['registerbtn']){
		$getuser = $_POST['user'];
		$getemail = $_POST['email'];
		$getpass = $_POST['pass'];
		$getretypepass = $_POST['retypepass'];
		$getfirst = $_POST['first'];
		$getlast = $_POST['last'];
		$getcompany = $_POST['company'];
		$getaddress1 = $_POST['address1'];
		$getaddress2 = $_POST['address2'];
		$getcity = $_POST['city'];
		$getstate = $_POST['state'];
		$getzip = $_POST['zip'];
		$getphone = $_POST['phone'];
		$getoccupation = $_POST['occupation'];
		$getincome = $_POST['income'];
		$getnetworth = $_POST['networth'];
		$gethomes = $_POST['homes'];
		$getvacations = $_POST['vacations'];
		$getcharteredyacht = $_POST['charteredyacht'];
		$getownyacht = $_POST['ownyacht'];
		$getcharteredjet = $_POST['charteredjet'];
		$getownjet = $_POST['ownjet'];
		
		
		if ($getuser){
			if ($getemail){
				if ($getpass){
					if ($getretypepass){
						if ( $getpass === $getretypepass ){
							if ( (strlen($getemail) >= 7) && (strstr($getemail, "@")) && (strstr($getemail, ".")) ){
								require("connect.php");
								
								$query = mysql_query("SELECT * FROM users WHERE username='$getuser'");
								$numrows = mysql_num_rows($query);
								if ($numrows == 0){
									$query = mysql_query("SELECT * FROM users WHERE email='$getemail'");
									$numrows = mysql_num_rows($query);
									if ($numrows == 0){
										
										$password = md5(md5("wReit45".$getpass."45TFdd"));
										$date = date("F d, Y");
										$code = md5(rand());
										
										mysql_query("INSERT INTO users VALUES (
											'',	'$getuser', '$password', '$getemail', '0', '$code', '$date', '$getfirst', '$getlast', '$getcompany', '$getaddress1', '$getaddress2', '$getcity', '$getstate', '$getzip', '$getphone', '$getoccupation', '$getincome', '$getnetworth', '$gethomes', '$getvacations', '$getcharteredyacht', '$getownyacht', '$getcharteredjet', '$getownjet'
										)");

										$query = mysql_query("SELECT * FROM users WHERE username='$getuser'");
										$numrows = mysql_num_rows($query);
										if($numrows == 1){
											
											$site = "http://www.whitejuly.com";
											$webmaster = "White July <support@whitejuly.com>";
											$headers = "From: $webmaster";
											$subject = "Activate your account";
											$message = "Thanks for registering. Click the link below to activate your account. \n";
											$message .= "$site/activate.php?user=$getuser&code=$code\n";
											$message .= "You must activate your account to login.\n";
											$message .=  "Do not respond to this email.";
											
											if (mail($getemail, $subject, $message, $headers) ){
												$errormsg = "Your account has been registered! You must verify your email before you can log in. An activation link has been sent to <b>$getemail</b>.";
												$getuser = "";
												$getemail = "";
											}
											else
												$errormsg = "An error has occured. Your activation email was not sent.";
											
										}
										else
											$errormsg = "An error has occured. Your account was not created.";
									
									
									}
									else
										$errormsg = "There is already a user with that email.";
								}
								else
									$errormsg = "There is already a user with that username.";
								
								mysql_close();
							}
							else
								$errormsg = "You must enter a valid email address to register.";
							
						}
						else
							$errormsg = "Your passwords did not match.";
						
					}
					else $errormsg = "You must re type your password to register.";		
				}
				else $errormsg = "You must enter your password to register.";	
			}
			else
				$errormsg = "You must enter your email to register.";
		}
		else
			$errormsg = "You must enter your username to register.";
			
		
	}
	
	//FORM
	$form = "<form action='register.php' method='post'>
	
	   <div class='wrapper'>
        <p>
            <span class='error'>Password must be 8 characters long</span>
        </p>
		<p><font color='red'>$errormsg</font></p>
        <div class='password-container'>
		 <p>
                <label>First Name:</label>
                <input type='text' name='first' value='$getfirst' required='required' /><div class='ast'>*</div>
            </p>
			 <p>
                <label>Last Name:</label>
                <input type='text' name='last' value='$getlast' required='required' /><div class='ast'>*</div>
            </p>
			 <p>
                <label>Company Name:</label>
                <input type='text' name='company' value='$getcompany' />
            </p>
			 <p>
                <label>Address 1:</label>
                <input type='text' name='address1' value='$getaddress1' required='required' /><div class='ast'>*</div>
            </p>
			 <p>
                <label>Address 2:</label>
                <input type='text' name='address2' value='$getaddress2' />
            </p>
			 <p>
                <label>City:</label>
                <input type='text' name='city' value='$getcity' required='required' /><div class='ast'>*</div>
            </p>
			<p>
                <label>State:</label>
					<select name='state' style='width:214px; padding:3px;' required='required' size='1' value='$getstate'><div class='ast'>*</div>
						  <option value='' selected='selected'>-- SELECT --</option>
						  <option value='Alabama'>Alabama</option>
						  <option value='Alaska'>Alaska</option>
						  <option value='Arizona'>Arizona</option>
						  <option value='Arkansas'>Arkansas</option>
						  <option value='California'>California</option>
						  <option value='Colorado'>Colorado</option>
						  <option value='Connecticut'>Connecticut</option>
						  <option value='Delaware'>Delaware</option>
						  <option value='Florida'>Florida</option>
						  <option value='Georgia'>Georgia</option>
						  <option value='Hawaii'>Hawaii</option>
						  <option value='Idaho'>Idaho</option>
						  <option value='Illinois'>Illinois</option>
						  <option value='Indiana'>Indiana</option>
						  <option value='Iowa'>Iowa</option>
						  <option value='Kansas'>Kansas</option>
						  <option value='Kentucky'>Kentucky</option>
						  <option value='Louisiana'>Louisiana</option>
						  <option value='Maine'>Maine</option>
						  <option value='Maryland'>Maryland</option>
						  <option value='Massachusetts'>Massachusetts</option>
						  <option value='Michigan'>Michigan</option>
						  <option value='Minnesota'>Minnesota</option>
						  <option value='Mississippi'>Mississippi</option>
						  <option value='Missouri'>Missouri</option>
						  <option value='Montana'>Montana</option>
						  <option value='Nebraska'>Nebraska</option>
						  <option value='Nevada'>Nevada</option>
						  <option value='New Hampshire'>New Hampshire</option>
						  <option value='New Jersey'>New Jersey</option>
						  <option value='New Mexico'>New Mexico</option>
						  <option value='New York'>New York</option>
						  <option value='North Carolina'>North Carolina</option>
						  <option value='North Dakota'>North Dakota</option>
						  <option value='Ohio'>Ohio</option>
						  <option value='Oklahoma'>Oklahoma</option>
						  <option value='Oregon'>Oregon</option>
						  <option value='Pennsylvania'>Pennsylvania</option>
						  <option value='Rhode Island'>Rhode Island</option>
						  <option value='South Carolina'>South Carolina</option>
						  <option value='South Dakota'>South Dakota</option>
						  <option value='Tennessee'>Tennessee</option>
						  <option value='Texas'>Texas</option>
						  <option value='Utah'>Utah</option>
						  <option value='Vermont'>Vermont</option>
						  <option value='Virginia'>Virginia</option>
						  <option value='Washington'>Washington</option>
						  <option value='West Virginia'>West Virginia</option>
						  <option value='Wisconsin'>Wisconsin</option>
						  <option value='Wyoming'>Wyoming</option>
						  <option value=''>-- CANADA --</option>
						  <option value='Alberta'>Alberta</option>
						  <option value='British Columbia'>British Columbia</option>
						  <option value='Manitoba'>Manitoba</option>
						  <option value='New Brunswick'>New Brunswick</option>
						  <option value='Newfoundland and Labrador'>Newfoundland and Labrador</option>
						  <option value='Northwest Territories'>Northwest Territories</option>
						  <option value='Nova Scotia'>Nova Scotia</option>
						  <option value='Nunavut'>Nunavut</option>
						  <option value='Ontario'>Ontario</option>
						  <option value='Prince Edward Island'>Prince Edward Island</option>
						  <option value='Quebec'>Quebec</option>
						  <option value='Saskatchewan'>Saskatchewan</option>
						  <option value='Yukon Territory'>Yukon Territory</option>
					  </select>
            </p>
			<p>
                <label>Zip Code:</label>
                <input type='text' name='zip' value='$getzip' required='required' /><div class='ast'>*</div>
            </p>
			<p>
                <label>Phone:</label>
                <input type='text' name='phone' value='$getphone' required='required' /><div class='ast'>*</div>
            </p>
			<p>
                <label>Occupation:</label>
                <input type='text' name='occupation' value='$getoccupation' />
            </p>
			<p>
                <label>Annual Household Income:</label>
                <input type='text' name='income' value='$getincome' />
            </p>
			<p>
                <label>Average Net Worth:</label>
				  <select name='networth' style='width:214px; padding:3px;' value='$getnetworth' size='1'>
					  <option value='' selected='selected'>-- SELECT --</option>
					  <option value='$0 - $100,000'>$0 - $100K</option>
					  <option value='$100,000 - $250,000'>$100K - $250K</option>
					  <option value='$250,000 - $500,000'>$250K - $500K</option>
					  <option value='$500,000 - $750,000'>$500K - $750K</option>
					  <option value='$750,000 - $1,000,000'>$750K - $1M</option>
					  <option value='$1,000,000 - $5,000,000'>$1M - $5M</option>
					  <option value='$5,000,000 - $10,000,000'>$5M - $10M</option>
					  <option value='$10,000,000 +'>$10M +</option>
				  </select>
            </p>
			<p>
                <label>Number Of Homes Owned:</label>
                <input type='text' name='homes' value='$gethomes' />
            </p>
			<p>
                <label>Number Of Vacations/Year:</label>
                <input type='text' name='vacations' value='$getvacations' />
            </p>
			<p>
                <label>Have You Ever Charted A Yacht?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
				Yes<input type='radio' name='charteredyacht' value='Yes' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No <input type='radio' name='charteredyacht' value='No' />
            </p>
			<p>
                <label>Do You Own A Yacht?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
				Yes<input type='radio' name='ownyacht' value='Yes' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No <input type='radio' name='ownyacht' value='No' />
            </p>
			<p>
                <label>Have You Ever Charted A Jet?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
				Yes<input type='radio' name='charteredjet' value='Yes' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No <input type='radio' name='charteredjet' value='No' />
            </p>
			<p>
                <label>Do You Own A Jet?</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
				Yes<input type='radio' name='ownjet' value='Yes' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No <input type='radio' name='ownjet' value='No' />
            </p>
			<hr />
		  <p>
                <label>Username:</label>
                <input type='text' name='user' value='$getuser' required='required' /><div class='ast'>*</div>
            </p>
			<p>
                <label>Email:</label>
                <input type='text' name='email' value='$getemail' required='required' /><div class='ast'>*</div>
            </p>
            <p>
                <label>Password:</label>
                <input class='strong-password' type='password' name='pass' value='' required='required' style='margin-top:3px;' /><div class='ast'>*</div>
            </p>
            <p>
                <label>Confirm Password:</label>
                <input class='strong-password' type='password' name='retypepass' value='' style='margin-top:3px;' required='required' />
            </p>
            <p>
                <input type='submit' name='registerbtn' value='Register' style='margin-left: 417px; padding:6px; width:100px;' />
            </p>
			
				
				
        </div>
    </div>
	</form>";

	echo $form;
	
	?>
    
			<div id="info">
            <div class='strength-indicator'>
					<div class='meter'>
					</div>
				</div>
            <p> Strong passwords contain 8-16 characters, do not include common words or names,
                and combine uppercase letters, lowercase letters, numbers, and symbols.</p>
                </div>


<!-- Floating Menu (Needed To Display The Top Banner)-->
<div id="box">
</div><!-- END Floating Menu -->

</div><!-- End Wrap -->



</body></html>