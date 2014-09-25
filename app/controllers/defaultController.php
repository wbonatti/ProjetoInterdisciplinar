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
        $errologin = ' ';
        $rules = Usuario::getRules();
        
        $validator = Validator::make(Input::all(), $rules);
        
        if (!$validator->fails()){
            $errologin = Autenticacao::efetuaLogin(Input::all());
            if(!$errologin){
                return Redirect::to('/');
            }
        }
        $this->layout->content = View::make('default.login')->withErrors($validator)->withInput(Input::except('senha'))->with('erro', $errologin);
    }
}