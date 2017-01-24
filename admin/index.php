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
			$pageTitle = 'Dashboard';
			include('view/header.php');
			include('view/dashboard_login_view.php');
		}
	}

	// controller what to show based left nav
	switch ($action){
		case 'dashboard':
			// display the dashboard
			$pageTitle = 'Dashboard';
			include('view/dashboard.php');
			break;
		case 'sign-in':
			// sign the user in
			$pageTitle = 'Dashboard';
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
			$pageTitle = 'Feedback';
			include('view/header.php');
			include('view/left-col.php');
			include('view/feedback/index.php');
			include('view/footer.php');
			break;
		case 'job-status':
			// view the feedback page
			$pageTitle = 'Job Status';
			include('view/header.php');
			include('view/left-col.php');
			include('view/job-status/index.php');
			include('view/footer.php');
			break;
		case 'orders':
			// view the feedback page
			$pageTitle = 'View Orders';
			include('view/header.php');
			include('view/left-col.php');
			include('view/orders/index.php');
			include('view/footer.php');
			break;
		case 'products':
			// view the feedback page
			$pageTitle = 'Products';
			include('view/header.php');
			include('view/left-col.php');
			include('view/products/index.php');
			include('view/footer.php');
			break;
		case 'reports':
			// view the feedback page
			$pageTitle = 'Reports';
			include('view/header.php');
			include('view/left-col.php');
			include('view/reports/index.php');
			include('view/footer.php');
			break;
		case 'server-status':
			// view the feedback page
			$pageTitle = 'Trust.RizePoint.com';
			include('view/header.php');
			include('view/left-col.php');
			include('view/server-status/index.php');
			include('view/footer.php');
			break;
		case 'users':
			// view the feedback page
			$pageTitle = 'Users';
			include('view/header.php');
			include('view/left-col.php');
			include('view/users/index.php');
			include('view/footer.php');
			break;
		case 'store-locations':
			// view the feedback page
			$pageTitle = 'Store Locations';
			include('view/header.php');
			include('view/left-col.php');
			include('view/store-location/index.php');
			include('view/footer.php');
			break;
			
	}


?>


