<?php 

// grab all stores
function get_stores(){
	global $db;
    $query = 'SELECT * FROM stores';
    $statement = $db->prepare($query);
    $statement->execute();
    $stores = $statement->fetchAll();
    $statement->closeCursor();
    
    return $stores;    
}

// add the store
function add_store($store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone){
	global $db;
    $query = 'INSERT INTO stores
                (store_number, district_number, store_address_one, store_address_two, store_city, store_state, store_phone, store_zip)
                VALUES
                (:store_number, :district_number, :store_address_one, :store_address_two, :store_city, :store_state, :store_phone, :store_zip)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':store_number', $store_number);
    $statement->bindValue(':district_number', $district_number);
    $statement->bindValue(':store_address_one', $store_address_one);
    $statement->bindValue(':store_address_two', $store_address_two);
    $statement->bindValue(':store_city', $store_city);
    $statement->bindValue(':store_state', $store_state);
    $statement->bindValue(':store_phone', $store_phone);
    $statement->bindValue(':store_zip', $store_zip);
    $statement->execute();
    $statement->closeCursor();
}

// grab the store by id
function get_store_by_id($store_id){
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
function edit_store($store_id, $store_number, $district_number, $store_address_one, $store_address_two, $store_city, $store_state, $store_zip, $store_phone) {
    global $db;
    $query = 'UPDATE stores
              SET storeID             = :store_id,
                  store_number        = :store_number,
                  district_number     = :district_number,
                  store_address_one   = :store_address_one,
                  store_address_two   = :store_address_two,
                  store_city          = :store_city,
                  store_state         = :store_state,
				  store_phone         = :store_phone,
                  store_zip           = :store_zip
              WHERE storeID           = :store_id';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':store_id', $store_id);
	$statement->bindValue(':store_number', $store_number);
    $statement->bindValue(':district_number', $district_number);
    $statement->bindValue(':store_address_one', $store_address_one);
    $statement->bindValue(':store_address_two', $store_address_two);
    $statement->bindValue(':store_city', $store_city);
    $statement->bindValue(':store_state', $store_state);
    $statement->bindValue(':store_phone', $store_phone);
    $statement->bindValue(':store_zip', $store_zip);
    $statement->execute();
    $statement->closeCursor();
} 


?>