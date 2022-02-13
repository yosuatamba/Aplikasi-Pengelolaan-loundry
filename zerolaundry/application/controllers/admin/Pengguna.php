<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller{
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
        $total_rows = $this->m_data->get_total_pengguna();
        
        if($total_rows > 0)
        {
            // parameter
            $data['results'] = $this->m_data->get_row_pengguna($limit_per_page, $start_index);
            
            $config['base_url'] = base_url() . 'admin/pengguna/index';
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
            'judul' => "Pengguna",
            'subjudul' => "Data"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/user/user',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah()
    {
        $data['user'] = $this->m_data->get_data('tb_outlet')->result();
        $data['data'] = array(
            'judul' => "Pengguna",
            'subjudul' => "Tambah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/user/tambah_user', $data);
        $this->load->view('admin/template/footer');
    }
    public function aksi_tambah()
    {
        //validasi input
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('role','role','required');
        //chek kondisi validasi
        
        if($this->form_validation->run() != true){
            
            //ambil input dari form
            $id_user = $this->input->post('id_user');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $id_outlet = $this->input->post('id_outlet');
            $role = $this->input->post('role');
            
            // data yang di simpan ke DB
                
            $data = array(
                'id_user' => $id_user,
                'nama' => $nama,
                'username' => $username,
                'password' => md5($password),
                'id_outlet' => $id_outlet,
                'role' => $role
            );
            

            // perintah untuk menambahkan data ke DB melalui model m_data
            $this->m_data->insert_data($data,'tb_user');
            // halaman di arahkan ke halaman admin user
            redirect(base_url().'admin/pengguna');

        }else{
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah user
            $data['user'] = $this->m_data->get_data('tb_outlet')->result();
            $data['data'] = array(
                'judul' => "Pengguna",
                'subjudul' => "Tambah"
            );
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/user/tambah_user', $data);
            $this->load->view('admin/template/footer');
        }
    }
    public function ubah($id_user) // mengambil data dari button edit
    {
    // kondisi data yang akan di ambil dari database
        $where = array(
            'id_user' => $id_user
        );
        $data['user'] = $this->m_data->edit_data($where,'tb_user')->result(); 
        $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
        $data['data'] = array(
            'judul' => "Pengguna",
            'subjudul' => "Ubah"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/user/edit_user',$data);
        $this->load->view('admin/template/footer');
    }
    
    public function aksi_ubah()
    {
        //validasi update
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('role','role','required');
        // chek kondisi validasi
        if($this->form_validation->run() != false){
            // ambil dara fari form edit user
            $id_user = $this->input->post('id_user');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $id_outlet = $this->input->post('id_outlet');
            $role = $this->input->post('role');
            // untuk kondisi data yang akan di update
            // var_dump($id_outlet);
            // die;
            
            $where = array(
                'id_user' => $id_user
            );
            // data yang akan di update
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'id_outlet' => $id_outlet,
                'role' => $role
            );
            // perintah update data ke database
            $this->m_data->update_data($where, $data,'tb_user');
            // di arahkan ke halaman admin user
            redirect(base_url().'admin/pengguna');
        
        }else{
            // jika validasi update tidak berhasil
            $id_user = $this->input->post('id_user');
            // kondisi data yang akan di ambil
            $where = array(
                'id_user' => $id_user
            );
            $data['user'] = $this->m_data->edit_data($where,'tb_user')->result(); 
            $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
            $data['data'] = array(
                'judul' => "Pengguna",
                'subjudul' => "Ubah"
            );
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/user/edit_user',$data);
            $this->load->view('admin/template/footer');
        }
    }

    public function hapus($id_user)
    {
        $where = array(
            'id_user' => $id_user
        );
    $this->m_data->delete_data($where,'tb_user');
    redirect(base_url().'admin/pengguna');
    }
    // End Main
}