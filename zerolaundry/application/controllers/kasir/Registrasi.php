<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller{
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
    // Form 1
    public function index()
    {
        $data['data'] = array(
            'judul' => "Registrasi",
            'subjudul' => "Pelanggan"
        );
        $this->load->view('kasir/template/header',$data);
        $this->load->view('kasir/registrasi/registrasi_member');
        $this->load->view('kasir/template/footer');
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
            // halaman di arahkan ke halaman kasir member
            redirect(base_url().'kasir/registrasi/next');

        }else{
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah member
            $data['data'] = array(
                'judul' => "Registrasi",
                'subjudul' => "Member"
            );
            
            $this->load->view('kasir/template/header',$data);
            $this->load->view('kasir/registrasi/registrasi_member');
            $this->load->view('kasir/template/footer');
        }
    }

    public function back()
    {
        $data['data'] = array(
            'judul' => "Registrasi",
            'subjudul' => "Pelanggan"
        );
        $data['member'] = $this->m_data->limit_member('tb_member')->result();
        $this->load->view('kasir/template/header',$data);
        $this->load->view('kasir/registrasi/back');
        $this->load->view('kasir/template/footer');
    }

    public function aksi_ubah()
    {
        //validasi update
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
            // di arahkan ke halaman kasir member
            redirect(base_url().'kasir/registrasi/next');
        
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
            $this->load->view('kasir/template/header',$data);
            $this->load->view('kasir/pelanggan/edit_member',$data); // ambil data UI form edit member
            $this->load->view('kasir/template/footer');
        }
    }
    // End Form 1

    // Form 2
    public function next()
    {
        $data['data'] = array(
            'judul' => "Registrasi",
            'subjudul' => "Transaksi"
        );
        $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
        $data['user'] = $this->m_data->get_data('tb_user')->result();
        $data['paket'] = $this->m_data->get_data('tb_paket')->result();
        $data['member'] = $this->m_data->desc_member('tb_member')->result();
        $this->load->view('kasir/template/header',$data);
        $this->load->view('kasir/registrasi/registrasi_transaksi',$data);
        $this->load->view('kasir/template/footer');
    }
    public function aksi()
    {
        //validasi input
        $this->form_validation->set_rules('id','id','required');
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('kode_invoice','kode_invoice','required');
        $this->form_validation->set_rules('id_member','id_member','required');
        $this->form_validation->set_rules('tgl','tgl','required');
        $this->form_validation->set_rules('status','status','required');
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('id_paket','id_paket','required');
        //chek kondisi validasi
        
        if($this->form_validation->run() != true){
            
            //ambil input dari form
            $id = $this->input->post('id');
            $id_outlet = $this->input->post('id_outlet');
            $kode_invoice = $this->input->post('kode_invoice');
            $id_member = $this->input->post('id_member');
            $tgl = $this->input->post('tgl');
            $status = $this->input->post('status');
            $id_user = $this->input->post('id_user');
            $id_paket = $this->input->post('id_paket');
            
            // data yang di simpan ke DB
            $data = array(
                'id' => $id,
                'id_outlet' => $id_outlet,
                'kode_invoice' => $kode_invoice,
                'id_member' => $id_member,
                'tgl' => $tgl,
                'status' => $status,
                'id_user' => $id_user,
                'id_paket' => $id_paket
            );
            
            // perintah untuk menambahkan data ke DB melalui model m_data
            $this->m_data->insert_data($data,'tb_transaksi');
            // halaman di arahkan ke halaman kasir transaksi
            redirect(base_url().'kasir/transaksi');

        }else{
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah paket
            $data['data'] = array(
                'judul' => "Registrasi",
                'subjudul' => "Transaksi"
            );
            $data['outlet'] = $this->m_data->get_data('tb_outlet')->result();
            $data['user'] = $this->m_data->get_data('tb_user')->result();
            $data['member'] = $this->m_data->desc_member('tb_member')->result();
            $this->load->view('kasir/template/header',$data);
            $this->load->view('kasir/registrasi/registrasi_transaksi',$data);
            $this->load->view('kasir/template/footer');
        }
    }
    // End Form 2

    // End Main
}