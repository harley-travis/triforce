function stoneOptions(){

    $.ajax({
        url: 'ringOptions.xml',
        dataType: 'xml',
        success: function(data){

            // **************************************************************************
            // NEED TO CREATE IF STATEMENT
            // If one has been select, select. another option selected, remove the previous selectment
            // **************************************************************************

            //loop through each bandtype
            $(data).find('RING STONETYPE').each(function(){

                // establish xml variables into js variables
                var stoneName  = $(this).find('STONENAME').text();
                var stoneImg   = $(this).find('STONEIMG').text();
                var stonePrice = $(this).find('STONEPRICE').text();

                // output into a list
                $('.output').append(
                    $('<li />', {            
                        html: '<img src="img/'+stoneImg+'" class="band-img" /> <br />' + '<a href="#" class="stone_this" id="band-'+stoneName+'">'+stoneName+'</a>' + '<br />' + 'price: ' + stonePrice
                    })
                );
            });

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

        },
        error: function(){
            console.log("WARNING: Error > stoneOptions: Failed to retrive XML data. Please try again.");
        }

    });

} // END stoneOptions()