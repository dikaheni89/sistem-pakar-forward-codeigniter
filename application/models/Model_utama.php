<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_utama extends CI_Model {
    public function view($table){
        return $this->db->get($table);
    }

    public function view_where($table, $data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_join($table1,$table2,$table3,$data1,$data2,$order){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$data1.'='.$table2.'.'.$data1);
        $this->db->join($table3, $table1.'.'.$data2.'='.$table3.'.'.$data2);
        $this->db->order_by($order, 'ASC', 1);
        return $this->db->get();
    }

    public function get_diagnosis($where=''){
        return $this->db->query("SELECT * FROM pengetahuan JOIN penyakit JOIN gejala ON pengetahuan.kd_penyakit=penyakit.kd_penyakit AND pengetahuan.kd_gejala=gejala.kd_gejala ORDER BY id_analisis_solusi='".$where."' ASC LIMIT 1");
    }

    public function view_join_where($table1,$table2,$table3,$data1,$data2,$id){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$data1.'='.$table2.'.'.$data1);
        $this->db->join($table3, $table1.'.'.$data2.'='.$table3.'.'.$data2);
        $this->db->where($id);
        return $this->db->get();
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }
}
