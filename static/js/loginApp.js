angular.module('loginApp', [])
.controller('signupCtrl', ['$scope', '$http', '$location', function($scope, $http, $location) {
  $scope.newUser = function(){
    alert("Ok!");
  }
}]);
