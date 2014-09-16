
<?php

class Funcao extends BaseModel {
    protected $table = 'funcao';
    protected $fillable = array('id', 'nome');
    
    function funcionario(){
        return $this->HasMany('Funcionario');
    }        
    public static function getRules(){
        return [

        ];
    }
}
