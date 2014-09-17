<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_MONETARY, 'pt_BR');
setlocale(LC_TIME, 'PT-BR');
// =============================================
// HOME PAGE ===================================
// =============================================



if(!Autenticacao::verificaLogin()){
    Route::get('/', 'defaultController@login');
    Route::post('/', 'defaultController@autenticar');
}
else{
    
    Route::group(array('prefix' => '/'), function(){
        Route::get('/','geralController@index');
        Route::get('/meusdados','geralController@meusdados');
    });
    
    Route::group(array('prefix' => 'funcionarios'), function(){
        Route::get('/','funcionariosController@index');
    });
    
    Route::group(array('prefix' => 'alunos'), function(){
        Route::get('/','alunosController@index');
    });
    
    Route::group(array('prefix' => 'administracao'), function(){
        Route::get('/','administracaoController@index');
    });
    
    Route::group(array('prefix' => 'financeiro'), function(){
        Route::get('/','financeiroController@index');
    });
    
    Route::group(array('prefix' => 'registros'), function(){
        Route::get('/','registroController@index');
    });

    Route::get('/logout', function(){
        return Autenticacao::logout();
    });
}

App::error(function($exception, $code)
{
    switch ($code)
    {   
        case 404:
            $msg = 'Desculpe, não conseguimos identificar a página que você está tentando acessar.';
            $view = View::make('default.loginlayout')->nest('content', 'default.error', ['erroTitle'=>'404','msgException'=>$exception, 'msg'=>$msg])->with('title','404');
            break;
        case 500:
            $msg = 'Desculpe, mas houve um erro na sua navegação.';
            $view = View::make('default.loginlayout')->nest('content', 'default.error', ['erroTitle'=>'500','msgException'=>$exception, 'msg'=>$msg])->with('title','500');
            break;
        default:
            $msg = 'Desculpe, um erro ocorreu.';
            $view = View::make('default.loginlayout')->nest('content', 'default.error', ['erroTitle'=>'500','msgException'=>$exception, 'msg'=>$msg])->with('title','500');
            break;
    }
        
    return $view;
});