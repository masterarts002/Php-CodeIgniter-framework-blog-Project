<?php

class Profile_Model extends CI_Model
{

    public function save_profile_info($data)
    {
        return $this->db->insert('tbl_profile', $data);
    }

    public function get_all_profile()
    {
        $this->db->select('*');
        $this->db->from('tbl_profile');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_profile_info($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_profile');
        $this->db->where('astrologer_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_profile_info($id)
    {
        $this->db->where('astrologer_id', $id);
        return $this->db->delete('tbl_profile');
    }

    public function update_profile_info($data, $id)
    {
        $this->db->where('astrologer_id', $id);
        return $this->db->update('tbl_profile', $data);
    }

    

}
