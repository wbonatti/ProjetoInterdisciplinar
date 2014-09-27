<?php

Class usuarioController extends \BaseController
{
    public $menu = 5;
    public $title = 'Usuário';
    
    function index()
    {
        $usuarios = Usuario::paginate(10);
        $categoria = Categoria::all();
        $this->layout->content = View::make('usuario.index')->with('categorias',$categoria)->with('usuarios',$usuarios);
    }
}