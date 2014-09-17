<?php

Class geralController extends \BaseController
{
    public $menu = 0;
    public $title = 'Geral';
    
    function index()
    {
        $usuario = Autenticacao::getUsuarioLogado();
        $usuario = Usuario::where('id','=',$usuario['id'])->first();
        $aniversariantes = Pessoa::whereRaw('month(datanascimento) = month(now())')->get();
        $logs = UsuarioLog::where('usuario_id','=',$usuario->id)->orderByRaw('DATE(data) DESC')->limit(10)->get();
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
}