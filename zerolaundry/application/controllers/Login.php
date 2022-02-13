<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Controller {
        public function index()
        {
            $this->load->view('login/Form_login');
        }
        public function ceklogin()
        {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() != false){
                // menangkap data username dan password dari halaman login
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $where = array(
                    'username' => $username,
                    'password' => md5($password)
                );
                $this->load->model('m_data');
                // cek kesesuaian login pada table pengguna
                $cek = $this->m_data->cek_login('tb_user',$where)->num_rows();
                // cek jika login benar
                if($cek > 0){
                    // ambil data pengguna yang melakukan login
                    $data = $this->m_data->cek_login('tb_user',$where)->row();
                    $role = $data->role;
                    if ($role=='Admin') {
                        // buat session untuk pengguna yang berhasil login
                        $data_session = array(
                            'id_user' => $data->id_user,
                            'nama' => $data->nama,
                            'username' => $data->username,
                            'role' => $data->role,
                            'status' => 'telah_login'
                        );
                        $this->session->set_userdata($data_session);
                        redirect(base_url().'admin/dashboard');
                        
                    }elseif ($role=='Kasir') {
                        // buat session untuk pengguna yang berhasil login
                        $data_session = array(
                            'id_user' => $data->id_user,
                            'nama' => $data->nama,
                            'username' => $data->username,
                            'role' => $data->role,
                            'status' => 'telah_login'
                        );
                        $this->session->set_userdata($data_session);
                        // alihkan halaman ke halaman dashboard pengguna(kasir)
                        redirect(base_url().'kasir/dashboard');
                    }elseif ($role=='Owner') {
                        // buat session untuk pengguna yang berhasil login
                        $data_session = array(
                            'id_user' => $data->id_user,
                            'nama' => $data->nama,
                            'username' => $data->username,
                            'role' => $data->role,
                            'status' => 'telah_login'
                        );
                        $this->session->set_userdata($data_session);
                        // alihkan halaman ke halaman dashboard pengguna (owner)
                        redirect(base_url().'owner/dashboard');
                    }
                }else{
                    redirect(base_url().'login?alert=gagal');
                }
            }else{
                $this->load->view('login/Form_login');

            }
        }
    }
    