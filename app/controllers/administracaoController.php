<?php

Class administracaoController extends \BaseController
{
    public $menu = 3;
    public $title = 'Administração';
    
    function index()
    {
        $this->layout->content = View::make('administracao.index');
    }
}