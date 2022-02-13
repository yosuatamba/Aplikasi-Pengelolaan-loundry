<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller{
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

    public function index()
    {
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }
}