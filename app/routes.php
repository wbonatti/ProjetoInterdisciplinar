<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_MONETARY, 'pt_BR');
setlocale(LC_TIME, 'PT-BR');
// =============================================
// HOME PAGE ===================================
// =============================================



if(!Autenticacao::verificaLogin()){
    Route::get('/', 'loginController@index');
    Route::post('/', 'loginController@autenticar');
}
else{
    Route::get('/', 'geralController@index');
    Route::group(array('prefix' => 'funcionarios'), function(){
        Route::get('/','funcionariosController@index');
    });
    Route::group(array('prefix' => 'alunos'), function(){
        Route::get('/','alunosController@index');
    });
    Route::group(array('prefix' => 'registros'), function(){
        Route::get('/','registroController@index');
    });

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
