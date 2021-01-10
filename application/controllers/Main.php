<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Main extends CI_Controller {

    private $_client;

    public function __construct(){
        parent::__construct();
        $this->_client = new Client([
            'base_uri'  => base_url().'api/server/',
        ]);
    }

    public function index(){
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $response = $this->_client->request('GET', 'login', [
                'query' =>  [
                    'username'=> $username,
                    'api-key' => '$2y$10$ZzaZedEMVGwtKoQ00jF/zOZaGDmNJdc2z',
                ]
            ]);
            $url = json_decode($response->getBody()->getContents(), true);
            $admin = $url['data'][0]['username'];
            $pass  = $url['data'][0]['password'];
            $stat  = $url['data'][0]['status_active'];
            if ($admin) {
                if ($stat == 'Y') {
                    if (password_verify($password, $pass)) {
                        $this->session->set_userdata([
                            'username'  => $admin,
                            'email'     => $url['data'][0]['email'],
                            'id_session'=> 'ok'
                        ]);
                        redirect('home');
                    }else{
                        $this->session->set_flashdata('error', 'Password yang anda masukan salah');
                        redirect($this->uri->segment(1).'/index');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Akun Anda Terblokir Silahkan hubungi admin');
                    redirect($this->uri->segment(1).'/index');
                }
            }else{
                $this->session->set_flashdata('error', 'Username yang Anda Masukan Salah');
                redirect($this->uri->segment(1).'/index');
            }
        }else{
            if ($this->session->level!='') {
                redirect(base_url());
            } else {
                $data['title'] = 'Pakar &rsaquo; Log In';
                $data['judul'] = 'Sistem Pakar Forward Chaining';
                $this->load->view('main/login',$data);
            }
        }
    }
}
