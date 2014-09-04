
<?php

class Pessoa extends BaseModel {
    protected $table = 'pessoa';
    protected $fillable = array('id', 'nome', 'sobrenome', 'datanascimento');
        
    public function funcionario(){
        return $this->HasOne('Funcionario');
    }   
    
    public function usuario(){
        return $this->HasOne('Usuario');
    }
    public static function getRules(){
        return [

        ];
    }
}
