<?php

Class loginController extends \BaseController
{
    /**
     * Autentica e redireciona o usuário
     * 
     */
    function autenticar()
    {
        $rules = [
            'usuario' => 'required',
            'senha' => 'required'
        ];
        
        $validator = Validator::make(Input::all(), $rules);
        
        if (!$validator->fails()):
            if(Autenticacao::efetuaLogin(Input::all())):
                return Redirect::to('/inicio');
            endif;
        endif;
        
        $view = View::make('login::header');
        $view .= View::make('login::login')->withErrors($validator)->withInput(Input::except('senha'));
        $view.= View::make('login::footer');
        return $view;
    }
}
