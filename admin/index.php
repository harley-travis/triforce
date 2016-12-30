<?php
		
	// grab the database info like you're supposed to do 
	require_once('model/database.php');
	require_once('model/dashboard_functions.php');

	// establish an action for the user
	$action = filter_input(INPUT_POST, 'action');

	// if there is no action then show a page 
	if($action == NULL){
		$action = filter_input(INPUT_GET, 'action');
		if($action == NULL){
			$action = 'blank';
		}
	}
	
	if($action == 'blank'){
		
		include('view/blank.php');
		
	}else if($action == 'add-user'){
	
		$userFirstName = filter_input(INPUT_POST, 'userFirstName');
		$userLastName = filter_input(INPUT_POST, 'userLastName');
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		$password = filter_input(INPUT_POST, 'password');
			

		if($userFirstName == NULL || $userFirstName == FALSE ||
		  $userLastName == NULL || $userLastName == FALSE ||
		  $email == NULL || $email == FALSE ||
		  $password == NULL || $password == FALSE){
			
			echo "There was an error adding a new user, please try again.";
		}else{
			// add the user to the db, put the data in a variable, display the page
			register($userFirstName, $userLastName, $email, $password);
			$users = get_users();
			include('view/users/users.php');
			
		}
		
	}else if($action == 'edit-user-id'){
		
		// get the user id
		$user_id = $_POST['user_id'];
		
		// get the user info from the db and put it in a var
		$user = get_user_by_id($user_id);
				
		// redirect to the edit page
		include('view/users/edit-user.php');
		
	}else if($action == 'edit-user'){
				
		// if password = password in db then change password. 
		// make a show password btn 
		
		$user_id = filter_input(INPUT_POST, 'user_id');
		$userFirstName = filter_input(INPUT_POST, 'userFirstName');
		$userLastName = filter_input(INPUT_POST, 'userLastName');
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
		$password = filter_input(INPUT_POST, 'password');
			

		if($user_id == NULL || $user_id == FALSE ||
		  $userFirstName == NULL || $userFirstName == FALSE ||
		  $userLastName == NULL || $userLastName == FALSE ||
		  $email == NULL || $email == FALSE ||
		  $password == NULL || $password == FALSE){
			
			echo "There was an error editing the user, please try again.";
			
		}else{
			// edit the user in the db, get the users and display on the users page
			edit_user($user_id, $userFirstName, $userLastName, $email, $password);
			$users = get_users();
			include('view/users/users.php');
	
		}
		
	}else if($action == 'delete-user'){
		
		$user_id = filter_input(INPUT_POST, 'user_id');
		
		if($user_id == NULL || $user_id == FALSE){
			
			echo "There was an error deleting the user";
		}else{
			delete_user($user_id);
			$users = get_users();
			include('view/users/users.php');
		}
		
	}else if($action == 'view-users'){
		// view the users 
		$users = get_users();
		include('view/users/users.php');
		
	}else{
		echo "not working";
	}



?>


