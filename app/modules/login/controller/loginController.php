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
            return Redirect::to('/comissoes');
        
        else
        {
            $erro = "Usuário não encontrado!";
            $view = View::make('default::header');
            $view .= View::make('login::login')->with('erro',$erro);
            $view.= View::make('default::footer');
            return $view;
        }
    }
}
