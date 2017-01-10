<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

    // AJAX CALL
    var request;
    if(window.XMLHttpRequest){
        request = new XMLHttpRequest();
    } else {
        request = new ActiveXObject("Mirosoft.XMLHTTP");
    }
    
    // gloable array to store in XML data
    var ringArray = []; 

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
            var bandItems = request.responseXML.getElementsByTagName("BANDNAME");
            
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
                
                // send value to ringArray
                //ringArray(bandIdValue);
                ringArray.push(ringArray['band'] = bandIdValue);
                
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
                
                // send value to ringArray
                //ringArray(colorIdValue);
                ringArray.push(ringArray['color'] = colorIdValue);
                
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
                
                // send value to ringArray
                //ringArray(stoneIdValue);
                ringArray.push(ringArray['stone'] = stoneIdValue);
                
              console.log(stoneIdValue);
            });
            
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
                
                // send value to ringArray
                //ringArray(cutIdValue);
                ringArray.push(ringArray['cut'] = cutIdValue);
                
                // make sure it's working
                console.log(cutIdValue);
            });

        }

    }
    request.send();
       
    }
        
    function passArray(){
    
        // store the array into a value
        var arrayList = document.getElementById("options").value = ringArray;
    
        // if statment to check that there is only one array from each function
        
        // pass array to php
        var json = jsObj2phpObj(arrayList);
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
    }

        
</script>


<ul>
    <li><span onclick="bandOptions()" >Band Options</span></li>
    <li><span onclick="colorOptions()" >Color Options</span></li>
    <li><span onclick="stoneOptions()" >Stone Options</span></li>
    <li><span onclick="cutOptions()" >Cut Options</span></li>
</ul>

<p>Select and option</p>

<button onclick="passArray()">Finished</button>

<div id="options"></div>




<?php
//
//$ring = array(
//    
//    'band' => array(
//                    '',
//                    '',
//                    ''
//                ),
//    'color' => array(
//                    '',
//                    '',
//                    ''
//                ),
//    'stone' => array(
//                    '',
//                    '',
//                    ''
//                ),
//    'cut' => array(
//                    '',
//                    '',
//                    ''
//                )
//);


// switch to choose options. insert into array

//switch ($ring){
//    case 'option 1':
//        echo "you selected option 1";
//        $ring['band'][3] = 'turd band';
//        break;
//    case 'option 2':
//        echo "you selected option 2";
//        break;
//    default:
//        echo "select an option";
        
//}


// view array uncomment code below
//echo '<pre>', print_r($ring, true), '</pre>';

?>



