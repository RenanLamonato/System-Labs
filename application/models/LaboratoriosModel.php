<?php

class LaboratoriosModel extends CI_Model {
    const DB_TABLE = 'laboratorios';

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function buscarTodosLaboratorios(){
        return $this->db->get(self::DB_TABLE)->result_object();
    }

}
