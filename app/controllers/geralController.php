<?php

Class geralController extends \BaseController
{
    public $menu = 0;
    public $title = 'Geral';
    
    function index()
    {
        $usuario = Autenticacao::UsuarioLogadoObject();
        $aniversariantes = Pessoa::whereRaw('month(datanascimento) = month(now())')->get();
        $logs = UsuarioLog::where('usuario_id','=',$usuario->id)->orderByRaw('data DESC')->limit(10)->get();
        $numeroAlunos = Aluno::count();
        $numeroFuncionario = Funcionario::count();
        $numeroPessoa = Pessoa::count();
        $numeroOutro = $numeroPessoa - $numeroAlunos - $numeroFuncionario;
        $mes = Carbon\Carbon::now()->formatLocalized('%B');
        $this->layout->content = View::make('geral.index')
        ->with([
            'aniversariantes' => $aniversariantes,
            'mes' => $mes,
            'logs' => $logs,
            'numeroAluno' => $numeroAlunos,
            'numeroFuncionario' => $numeroFuncionario,
            'numeroOutro' => $numeroOutro,
            'numeroPessoa' => $numeroPessoa
        ]);
    }
    
        
    function meusdados()
    {
        $usuario = Autenticacao::UsuarioLogadoObject();
        $dados['email'] = $usuario->email;
        $dados['nome'] = $usuario->funcionario->pessoa->nome;
        $dados['sobrenome'] = $usuario->funcionario->pessoa->sobrenome;
        $dados['cpf'] = $usuario->funcionario->cpf;
        $dados['rg'] = $usuario->funcionario->rg;
        $dados['datanascimento'] = $usuario->funcionario->pessoa->getFormatedDate('datanascimento','d/m/Y');
        $dados['salario'] = $usuario->funcionario->salario;
        $this->layout->content = View::make('geral.meusdados')->with('dados',$dados);
    }
    
        
    function alterardados()
    {
        $post = Input::all();
        $usuario = Autenticacao::UsuarioLogadoObject();
        $dados = [  'email' => $usuario->email,
                    'nome' => $post['nome'],
                    'sobrenome' => $post['sobrenome'],
                    'datanascimento' => $post['datanascimento'],
                    'cpf' => $usuario->funcionario->cpf,
                    'rg' => $usuario->funcionario->rg,
                    'salario' => $usuario->funcionario->salario
        ];
        
        $senha = true;
        if($post['senha'] != $usuario->senha) $senha = false;
        
        $success = false;
        $validator = Validator::make($post, Pessoa::getRules());
        if(!$validator->fails() && $senha){
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $usuario->funcionario->pessoa->datanascimento = $nascimento->format('Y/m/d');
            $usuario->funcionario->pessoa->nome = $dados['nome'];
            $usuario->funcionario->pessoa->sobrenome = $dados['sobrenome'];
            $usuario->funcionario->pessoa->save();
            UsuarioLog::newLog('Alterado dados de usuário.', $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('geral.meusdados')->with('dados',$dados)->withErrors($validator)->with('success',$success)->with('senha',$senha);
    }
}