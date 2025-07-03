<?php
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Booking_model');
    }

    public function index()
    {
        $data['chart_data'] = $this->Booking_model->get_monthly_booking_this_year();
        $this->load->view('admin/dashboard', $data);
    }
}
