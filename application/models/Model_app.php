<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_app extends CI_Model {
    public function view($table){
        return $this->db->get($table);
    }

    public function view_where($table, $data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_join_two($table1,$table2,$table3,$data1,$data2){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$data1.'='.$table2.'.'.$data1);
        $this->db->join($table3, $table1.'.'.$data2.'='.$table3.'.'.$data2);
        return $this->db->get();
    }

    public function view_join_where($table1,$table2,$table3,$data1,$data2,$id){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$data1.'='.$table2.'.'.$data1);
        $this->db->join($table3, $table1.'.'.$data2.'='.$table3.'.'.$data2);
        $this->db->where($id);
        return $this->db->get();
    }

    public function counts($table){
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
            } else {
            return 0;
        }
    }

    public function hitung(){
        $query = $this->db->query("SELECT *, COUNT('hasil_diagnosis.idusers') as idusers FROM hasil_diagnosis JOIN users ON hasil_diagnosis.idusers=users.idusers GROUP BY hasil_diagnosis.idusers");
        return $query;
    }

    public function ubah($table, $where=array(), $data=array()){
        $update = $this->db
            ->where($where)
            ->update($table, $data);
        return $update;
    }

    public function kode1($table,$id){
        $this->db->select('RIGHT('.$table.'.'.$id.',2) as "'.$id.'"', FALSE);
        $this->db->order_by($id,'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);
        if ($query->num_rows() <> 0) {
            $data       =   $query->row();
            $kode_auto  =   intval($data->kd_penyakit) + 1;
        } else {
            $kode_auto  =   1;
        }
        $kodemax    =   str_pad($kode_auto, 2, "0", STR_PAD_LEFT);
        $kodetampil =   "P".$kodemax;
        return $kodetampil;
    }

    public function kode2($table,$id){
        $this->db->select('RIGHT('.$table.'.'.$id.',2) as "'.$id.'"', FALSE);
        $this->db->order_by($id,'DESC');
        $this->db->limit(1);
        $query = $this->db->get($table);
        if ($query->num_rows() <> 0) {
            $data       =   $query->row();
            $kode_auto  =   intval($data->kd_gejala) + 1;
        } else {
            $kode_auto  =   1;
        }
        $kodemax    =   str_pad($kode_auto, 2, "0", STR_PAD_LEFT);
        $kodetampil =   "G".$kodemax;
        return $kodetampil;
    }

    public function count($table, $fields){
        $this->db->select("*, COUNT(IF(".$fields." = 'Y', ".$fields.", NULL)) as Active, COUNT(IF(".$fields." != 'Y', ".$fields.", NULL)) as Non_Active");
        return $this->db->get($table);
    }

    public function tambah($table,$data){
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function delete($table, $id) {
        $this->db->delete($table, $id);
        return $this->db->affected_rows();
    }

    public function update($table, $data, $id){
        $this->db->update($table, $data, $id); 
        return $this->db->affected_rows();
    }

    public function edit($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }
}