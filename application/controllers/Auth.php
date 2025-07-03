<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('login');
    }

    public function process_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('users', [
            'username' => $username,
            'password' => $password
        ])->row();

        if ($user) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'name' => $user->name,
                'role' => $user->role,
                'logged_in' => true
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
