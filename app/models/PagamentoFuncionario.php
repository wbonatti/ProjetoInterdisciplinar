
<?php

class PagamentoFuncionario extends BaseModel {
    protected $table = 'pagamento_funcionario';
    protected $fillable = array('id', 'fincanceiro_id', 'funcionario_id');
        
    
    public function funcionario(){
        return $this->belongsTo('Funcionario');
    }
    public function financeiro(){
        return $this->belongsTo('Financeiro');
    }
    
    public static function getRules(){
        return [

        ];
    }
}
