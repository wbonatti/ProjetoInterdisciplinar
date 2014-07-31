app.factory('Usuario',  ['$http', function($http) {
        return {
            get: function(){
                return $http.get("json/usuarios.json");
            }
        }
}]);


