
<?php

class Funcao extends BaseModel {
    protected $table = 'funcao';
    protected $fillable = array('id', 'nome');
    
    function funcionarios(){
        return $this->HasMany('Funcionario');
    }        
    public static function getRules(){
        return [

        ];
    }
}
