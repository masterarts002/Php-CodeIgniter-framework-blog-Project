<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_category()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_category', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_category()
    {
        $data                 = array();
        $data['all_categroy'] = $this->category_model->getall_category_info();
        $data['maincontent']  = $this->load->view('admin/pages/manage_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_category()
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $title = strip_tags($this->input->post('category_name'));
        $urlslug = strtolower(url_title($title));
        $q = $this->db->select()->where('category_slug',$urlslug)->get('categories_table');
        if($q->num_rows()){ $titleURL = $urlslug.'-'.time();}
        else{$titleURL = $urlslug;}
        $data['category_slug'] = $titleURL;
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');

        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');
        

        if (!empty($_FILES['category_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('category_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/category');
            } else {
                $post_image            = $this->upload->data();
                $data['category_image'] = $post_image['file_name'];
            }
        }

        if ($this->form_validation->run() == true) {
            $result = $this->category_model->save_category_info($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Inseted Sucessfully');
                redirect('manage/category');
            } else {
                $this->session->set_flashdata('message', 'Category Inserted Failed');
                redirect('manage/category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

    public function delete_category($id)
    {
        $result = $this->category_model->delete_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Category Deleted Sucessfully');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Category Deleted Failed');
            redirect('manage/category');
        }
    }

    public function edit_category($id)
    {
        $data                        = array();
        $data['category_info_by_id'] = $this->category_model->edit_category_info($id);
        $data['maincontent']         = $this->load->view('admin/pages/edit_category', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_category($id)
    {
        $data                         = array();
        $data['category_name']        = $this->input->post('category_name');
        $data['category_description'] = $this->input->post('category_description');
        $data['publication_status']   = $this->input->post('publication_status');

        $category_delete_image = $this->input->post('category_delete_image');

        $delete_image = substr($category_delete_image, strlen(base_url()));

        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim');
        $this->form_validation->set_rules('publication_status', 'Publication Status', 'trim|required');

        if (!empty($_FILES['category_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('category_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/category');
            } else {
                $post_image            = $this->upload->data();
                $data['category_image'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }

        if ($this->form_validation->run() == true) {
            $result = $this->category_model->update_category_info($data, $id);
            if ($result) {
                $this->session->set_flashdata('message', 'Category Update Sucessfully');
                redirect('manage/category');
            } else {
                $this->session->set_flashdata('message', 'Category Update Failed');
                redirect('manage/category');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/category');
        }

    }

    public function published_category($id)
    {
        $result = $this->category_model->published_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Category Sucessfully');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'Published Category  Failed');
            redirect('manage/category');
        }
    }

    public function unpublished_category($id)
    {
        $result = $this->category_model->unpublished_category_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Category Sucessfully');
            redirect('manage/category');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Category  Failed');
            redirect('manage/category');
        }
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
