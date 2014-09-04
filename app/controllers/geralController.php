<?php

Class geralController extends \BaseController
{
    function index()
    {
        $usuario = Autenticacao::getUsuarioLogado();
        $usuario = Usuario::find($usuario['id'])->first();
        $this->layout->content = View::make('geral.index')->with('usuario', $usuario);
    }
}