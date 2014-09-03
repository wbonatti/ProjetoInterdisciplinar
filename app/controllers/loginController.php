<?php

Class loginController extends \BaseController
{
    public $layout = 'default.notlogged_layout';
    /**
     * Autentica e redireciona o usuário
     * 
     */
    function index()
    {
        $this->layout->nest('content','login.index');
    }
    /**
     * Autentica e redireciona o usuário
     * 
     */
    function autenticar()
    {
        $erro = ' ';
        $rules = [
            'usuario' => 'required',
            'senha' => 'required'
        ];
        
        $validator = Validator::make(Input::all(), $rules);
        
        if (!$validator->fails()):
            if(Autenticacao::efetuaLogin(Input::all())) return Redirect::to('/');
            else $erro = 'Usuário ou senha inválidos.';

        endif;
        
        $this->layout->content = View::make('login.index')->withErrors($validator)->withInput(Input::except('senha'))->with('erro', $erro);
    }
}
