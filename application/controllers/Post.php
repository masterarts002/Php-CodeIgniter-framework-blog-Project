<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_post()
    {
        $data                           = array();
        $data['all_published_category'] = $this->post_model->get_all_published_category();
        $data['maincontent']            = $this->load->view('admin/pages/add_post', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_post()
    {
        $data                    = array();
        $data['get_all_post'] = $this->post_model->get_all_post();
        $data['maincontent']     = $this->load->view('admin/pages/manage_post', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_post()
    {
        
        $data                              = array();
        $data['post_title']             = $this->input->post('post_title');
        $title = strip_tags($this->input->post('post_title'));
        $urlslug = strtolower(url_title($title));
        $q = $this->db->select()->where('post_slug',$urlslug)->get('post_table');
        if($q->num_rows()){ $titleURL = $urlslug.'-'.time();}
        else{$titleURL = $urlslug;}
        $data['post_slug']                 = $titleURL;
        $data['post_title']                = $this->input->post('post_title');
        $data['post_data']                 = $this->input->post('post_data');
        $data['post_keywords']             = $this->input->post('post_keywords');
        $data['post_category']             = $this->input->post('post_category');
        $data['post_description']          = $this->input->post('post_description');
        $data['publication_status']        = $this->input->post('publication_status');
        $data['post_author']               = $this->session->userdata('admin_name');
        $data['published_date']            = time();

        $this->form_validation->set_rules('post_title', 'post Title', 'trim|required');
        $this->form_validation->set_rules('post_data', 'Write Post', 'trim|required');
        $this->form_validation->set_rules('post_keywords', 'post Long Status', 'trim');
        $this->form_validation->set_rules('post_category', 'post Category', 'trim|required');
        $this->form_validation->set_rules('post_description', 'post Price', 'trim');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['post_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 4096;
            $config['max_width']     = 3000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('post_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/post');
            } else {
                $post_image            = $this->upload->data();
                $data['post_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->post_model->save_post_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'post Inserted Sucessfully');
                redirect('manage/post');
            } else {
                $this->session->set_flashdata('message', 'post Inserted Failed');
                redirect('manage/post');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/post');
        }
    }

    
    public function published_post($id)
    {
        $result = $this->post_model->published_post_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published post Sucessfully');
            redirect('manage/post');
        } else {
            $this->session->set_flashdata('message', 'Published post  Failed');
            redirect('manage/post');
        }
    }
    public function unpublished_post($id)
    {
        $result = $this->post_model->unpublished_post_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished post Sucessfully');
            redirect('manage/post');
        } else {
            $this->session->set_flashdata('message', 'UnPublished post  Failed');
            redirect('manage/post');
        }
    }

    public function edit_post($id)
    {
        $data                           = array();
        $data['all_published_category'] = $this->post_model->get_all_published_category();
        $data['post_info_by_id']     = $this->post_model->edit_post_info($id);
        $data['maincontent']            = $this->load->view('admin/pages/edit_post', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_post($id)
    {
        $data                              = array();
        $data['post_title']                = $this->input->post('post_title');
        $data['post_data']                 = $this->input->post('post_data');
        $data['post_keywords']             = $this->input->post('post_keywords');
        $data['post_category']             = $this->input->post('post_category');
        $data['post_description']          = $this->input->post('post_description');
        $data['publication_status']        = $this->input->post('publication_status');

        $this->form_validation->set_rules('post_title', 'post Title', 'trim|required');
        $this->form_validation->set_rules('post_data', 'Write Post', 'trim|required');
        $this->form_validation->set_rules('post_keywords', 'post Long Status', 'trim');
        $this->form_validation->set_rules('post_category', 'post Category', 'trim|required');
        $this->form_validation->set_rules('post_description', 'post Price', 'trim');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        $post_delete_image = $this->input->post('post_delete_image');

        $delete_image = substr($post_delete_image, strlen(base_url()));

        if (!empty($_FILES['post_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('post_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/post');
            } else {
                $post_image            = $this->upload->data();
                $data['post_image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->post_model->update_post_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'post Updated Sucessfully');
                redirect('manage/post');
            } else {
                $this->session->set_flashdata('message', 'post Updated Failed');
                redirect('manage/post');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('edit/post/'.$id);
        }
    }

    public function delete_post($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->post_image);
        $result = $this->post_model->delete_post_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'post Deleted Sucessfully');
            redirect('manage/post');
        } else {
            $this->session->set_flashdata('message', 'post Deleted Failed');
            redirect('manage/post');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('post_image');
        $this->db->from('post_table');
        $this->db->where('post_table.post_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_user()
    {

        $email = $this->session->userdata('admin_email');
        $name  = $this->session->userdata('admin_name');
        $id    = $this->session->userdata('admin_id');

        if (!$email) {
            redirect('dashboard-login');
        }

    }

}
