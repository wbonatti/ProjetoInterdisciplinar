
<?php

class AlunoDisciplina extends BaseModel {
    protected $table = 'aluno_disciplina';
    protected $fillable = array('id', 'aluno_id', 'disciplina_id');
        
    
    public function aluno(){
        return $this->BelongsTo('Aluno');
    }
    public function disciplina(){
        return $this->BelongsTo('Disciplina');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
