<?php

class SolicitantesModel extends CI_Model {
    const DB_TABLE = 'solicitantes';
    const DB_TABLE_ID = 'sol_id';
    const DB_TABLE_NOME = 'sol_nome';
    const DB_TABLE_IDENTIFICACAO = 'sol_identificacao';
    const DB_TABLE_EMAIL = 'sol_email';
    const DB_TABLE_TIMESTAMP = 'sol_timestamp';

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /*public function buscarSolicitantesPorIdentificacao($identificacao){
  	$this->db->select('*');
	$this->db->from(self::DB_TABLE);
	$this->db->where(self::DB_TABLE_IDENTIFICACAO, $identificacao);
	$query = $this->db->get();
        return $query->result_object();
    }

    public function buscarSolicitantesPorId($id){
  	$this->db->select('*');
	$this->db->from(self::DB_TABLE);
	$this->db->where(self::DB_TABLE_ID, $id);
	$query = $this->db->get();
        return $query->result_object();
    }*/
    
    public function inserir($registro){
        $id = 0;
        if($this->db->insert(self::DB_TABLE, $registro)){
          $id = $this->db->insert_id();
        }
        return $id;
    }
 
}
