
<?php

class Usuario extends Eloquent {
    protected $table = 'usuario';
    protected $fillable = array('id', 'usuario', 'senha', 'categoria_id', 'pessoa_id');
}
