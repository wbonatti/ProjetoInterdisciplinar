var app = angular.module('app', [
  'ngRoute',
  'appControllers'
]);


app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'views/login/login.html',
        controller: 'loginCtrl'
      }).
      when('/principal', {
        templateUrl: 'views/principal/principal.html',
        controller: 'loginCtrl'
      }).
      otherwise({
        redirectTo: 'views/404'
      });
  }]);