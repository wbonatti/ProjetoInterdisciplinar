<?php

Class alunosController extends \BaseController
{
    public $menu = 2;
    public $title = 'Alunos';
    
    function index()
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function novo()
    {
        $dados = [
            'nome' => '',
            'sobrenome' => '',
            'datanascimento' => ''
        ];        
        $this->layout->content = View::make('alunos.novo')
                ->with('dados', $dados);
    }
    
    function salvarnovo()
    {
        $post = Input::all();
        $rules = Pessoa::getRules();
        $validator = Validator::make($post, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $aluno = new Aluno;
            $pessoa = new Pessoa;
            $pessoa->nome = $post['nome'];
            $pessoa->sobrenome = $post['sobrenome'];
            $pessoa->datanascimento = $nascimento->format('Y/m/d');
            $pessoa->save();
            $aluno->pessoa_id = $pessoa->id;
            $aluno->save();
            UsuarioLog::newLog("Criado o aluno ".$aluno->id.": ".$aluno->pessoa->nome." ".$aluno->pessoa->sobrenome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('alunos.novo')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
    
    function alterar($id)
    {
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $dados = [
            'nome' => $aluno->pessoa->nome,
            'sobrenome' => $aluno->pessoa->sobrenome,
            'datanascimento' => $aluno->pessoa->getFormatedDate('datanascimento','d/m/Y'),
        ];
        
        $this->layout->content = View::make('alunos.alterar')
                ->with('dados', $dados);
        
    }
    
    function salvaralterar($id)
    {   
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $pessoa = Pessoa::find($aluno->pessoa->id);
        $post = Input::all();
        $rules = Pessoa::getRules();
        $validator = Validator::make($post, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $pessoa->nome = $post['nome'];
            $pessoa->sobrenome = $post['sobrenome'];
            $pessoa->datanascimento = $nascimento->format('Y/m/d');
            $pessoa->save();
            $aluno->pessoa_id = $pessoa->id;
            $aluno->save();
            UsuarioLog::newLog("Alterado o aluno ".$aluno->id.": ".$aluno->pessoa->nome." ".$aluno->pessoa->sobrenome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('alunos.alterar')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
    
    function deletar($id)
    {
        $aluno = Aluno::find($id);
        if(isset($aluno)){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $pessoa = Pessoa::find($aluno->pessoa->id);
            UsuarioLog::newLog("Deletado o aluno ".$aluno->id.": ".$aluno->pessoa->nome." ".$aluno->pessoa->nome.".", $usuario->id);
            $aluno->delete();
            $pessoa->delete();
        }
        return Redirect::to('/alunos');
    }
    
    function visualizar($id)
    {
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $dados = [
            'nome' => $aluno->pessoa->nome,
            'sobrenome' => $aluno->pessoa->sobrenome,
            'datanascimento' => $aluno->pessoa->getFormatedDate('datanascimento','d/m/Y'),
        ];
        
        $this->layout->content = View::make('alunos.visualizar')
                ->with('dados', $dados);
    }
}