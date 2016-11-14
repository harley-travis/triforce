<?php 

// log the user in for the designer access
function designer_login($email, $password){
	global $db;
	
//	$query = "SELECT * FROM users
//			  WHERE user_email = '$email'";
//	
//	$numrows = mysql_num_rows($query);
//	
//	if($numrows != 0){
//	
//		while($row = mysql_fetch_assoc($query)){
//
//			$dbEmail = $row['userEmail'];
//			$dbPassword = $row['userPassword'];
//
//		}
//	}else{
//		
//		echo "user does not exist.";
//	}
	
}

// register the user to the system. forget about it
function register_user($email, $encryptPass, $userFirstName, $userLastName){
	global $db;
	
	$query = 'INSERT INTO users
			  (user_firstName, user_lastName, user_email, user_password)
			  VALUES
			  (:user_firstName, :user_lastName, :user_email, :user_password)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':user_firstName', $userFirstName);
	$statement->bindValue(':user_lastName', $userLastName);
	$statement->bindValue(':user_email', $email);
	$statement->bindValue(':user_password', $encryptPass);
	$statement->execute();
	$statement->closeCursor();
}


?>