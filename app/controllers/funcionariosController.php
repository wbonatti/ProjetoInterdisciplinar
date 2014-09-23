<?php

Class funcionariosController extends \BaseController
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
        $funcionario = Funcionario::find($id);
        if(!isset($funcionario)){
            return Redirect::to('/funcionarios');
        }
        $funcoes = Funcao::all();
        $dados = [
            'nome' => $funcionario->pessoa->nome,
            'sobrenome' => $funcionario->pessoa->sobrenome,
            'datanascimento' => $funcionario->pessoa->getFormatedDate('datanascimento','d/m/Y'),
            'cpf' => $funcionario->cpf,
            'rg' => $funcionario->rg,
            'salario' => $funcionario->salario,
            'funcao' => $funcionario->funcao_id
        ];
        foreach($funcoes as $f){
            $arrfuncoes[$f->id] = $f->nome;
        }
        
        $this->layout->content = View::make('funcionarios.alterar')
                ->with('funcoes', $arrfuncoes)
                ->with('dados', $dados);
        
    }
    
    function visualizar($id)
    {
        $funcionario = Funcionario::find($id);
        if(!isset($funcionario)){
            return Redirect::to('/funcionarios');
        }
        $dados = [
            'nome' => $funcionario->pessoa->nome,
            'sobrenome' => $funcionario->pessoa->sobrenome,
            'datanascimento' => $funcionario->pessoa->getFormatedDate('datanascimento','d/m/Y'),
            'cpf' => $funcionario->cpf,
            'rg' => $funcionario->rg,
            'salario' => $funcionario->salario,
            'funcao' => $funcionario->funcao->nome
        ];
        
        $this->layout->content = View::make('funcionarios.visualizar')
                ->with('dados', $dados);
    }
    
    function deletar($id)
    {
        $funcionario = Funcionario::find($id);
        if(isset($funcionario)){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $pessoa = Pessoa::find($funcionario->pessoa->id);
            UsuarioLog::newLog("Deletado o funcionário ".$funcionario->id.": ".$funcionario->pessoa->nome." ".$funcionario->pessoa->nome.".", $usuario->id);
            $funcionario->delete();
            $pessoa->delete();
        }
        return Redirect::to('/funcionarios');
    }
    
    function novo()
    {
        $funcoes = Funcao::all();
        $dados = [
            'nome' => '',
            'sobrenome' => '',
            'datanascimento' => '',
            'cpf' => '',
            'rg' => '',
            'salario' => '',
            'funcao' => ''
        ];
        foreach($funcoes as $f){
            $arrfuncoes[$f->id] = $f->nome;
        }
        
        $this->layout->content = View::make('funcionarios.novo')
                ->with('funcoes', $arrfuncoes)
                ->with('dados', $dados);
    }

    
    function salvaralterar($id)
    {
        $funcionario = Funcionario::find($id);
        if(!isset($funcionario)){
            return Redirect::to('/funcionarios');
        }
        $post = Input::all();
        $funcoes = Funcao::all();
        foreach($funcoes as $f){
            $arrfuncoes[$f->id] = $f->nome;
        }
        $rules = array_merge(Pessoa::getRules(),  Funcionario::getRules());
        $validator = Validator::make($post, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $pessoa = Pessoa::find($funcionario->pessoa_id);
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $pessoa->nome = $post['nome'];
            $pessoa->sobrenome = $post['sobrenome'];
            $pessoa->datanascimento = $nascimento->format('Y/m/d');
            $pessoa->save();
            $funcionario->pessoa_id = $pessoa->id;
            $funcionario->cpf = $post['cpf'];
            $funcionario->rg = $post['rg'];
            $funcionario->salario = $post['salario'];
            $funcionario->funcao_id = $post['funcao'];
            $funcionario->save();
            UsuarioLog::newLog("Alterado o funcionário ".$funcionario->id.": ".$funcionario->pessoa->nome." ".$funcionario->pessoa->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('funcionarios.alterar')
                ->with('funcoes', $arrfuncoes)
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
    
    function salvarnovo()
    {
        $post = Input::all();
        $funcoes = Funcao::all();
        foreach($funcoes as $f){
            $arrfuncoes[$f->id] = $f->nome;
        }
        $rules = array_merge(Pessoa::getRules(),  Funcionario::getRules());
        $validator = Validator::make($post, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $funcionario = new Funcionario;
            $pessoa = new Pessoa;
            $pessoa->nome = $post['nome'];
            $pessoa->sobrenome = $post['sobrenome'];
            $pessoa->datanascimento = $nascimento->format('Y/m/d');
            $pessoa->save();
            $funcionario->pessoa_id = $pessoa->id;
            $funcionario->cpf = $post['cpf'];
            $funcionario->rg = $post['rg'];
            $funcionario->salario = $post['salario'];
            $funcionario->funcao_id = $post['funcao'];
            $funcionario->save();
            UsuarioLog::newLog("Criado o funcionário ".$funcionario->id.": ".$funcionario->pessoa->nome." ".$funcionario->pessoa->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('funcionarios.novo')
                ->with('funcoes', $arrfuncoes)
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
}