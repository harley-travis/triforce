<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

    // AJAX CALL
    var request;
    if(window.XMLHttpRequest){
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Mirosoft.XMLHTTP");
    }
    
    
    function bandOptions(){
        
        // open the request
        request.open('GET', 'ringOptions.xml');
        
        request.onreadystatechange = function(){
        if ((request.readyState === 4 ) && (request.status === 200)){
            
            //display the XML table in the console: troubleshooting 
            //console.log(request.responseXML.getElementsByTagName("CUT")[0]);
            
            // create array to store in XML data
            var bandItemsArray = new Array();
            
            // grab all the values in XML, put into var
            var bandItems = request.responseXML.getElementsByTagName("BAND");
            
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < bandItems.length; i++){
                
                //loop each iteration in a li tag, give a unique id
                output += "<li><a href='#' class='band_this' id='bandItem-"+i+"'>" + bandItems[i].firstChild.nodeValue + "</a></li>";
                
                //add each value into an array
                bandItemsArray.push(bandItems[i].firstChild.nodeValue);
            }
            
            // if select an option, return the value to an array
            //console.log(bandItems[0]);
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
            // grab the id from the loop
            $('.band_this').click(function() {
                
                //locates the ID name from the class
                var clickedId = $(this).attr("id");
                // adds the # sign to the ID
                var bandId = "#"+clickedId;
                // grabs the value from the ID
                var bandIdValue = $(bandId).html();
                
                //return final value
                //return bandIdValue;      
                
              console.log(bandIdValue);
            });

        }

    }
       
    request.send();
        
    }
    
    function colorOptions(){
        
        // open the request
        request.open('GET', 'ringOptions.xml');
        
        request.onreadystatechange = function(){
        if ((request.readyState === 4 ) && (request.status === 200)){
            
            //display the XML table in the console: troubleshooting 
            //console.log(request.responseXML.getElementsByTagName("COLOR")[0]);
            
            // create array to store in XML data
            var colorItemsArray = new Array();
            
            // grab all the values in XML, put into var
            var colorItems = request.responseXML.getElementsByTagName("COLOR");
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < colorItems.length; i++){
                output += "<li><a href='#' class='color_this' id='colorItem-"+i+"'>" + colorItems[i].firstChild.nodeValue + "</a></li>";
                
                //add each value into an array
                colorItemsArray.push(colorItems[i].firstChild.nodeValue);
            }
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
            // grab the id from the loop
            $('.color_this').click(function() {
                
                //locates the ID name from the class
                var clickedColorId = $(this).attr("id");
                // adds the # sign to the ID
                var colorId = "#"+clickedColorId;
                // grabs the value from the ID
                var colorIdValue = $(colorId).html();
                
                //return final value
                //return stoneIdValue;
                
              console.log(colorIdValue);
            });
            
        }
    }
    request.send();
        
    }
    
    function stoneOptions(){
        
        // open the request
        request.open('GET', 'ringOptions.xml');
        
        request.onreadystatechange = function(){
        if ((request.readyState === 4 ) && (request.status === 200)){
            
            //display the XML table in the console: troubleshooting 
            //console.log(request.responseXML.getElementsByTagName("STONE")[0]);
            
            // create array to store in XML data
            var stoneItemsArray = new Array();
            
            // grab all the values in XML, put into var
            var stoneItems = request.responseXML.getElementsByTagName("STONE");
            
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < stoneItems.length; i++){
                output += "<li><a href='#' class='stone_this' id='stoneItem-"+i+"'>" + stoneItems[i].firstChild.nodeValue + "</a></li>";
                
                //add each value into an array
                stoneItemsArray.push(stoneItems[i].firstChild.nodeValue);
            }
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
            // grab the id from the loop
            $('.stone_this').click(function() {
                
                //locates the ID name from the class
                var clickedStoneId = $(this).attr("id");
                // adds the # sign to the ID
                var stoneId = "#"+clickedStoneId;
                // grabs the value from the ID
                var stoneIdValue = $(stoneId).html();
                
                //return final value
                //return stoneIdValue;
                
              console.log(stoneIdValue);
            });
            
        }
    }
    request.send();
        
    }
    
    function cutOptions(cutIdValue){
        
        // open the request
        request.open('GET', 'ringOptions.xml');
  
        request.onreadystatechange = function(){
        if ((request.readyState === 4 ) && (request.status === 200)){
            
            //display the XML table in the console: troubleshooting 
            //console.log(request.responseXML.getElementsByTagName("CUT")[0]);
            
            // create array to store in XML data
            var cutItemsArray = new Array();
            
            // grab all the values in XML, put into var
            var cutItems = request.responseXML.getElementsByTagName("CUT");
            
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < cutItems.length; i++){
                
                //loop each iteration in a li tag, give a unique id
                output += "<li><a href='#' class='cut_this' id='cutItem-"+i+"'>" +cutItems[i].firstChild.nodeValue + "</a></li>";
                
                //add each value into an array
                cutItemsArray.push(cutItems[i].firstChild.nodeValue);
            }
            
            // if select an option, return the value to an array
            //console.log(bandItems[0]);
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
            // grab the id from the loop
            $('.cut_this').click(function() {
                
                //locates the ID name from the class
                var clickedCutId = $(this).attr("id");
                // adds the # sign to the ID
                var cutId = "#"+clickedCutId;
                // grabs the value from the ID
                var cutIdValue = $(cutId).html();
                //return to parent function
                cutOptions(cutIdValue);
                // show that its working
                console.log(cutIdValue);
            });

            // store cutIdValue
            var idz = cutIdValue;
            console.log(idz+" got it");
            console.log("work");

            //return idz;
            // send to rings 
            //ring(idz);
            
        }            
    }
    request.send();
    }
    

    

    
    
        function ring(){

            var zelda = cutOptions(idz);
            console.log(zelda+" triforce");
            //var bandIdValue = bandIdValue;
            var cutIdValue = cutOptions(cutIdValue);
            document.write(cutIdValue);
            // grab all the final values
            // input into array
            // return array to php function

            //ringObj = new Array;
            //ringObj.cut = cutIdValue;
            //ringObj.color = bandIdValue;
            //ringObj.stone = bandIdValue;
            //ringObj.cut = bandIdValue;


            // global array -> send to php
            //var ringArray = new Array();


            // object
           // obj = new Object;
            //obj.car = "honda";
            //obj.animal = "cat";

            console.log(cutIdValue+" ringObj displaying");
            
            // pass array to php
            var json = jsObj2phpObj(ringObj);
            $.post('json.php', {json:json}, function(data){
                console.log(data);
            });

        }
    
    
        
        // associative array for ring
        var ring = new Array();
        ring['band'] = "basic";
        ring['color'] = "silver";
        ring['stone'] = "diamond";
        ring['cut'] = "cut";
    
        // object
        obj = new Object;
        obj.car = "honda";
        obj.animal = "cat";

        // pass array to php
        var json = jsObj2phpObj(ring);
        $.post('json.php', {json:json}, function(data){
            console.log(data);
        });
        
        // send the junk to php
        function jsObj2phpObj(object){
            var json = "{";
            for(property in object){
                var value = object[property];
                if(typeof(value) == "string"){
                    json += '"' + property + '":"' + value + '",'
                }else{
                    if(!value[0]){ // if its an associative array
                        json += '"' + property + '":' + jsObj2phpObj(value)+ ',';
                    }else{
                        json += '"' + property + '":[';
                        for(prop in value) json += '"' + value[prop] + '",';
                        json = json.substr(0, json.length-1) + "],";
                    }
                }
            }
            return json.substr(0, json.length-1) + "}";
        }
    
</script>

    



<ul>
    <li><span onclick="bandOptions()" >Band Options</span></li>
    <li><span onclick="colorOptions()" >Color Options</span></li>
    <li><span onclick="stoneOptions()" >Stone Options</span></li>
    <li><span onclick="cutOptions()" >Cut Options</span></li>
</ul>
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


// view array uncomment code below
//echo '<pre>', print_r($ring, true), '</pre>';

?>

<div id="options"></div>






