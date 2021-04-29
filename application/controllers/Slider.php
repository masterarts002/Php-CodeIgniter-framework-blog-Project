<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_slider()
    {
        $data                = array();
        $data['maincontent'] = $this->load->view('admin/pages/add_slider', '', true);
        $this->load->view('admin/master', $data);
    }

    public function manage_slider()
    {
        $data                = array();
        $data['all_slider']  = $this->slider_model->getall_slider_info();
        $data['maincontent'] = $this->load->view('admin/pages/manage_slider', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_slider()
    {
        $data                       = array();
        $data['slider_title']       = $this->input->post('slider_title');
        $data['slider_sub_title']   = $this->input->post('slider_sub_title');
        $data['slider_btn_text']    = $this->input->post('slider_btn_text');
        $data['slider_btn_link']    = $this->input->post('slider_btn_link');
        $data['publication_status'] = $this->input->post('publication_status');
        $data['position'] = $this->input->post('position');

        $this->form_validation->set_rules('slider_title', 'Slider Title', 'trim|required');
        $this->form_validation->set_rules('slider_sub_title', 'Slider Sub Title', 'trim|required');
        $this->form_validation->set_rules('slider_btn_text', 'Slider Buttun Text', 'trim|required');
        $this->form_validation->set_rules('slider_btn_link', 'Slider Buttun Link', 'trim|required');
        $this->form_validation->set_rules('position', 'position', 'trim|required|is_unique[slider_table.position]',
		array('required' => 'You must provide a %s.','is_unique' => 'First Position already exists.'));

        if (!empty($_FILES['slider_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('slider_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/slider');
            } else {
                $post_image           = $this->upload->data();
                $data['slider_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->slider_model->save_slider_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Slider Inserted Sucessfully');
                redirect('manage/slider');
            } else {
                $this->session->set_flashdata('message', 'Slider Inserted Failed');
                redirect('manage/slider');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/slider');
        }
    }

    public function delete_slider($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('uploads/' . $delete_image->slider_image);
        $result = $this->slider_model->delete_slider_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Slider Deleted Sucessfully');
            redirect('manage/slider');
        } else {
            $this->session->set_flashdata('message', 'Slider Deleted Failed');
            redirect('manage/slider');
        }
    }

    public function edit_slider($id)
    {
        $data                      = array();
        $data['slider_info_by_id'] = $this->slider_model->edit_slider_info($id);
        $data['maincontent']       = $this->load->view('admin/pages/edit_slider', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_slider($id)
    {
        $data                       = array();
        $data['slider_title']       = $this->input->post('slider_title');
        $data['slider_sub_title']   = $this->input->post('slider_sub_title');
        $data['slider_btn_text']    = $this->input->post('slider_btn_text');
        $data['slider_btn_link']    = $this->input->post('slider_btn_link');
        $data['publication_status'] = $this->input->post('publication_status');

        $this->form_validation->set_rules('slider_title', 'Slider Title', 'trim|required');
        $this->form_validation->set_rules('slider_sub_title', 'Slider Sub Title', 'trim|required');
        $this->form_validation->set_rules('slider_btn_text', 'Slider Buttun Text', 'trim|required');
        $this->form_validation->set_rules('slider_btn_link', 'Slider Buttun Link', 'trim|required');

        if (!empty($_FILES['slider_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('slider_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/slider');
            } else {
                $post_image           = $this->upload->data();
                $data['slider_image'] = $post_image['file_name'];
                unlink('uploads/' . $delete_image);
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->slider_model->update_slider_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'Slider Updated Sucessfully');
                redirect('manage/slider');
            } else {
                $this->session->set_flashdata('message', 'Slider Updated Failed');
                redirect('edit/slider/'.$id);
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('edit/slider/'.$id);
        }

    }

    public function published_slider($id)
    {
        $result = $this->slider_model->published_slider_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Published Slider Sucessfully');
            redirect('manage/slider');
        } else {
            $this->session->set_flashdata('message', 'Published Slider  Failed');
            redirect('manage/slider');
        }
    }

    public function unpublished_slider($id)
    {
        $result = $this->slider_model->unpublished_slider_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'UnPublished Slider Sucessfully');
            redirect('manage/slider');
        } else {
            $this->session->set_flashdata('message', 'UnPublished Slider  Failed');
            redirect('manage/slider');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('slider_image');
        $this->db->from('slider_table');
        $this->db->where('slider_id', $id);
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
