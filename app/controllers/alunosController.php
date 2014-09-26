<?php

Class alunosController extends \BaseController
{
    public $menu = 2;
    public $title = 'Alunos';
    
    function index()
    {
        $alunos = Aluno::paginate(10);
        $this->layout->content = View::make('alunos.index')
                ->with('alunos', $alunos);
    }
    
    function novo()
    {
        $dados = [
            'nome' => '',
            'sobrenome' => '',
            'datanascimento' => '',
            'temresponsavel' => '0',
            'nomeresponsavel' => '',
            'sobrenomeresponsavel' => '',
            'datanascimentoresponsavel' => ''
        ];        
        $this->layout->content = View::make('alunos.novo')
                ->with('dados', $dados);
    }
    
    function salvarnovo()
    {
        $post = Input::all();
        $rules = Pessoa::getRules();
        if($post['temresponsavel'] == 1){
            $rules['nomeresponsavel'] = $rules['nome'];
            $rules['sobrenomeresponsavel'] = $rules['sobrenome'];
            $rules['datanascimentoresponsavel'] = $rules['datanascimento'];
        }
        $validator = Validator::make($post, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $aluno = new Aluno;
            $pessoa = new Pessoa;
            $pessoa->nome = $post['nome'];
            $pessoa->sobrenome = $post['sobrenome'];
            $pessoa->datanascimento = $nascimento->format('Y/m/d');
            $pessoa->save();
            $aluno->pessoa_id = $pessoa->id;
            $aluno->save();
            
            if($post['temresponsavel'] == 1){
                $responsavel = new Responsavel;
                $responsavelPessoa = new Pessoa;
                $nascimentoResponsavel = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimentoresponsavel']);
                $responsavelPessoa->nome = $post['nomeresponsavel'];
                $responsavelPessoa->sobrenome = $post['sobrenomeresponsavel'];
                $responsavelPessoa->datanascimento = $nascimentoResponsavel->format('Y/m/d');
                $responsavelPessoa->save();
                $responsavel->pessoa_id = $responsavelPessoa->id;
                $responsavel->aluno_id = $aluno->id;
                $responsavel->save();
            }
            $post = [
                'nome' => '',
                'sobrenome' => '',
                'datanascimento' => '',
                'temresponsavel' => '0',
                'nomeresponsavel' => '',
                'sobrenomeresponsavel' => '',
                'datanascimentoresponsavel' => ''
            ];
            UsuarioLog::newLog("Criado o aluno ".$aluno->id.": ".$aluno->pessoa->nome." ".$aluno->pessoa->sobrenome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('alunos.novo')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
    
    function alterar($id)
    {
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $dados = [
            'nome' => $aluno->pessoa->nome,
            'sobrenome' => $aluno->pessoa->sobrenome,
            'datanascimento' => $aluno->pessoa->getFormatedDate('datanascimento','d/m/Y'),
            'temresponsavel' => '0',
            'nomeresponsavel' => '',
            'sobrenomeresponsavel' => '',
            'datanascimentoresponsavel' => ''
        ];
        if(isset($aluno->responsavel->id)){
            $dados['temresponsavel'] = '1';
            $dados['nomeresponsavel'] = $aluno->responsavel->pessoa->nome;
            $dados['sobrenomeresponsavel'] = $aluno->responsavel->pessoa->sobrenome;
            $dados['datanascimentoresponsavel'] = $aluno->responsavel->pessoa->getFormatedDate('datanascimento','d/m/Y');
        }
        
        $this->layout->content = View::make('alunos.alterar')
                ->with('dados', $dados);
        
    }
    
    function salvaralterar($id)
    {   
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $pessoa = Pessoa::find($aluno->pessoa->id);
        $post = Input::all();
        $rules = Pessoa::getRules();
        if($post['temresponsavel'] == 1){
            $rules['nomeresponsavel'] = $rules['nome'];
            $rules['sobrenomeresponsavel'] = $rules['sobrenome'];
            $rules['datanascimentoresponsavel'] = $rules['datanascimento'];
        }
        $validator = Validator::make($post, $rules);
        $success = false;
        if(!$validator->fails()){
            $usuario = Autenticacao::UsuarioLogadoObject();
            $nascimento = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimento']);
            $pessoa->nome = $post['nome'];
            $pessoa->sobrenome = $post['sobrenome'];
            $pessoa->datanascimento = $nascimento->format('Y/m/d');
            $pessoa->save();
            $aluno->pessoa_id = $pessoa->id;
            $aluno->save();
            if($post['temresponsavel'] == 1){
                if(isset($aluno->responsavel->id)){
                    $responsavelPessoa = Pessoa::find($aluno->responsavel->id_pessoa);
                    $nascimentoResponsavel = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimentoresponsavel']);
                    $responsavelPessoa->nome = $post['nomeresponsavel'];
                    $responsavelPessoa->sobrenome = $post['sobrenomeresponsavel'];
                    $responsavelPessoa->datanascimento = $nascimentoResponsavel->format('Y/m/d');
                    $responsavelPessoa->save();
                }
                else{
                    $responsavel = new Responsavel;
                    $responsavelPessoa = new Pessoa;
                    $nascimentoResponsavel = \Carbon\Carbon::createFromFormat('d/m/Y', $post['datanascimentoresponsavel']);
                    $responsavelPessoa->nome = $post['nomeresponsavel'];
                    $responsavelPessoa->sobrenome = $post['sobrenomeresponsavel'];
                    $responsavelPessoa->datanascimento = $nascimentoResponsavel->format('Y/m/d');
                    $responsavelPessoa->save();
                    $responsavel->pessoa_id = $responsavelPessoa->id;
                    $responsavel->aluno_id = $aluno->id;
                    $responsavel->save();
                }
            }
            else{
                if(isset($aluno->responsavel->id)){
                    $responsavel = Responsavel::find($aluno->responsavel->id);
                    $pessoa = Pessoa::find($aluno->responsavel->pessoa_id);
                    $responsavel->delete();
                    $pessoa->delete();
                    $post['nomeresponsavel'] = ' ';
                    $post['sobrenomeresponsavel'] = ' ';
                    $post['datanascimentoresponsavel'] = ' ';
                }
            }
            UsuarioLog::newLog("Alterado o aluno ".$aluno->id.": ".$aluno->pessoa->nome." ".$aluno->pessoa->sobrenome.".", $usuario->id);
            $success = true;
        }
        $this->layout->content = View::make('alunos.alterar')
                ->with('dados', $post)
                ->with('success',$success)
                ->withErrors($validator);
    }
    
    function deletar($id)
    {
        $aluno = Aluno::find($id);
        if(isset($aluno)){
            $usuario = Autenticacao::UsuarioLogadoObject();
            if(isset($aluno->responsavel->id)){
                $pessoa = Pessoa::find($aluno->responsavel->pessoa_id);
                $pessoa->delete();
            }
            $pessoa = Pessoa::find($aluno->pessoa->id);
            UsuarioLog::newLog("Deletado o aluno ".$aluno->id.": ".$aluno->pessoa->nome." ".$aluno->pessoa->nome.".", $usuario->id);
            $pessoa->delete();
            $this->layout->error = View::make('default.acao')
                ->with('titulo', 'Sucesso!')
                ->with('tipo', 'alert-success')
                ->with('msg','Aluno deletado com sucesso!');
            $this->index();
        }
        else{
            return Redirect::to('/alunos');
        }
    }
    
    function visualizar($id)
    {
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $dados = [
            'nome' => $aluno->pessoa->nome,
            'sobrenome' => $aluno->pessoa->sobrenome,
            'datanascimento' => $aluno->pessoa->getFormatedDate('datanascimento','d/m/Y'),
            'temresponsavel' => '0',
            'nomeresponsavel' => '',
            'sobrenomeresponsavel' => '',
            'datanascimentoresponsavel' => ''
        ];
        
        if(isset($aluno->responsavel->id)){
            $dados['temresponsavel'] = '1';
            $dados['nomeresponsavel'] = $aluno->responsavel->pessoa->nome;
            $dados['sobrenomeresponsavel'] = $aluno->responsavel->pessoa->sobrenome;
            $dados['datanascimentoresponsavel'] = $aluno->responsavel->pessoa->getFormatedDate('datanascimento','d/m/Y');
        }
        
        $this->layout->content = View::make('alunos.visualizar')
                ->with('dados', $dados);
    }
}