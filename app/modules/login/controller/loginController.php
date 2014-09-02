<?php

Class loginController extends \BaseController
{
    /**
     * Autentica e redireciona o usuário
     * 
     */
    function autenticar()
    {
        $post = Input::all();
        if(Autenticacao::efetuaLogin($post))
            return Redirect::to('/inicio');
        
        else
        {
            $erro = "Usuário não encontrado!";
            $view = View::make('default::LoginHeader');
            $view .= View::make('login::login')->with('erro',$erro);
            $view.= View::make('default::LoginFooter');
            return $view;
        }
    }
}
