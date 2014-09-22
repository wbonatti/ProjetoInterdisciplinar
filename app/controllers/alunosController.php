<?php

Class alunosController extends \BaseController
{
    public $menu = 2;
    public $title = 'Alunos';
    
    function index()
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function novo()
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function salvarnovo()
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function alterar($id)
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function salvaralterar($id)
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function deletar($id)
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function visualizar($id)
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
}