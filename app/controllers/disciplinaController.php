<?php

Class disciplinaController extends \BaseController
{
    public $menu = 3;
    public $title = 'Administrar';
    
    function index()
    {
        $disciplinas = Disciplina::paginate(5);
        $turmas = Turma::all();
        $this->layout->content = View::make('administracao.index')->with('disciplinas', $disciplinas)->with('turmas',$turmas);
    }
    
    function novo()
    {
        $turmas = Turma::all(['id', 'nome']);
        $dadosturmas = [
            NULL => 'Não vincular a uma turma.'
        ];
        foreach($turmas as $t){
            $dadosturmas[$t->id] = $t->nome;
        }
        $dados = [
            'nome' => '',
            'valor' => null,
            'turma' => ''
        ];
        $this->layout->content = View::make('disciplina.novo')->with('dados',$dados)->with('turmas',$dadosturmas);
    }
    
    function salvarnovo()
    {
        $post = Input::all();
        $turmas = Turma::all(['id', 'nome']);
        $dadosturmas = [];
        foreach($turmas as $t){
            $dadosturmas[$t->id] = $t->nome;
        }
        $success = false;
        $rules = [
            'nome' => 'required',
            'valor' => 'required|numeric',
        ];
        $validator = Validator::make($post, $rules);
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $disciplina = new Disciplina();
            $disciplina->nome = $post['nome'];
            $disciplina->valor = $post['valor'];
            empty($post['turma'])? $disciplina->turma_id = null: $disciplina->turma_id = $post['turma'];
            $disciplina->save();
            $post = [
                'nome' => '',
                'valor' => null,
                'turma' => ''
            ];
            UsuarioLog::newLog("Criada disciplina ".$disciplina->id.": ".$disciplina->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('disciplina.novo')
                ->with('dados',$post)
                ->withErrors($validator)
                ->with('success',$success)
                ->with('turmas',$dadosturmas);
    }
    
    function deletar($id){
        $disciplina = Disciplina::find($id);
        if(!isset($disciplina->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa disciplina não existe!');
        }else{
            $usuario = Autenticacao::UsuarioLogadoObject();
            UsuarioLog::newLog("Deletada disciplina ".$disciplina->id.": ".$disciplina->nome.".", $usuario->id);
            $disciplina->delete();
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Sucesso!')
                ->with('tipo', 'alert-success')
                ->with('msg','Disciplina deletada com sucesso!');
        }
        $this->index();
    }
    
    function visualizar($id){
        $disciplina = Disciplina::find($id);
        if(!isset($disciplina->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa disciplina não existe!');
        }
        $dados = [
            'nome' => $disciplina->nome,
            'valor' => $disciplina->valor,
            'turma' => 'Não vinculado a uma turma.'
        ];
        if(isset($disciplina->turma->nome)) $dados['turma'] = $disciplina->turma->nome;
        $this->layout->content = View::make('disciplina.visualizar')->with('dados',$dados);
    }
    
    function alterar($id){
        $disciplina = Disciplina::find($id);
        if(!isset($disciplina->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa disciplina não existe!');
        }
        $turmas = Turma::all(['id', 'nome']);
        $dadosturmas = [
            NULL => 'Não vinculado a uma turma.'
        ];
        foreach($turmas as $t){
            $dadosturmas[$t->id] = $t->nome;
        }
        $dados = [
            'nome' => $disciplina->nome,
            'valor' => $disciplina->valor,
            'turma' => ''
        ];
        if(isset($disciplina->turma->id)) $dados['turma'] = $disciplina->turma->id;
        $this->layout->content = View::make('disciplina.novo')->with('dados',$dados)->with('turmas',$dadosturmas);
    }
    
    function salvaralterar($id){
        $disciplina = Disciplina::find($id);
        if(!isset($disciplina->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa disciplina não existe!');
        }
        $turmas = Turma::all(['id', 'nome']);
        $dadosturmas = [
            NULL => 'Não vinculado a uma turma.'
        ];
        foreach($turmas as $t){
            $dadosturmas[$t->id] = $t->nome;
        }
        $post = Input::all();
        $success = false;
        $rules = [
            'nome' => 'required',
            'valor' => 'required|numeric',
        ];
        $validator = Validator::make($post, $rules);
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $disciplina->nome = $post['nome'];
            $disciplina->valor = $post['valor'];
            empty($post['turma'])? $disciplina->turma_id = null: $disciplina->turma_id = $post['turma'];
            $disciplina->update();
            UsuarioLog::newLog("Alterada disciplina ".$disciplina->id.": ".$disciplina->nome.".", $usuario->id);
            $success = true;
        }
        if(isset($disciplina->turma->id)) $dados['turma'] = $disciplina->turma->id;
        $this->layout->content = View::make('disciplina.alterar')
                ->withErrors($validator)
                ->with('dados',$post)
                ->with('success',$success)
                ->with('turmas',$dadosturmas);
    }
}