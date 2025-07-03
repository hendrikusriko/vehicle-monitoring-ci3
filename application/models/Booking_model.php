<?php
class Booking_model extends CI_Model
{
    private $table = 'bookings';



    public function get_all()
    {
        $this->db->from("bookings");
        $this->db->where('deleted_at IS NULL');
        return $this->db->get()->result();
    }

    public function get($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->update('bookings', ['deleted_at' => date('Y-m-d H:i:s')]);
    }

    public function get_pending_approvals($approver_id)
    {
        $this->db->select('bookings.*, drivers.name AS driver_name, vehicles.name AS vehicle_name');
        $this->db->from('bookings');
        $this->db->join('drivers', 'drivers.id = bookings.driver_id', 'left');
        $this->db->join('vehicles', 'vehicles.id = bookings.vehicle_id', 'left');
        $this->db->where("(bookings.approver_1 = $approver_id AND bookings.approver_1_status = 'pending') 
                      OR (bookings.approver_2 = $approver_id AND bookings.approver_1_status = 'approved' AND bookings.approver_2_status = 'pending')", null, false);
        return $this->db->get()->result();
    }

    public function get_all_with_relation()
    {
        $this->db->select('
        bookings.*,
        u1.name as requester_name,
        u2.name as approver1_name,
        u3.name as approver2_name,
        vehicles.name as vehicle_name,
        vehicles.license_plate,
        drivers.name as driver_name
    ');
        $this->db->from('bookings');
        $this->db->join('users u1', 'u1.id = bookings.user_id');
        $this->db->join('users u2', 'u2.id = bookings.approver_1');
        $this->db->join('users u3', 'u3.id = bookings.approver_2');
        $this->db->join('vehicles', 'vehicles.id = bookings.vehicle_id');
        $this->db->join('drivers', 'drivers.id = bookings.driver_id');
        $this->db->where('bookings.deleted_at IS NULL');
        return $this->db->get()->result();
    }

    public function get_monthly_booking_this_year()
    {
        $this->db->select("MONTH(start_date) AS month, COUNT(*) AS total");
        $this->db->from("bookings");
        $this->db->where("YEAR(start_date)", date('Y')); // hanya berdasarkan start_date
        $this->db->where('deleted_at IS NULL');
        $this->db->group_by("MONTH(start_date)");
        $this->db->order_by("month", "ASC");

        return $this->db->get()->result();
    }


    public function get_by_date_range($start, $end)
    {
        $this->db->select('
        bookings.*,
        u1.name as requester_name,
        u2.name as approver1_name,
        u3.name as approver2_name,
        vehicles.name as vehicle_name,
        vehicles.license_plate,
        drivers.name as driver_name
    ');
        $this->db->from('bookings');
        $this->db->join('users u1', 'u1.id = bookings.user_id');
        $this->db->join('users u2', 'u2.id = bookings.approver_1');
        $this->db->join('users u3', 'u3.id = bookings.approver_2');
        $this->db->join('vehicles', 'vehicles.id = bookings.vehicle_id');
        $this->db->join('drivers', 'drivers.id = bookings.driver_id');
        $this->db->where('bookings.start_date >=', $start);
        $this->db->where('bookings.end_date <=', $end);
        $this->db->order_by('bookings.start_date', 'asc');

        return $this->db->get()->result();
    }

    public function get_usage_by_vehicle($vehicle_id)
    {
        $this->db->select('bookings.*, users.name as user_name, drivers.name as driver_name');
        $this->db->from('bookings');
        $this->db->join('users', 'users.id = bookings.user_id', 'left');
        $this->db->join('drivers', 'drivers.id = bookings.driver_id', 'left');
        $this->db->where('bookings.vehicle_id', $vehicle_id);
        $this->db->order_by('start_date', 'desc');
        return $this->db->get()->result();
    }
}
