<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_MONETARY, 'pt_BR');
// =============================================
// HOME PAGE ===================================
// =============================================



if(!Autenticacao::verificaLogin()){
    Route::get('/', 'loginController@index');
    Route::post('/', 'loginController@autenticar');
}
else{
    Route::get('/', 'geralController@index');

    Route::get('/logout', function(){
        return Autenticacao::logout();
    });
}


App::missing(function($exception)
{
    $view  = View::make('login::header');
    $view .= View::make('default::404');
    $view .= View::make('login::footer');
    return $view;
});
