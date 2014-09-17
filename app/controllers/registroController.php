<?php

Class registroController extends \BaseController
{
    public $menu = 5;
    public $title = 'Registro';
    
    function index()
    {
        $usuarios = Usuario::all();
        $dados = [];
        $dados['todos'] = 'Mostrar Tudo';
        foreach($usuarios as $u){
            $dados[$u->id] = $u->funcionario->pessoa->nome.' '.$u->funcionario->pessoa->sobrenome;
        }
        $registro = UsuarioLog::orderByRaw('DATE(data) DESC')->paginate(10);
        $this->layout->content = View::make('registro.index')
                ->with('logs', $registro)
                ->with('usuarios', $dados);
    }
}