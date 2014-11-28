<?php

Class categoriaController extends \BaseController
{
    public $menu = 5;
    public $title = 'Usuário';
    
    function index()
    {
        $usuarios = Usuario::paginate(10);
        $categoria = Categoria::all();
        $this->layout->content = View::make('usuario.index')->with('categorias',$categoria)->with('usuarios',$usuarios);
    }
    
    function setData($post){
        $dados = [
            //CURDV
            'nome' => '',
            'funcionario' => [0,0,0,0],
            'funcao' => [0,0,0,0],
            'aluno' => [0,0,0,0],
            'turma' => [0,0,0,0],
            'disciplina' => [0,0,0,0],
            'nota' => [0,0,0,0],
            'mensalidade' => [0,0,0,0],
            'salario' => [0,0,0,0],
            'usuario' => [0,0,0,0],
            'categoria' => [0,0,0,0],
            'registro' => 0,
        ];
        if(isset($post['nome'])) $dados['nome'] = $post['nome'];
        
        if(isset($post['funcionarioC'])) $dados['funcionario'][0] = 1;
        if(isset($post['funcionarioE'])) $dados['funcionario'][1] = 1;
        if(isset($post['funcionarioD'])) $dados['funcionario'][2] = 1;
        if(isset($post['funcionarioV'])) $dados['funcionario'][3] = 1;
        
        if(isset($post['funcaoC'])) $dados['funcao'][0] = 1;
        if(isset($post['funcaoE'])) $dados['funcao'][1] = 1;
        if(isset($post['funcaoD'])) $dados['funcao'][2] = 1;
        if(isset($post['funcaoV'])) $dados['funcao'][3] = 1;
        
        if(isset($post['alunoC'])) $dados['aluno'][0] = 1;
        if(isset($post['alunoE'])) $dados['aluno'][1] = 1;
        if(isset($post['alunoD'])) $dados['aluno'][2] = 1;
        if(isset($post['alunoV'])) $dados['aluno'][3] = 1;
        
        if(isset($post['turmaC'])) $dados['turma'][0] = 1;
        if(isset($post['turmaE'])) $dados['turma'][1] = 1;
        if(isset($post['turmaD'])) $dados['turma'][2] = 1;
        if(isset($post['turmaV'])) $dados['turma'][3] = 1;
        
        if(isset($post['disciplinaC'])) $dados['disciplina'][0] = 1;
        if(isset($post['disciplinaE'])) $dados['disciplina'][1] = 1;
        if(isset($post['disciplinaD'])) $dados['disciplina'][2] = 1;
        if(isset($post['disciplinaV'])) $dados['disciplina'][3] = 1;
        
        if(isset($post['notaC'])) $dados['nota'][0] = 1;
        if(isset($post['notaE'])) $dados['nota'][1] = 1;
        if(isset($post['notaD'])) $dados['nota'][2] = 1;
        if(isset($post['notaV'])) $dados['nota'][3] = 1;
        
        if(isset($post['mensalidadeC'])) $dados['mensalidade'][0] = 1;
        if(isset($post['mensalidadeE'])) $dados['mensalidade'][1] = 1;
        if(isset($post['mensalidadeD'])) $dados['mensalidade'][2] = 1;
        if(isset($post['mensalidadeV'])) $dados['mensalidade'][3] = 1;
        
        if(isset($post['salarioC'])) $dados['salario'][0] = 1;
        if(isset($post['salarioE'])) $dados['salario'][1] = 1;
        if(isset($post['salarioD'])) $dados['salario'][2] = 1;
        if(isset($post['salarioV'])) $dados['salario'][3] = 1;
        
        
        if(isset($post['usuarioC'])) $dados['usuario'][0] = 1;
        if(isset($post['usuarioE'])) $dados['usuario'][1] = 1;
        if(isset($post['usuarioD'])) $dados['usuario'][2] = 1;
        if(isset($post['usuarioV'])) $dados['usuario'][3] = 1;
        
        if(isset($post['categoriaC'])) $dados['categoria'][0] = 1;
        if(isset($post['categoriaE'])) $dados['categoria'][1] = 1;
        if(isset($post['categoriaD'])) $dados['categoria'][2] = 1;
        if(isset($post['categoriaV'])) $dados['categoria'][3] = 1;
        
        if(isset($post['registro'])) $dados['registro'] = 1;
        return $dados;
    }
   
    function nova(){
        $dados = [
            //CURDV
            'nome' => '',
            'funcionario' => [0,0,0,0],
            'funcao' => [0,0,0,0],
            'aluno' => [0,0,0,0],
            'turma' => [0,0,0,0],
            'disciplina' => [0,0,0,0],
            'nota' => [0,0,0,0],
            'mensalidade' => [0,0,0,0],
            'salario' => [0,0,0,0],
            'usuario' => [0,0,0,0],
            'categoria' => [0,0,0,0],
            'registro' => 0,
        ];
        
        $this->layout->content = View::make('categoria.novo')
                ->with('dados',$dados);
    }
    
    function salvarnova(){
        $post = Input::all();
        $dados = $this->setData($post);
        $rules = [
            'nome' => 'required'
        ];
        $success = false;
        $validator = Validator::make($dados, $rules);
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $categoria = new Categoria();
            $categoria->nome = $dados['nome'];
            $categoria->save();
            UsuarioLog::newLog("Criada a categoria ".$categoria->id.": ".$categoria->nome.".", $usuario->id);
            unset($dados['nome']);
            $permissao = new Permissao();
            $permissao->tag = 'registro';
            $permissao->ler = 1;
            $permissao->categoria_id = $categoria->id;
            $permissao->save();
            unset($dados['registro']);
            foreach($dados as $key=>$d){
                $permissao = new Permissao();
                $permissao->tag = $key;
                $permissao->criar = $d[0];
                $permissao->atualizar = $d[1];
                $permissao->excluir = $d[2];
                $permissao->ler = $d[3];
                $permissao->categoria_id = $categoria->id;
                $permissao->categoria_id = $categoria->id;
                $permissao->save();
            }
            $dados = [
                //CURDV
                'nome' => '',
                'funcionario' => [0,0,0,0],
                'funcao' => [0,0,0,0],
                'aluno' => [0,0,0,0],
                'turma' => [0,0,0,0],
                'disciplina' => [0,0,0,0],
                'nota' => [0,0,0,0],
                'mensalidade' => [0,0,0,0],
                'salario' => [0,0,0,0],
                'usuario' => [0,0,0,0],
                'categoria' => [0,0,0,0],
                'registro' => 0,
            ];
            $success = true;
        }
        $this->layout->content = View::make('categoria.novo')
                ->with('dados',$dados)
                ->withErrors($validator)
                ->with('success',$success);
    }
    
    function alterar($id){
        $categoria = Categoria::find($id);
        if(!isset($categoria->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa categoria não existe!');
            $this->index();
            return null;
        }
        
        $dados = [
            //CURDV
            'nome' => $categoria->nome,
            'funcionario' => [0,0,0,0],
            'funcao' => [0,0,0,0],
            'aluno' => [0,0,0,0],
            'turma' => [0,0,0,0],
            'disciplina' => [0,0,0,0],
            'nota' => [0,0,0,0],
            'mensalidade' => [0,0,0,0],
            'salario' => [0,0,0,0],
            'usuario' => [0,0,0,0],
            'categoria' => [0,0,0,0],
            'registro' => 0,
        ];
        
        foreach ($categoria->permissoes as $p){
            if($p->tag == 'registro'){
                $dados['registro'] = $p->ler;
                continue;
            }
            $dados[$p->tag] = [$p->criar, $p->atualizar, $p->excluir, $p->ler];
        }
        
        $this->layout->content = View::make('categoria.alterar')
                ->with('dados',$dados);
    }
    
    function salvaralterar($id){
        $categoria = Categoria::find($id);
        if(!isset($categoria->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa categoria não existe!');
            $this->index();
            return null;
        }
        
        $post = Input::all();
        $dados = $this->setData($post);
        $rules = [
            'nome' => 'required'
        ];
        $success = false;
        $data2 = $dados;
        $validator = Validator::make($dados, $rules);
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $categoria->nome = $dados['nome'];
            $categoria->update();
            UsuarioLog::newLog("Alterada a categoria ".$categoria->id.": ".$categoria->nome.".", $usuario->id);
            unset($dados['nome']);
            foreach ($categoria->permissoes as $p){
                $p->delete();
            }
            $permissao = new Permissao();
            $permissao->tag = 'registro';
            $permissao->ler = $dados['registro'];
            $permissao->categoria_id = $categoria->id;
            $permissao->save();
            unset($dados['registro']);
            foreach($dados as $key=>$d){
                $permissao = new Permissao();
                $permissao->tag = $key;
                $permissao->criar = $d[0];
                $permissao->atualizar = $d[1];
                $permissao->excluir = $d[2];
                $permissao->ler = $d[3];
                $permissao->categoria_id = $categoria->id;
                $permissao->categoria_id = $categoria->id;
                $permissao->save();
            }
            $success = true;
        }
        $this->layout->content = View::make('categoria.alterar')
                ->with('dados',$data2)
                ->withErrors($validator)
                ->with('success',$success);
    }
    
    function deletar($id){
        $categoria = Categoria::find($id);
        if(!isset($categoria->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Essa categoria não existe!');
            $this->index();
            return null;
        }
        $usuario = Autenticacao::UsuarioLogadoObject();
        UsuarioLog::newLog("Deletada a categoria ".$categoria->id.": ".$categoria->nome.".", $usuario->id);
        $categoria->delete();
        $this->layout->error = View::make('default.acao')
            ->with('titulo', 'Sucesso!')
            ->with('tipo', 'alert-success')
            ->with('msg','Categoria deletada com sucesso!');
        $this->index();
        
    }
}