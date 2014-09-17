<?php

Class funcionariosController extends \BaseController
{
    public $menu = 1;
    
    function index()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
}