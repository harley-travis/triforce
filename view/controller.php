<?php include(dirname(__FILE__)."/header.php"); ?>

<a href="#/">Band</a>
<a href="#color">Color</a>
<a href="#stone">Stone</a>
<a href="#cut">Cut</a>

<div ng-view class="container"></div>

<script>
	// global array - store info in this mother !@#$er
	var ringArray = []; 
	
	// the switch 
	var app = angular.module("whiteJuly", ["ngRoute"]);
	app.config(function($routeProvider) {
		
		$routeProvider
		.when("/", {
			templateUrl : "band.php",
		})
		.when("/color", {
			templateUrl : "color.php"
		})
		.when("/stone", {
			templateUrl : "stone.php"
		})
		.when("/cut", {
			templateUrl : "cut.php"
		});
	});
	
	// BandData
	app.controller('bandData', function($scope, $http) {
	  $http.get("../data/band.json").then(function (response) {
		  $scope.bandtypes = response.data.band;
	  });
	});
	
	// ColorData
	app.controller('colorData', function($scope, $http) {
	  $http.get("../data/color.json").then(function (response) {
		  $scope.colortypes = response.data.color;
	  });
	});
	
	// StoneData
	app.controller('stoneData', function($scope, $http) {
	  $http.get("../data/stone.json").then(function (response) {
		  $scope.stonetypes = response.data.stone;
	  });
	});
	
	// CutData
	app.controller('cutData', function($scope, $http) {
	  $http.get("../data/cut.json").then(function (response) {
		  $scope.cuttypes = response.data.cut;
	  });
	});
	
	
</script>


<?php include(dirname(__FILE__)."/footer.php"); ?>