<?php include('view/header.php'); ?>
       
	<?php 
		// if not signed in, hide content
		// if signed in, display the content
		// no need to redirect
		
		$action = filter_input(INPUT_POST, 'action');
		
		if($action == NULL){
			
			// display the userlogin if they're not logged in
			include('view/designer_login_view.php');
			
		}else if($action == 'register-account'){
			
			// establish the variables. Then deal with it
			//$_SESSION['username'] = $email; // put that email into a session variable hoe bag
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password 		=	filter_input(INPUT_POST, 'password');
			$encryptPass = md5(md5("qwkejrbk".$password."xckvhgb")); // double salt that ish. try and hack that junk
			$verifyPassword = 	filter_input(INPUT_POST, 'verifyPassword');
			$userFirstName	= 	filter_input(INPUT_POST, 'firstName');
			$userLastName 	= 	filter_input(INPUT_POST, 'lastName');
			$_SESSION['firstName'] = $userFirstName; // put that name into a session variable hoe bag
			
				// if the passwords do not match, then screw you
				//if(!$password == $verifyPassword){
				//	echo 'passwords do not match, try again';
				//}else{
				//	echo 'good for you, they are working';
				//}
			
			// display the info to make sure it's working. then party on
			echo 'Welcome, ' . $_SESSION['firstName'] . '<br />';
			echo 'Password = ' . $password . '<br />';
			echo 'Password encypt = ' . $encryptPass . '<br />';
			echo 'Verify Password = ' . $verifyPassword . '<br />';
			echo 'User First Name = ' . $userFirstName . '<br />';
			echo 'User Last Name = ' . $userLastName . '<br />';
			echo '<a href="model/logout.php">Logout</a>';
			
			// send info to function, insert into database
			register_user($email, $encryptPass, $userFirstName, $userLastName);
			
			echo "Your account has been registered! Click <a href='model/logout.php'>here</a> to sign in.";
			
		}else if($action == 'sign-in'){
			// THIS SIGN IN IS TO USE THE DESIGNER, NOT FOR THE DASHBOARD
			
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'password');
			$_SESSION['firstName'] = $email; // put that email into a session
			
			// see if the user if valid
			designer_login($email, $password);
					
			// display the designer when logged in
			include('view/designer.php');
			
		}else{ 
			echo "ERROR: Something broke. Pls try again. Error in Controller";
		}

?>  
                
<?php include('view/footer.php'); ?>






