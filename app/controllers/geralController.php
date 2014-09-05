<?php

Class geralController extends \BaseController
{
    function index()
    {
        $usuario = Autenticacao::getUsuarioLogado();
        $usuario = Usuario::where('id','=',$usuario['id'])->first();
        $aniversariantes = Pessoa::whereRaw('month(datanascimento) = month(now())')->get();
        $logs = UsuarioLog::where('usuario_id','=',$usuario->id)->orderByRaw('DATE(data) DESC')->limit(10)->get();
        $mes = Carbon\Carbon::now()->formatLocalized('%B');
        $this->layout->content = View::make('geral.index')
        ->with([
            'aniversariantes' => $aniversariantes,
            'mes' => $mes,
            'logs' => $logs
        ]);
    }
}