<?php

class Horoscope_Model extends CI_Model
{

    public function save_horoscope_info($data,$zodiac)
    {
        $this->db->where('horoscope_slug', $zodiac);
        return $this->db->update('tbl_horoscope', $data);
    }

    public function get_all_horoscope()
    {
        $this->db->select('*');
        $this->db->from('tbl_horoscope');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_horoscope_by_zodiac($zodiac)
    {
        $this->db->select('*');
        $this->db->from('tbl_horoscope');
        $this->db->where('horoscope_slug',$zodiac);
        $info = $this->db->get();
        return $info->result();
    }
}    

    