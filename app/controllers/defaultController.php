<?php

Class defaultController extends \BaseController
{
    public $layout = 'default.loginlayout';
    public $menu = ' ';
    public $title = 'Intranet';

    
    function login()
    {
        $this->layout->content = View::make('default.login');
    }
    
    function autenticar()
    {
        $erro = ' ';
        $rules = Usuario::getRules();
        
        $validator = Validator::make(Input::all(), $rules);
        
        if (!$validator->fails()):
            if(Autenticacao::efetuaLogin(Input::all()) == true) return Redirect::to('/');
            else $erro = Autenticacao::efetuaLogin(Input::all());
        endif;
        $this->layout->content = View::make('default.login')->withErrors($validator)->withInput(Input::except('senha'))->with('erro', $erro);
    }
}