<?php

Class Autenticacao
{
    
    /**
     * Efetua login no usuario
     * @param type $post
     * @return boolean
     */
    
    public static function efetuaLogin($post){
        $usuario = Usuario::where('email', '=', $post['email'])->where('senha', '=', $post['senha'])->first();
        if(isset($usuario->id)){
            UsuarioLog::newLog('Efetuado login como '.$post['email'], $usuario->id);
            $usuario = [ 'id'=>$usuario->id, 'email'=>$usuario->email];
            Session::put('usuario', $usuario);
            return true;
        }
        return 'Usuário não encontrado.';
    }
    
    /**
     * Verifica se o usuário está logado
     * @return boolean
     */
    public static function verificaLogin(){
        return Session::has('usuario');
    }
    
    /**
     * Retorna o usuário logado no sistema
     * @return [object]
     */
    public static function getUsuarioLogado(){
        return Session::get('usuario');
    }


    /**
     * Efetua logout do usuário
     * @return boolean
     */
    public static function logout(){
        Session::flush();
        return Redirect::to('/');
    }
}