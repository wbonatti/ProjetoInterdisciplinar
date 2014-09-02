<?php

        
date_default_timezone_set('America/Sao_Paulo');
// =============================================
// HOME PAGE ===================================
// =============================================
Route::post('/', 'loginController@autenticar');
Route::get('/logout', function(){
    return Autenticacao::logout();
});

Route::get('/', function(){
    $view  = View::make('login::header');
    $view .= View::make('login::login');
    $view .= View::make('login::footer');
    return $view;
});

Route::get('/inicio', function(){
    $view  = View::make('default::header')->with('title','Geral');
    $view .= View::make('geral::inicio');
    $view .= View::make('default::footer');
    return $view;
});

Route::get('/geral', 'geralController@inicio');



