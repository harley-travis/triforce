
<h1>Select a Color</h1>

<div ng-controller="colorData"> 
	<ul>
		<li ng-repeat="color in colortypes" >
		
			<span href="#" id="color-{{color.name}}" class="color_this">{{color.name}}</span>
			<span class="displayPrice">{{'$' + color.price }}</span>
			<img class="band-img" id="color-{{$index+1}}" ng-src="{{color.img}}">
			
		</li>
	</ul>	
</div>


<script>
	
	$(document).on("click", ".color_this", function() {
	  	
		var clickedColorId = $(this).attr("id"); //locates the ID name from the class
		var colorId = "#"+clickedColorId; // adds the # sign to the ID
		var colorIdValue = $(colorId).html(); // grabs the value from the ID
		ringArray.push(ringArray['color'] = colorIdValue); // send value to ringArray

	  	console.log(colorIdValue);
   
	});
</script>

