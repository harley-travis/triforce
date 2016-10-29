<?php

//json
$ring = jsonString2Obj($_POST['json']);

print_r($ring);




function jsonString2Obj($str){
    return json_decode(stripslashes($str));
}


?>
