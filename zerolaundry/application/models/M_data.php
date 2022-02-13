<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model{

    function cek_login($table,$data){
        return $this->db->get_where($table,$data);
    }

    // FUNGSI CRUD
    function get_data($table){
        // fungsi untuk mengambil data dari database
        return $this->db->get($table);
    }
       // fungsi untuk menginput data ke database
    function insert_data($data,$table){
        $this->db->insert($table,$data);
    }
        // fungsi untuk mengedit data
    function edit_data($where,$table){
        
        return $this->db->get_where($table,$where);
    }
    // fungsi untuk mengupdate atau mengubah data di database
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    // fungsi untuk menghapus data dari database
    function delete_data($where,$table){
        $this->db->delete($table,$where);
    }
    // AKHIR FUNGSI CRUD
    
    // Mengambil data spesifik 
    // Dashboard
    function data_dashboard() 
    {
        $this->db->order_by('tgl_bayar', 'DESC');
        return $this->db->from('tb_transaksi')
        ->where('status' , 'diambil')
        ->limit(10)
        ->join('tb_member', 'tb_member.id_member=tb_transaksi.id_member')
        ->get()
        ->result();
        $this->db->count();
    }
    // End

    // JOIN
    function member_transaksi() 
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->from('tb_transaksi')
        ->join('tb_member', 'tb_member.id_member=tb_transaksi.id_member')
        ->get()
        ->result();
    }
    // End Join
    
    // get data order by
    function desc_member($table){
        $this->db->order_by('id_member', 'DESC');
        return $this->db->get($table);
    }
    function desc_user($table){
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get($table);
    }
    function desc_outlet($table){
        $this->db->order_by('id_outlet', 'DESC');
        return $this->db->get($table);
    }
    function desc_paket($table){
        $this->db->order_by('id_paket', 'DESC');
        return $this->db->get($table);
    }
    // akhir get data order by

    // Limit
    function limit_member($table){
        $this->db->order_by('id_member', 'DESC')
        ->limit(1);
        return $this->db->get($table);
    }
    public function filter($dari, $sampai) {
		return $this->db->query("select * from tb_transaksi join tb_user on tb_transaksi.id_user = tb_user.id_user join tb_member on tb_transaksi.id_member = tb_member.id_member where tgl_bayar >= '$dari' and tgl_bayar <= '$sampai'");
	}

    // Pagination
    // Transaksi
    public function get_row_transaksi($n, $start)
    {
        $this->db->limit($n, $start);
        $query = $this->db->order_by('id', 'DESC');
        return $this->db->from('tb_transaksi')
        ->join('tb_member', 'tb_member.id_member=tb_transaksi.id_member')
        ->get()
        ->result();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total_transaksi()
    {
        return $this->db->count_all('tb_transaksi');
    }
    
    // Pelanggan
    public function get_row_pelanggan($n, $start)
    {
        $this->db->limit($n, $start);
        $query = $this->db->order_by('id_member', 'DESC');
        return $this->db->from('tb_member')
        ->get()
        ->result();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total_pelanggan()
    {
        return $this->db->count_all('tb_member');
    }

    // Pengguna
    public function get_row_pengguna($n, $start)
    {
        $this->db->limit($n, $start);
        $query = $this->db->order_by('id_user', 'DESC');
        return $this->db->from('tb_user')
        ->get()
        ->result();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total_pengguna()
    {
        return $this->db->count_all('tb_user');
    }
    
    // outlet
    public function get_row_outlet($n, $start)
    {
        $this->db->limit($n, $start);
        $query = $this->db->order_by('id_outlet', 'DESC');
        return $this->db->from('tb_outlet')
        ->get()
        ->result();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total_outlet()
    {
        return $this->db->count_all('tb_outlet');
    }

    // Paket
    public function get_row_paket($n, $start)
    {
        $this->db->limit($n, $start);
        $query = $this->db->order_by('id_paket', 'DESC');
        return $this->db->from('tb_paket')
        ->get()
        ->result();

        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function get_total_paket()
    {
        return $this->db->count_all('tb_paket');
    }
    public function view_by_date($date){
        $this->db->where('DATE(tgl)', $date); // Tambahkan where tanggal nya
        return $this->db->get('tb_transaksi')->result();// Tampilkan data tb_transaksi sesuai tanggal yang diinput oleh user pada filter
    }
    
    public function view_by_month($month, $year){
        $this->db->where('MONTH(tgl)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl)', $year); // Tambahkan where tahun
        return $this->db->get('tb_transaksi')->result(); // Tampilkan data tb_transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }
    
    public function view_by_year($year){
        $this->db->where('YEAR(tgl)', $year); // Tambahkan where tahun
        return $this->db->get('tb_transaksi')->result(); // Tampilkan data tb_transaksi sesuai tahun yang diinput oleh user pada filter
    }
    
    public function view_all(){
        return $this->db->get('tb_transaksi')->result(); // Tampilkan semua data tb_transaksi
    }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('tb_transaksi'); // select ke tabel tb_transaksi
        $this->db->order_by('YEAR(tgl)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel tb_transaksi sesuai kondisi diatas
    }
    public function get_full_records($where){
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_member', 'tb_member.id_member = tb_transaksi.id_member');
		$this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user');
		$this->db->join('tb_outlet', 'tb_outlet.id_outlet = tb_transaksi.id_outlet');
		$this->db->join('tb_paket', 'tb_paket.id_paket = tb_transaksi.id_paket');
		$this->db->where($where);
		return $this->db->get();
	}
}