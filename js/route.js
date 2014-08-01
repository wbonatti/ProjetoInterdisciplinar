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
        templateUrl: 'views/404.html'
      });
  }]);