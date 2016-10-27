<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>

<script language="Javascript">
$(document).ready(function() {
	$('#password-clear').show();
	$('#password-password').hide();

	$('#password-clear').focus(function() {
		$('#password-clear').hide();
		$('#password-password').show();
		$('#password-password').focus();
	});
	$('#password-password').blur(function() {
		if($('#password-password').val() == '') {
			$('#password-clear').show();
			$('#password-password').hide();
		}
	});

	$('.default-value').each(function() {
		var default_value = this.value;
		$(this).focus(function() {
			if(this.value == default_value) {
				this.value = '';
			}
		});
		$(this).blur(function() {
			if(this.value == '') {
				this.value = default_value;
			}
		});
	});

});
</script>

<!-- Hide All But 1st Upload More Button On Page Load -->
<script type="text/javascript">
  $(document).ready(function(){
	$("#logonFunction").hide();
  });
</script> 

<!-- Main Page Container -->
<div style="width:939px; margin-left:auto; margin-right:auto;">

    
    <!-- Main Header Container -->
    <div style="width:100%; background:gray; background-repeat:no-repeat; background-position:top;">
        
        <!-- Top Head -->
        <div style="width:939px: height:108px; max-height:108px; background:gray; background-repeat:no-repeat; margin-left:auto; margin-right:auto; clear:both;">
        
            <!-- Left Head -->
            <div id="logonButton" style="width:350px; min-width:350px; height:104px; max-height:104px; float:left;">
                
                <!-- Header Social and Logon Div -->
                <div style="text-align:center;">
                	<input type="button" value="Logon" onclick="if (this.onclick) {
                        document.getElementById('logonFunction').style.display='inline';
                        document.getElementById('logonButton').style.display='none'; }
                        else {
                        document.getElementById('logonFunction').style.display='none';
                        document.getElementById('logonButton').style.display='inline'; }
                        return true;" />
                </div><!-- END Header Social and Logon Div -->
                
            </div><!-- END Left Head -->
            
            <!-- Left Head (Alternate) -->
            <div id="logonFunction" style="width:350px; min-width:350px; height:104px; max-height:104px; float:left;">
				<div id="login">
                
				<?php
				
				if ($username && $userid){
						echo "Welcome <b>$username</b>, <a href='logout.php'>Logout</a>.";
						echo "<br /> <a href='resetpass.php'>Reset Password</a>";
					}
					
					else{
						$form = "<form method='post'>
							<table>
							<tr>
								
								<td><input type='text' name='user' value='Username' onblur=\"if (this.value == '') {this.value = 'Username';}\" onfocus=\"if(this.value == 'Username') {this.value = '';}\" /></td>
							</tr>
							<tr>
								<td> 
								 <input id='password-clear' type='text' value='Password' autocomplete='off' />
   								 <input id='password-password' type='password' name='password' value='' autocomplete='off' />
								</td>
								
							</tr>
							<tr>
								<td><a href='forgotpass.php' style='font-size: 11px; margin-left: -93px;'>Forgot your password?</a></td>
							</tr>
							<tr>
								
								<td><input type='submit' name='loginbtn' value='Login' style='margin-left:88px; padding:2px; width:66px; margin-top:-23px; float:right;' onclick='if (this.onclick) {
									document.getElementById('logonFunction').style.display='inline';
									document.getElementById('logonButton').style.display='none'; }
									else {
									document.getElementById('logonFunction').style.display='none';
									document.getElementById('logonButton').style.display='inline'; }
									return true;'/></td>
							</tr>
							
							</table>
						</form>";
					
						if ($_POST['loginbtn']){
							$user = $_POST['user'];
							$password = $_POST['password'];
								
								if ($user){
									if($password){
										//use to connect to the database
											require("connect.php");
											//salt password encyption
											$password = md5(md5("wReit45".$password."45TFdd"));
											// make sure login info correct
											$query = mysql_query("SELECT * FROM users WHERE username='$user'");
											$numrows = mysql_num_rows($query);
												if ($numrows == 1){
													$row = mysql_fetch_assoc($query);
													$dbid = $row['id'];
													$dbuser = $row['username'];
													$dbpass = $row['password'];
													$dbactive = $row['active'];
													
													if ($password == $dbpass){
														if ($dbactive == 1){
															//set session info
															$_SESSION['userid'] = $dbid;
															$_SESSION['username'] = $dbuser;
															
														    echo "<div id='welcome'>Welcome <b>$user</b>, <a href='logout.php'>Logout</a>.</div>";
															echo "<div id='welcome2'><br /> <a href='resetpass.php'>Reset Password</a></div>";
															
														}
														else
															echo "You must activate your account to login. $form";
														
													}
													else
														echo "You did not enter the correct password. $form";
										
														
													
												}
												else
													echo "The username you entered was not found. $form";
											
											mysql_close();
										}
										else
											echo "You must enter your password. $form";
								}
								else
									echo "You must enter your username. $form";
						}
						else
							echo $form;
					}
				?>
               
				</div><!-- end login -->
                <!-- Currently Empty Space -->
            </div><!-- END Left Head -->
            
            <!-- Center Head -->
            <div style="width:250px; min-width:250px; height:104px; max-height:104px; float:left;">
                <a href="#" title="#"><img src="#" alt="#" style="border:none; width:250px; height:104px;" width="250" height="104" border="0" /></a>
            </div><!-- END Center Head -->
            
            <!-- Right Head -->
            <div id="logoutButton" style="width:339px; min-width:339px; height:104px; max-height:104px; float:left;">
            
                <!-- Header Social and Logon Div -->
                <div style="text-align:center;">
                	<input type="button" value="Logout" onclick="logout.php" />
                </div><!-- END Header Social and Logon Div -->
                
            </div><!-- END Right Head -->

        </div><!-- END Top Head -->
    
        <!-- Top Ad Storage -->
        <div class="top_storage1" >
            <?php
            //define directory
            $domain = "http://".($_SERVER["SERVER_NAME"]);
            global $g_url;
            $root = $_SERVER['DOCUMENT_ROOT'];
            
            if (strpos($g_url, 'art.html') !== false)  {
                $topdir = '/ads/art/top/';
            } elseif (strpos($g_url, '/art/') !== false)  {
                 $topdir = '/ads/art/top/';
              }
            
            elseif (strpos($g_url, 'autos.html') !== false)  {
                 $topdir = '/ads/autos/top/';
            } elseif (strpos($g_url, '/autos/') !== false)  {
                 $topdir = '/ads/autos/top/';
              }
            
            elseif (strpos($g_url, 'aviation.html') !== false)  {
                 $topdir = '/ads/aviation/top/';
            } elseif (strpos($g_url, '/aviation/') !== false)  {
                 $topdir = '/ads/aviation/top/';
              }
            
            elseif (strpos($g_url, '/bentleyevent/index.html') !== false)  {
                 $topdir = '/ads/bentley/top/';
            } elseif (strpos($g_url, '/bentleyevent/') !== false)  {
                 $topdir = '/ads/bentley/top/';
              }
            
            elseif (strpos($g_url, 'calendar.html') !== false)  {
                 $topdir = '/ads/index/top/';
            } elseif (strpos($g_url, '/calendar/') !== false)  {
                 $topdir = '/ads/index/top/';
              }
            
            elseif (strpos($g_url, 'dining.html') !== false)  {
                 $topdir = '/ads/dining/top/';
            } elseif (strpos($g_url, '/dining/') !== false)  {
                 $topdir = '/ads/dining/top/';
              }
            
            elseif (strpos($g_url, 'events.html') !== false)  {
                $topdir = '/ads/events/top/';
            } elseif (strpos($g_url, '/events/') !== false)  {
                 $topdir = '/ads/events/top/';
              }
            
            elseif (strpos($g_url, 'executive-services.html') !== false)  {
                 $topdir = '/ads/executive/top/';
            } elseif (strpos($g_url, '/executive/') !== false)  {
                 $topdir = '/ads/executive/top/';
              }
            
            elseif (strpos($g_url, 'fashion.html') !== false)  {
                 $topdir = '/ads/fashion/top/';
            } elseif (strpos($g_url, '/fashion/') !== false)  {
                 $topdir = '/ads/fashion/top/';
              }
            
            elseif (strpos($g_url, 'golf.html') !== false)  {
                 $topdir = '/ads/golf/top/';
            } elseif (strpos($g_url, '/golf/') !== false)  {
                 $topdir = '/ads/golf/top/';
              }
            
            elseif (strpos($g_url, 'health.html') !== false)  {
                 $topdir = '/ads/health/top/';
            } elseif (strpos($g_url, '/health/') !== false)  {
                 $topdir = '/ads/health/top/';
              }
            
            elseif (strpos($g_url, 'home-design.html') !== false)  {
                 $topdir = '/ads/home-design/top/';
            } elseif (strpos($g_url, '/home-design/') !== false)  {
                 $topdir = '/ads/home-design/top/';
              }
            
            elseif (strpos($g_url, 'marketplace.html') !== false)  {
                 $topdir = '/ads/marketplace/index/top/';
              }
            
            elseif (strpos($g_url, 'outdoors.html') !== false)  {
                 $topdir = '/ads/outdoors/top/';
            } elseif (strpos($g_url, '/outdoors/') !== false)  {
                 $topdir = '/ads/outdoors/top/';
              }
            
            elseif (strpos($g_url, 'real-estate.html') !== false)  {
                 $topdir = '/ads/real-estate/top/';
            } elseif (strpos($g_url, '/real-estate/') !== false)  {
                 $topdir = '/ads/real-estate/top/';
              }
            
            elseif (strpos($g_url, 'test.html') !== false)  {
                 $topdir = '/ads/test/top/';
            } elseif (strpos($g_url, '/test/') !== false)  {
                 $topdir = '/ads/test/top/';
              } 
            
            elseif (strpos($g_url, 'top-5.html') !== false)  {
                 $topdir = '/ads/top5/top/';
            } elseif (strpos($g_url, '/top5/') !== false)  {
                 $topdir = '/ads/top5/top/';
              }
            
            elseif (strpos($g_url, 'travel.html') !== false)  {
                 $topdir = '/ads/travel/top/';
            } elseif (strpos($g_url, '/travel/') !== false) {
                 $topdir = '/ads/travel/top/';
              }
            
            elseif (strpos($g_url, 'video.html') !== false)  {
                 $topdir = '/ads/videos/top/';
            } elseif (strpos($g_url, '/videos/') !== false)  {
                 $topdir = '/ads/videos/top/';
              }
            
            elseif (strpos($g_url, 'watches.html') !== false)  {
                 $topdir = '/ads/watches-jewelry/top/';
            } elseif (strpos($g_url, '/jewelry/') !== false)  {
                 $topdir = '/ads/watches-jewelry/top/';
              }
            
            elseif (strpos($g_url, 'wine-and-spirits.html') !== false)  {
                 $topdir = '/ads/wine/top/';
            } elseif (strpos($g_url, '/wine/') !== false)  {
                 $topdir = '/ads/wine/top/';
              }
            
            elseif (strpos($g_url, 'yachts.html') !== false)  {
                 $topdir = '/ads/yachts/top/';
            } elseif (strpos($g_url, '/yacht/') !== false)  {
                  $topdir = '/ads/yachts/top/';
              }
            
            else  {
                $topdir = '/ads/index/top/';
            }
            
            //open directory
            if ($opendir = opendir($root.$topdir)){
                //read directory
                while(($file = readdir($opendir))!= FALSE ){
                    if($file!="." && $file!= ".."){
                        $topimgfile[]= $domain.$topdir.$file;
                    }
                    sort($topimgfile);
                }
            }
            
            $topimglength = count($topimgfile);
            
            for($x=0; $x < $topimglength; $x++){
                $topsize = getimagesize($topimgfile[$x], $info);
                if(isset($info['APP13'])){
                    $iptc = iptcparse($info['APP13']);
                    $toplink = $iptc['2#120'][0];
                    $toplinks[] = $toplink;
                }
            }
            
            for($x=0; $x < $topimglength; $x++){
                echo "<a href='$toplinks[$x]' target='_blank' ><img src='$topimgfile[$x]' alt='$domain' style='border:none;' /></a>";
            }
            
            $topfirstimage = $topimgfile[0];
            $topfirstimagesize = getimagesize($topfirstimage);
            ?>
        </div><!-- END Top Ad Storage -->
    
        <!-- Top Ad -->
        <div class="top3"></div>
        
            <!-- Advertisement Animation -->
            <script type="text/javascript">
            $(document).ready(function() {
                firstimage= $('div.storage a:first').clone();
                $("div.ad a").fadeIn("fast");
                $('div.ad').html(firstimage);
                $("div.ad a").delay(6600).fadeOut("slow");
            });
            </script>
            
            <script type="text/javascript">
            $(document).ready(function() {
                firstimage= $('div.top_storage1 a:first').clone();
                $("div.top3 a").fadeIn("fast");
                $('div.top3').html(firstimage);
                $("div.top3 a").delay(6600).fadeOut("slow");
            });
            </script>
            
            <script type="text/javascript">
            $(document).ready(function() {
            var speed = 8000;
            var timer = setInterval(replaceImage, speed);
            var images =  $('div.top_storage1 a').clone();
            var length = images.length;
            var index = 1;
            function replaceImage() {
                $("div.top3 a").fadeIn("slow");
                $('div.top3').html(images.eq(index));
                $("div.top3 a").delay(6600).fadeOut("slow");
                index++;
                  if (index >= length) {
                      index=0;
                  }	 
                }
            });
            </script>
            
            <script type="text/javascript">
            $(document).ready(function() {
            var speed = 8000;
            var timer = setInterval(replaceImage, speed);
            var images =  $('div.storage a').clone();
            var length = images.length;
            var index = 1;
            function replaceImage() {
                $("div.ad a").fadeIn("fast");
                $('div.ad').html(images.eq(index));
                $("div.ad a").delay(6600).fadeOut("slow");
                index++;
                  if (index >= length) {
                      index=0;
                  }	 
                }
            });
            </script>
        </div><!-- END Top Ad -->
    
        <!-- Main Navigation -->
        <div class="marketplace2">
            <div style="width:inherit; margin-left:auto; margin-right:auto;">
				<ul id="nav">
					<li><a href="#" title="Home"><strong>&nbsp;&nbsp;HOME&nbsp;&nbsp;</strong></a></li>
					<li><a href="#"><strong>ABOUT</strong></a></li>
					<li><a href="#"><strong>CONTACT</strong></a></li>
				</ul>
			</div>
            
            <!-- Category Navagation -->
            <div style="line-height: 1; color:#e8e8e8; z-index:11; height:34px;font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size: 13px; font-style: normal; font-variant: normal;font-weight: normal;">
        
                <hr style="color: #d5d5d5; background-color: #d5d5d5; width:925px; height:1px; margin-top: 7px; margin-bottom:5px;" />
                
              
                
            </div><!-- END Category Navagation -->
        
            <hr style="color: #d5d5d5; background-color: #d5d5d5; width:925px; height:1px;" />
          
        </div><!-- END Main Navigation -->
        
    </div><!-- END Main Header Container -->
	