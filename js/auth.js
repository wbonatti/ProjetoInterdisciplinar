app.run(['$rootScope', '$location', 'Auth', function ($rootScope, $location, Auth) {
    $rootScope.$on('$routeChangeStart', function (event) {
        if (!Auth.isLoggedIn()) {
            event.preventDefault();
            $location.path('/');
        }
        else {
            $location.path('/principal');
        }
    });
}]);