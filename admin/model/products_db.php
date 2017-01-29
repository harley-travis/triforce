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

// add the store
function add_band($store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone){
	global $db;
    $query = 'INSERT INTO band
                (store_number, district_number, store_address_one, store_address_two, store_city, store_state, store_phone, store_zip)
                VALUES
                (:store_number, :district_number, :store_address_one, :store_address_two, :store_city, :store_state, :store_phone, :store_zip)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':store_number', $store_number);

    $statement->execute();
    $statement->closeCursor();
}

// grab the store by id
function get_band_by_id($store_id){
	global $db;
    $query = 'SELECT * FROM stores
              WHERE storeID = :store_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":store_id", $store_id);
    $statement->execute();
    $store = $statement->fetch();
    $statement->closeCursor();
    return $store;
}

// edit the store
function edit_band($store_id, $store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone) {
    global $db;
    $query = 'UPDATE stores
              SET storeID             = :store_id,
                  store_number        = :store_number,
              WHERE storeID           = :store_id';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':store_id', $store_id);
	$statement->bindValue(':store_number', $store_number);
    $statement->execute();
    $statement->closeCursor();
} 


?>