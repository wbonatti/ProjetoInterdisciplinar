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
}