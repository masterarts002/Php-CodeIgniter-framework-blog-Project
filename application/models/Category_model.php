<?php

class Category_Model extends CI_Model
{
    public function save_category_info($data)
    {
        return $this->db->insert('categories_table', $data);
    }

    public function getall_category_info()
    {
        $this->db->select('*');
        $this->db->from('categories_table');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_category_info($id)
    {
        $this->db->select('*');
        $this->db->from('categories_table');
        $this->db->where('id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_category_info($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('categories_table');
    }

    public function update_category_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('categories_table', $data);
    }

    public function published_category_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('id', $id);
        return $this->db->update('categories_table');
    }

    public function unpublished_category_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('categories_table');
    }

}
