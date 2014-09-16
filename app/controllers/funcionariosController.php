<?php

Class funcionariosController extends \BaseController
{
    public $menu = 1;
    
    function index()
    {
        $funcionarios = Funcionario::paginate(10);
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios);
    }
}