
<?php

class Categoria extends Eloquent {
    protected $table      = 'categoria';
    protected $fillable = array('id', 'nome');

    public function usuario() {
            return $this->HasOne('Usuario');
    }
}
