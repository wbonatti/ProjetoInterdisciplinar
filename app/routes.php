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
        if(Autenticacao::pagepermissao(['funcionario','funcao'])){
            Route::get('/','funcionariosController@index');
        }
        
        if(Autenticacao::permissao('funcionario','atualizar')){
            Route::get('/alterar/{x}','funcionariosController@alterar');
            Route::post('/alterar/{x}','funcionariosController@salvaralterar');
        }
        if(Autenticacao::permissao('funcionario','ler')){
            Route::get('/visualizar/{x}','funcionariosController@visualizar');
        }
        if(Autenticacao::permissao('funcionario','excluir')){
            Route::get('/deletar/{x}','funcionariosController@deletar');
        }
        if(Autenticacao::permissao('funcionario','criar')){
            Route::get('/novo','funcionariosController@novo');
            Route::post('/novo','funcionariosController@salvarnovo');
        }
    });
    
    
    Route::group(array('prefix' => 'funcao'), function(){
        if(Autenticacao::pagepermissao(['funcionario','funcao'])){
            Route::get('/','funcionariosController@index');
        }
        if(Autenticacao::permissao('funcao','atualizar')){
            Route::get('/alterar/{x}','funcaoController@alterar');
            Route::post('/alterar/{x}','funcaoController@salvaralterar');
        }
        if(Autenticacao::permissao('funcao','ler')){
            Route::get('/visualizar/{x}','funcaoController@visualizar');
        }
        if(Autenticacao::permissao('funcao','excluir')){
            Route::get('/deletar/{x}','funcaoController@deletar');
        }
        if(Autenticacao::permissao('funcao','criar')){
            Route::get('/novo','funcaoController@novo');
            Route::post('/novo','funcaoController@salvarnovo');
        }
    });
    
    Route::group(array('prefix' => 'alunos'), function(){
        if(Autenticacao::pagepermissao(['aluno','nota'])){
            Route::get('/','alunosController@index');
        }
        if(Autenticacao::permissao('aluno','criar')){
            Route::get('/novo','alunosController@novo');
            Route::post('/novo','alunosController@salvarnovo');
        }
        if(Autenticacao::permissao('aluno','atualizar')){
            Route::get('/alterar/{x}','alunosController@alterar');
            Route::post('/alterar/{x}','alunosController@salvaralterar');
        }
        if(Autenticacao::permissao('aluno','ler')){
            Route::get('/visualizar/{x}','alunosController@visualizar');
        }
        if(Autenticacao::permissao('aluno','excluir')){
            Route::get('/deletar/{x}','alunosController@deletar');
        }
        if(Autenticacao::pagepermissao(['nota'])){
            Route::get('/notas/{id}','alunosController@notas');
            Route::post('/notas/{id}','alunosController@salvarnotas');
        }
    });
    
    Route::group(array('prefix' => 'disciplina'), function(){
        if(Autenticacao::pagepermissao(['disciplina'])){
            Route::get('/','administracaoController@index');
        }
        if(Autenticacao::permissao('disciplina','criar')){
            Route::get('/novo','disciplinaController@novo');
            Route::post('/novo','disciplinaController@salvarnovo');
        }
        if(Autenticacao::permissao('disciplina','atualizar')){
            Route::get('/alterar/{x}','disciplinaController@alterar');
            Route::post('/alterar/{x}','disciplinaController@salvaralterar');
        }
        if(Autenticacao::permissao('disciplina','ler')){
            Route::get('/visualizar/{x}','disciplinaController@visualizar');
        }
        if(Autenticacao::permissao('disciplina','excluir')){
            Route::get('/deletar/{x}','disciplinaController@deletar');
        }
    });
    
    Route::group(array('prefix' => 'turma'), function(){
        if(Autenticacao::pagepermissao(['turma'])){
            Route::get('/','administracaoController@index');
        }
        if(Autenticacao::permissao('turma','criar')){
            Route::get('/novo','turmaController@novo');
            Route::post('/novo','turmaController@salvarnovo');
        }
        if(Autenticacao::permissao('turma','atualizar')){
            Route::get('/alterar/{x}','turmaController@alterar');
            Route::post('/alterar/{x}','turmaController@salvaralterar');
        }
        if(Autenticacao::permissao('turma','ler')){
            Route::get('/visualizar/{x}','turmaController@visualizar');
        }
        if(Autenticacao::permissao('turma','excluir')){
            Route::get('/deletar/{x}','turmaController@deletar');
        }
    });
    
    Route::group(array('prefix' => 'administracao'), function(){
        if(Autenticacao::pagepermissao(['turma', 'disciplina'])){
            Route::get('/','administracaoController@index');
        }
    });
    
    Route::group(array('prefix' => 'financeiro'), function(){
        if(Autenticacao::pagepermissao(['mensalidade', 'salario'])){
            Route::get('/','financeiroController@index');
        }
        Route::group(array('prefix' => 'mensalidade'), function(){
            if(Autenticacao::permissao('mensalidade','excluir')){
                Route::get('/deletar/{id}','financeiroController@deletarmensalidade');
            }
            if(Autenticacao::permissao('mensalidade','criar')){
                Route::get('/novo/','financeiroController@novamensalidade');
                Route::post('/novo/','financeiroController@salvarnovamensalidade');
            }
            if(Autenticacao::permissao('mensalidade','ler')){
                Route::get('/visualizar/{id}','financeiroController@visualizarmensalidade');
            }
        });
        Route::group(array('prefix' => 'salario'), function(){
            if(Autenticacao::permissao('salario','excluir')){
                Route::get('/deletar/{id}','financeiroController@deletarsalario');
            }
            
            if(Autenticacao::permissao('salario','criar')){
                Route::get('/novo/','financeiroController@novosalario');
                Route::post('/novo/','financeiroController@salvarnovosalario');
            }
            
            if(Autenticacao::permissao('salario','ler')){
                Route::get('/visualizar/{id}','financeiroController@visualizarsalario');
            }
        });
    });
    
    Route::group(array('prefix' => 'registros'), function(){
        Route::get('/','registroController@index');
    });
    
    Route::group(array('prefix' => 'usuarios'), function(){
        if(Autenticacao::pagepermissao(['usuario', 'categoria'])){
            Route::get('/','usuarioController@index');
        }
        
        if(Autenticacao::permissao('usuario','criar')){
            Route::get('/novo','usuarioController@novo');
            Route::post('/novo','usuarioController@salvarnovo');
        }
        if(Autenticacao::permissao('usuario','atualizar')){
            Route::get('/alterar/{id}','usuarioController@alterar');
            Route::post('/alterar/{id}','usuarioController@salvaralterar');
        }
        if(Autenticacao::permissao('usuario','excluir')){
            Route::get('/deletar/{id}','usuarioController@deletar');
        }
    
        Route::group(array('prefix' => 'categoria'), function(){
            if(Autenticacao::permissao('categoria','criar')){
                Route::get('/nova','categoriaController@nova');
                Route::post('/nova','categoriaController@salvarnova');
            }   
            if(Autenticacao::permissao('categoria','atualizar')){
                Route::get('/alterar/{id}','categoriaController@alterar');
                Route::post('/alterar/{id}','categoriaController@salvaralterar');
            }
            if(Autenticacao::permissao('categoria','excluir')){
                Route::get('/deletar/{id}','categoriaController@deletar');
            }
        });
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