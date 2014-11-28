<?php

Class usuarioController extends \BaseController
{
    public $menu = 5;
    public $title = 'Usuário';
    
    function index()
    {
        $usuarios = Usuario::paginate(10);
        $categoria = Categoria::all();
        $this->layout->content = View::make('usuario.index')->with('categorias',$categoria)->with('usuarios',$usuarios);
    }
    
    function novo(){
        $dados = [
            'email' => '',
            'senha' => '',
            'funcionario' => '',
            'categoria' => '',
        ];
        
        $funcionarios = Funcionario::all();
        $arrfuncionario = [];
        foreach($funcionarios as $f){
            $arrfuncionario[$f->id] = $f->pessoa->nome;
        }
        
        $categorias = Categoria::all();
        $arrcategorias = [];
        foreach($categorias as $c){
            $arrcategorias[$c->id] = $c->nome;
        }
        
        $this->layout->content = View::make('usuario.novo')
                ->with('categoria',$arrcategorias)
                ->with('funcionario',$arrfuncionario)
                ->with('dados',$dados);
    }
    
    function salvarnovo(){
        $dados = Input::all();
        
        $funcionarios = Funcionario::all();
        $arrfuncionario = [];
        foreach($funcionarios as $f){
            $arrfuncionario[$f->id] = $f->pessoa->nome;
        }
        
        $categorias = Categoria::all();
        $arrcategorias = [];
        foreach($categorias as $c){
            $arrcategorias[$c->id] = $c->nome;
        }
        
        $rules = Usuario::getRules();
        $validator = Validator::make($dados, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $novousuario = new Usuario();
            $novousuario->email = $dados['email'];
            $novousuario->senha = $dados['senha'];
            $novousuario->categoria_id = $dados['categoria'];
            $novousuario->funcionario_id = $dados['funcionario'];
            $novousuario->save();
            $dados = [
                'email' => '',
                'senha' => '',
                'funcionario' => '',
                'categoria' => '',
            ];
            UsuarioLog::newLog("Criado usuario ".$novousuario->id.": ".$novousuario->email.".", $usuario->id);
            $success = true;
        }
        
        $this->layout->content = View::make('usuario.novo')
                ->with('categoria',$arrcategorias)
                ->with('funcionario',$arrfuncionario)
                ->withErrors($validator)
                ->with('success',$success)
                ->with('dados',$dados);
    }
    
    function alterar($id){
        $usuario = Usuario::find($id);
        if(!isset($usuario->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Esse usuário não existe!');
            $this->index();
            return null;
        }
        $dados = [
            'email' => $usuario->email,
            'senha' => $usuario->senha,
            'funcionario' => $usuario->funcionario_id,
            'categoria' => $usuario->categoria_id,
        ];
        
        $funcionarios = Funcionario::all();
        $arrfuncionario = [];
        foreach($funcionarios as $f){
            $arrfuncionario[$f->id] = $f->pessoa->nome;
        }
        
        $categorias = Categoria::all();
        $arrcategorias = [];
        foreach($categorias as $c){
            $arrcategorias[$c->id] = $c->nome;
        }
        
        $this->layout->content = View::make('usuario.alterar')
                ->with('categoria',$arrcategorias)
                ->with('funcionario',$arrfuncionario)
                ->with('dados',$dados);
    }
    
    function salvaralterar($id){
        $novousuario = Usuario::find($id);
        if(!isset($novousuario->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Esse usuário não existe!');
            $this->index();
            return null;
        }
        
        $dados = Input::all();
        
        $funcionarios = Funcionario::all();
        $arrfuncionario = [];
        foreach($funcionarios as $f){
            $arrfuncionario[$f->id] = $f->pessoa->nome;
        }
        
        $categorias = Categoria::all();
        $arrcategorias = [];
        foreach($categorias as $c){
            $arrcategorias[$c->id] = $c->nome;
        }
        
        $rules = Usuario::getRules();
        $rules['senha'] = '';
        $validator = Validator::make($dados, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $novousuario->email = $dados['email'];
            $novousuario->categoria_id = $dados['categoria'];
            $novousuario->funcionario_id = $dados['funcionario'];
            $novousuario->update();
            $dados = [
                'email' => $novousuario->email,
                'funcionario' => $novousuario->funcionario_id,
                'categoria' => $novousuario->categoria_id,
            ];
            UsuarioLog::newLog("Criado usuario ".$novousuario->id.": ".$novousuario->email.".", $usuario->id);
            $success = true;
        }
        
        $this->layout->content = View::make('usuario.alterar')
                ->with('categoria',$arrcategorias)
                ->with('funcionario',$arrfuncionario)
                ->withErrors($validator)
                ->with('success',$success)
                ->with('dados',$dados);
    }
    
    function deletar($id){
        $dusuario = Usuario::find($id);
        if(!isset($dusuario->id)){
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Erro!')
                ->with('tipo', 'alert-danger')
                ->with('msg','Esse usuário não existe!');
            $this->index();
            return null;
        }
        
        $usuario = Autenticacao::UsuarioLogadoObject();
        UsuarioLog::newLog("Deletado o usuario ".$dusuario->id.": ".$dusuario->email.".", $usuario->id);
        $dusuario->delete();
        
        $this->layout->error = View::make('default.acao')
            ->with('titulo', 'Sucesso!')
            ->with('tipo', 'alert-success')
            ->with('msg','Usuário deletado com sucesso!');
        return $this->index();
    }
}