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


<script src="forms/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>




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

<h3></h3>
<p style="text-align:center; padding-left:10px; padding-right:10px; width:850px; margin-left:25px; margin-right:25px;"></p>
	
	<?php

	if ($username && $userid){
		session_destroy();
		echo "You have been logged out. Click <a href='#'>here</a> to go to the home page";
		
	}
	else
		echo "You are not logged in.";




	?>


<!-- Floating Menu (Needed To Display The Top Banner)-->
<div id="box">
</div><!-- END Floating Menu -->

</div><!-- End Wrap -->



</body></html>
