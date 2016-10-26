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
            //console.log(request.responseXML.getElementsByTagName("BAND")[0]);
            
            // grab all the values in XML, put into var
            var bandItems = request.responseXML.getElementsByTagName("BAND");
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < bandItems.length; i++){
                output += "<li>" + bandItems[i].firstChild.nodeValue + "</li>";
            }
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
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
            
            // grab all the values in XML, put into var
            var bandItems = request.responseXML.getElementsByTagName("COLOR");
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < bandItems.length; i++){
                output += "<li>" + bandItems[i].firstChild.nodeValue + "</li>";
            }
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
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
            
            // grab all the values in XML, put into var
            var bandItems = request.responseXML.getElementsByTagName("STONE");
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < bandItems.length; i++){
                output += "<li>" + bandItems[i].firstChild.nodeValue + "</li>";
            }
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
        }
    }
    request.send();
        
    }
    
    function cutOptions(){
        
        // open the request
        request.open('GET', 'ringOptions.xml');
        
        request.onreadystatechange = function(){
        if ((request.readyState === 4 ) && (request.status === 200)){
            
            //display the XML table in the console: troubleshooting 
            //console.log(request.responseXML.getElementsByTagName("CUT")[0]);
            
            // grab all the values in XML, put into var
            var bandItems = request.responseXML.getElementsByTagName("CUT");
            // init ul list
            var output = "<ul>";
            
            // loop through all the XML types
            for(var i = 0; i < bandItems.length; i++){
                output += "<li>" + bandItems[i].firstChild.nodeValue + "</li>";
            }
            
            // add all for var and close in end ul tag
            output += "</ul>";
            
            // display all results 
            document.getElementById("options").innerHTML = output;
            
        }
    }
    request.send();
        
    }
    

        
        // associative array for ring
        var ring = new Array();
        ring['band'] = "basic";
        ring['color'] = "silver";
        ring['stone'] = "diamond";
        ring['cut'] = "cut";

        // pass array to php
        var json = jsObj2phpObj(ring);
        $.post("json.php", {json:json}, function(data){
            console.log(data);
        });

        function jsObj2phpObj(object){
            var json = "{";
            for(property in object){
                var value = object[property];
                if(typeof(value) == 'string'){
                    json += '"' + property + '":"' + value + '",'
                }else{
                    if(!value[0]){ // if its an associative array
                        json += '"' + property + '":' + jsObj2phpObj(value)+ ',';
                    }else{
                        json += '"' + property + '"[';
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

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>




