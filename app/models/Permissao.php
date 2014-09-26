
<?php

class Permissao extends BaseModel {
    protected $table      = 'permissao';
    protected $fillable = array('id', 'tag', 'criar', 'atualizar', 'ler', 'deletar', 'atualizar', 'categoria_id');
        
    
    public function categoria(){
        return $this->belongsTo('Categoria');
    }
    
    public static function getRules(){
        return [

        ];
    }

}
