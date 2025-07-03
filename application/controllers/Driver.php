<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_model');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['drivers'] = $this->Driver_model->get_all();
        $this->load->view('admin/driver/list', $data);
    }

    public function create()
    {
        $this->load->view('admin/driver/form');
    }

    public function store()
    {
        $data = $this->input->post();
        $this->Driver_model->insert($data);
        redirect('driver');
    }

    public function edit($id)
    {
        $data['driver'] = $this->Driver_model->get($id);
        $this->load->view('admin/driver/form', $data);
    }

    public function update($id)
    {
        $data = $this->input->post();
        $this->Driver_model->update($id, $data);
        redirect('driver');
    }

    public function delete($id)
    {
        $this->Driver_model->delete($id);
        redirect('driver');
    }
}
