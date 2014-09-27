
<?php

class Turma extends BaseModel {
    protected $table = 'turma';
    protected $fillable = array('id', 'nome', 'turno');
        
    public function disciplinas(){
        return $this->HasMany('Disciplina');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
