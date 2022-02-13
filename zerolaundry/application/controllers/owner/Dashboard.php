<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('m_data');

        //session
        if($this->session->userdata('status')!="telah_login"){
            redirect('login?alert=belum_login');
        }
    }

    // Main
    public function index()
    {
        $data['data'] = array(
            'judul' => "Dashboard",
            'subjudul' => "Data",
        );
        $data['row'] = $this->m_data->data_dashboard();
        $data['transaksi'] = $this->db->count_all('tb_transaksi');
        $data['paket'] = $this->db->count_all('tb_paket');
        $data['user'] = $this->db->count_all('tb_user');
        $data['member'] = $this->db->count_all('tb_member');
        $this->load->view('owner/template/header',$data);
        $this->load->view('owner/dashboard/dashboard');
        $this->load->view('owner/template/footer');
    }
    // End Main

}