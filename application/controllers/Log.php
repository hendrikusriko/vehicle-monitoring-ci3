<?php
class Log extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Log_model');
    }

    public function index()
    {
        $data['logs'] = $this->Log_model->get_all();
        $this->load->view('admin/log/list', $data);
    }
}
