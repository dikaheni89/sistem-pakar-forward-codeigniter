<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Home extends CI_Controller {
    
    private $_client;

    public function __construct(){
        parent::__construct();
        $this->_client = new Client([
            'base_uri'  => base_url().'api/server/',
        ]);
        $this->logged_in();
    }

    public function logged_in(){
        $cek	=	$this->session->id_session;
		if (!$cek) {
			redirect('main', 'refresh');
		}
    }

    public function index(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $data['test']       = $this->model_app->hitung()->result_array();
        $data['penyakit']   = $this->model_app->counts('penyakit');
        $data['gejala']     = $this->model_app->counts('gejala');
        $data['users']      = $this->model_app->counts('users');
        $data['hasil']      = $this->model_app->counts('hasil_diagnosis');
        $this->template->load('main/template','main/dashboard', $data);
    }

    public function admin(){
        if (isset($_POST['submit'])) {
            $config['upload_path']      = 'media/foto_admin';
            $config['allowed_types']    = 'gif|jpg|png|JPG|JPEG';
            $config['max_size']         = '30000';
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $hasil = $this->upload->data();
            $nama_admin     = $this->input->post('nama_admin');
            $alamat         = $this->input->post('alamat');
            $email          = $this->input->post('email');
            $no_telp        = $this->input->post('no_telp');
            $username       = $this->input->post('username');
            $password       = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $status_active  = 'Y';
            if ($hasil['file_name'] == '') {
                $data = [];
                $data['nama_admin']   = $nama_admin;
                $data['alamat']       = $alamat;
                $data['email']        = $email;
                $data['no_telp']      = $no_telp;
                $data['username']     = $username;
                $data['password']     = $password;
                $data['status_active']= $status_active;
                $data['api-key']      = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }else{
                $data = [];
                $data['nama_admin']   = $nama_admin;
                $data['alamat']       = $alamat;
                $data['email']        = $email;
                $data['no_telp']      = $no_telp;
                $data['username']     = $username;
                $data['password']     = $password;
                $data['image']        = $hasil['file_name'];
                $data['status_active']= $status_active;
                $data['api-key']      = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }
            $response = $this->_client->request('POST', 'admin', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Administrator Berhasil di Di Tambahkan');
            redirect($this->uri->segment(1).'/admin');
        }else{
            $response = $this->_client->request('GET', 'admin', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['record']     = $url['data'];
            $data['rows']       = $this->model_app->count('admin', 'status_active')->row_array();
            $this->template->load('main/template','main/mod_admin/admin', $data);
        }
    }

    public function edit_admin(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $config['upload_path']      = 'media/foto_admin';
            $config['allowed_types']    = 'gif|jpg|png|JPG|JPEG';
            $config['max_size']         = '30000';
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $hasil = $this->upload->data();
            $nama_admin     = $this->input->post('nama_admin');
            $alamat         = $this->input->post('alamat');
            $email          = $this->input->post('email');
            $no_telp        = $this->input->post('no_telp');
            $username       = $this->input->post('username');
            $password       = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $status_active  = 'Y';
            $idadmin        = $this->input->post('idadmin');
            if ($hasil['file_name'] == '') {
                $data = [];
                $data['idadmin']      = $idadmin;
                $data['nama_admin']   = $nama_admin;
                $data['alamat']       = $alamat;
                $data['email']        = $email;
                $data['no_telp']      = $no_telp;
                $data['username']     = $username;
                $data['password']     = $password;
                $data['status_active']= $status_active;
                $data['api-key']      = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }else{
                $data = [];
                $data['idadmin']      = $idadmin;
                $data['nama_admin']   = $nama_admin;
                $data['alamat']       = $alamat;
                $data['email']        = $email;
                $data['no_telp']      = $no_telp;
                $data['username']     = $username;
                $data['password']     = $password;
                $data['image']        = $hasil['file_name'];
                $data['status_active']= $status_active;
                $data['api-key']      = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }
            $response = $this->_client->request('PUT', 'admin', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Administrator Berhasil di Di Rubah');
            redirect($this->uri->segment(1).'/admin');
        }else{
            $response = $this->_client->request('GET', 'admin', [
                'query' => [
                    'idadmin' => $id,
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url  = json_decode($response->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['record']     = $url['data'];
            $this->template->load('main/template','main/mod_admin/edit_admin', $data);
        }
    }

    public function delete_admin(){
        $id = $this->uri->segment(3);
        $response = $this->_client->request('DELETE', 'admin', [
            'form_params' =>  [
                'idadmin'       => $id,
                'api-key'       => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
            ]
        ]);
        $url = json_decode($response->getBody()->getContents(), true);
        $this->session->set_flashdata('success', 'Data Administrator Berhasil di Di Hapus');
        redirect($this->uri->segment(1).'/admin');
    }

    public function isActiveSetter(){

		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? "Y" : "N";
        // echo $id . " - " . $isActive;
		$this->model_app->ubah('admin', 
		array("idadmin" => $id),
		array("status_active"  => $isActive)
		);
    }

    public function isActiveUser(){

		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? "Y" : "N";
        // echo $id . " - " . $isActive;
		$this->model_app->ubah('users', 
		array("idusers" => $id),
		array("status"  => $isActive)
		);
    }
    
    public function users(){
        $response = $this->_client->request('GET', 'user', [
            'query' =>  [
                'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
            ]
        ]);
        $url = json_decode($response->getBody()->getContents(), true);
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $data['record']     = $url['data'];
        $data['rows']       = $this->model_app->count('users', 'status')->row_array();
        $this->template->load('main/template','main/mod_users/users', $data);
    }

    public function penyakit(){
        if (isset($_POST['submit'])) {
            $config['upload_path']      = 'media/foto_penyakit';
            $config['allowed_types']    = 'gif|jpg|png|JPG|JPEG';
            $config['max_size']         = '30000';
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $hasil = $this->upload->data();
            $kd_penyakit            = $this->input->post('kd_penyakit');
            $nama_penyakit          = $this->input->post('nama_penyakit');
            $keterangan_penyakit    = $this->input->post('keterangan_penyakit');
            $solusi                 = $this->input->post('solusi');
            if ($hasil['file_name'] == '') {
                $data = [];
                $data['kd_penyakit']        = $kd_penyakit;
                $data['nama_penyakit']      = $nama_penyakit;
                $data['keterangan_penyakit']= $keterangan_penyakit;
                $data['solusi']             = $solusi;
                $data['api-key']            = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }else{
                $data = [];
                $data['kd_penyakit']        = $kd_penyakit;
                $data['nama_penyakit']      = $nama_penyakit;
                $data['keterangan_penyakit']= $keterangan_penyakit;
                $data['image']              = $hasil['file_name'];
                $data['solusi']             = $solusi;
                $data['api-key']            = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }
            $response = $this->_client->request('POST', 'penyakit', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Penyakit Berhasil di Di Tambahkan');
            redirect($this->uri->segment(1).'/penyakit');
        }else{
            $response = $this->_client->request('GET', 'penyakit', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['kode']       = $this->model_app->kode1('penyakit', 'kd_penyakit');
            $data['record']     = $url['data'];
            $this->template->load('main/template','main/mod_penyakit/penyakit', $data);
        }
    }

    public function edit_penyakit(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $config['upload_path']      = 'media/foto_penyakit';
            $config['allowed_types']    = 'gif|jpg|png|JPG|JPEG';
            $config['max_size']         = '30000';
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $hasil = $this->upload->data();
            $kd_penyakit            = $this->input->post('kd_penyakit');
            $nama_penyakit          = $this->input->post('nama_penyakit');
            $keterangan_penyakit    = $this->input->post('keterangan_penyakit');
            $solusi             = $this->input->post('solusi');
            if ($hasil['file_name'] == '') {
                $data = [];
                $data['kd_penyakit']        = $kd_penyakit;
                $data['nama_penyakit']      = $nama_penyakit;
                $data['keterangan_penyakit']= $keterangan_penyakit;
                $data['solusi']         = $solusi;
                $data['api-key']            = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }else{
                $data = [];
                $data['kd_penyakit']        = $kd_penyakit;
                $data['nama_penyakit']      = $nama_penyakit;
                $data['keterangan_penyakit']= $keterangan_penyakit;
                $data['image']              = $hasil['file_name'];
                $data['solusi']         = $solusi;
                $data['api-key']            = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            }
            $response = $this->_client->request('PUT', 'penyakit', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Penyakit Berhasil di Di Rubah');
            redirect($this->uri->segment(1).'/penyakit');
        }else{
            $response = $this->_client->request('GET', 'penyakit', [
                'query' => [
                    'kd_penyakit' => $id,
                    'api-key'     => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url  = json_decode($response->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['rows']       = $url['data'];
            $this->template->load('main/template','main/mod_penyakit/edit_penyakit', $data);
        }
    }

    public function delete_penyakit(){
        $id = $this->uri->segment(3);
        $response = $this->_client->request('DELETE', 'penyakit', [
            'form_params' =>  [
                'kd_penyakit'   => $id,
                'api-key'       => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
            ]
        ]);
        $url = json_decode($response->getBody()->getContents(), true);
        $this->session->set_flashdata('success', 'Data Penyakit Berhasil di Di Hapus');
        redirect($this->uri->segment(1).'/penyakit');
    }

    public function gejala(){
        if (isset($_POST['submit'])) {
            $kd_gejala  = $this->input->post('kd_gejala');
            $gejala     = $this->input->post('gejala');
            $data = [];
            $data['kd_gejala']  = $kd_gejala;
            $data['gejala']     = $gejala;
            $data['api-key']    = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            $response = $this->_client->request('POST', 'gejala', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Gejala Berhasil di Di Tambahkan');
            redirect($this->uri->segment(1).'/gejala');
        }else{
            $response = $this->_client->request('GET', 'gejala', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['kode']       = $this->model_app->kode2('gejala', 'kd_gejala');
            $data['record']     = $url['data'];
            $this->template->load('main/template','main/mod_gejala/gejala', $data);
        }
    }

    public function edit_gejala(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $kd_gejala  = $this->input->post('kd_gejala');
            $gejala     = $this->input->post('gejala');
            $data = [];
            $data['kd_gejala']  = $kd_gejala;
            $data['gejala']     = $gejala;
            $data['api-key']    = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            $response = $this->_client->request('PUT', 'gejala', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Gejala Berhasil di Di Rubah');
            redirect($this->uri->segment(1).'/gejala');
        }else{
            $response = $this->_client->request('GET', 'gejala', [
                'query' => [
                    'kd_gejala'   => $id,
                    'api-key'     => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url  = json_decode($response->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['rows']       = $url['data'];
            $this->template->load('main/template','main/mod_gejala/edit_gejala', $data);
        }
    }

    public function delete_gejala(){
        $id = $this->uri->segment(3);
        $response = $this->_client->request('DELETE', 'gejala', [
            'form_params' =>  [
                'kd_gejala'     => $id,
                'api-key'       => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
            ]
        ]);
        $url = json_decode($response->getBody()->getContents(), true);
        $this->session->set_flashdata('success', 'Data Gejala Berhasil di Di Hapus');
        redirect($this->uri->segment(1).'/gejala');
    }

    public function rules(){
        if (isset($_POST['submit'])) {
            $kd_penyakit    = $this->input->post('kd_penyakit');
            $kd_gejala      = $this->input->post('kd_gejala');
            $jika_ya        = $this->input->post('jika_ya');
            $jika_tidak     = $this->input->post('jika_tidak');
            $solusi     = $this->input->post('solusi');
            $data = [];
            $data['kd_penyakit']    = $kd_penyakit;
            $data['kd_gejala']      = $kd_gejala;
            $data['jika_ya']        = $jika_ya;
            $data['jika_tidak']     = $jika_tidak;
            $data['solusi']     = $solusi;
            $data['api-key']        = '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z';
            $response = $this->_client->request('POST', 'rule', [
                'form_params' => $data
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $this->session->set_flashdata('success', 'Data Pengetahuan Pakar Berhasil di Di Tambahkan');
            redirect($this->uri->segment(1).'/rules');
        }else{
            $response = $this->_client->request('GET', 'rule', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $respons = $this->_client->request('GET', 'gejala', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $uri = json_decode($respons->getBody()->getContents(), true);
            $responses = $this->_client->request('GET', 'penyakit', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $urx = json_decode($responses->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['record']     = $url['data'];
            $data['gejala']     = $uri['data'];
            $data['penyakit']   = $urx['data'];
            $this->template->load('main/template','main/mod_rule/rule', $data);
        }
    }

    public function edit_rule(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])) {
            $id_analisis_solusi        = $this->input->post('id_analisis_solusi');
            $kd_penyakit    = $this->input->post('kd_penyakit');
            $kd_gejala      = $this->input->post('kd_gejala');
            $jika_ya        = $this->input->post('jika_ya');
            $jika_tidak     = $this->input->post('jika_tidak');
            $solusi     = $this->input->post('solusi');
            $data = [];
            $data['kd_penyakit']           = $kd_penyakit;
            $data['kd_gejala']             = $kd_gejala;
            $data['jika_ya']               = $jika_ya;
            $data['jika_tidak']            = $jika_tidak;
            $data['solusi']                = $solusi;
            $where = ['id_analisis_solusi' => $id_analisis_solusi];
            $this->model_app->edit('pengetahuan', $data, $where);
            $this->session->set_flashdata('success', 'Data Pengetahuan Pakar Berhasil di Di Rubah');
            redirect($this->uri->segment(1).'/rules');
        }else{
            $respons = $this->_client->request('GET', 'gejala', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $uri = json_decode($respons->getBody()->getContents(), true);
            $responses = $this->_client->request('GET', 'penyakit', [
                'query' =>  [
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $urs = $this->model_app->view_where('pengetahuan', ['id_analisis_solusi' => $id])->row_array();
            $urx = json_decode($responses->getBody()->getContents(), true);
            $data = [];
            $data['title']      = 'Sistem Pakar Forward Chaining';
            $data['judul']      = 'Sistem Pakar Forward Chaining';
            $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
            $data['rowws']      = $urs;
            $data['gejala']     = $uri['data'];
            $data['penyakit']   = $urx['data'];
            $this->template->load('main/template','main/mod_rule/edit_rule', $data);
        }
    }

    public function delete_rule(){
        $id = $this->uri->segment(3);
        $response = $this->_client->request('DELETE', 'rule', [
            'form_params' =>  [
                'id_analisis_solusi'       => $id,
                'api-key'       => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
            ]
        ]);
        $url = json_decode($response->getBody()->getContents(), true);
        $this->session->set_flashdata('success', 'Data Pengetahuan Pakar Berhasil di Di Hapus');
        redirect($this->uri->segment(1).'/rules');
    }

    public function delete_hasil()
	{
		$id = ['id_hasil' => $this->uri->segment(3)];
		$this->model_app->delete('hasil_diagnosis', $id);
		redirect($this->uri->segment(1) . '/laporan');
	}

    public function laporan(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $data['record']     = $this->model_app->view_join_two('hasil_diagnosis', 'users', 'penyakit', 'idusers', 'kd_penyakit')->result_array();
        $this->template->load('main/template','main/mod_laporan/laporan', $data);
    }

    public function cetak_hasil(){
        ob_start();
        $id = $this->uri->segment(3);
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $data['record']     = $this->model_app->view_join_where('hasil_diagnosis', 'users', 'penyakit', 'idusers', 'kd_penyakit', ['hasil_diagnosis.id_hasil' => $id])->row_array();
        $this->load->view('main/mod_laporan/cetak_laporan', $data);
        $html = ob_get_contents();
        ob_end_clean();
        require './assets/html2pdf/html2pdf.class.php';
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Diagnosa.pdf', 'D');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('main', 'refresh');
    }
}
