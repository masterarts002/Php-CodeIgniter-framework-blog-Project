<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function add_profile()
    {
        $data                           = array();
        $data['maincontent']            = $this->load->view('admin/pages/add_profile', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function manage_profile()
    {
        $data                    = array();
        $data['get_all_profile'] = $this->profile_model->get_all_profile();
        $data['maincontent']     = $this->load->view('admin/pages/manage_profile', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_profile()
    {
        
        $data                              = array();
        $data['astrologer_name']             = $this->input->post('astrologer_name');
        $title = strip_tags($this->input->post('astrologer_name'));
        $urlslug = strtolower(url_title($title));
        $q = $this->db->select()->where('profile_slug',$urlslug)->get('tbl_profile');
        if($q->num_rows()){ $titleURL = $urlslug.'-'.time();}
        else{$titleURL = $urlslug;}
        $data['profile_slug'] = $titleURL;
        $data['about_astrologer'] = $this->input->post('about_astrologer');
        $data['call_price']  = $this->input->post('call_price');
        $data['astrologer_number']             = $this->input->post('astrologer_number');
        $data['available_time']          = $this->input->post('available_time');
        $data['languages_known']          = $this->input->post('languages_known');
        $data['speciality']          = $this->input->post('speciality');
        $data['experience']          = $this->input->post('experience');

        $this->form_validation->set_rules('astrologer_name', 'astrologer name', 'trim|required');
        $this->form_validation->set_rules('about_astrologer', 'about astrologer', 'trim|required');
        $this->form_validation->set_rules('call_price', 'call price', 'trim|required');
        $this->form_validation->set_rules('astrologer_number', 'astrologer number', 'trim|required');
        $this->form_validation->set_rules('available_time', ' available time', 'trim|required');
        $this->form_validation->set_rules('languages_known', 'languages known', 'trim|required');
        $this->form_validation->set_rules('speciality', 'speciality', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');

        if (!empty($_FILES['astrologer_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('astrologer_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('add/profile');
            } else {
                $post_image            = $this->upload->data();
                $data['astrologer_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->profile_model->save_profile_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'profile Inserted Sucessfully');
                redirect('manage/profile');
            } else {
                $this->session->set_flashdata('message', 'profile Inserted Failed');
                redirect('manage/profile');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('add/profile');
        }
    }


    public function edit_profile($id)
    {
        $data                           = array();
        $data['profile_info_by_id']     = $this->profile_model->edit_profile_info($id);
        $data['maincontent']            = $this->load->view('admin/pages/edit_profile', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function update_profile($id)
    {
        $data                              = array();
        $data['astrologer_name']             = $this->input->post('astrologer_name');
        $title = strip_tags($this->input->post('astrologer_name'));
        $urlslug = strtolower(url_title($title));
        $q = $this->db->select()->where('profile_slug',$urlslug)->get('tbl_profile');
        if($q->num_rows()){ $titleURL = $urlslug.'-'.time();}
        else{$titleURL = $urlslug;}
        $data['profile_slug'] = $titleURL;
        $data['about_astrologer'] = $this->input->post('about_astrologer');
        $data['call_price']  = $this->input->post('call_price');
        $data['astrologer_number']             = $this->input->post('astrologer_number');
        $data['available_time']          = $this->input->post('available_time');
        $data['languages_known']          = $this->input->post('languages_known');
        $data['speciality']          = $this->input->post('speciality');
        $data['experience']          = $this->input->post('experience');

        $this->form_validation->set_rules('astrologer_name', 'astrologer name', 'trim|required');
        $this->form_validation->set_rules('about_astrologer', 'about astrologer', 'trim|required');
        $this->form_validation->set_rules('call_price', 'call price', 'trim|required');
        $this->form_validation->set_rules('astrologer_number', 'astrologer number', 'trim|required');
        $this->form_validation->set_rules('available_time', ' available time', 'trim|required');
        $this->form_validation->set_rules('languages_known', 'languages known', 'trim|required');
        $this->form_validation->set_rules('speciality', 'speciality', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');

        if (!empty($_FILES['astrologer_image']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size']      = 4096;
            $config['max_width']     = 2000;
            $config['max_height']    = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('astrologer_image')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('edit/profile');
            } else {
                $post_image            = $this->upload->data();
                $data['astrologer_image'] = $post_image['file_name'];
            }
        }
        if ($this->form_validation->run() == true) {

            $result = $this->profile_model->update_profile_info($data, $id);

            if ($result) {
                $this->session->set_flashdata('message', 'profile Updated Sucessfully');
                redirect('manage/profile');
            } else {
                $this->session->set_flashdata('message', 'profile Updated Failed');
                redirect('manage/profile');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('edit/profile');
        }
    }

    public function delete_profile($id)
    {
        $result = $this->profile_model->delete_profile_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'profile Deleted Sucessfully');
            redirect('manage/profile');
        } else {
            $this->session->set_flashdata('message', 'profile Deleted Failed');
            redirect('manage/profile');
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
