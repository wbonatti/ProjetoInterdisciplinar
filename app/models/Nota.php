
<?php

class Nota extends BaseModel {
    protected $table      = 'notas';
    protected $fillable = array('id', 'descricao', 'nota', 'aluno_id', 'disciplina_id');
        
    
    public function aluno(){
        return $this->belongsTo('Aluno');
    }
    
    public function disciplina(){
        return $this->belongsTo('Disciplina');
    }
    
    public static function getRules(){
        return [
            'valor' => 'required|numeric|between:0,100'
        ];
    }

}
