
<h1>Select a Band</h1>

<div ng-controller="bandData"> 
	<ul>
		<li ng-repeat="band in bandtypes" >
		
			<span id="band-{{band.name}}" class="band_this">{{band.name}}</span>
			<span class="displayPrice">{{'$' + band.price }}</span>
			<img class="band-img" id="band-{{$index+1}}" ng-src="{{band.img}}">
			
		</li>
	</ul>	
</div>


<script>
	
	$(document).on("click", ".band_this", function() {
	  	
		// grab the unique id by selecting .band_this in repeat		
		var clickedId = $(this).attr("id"); //locates the ID name from the class
		var bandId = "#"+clickedId; // adds the # sign to the ID
		var bandIdValue = $(bandId).html(); // grabs the value from the ID
		ringArray.push(ringArray['band'] = bandIdValue); // send value to ringArray

		console.log(bandIdValue); // debug with console
	});
	
</script>


