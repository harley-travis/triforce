<?php 

// register user at the login screen
function register($email, $password, $userFirstName, $userLastName){
	global $db;
	$password = sha1($email . $password);
	$query = 'INSERT INTO users (user_email, user_password, user_firstName, user_lastName)
			  VALUES (:email, :password, :user_firstName, :user_lastName)';
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':user_firstName', $userFirstName);
	$statement->bindValue(':user_lastName', $userLastName);
	$statement->execute();
	$statement->closeCursor();
}

// log the user in for the designer access
function designer_login($email, $password){
	global $db;
	$password = sha1($email . $password);
	$query = 'SELECT user_id FROM users
			  WHERE user_email = :email AND user_password = :password';
	$statement = $db->prepare($query);
	$statement->bindValue(':email', $email);
	$statement->bindValue(':password', $password);
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $valid;
	
}

// view the users
function get_users(){
	global $db;
    $query = 'SELECT * FROM users';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    $statement->closeCursor();
    
    return $users;    
}

// locate the user by ID
function get_user_by_id($user_id){
    global $db;
    $query = 'SELECT * FROM users
              WHERE user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":user_id", $user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

// edit the user
function edit_user($user_id, $userFirstName, $userLastName, $email, $password) {
    global $db;
    $query = 'UPDATE users
              SET user_id         = :user_id,
                  user_firstName  = :userFirstName,
                  user_lastName   = :userLastName,
                  user_email      = :email,
                  user_password   = :password
              WHERE user_id       = :user_id';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':userFirstName', $userFirstName);
    $statement->bindValue(':userLastName', $userLastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
} 

// delete the user from the db
function delete_user($user_id){
	global $db;
	$query = 'DELETE FROM users
			  WHERE user_id = :user_id';
	$statement = $db->prepare($query);
	$statement->bindValue(':user_id', $user_id);
	$statement->execute();
	$statement->closeCursor();
}

//add a user
function add_user($userFirstName, $userLastName, $email, $password){
	global $db;
    $query = 'INSERT INTO users
                (user_firstName, user_lastName, user_email, user_password)
                VALUES
                (:userFirstName, :userLastName, :email, :password)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':userFirstName', $userFirstName);
    $statement->bindValue(':userLastName', $userLastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

?>