<?php

Class financeiroController extends \BaseController
{
    public $menu = 4;
    public $title = 'Financeiro';
    
    function index()
    {
        $pagamentos = Financeiro::join('pagamento_funcionario', 'financeiro.id', '=', 'pagamento_funcionario.financeiro_id')->orderBy('data','DESC')->limit(5)->get();
        $mensalidades = Financeiro::join('pagamento_aluno', 'financeiro.id', '=', 'pagamento_aluno.financeiro_id')->orderBy('data','DESC')->limit(5)->get();
        $totalPagamentos = DB::select(DB::raw("select 
            SUM(valor) as total
        from
            financeiro
                inner join
            pagamento_funcionario ON financeiro.id = pagamento_funcionario.financeiro_id
        order by financeiro.data DESC"));
        $totalMensalidades = DB::select(DB::raw("select 
            SUM(valor) as total
        from
            financeiro
                inner join
            pagamento_aluno ON financeiro.id = pagamento_aluno.financeiro_id
        order by financeiro.data DESC"));
        
        $totalPagamentos = $totalPagamentos[0]->total;
        $totalMensalidades = $totalMensalidades[0]->total;
        $saldo = $totalMensalidades - $totalPagamentos;
        $this->layout->content = View::make('financeiro.index')
                ->with('pagamentos',$pagamentos)
                ->with('mensalidades',$mensalidades)
                ->with('totalpagamentos',$totalPagamentos)
                ->with('totalmensalidades',$totalMensalidades)
                ->with('saldo',$saldo);
    }
}