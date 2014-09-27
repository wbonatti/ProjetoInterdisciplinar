
<?php

class Disciplina extends BaseModel {
    protected $table = 'disciplina';
    protected $fillable = array('id', 'nome', 'turma_id', 'valor', 'functionario_id');
        
    
    public function notas(){
        return $this->HasMany('Nota');
    }
    public function alunos(){
        return $this->HasMany('AlunoDisciplina');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
