<?php

Class Autenticacao
{
    
    /**
     * Efetua login no usuario
     * @param type $post
     * @return boolean
     */
    public static function efetuaLogin($post){
        $usuario = Usuario::where('email','=', $post['email'])->where('senha','=', $post['senha'])->first();
        if(isset($usuario->id)){
            UsuarioLog::newLog('Efetuado login como '.$post['email'], $usuario->id);
            $usuario = [ 'id'=>$usuario->id, 'email'=>$usuario->email];
            Session::put('usuario', $usuario);
            return false;
        }
        return "Usuário ou senha inválidos.";
    }
    /**
     * Verifica se o usuário está logado
     * @return boolean
     */
    public static function permissao($tag, $tipo){
        $usuario = Autenticacao::UsuarioLogadoObject();
        $permissao = Permissao::where('categoria_id','=',$usuario->categoria_id)->where('tag','like',"%$tag%")->where($tipo,'=',1)->get();
        return count($permissao)>0;
    }
    /**
     * Verifica se o usuário está logado
     * @return boolean
     */
    public static function pagepermissao($tags=array()){
        $usuario = Autenticacao::UsuarioLogadoObject();
        foreach ($tags as $tag){
            $permissao = Permissao::where('categoria_id','=',$usuario->categoria_id)
                    ->where('criar','=',0)
                    ->where('atualizar','=',0)
                    ->where('ler','=',0)
                    ->where('excluir','=',0)
                    ->where('tag','=',$tag)
                    ->get();
            if(count($permissao) == 0) return true;
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
     * Retorna o id do usuário logado no sistema
     * @return [object]
     */
    public static function UsuarioLogadoObject(){
        $usuario = Session::get('usuario');
        return Usuario::find($usuario['id']);
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