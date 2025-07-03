<?php
class Vehicle_model extends CI_Model
{


    public function get_all()
    {
        $this->db->from("vehicles");
        $this->db->where('deleted_at IS NULL');
        return $this->db->get()->result();
    }

    public function get($id)
    {
        return $this->db->get_where('vehicles', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('vehicles', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('vehicles', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->update('vehicles', ['deleted_at' => date('Y-m-d H:i:s')]);
    }
}
