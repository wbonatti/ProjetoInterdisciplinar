
<?php

class Aluno extends BaseModel {
    protected $table = 'aluno';
    protected $fillable = array('id', 'pessoa_id');
        
    public function pessoa(){
        return $this->BelongsTo('Pessoa');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
