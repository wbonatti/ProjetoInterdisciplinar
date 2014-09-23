<?php

Class funcaoController extends \BaseController
{
    public $menu = 1;
    public $title = 'Funcionários';
    
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
        if(isset($funcao)){
            $usuario = Autenticacao::UsuarioLogadoObject();
            UsuarioLog::newLog("Deletada a funcao ".$funcao->id.": ".$funcao->nome, $usuario->id);
            $funcao->delete();
        }
        return Redirect::to('/funcionarios');
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
            $funcao->save();
            UsuarioLog::newLog("Alterada função ".$funcao->id.": ".$funcao->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('funcoes.novo')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
}