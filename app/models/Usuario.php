
<?php

class Usuario extends BaseModel {
    protected $table = 'usuario';
    protected $fillable = array('id', 'email', 'senha', 'funcionario_id', 'categoria_id');
    
    
    public function funcionario(){
        return $this->BelongsTo('Funcionario');
    }
    public function pessoa(){
        return $this->BelongsTo('Pessoa');
    }
    public function categoria(){
        return $this->BelongsTo('Categoria');
    }
    
    public static function getRules(){
        return [
            'email' => 'required|email',
            'senha' => 'required'
        ];
    }
}
