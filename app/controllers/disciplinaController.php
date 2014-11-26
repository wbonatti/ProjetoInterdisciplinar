<?php

Class disciplinaController extends \BaseController
{
    public $menu = 3;
    public $title = 'Administrar';
    
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
            'valor' => '',
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
                'valor' => '',
                'turma' => ''
            ];
            UsuarioLog::newLog("Criada função ".$disciplina->id.": ".$disciplina->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('disciplina.novo')
                ->with('dados',$post)
                ->withErrors($validator)
                ->with('success',$success)
                ->with('turmas',$dadosturmas);
    }
    
    function deletar($id){
        return 'deletar';
    }
    
    function visualizar($id){
        return 'visualizar';
    }
    
    function alterar($id){
        return 'alterar';
    }
}