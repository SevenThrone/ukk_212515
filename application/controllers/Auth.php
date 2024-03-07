<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Authentication');
    }
    public function index()
    {
        $this->load->view('Login');
    }

    public function regis()
    {
        $this->load->view('Register');
    }

    public function login()
    {
        $user = $this->input->post('User');
        $pass = $this->input->post('Pass');

        $this->form_validation->set_rules('User', 'User', 'required|alpha_numeric');
        $this->form_validation->set_rules('Pass', 'Pass', 'required');

        $akun = $this->db->get_where('user', ['Username' => $user])->row_array();

        if ($this->form_validation->run() === FALSE) {
            // Errors, reload form with errors
            $this->load->view('login', ['errors' => $this->form_validation->error_array()]);
        } else {
            // Validation successful, process login
            // ...
            if ($akun && password_verify($pass, $akun['Password'])) {
                $data_session = array(
                    'Username' => $akun['Username'],
                );

                $this->session->set_userdata($data_session);

                $name = $this->session->userdata('Username');
                $this->load->helper('cookie');
                $cookie = array(
                    'name' => 'user',
                    'value' => $name,
                    'expire' => '30000',
                    'secure' => TRUE,
                );

                $this->input->set_cookie($cookie);
                redirect('Welcome');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                $data['title'] = 'login 1';
                $this->load->view('login', $data);
            }
        }
    }


    public function register()
    {
        $user = $this->input->post('User');
        $pass = $this->input->post('Pass');
        $email = $this->input->post('Email');
        $name = $this->input->post('Nama');
        $alamat = $this->input->post('Alamat');


        $data = [
            'Username'    => $user,
            'Password'    => password_hash($pass, PASSWORD_DEFAULT),
            'Email'       => $email,
            'NamaLengkap' => $name,
            'Alamat'      => $alamat,
        ];

        $this->Authentication->tambahuser('user', $data);
        redirect('Auth');
    }

    public function logout()
    {
        // Hapus data session
        $this->session->sess_destroy();

        // Redirect ke halaman login
        redirect(base_url('Auth'));
    }
}
