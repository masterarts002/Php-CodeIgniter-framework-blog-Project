<?php

class Client_Model extends CI_Model
{
    public function save_clients($data)
    {
        return $this->db->insert('client_table', $data);
    }

    public function getall_client_info()
    {
        $this->db->select('*');
        $this->db->from('client_table');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_client_info($id)
    {
        $this->db->select('*');
        $this->db->from('client_table');
        $this->db->where('client_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_client_info($id)
    {
        $this->db->where('client_id', $id);
        return $this->db->delete('client_table');
    }

    public function update_client_info($data, $id)
    {
        $this->db->where('client_id', $id);
        return $this->db->update('client_table', $data);
    }

}
