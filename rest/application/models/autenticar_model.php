<?php
class Autenticar_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }
    public function verificaLogin($tokien = FALSE)
    {
        if ($tokien === FALSE)
        {
            return [ 'ERRO' => 'Informe email e senha!' ];;
        }

        $query = $this->db->get_where('AUTENTICADOR', array('TOKIEN' => $tokien));
        return $query->row_array();
    }
}