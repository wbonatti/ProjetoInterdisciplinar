<?php

Class geralController extends \BaseController
{
    function index()
    {
        $usuario = Autenticacao::getUsuarioLogado();
        $usuario = Usuario::find($usuario['id'])->first();
        $aniversariantes = Pessoa::whereRaw('month(datanascimento) = month(now())')->get();
        $mes = Carbon\Carbon::now()->formatLocalized('%B');
        $this->layout->content = View::make('geral.index')->with('aniversariantes', $aniversariantes)->with('mes',$mes);
    }
}