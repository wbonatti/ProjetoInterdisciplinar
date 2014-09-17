<?php

Class financeiroController extends \BaseController
{
    public $menu = 4;
    public $title = 'Financeiro';
    
    function index()
    {
        
        $this->layout->content = View::make('financeiro.index');
    }
}