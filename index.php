<?php

// declare the ring variable
//           insert the selections into the array

// switch -> make selections move to next case 
// switch -> image selections for each case

// execute case function

// function: insert selection into array
//           change image
//           insert into table / order
//           move to next case

// display images
// select image
// image triggers switch


$ring = array(
    
    'band' => array(
                    '',
                    '',
                    ''
                ),
    'color' => array(
                    '',
                    '',
                    ''
                ),
    'stone' => array(
                    '',
                    '',
                    ''
                ),
    'cut' => array(
                    '',
                    '',
                    ''
                )
);


// switch to choose options. insert into array

switch ($ring){
    case 'option 1':
        echo "you selected option 1";
        $ring['band'][3] = 'turd band';
        break;
    case 'option 2':
        echo "you selected option 2";
        break;
    default:
        echo "select an option";
        
}


function arrayInsert($ring = ''){
    
    //switch: if select array_push
    
    //$ring['band'][3] = 'your mom';
    // or
    //array_push($ring, 'option');
    
    return $ring;
    
}

$optionOne = $_POSTP['one'];
$optionTwo = $_POSTP['two'];
$optionThree = $_POSTP['three'];

echo $optionOne." is working;";

echo '<pre>', print_r($ring, true), '</pre>';

?>

<form action="." method="post" name="bandForm">
<ul>
    <li id="one">option 1</li>
    <li id="two">option 2</li>
    <li id="three">option 3</li>

</ul>
    <button name="submit" type="button">Submit</button>
</form>

<script>
$('#one');
</script>


 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>




