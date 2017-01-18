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
			include('view/header.php');
			include('view/dashboard_login_view.php');
		}
	}


	switch ($action){
		case 'dashboard':
			// display the dashboard
			include('view/dashboard.php');
			break;
		case 'sign-in':
			// sign the user in
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, 'password');
			$_SESSON['is_valid_user'] = $email.$password;

			if(designer_login($email, $password)){
				$_SESSON['is_valid_user'] = true;
				include('view/dashboard.php');
			}else{
				echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'> 
							<span aria-hidden='true'>&times;</span>
						</button>
							<strong>Error:</strong> You must login to view the designer</div>";
				include('view/dashboard_login_view.php');
			}
			
			break;
		case 'feedback':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/feedback/index.php');
			include('view/footer.php');
			break;
		case 'job-status':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/job-status/index.php');
			include('view/footer.php');
			break;
		case 'orders':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/orders/index.php');
			include('view/footer.php');
			break;
		case 'products':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/products/index.php');
			include('view/footer.php');
			break;
		case 'reports':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/reports/index.php');
			include('view/footer.php');
			break;
		case 'server-status':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/server-status/index.php');
			include('view/footer.php');
			break;
		case 'users':
			// view the feedback page
			include('view/header.php');
			include('view/left-col.php');
			include('view/users/index.php');
			include('view/footer.php');
			break;
		case 'add-user':
			// add a new user
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
			break;
		case 'edit-user':
			// edit the user
			
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
			break;
		case 'edit-user-id':
			// get the user id to make changes
			
			// get the user id
			$user_id = $_POST['user_id'];

			// get the user info from the db and put it in a var
			$user = get_user_by_id($user_id);

			// redirect to the edit page
			include('view/users/edit-user.php');
			break;
		case 'delete-user':
			// delete the user from the db
			$user_id = filter_input(INPUT_POST, 'user_id');
		
			if($user_id == NULL || $user_id == FALSE){

				echo "There was an error deleting the user";
			}else{
				delete_user($user_id);
				$users = get_users();
				include('view/users/users.php');
			}
			break;
		case 'view-users':
			// view all users
			$users = get_users();
			include('view/users/users.php');
			break;
		
			
	}


?>


