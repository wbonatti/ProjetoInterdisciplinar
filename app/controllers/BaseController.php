<?php

class BaseController extends Controller {
    public $layout = 'default.layout';
    public $title = 'Intranet';
    public $menu = ' ';
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $menu = [' ',' ',' ',' ',' ',' ', ' '];
            $this->layout = View::make($this->layout);
            if(is_numeric($this->menu)) $menu[$this->menu] = 'active';
            $this->layout->menu = $menu; 
            $this->layout->title = $this->title; 
            if(Autenticacao::verificaLogin()){
                $usuario = Autenticacao::getUsuarioLogado();
                $this->layout->usuario = $usuario;
            }
        }
    }

}