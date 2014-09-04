
<?php

class Disciplina extends BaseModel {
    protected $table = 'disciplina';
    protected $fillable = array('id', 'nome', 'turma_id', 'valor', 'functionario_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
