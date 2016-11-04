function cutOptions(){

    $.ajax({
        url: 'ringOptions.xml',
        dataType: 'xml',
        success: function(data){

            // **************************************************************************
            // NEED TO CREATE IF STATEMENT
            // If one has been select, select. another option selected, remove the previous selectment
            // **************************************************************************

            //loop through each bandtype
            $(data).find('RING CUTTYPE').each(function(){

                // establish xml variables into js variables
                var cutName  = $(this).find('CUTNAME').text();
                var cutImg   = $(this).find('CUTIMG').text();
                var cutPrice = $(this).find('CUTPRICE').text();

                // output into a list
                $('.output').append(
                    $('<li />', {            
                        html: '<img src="img/'+cutImg+'" class="band-img" /> <br />' + '<a href="#" class="cut_this" id="band-'+cutName+'">'+cutName+'</a>' + '<br />' + 'price: ' + cutPrice
                    })
                );
            });

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

        },
        error: function(){
            console.log("WARNING: Error > cutOptions: Failed to retrive XML data. Please try again.");
        }

    });

} // END cutOptions()