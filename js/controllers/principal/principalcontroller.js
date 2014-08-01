appControllers.controller('principalCtrl', 
    function ($scope, Auth) {
        $scope.logout = function(){
            Auth.logout();
        };
    });