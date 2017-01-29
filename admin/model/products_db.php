<?php 

// grab all stores
function get_bands(){
	global $db;
    $query = 'SELECT * FROM band';
    $statement = $db->prepare($query);
    $statement->execute();
    $bands = $statement->fetchAll();
    $statement->closeCursor();
    
    return $bands;    
}

// stringify to JSON
function bands_to_json(){
	
	global $db;
    $query = 'SELECT * FROM band';
    $statement = $db->prepare($query);
    $statement->execute();
    $bands = $statement->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC to remove the duplicate numeric columns in json file
    $statement->closeCursor();
	
	// open productData.json
	$jsonFile = fopen("model/data/productData.json", "w") or die("Unable to open productData File! Try again, or contact White July");
	
	// format query to json
	$jsonText = json_encode($bands, JSON_PRETTY_PRINT);
	
	// write in the file and close
	fwrite($jsonFile, '{"band":');
	fwrite($jsonFile, $jsonText);
	fwrite($jsonFile, "}");
	fclose($jsonFile);


}



?>