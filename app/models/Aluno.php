
<?php

class Aluno extends BaseModel {
    protected $table = 'aluno';
    protected $fillable = array('id', 'pessoa_id');
        
    public function pessoa(){
        return $this->BelongsTo('Pessoa');
    }
    
    public function notas(){
        return $this->HasMany('Nota');
    }
    public function responsavel(){
        return $this->HasOne('Responsavel');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
