<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->output->set_status_header('404');
        $data['title']  = 'Sistem Pakar Forward Chaining';
        $this->load->view('err404', $data);
    }
}