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

    public function get_approvers()
    {
        return $this->db->where_in('role', ['approver', 'admin'])->get('users')->result();
    }
}
