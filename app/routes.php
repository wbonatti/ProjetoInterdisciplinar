<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_MONETARY, 'pt_BR');
setlocale(LC_TIME, 'PT-BR');
// =============================================
// HOME PAGE ===================================
// =============================================
Route::get('ajax/{method}/{att}', function($method, $att) {
    $ajax = new Ajax();
    $headers['Content-Type'] = 'application/json';

    if(method_exists($ajax, $method)){
        return Response::json($ajax->$method($att), 200, $headers);
    }
});


if(!Autenticacao::verificaLogin()){
    Route::get('/', 'defaultController@login');
    Route::post('/', 'defaultController@autenticar');
}
else{
    
    Route::group(array('prefix' => '/'), function(){
        Route::get('/','geralController@index');
        Route::get('/meusdados','geralController@meusdados');
        Route::post('/meusdados','geralController@alterardados');
    });
    
    Route::group(array('prefix' => 'funcionarios'), function(){
        Route::get('/','funcionariosController@index');
        Route::get('/alterar/{x}','funcionariosController@alterar');
        Route::post('/alterar/{x}','funcionariosController@salvaralterar');
        Route::get('/visualizar/{x}','funcionariosController@visualizar');
        Route::get('/deletar/{x}','funcionariosController@deletar');
        Route::get('/novo','funcionariosController@novo');
        Route::post('/novo','funcionariosController@salvarnovo');
    });
    
    
    Route::group(array('prefix' => 'funcao'), function(){
        Route::get('/alterar/{x}','funcaoController@alterar');
        Route::post('/alterar/{x}','funcaoController@salvaralterar');
        Route::get('/visualizar/{x}','funcaoController@visualizar');
        Route::get('/deletar/{x}','funcaoController@deletar');
        Route::get('/novo','funcaoController@novo');
        Route::post('/novo','funcaoController@salvarnovo');
    });
    
    Route::group(array('prefix' => 'alunos'), function(){
        Route::get('/','alunosController@index');
        Route::get('/novo','alunosController@novo');
        Route::post('/novo','alunosController@salvarnovo');
        Route::get('/alterar/{x}','alunosController@alterar');
        Route::post('/alterar/{x}','alunosController@salvaralterar');
        Route::get('/visualizar/{x}','alunosController@visualizar');
        Route::get('/deletar/{x}','alunosController@deletar');
    });
    
    Route::group(array('prefix' => 'disciplina'), function(){
        Route::get('/','administracaoController@index');
        Route::get('/novo','disciplinaController@novo');
        Route::post('/novo','disciplinaController@salvarnovo');
        Route::get('/alterar/{x}','disciplinaController@alterar');
        Route::post('/alterar/{x}','disciplinaController@salvaralterar');
        Route::get('/visualizar/{x}','disciplinaController@visualizar');
        Route::get('/deletar/{x}','disciplinaController@deletar');
    });
    
    Route::group(array('prefix' => 'turma'), function(){
        Route::get('/','administracaoController@index');
        Route::get('/novo','turmaController@novo');
        Route::post('/novo','turmaController@salvarnovo');
        Route::get('/alterar/{x}','turmaController@alterar');
        Route::post('/alterar/{x}','turmaController@salvaralterar');
        Route::get('/visualizar/{x}','turmaController@visualizar');
        Route::get('/deletar/{x}','turmaController@deletar');
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
    
    Route::group(array('prefix' => 'usuarios'), function(){
        Route::get('/','usuarioController@index');
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