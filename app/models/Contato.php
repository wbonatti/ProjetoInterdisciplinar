
<?php

class Pessoa extends BaseModel {
    protected $table = 'contato';
    protected $fillable = array('id', 'tipo', 'numero', 'pessoa_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
