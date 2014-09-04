
<?php

class Aluno extends BaseModel {
    protected $table = 'aluno_disciplina';
    protected $fillable = array('id', 'aluno_id', 'disciplina_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
