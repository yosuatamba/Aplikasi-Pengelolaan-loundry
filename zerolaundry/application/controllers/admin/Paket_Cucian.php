<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_Cucian extends CI_Controller{
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
        $data = array();
        $limit_per_page = 10;
        $start_index = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $total_rows = $this->m_data->get_total_paket();
        
        if($total_rows > 0)
        {
            // parameter
            $data['results'] = $this->m_data->get_row_paket($limit_per_page, $start_index);
            
            $config['base_url'] = base_url() . 'admin/paket_cucian/index';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $limit_per_page;
            $config['uri_segemnt'] = 3;
            // Membuat Style pagination untuk BootStrap
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
            $data['links'] = $this->pagination->create_links();
        }
        $data['data'] = array(
            'judul' => "Paket Cucian",
            'subjudul' => "Data"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/paket/paket',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah()
    {
        $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
        $data['data'] = array(
            'judul' => "Paket Cucian",
            'subjudul' => "Tambah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/paket/tambah_paket',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah_aksi()
    {
        //validasi input
        $this->form_validation->set_rules('id_paket','id_paket','required');
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('jenis','jenis','required');
        $this->form_validation->set_rules('nama_paket','nama_paket','required');
        $this->form_validation->set_rules('harga','harga','required');
        //chek kondisi validasi
        
        if($this->form_validation->run() != true){
            
            //ambil input dari form
            $id_paket = $this->input->post('id_paket');
            $id_outlet = $this->input->post('id_outlet');
            $jenis = $this->input->post('jenis');
            $nama_paket = $this->input->post('nama_paket');
            $harga = $this->input->post('harga');
            
            // data yang di simpan ke DB
                
            $data = array(
                'id_paket' => $id_paket,
                'id_outlet' => $id_outlet,
                'jenis' => $jenis,
                'nama_paket' => $nama_paket,
                'harga' => $harga
            );
            
            // perintah untuk menambahkan data ke DB melalui model m_data
            $this->m_data->insert_data($data,'tb_paket');
            // halaman di arahkan ke halaman admin paket
            redirect(base_url().'admin/paket_cucian');

        }else{
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah paket
            $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
            $data['data'] = array(
                'judul' => "Paket Cucian",
                'subjudul' => "Tambah"
            );
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/paket/tambah_paket',$data);
            $this->load->view('admin/template/footer');
        }
    }
    public function ubah($id_paket) // mengambil data dari button edit
    {
    // kondisi data yang akan di ambil dari database
        $where = array(
            'id_paket' => $id_paket
        );
        $data['paket'] = $this->m_data->edit_data($where,'tb_paket')->result();
        $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
        $data['data'] = array(
            'judul' => "Paket Cucian",
            'subjudul' => "Ubah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/paket/edit_paket',$data); // ambil data UI form edit paket
        $this->load->view('admin/template/footer');
    }
    public function aksi_ubah()
    {
        //validasi update
        $this->form_validation->set_rules('id_paket','id_paket','required');
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('jenis','jenis','required');
        $this->form_validation->set_rules('nama_paket','nama_paket','required');
        $this->form_validation->set_rules('harga','harga','required');
        // chek kondisi validasi
        if($this->form_validation->run() != false){
            // ambil dara fari form edit outlet
            $id_paket = $this->input->post('id_paket');
            $id_outlet = $this->input->post('id_outlet');
            $jenis = $this->input->post('jenis');
            $nama_paket = $this->input->post('nama_paket');
            $harga = $this->input->post('harga');
            
            // untuk kondisi data yang akan di update
            $where = array(
                'id_paket' => $id_paket
            );
            // data yang akan di update
            $data = array(
                'id_outlet' => $id_outlet,
                'jenis' => $jenis,
                'nama_paket' => $nama_paket,
                'harga' => $harga
            );
            
            // perintah update data ke database
            $this->m_data->update_data($where, $data,'tb_paket');
            // di arahkan ke halaman admin paket
            redirect(base_url().'admin/paket_cucian');
        
        }else{
            // jika validasi update tidak berhasil
            $id_paket = $this->input->post('id_paket');
            // kondisi data yang akan di ambil
            $where = array(
                'id_paket' => $id_paket
            );
            $data['paket'] = $this->m_data->edit_data($where,'tb_paket')->result();
            $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
            $data['data'] = array(
                'judul' => "Paket Cucian",
                'subjudul' => "Ubah"
            );
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/paket/edit_paket',$data); // ambil data UI form edit paket
            $this->load->view('admin/template/footer');
        }
    }

    public function hapus($id_paket)
    {
        $where = array(
            'id_paket' => $id_paket
        );
    $this->m_data->delete_data($where,'tb_paket');
    redirect(base_url().'admin/paket_cucian');
    }
    // End Main
}