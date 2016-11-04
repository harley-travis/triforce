function colorOptions(){

    $.ajax({
        url: 'ringOptions.xml',
        dataType: 'xml',
        success: function(data){

            // **************************************************************************
            // NEED TO CREATE IF STATEMENT
            // If one has been select, select. another option selected, remove the previous selectment
            // **************************************************************************

            //loop through each bandtype
            $(data).find('RING COLORTYPE').each(function(){

                // establish xml variables into js variables
                var colorName  = $(this).find('COLORNAME').text();
                var colorImg   = $(this).find('COLORIMG').text();
                var colorPrice = $(this).find('COLORPRICE').text();

                // output into a list
                $('.output').append(
                    $('<li />', {            
                        html: '<img src="img/'+colorImg+'" class="band-img" /> <br />' + '<a href="#" class="color_this" id="band-'+colorName+'">'+colorName+'</a>' + '<br />' + 'price: ' + colorPrice
                    })
                );
            });

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

        },
        error: function(){
            console.log("WARNING: Error > colorOptions: Failed to retrive XML data. Please try again.");
        }

    });

} // END colorOptions()