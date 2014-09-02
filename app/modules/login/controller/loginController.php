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
            'usuario' => 'required|email',
            'senha' => 'required|min:8'
        ];
        $messages = array(
            'required' => 'Você deve preencher o campo :attribute.',
            'email' => 'O campo :attribute deve ser um email válido.',
            'min' => 'O campo :attribute deve ter ao menos 8 caracteres.',
        );
        
        $validator = Validator::make(Input::all(), $rules,$messages);
        if (!$validator->fails())
            if(Autenticacao::efetuaLogin(Input::all()))
                return Redirect::to('/inicio');
        
        $view = View::make('login::header');
        $view .= View::make('login::login')->withErrors($validator)->withInput(Input::except('senha'));
        $view.= View::make('login::footer');
        return $view;
    }
}
