<?php

Class registroController extends \BaseController
{
    public $menu = 5;
    
    function index()
    {
        
        $registro = UsuarioLog::orderByRaw('DATE(data) DESC')->paginate(10);
        $this->layout->content = View::make('registro.index')
                ->with('logs', $registro);
    }
}