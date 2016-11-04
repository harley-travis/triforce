<?php



//recieve Javascript array via json magic
$ringArray = jsonString2Obj($_POST['json']);

// pass the variables to the function
get_ringArray_index($ringArray, "band", "color", "stone", "cut");

// take each selection out of the array, into a variable
function get_ringArray_index($ringArray, $band, $color, $stone, $cut){
	
	$bandSelection = $ringArray->$band;
	$colorSelection = $ringArray->$color;
	$stoneSelection = $ringArray->$stone;
	$cutSelection = $ringArray->$cut;
	
	echo $bandSelection;
	echo $colorSelection;
	echo $stoneSelection;
	echo $cutSelection;

}

// display the json array
//print_r($ringArray);

// helps with the json. not sure what part though
function jsonString2Obj($str){
    return json_decode(stripslashes($str));
}


?>