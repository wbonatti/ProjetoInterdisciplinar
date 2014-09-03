<?php

Class geralController extends \BaseController
{
    public $layout = 'default.layout';
    
    function index()
    {
        $this->layout->nest('content','geral.index');
    }
}