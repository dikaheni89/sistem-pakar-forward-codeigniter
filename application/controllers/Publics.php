<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Publics extends CI_Controller{
    private $_client;

    public function __construct(){
        parent::__construct();
        $this->_client = new Client([
            'base_uri'  => base_url().'api/server/',
        ]);
    }

    public function index(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/content', $data);
    }

    public function informasi(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/informasi', $data);
    }

    public function gallery(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/gallery', $data);
    }

    public function about(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/about', $data);
    }

    public function visimisi(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/visimisi', $data);
    }

    public function struktur(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/struktur', $data);
    }

    public function sejarah(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']= 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $this->template->load('web/template','web/sejarah', $data);
    }

    public function login(){
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $users    = $this->db->get_where('users', ['username' => $username])->row_array();
            if ($users) {
                if ($users['status'] == 'Y') {
                    if (password_verify($password, $users['password'])) {
                        $this->session->set_userdata([
                            'username'      => $users,
                            'iduser'       => $users['idusers'],
                            'nama'          => $users['nama_users'],
                            'umur'          => $users['umur'],
                            'alamat_users'  => $users['alamat_users'],
                            'telp'          => $users['telp'],
                            'email'         => $users['email'],
                            'status'        => $users['status'],
                            'id_session'    => 'ok'
                        ]);
                        redirect('konsul');
                    }else{
                        $this->session->set_flashdata('error', 'Password yang anda masukan salah');
                        redirect($this->uri->segment(1).'/login');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Akun Anda Terblokir Silahkan hubungi admin');
                    redirect($this->uri->segment(1).'/login');
                }
            }else{
                $this->session->set_flashdata('error', 'Username yang Anda Masukan Salah');
                redirect($this->uri->segment(1).'/login');
            }
        }else{
            if ($this->session->status!='') {
                redirect('konsul');
            } else {
                $data['title'] = 'User &rsaquo; Log In';
                $data['judul'] = 'Sistem Pakar Forward Chaining';
                $this->load->view('web/login',$data);
            }
        }
    }

    public function registrasi(){
        if (isset($_POST['submit'])) {
            $config['upload_path']      = 'media/foto_user';
            $config['allowed_types']    = 'gif|jpg|png|JPG|JPEG';
            $config['max_size']         = '30000';
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $hasil = $this->upload->data();
            $nama_users     = $this->input->post('nama_users');
            $alamat_users   = $this->input->post('alamat_users');
            $email          = $this->input->post('email');
            $telp           = $this->input->post('telp');
            $umur           = $this->input->post('umur');
            $username       = $this->input->post('username');
            $password       = $this->input->post('password');
            $status         = 'Y';
            if ($hasil['file_name'] == '') {
                $data['nama_users']      = $nama_users;
                $data['alamat_users']    = $alamat_users;
                $data['email']           = $email;
                $data['telp']            = $telp;
                $data['umur']            = $umur;
                $data['username']        = $username;
                $data['password']        = password_hash($password, PASSWORD_DEFAULT);
                $data['status']          = $status;
            }else{
                $data['nama_users']      = $nama_users;
                $data['alamat_users']    = $alamat_users;
                $data['email']           = $email;
                $data['telp']            = $telp;
                $data['umur']            = $umur;
                $data['username']        = $username;
                $data['password']        = password_hash($password, PASSWORD_DEFAULT);
                $data['image']           = $hasil['file_name'];
                $data['status']          = $status;
            }
            $this->model_utama->insert('users', $data);
            $this->session->set_flashdata('success', 'Data Anda Berhasil di Di Registrasi');
            redirect($this->uri->segment(1).'/index');
        }
    }
}
