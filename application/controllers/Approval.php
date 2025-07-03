<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'approver') {
            redirect('auth/login');
        }
        $this->load->model('Booking_model');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        $data['approver_level'] = 0;

        // Get bookings where the user is either approver_1 or approver_2 and the status is pending
        $data['bookings'] = $this->Booking_model->get_pending_approvals($user_id);
        $this->load->view('admin/approval/list', $data);
    }

    public function approve($id)
    {
        $user_id = $this->session->userdata('user_id');
        $booking = $this->Booking_model->get($id);

        if ($booking->approver_1 == $user_id && $booking->approver_1_status === 'pending') {
            $this->Booking_model->update($id, ['approver_1_status' => 'approved']);
        } elseif ($booking->approver_2 == $user_id && $booking->approver_1_status === 'approved' && $booking->approver_2_status === 'pending') {
            $this->Booking_model->update($id, ['approver_2_status' => 'approved', 'status' => 'approved']);
        }

        redirect('approval');
    }

    public function reject($id)
    {
        $user_id = $this->session->userdata('user_id');
        $booking = $this->Booking_model->get($id);

        if ($booking->approver_1 == $user_id && $booking->approver_1_status === 'pending') {
            $this->Booking_model->update($id, ['approver_1_status' => 'rejected', 'status' => 'rejected']);
        } elseif ($booking->approver_2 == $user_id && $booking->approver_2_status === 'pending') {
            $this->Booking_model->update($id, ['approver_2_status' => 'rejected', 'status' => 'rejected']);
        }

        redirect('approval');
    }
}
