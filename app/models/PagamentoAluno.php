
<?php

class PagamentoAluno extends BaseModel {
    protected $table = 'pagamento_aluno';
    protected $fillable = array('id', 'financeiro_id', 'aluno_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
