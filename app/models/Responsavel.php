
<?php

class Responsavel extends BaseModel {
    protected $table = 'responsavel';
    protected $fillable = array('id', 'pessoa_id', 'aluno_id');
        
    public function aluno(){
        return $this->HasOne('Aluno');
    }
    
    public function pessoa(){
        return $this->BelongsTo('Pessoa');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
