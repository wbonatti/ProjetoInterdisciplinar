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
    $view = View::make('default::header');
    $view .= View::make('login::login');
    $view.= View::make('default::footer');
    return $view;
});

Route::get('/geral', 'geralController@inicio');



