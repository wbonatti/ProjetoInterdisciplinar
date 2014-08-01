var appControllers = angular.module('appControllers', []);

appControllers.controller('mainCtrl', ['$scope', 'Auth', '$location', function ($scope, Auth, $location) {

    $scope.$watch(Auth.isLoggedIn, function (value, oldValue) {
        if(!value && oldValue) {
          console.log("Disconnect");
          $location.path('/');
        }
        if(value) {
          console.log("Connect");
        }
    }, true);
  
}]);