<?php include(dirname(__FILE__)."/header.php"); ?>

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
		.when("/band", {
			templateUrl : "band.php",
		})
		.when("/color", {
			templateUrl : "color.php"
		})
		.when("/stone", {
			templateUrl : "stone.php"
		})
		.when("/inscription", {
			templateUrl : "inscription.php"
		})
		.when("/cut", {
			templateUrl : "cut.php"
		})
		.when("/checkout", {
			templateUrl : "customerInfo.php"
		});
	});
	
	// BandData
	app.controller('bandData', function($scope, $http) {
	  $http.get("../data/band.json").then(function (response) {
		  $scope.bandtypes = response.data.band;
	  });
	});
	
	// BandSizes
	app.controller('band-size', function($scope) {
		$scope.sizes = ["4", "4.5", "5", "5.5", "6", "6.5", "7", "7.5"];
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
	
	// ClarityOptions
	app.controller('clarity', function($scope) {
		$scope.clarity = ["good", "really good", "too good", "you're too rich sthap"];
	});
	
	// CutData
	app.controller('cutData', function($scope, $http) {
	  $http.get("../data/cut.json").then(function (response) {
		  $scope.cuttypes = response.data.cut;
	  });
	});


	
</script>


<?php include(dirname(__FILE__)."/footer.php"); ?>