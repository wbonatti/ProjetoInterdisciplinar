
<?php

class Funcao extends BaseModel {
    protected $table = 'funcao';
    protected $fillable = array('id', 'nome');
    
            
    public static function getRules(){
        return [

        ];
    }
}
