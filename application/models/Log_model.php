<?php
class Log_model extends CI_Model
{
    public function insert_log($user_id, $activity)
    {
        $this->db->insert('logs', [
            'user_id' => $user_id,
            'activity' => $activity,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function get_all()
    {
        $this->db->select('logs.*, users.name');
        $this->db->from('logs');
        $this->db->join('users', 'users.id = logs.user_id', 'left');
        $this->db->order_by('logs.created_at', 'DESC');
        return $this->db->get()->result();
    }
}
