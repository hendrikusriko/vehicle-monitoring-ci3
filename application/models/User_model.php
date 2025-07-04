<?php
class User_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('users')->result();
    }

    public function get($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function get_approvers_1()
    {
        return $this->db
            ->where('role', 'approver')
            ->where('level', 1)
            ->get('users')
            ->result();
    }

    public function get_approvers_2()
    {
        return $this->db
            ->where('role', 'approver')
            ->where('level', 2)
            ->get('users')
            ->result();
    }
}
