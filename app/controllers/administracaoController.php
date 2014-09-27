<?php

Class administracaoController extends \BaseController
{
    public $menu = 3;
    public $title = 'Administração';
    
    function index()
    {
        $disciplinas = Disciplina::paginate(5);
        $turmas = Turma::all();
        $this->layout->content = View::make('administracao.index')->with('disciplinas', $disciplinas)->with('turmas',$turmas);
    }
}