<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller{
    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('pagination');
        $this->load->model('m_data');
        $this->load->helper('url');

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
        $total_rows = $this->m_data->get_total_pelanggan();
        
        if($total_rows > 0)
        {
            // parameter
            $data['results'] = $this->m_data->get_row_pelanggan($limit_per_page, $start_index);
            
            $config['base_url'] = base_url() . 'admin/pelanggan/index';
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
            'judul' => "Pelanggan",
            'subjudul' => "Data"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/pelanggan/member',$data);
        $this->load->view('admin/template/footer');
    }

    // Tambah Data
    public function tambah()
    {
        $data['data'] = array(
            'judul' => "Pelanggan",
            'subjudul' => "Tambah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/pelanggan/tambah_member');
        $this->load->view('admin/template/footer');
    }
    public function aksi_tambah()
    {
        //validasi input
        $this->form_validation->set_rules('id_member','id_member','required');
        $this->form_validation->set_rules('nama_member','nama_member','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
        $this->form_validation->set_rules('tlp','tlp','required');
        //chek kondisi validasi
        
        if($this->form_validation->run() != true){
            
            //ambil input dari form
            $id_member = $this->input->post('id_member');
            $nama_member = $this->input->post('nama_member');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tlp = $this->input->post('tlp');
            
            // data yang di simpan ke DB
                
            $data = array(
                'id_member' => $id_member,
                'nama_member' => $nama_member,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tlp' => $tlp
            );
            

            // perintah untuk menambahkan data ke DB melalui model m_data
            $this->m_data->insert_data($data,'tb_member');
            // halaman di arahkan ke halaman admin member
            redirect(base_url().'admin/pelanggan');

        }else{
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah member
            $data['data'] = array(
                'judul' => "Pelanggan",
                'subjudul' => "Tambah"
            );
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/pelanggan/tambah_member');
            $this->load->view('admin/template/footer');
        }
    }

    // Ubah Data
    public function ubah($id_member) // mengambil data dari button edit
    {
        $where = array(
            'id_member' => $id_member
        );
        $data['data'] = array(
            'judul' => "Pelanggan",
            'subjudul' => "Ubah"
        );
        $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
        $data['member'] = $this->m_data->edit_data($where,'tb_member')->result(); // perintah ambil data dari tabel member
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/pelanggan/edit_member',$data); // ambil data UI form edit member
        $this->load->view('admin/template/footer');
    }
    public function aksi_ubah()
    {
        //validasi update
        $this->form_validation->set_rules('id_member','id_member','required');
        $this->form_validation->set_rules('nama_member','nama_member','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
        $this->form_validation->set_rules('tlp','tlp','required');
        // chek kondisi validasi
        if($this->form_validation->run() != false){
            // ambil dara fari form edit member
            $id_member = $this->input->post('id_member');
            $nama_member = $this->input->post('nama_member');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tlp = $this->input->post('tlp');
            // untuk kondisi data yang akan di update
            $where = array(
                'id_member' => $id_member
            );
            // data yang akan di update
            $data = array(
                'nama_member' => $nama_member,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tlp' => $tlp
            );
            // perintah update data ke database
            $this->m_data->update_data($where, $data,'tb_member');
            // di arahkan ke halaman admin member
            redirect(base_url().'admin/pelanggan');
        
        }else{
            // jika validasi update tidak berhasil
            $id_member = $this->input->post('id_member');
            // kondisi data yang akan di ambil
            $where = array(
                'id_member' => $id_member
            );
            $data['data'] = array(
                'judul' => "Pelanggan",
                'subjudul' => "Ubah"
            );
            $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
            $data['member'] = $this->m_data->edit_data($where,'tb_member')->result(); // perintah ambil data dari tabel member
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/pelanggan/edit_member',$data); // ambil data UI form edit member
            $this->load->view('admin/template/footer');
        }
    }

    // Hapus Data
    public function hapus($id_member)
    {
        $where = array(
            'id_member' => $id_member
        );
    $this->m_data->delete_data($where,'tb_member');
    redirect(base_url().'admin/pelanggan');
    }
    // End Main
}