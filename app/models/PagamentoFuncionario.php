
<?php

class PagamentoFuncionario extends BaseModel {
    protected $table = 'pagamento_funcionario';
    protected $fillable = array('id', 'fincanceiro_id', 'funcionario_id');
        
    
    public static function getRules(){
        return [

        ];
    }
}
