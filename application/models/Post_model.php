<?php

class Post_Model extends CI_Model
{

    public function save_post_info($data)
    {
        return $this->db->insert('post_table', $data);
    }

    public function get_all_post()
    {
        $this->db->select('*,post_table.publication_status as pstatus');
        $this->db->from('post_table');
        $this->db->join('categories_table', 'categories_table.category_slug=post_table.post_category');
        $this->db->join('admin_table', 'admin_table.user_id=post_table.post_author');
        $this->db->order_by('post_table.post_id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }
    
    public function all_post()
    {
        $this->db->select('*,post_table.publication_status as pstatus');
        $this->db->from('post_table');
        $this->db->order_by('post_table.post_id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function edit_post_info($id)
    {
        $this->db->select('*,post_table.publication_status as pstatus');
        $this->db->from('post_table');
        $this->db->where('post_table.post_id', $id);
        $this->db->join('categories_table', 'categories_table.category_slug=post_table.post_category');
        $info = $this->db->get();
        return $info->row();
    }

    public function delete_post_info($id)
    {
        $this->db->where('post_id', $id);
        return $this->db->delete('post_table');
    }

    public function update_post_info($data, $id)
    {
        $this->db->where('post_id', $id);
        return $this->db->update('post_table', $data);
    }

    public function published_post_info($id)
    {
        $this->db->set('publication_status', 1);
        $this->db->where('post_id', $id);
        return $this->db->update('post_table');
    }

    public function unpublished_post_info($id)
    {
        $this->db->set('publication_status', 0);
        $this->db->where('post_id', $id);
        return $this->db->update('post_table');
    }

    public function get_all_published_category()
    {
        $this->db->select('*');
        $this->db->from('categories_table');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_published_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('publication_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

}
