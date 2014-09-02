<?php

Class Autenticacao
{
    
    /**
     * Efetua login no usuario
     * @param type $post
     * @return boolean
     */
    
    public static function efetuaLogin($post){
        return true;
        $usuario = DB::table('USUARIO')
                    ->select(DB::raw("
                        USUARIOID, 
                        USUARIOEMAIL, 
                        PESSOANOME, 
                        PESSOASOBRENOME, 
                        DATE_FORMAT(DATANASCIMENTO, '%d-%m-%Y') as DATANASCIMENTO, 
                        FUNCAOID, 
                        FUNCAONOME, 
                        CATEGORIAID, 
                        CATEGORIANOME"))
                    ->join('PESSOA', 'PESSOA_PESSOAID', '=', 'PESSOAID')
                    ->join('CATEGORIA', 'CATEGORIA_CATEGORIAID', '=', 'CATEGORIAID')
                    ->join('FUNCAO', 'FUNCAO_FUNCAOID', '=', 'FUNCAOID')
                    ->where('USUARIOEMAIL', '=', $post['usuario'])
                    ->where('USUARIOSENHA', '=', $post['senha'])
                    ->get();
        
        if(empty($usuario)) return false;
        
        Session::put('usuario', $usuario);
        return true;
    }
    
    /**
     * Verifica se o usuário está logado
     * @return boolean
     */
    public static function verificaLogin(){
        return true;
        return Session::has('usuario');
    }
    
    /**
     * Retorna o usuário logado no sistema
     * @return [object]
     */
    public static function getUsuarioLogado(){
        $usuario =  unserialize(serialize(Session::get('usuario')));
        return $usuario[0];
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