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
            'datanascimentoresponsavel' => '',
            'numerodisciplinas' => 0
        ];        
        $disciplinas = Disciplina::all();
        $arrDisciplina = [];
        foreach($disciplinas as $d){
            $arrDisciplina[$d->id] = $d->id.' - '.$d->nome;
        }
        $this->layout->content = View::make('alunos.novo')
                ->with('dados', $dados)
                ->with('disciplinas', $arrDisciplina);
    }
    
    function salvarnovo()
    {
        $post = Input::all();  
        $disciplinas = Disciplina::all();
        $arrDisciplina = [];
        foreach($disciplinas as $d){
            $arrDisciplina[$d->id] = $d->id.' - '.$d->nome;
        }
        $disciplinasselectionadas = [];
        if(isset($post['disciplinasvinculadas'])){
            if(isset($post['removerdisciplina'])){
                foreach($post['disciplinasvinculadas'] as $k=>$d){
                    if ($d == $post['removerdisciplina']){
                        unset($post['disciplinasvinculadas'][$k]);
                    }
                }
            }
            $disciplinasselectionadas = $post['disciplinasvinculadas'];
        }
        if(isset($post['novadisciplina']) || isset($post['removerdisciplina'])){
            if(!in_array($post['selectDisciplina'], $disciplinasselectionadas) && !isset($post['removerdisciplina'])){
                $disciplinasselectionadas[] = $post['selectDisciplina'];
            }
            if(count($disciplinasselectionadas) > 0) $disciplinasselectionadas = Disciplina::whereIn('id', $disciplinasselectionadas)->get();
            else $disciplinasselectionadas = null;
            $this->layout->content = View::make('alunos.novo')
                    ->with('dados', $post)
                    ->with('arrdisciplinas',$disciplinasselectionadas)
                    ->with('disciplinas', $arrDisciplina);
            return null;
        }
        
        if(isset($disciplinasselectionadas) && count($disciplinasselectionadas) > 0){
            $disciplinasselectionadas = Disciplina::whereIn('id', $disciplinasselectionadas)->get();
        }else{
            $disciplinasselectionadas = null;
        }
        
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
            
            if(isset($post['disciplinasvinculadas'])){
                foreach ($post['disciplinasvinculadas'] as $dv){
                    $novarelacaodisciplina = new AlunoDisciplina();
                    $novarelacaodisciplina->aluno_id = $aluno->id;
                    $disciplina = Disciplina::find($dv);
                    if(empty($disciplina)) continue;
                    $novarelacaodisciplina->disciplina_id = $dv;
                    $novarelacaodisciplina->save();
                }
            }
            
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
            $disciplinasselectionadas = null;
            $success = true;
        }
        $this->layout->content = View::make('alunos.novo')
                ->with('dados', $post)
                ->with('success',$success)
                ->with('disciplinas', $arrDisciplina)
                ->with('arrdisciplinas',$disciplinasselectionadas)
                ->withErrors($validator);
    }
    
    function alterar($id)
    {
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        
        $arrDisciplina = [];
        $disciplinas = Disciplina::all();
        foreach($disciplinas as $d){
            $arrDisciplina[$d->id] = $d->id.' - '.$d->nome;
        }
        
        $disciplinas = null;
        foreach($aluno->disciplinas as $d){
            $disciplinas[] = $d->disciplina;
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
                ->with('dados', $dados)
                ->with('disciplinas', $arrDisciplina)
                ->with('arrdisciplinas',$disciplinas);
        
    }
    
    function salvaralterar($id)
    {   
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $pessoa = Pessoa::find($aluno->pessoa->id);
        $post = Input::all();
        
        $arrDisciplina = [];
        $disciplinas = Disciplina::all();
        foreach($disciplinas as $d){
            $arrDisciplina[$d->id] = $d->id.' - '.$d->nome;
        }
        
        $disciplinas = null;
        foreach($aluno->disciplinas as $d){
            $disciplinas[] = $d->disciplina;
        }
        $disciplinasselectionadas = [];
        if(isset($post['disciplinasvinculadas'])){
            if(isset($post['removerdisciplina'])){
                foreach($post['disciplinasvinculadas'] as $k=>$d){
                    if ($d == $post['removerdisciplina']){
                        unset($post['disciplinasvinculadas'][$k]);
                    }
                }
            }
            $disciplinasselectionadas = $post['disciplinasvinculadas'];
        }
        
        if(isset($post['novadisciplina']) || isset($post['removerdisciplina'])){
            if(!in_array($post['selectDisciplina'], $disciplinasselectionadas) && !isset($post['removerdisciplina'])){
                $disciplinasselectionadas[] = $post['selectDisciplina'];
            }
            if(count($disciplinasselectionadas) > 0) $disciplinasselectionadas = Disciplina::whereIn('id', $disciplinasselectionadas)->get();
            else $disciplinasselectionadas = null;
            $this->layout->content = View::make('alunos.alterar')
                    ->with('dados', $post)
                    ->with('arrdisciplinas',$disciplinasselectionadas)
                    ->with('disciplinas', $arrDisciplina);
            return null;
        }
        
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
            
            foreach($aluno->disciplinas as $d){
                $d->delete();
            }
            
            if(isset($post['disciplinasvinculadas'])){
                foreach ($post['disciplinasvinculadas'] as $dv){
                    $novarelacaodisciplina = new AlunoDisciplina();
                    $novarelacaodisciplina->aluno_id = $aluno->id;
                    $disciplina = Disciplina::find($dv);
                    if(empty($disciplina)) continue;
                    $novarelacaodisciplina->disciplina_id = $dv;
                    $novarelacaodisciplina->save();

                }
            }
            
            if($post['temresponsavel'] == 1){
                if(isset($aluno->responsavel->id)){
                    $responsavelPessoa = Pessoa::find($aluno->responsavel->pessoa_id);
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
            
            $aluno = Aluno::find($id);
            if(!isset($aluno)){
                return Redirect::to('/alunos');
            }

            $arrDisciplina = [];
            $disciplinas = Disciplina::all();
            foreach($disciplinas as $d){
                $arrDisciplina[$d->id] = $d->id.' - '.$d->nome;
            }

            $disciplinas = null;
            foreach($aluno->disciplinas as $d){
                $disciplinas[] = $d->disciplina;
            }
            $success = true;
        }
        $this->layout->content = View::make('alunos.alterar')
                ->with('dados', $post)
                ->with('success',$success)
                ->with('disciplinas', $arrDisciplina)
                ->with('arrdisciplinas',$disciplinas)
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
        
        $disciplinas = null;
        foreach($aluno->disciplinas as $d){
            $disciplinas[] = $d->disciplina;
        }
        
        $this->layout->content = View::make('alunos.visualizar')
                ->with('dados', $dados)
                ->with('arrdisciplinas',$disciplinas);
    }
    
    
    
    function notas($id){
        $dados = [
            'disciplina' => '',
            'descricao' => '',
            'valor' => '',
        ];
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $disciplinasAluno = [];
        foreach ($aluno->disciplinas as $d){
            $disciplinasAluno[$d->disciplina->id] = $d->disciplina->nome;
        }
        $this->layout->content = View::make('alunos.notas')
                ->with('dados', $dados)
                ->with('aluno', $aluno)
                ->with('disciplinas', $disciplinasAluno);
    }
    
    function salvarnotas($id){
        $post = Input::all();
        if(isset($post['deletar'])){
            $n = Nota::find($post['deletar']);
            if(isset($n->id))
                $n->delete();
            return $this->notas($id);
        }
        $aluno = Aluno::find($id);
        if(!isset($aluno)){
            return Redirect::to('/alunos');
        }
        $success = false;
        $rules = Nota::getRules();
        $validator = Validator::make($post, $rules);
        if(!$validator->fails()){
            $nota = new Nota();
            $nota->descricao = $post['descricao'];
            $nota->valor = $post['valor'];
            $nota->aluno_id = $id;
            $nota->disciplina_id = $post['disciplina'];
            $nota->save();
            return $this->notas($id);
        }
        $disciplinasAluno = [];
        foreach ($aluno->disciplinas as $d){
            $disciplinasAluno[$d->disciplina->id] = $d->disciplina->nome;
        }
        $this->layout->content = View::make('alunos.notas')
                ->withErrors($validator)
                ->with('success',$success)
                ->with('dados', $post)
                ->with('aluno', $aluno)
                ->with('disciplinas', $disciplinasAluno);
    }
    
}