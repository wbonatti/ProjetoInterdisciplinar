<?php

Class Autenticacao
{
    
    /**
     * Efetua login no usuario
     * @param type $post
     * @return boolean
     */
    
    public static function efetuaLogin($post){
        $usuario = Usuario::where('usuario', '=', $post['usuario'])->where('senha', '=', $post['senha'])->first();
        if(isset($usuario->id)){
            $usuario = [ $usuario->id, $usuario->nome];
            Session::put('usuario', $usuario);
            return true;
        }
        return false;
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