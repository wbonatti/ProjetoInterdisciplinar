
<?php

class Aluno extends BaseModel {
    protected $table = 'aluno';
    protected $fillable = array('id', 'pessoa_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
