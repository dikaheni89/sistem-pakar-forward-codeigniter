<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require (APPPATH . '/libraries/REST_Controller.php');
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\REST_Controller;
class Server extends REST_Controller{
    public function login_get(){
        $id = $this->get('username');
        if ($id === null) {
            $login = $this->model_app->view('admin')->result_array();
        }else{
            $login = $this->model_app->view_where('admin', ['username' => $id])->result_array();
        }

        if ($login) {
            $this->response([
                'status'    => true,
                'data'      => $login
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Data Admin Tidak Ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function admin_get(){
        $id = $this->get('idadmin');
        if ($id === null) {
            $admin = $this->model_app->view('admin')->result_array();
        }else{
            $admin = $this->model_app->view_where('admin', ['idadmin' => $id])->row_array();
        }

        if ($admin) {
            $this->response([
                'status'    => true,
                'data'      => $admin
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Data Admin Tidak Ditemukan'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function user_get(){
        $id = $this->get('idusers');
        if ($id === null) {
            $user = $this->model_app->view('users')->result_array();
        }else{
            $user = $this->model_app->view_where('users', ['idusers' => $id])->row_array();
        }

        if ($user) {
            $this->response([
                'status'    => true,
                'data'      => $user
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Data users Tidak Ditemukan'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function penyakit_get(){
        $id = $this->get('kd_penyakit');
        if ($id === null) {
            $penyakit = $this->model_app->view('penyakit')->result_array();
        }else{
            $penyakit = $this->model_app->view_where('penyakit', ['kd_penyakit' => $id])->row_array();
        }

        if ($penyakit) {
            $this->response([
                'status'    => true,
                'data'      => $penyakit
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Data Penyakit Tidak Ditemukan'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function rule_get(){
        $id = $this->get('id_rule');
        if ($id === null) {
            $rule = $this->model_app->view_join_two('pengetahuan', 'gejala', 'penyakit', 'kd_gejala', 'kd_penyakit')->result_array();
        }else{
            $rule = $this->model_app->view_where('pengetahuan', ['id_analisis_solusi' => $id])->row_array();
        }

        if ($rule) {
            $this->response([
                'status'    => true,
                'data'      => $rule
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Data Rule Tidak Ditemukan'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function gejala_get(){
        $id = $this->get('kd_gejala');
        if ($id === null) {
            $gejala = $this->model_app->view('gejala')->result_array();
        }else{
            $gejala = $this->model_app->view_where('gejala', ['kd_gejala' => $id])->row_array();
        }

        if ($gejala) {
            $this->response([
                'status'    => true,
                'data'      => $gejala
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Data Gejala Tidak Ditemukan'
            ], REST_Controller::HTTP_NO_CONTENT);
        }
    }

    public function rule_post(){
        $data = [];
        $data['kd_penyakit']  = $this->post('kd_penyakit');
        $data['kd_gejala']    = $this->post('kd_gejala');
        $data['jika_ya']      = $this->post('jika_ya');
        $data['jika_tidak']   = $this->post('jika_tidak');
        $data['solusi']       = $this->post('solusi');
        if ($this->model_app->tambah('pengetahuan', $data) > 0) {
            $this->response([
                'status'    =>  true,
                'message'   =>  'Data New Created.'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Failed Data Created'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function rule_put(){
        $id = $this->put('id_analisis_solusi');
        $data = [];
        $data['kd_penyakit']  = $this->put('kd_penyakit');
        $data['kd_gejala']    = $this->put('kd_gejala');
        $data['jika_ya']      = $this->put('jika_ya');
        $data['jika_tidak']   = $this->put('jika_tidak');
        $data['solusi']       = $this->put('solusi');
        if ($this->model_app->update('pengetahuan', $data, ['id_analisis_solusi' => $id]) > 0) {
            $this->response([
                'status'    =>  true,
                'message'   =>  'Data New Created.'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Failed Data Created'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function gejala_post(){
        $data = [];
        $data['kd_gejala']  = $this->post('kd_gejala');
        $data['gejala']     = $this->post('gejala');
        if ($this->model_app->tambah('gejala', $data) > 0) {
            $this->response([
                'status'    =>  true,
                'message'   =>  'Data New Created.'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Failed Data Created'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function gejala_put(){
        $id = $this->put('kd_gejala');
        $data = [];
        $data['gejala']     = $this->put('gejala');
        if ($this->model_app->update('gejala', $data,  ['kd_gejala' => $id]) > 0) {
            $this->response([
                'status'    =>  true,
                'message'   =>  'Data New Created.'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Failed Data Created'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function gejala_delete(){
        $id = $this->delete('kd_gejala');
        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'Provide an Id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->model_app->delete('gejala', ['kd_gejala' => $id]) > 0) {
                $this->response([
                    'status'        =>  true,
                    'kd_gejala'   =>  $id,
                    'message'       =>  'Deleted.'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Id not Found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function penyakit_post(){
        if ($this->post('image') === null) {
            $data = [];
            $data['kd_penyakit']        = $this->post('kd_penyakit');
            $data['nama_penyakit']      = $this->post('nama_penyakit');
            $data['keterangan_penyakit']= $this->post('keterangan_penyakit');
            $data['solusi']             = $this->post('solusi');
            if ($this->model_app->tambah('penyakit', $data) > 0) {
                $this->response([
                    'status'    =>  true,
                    'message'   =>  'Data New Created.'
                ], REST_Controller::HTTP_CREATED);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Failed Data Created'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $data = [];
            $data['kd_penyakit']        = $this->post('kd_penyakit');
            $data['nama_penyakit']      = $this->post('nama_penyakit');
            $data['keterangan_penyakit']= $this->post('keterangan_penyakit');
            $data['image']              = $this->post('image');
            $data['solusi']         = $this->post('solusi');
            if ($this->model_app->tambah('penyakit', $data) > 0) {
                $this->response([
                    'status'    =>  true,
                    'message'   =>  'Data New Created.'
                ], REST_Controller::HTTP_CREATED);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Failed Data Created'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function penyakit_put(){
        $id = $this->put('kd_penyakit');
        $data = [];
        $data['nama_penyakit']      = $this->put('nama_penyakit');
        $data['keterangan_penyakit']= $this->put('keterangan_penyakit');
        $data['image']              = $this->put('image');
        $data['solusi']         = $this->put('solusi');
        if ($this->model_app->update('penyakit', $data, ['kd_penyakit' => $id]) > 0) {
            $this->response([
                'status'    =>  true,
                'message'   =>  'Data Has been succses update.'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Failed Data Update'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function penyakit_delete(){
        $id = $this->delete('kd_penyakit');
        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'Provide an Id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->model_app->delete('penyakit', ['kd_penyakit' => $id]) > 0) {
                $this->response([
                    'status'        =>  true,
                    'kd_penyakit'   =>  $id,
                    'message'       =>  'Deleted.'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Id not Found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function admin_post(){
        if ($this->post('image') === null) {
            $data = [];
            $data['nama_admin']     = $this->post('nama_admin');
            $data['alamat']         = $this->post('alamat');
            $data['email']          = $this->post('email');
            $data['no_telp']        = $this->post('no_telp');
            $data['username']       = $this->post('username');
            $data['password']       = $this->post('password');
            $data['status_active']  = $this->post('status_active');
            if ($this->model_app->tambah('admin', $data) > 0) {
                $this->response([
                    'status'    =>  true,
                    'message'   =>  'Data New Created.'
                ], REST_Controller::HTTP_CREATED);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Failed Data Created'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $data = [];
            $data['nama_admin']     = $this->post('nama_admin');
            $data['alamat']         = $this->post('alamat');
            $data['email']          = $this->post('email');
            $data['no_telp']        = $this->post('no_telp');
            $data['username']       = $this->post('username');
            $data['password']       = $this->post('password');
            $data['image']          = $this->post('image');
            $data['status_active']  = $this->post('status_active');
            if ($this->model_app->tambah('admin', $data) > 0) {
                $this->response([
                    'status'    =>  true,
                    'message'   =>  'Data New Created.'
                ], REST_Controller::HTTP_CREATED);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Failed Data Created'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function admin_put(){
        $id = $this->put('idadmin');
        $data = [];
        $data['nama_admin']     = $this->put('nama_admin');
        $data['alamat']         = $this->put('alamat');
        $data['email']          = $this->put('email');
        $data['no_telp']        = $this->put('no_telp');
        $data['username']       = $this->put('username');
        $data['password']       = $this->put('password');
        $data['image']          = $this->put('image');
        $data['status_active']  = $this->put('status_active');
        if ($this->model_app->update('admin', $data, ['idadmin' => $id]) > 0) {
            $this->response([
                'status'    =>  true,
                'message'   =>  'Data Has been succses update.'
            ], REST_Controller::HTTP_NO_CONTENT);
        }else{
            $this->response([
                'status'    => false,
                'message'   => 'Failed Data Update'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function admin_delete(){
        $id = $this->delete('idadmin');
        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'Provide an Id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->model_app->delete('admin', ['idadmin' => $id]) > 0) {
                $this->response([
                    'status'    =>  true,
                    'idadmin'   =>  $id,
                    'message'   =>  'Deleted.'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Id not Found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function rule_delete(){
        $id = $this->delete('id_analisis_solusi');
        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'Provide an Id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->model_app->delete('pengetahuan', ['id_analisis_solusi' => $id]) > 0) {
                $this->response([
                    'status'    =>  true,
                    'id_analisis_solusi'   =>  $id,
                    'message'   =>  'Deleted.'
                ], REST_Controller::HTTP_NO_CONTENT);
            }else{
                $this->response([
                    'status'    => false,
                    'message'   => 'Id not Found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
