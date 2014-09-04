
<?php

class UsuarioLog extends BaseModel {
    protected $table      = 'log';
    protected $fillable = array('id', 'descricao','data', 'usuario_id');
    
    public static function newLog($msg, $usuario_id){
        $log = new UsuarioLog();
        $log->descricao = $msg;
        $log->usuario_id = $usuario_id;
        $log->data = date('Y-m-d H:i:s');
        return $log->Save();
    }
}
