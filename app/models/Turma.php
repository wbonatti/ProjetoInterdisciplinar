
<?php

class Turma extends BaseModel {
    protected $table = 'turma';
    protected $fillable = array('id', 'nome', 'turno');
        
    
    public static function getRules(){
        return [

        ];
    }
}
