angular.module('loginApp', [])
.controller('signupCtrl', ['$scope', '$http', '$location', function($scope, $http, $location) {
  $scope.submit = function(){
    alert("Ok!");
  }
}]);
