<?php
class Usuario_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function getUsuarios($email = FALSE, $senha = FALSE)
    {
        if ($email === FALSE || $senha === FALSE)
        {
            return [ 'ERRO' => 'Informe email e senha!' ];
        }

        $query = $this->db->get_where('USUARIO', array('USUARIOEMAIL' => $email, 'USUARIOSENHA' => $senha));
        $res = [ 'ERRO' => 'Usuário não encontrado!' ];
        if($query->num_rows() == 1) $res = $query->row();
        return $res;
    }
}