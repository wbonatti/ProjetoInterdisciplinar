
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
    
    public function responsavel(){
        return $this->HasOne('Responsavel');
    }
    
    public function aluno(){
        return $this->HasOne('Aluno');
    }
    
    public static function getRules(){
        Validator::extend('validYear', function($attribute, $value, $parameters)
        {
            $dt = Carbon\Carbon::createFromFormat('d/m/Y', $value);
            $now = Carbon\Carbon::now();
            return $dt->timestamp < $now->timestamp;
            
        },'Data de nascimento deve ser menor que data atual.');
        return [
            'nome' => [
                'required'
            ],
            'sobrenome' => [
                'required'
            ],
            'datanascimento' => [
                'required',
                'date_format:"d/m/Y"',
                'validYear'
            ]
        ];
    }
}
