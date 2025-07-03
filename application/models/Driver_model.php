<?php
class Driver_model extends CI_Model
{

    public function get_all()
    {
        $this->db->from("drivers");
        $this->db->where('deleted_at IS NULL');
        return $this->db->get()->result();
    }

    public function get($id)
    {
        return $this->db->get_where('drivers', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('drivers', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('drivers', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->update('drivers', ['deleted_at' => date('Y-m-d H:i:s')]);
    }
}
