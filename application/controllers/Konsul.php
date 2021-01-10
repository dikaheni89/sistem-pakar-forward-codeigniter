<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsul extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->logged_in();
    }

    public function logged_in(){
        $cek	=	$this->session->id_session;
		if (!$cek) {
			redirect('publics', 'refresh');
		}
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

    public function konsultasi(){
        $data = [];
        $data['title']      = 'Sistem Pakar Forward Chaining';
        $data['judul']      = 'Sistem Pakar Forward Chaining';
        $data['footer']     = 'Skripsi Universitas Mathlaul Anwar Skripsi Fakultas FTI Asep';
        $data['rowsss']       = $this->model_utama->get_diagnosis()->result_array();
        $this->template->load('web/template','web/mod_konsultasi/konsultasi', $data);
    }

    public function cek_ya(){
        $idtanya    = $this->input->get('idtanya');
        // $query      = $this->model_utama->view_where('pengetahuan', ['kd_gejala' => $idtanya]);
        $query      = $this->db->query('SELECT * FROM pengetahuan WHERE kd_gejala="'.$idtanya.'"');
        $baris      = $query->row_array();
        if (!$baris['kd_gejala']) {
            echo 'Belum Ada data yang dipilih';
        }else{
            $solusi = $baris['solusi'];
            if (!$solusi == 0) {
                $sql    = $this->db->query('SELECT * FROM penyakit WHERE kd_penyakit="'.$solusi.'"')->row_array();
                echo "solusi ditemukan"."|".$sql['kd_penyakit'] ."|".$sql['nama_penyakit'] ."|".$sql['keterangan_penyakit']."|".$sql['solusi'];
            }else{
                $kd_gejala = $baris['kd_gejala'];
                $sqlp      = $this->db->query('SELECT * FROM gejala WHERE kd_gejala="'.$kd_gejala.'"')->row_array();
                $gejala    = $sqlp['gejala'];
                echo "solusi tidak ada" ."|" .$baris['kd_gejala'] ."|" .$baris['jika_ya'] ."|" .$gejala ."|" .$baris['jika_tidak'];
            }
        }
    }

    public function submit(){
        $data['idusers']     = $this->session->iduser;
        $data['kd_penyakit'] = $this->input->get('kd_penyakit');
        $data['tgl_diagnosis']= date('Y-m-d');
        $this->model_utama->insert('hasil_diagnosis', $data);
        redirect('konsul/konsultasi');
    }

    public function cetaklaps(){
        ob_start();
        $id = $this->uri->segment(3);
        $data = [];
	    $data['record']     = $this->model_utama->view_join_where('hasil_diagnosis', 'users', 'penyakit', 'idusers', 'kd_penyakit', ['hasil_diagnosis.kd_penyakit' => $id])->row_array();
        $this->load->view('web/mod_konsultasi/cetak_laporan', $data);
        $html = ob_get_contents();
        ob_end_clean();
        require './assets/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Siswa.pdf', 'D');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('publics', 'refresh');
    }
}
