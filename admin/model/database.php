<?php
	// not real login information. this is for testing purposes
	// it is only effective on XAMMP. Nice try suckas


	class Database{
		private static $dsn = '';
		private static $username = 'root';
		private static $password = '';
		private static $db;
		
		private function __construct(){}
		
		public static function getDB() {
			if (!isset(self::$db)){
				try{
					self::$db = new PDO(self::$dsn,
									    self::$username,
									   	self::$password);
				} catch (PDOException $e){
					$error_message = $e->getMessage();
					echo "Error: There was an error establashing a connection to the database.";
					exit();
				}
			}
			return self::$db;
		}
	}

?>




