<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autenticar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index()
    {
        $name= $this->input->post();
        var_dump($name);
        $data['usuarios'] = $this->usuario_model->getUsuarios();
        $data['title'] = 'Usuarios';
        $this->load->view('usuario/index', $data);
    }

    public function autenticaUsuario()
    {
        !empty($attemptlogin['email']) && !empty($attemptlogin['senha'])?
            $data['object'] = $this->usuario_model->getUsuarios($attemptlogin['email'], $attemptlogin['senha']):
            $data['object'] = [ 'ERRO' => 'Informe email e senha!' ];
            
        $this->load->view('usuario/index', $data);
    }
}