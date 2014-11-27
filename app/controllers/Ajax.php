<?php

Class Ajax{
    function disciplina($id){
        $d = Disciplina::find($id);
        if(count($d) < 1){
            return null;
        }
        $disciplina = [
            'id'    => $d->id,
            'nome'  => $d->nome,
            'valor' => $d->valor,
        ];
        !empty($d->funcionario->pessoa->nome)? $disciplina['nomeprofessor'] = $d->funcionario->pessoa->nome: $disciplina['nomeprofessor'] = '';
        !empty($d->turma->nome)? $disciplina['nometurma'] = $d->turma->nome: $disciplina['nometurma'] = '';
        
        return $disciplina;
    }
    function getSalario($id){
        $funcionario = Funcionario::find($id);
        if(!isset($funcionario->id)){
            return 0;
        }
        return $funcionario->salario;
    }
    function getMensalidade($id){
        $aluno = Aluno::find($id);
        if(!isset($aluno->id)){
            return 0;
        }
        $valor = 0;
        foreach($aluno->disciplinas as $d){
            $valor += $d->disciplina->valor;
        }
        return $valor;
    }
}