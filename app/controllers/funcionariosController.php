<?php

Class funcionariosController extends \BaseController
{
    public $menu = 1;
    public $title = 'Funcionários';
    
    function index()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function alterar($id)
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function salvaralterar($id)
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function visualizar($id)
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function deletar($id)
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function novo()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function salvarnovo()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function novafuncao()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
    
    function salvarfuncao()
    {
        $funcionarios = Funcionario::paginate(10);
        $funcoes = Funcao::all();
        $this->layout->content = View::make('funcionarios.index')
                ->with('funcionarios', $funcionarios)
                ->with('funcoes', $funcoes);
    }
}