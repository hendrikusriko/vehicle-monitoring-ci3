<?php
class Vehicle extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        $this->load->model('Vehicle_model');
        $this->load->model('Booking_model');
    }

    public function index()
    {
        $data['vehicles'] = $this->Vehicle_model->get_all();
        $this->load->view("admin/vehicle/list", $data);
    }

    public function usage_detail($vehicle_id)
    {
        $this->load->model('Booking_model');
        $data['vehicle'] = $this->Vehicle_model->get($vehicle_id);
        $data['usages'] = $this->Booking_model->get_usage_by_vehicle($vehicle_id);

        $this->load->view('admin/vehicle/usage_detail', $data);
    }


    public function create()
    {
        $this->load->view("admin/vehicle/form");
    }

    public function edit($id)
    {
        $data['vehicle'] = $this->Vehicle_model->get($id);
        $this->load->view("admin/vehicle/form", $data);
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'license_plate' => $this->input->post('license_plate'),
            'type' => $this->input->post('type'),
            'ownership' => $this->input->post('ownership'),
            'fuel_type' => $this->input->post('fuel_type'),
            'fuel_consumption' => $this->input->post('fuel_consumption'),
            'last_service_date' => $this->input->post('last_service_date')
        ];
        $this->Vehicle_model->insert($data);
        redirect('vehicle');
    }

    public function update($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'license_plate' => $this->input->post('license_plate'),
            'type' => $this->input->post('type'),
            'ownership' => $this->input->post('ownership'),
            'fuel_type' => $this->input->post('fuel_type'),
            'fuel_consumption' => $this->input->post('fuel_consumption'),
            'last_service_date' => $this->input->post('last_service_date')
        ];
        $this->Vehicle_model->update($id, $data);
        redirect('vehicle');
    }

    public function delete($id)
    {
        $this->Vehicle_model->delete($id);
        redirect('vehicle');
    }
}
