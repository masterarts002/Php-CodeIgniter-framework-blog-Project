<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Identity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->get_user();
    }

    public function index()
    {
        $data                = array();
        $data['get_identity'] = $this->identity_model->get_identity_data();
        $data['maincontent'] = $this->load->view('admin/pages/identity', $data, true);
        $this->load->view('admin/master', $data);
    }

    public function save_details()
    {

        $data                          = array();
        $data['site_copyright']        = $this->input->post('site_copyright');
        $data['site_keywords']         = $this->input->post('site_keywords');
        $data['site_desc']             = $this->input->post('site_desc');
        $data['site_insta_link']       = $this->input->post('site_insta_link');
        $data['contact_title']         = $this->input->post('contact_title');
        $data['contact_subtitle']      = $this->input->post('contact_subtitle');
        $data['contact_description']   = $this->input->post('contact_description');
        $data['company_location']      = $this->input->post('company_location');
        $data['company_number']        = $this->input->post('company_number');
        $data['company_email']         = $this->input->post('company_email');
        $data['company_facebook']      = $this->input->post('company_facebook');
        $data['company_twitter']       = $this->input->post('company_twitter');
        $data['site_title']            = $this->input->post('site_title');

        $delete_logo    = $this->input->post('delete_logo');
        $delete_favicon = $this->input->post('delete_favicon');

        $this->form_validation->set_rules('site_copyright', 'copyright', 'trim|required');
        $this->form_validation->set_rules('site_keywords', 'contact 1', 'trim');
        $this->form_validation->set_rules('site_desc', 'contact 2', 'trim');
        $this->form_validation->set_rules('site_insta_link', 'Insta Link', 'trim|required');
        $this->form_validation->set_rules('contact_title', 'Contact Title', 'trim');
        $this->form_validation->set_rules('contact_subtitle', 'Contact Sub Title', 'trim|required');
        $this->form_validation->set_rules('contact_description', 'Contact disc', 'trim|required');
        $this->form_validation->set_rules('company_location', 'Company Location', 'trim|required');
        $this->form_validation->set_rules('company_number', 'Company number', 'trim|required');
        $this->form_validation->set_rules('company_email', 'Company Email', 'trim|required');
        $this->form_validation->set_rules('company_facebook', 'comapny facebook', 'trim|required');
        $this->form_validation->set_rules('company_twitter', 'company twitter', 'trim|required');
        $this->form_validation->set_rules('site_title', 'Site Title', 'trim|required');

        if (!empty($_FILES['site_logo']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $config['max_width']     = 800;
            $config['max_height']    = 555;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('site_logo')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('theme/option');
            } else {
                unlink('uploads/' . $delete_logo);
                $post_image        = $this->upload->data();
                $data['site_logo'] = $post_image['file_name'];
            }
        }

        if (!empty($_FILES['site_favicon']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $config['max_width']     = 800;
            $config['max_height']    = 555;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('site_favicon')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('site-identity');
            } else {
                unlink('uploads/' . $delete_favicon);
                $post_image           = $this->upload->data();
                $data['site_favicon'] = $post_image['file_name'];
            }
        }

        if ($this->form_validation->run() == true) {

            $result = $this->identity_model->save_option_info($data);

            if ($result) {
                $this->session->set_flashdata('message', 'Site Identity  Updated Sucessfully');
                redirect('site-identity');
            } else {
                $this->session->set_flashdata('message', 'Site Identity  Updated Failed');
                redirect('site-identity');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('site-identity');
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