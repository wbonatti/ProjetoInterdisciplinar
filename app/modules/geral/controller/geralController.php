<?php

Class geralController extends \BaseController
{

    function inicio()
    {
        if(!Autenticacao::verificaLogin())
        {
            return Redirect::to('/');
        }
        $view = View::make('default::header');
        $view .= View::make('geral::inicio');
        $view .= View::make('default::footer');
        return $view;
        
    }
}