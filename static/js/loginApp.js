angular.module('loginApp', [])
.config(['$httpProvider', function ($httpProvider) {
  /*
    Intercept POST requests, convert to standard form encoding
    This is necessary because codeigniter has a little problem
    recognizing ajax request from angular
  */
  $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
  $httpProvider.defaults.transformRequest.unshift(function (data, headersGetter) {
    var key, result = [];
    for (key in data) {
      if (data.hasOwnProperty(key)) {
        result.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
      }
    }
    return result.join("&");
  });
}])
.controller('signupCtrl', ['$scope', '$http', '$location', function($scope, $http) {
  $scope.newUser = function(){
    var params = {
      username: $scope.new.name,
      email: $scope.new.email,
      password: $scope.new.password
    };

    $http.post('signup', params).success(function(data, status){
      if(!data.err || data.err == undefined){
        alert(data.msj);
        window.location = "";
      }else{
        alert(data.msj + "\nTry again later!");
      }
    }).error(function(data, status){
      console.log(status);
    });
  }
}]);
