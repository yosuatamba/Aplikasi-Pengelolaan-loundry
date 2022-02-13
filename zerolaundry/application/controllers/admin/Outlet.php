<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends CI_Controller{
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
        $total_rows = $this->m_data->get_total_outlet();
        
        if($total_rows > 0)
        {
            // parameter
            $data['results'] = $this->m_data->get_row_outlet($limit_per_page, $start_index);
            
            $config['base_url'] = base_url() . 'admin/outlet/index';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $limit_per_page;
            $config['uri_segemnt'] = 5;
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
            'judul' => "Outlet",
            'subjudul' => "Data"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/outlet/outlet',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah()
    {
        $data['data'] = array(
            'judul' => "Outlet",
            'subjudul' => "Tambah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/outlet/tambah_outlet');
        $this->load->view('admin/template/footer');
    }
    public function aksi_tambah()
    {
        //validasi input
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('nama_outlet','nama_outlet','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('tlp','tlp','required');
        //chek kondisi validasi
        
        if($this->form_validation->run() != true){
            
            //ambil input dari form
            $id_outlet = $this->input->post('id_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $tlp = $this->input->post('tlp');
            
            // data yang di simpan ke DB
                
            $data = array(
                'id_outlet' => $id_outlet,
                'nama_outlet' => $nama_outlet,
                'alamat' => $alamat,
                'tlp' => $tlp
            );
            
            // perintah untuk menambahkan data ke DB melalui model m_data
            $this->m_data->insert_data($data,'tb_outlet');
            // halaman di arahkan ke halaman admin outlet
            redirect(base_url().'admin/outlet');

        }else{
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah outlet
            $data['data'] = array(
                'judul' => "Outlet",
                'subjudul' => "Tambah"
            );
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/outlet/tambah_outlet');
            $this->load->view('admin/template/footer');
        }
    }
    public function ubah($id_outlet) // mengambil data dari button edit
    {
    // kondisi data yang akan di ambil dari database
        $where = array(
            'id_outlet' => $id_outlet
        );
        $data['outlet'] = $this->m_data->edit_data($where,'tb_outlet')->result(); // perintah ambil data dari tabel outlet
        $data['data'] = array(
            'judul' => "Outlet",
            'subjudul' => "Ubah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/outlet/edit_outlet',$data); // ambil data UI form edit outlet
        $this->load->view('admin/template/footer');
    }
    public function aksi_ubah()
    {
        //validasi update
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('nama_outlet','nama_outlet','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('tlp','tlp','required');
        // chek kondisi validasi
        if($this->form_validation->run() != false){
            // ambil dara fari form edit outlet
            $id_outlet = $this->input->post('id_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $tlp = $this->input->post('tlp');
            // untuk kondisi data yang akan di update
            $where = array(
                'id_outlet' => $id_outlet
            );
            // data yang akan di update
            $data = array(
                'nama_outlet' => $nama_outlet,
                'alamat' => $alamat,
                'tlp' => $tlp
            );
            // perintah update data ke database
            $this->m_data->update_data($where, $data,'tb_outlet');
            // di arahkan ke halaman admin outlet
            redirect(base_url().'admin/outlet');
        
        }else{
            // jika validasi update tidak berhasil
            $id_outlet = $this->input->post('id_outlet');
            // kondisi data yang akan di ambil
            $where = array(
                'id_outlet' => $id_outlet
            );
            // perintah untuk mengambil data dari database
            $data['outlet'] = $this->m_data->edit_data($where,'tb_outlet')->result();
            // halaman di alihkan ke form edit outlet
            $this->load->view('admin/outlet/edit_outlet',$data);
        }
    }

    public function hapus($id_outlet)
    {
        $where = array(
            'id_outlet' => $id_outlet
        );
    $this->m_data->delete_data($where,'tb_outlet');
    redirect(base_url().'admin/outlet');
    }
    // End Main
}