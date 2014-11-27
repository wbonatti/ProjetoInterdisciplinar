
<?php

class PagamentoAluno extends BaseModel {
    protected $table = 'pagamento_aluno';
    protected $fillable = array('id', 'financeiro_id', 'aluno_id');
        
    public function aluno(){
        return $this->belongsTo('Aluno');
    }
    public function financeiro(){
        return $this->belongsTo('Financeiro');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
