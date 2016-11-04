<script>
	
	function bandOptions(){

    $.ajax({
        url: 'ringOptions.xml',
        dataType: 'xml',
        success: function(data){

            // **************************************************************************
            // NEED TO CREATE IF STATEMENT
            // If one has been select, select. another option selected, remove the previous selectment
            // **************************************************************************

            //loop through each bandtype
            $(data).find('RING BANDTYPE').each(function(){

                // establish xml variables into js variables
                var bandName  = $(this).find('BANDNAME').text();
                var bandImg   = $(this).find('BANDIMG').text();
                var bandPrice = $(this).find('BANDPRICE').text();

                // output into a list
                $('.output').append(
                    $('<li />', {            
                        html: '<img src="img/'+bandImg+'" class="band-img" /> <br />' + '<a href="#" class="band_this" id="band-'+bandName+'">'+bandName+'</a>' + '<br />' + 'price: ' + bandPrice
                    })
                );
            });

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

        },
        error: function(){
            console.log("WARNING: Error > bandOptions: Failed to retrive XML data. Please try again.");
        }

    });

} // END bandOptions()
	$(document).ready(function(){
		$(this).bandOptions();
	});
</script>

<input type="hidden" name="action" value="edit_card_form">

<span onclick="bandOptions()" >Band Options</span>
<a href="#" value="">Previous</a>
<a href="#" value="colorOptions">To Colors</a>



