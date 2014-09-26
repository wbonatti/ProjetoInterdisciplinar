
<?php

class Categoria extends BaseModel {
    protected $table      = 'categoria';
    protected $fillable = array('id', 'nome');
        
    
    public function usuario(){
        return $this->HasOne('Usuario');
    }
    
    public function permissao(){
        return $this->HasMany('Permissao');
    }
    public static function getRules(){
        return [

        ];
    }

}
