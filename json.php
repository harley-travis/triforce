<?php

//json
$ring = jsonString2Obj($_POST['json']);

echo $ring->band;

function jsonString2Obj($str){
    return json_decode(stripslashes($str));
}


?>