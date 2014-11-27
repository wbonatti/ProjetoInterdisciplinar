<?php

Class financeiroController extends \BaseController
{
    public $menu = 4;
    public $title = 'Financeiro';
    
    function index()
    {
        Paginator::setPageName('page_a');
        $pagamentos = Financeiro::join('pagamento_funcionario', 'financeiro.id', '=', 'pagamento_funcionario.financeiro_id')->orderBy('data','DESC')->paginate(5);
        Paginator::setPageName('page_b');
        $mensalidades = Financeiro::join('pagamento_aluno', 'financeiro.id', '=', 'pagamento_aluno.financeiro_id')->orderBy('data','DESC')->paginate(5);
        $totalPagamentos = DB::select(DB::raw("select 
            SUM(valor) as total
        from
            financeiro
                inner join
            pagamento_funcionario ON financeiro.id = pagamento_funcionario.financeiro_id
        order by financeiro.id DESC"));
        $totalMensalidades = DB::select(DB::raw("select 
            SUM(valor) as total
        from
            financeiro
                inner join
            pagamento_aluno ON financeiro.id = pagamento_aluno.financeiro_id
        order by financeiro.id DESC"));
        
        $totalPagamentos = $totalPagamentos[0]->total;
        if(empty($totalPagamentos)) $totalPagamentos = 0;
        $totalMensalidades = $totalMensalidades[0]->total;
        if(empty($totalMensalidades)) $totalMensalidades = 0;
        $saldo = $totalMensalidades - $totalPagamentos;
        $this->layout->content = View::make('financeiro.index')
                ->with('pagamentos',$pagamentos)
                ->with('mensalidades',$mensalidades)
                ->with('totalpagamentos',$totalPagamentos)
                ->with('totalmensalidades',$totalMensalidades)
                ->with('saldo',$saldo);
    }
    
    function deletarsalario($id){
        $pgtoFunc = PagamentoFuncionario::find($id);
        if(!isset($pgtoFunc->id)){
            $this->index();
            $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                    ->with('msg','Esse pagamento não existe!');
            return null;
        }
        $usuario = Autenticacao::UsuarioLogadoObject();
        $funcionario = Funcionario::find($pgtoFunc->funcionario_id);
        UsuarioLog::newLog("Deletado o pagamento de salário ".$pgtoFunc->id." no valor de ".$pgtoFunc->valor." referente ao aluno ".$funcionario->id." - ".$funcionario->pessoa->nome, $usuario->id);
        $financeiro = Financeiro::find($pgtoFunc->financeiro_id);
        $financeiro->delete();
        $this->index();
        $this->layout->error = View::make('default.acao')
            ->with('titulo', 'Sucesso!')
            ->with('tipo', 'alert-success')
            ->with('msg','Salário deletado com sucesso!');
        
    }
    
    function novosalario(){
        $funcionarios = Funcionario::all();
        $dados = [
            'funcionario' => ''
        ];
        $arrfuncionario = [];
        foreach($funcionarios as $f){
            $arrfuncionario[$f->id] = $f->pessoa->nome;
        }
        $this->layout->content = View::make('salario.novo')
                ->with('funcionario',$arrfuncionario)
                ->with('dados',$dados);
    }
    
    function salvarnovosalario(){
        $post = Input::all();
        $funcionario = Funcionario::find($post['funcionario']);
        if(!isset($funcionario->id)){
            $this->novosalario();
            $this->layout->content->success = false;
            return null;
        }
        $financeiro = new Financeiro();
        $financeiro->valor = $funcionario->salario;
        $financeiro->data  = date('Y-m-d H:i:s');
        $financeiro->save();
        $pgtoSalario = new PagamentoFuncionario();
        $pgtoSalario->financeiro_id = $financeiro->id;
        $pgtoSalario->funcionario_id = $funcionario->id;
        $pgtoSalario->save();
        
        $funcionarios = Funcionario::all();
        $arrfuncionario = [];
        foreach($funcionarios as $f){
            $arrfuncionario[$f->id] = $f->pessoa->nome;
        }
        $this->layout->content = View::make('salario.novo')
                ->with('funcionario',$arrfuncionario)
                ->with('dados',$post);
        $this->layout->content->success = true;
        
    }
    
    
    function visualizarsalario($id){
        $pgtoFunc = PagamentoFuncionario::find($id);
        if(!isset($pgtoFunc->id)){
            $this->index();
            $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                    ->with('msg','Esse pagamento não existe!');
            return null;
        }
        $dados = [
            'nome'  => $pgtoFunc->funcionario->pessoa->nome." ".$pgtoFunc->funcionario->pessoa->sobrenome,
            'valor' => $pgtoFunc->financeiro->valor,
            'data' => $pgtoFunc->financeiro->data
        ];
        $this->layout->content = View::make('salario.visualizar')
                ->with('dados',$dados);
    }
    
    function deletarmensalidade($id){
        $pgtoAluno = PagamentoAluno::find($id);
        if(!isset($pgtoAluno->id)){
            $this->index();
            $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                    ->with('msg','Esse pagamento não existe!');
            return null;
        }
        $usuario = Autenticacao::UsuarioLogadoObject();
        $aluno = Aluno::find($pgtoAluno->aluno_id);
        UsuarioLog::newLog("Deletado o pagamento de mensalidade ".$pgtoAluno->id." no valor de ".$pgtoAluno->valor." referente ao funcionário ".$aluno->id." - ".$aluno->pessoa->nome, $usuario->id);
        $financeiro = Financeiro::find($pgtoAluno->financeiro_id);
        $financeiro->delete();
        $this->index();
        $this->layout->error = View::make('default.acao')
            ->with('titulo', 'Sucesso!')
            ->with('tipo', 'alert-success')
            ->with('msg','Mensalidade deletada com sucesso!');

        
    }
    
    function novamensalidade(){
        $alunos = Aluno::all();
        $dados = [
            'aluno' => ''
        ];
        $arralunos = [];
        foreach($alunos as $f){
            $arralunos[$f->id] = $f->pessoa->nome;
        }
        $this->layout->content = View::make('mensalidade.novo')
                ->with('aluno',$arralunos)
                ->with('dados',$dados);
    }
    
    function salvarnovamensalidade(){
        $post = Input::all();
        $aluno = Aluno::find($post['aluno']);
        if(!isset($aluno->id)){
            $this->novamensalidade();
            $this->layout->content->success = false;
            return null;
        }
        $valor = 0;
        foreach($aluno->disciplinas as $d){
            $valor += $d->disciplina->valor;
        }
        $financeiro = new Financeiro();
        $financeiro->valor = $valor;
        $financeiro->data  = date('Y-m-d H:i:s');
        $financeiro->save();
        $pgtoSalario = new PagamentoAluno();
        $pgtoSalario->financeiro_id = $financeiro->id;
        $pgtoSalario->aluno_id = $aluno->id;
        $pgtoSalario->save();
        
        $alunos = Aluno::all();
        $arralunos = [];
        foreach($alunos as $f){
            $arralunos[$f->id] = $f->pessoa->nome;
        }
        $this->layout->content = View::make('mensalidade.novo')
                ->with('aluno',$arralunos)
                ->with('dados',$post);
        $this->layout->content->success = true;
    }
    
    
    function visualizarmensalidade($id){
        $pgtoAluno = PagamentoAluno::find($id);
        if(!isset($pgtoAluno->id)){
            $this->index();
            $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                    ->with('msg','Esse pagamento não existe!');
            return null;
        }
        $dados = [
            'nome'  => $pgtoAluno->aluno->pessoa->nome." ".$pgtoAluno->aluno->pessoa->sobrenome,
            'valor' => $pgtoAluno->financeiro->valor,
            'data' => $pgtoAluno->financeiro->data
        ];
        $this->layout->content = View::make('mensalidade.visualizar')
                ->with('dados',$dados);
    }
}