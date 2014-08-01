var app = angular.module('app', [
  'ngRoute',
  'ngCookies',
  'appControllers'
]);

app.factory('Auth', function($cookieStore){
return{
    setUser : function(aUser){
        aUser.ts = +new Date;
        $cookieStore.put('intranetusuario',aUser);
    },
    isLoggedIn : function(){
        var user = $cookieStore.get('intranetusuario');
        return(user)? user : false;
    }
  }
});