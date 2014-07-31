appControllers.controller('loginCtrl', 
    function ($scope, $location, Usuario) {
        $scope.usuario = USUARIO;
        $scope.efetualogin = function(){
            Usuario.get().success(function(usuarios){
                angular.forEach(usuarios, function(usuario){
                    if(usuario.login === $scope.usuario.login &&
                       usuario.senha === $scope.usuario.senha)
                    {
                        USUARIO = $scope.usuario;
                        USUARIO.timestamplogin = +new Date;
                        console.log(USUARIO);
                        $location.path("/principal");
                    }
                });
            });
        };
    });