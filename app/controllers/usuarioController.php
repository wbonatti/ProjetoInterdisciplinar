<?php

Class usuarioController extends \BaseController
{
    public $menu = 5;
    public $title = 'Usuário';
    
    function index()
    {
        $this->layout->content = View::make('usuario.index');
    }
}