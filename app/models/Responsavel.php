
<?php

class Responsavel extends BaseModel {
    protected $table = 'responsavel';
    protected $fillable = array('id', 'pessoa_id', 'aluno_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
