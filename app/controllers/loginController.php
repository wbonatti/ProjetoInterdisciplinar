<?php

Class loginController extends \BaseController
{
    public $layout = 'default.notlogged_layout';
    public $title = 'Login';
    /**
     * Autentica e redireciona o usuário
     * 
     */
    function index()
    {
        $this->layout->content = View::make('login.index');
    }
    /**
     * Autentica e redireciona o usuário
     * 
     */
    function autenticar()
    {
        $erro = ' ';
        $rules = Usuario::getRules();
        
        $validator = Validator::make(Input::all(), $rules);
        
        if (!$validator->fails()):
            if(Autenticacao::efetuaLogin(Input::all()) == true) return Redirect::to('/');
            else $erro = Autenticacao::efetuaLogin(Input::all());
        endif;
        $this->layout->content = View::make('login.index')->withErrors($validator)->withInput(Input::except('senha'))->with('erro', $erro);
    }
}
