angular.module('httpExample', [])
.controller('FetchController', ['$scope', '$http', '$templateCache',
  function($scope, $http, $templateCache) {
    $scope.method = 'GET';
    $scope.url = 'https://asp1.selcuk.edu.tr/asp/ogr/not.asp';

    $scope.fetch = function() {
      $scope.code = null;
      $scope.response = null;

    $http({
		method: $scope.method, 
		url: $scope.url,
		cache: $templateCache,
		headers:{
			'Accept':"* / *",
			'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET',
		}
	}).
    success(function(data, status) {
        $scope.status = status;
        $scope.data = data;
		alert(data);
    }).
    error(function(data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
    });
   };

    $scope.updateModel = function(method, url) {
      $scope.method = method;
      $scope.url = url;
    };
  }]);
