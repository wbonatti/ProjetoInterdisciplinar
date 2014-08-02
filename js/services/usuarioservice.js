app.factory('Usuario',  ['$http', function($http) {
        return {
            get: function(usuario){
                var params = {
                    'usuarioEmail' : usuario.email,
                    'usuarioSenha' : usuario.senha
                };
                var params = {
                    'usuarioEmail' : 'usuario.email',
                    'usuarioSenha' : 'usuario.senha'
                };
                return $http.post('rest/index.php/autenticar', {
                    'teste': 'x',
                    'teste2': 'x'
                });
            }
        }
}]);


