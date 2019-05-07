<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReservasModel
 *
 * @author Dreamer
 */
class ReservasModel extends CI_Model {
    const DB_TABLE = 'reservas';

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function inserir($registro){
        $id = 0;
        if($this->db->insert(self::DB_TABLE, $registro)){
          $id = $this->db->insert_id();
        }
        return $id;
    }
    
    /*public function buscarTodasReservas(){
        //return $this->db->get(self::DB_TABLE)->result_object();
        $this->db->select('*');
        $this->db->from(self::DB_TABLE);
        $this->db->join('solicitantes', 'solicitantes.sol_id = reservas.sol_id');
        $query = $this->db->get();
        return $query->result_object();
    }*/

    public function buscarReservasLaboratorio($labId){
        //return $this->db->get(self::DB_TABLE)->result_object();
        $this->db->select('*');
        $this->db->from(self::DB_TABLE);
        $this->db->join('solicitantes', 'solicitantes.sol_id = reservas.sol_id');
        $this->db->join('laboratorios', 'laboratorios.lab_id = reservas.lab_id');
        $this->db->where('laboratorios.lab_id', $labId);
        $query = $this->db->get();
        return $query->result_object();
    }

    public function buscarReservaPorId($resId){
        $this->db->select('*');
        $this->db->from(self::DB_TABLE);
        $this->db->join('solicitantes', 'solicitantes.sol_id = reservas.sol_id');
        $this->db->join('laboratorios', 'laboratorios.lab_id = reservas.lab_id');
        $this->db->where('reservas.res_id', $resId);
        $query = $this->db->get();
        return $query->result_object();
    }
}
