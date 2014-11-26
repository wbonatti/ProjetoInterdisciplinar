<?php

Class turmaController extends \BaseController
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
        $dados = [
            'nome' => '',
            'turno' => ''
        ];
        $this->layout->content = View::make('turma.novo')->with('dados',$dados);
    }
    
    function salvarnovo()
    {
        $post = Input::all();
        $success = false;
        $rules = [
            'nome' => 'required',
            'turno' => 'required'
        ];
        $validator = Validator::make($post, $rules);
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $turma = new Turma();
            $turma->nome = $post['nome'];
            $turma->turno = $post['turno'];
            $turma->save();
            $post = [
                'nome' => '',
                'turno' => ''
            ];
            UsuarioLog::newLog("Criada função ".$turma->id.": ".$turma->nome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('turma.novo')
                ->with('dados',$post)
                ->withErrors($validator)
                ->with('success',$success);
    }
    
    function deletar($id){
        $turma = Turma::find($id);
        if(!isset($turma->id)){
            $this->layout->error = View::make('default.acao')
                    ->with('titulo', 'Erro!')
                    ->with('tipo', 'alert-danger')
                    ->with('msg','Essa turma não existe!');
        }else{
            $usuario = Autenticacao::UsuarioLogadoObject();
            UsuarioLog::newLog("Deletada a turma ".$turma->id.": ".$turma->nome, $usuario->id);
            $turma->delete();
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Sucesso!')
                ->with('tipo', 'alert-success')
                ->with('msg','Turma deletada com sucesso!');
        }
        
        $this->index();
    }
    
    function visualizar($id){
        $turma = Turma::find($id);
        if(!isset($turma->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa turma não existe!');
        }
        
        $dados = [
            'nome' => $turma->nome,
            'turno' => $turma->turno
        ];
        $this->layout->content = View::make('turma.visualizar')->with('dados',$dados);
    }
    
    function alterar($id){
        $turma = Turma::find($id);
        if(!isset($turma->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa turma não existe!');
        }
        
        $dados = [
            'nome' => $turma->nome,
            'turno' => $turma->turno
        ];
        $this->layout->content = View::make('turma.alterar')->with('dados',$dados);
    }
    
    function salvaralterar($id){
        $turma = Turma::find($id);
        if(!isset($turma->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa turma não existe!');
        }
        
        $post = Input::all();
        $success = false;
        $rules = [
            'nome' => 'required',
            'turno' => 'required'
        ];
        $validator = Validator::make($post, $rules);
        if(!$validator->fails()){
            $turma->nome = $post['nome'];
            $turma->turno = $post['turno'];
            $usuario = Autenticacao::UsuarioLogadoObject();
            UsuarioLog::newLog("Alterada a turma ".$turma->id.": ".$turma->nome, $usuario->id);
            $turma->update();
            $success = true;
        }
        $this->layout->content = View::make('turma.alterar')
                ->with('dados',$post)
                ->withErrors($validator)
                ->with('success',$success);
    }
}