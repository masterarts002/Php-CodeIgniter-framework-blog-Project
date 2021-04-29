<?php

class Identity_Model extends CI_Model
{
    public function save_option_info($data)
    {
        $this->db->where('option_id', 1);
        return $this->db->update('identity_table', $data);
    }

    public function get_identity_data()
    {
        $this->db->select();
        $this->db->from('identity_table');
        $this->db->where('option_id', 1);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function get_email_setup()
    {
        $this->db->select();
        $this->db->from('email_setup_table');
        $this->db->where('ID', 1);
        $info = $this->db->get();
        return $info->row();
    }
}