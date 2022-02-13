<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{
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
        $total_rows = $this->m_data->get_total_transaksi();
        
        if($total_rows > 0)
        {
            // parameter
            $data['results'] = $this->m_data->get_row_transaksi($limit_per_page, $start_index);
            
            $config['base_url'] = base_url() . 'admin/transaksi/index';
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
            'judul' => "Transaksi",
            'subjudul' => "Data"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/transaksi/transaksi',$data);
        $this->load->view('admin/template/footer');

    }

    public function detail_transaksi($id) // mengambil data dari button edit
    {
    // kondisi data yang akan di ambil dari database
        $where = array(
        'id' => $id
        );
        $data['data'] = array(
            'judul' => "Transaksi",
            'subjudul' => "Detail Transaksi"
        );
        $data['transaksi'] = $this->m_data->edit_data($where,'tb_transaksi')->result();
        $data['member'] = $this->m_data->desc_member('tb_member')->result();
        $data['outlet'] = $this->m_data->desc_outlet('tb_outlet')->result();
        $data['paket'] = $this->m_data->desc_paket('tb_paket')->result();
        $data['user'] = $this->m_data->desc_user('tb_user')->result();
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/transaksi/detail_transaksi',$data);
        $this->load->view('admin/template/footer');
    }

    public function dt_aksi()
    {
        //validasi input
        $this->form_validation->set_rules('id','id','required');
        $this->form_validation->set_rules('id_outlet','id_outlet','required');
        $this->form_validation->set_rules('kode_invoice','kode_invoice','required');
        $this->form_validation->set_rules('id_member','id_member','required');
        $this->form_validation->set_rules('tgl','tgl','required');
        $this->form_validation->set_rules('tgl_bayar','tgl_bayar','required');
        $this->form_validation->set_rules('biaya_tambahan','biaya_tambahan','required');
        $this->form_validation->set_rules('diskon','diskon','required');
        $this->form_validation->set_rules('status','status','required');
        $this->form_validation->set_rules('id_user','id_user','required');
        $this->form_validation->set_rules('harga_awal','harga_awal','required');
        //chek kondisi validasi
        
        if($this->form_validation->run() != false){
            
            //ambil input dari form
            $id = $this->input->post('id');
            $id_outlet = $this->input->post('id_outlet');
            $kode_invoice = $this->input->post('kode_invoice');
            $id_member = $this->input->post('id_member');
            $tgl = $this->input->post('tgl');
            $tgl_bayar = $this->input->post('tgl_bayar');
            $biaya_tambahan = $this->input->post('biaya_tambahan');
            $diskon = $this->input->post('diskon');
            $status = $this->input->post('status');
            $id_user = $this->input->post('id_user');
            $harga_awal = $this->input->post('harga_awal');

            $harga1 = $harga_awal+$biaya_tambahan;
            $harga2 = ($diskon/100)*$harga1;
            $total_harga = ceil($harga1-$harga2);

            // data yang di simpan ke DB
            $data = array(
                'id_outlet' => $id_outlet,
                'kode_invoice' => $kode_invoice,
                'id_member' => $id_member,
                'tgl' => $tgl,
                'tgl_bayar' => $tgl_bayar,
                'biaya_tambahan' => $biaya_tambahan,
                'diskon' => $diskon,
                'status' => $status,
                'id_user' => $id_user,
                'total_harga' => $total_harga
            );
            $where = array(
                'id' => $id
            );
            
            // perintah untuk menambahkan data ke DB melalui model m_data
            $this->m_data->update_data($where, $data,'tb_transaksi');
            // halaman di arahkan ke halaman admin transaksi
            redirect(base_url().'admin/transaksi');

        }else{
            $id = $this->input->post('id');
            // jika proses input tidak berhasil akan di arahkan ke halaman tambah paket
            $where = array(
                'id' => $id
                );
            $data['data'] = array(
                'judul' => "Transaksi",
                'subjudul' => "Detail Transaksi"
            );
            $data['transaksi'] = $this->m_data->edit_data($where,'tb_transaksi')->result();
            $data['member'] = $this->m_data->desc_member('tb_member')->result();
            $data['outlet'] = $this->m_data->desc_outlet('tb_outlet')->result();
            $data['user'] = $this->m_data->desc_user('tb_user')->result();
            $this->load->view('admin/template/header',$data);
            $this->load->view('admin/transaksi/detail_transaksi',$data);
            $this->load->view('admin/template/footer');
        
        }
    }

    public function pdf_transaksi()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // filename dari pdf ketika didownload
        $filename = 'laporan_transaksi';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $data['transaksi']=$this->m_data->data_dashboard();
        $html = $this->load->view('admin/laporan/transaksi',$data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $filename,$paper,$orientation);
    }

    // laporan
    public function laporan_filter()
	{

		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');

		$data['data_transaksi'] = $this->m_data->filter($dari, $sampai)->result();
        
        $data['data'] = array(
            'judul' => "Laporan",
            'subjudul' => "Data Transaksi"
        );
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/transaksi/laporan',$data);
        $this->load->view('admin/template/footer');
	}

    // print
	function print() {	

		$dari = $this->uri->segment('4');
		$sampai = $this->uri->segment('5');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['data_transaksi'] = $this->m_data->filter($dari, $sampai)->result();
		
		$this->load->view('admin/transaksi/print', $data);
	}

    function cetak_pdf() {
		$this->load->library('pdfgenerator');
		
		$dari = $this->uri->segment('4');
		$sampai = $this->uri->segment('5');

		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$data['data_transaksi'] = $this->m_data->filter($dari, $sampai)->result();
        // filename dari pdf ketika didownload
        $filename = 'laporan_transaksi';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $data['transaksi']=$this->m_data->data_dashboard();
        $html = $this->load->view('admin/transaksi/pdf',$data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $filename,$paper,$orientation);
    }

    function print_nota() {	

		$id = $this->uri->segment('4');

		$where = array(
			'id' => $id
		);
        $data['paket'] = $this->m_data->desc_paket('tb_paket')->result();
		$data['data_transaksi'] = $this->m_data->get_full_records($where)->result();
		
		$this->load->view('admin/transaksi/nota_transaksi', $data);
	}
    // End Main
}