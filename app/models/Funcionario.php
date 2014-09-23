
<?php

class Funcionario extends BaseModel {
    protected $table = 'funcionario';
    protected $fillable = array('id', 'cpf', 'rg', 'salario', 'pessoa_id', 'funcao_id');
    
    public function usuario(){
        return $this->HasOne('Usuario');
    }
    
    public function funcao(){
        return $this->BelongsTo('Funcao');
    }
    
    public function pessoa(){
        return $this->BelongsTo('Pessoa');
    }
    
    public static function getRules(){
        return [
            'cpf'=>'required|numeric',
            'rg'=>'required|numeric',
            'salario'=>'required|numeric',
            'funcao'=>'required|numeric'
        ];;
    }
    
}
