<?php

Class funcaoController extends \BaseController
{
    public $menu = 1;
    public $title = 'Funcionários';

    
    function index()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function alterar($id)
    {
        $funcao = Funcao::find($id);
        if(!isset($funcao)){
            return Redirect::to('/funcionarios');
        }
        $dados = [
            'nome' => $funcao->nome
        ];
        $this->layout->content = View::make('funcoes.novo')->with('dados',$dados);
        
    }
    
    function visualizar($id)
    {
        $funcao = Funcao::find($id);
        if(!isset($funcao)){
            return Redirect::to('/funcionarios');
        }
        $dados = [
            'nome' => $funcao->nome
        ];
        
        $this->layout->content = View::make('funcoes.visualizar')
                ->with('dados', $dados);
    }
    
    function deletar($id)
    {
        $funcao = Funcao::find($id);
        if(!isset($funcao->id)){
            $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                    ->with('msg','Essa função não existe!');
        }
        else{
            $funcionarios = $funcao->funcionarios;
            if(count($funcionarios) > 0){
                $msg = 'Você não pode exluir essa função pois existem '.count($funcionarios).' funcionários vinculados a ela!';
                if(count($funcionarios) == 1) {
                    $msg = str_replace ('existem','existe', $msg);
                    $msg = str_replace ('vinculados','vinculado', $msg);
                }
                $this->layout->error = View::make('default.acao')
                        ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                        ->with('msg',$msg);
            }
            else {
                $usuario = Autenticacao::UsuarioLogadoObject();
                UsuarioLog::newLog("Deletada a funcao ".$funcao->id.": ".$funcao->nome, $usuario->id);
                $funcao->delete();
                $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Sucesso!')
                    ->with('tipo', 'alert-success')
                    ->with('msg','Função deletada com sucesso!');
            }
        }
        $this->index();
    }
    
    function novo()
    {
        $dados = [
            'nome' => ''
        ];
        $this->layout->content = View::make('funcoes.novo')->with('dados',$dados);
    }
    
    function salvarnovo()
    {
        $post = Input::all();
        $success = false;
        $validator = Validator::make($post, Funcao::getRules());
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $funcao = new Funcao();
            $funcao->nome = $post['nome'];
            $funcao->save();
            $post = [
                'nome' => ''
            ];
            UsuarioLog::newLog("Criada função ".$funcao->id.": ".$funcao->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('funcoes.novo')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
    
    function salvaralterar($id)
    {
        $funcao = Funcao::find($id);
        if(!isset($funcao)){
            return Redirect::to('/funcionarios');
        }
        $post = Input::all();
        $success = false;
        $validator = Validator::make($post, Funcao::getRules());
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $funcao->nome = $post['nome'];
            $funcao->update();
            UsuarioLog::newLog("Alterada função ".$funcao->id.": ".$funcao->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('funcoes.alterar')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
}