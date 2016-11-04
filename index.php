<!DOCTYPE html>
<html>
    <head>
        <title>The Designer</title>
        
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- CSS LIBRARIES -->
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
    
        <ul>
            <li><span onclick="bandOptions()" >Band Options</span></li>
            <li><span onclick="colorOptions()" >Color Options</span></li>
            <li><span onclick="stoneOptions()" >Stone Options</span></li>
            <li><span onclick="cutOptions()" >Cut Options</span></li>
        </ul>
        
        <p>Select and option</p>
        
        <button onclick="passArray()">Finished</button>
        
        <div id="options"></div>
        <div class="output"></div>        
        
        <!-- JS LIBRARIES -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="dataSelects.js"></script>
    </body>
</html>