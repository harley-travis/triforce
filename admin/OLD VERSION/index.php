<?php include('view/header.php'); ?>
	<?php

		// set the action to determine the journey
		$action = filter_input(INPUT_POST, 'action');

		// if the user is not logged in, kick them out

		// if the action is blank, start with something. data
		if($action == '' || $action == NULL){
			include('view/users/add-user.php');
		}else if($action == 'add-user'){

		}else if($action == 'users'){
			
			$users = get_users();
			print_r($users);
			include('view/users/users.php');
			
		}else{
			echo "there is nothing to report";
		}


	?>
<?php include('view/footer.php'); ?>