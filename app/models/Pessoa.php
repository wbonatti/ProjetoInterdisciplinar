
<?php

class Pessoa extends Eloquent {
    protected $fillable = array('id', 'nome', 'sobrenome', 'datanascimento');

    public function funcao() {
            return $this->hasMany('Funcao');
    }
}
