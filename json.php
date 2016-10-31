<?php

//recieve Javascript array via json magic
$ringArray = jsonString2Obj($_POST['json']);

print_r($ringArray);


function jsonString2Obj($str){
    return json_decode(stripslashes($str));
}


?>