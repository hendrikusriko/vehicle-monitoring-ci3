<?php

defined('BASEPATH') or exit('No direct script access allowed');

use phpoffice\phpspreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Booking extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Booking_model');
        $this->load->model('Vehicle_model');
        $this->load->model('Driver_model');
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->load->model('User_model');
        $this->load->model('Vehicle_model');
        $this->load->model('Driver_model');
        $this->load->model('Booking_model');

        $data['bookings'] = $this->Booking_model->get_all_with_relation();
        $this->load->view('admin/booking/list', $data);
    }

    public function create()
    {
        $data['vehicles'] = $this->Vehicle_model->get_all();
        $data['drivers'] = $this->Driver_model->get_all();
        $data['users'] = $this->User_model->get_all(); // untuk pemesan
        $data['approvers'] = $this->User_model->get_approvers(); // role approver
        $this->load->view('admin/booking/form', $data);
    }


    public function store()
    {
        $data = $this->input->post();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['approver_1_status'] = 'pending';
        $data['approver_2_status'] = 'pending';
        $data['status'] = 'pending';
        $this->Booking_model->insert($data);
        redirect('booking');
    }

    public function edit($id)
    {
        $this->load->model(['Booking_model', 'Vehicle_model', 'Driver_model', 'User_model']);
        $data['booking'] = $this->Booking_model->get($id);
        $data['vehicles'] = $this->Vehicle_model->get_all();
        $data['drivers'] = $this->Driver_model->get_all();
        $data['users'] = $this->User_model->get_all(); // untuk pemesan
        $data['approvers'] = $this->User_model->get_approvers(); // role approver
        $this->load->view('admin/booking/form', $data);
    }

    public function update($id)
    {
        $data = $this->input->post();
        $this->Booking_model->update($id, $data);
        redirect('booking');
    }

    public function delete($id)
    {
        $this->Booking_model->delete($id);
        redirect('booking');
    }

    public function export()
    {
        $start = $this->input->get('start');
        $end   = $this->input->get('end');

        if (!$start || !$end) {
            show_error("Tanggal mulai dan akhir harus diisi");
        }

        $bookings = $this->Booking_model->get_by_date_range($start, $end);

        // Buat file spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Laporan Booking");

        // Header
        $sheet->fromArray([
            'No',
            'Pemesan',
            'Kendaraan',
            'Driver',
            'Tgl Mulai',
            'Tgl Selesai',
            'Alasan',
            'Approver 1',
            'Status 1',
            'Approver 2',
            'Status 2'
        ], null, 'A1');

        // Data
        $row = 2;
        $no = 1;
        foreach ($bookings as $b) {
            $sheet->fromArray([
                $no++,
                $b->requester_name,
                $b->vehicle_name . ' (' . $b->license_plate . ')',
                $b->driver_name,
                $b->start_date,
                $b->end_date,
                $b->reason,
                $b->approver1_name,
                ucfirst($b->approver_1_status),
                $b->approver2_name,
                ucfirst($b->approver_2_status)
            ], null, 'A' . $row++);
        }

        // Download
        $filename = 'laporan_booking_' . $start . '_to_' . $end . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
