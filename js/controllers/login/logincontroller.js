appControllers.controller('loginCtrl', 
    function ($scope, $location, Usuario, Auth) {
        $scope.usuario = {
            login: null,
            senha: null
        };
        $scope.efetualogin = function(){
            Usuario.get().success(function(usuarios){
                angular.forEach(usuarios, function(usuario){
                    if(usuario.login === $scope.usuario.login &&
                       usuario.senha === $scope.usuario.senha)
                    {
                        Auth.setUser($scope.usuario);
                        $location.path("/principal");
                    }
                });
                $scope.mensagem = "Usuário não encontrado!";
            });
        };
    });