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
}