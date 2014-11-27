<?php

Class registroController extends \BaseController
{
    public $menu = 6;
    public $title = 'Registro';
    
    function index()
    {
        $get = Input::get();
        $dados = [
            'filtro' => 'todos'
        ];
        if(isset($get['filtro']) && $get['filtro'] != 'todos'){
            $dados['filtro'] = $get['filtro'];
            $usuario = Usuario::find($get['filtro']);
            $registro = UsuarioLog::where('usuario_id','=',$usuario->id)->orderByRaw('id DESC')->paginate(10);
        }
        else{
            $registro = UsuarioLog::orderByRaw('id DESC')->paginate(10);
        }
        $usuarios = Usuario::all();
        $dadosusuarios = [
            'todos' => 'Mostrar Tudo'
        ];
        foreach($usuarios as $u){
            $dadosusuarios[$u->id] = $u->funcionario->pessoa->nome.' '.$u->funcionario->pessoa->sobrenome;
        }
        $this->layout->content = View::make('registro.index')
                ->with('logs', $registro)
                ->with('usuarios', $dadosusuarios)
                ->with('dados', $dados);
    }
}